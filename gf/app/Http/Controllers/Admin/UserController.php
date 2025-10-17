<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', true)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // Get all members who are choir members (not friendship)
        $members = Member::members()->active()->orderBy('first_name')->get();
        return view('admin.users.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => ['nullable', 'exists:members,id', 'unique:users,member_id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'department' => ['nullable', 'string', 'max:255'],
        ]);

        // If member is selected, auto-fill their information
        if ($request->filled('member_id')) {
            $member = Member::find($request->member_id);
            if ($member) {
                $validated['name'] = $member->full_name;
                $validated['email'] = $member->email;
            }
        }

        User::create([
            'member_id' => $validated['member_id'] ?? null,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => true,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin user created successfully!');
    }

    public function edit(User $user)
    {
        // Get all members who are choir members (not friendship)
        $members = Member::members()->active()->orderBy('first_name')->get();
        return view('admin.users.edit', compact('user', 'members'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'member_id' => ['nullable', 'exists:members,id', 'unique:users,member_id,' . $user->id],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'department' => ['nullable', 'string', 'max:255'],
        ]);

        // If member is selected, auto-fill their information
        if ($request->filled('member_id')) {
            $member = Member::find($request->member_id);
            if ($member) {
                $user->member_id = $request->member_id;
                $user->name = $member->full_name;
                $user->email = $member->email;
            }
        } else {
            $user->member_id = null;
            $user->name = $validated['name'];
            $user->email = $validated['email'];
        }

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin user updated successfully!');
    }

    public function destroy(User $user)
    {
        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete your own account!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Admin user deleted successfully!');
    }
}

