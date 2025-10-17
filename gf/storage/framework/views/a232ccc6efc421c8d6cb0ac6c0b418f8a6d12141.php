<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contributions Report - <?php echo e($month); ?></title>
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
        <div class="report-date"><?php echo e(\Carbon\Carbon::parse($month . '-01')->format('F Y')); ?></div>
    </div>

    <!-- Summary -->
    <div class="summary">
        <?php
            $totalPaid = $contributions->where('has_paid', true)->count();
            $totalAmount = $contributions->sum('amount');
        ?>
        <div class="summary-item">
            <span class="summary-label">Total Members:</span>
            <span class="summary-value"><?php echo e($members->count()); ?></span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Paid:</span>
            <span class="summary-value"><?php echo e($totalPaid); ?> (<?php echo e($members->count() > 0 ? round(($totalPaid / $members->count()) * 100) : 0); ?>%)</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Collected:</span>
            <span class="summary-value"><?php echo e(number_format($totalAmount, 0)); ?> RWF</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Generated:</span>
            <span class="summary-value"><?php echo e(now()->format('M d, Y \a\t H:i')); ?></span>
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
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $contribution = $contributions->get($member->id);
                    $hasPaid = $contribution && $contribution->has_paid;
                ?>
                <tr class="<?php echo e($hasPaid ? 'paid' : ''); ?>">
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?></td>
                    <td>
                        <?php if($hasPaid): ?>
                            <span class="status-paid">✓ PAID</span>
                        <?php else: ?>
                            <span class="status-unpaid">PENDING</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($contribution ? number_format($contribution->amount, 0) : '0'); ?> RWF</td>
                    <td><?php echo e($contribution && $contribution->payment_date ? $contribution->payment_date->format('M d, Y') : '-'); ?></td>
                    <td class="<?php echo e(isset($yearlyContributions[$member->id]) && $target && $yearlyContributions[$member->id]->total_amount >= $target->target_amount ? 'champion' : ''); ?>">
                        <?php echo e(isset($yearlyContributions[$member->id]) ? number_format($yearlyContributions[$member->id]->total_amount, 0) : '0'); ?> RWF
                        <?php if(isset($yearlyContributions[$member->id]) && $target && $yearlyContributions[$member->id]->total_amount >= $target->target_amount): ?>
                            🏆
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>God's Family Choir - ASA UR Nyarugenge SDA</p>
        <p>Email: asa.godsfamilychoir2017@gmail.com | Phone: +250 783 871 782</p>
        <p>This is a computer-generated report. Generated on <?php echo e(now()->format('F d, Y \a\t H:i')); ?></p>
    </div>
</body>
</html>


<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/contributions/pdf.blade.php ENDPATH**/ ?>