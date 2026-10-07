<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveChoristerCommitment;
use App\Models\PageSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActiveChoristerController extends Controller
{
    public function index(Request $request): View
    {
        $query = ActiveChoristerCommitment::query()->with('member')->latest('accepted_at');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($builder) use ($search) {
                $builder->where('name', 'like', '%'.$search.'%')
                    ->orWhere('phone', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhereHas('member', function ($member) use ($search) {
                        $member->where('member_id', 'like', '%'.$search.'%')
                            ->orWhere('first_name', 'like', '%'.$search.'%')
                            ->orWhere('last_name', 'like', '%'.$search.'%');
                    });
            });
        }

        $commitments = $query->paginate(25)->withQueryString();
        $window = PageSettings::activeChoristersWindow();
        $setting = $window['setting'] ?? PageSettings::forActiveChoristers();

        return view('admin.active-choristers.index', [
            'commitments' => $commitments,
            'total' => ActiveChoristerCommitment::query()->count(),
            'linked' => ActiveChoristerCommitment::query()->whereNotNull('member_id')->count(),
            'registrationOpen' => $window['open'],
            'timerEndsAt' => $window['ends_at']?->toIso8601String(),
            'timerEndsAtLabel' => $window['ends_at']?->timezone(config('app.timezone'))->format('d M Y H:i'),
            'joinUrl' => $setting->join_url ?: '',
            'fallbackJoinUrl' => config('choir.active_choristers_whatsapp'),
        ]);
    }

    public function updateLink(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'join_url' => ['nullable', 'string', 'max:500', 'url'],
        ], [
            'join_url.url' => 'Enter a full link, starting with https://',
        ]);

        $setting = PageSettings::forActiveChoristers();
        $setting->join_url = $validated['join_url'] ?: null;
        $setting->save();

        return redirect()
            ->route('admin.active-choristers.index')
            ->with('success', $setting->join_url
                ? 'The Active Choristers join link is saved. People only reach it after they commit.'
                : 'The custom join link was cleared. The site will use the default group link.');
    }

    public function toggleRegistration(Request $request): RedirectResponse
    {
        $setting = PageSettings::forActiveChoristers();
        $action = $request->input('action', 'close');

        if ($action === 'close') {
            $setting->is_enabled = false;
            $setting->timer_ends_at = null;
            $setting->save();

            return redirect()
                ->route('admin.active-choristers.index')
                ->with('success', 'The window is closed. The public Active Choristers link is hidden.');
        }

        $minutes = $this->durationMinutes($request);

        if ($minutes < 1) {
            return redirect()
                ->route('admin.active-choristers.index')
                ->withErrors(['days' => 'Set at least 1 minute, or add days or hours.'])
                ->withInput();
        }

        if ($action === 'extend' && $setting->is_enabled && $setting->timer_ends_at && $setting->timer_ends_at->isFuture()) {
            $setting->timer_ends_at = $setting->timer_ends_at->copy()->addMinutes($minutes);
        } else {
            $setting->is_enabled = true;
            $setting->timer_ends_at = now()->addMinutes($minutes);
        }

        $setting->save();

        $ends = $setting->timer_ends_at->timezone(config('app.timezone'))->format('d M Y H:i');

        return redirect()
            ->route('admin.active-choristers.index')
            ->with('success', $action === 'extend'
                ? 'The window now runs until '.$ends.'.'
                : 'The window is open. The public link disappears on '.$ends.'.');
    }

    public function destroy(ActiveChoristerCommitment $commitment): RedirectResponse
    {
        $member = $commitment->member;
        $commitment->delete();

        if ($member && ! ActiveChoristerCommitment::query()->where('member_id', $member->id)->exists()) {
            $member->is_active_chorister = false;
            $member->save();
        }

        return redirect()
            ->route('admin.active-choristers.index')
            ->with('success', 'Commitment deleted.');
    }

    private function durationMinutes(Request $request): int
    {
        $days = max(0, (int) $request->input('days', 0));
        $hours = max(0, (int) $request->input('hours', 0));
        $minutes = max(0, (int) $request->input('minutes', 0));

        return ($days * 1440) + ($hours * 60) + $minutes;
    }
}
