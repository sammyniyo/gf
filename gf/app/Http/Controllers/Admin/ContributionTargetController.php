<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContributionTarget;
use Illuminate\Http\Request;

class ContributionTargetController extends Controller
{
    public function index()
    {
        $targets = ContributionTarget::latest()->paginate(10);
        return view('admin.contribution-targets.index', compact('targets'));
    }

    public function create()
    {
        return view('admin.contribution-targets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:student,alumni,general',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_monthly' => 'boolean',
        ]);

        $data['is_monthly'] = $request->has('is_monthly');
        $data['current_amount'] = 0;

        ContributionTarget::create($data);

        return redirect()->route('admin.contributions.targets')
            ->with('success', 'Contribution target created successfully!');
    }

    public function show(ContributionTarget $target)
    {
        $target->load(['contributions.member']);
        return view('admin.contribution-targets.show', compact('target'));
    }

    public function edit(ContributionTarget $target)
    {
        return view('admin.contribution-targets.edit', compact('target'));
    }

    public function update(Request $request, ContributionTarget $target)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:student,alumni,general',
            'description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean',
            'is_monthly' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['is_monthly'] = $request->has('is_monthly');

        $target->update($data);

        return redirect()->route('admin.contributions.targets')
            ->with('success', 'Contribution target updated successfully!');
    }

    public function destroy(ContributionTarget $target)
    {
        $target->delete();
        return redirect()->route('admin.contributions.targets')
            ->with('success', 'Contribution target deleted successfully!');
    }
}
