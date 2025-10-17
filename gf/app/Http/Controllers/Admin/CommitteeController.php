<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::orderBy('order')->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.committees.index', compact('committees'));
    }

    public function create()
    {
        $departments = Committee::getDepartments();
        // Get all active members who are choir members (not friendship)
        $members = Member::members()->active()->orderBy('first_name')->get();
        return view('admin.committees.create', compact('departments', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // If member is selected, auto-fill their information
        if ($request->filled('member_id')) {
            $member = Member::find($request->member_id);
            if ($member) {
                $validated['name'] = $member->full_name;
                $validated['email'] = $validated['email'] ?? $member->email;
                $validated['phone'] = $validated['phone'] ?? $member->phone;
                // Use member photo if no photo is uploaded
                if (!$request->hasFile('photo') && $member->photo_path) {
                    $validated['photo'] = $member->photo_path;
                }
            }
        }

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('committees', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        Committee::create($validated);

        return redirect()->route('admin.committees.index')
            ->with('success', 'Committee member added successfully!');
    }

    public function edit(Committee $committee)
    {
        $departments = Committee::getDepartments();
        // Get all active members who are choir members (not friendship)
        $members = Member::members()->active()->orderBy('first_name')->get();
        return view('admin.committees.edit', compact('committee', 'departments', 'members'));
    }

    public function update(Request $request, Committee $committee)
    {
        $validated = $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // If member is selected, auto-fill their information
        if ($request->filled('member_id')) {
            $member = Member::find($request->member_id);
            if ($member) {
                $validated['name'] = $member->full_name;
                $validated['email'] = $validated['email'] ?? $member->email;
                $validated['phone'] = $validated['phone'] ?? $member->phone;
            }
        }

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($committee->photo) {
                Storage::disk('public')->delete($committee->photo);
            }
            $validated['photo'] = $request->file('photo')->store('committees', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? $committee->order ?? 0;

        $committee->update($validated);

        return redirect()->route('admin.committees.index')
            ->with('success', 'Committee member updated successfully!');
    }

    public function destroy(Committee $committee)
    {
        // Delete photo if exists
        if ($committee->photo) {
            Storage::disk('public')->delete($committee->photo);
        }

        $committee->delete();

        return redirect()->route('admin.committees.index')
            ->with('success', 'Committee member deleted successfully!');
    }
}


