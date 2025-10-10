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
        $month = $request->get('month', now()->format('Y-m'));
        $year = substr($month, 0, 4);

        $members = Member::where('status', 'active')->orderBy('first_name')->get();
        $target = ContributionTarget::where('year', $year)->first();

        $contributions = Contribution::with('member')
            ->where('month', $month)
            ->get()
            ->keyBy('member_id');

        // Calculate yearly contributions for awards
        $yearlyContributions = Contribution::with('member')
            ->where('month', 'like', $year . '%')
            ->where('has_paid', true)
            ->selectRaw('member_id, SUM(amount) as total_amount, COUNT(*) as months_paid')
            ->groupBy('member_id')
            ->get()
            ->keyBy('member_id');

        return view('admin.contributions.index', compact('members', 'contributions', 'month', 'target', 'yearlyContributions', 'year'));
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


