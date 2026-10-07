<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Rehearsal;
use App\Models\RehearsalAttendance;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class RehearsalController extends Controller
{
    public function index(): View
    {
        $rehearsals = Rehearsal::query()
            ->withCount([
                'attendances as present_count' => fn ($query) => $query->where('status', RehearsalAttendance::PRESENT),
                'attendances as absent_count' => fn ($query) => $query->where('status', RehearsalAttendance::ABSENT),
                'attendances as late_count' => fn ($query) => $query->where('status', RehearsalAttendance::LATE),
                'attendances as excused_count' => fn ($query) => $query->where('status', RehearsalAttendance::EXCUSED),
            ])
            ->with('takenBy')
            ->latest('held_on')
            ->latest('id')
            ->paginate(20);

        $open = Rehearsal::query()->where('status', Rehearsal::STATUS_OPEN)->latest('held_on')->first();
        $rollSize = $this->rollQuery()->count();

        return view('admin.attendance.index', [
            'rehearsals' => $rehearsals,
            'open' => $open,
            'rollSize' => $rollSize,
            'suggestedDate' => $this->suggestedDate(),
            'suggestedKind' => Rehearsal::kindFromDate($this->suggestedDate()),
            'kinds' => Rehearsal::kinds(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'held_on' => ['required', 'date'],
            'kind' => ['required', 'in:tuesday,thursday,saturday'],
            'title' => ['nullable', 'string', 'max:120'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $existing = Rehearsal::query()
            ->whereDate('held_on', $validated['held_on'])
            ->where('kind', $validated['kind'])
            ->first();

        if ($existing) {
            return redirect()
                ->route('admin.attendance.show', $existing)
                ->with('success', 'That rehearsal is already open. Continue the roll here.');
        }

        $rehearsal = Rehearsal::query()->create([
            'held_on' => $validated['held_on'],
            'kind' => $validated['kind'],
            'title' => ($validated['title'] ?? null) ?: null,
            'notes' => ($validated['notes'] ?? null) ?: null,
            'status' => Rehearsal::STATUS_OPEN,
            'taken_by' => $request->user()?->id,
            'opened_at' => now(),
        ]);

        return redirect()
            ->route('admin.attendance.show', $rehearsal)
            ->with('success', 'Rehearsal opened. Mark who is here, then close it when you finish.');
    }

    public function show(Rehearsal $rehearsal): View
    {
        $members = $this->rollQuery()->get()->map(function (Member $member) {
            return [
                'id' => $member->id,
                'name' => trim($member->first_name.' '.$member->last_name) ?: $member->name,
                'member_id' => $member->member_id,
                'voice' => $member->voice ?: 'unsure',
            ];
        })->values();

        $marks = $rehearsal->attendances()
            ->get(['member_id', 'status', 'note'])
            ->keyBy('member_id')
            ->map(fn (RehearsalAttendance $row) => [
                'status' => $row->status,
                'note' => $row->note,
            ]);

        return view('admin.attendance.show', [
            'rehearsal' => $rehearsal->load('takenBy'),
            'members' => $members,
            'marks' => $marks,
            'voices' => ['soprano', 'alto', 'tenor', 'bass', 'unsure'],
        ]);
    }

    public function mark(Request $request, Rehearsal $rehearsal): JsonResponse
    {
        if (! $rehearsal->isOpen()) {
            return response()->json(['ok' => false, 'message' => 'This rehearsal is closed.'], 422);
        }

        $validated = $request->validate([
            'member_id' => ['required', 'integer', 'exists:members,id'],
            'status' => ['required', 'in:unmarked,present,absent,late,excused'],
            'note' => ['nullable', 'string', 'max:255'],
        ]);

        if ($validated['status'] === 'unmarked') {
            $rehearsal->attendances()->where('member_id', $validated['member_id'])->delete();
        } else {
            $rehearsal->attendances()->updateOrCreate(
                ['member_id' => $validated['member_id']],
                [
                    'status' => $validated['status'],
                    'note' => ($validated['note'] ?? null) ?: null,
                    'marked_by' => $request->user()?->id,
                ]
            );
        }

        return response()->json(['ok' => true, 'counts' => $this->counts($rehearsal)]);
    }

    public function markRemainingPresent(Rehearsal $rehearsal): RedirectResponse
    {
        if (! $rehearsal->isOpen()) {
            return redirect()->route('admin.attendance.show', $rehearsal)
                ->with('error', 'This rehearsal is closed.');
        }

        $marked = $rehearsal->attendances()->pluck('member_id');
        $remaining = $this->rollQuery()->whereNotIn('id', $marked)->pluck('id');

        foreach ($remaining as $memberId) {
            $rehearsal->attendances()->updateOrCreate(
                ['member_id' => $memberId],
                [
                    'status' => RehearsalAttendance::PRESENT,
                    'marked_by' => request()->user()?->id,
                ]
            );
        }

        return redirect()
            ->route('admin.attendance.show', $rehearsal)
            ->with('success', 'Everyone still unmarked is now present. Change anyone who is not here.');
    }

    public function close(Rehearsal $rehearsal): RedirectResponse
    {
        $rehearsal->status = Rehearsal::STATUS_CLOSED;
        $rehearsal->closed_at = now();
        $rehearsal->save();

        return redirect()
            ->route('admin.attendance.show', $rehearsal)
            ->with('success', 'Rehearsal closed. You can still open it again if you need to correct a mark.');
    }

    public function reopen(Rehearsal $rehearsal): RedirectResponse
    {
        $rehearsal->status = Rehearsal::STATUS_OPEN;
        $rehearsal->closed_at = null;
        $rehearsal->save();

        return redirect()
            ->route('admin.attendance.show', $rehearsal)
            ->with('success', 'Rehearsal opened again.');
    }

    public function destroy(Rehearsal $rehearsal): RedirectResponse
    {
        $rehearsal->delete();

        return redirect()
            ->route('admin.attendance.index')
            ->with('success', 'Rehearsal removed.');
    }

    public function analysis(): View
    {
        $rehearsals = Rehearsal::query()
            ->withCount([
                'attendances as present_count' => fn ($query) => $query->where('status', RehearsalAttendance::PRESENT),
                'attendances as late_count' => fn ($query) => $query->where('status', RehearsalAttendance::LATE),
                'attendances as excused_count' => fn ($query) => $query->where('status', RehearsalAttendance::EXCUSED),
                'attendances as absent_count' => fn ($query) => $query->where('status', RehearsalAttendance::ABSENT),
            ])
            ->orderBy('held_on')
            ->get();

        $byKind = collect(Rehearsal::kinds())->map(function ($label, $kind) use ($rehearsals) {
            $rows = $rehearsals->where('kind', $kind);
            $present = $rows->sum('present_count') + $rows->sum('late_count');
            $absent = $rows->sum('absent_count');
            $total = $present + $absent + $rows->sum('excused_count');

            return [
                'kind' => $kind,
                'label' => $label,
                'sessions' => $rows->count(),
                'present' => $present,
                'absent' => $absent,
                'rate' => $total > 0 ? round(($present / $total) * 100) : null,
            ];
        })->values();

        $members = $this->rollQuery()->with('rehearsalAttendances')->get();
        $memberStats = $members->map(function (Member $member) {
            $rows = $member->rehearsalAttendances;
            $present = $rows->whereIn('status', [RehearsalAttendance::PRESENT, RehearsalAttendance::LATE])->count();
            $absent = $rows->where('status', RehearsalAttendance::ABSENT)->count();
            $excused = $rows->where('status', RehearsalAttendance::EXCUSED)->count();
            $total = $present + $absent + $excused;

            return [
                'id' => $member->id,
                'name' => trim($member->first_name.' '.$member->last_name) ?: $member->name,
                'member_id' => $member->member_id,
                'voice' => $member->voice ?: 'unsure',
                'present' => $present,
                'absent' => $absent,
                'excused' => $excused,
                'total' => $total,
                'rate' => $total > 0 ? round(($present / $total) * 100) : null,
            ];
        })->sortBy([
            ['rate', 'asc'],
            ['absent', 'desc'],
            ['name', 'asc'],
        ])->values();

        $trend = $rehearsals->take(-12)->values()->map(function (Rehearsal $rehearsal) {
            $present = $rehearsal->present_count + $rehearsal->late_count;
            $total = $present + $rehearsal->absent_count + $rehearsal->excused_count;

            return [
                'label' => $rehearsal->held_on->format('d M'),
                'kind' => $rehearsal->kindLabel(),
                'present' => $present,
                'absent' => $rehearsal->absent_count,
                'rate' => $total > 0 ? round(($present / $total) * 100) : 0,
            ];
        });

        return view('admin.attendance.analysis', [
            'sessionCount' => $rehearsals->count(),
            'byKind' => $byKind,
            'memberStats' => $memberStats,
            'trend' => $trend,
            'averageRate' => $memberStats->whereNotNull('rate')->avg('rate'),
        ]);
    }

    private function rollQuery()
    {
        return Member::query()
            ->where('member_type', 'member')
            ->where(function ($query) {
                $query->where('is_active_chorister', true)
                    ->orWhereHas('activeChoristerCommitments');
            })
            ->orderBy('first_name')
            ->orderBy('last_name');
    }

    private function suggestedDate(): string
    {
        $today = now()->startOfDay();
        $day = (int) $today->dayOfWeek;

        if (in_array($day, [Carbon::TUESDAY, Carbon::THURSDAY, Carbon::SATURDAY], true)) {
            return $today->toDateString();
        }

        return $today->next(Carbon::TUESDAY)->toDateString();
    }

    private function counts(Rehearsal $rehearsal): array
    {
        $rows = $rehearsal->attendances()->selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return [
            'present' => (int) ($rows[RehearsalAttendance::PRESENT] ?? 0),
            'late' => (int) ($rows[RehearsalAttendance::LATE] ?? 0),
            'excused' => (int) ($rows[RehearsalAttendance::EXCUSED] ?? 0),
            'absent' => (int) ($rows[RehearsalAttendance::ABSENT] ?? 0),
        ];
    }
}
