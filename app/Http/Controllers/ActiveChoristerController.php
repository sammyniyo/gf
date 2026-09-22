<?php

namespace App\Http\Controllers;

use App\Models\ActiveChoristerCommitment;
use App\Models\Member;
use App\Models\PageSettings;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ActiveChoristerController extends Controller
{
    public function show()
    {
        $window = PageSettings::activeChoristersWindow();
        $isAdmin = Auth::check() && Auth::user()->is_admin;

        if (! $window['open'] && ! $isAdmin) {
            abort(404);
        }

        $canRejoin = $this->refreshJoinSession(request());

        return response()
            ->view('active-choristers.index', [
                'registrationOpen' => $window['open'],
                'timerEndsAt' => $window['ends_at']?->toIso8601String(),
                'canRejoin' => $canRejoin,
            ])
            ->header('Cache-Control', 'private, no-store, no-cache, must-revalidate');
    }

    public function directory(): JsonResponse
    {
        if ($closed = $this->closedResponse()) {
            return $closed;
        }
        $results = Cache::remember('active_choristers.directory', 600, function () {
            return Member::query()
                ->where('member_type', 'member')
                ->select(['id', 'name', 'first_name', 'last_name', 'phone', 'voice', 'voice_type'])
                ->orderBy('first_name')
                ->get()
                ->map(function (Member $member) {
                    $name = $member->name ?: trim($member->first_name.' '.$member->last_name);

                    return [
                        'token' => $this->memberToken($member->id),
                        'name' => $name,
                        'phone_hint' => $this->maskPhone($member->phone),
                        'phone_digits' => preg_replace('/\D+/', '', (string) $member->phone),
                        'voice' => $member->voice ?: $member->voice_type,
                    ];
                })
                ->values();
        });

        return response()->json([
            'results' => $results,
        ])->header('Cache-Control', 'private, no-store');
    }

    public function select(Request $request): JsonResponse
    {
        if ($closed = $this->closedResponse()) {
            return $closed;
        }

        $validated = $request->validate([
            'token' => 'required|string',
        ]);

        $memberId = $this->memberIdFromToken($validated['token']);
        $member = $memberId ? Member::query()->find($memberId) : null;

        if (! $member) {
            return response()->json([
                'found' => false,
                'message' => 'That member could not be selected. Search again.',
            ], 422);
        }

        $already = $this->existingCommitment($member, $member->phone);

        $request->session()->put('active_chorister_member_id', $member->id);
        $request->session()->put('active_chorister_lookup_at', now()->timestamp);

        if ($already) {
            $this->grantJoinSession($request, $already);
        }

        return response()->json([
            'found' => true,
            'already_committed' => (bool) $already,
            'can_join' => (bool) $already,
            'member' => [
                'name' => $member->name ?: trim($member->first_name.' '.$member->last_name),
                'phone' => $member->phone,
                'email' => $member->email,
                'voice' => $member->voice ?: $member->voice_type,
                'member_id' => $member->member_id,
            ],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        if ($closed = $this->closedResponse()) {
            return $closed;
        }

        if ($request->filled('website')) {
            return response()->json(['ok' => true, 'already' => false]);
        }

        $validated = $request->validate([
            'language' => 'required|in:en,rw',
            'read_seconds' => 'required|integer|min:0|max:7200',
            'sections_read' => 'required|integer|min:0|max:10',
            'confirmation' => 'required|string|max:40',
        ]);

        $phrase = $validated['language'] === 'rw' ? 'NDABYEMEYE' : 'I COMMIT';
        if (mb_strtoupper(trim($validated['confirmation'])) !== $phrase) {
            return response()->json([
                'ok' => false,
                'message' => 'Type the confirmation phrase exactly to continue.',
            ], 422);
        }

        $memberId = $request->session()->get('active_chorister_member_id');
        $member = $memberId
            ? Member::query()->where('member_type', 'member')->find($memberId)
            : null;

        if (! $member) {
            return response()->json([
                'ok' => false,
                'register' => true,
                'message' => 'Pick your registered name first. If you are not in the choir register, register as a member.',
            ], 422);
        }

        $name = $member->name ?: trim($member->first_name.' '.$member->last_name);
        $phone = $member->phone;
        $email = $member->email;

        if (! $name || ! $this->lastNine($phone)) {
            return response()->json([
                'ok' => false,
                'message' => 'Your member record is missing a name or phone. Ask the choir office to update it, then try again.',
            ], 422);
        }

        $existing = $this->existingCommitment($member, $phone);

        if (! $existing) {
            if ((int) $validated['sections_read'] < 5) {
                return response()->json([
                    'ok' => false,
                    'message' => 'Please read every section before joining the group.',
                ], 422);
            }

            if ((int) $validated['read_seconds'] < 35) {
                return response()->json([
                    'ok' => false,
                    'message' => 'Take a moment to finish reading the terms.',
                ], 422);
            }
        }

        $commitment = DB::transaction(function () use ($validated, $member, $existing, $request, $name, $phone, $email) {
            $payload = [
                'member_id' => $member->id,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'voice' => $member->voice ?: $member->voice_type,
                'language' => $validated['language'],
                'read_seconds' => $existing?->read_seconds ?: $validated['read_seconds'],
                'sections_read' => $existing?->sections_read ?: $validated['sections_read'],
                'ip_address' => $request->ip(),
                'user_agent' => substr((string) $request->userAgent(), 0, 500),
                'accepted_at' => $existing?->accepted_at ?: now(),
            ];

            if ($existing) {
                $existing->fill($payload);
                $existing->save();
                $commitment = $existing;
            } else {
                $commitment = ActiveChoristerCommitment::query()->create($payload);
            }

            if ($member && ! $member->is_active_chorister) {
                $member->is_active_chorister = true;
                $member->save();
            }

            return $commitment;
        });

        $request->session()->forget(['active_chorister_member_id', 'active_chorister_lookup_at']);
        $this->grantJoinSession($request, $commitment);

        return response()->json([
            'ok' => true,
            'already' => (bool) $existing,
        ]);
    }

    public function joinGroup(Request $request): RedirectResponse
    {
        $window = PageSettings::activeChoristersWindow();
        $isAdmin = Auth::check() && Auth::user()->is_admin;

        if (! $window['open'] && ! $isAdmin) {
            abort(404);
        }

        $commitment = $this->sessionCommitment($request);

        if (! $commitment) {
            abort(403, 'Pick your name again, then open WhatsApp.');
        }

        $url = config('choir.active_choristers_whatsapp');

        if (! is_string($url) || $url === '') {
            abort(404);
        }

        return redirect()
            ->away($url)
            ->header('Cache-Control', 'private, no-store, no-cache, must-revalidate');
    }

    private function grantJoinSession(Request $request, ActiveChoristerCommitment $commitment): void
    {
        $request->session()->put('active_chorister_joined', $commitment->id);
        $request->session()->put('active_chorister_joined_at', now()->timestamp);
    }

    private function sessionCommitment(Request $request): ?ActiveChoristerCommitment
    {
        $commitmentId = $request->session()->get('active_chorister_joined');

        if (! $commitmentId) {
            return null;
        }

        return ActiveChoristerCommitment::query()->find($commitmentId);
    }

    private function refreshJoinSession(Request $request): bool
    {
        $commitment = $this->sessionCommitment($request);

        if (! $commitment) {
            return false;
        }

        $this->grantJoinSession($request, $commitment);

        return true;
    }

    private function closedResponse(): ?JsonResponse
    {
        if (PageSettings::activeChoristersRegistrationOpen()) {
            return null;
        }

        return response()->json([
            'ok' => false,
            'closed' => true,
            'found' => false,
            'message' => 'Active Choristers registration is closed.',
        ], 403);
    }

    private function findMemberByPhone(?string $phone): ?Member
    {
        $lastNine = $this->lastNine($phone);

        if (! $lastNine) {
            return null;
        }

        return Member::query()
            ->where('member_type', 'member')
            ->where(function ($builder) use ($lastNine) {
                $builder->where('phone', 'like', '%'.$lastNine)
                    ->orWhereRaw(
                        "REPLACE(REPLACE(REPLACE(REPLACE(phone,' ',''),'+',''),'-',''),'.','') LIKE ?",
                        ['%'.$lastNine]
                    );
            })
            ->first();
    }

    private function existingCommitment(?Member $member, ?string $phone): ?ActiveChoristerCommitment
    {
        $lastNine = $this->lastNine($phone);

        if (! $member && ! $lastNine) {
            return null;
        }

        return ActiveChoristerCommitment::query()
            ->where(function ($query) use ($member, $lastNine) {
                if ($member) {
                    $query->orWhere('member_id', $member->id);
                }

                if ($lastNine) {
                    $query->orWhere('phone', 'like', '%'.$lastNine)
                        ->orWhereRaw(
                            "REPLACE(REPLACE(REPLACE(REPLACE(phone,' ',''),'+',''),'-',''),'.','') LIKE ?",
                            ['%'.$lastNine]
                        );
                }
            })
            ->latest('accepted_at')
            ->first();
    }

    private function phonesMatch(?string $left, ?string $right): bool
    {
        $a = $this->lastNine($left);
        $b = $this->lastNine($right);

        return $a && $b && $a === $b;
    }

    private function lastNine(?string $value): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $value);

        if (strlen($digits) < 8) {
            return null;
        }

        return substr($digits, -9);
    }

    private function maskPhone(?string $phone): ?string
    {
        $digits = preg_replace('/\D+/', '', (string) $phone);

        if (strlen($digits) < 7) {
            return null;
        }

        return substr($digits, 0, 3).' ••• '.substr($digits, -3);
    }

    private function memberToken(int $id): string
    {
        return $id.'.'.hash_hmac('sha256', (string) $id, (string) config('app.key'));
    }

    private function memberIdFromToken(string $token): ?int
    {
        $parts = explode('.', $token, 2);

        if (count($parts) !== 2 || ! ctype_digit($parts[0])) {
            return null;
        }

        $expected = hash_hmac('sha256', $parts[0], (string) config('app.key'));

        if (! hash_equals($expected, $parts[1])) {
            return null;
        }

        return (int) $parts[0];
    }
}
