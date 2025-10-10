<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
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
        return view('admin.committees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
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
        return view('admin.committees.edit', compact('committee', 'departments'));
    }

    public function update(Request $request, Committee $committee)
    {
        $validated = $request->validate([
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


