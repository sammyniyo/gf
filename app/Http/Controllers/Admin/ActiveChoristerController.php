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

        return view('admin.active-choristers.index', [
            'commitments' => $commitments,
            'total' => ActiveChoristerCommitment::query()->count(),
            'linked' => ActiveChoristerCommitment::query()->whereNotNull('member_id')->count(),
            'registrationOpen' => $window['open'],
            'timerEndsAt' => $window['ends_at']?->toIso8601String(),
            'timerEndsAtLabel' => $window['ends_at']?->timezone(config('app.timezone'))->format('d M Y H:i'),
        ]);
    }

    public function toggleRegistration(Request $request): RedirectResponse
    {
        $setting = PageSettings::forActiveChoristers();
        $action = $request->input('action', 'close');

        if ($action === 'start') {
            $setting->is_enabled = true;
            $setting->timer_ends_at = now()->addDays(PageSettings::ACTIVE_CHORISTERS_WINDOW_DAYS);
            $setting->save();

            return redirect()
                ->route('admin.active-choristers.index')
                ->with('success', 'The 7-day window is open. The public link disappears on '.$setting->timer_ends_at->timezone(config('app.timezone'))->format('d M Y H:i').'.');
        }

        $setting->is_enabled = false;
        $setting->timer_ends_at = null;
        $setting->save();

        return redirect()
            ->route('admin.active-choristers.index')
            ->with('success', 'The window is closed. The public Active Choristers link is hidden.');
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
}
