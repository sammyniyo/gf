<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contributions Report - {{ $month }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #4f46e5;
        }
        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #4f46e5;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 5px;
        }
        .report-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
            color: #0f172a;
        }
        .report-date {
            font-size: 12px;
            color: #64748b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: bold;
            padding: 12px 8px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            border-bottom: 2px solid #e2e8f0;
        }
        td {
            padding: 10px 8px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 12px;
        }
        tr.paid {
            background-color: #f0fdf4;
        }
        .status-paid {
            background-color: #10b981;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .status-unpaid {
            background-color: #e2e8f0;
            color: #64748b;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .champion {
            color: #ca8a04;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #94a3b8;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }
        .summary {
            margin-top: 20px;
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #4f46e5;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 13px;
        }
        .summary-label {
            color: #64748b;
        }
        .summary-value {
            font-weight: bold;
            color: #0f172a;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">🎵 God's Family Choir</div>
        <div class="subtitle">ASA UR Nyarugenge SDA | Kigali, Rwanda</div>
        <div class="report-title">Monthly Contributions Report</div>
        <div class="report-date">{{ \Carbon\Carbon::parse($month . '-01')->format('F Y') }}</div>
    </div>

    <!-- Summary -->
    <div class="summary">
        @php
            $totalPaid = $contributions->where('has_paid', true)->count();
            $totalAmount = $contributions->sum('amount');
        @endphp
        <div class="summary-item">
            <span class="summary-label">Total Members:</span>
            <span class="summary-value">{{ $members->count() }}</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Paid:</span>
            <span class="summary-value">{{ $totalPaid }} ({{ $members->count() > 0 ? round(($totalPaid / $members->count()) * 100) : 0 }}%)</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Collected:</span>
            <span class="summary-value">{{ number_format($totalAmount, 0) }} RWF</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Generated:</span>
            <span class="summary-value">{{ now()->format('M d, Y \a\t H:i') }}</span>
        </div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                <th style="width: 35%;">Member Name</th>
                <th style="width: 15%;">Status</th>
                <th style="width: 15%;">Amount</th>
                <th style="width: 15%;">Payment Date</th>
                <th style="width: 15%;">Yearly Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $index => $member)
                @php
                    $contribution = $contributions->get($member->id);
                    $hasPaid = $contribution && $contribution->has_paid;
                @endphp
                <tr class="{{ $hasPaid ? 'paid' : '' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td>
                        @if($hasPaid)
                            <span class="status-paid">✓ PAID</span>
                        @else
                            <span class="status-unpaid">PENDING</span>
                        @endif
                    </td>
                    <td>{{ $contribution ? number_format($contribution->amount, 0) : '0' }} RWF</td>
                    <td>{{ $contribution && $contribution->payment_date ? $contribution->payment_date->format('M d, Y') : '-' }}</td>
                    <td class="{{ isset($yearlyContributions[$member->id]) && $target && $yearlyContributions[$member->id]->total_amount >= $target->target_amount ? 'champion' : '' }}">
                        {{ isset($yearlyContributions[$member->id]) ? number_format($yearlyContributions[$member->id]->total_amount, 0) : '0' }} RWF
                        @if(isset($yearlyContributions[$member->id]) && $target && $yearlyContributions[$member->id]->total_amount >= $target->target_amount)
                            🏆
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>God's Family Choir - ASA UR Nyarugenge SDA</p>
        <p>Email: asa.godsfamilychoir2017@gmail.com | Phone: +250 783 871 782</p>
        <p>This is a computer-generated report. Generated on {{ now()->format('F d, Y \a\t H:i') }}</p>
    </div>
</body>
</html>


