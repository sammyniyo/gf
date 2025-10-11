<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use App\Models\ContributionTarget;
use App\Models\Member;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ContributionController extends Controller
{
    public function index(Request $request)
    {
        $query = Contribution::with(['member', 'target']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('member', function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Filter by member
        if ($request->filled('member_id')) {
            $query->where('member_id', $request->member_id);
        }

        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('has_paid', $request->payment_status === 'paid');
        }

        // Filter by payment type
        if ($request->filled('payment_type')) {
            $query->where('payment_type', $request->payment_type);
        }

        // Filter by target
        if ($request->filled('target_id')) {
            $query->where('target_id', $request->target_id);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Filter by month
        if ($request->filled('month')) {
            $query->where('month', $request->month);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        if (in_array($sortBy, ['amount', 'created_at', 'payment_date'])) {
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $contributions = $query->paginate(15)->withQueryString();

        // Get filter options
        $members = Member::where('status', 'active')->orderBy('first_name')->get();
        $targets = ContributionTarget::active()->get();

        // Calculate totals
        $totalAmount = $query->sum('amount');
        $paidAmount = (clone $query)->where('has_paid', true)->sum('amount');
        $pendingAmount = (clone $query)->where('has_paid', false)->sum('amount');

        return view('admin.contributions.index', compact(
            'contributions',
            'members',
            'targets',
            'totalAmount',
            'paidAmount',
            'pendingAmount'
        ));
    }

    public function create()
    {
        $members = Member::where('status', 'active')->orderBy('first_name')->get();
        $targets = ContributionTarget::active()->get();

        // Prepare member data for JavaScript
        $membersForJs = $members->map(function($member) {
            return [
                'id' => $member->id,
                'name' => $member->first_name . ' ' . $member->last_name,
                'email' => $member->email,
                'monthly_target' => $member->monthly_target ?? 0
            ];
        });

        return view('admin.contributions.create', compact('members', 'targets', 'membersForJs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'member_id' => 'required|exists:members,id',
            'target_id' => 'nullable|exists:contribution_targets,id',
            'month' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'payment_type' => 'required|in:monthly,one_time',
            'payment_method' => 'nullable|string|max:255',
            'has_paid' => 'boolean',
            'payment_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'is_recurring' => 'boolean',
        ]);

        // Check for existing contribution for this member and month
        $existingContribution = Contribution::where('member_id', $data['member_id'])
            ->where('month', $data['month'])
            ->first();

        if ($existingContribution) {
            $member = \App\Models\Member::find($data['member_id']);
            $memberName = $member ? $member->first_name . ' ' . $member->last_name : 'Unknown';

            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'member_id' => "A contribution for {$memberName} in {$data['month']} already exists. Please edit the existing contribution or choose a different month."
                ]);
        }

        $data['has_paid'] = $request->has('has_paid');
        $data['is_recurring'] = $request->has('is_recurring');

        if ($data['has_paid'] && !$request->filled('payment_date')) {
            $data['payment_date'] = now();
        }

        Contribution::create($data);

        return redirect()->route('admin.contributions.index')
            ->with('success', 'Contribution added successfully!');
    }

    public function show(Contribution $contribution)
    {
        $contribution->load(['member', 'target']);

        return view('admin.contributions.show', compact('contribution'));
    }

    public function edit(Contribution $contribution)
    {
        $members = Member::where('status', 'active')->orderBy('first_name')->get();
        $targets = ContributionTarget::active()->get();

        // Prepare member data for JavaScript
        $membersForJs = $members->map(function($member) {
            return [
                'id' => $member->id,
                'name' => $member->first_name . ' ' . $member->last_name,
                'email' => $member->email,
                'monthly_target' => $member->monthly_target ?? 0
            ];
        });

        return view('admin.contributions.edit', compact('contribution', 'members', 'targets', 'membersForJs'));
    }

    public function update(Request $request, Contribution $contribution)
    {
        $data = $request->validate([
            'member_id' => 'required|exists:members,id',
            'target_id' => 'nullable|exists:contribution_targets,id',
            'month' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'payment_type' => 'required|in:monthly,one_time',
            'payment_method' => 'nullable|string|max:255',
            'has_paid' => 'boolean',
            'payment_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'is_recurring' => 'boolean',
        ]);

        // Check for existing contribution for this member and month (excluding current contribution)
        $existingContribution = Contribution::where('member_id', $data['member_id'])
            ->where('month', $data['month'])
            ->where('id', '!=', $contribution->id)
            ->first();

        if ($existingContribution) {
            $member = \App\Models\Member::find($data['member_id']);
            $memberName = $member ? $member->first_name . ' ' . $member->last_name : 'Unknown';

            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'member_id' => "A contribution for {$memberName} in {$data['month']} already exists. Please choose a different month."
                ]);
        }

        $data['has_paid'] = $request->has('has_paid');
        $data['is_recurring'] = $request->has('is_recurring');

        if ($data['has_paid'] && !$request->filled('payment_date')) {
            $data['payment_date'] = now();
        } elseif (!$data['has_paid']) {
            $data['payment_date'] = null;
        }

        $contribution->update($data);

        return redirect()->route('admin.contributions.index')
            ->with('success', 'Contribution updated successfully!');
    }

    public function destroy(Contribution $contribution)
    {
        $contribution->delete();

        return redirect()->route('admin.contributions.index')
            ->with('success', 'Contribution deleted successfully!');
    }

    public function togglePayment(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'month' => 'required|string',
            'amount' => 'nullable|numeric|min:0',
        ]);

        $contribution = Contribution::firstOrNew([
            'member_id' => $validated['member_id'],
            'month' => $validated['month'],
        ]);

        $contribution->has_paid = !$contribution->has_paid;
        $contribution->payment_date = $contribution->has_paid ? now() : null;
        $contribution->amount = $validated['amount'] ?? $contribution->amount ?? 0;
        $contribution->save();

        return back()->with('success', 'Payment status updated!');
    }

    public function export(Request $request)
    {
        $month = $request->get('month', now()->format('Y-m'));
        $members = Member::where('status', 'active')->orderBy('first_name')->get();
        $contributions = Contribution::with('member')
            ->where('month', $month)
            ->get()
            ->keyBy('member_id');

        $pdf = Pdf::loadView('admin.contributions.pdf', compact('members', 'contributions', 'month'));
        return $pdf->download('contributions-' . $month . '.pdf');
    }

    public function setTarget(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer',
            'target_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        ContributionTarget::updateOrCreate(
            ['year' => $validated['year']],
            [
                'target_amount' => $validated['target_amount'],
                'description' => $validated['description'],
            ]
        );

        return back()->with('success', 'Yearly target set successfully!');
    }
}


