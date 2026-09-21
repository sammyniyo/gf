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

        return view('admin.active-choristers.index', [
            'commitments' => $commitments,
            'total' => ActiveChoristerCommitment::query()->count(),
            'linked' => ActiveChoristerCommitment::query()->whereNotNull('member_id')->count(),
            'registrationOpen' => PageSettings::activeChoristersRegistrationOpen(),
        ]);
    }

    public function toggleRegistration(): RedirectResponse
    {
        $setting = PageSettings::forActiveChoristers();
        $setting->is_enabled = ! $setting->is_enabled;
        $setting->save();

        return redirect()
            ->route('admin.active-choristers.index')
            ->with('success', $setting->is_enabled
                ? 'Active Choristers registration is open.'
                : 'Active Choristers registration is closed.');
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
