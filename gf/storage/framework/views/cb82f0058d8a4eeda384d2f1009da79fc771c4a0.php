

<?php $__env->startSection('page-title', 'Monthly Contributions'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header with Month Selector -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Monthly Contributions</h1>
            <p class="mt-1 text-sm text-slate-500">Track member contributions and yearly targets</p>
        </div>
        <div class="flex items-center gap-3">
            <input type="month" id="month-selector" value="<?php echo e($month); ?>"
                   onchange="window.location.href='<?php echo e(route('admin.contributions.index')); ?>?month=' + this.value"
                   class="px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
            <a href="<?php echo e(route('admin.contributions.export')); ?>?month=<?php echo e($month); ?>"
               class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Export PDF
            </a>
        </div>
    </div>

    <!-- Yearly Target Card -->
    <div class="glass-card p-6">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-slate-900 mb-2"><?php echo e($year); ?> Yearly Target</h3>
                <?php if($target): ?>
                    <div class="flex items-baseline gap-2">
                        <span class="text-3xl font-bold text-indigo-600"><?php echo e(number_format($target->target_amount, 0)); ?></span>
                        <span class="text-sm text-slate-500">RWF</span>
                    </div>
                    <?php if($target->description): ?>
                        <p class="mt-2 text-sm text-slate-600"><?php echo e($target->description); ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="text-sm text-slate-500">No target set for <?php echo e($year); ?></p>
                <?php endif; ?>
            </div>
            <button onclick="document.getElementById('target-modal').classList.remove('hidden'); document.getElementById('target-modal').classList.add('flex')"
                    class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Set Yearly Target
            </button>
        </div>
    </div>

    <!-- Champions Section (Members who met yearly target) -->
    <?php if($target): ?>
        <?php
            $champions = $yearlyContributions->filter(function($contrib) use ($target) {
                return $contrib->total_amount >= $target->target_amount;
            });
        ?>

        <?php if($champions->count() > 0): ?>
            <div class="glass-card p-6">
                <div class="flex items-center gap-3 mb-4">
                    <h3 class="text-lg font-semibold text-slate-900">🏆 <?php echo e($year); ?> Champions</h3>
                    <span class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                        <?php echo e($champions->count()); ?> <?php echo e($champions->count() === 1 ? 'Champion' : 'Champions'); ?>

                    </span>
                </div>
                <div class="flex flex-wrap gap-3">
                    <?php $__currentLoopData = $champions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $champion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center gap-2 rounded-xl bg-gradient-to-r from-yellow-100 to-amber-100 border border-yellow-300 px-4 py-2">
                            <span class="text-2xl">🏆</span>
                            <div>
                                <p class="text-sm font-bold text-slate-900"><?php echo e($champion->member->first_name); ?> <?php echo e($champion->member->last_name); ?></p>
                                <p class="text-xs text-amber-700"><?php echo e(number_format($champion->total_amount, 0)); ?> RWF</p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Contributions Table -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Member</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Payment Date</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Yearly Total</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $contribution = $contributions->get($member->id);
                            $yearlyTotal = $yearlyContributions->get($member->id);
                            $hasPaid = $contribution && $contribution->has_paid;
                        ?>
                        <tr class="hover:bg-slate-50/50 transition-colors <?php echo e($hasPaid ? 'bg-emerald-50/30' : ''); ?>">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full <?php echo e($hasPaid ? 'bg-emerald-100 text-emerald-600' : 'bg-slate-100 text-slate-600'); ?> text-sm font-semibold">
                                        <?php echo e(substr($member->first_name, 0, 1)); ?><?php echo e(substr($member->last_name, 0, 1)); ?>

                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900"><?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e($member->email); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <form action="<?php echo e(route('admin.contributions.toggle')); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="member_id" value="<?php echo e($member->id); ?>">
                                    <input type="hidden" name="month" value="<?php echo e($month); ?>">
                                    <input type="hidden" name="amount" value="0">
                                    <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-lg transition <?php echo e($hasPaid ? 'bg-emerald-500 hover:bg-emerald-600' : 'bg-slate-200 hover:bg-slate-300'); ?>">
                                        <?php if($hasPaid): ?>
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        <?php else: ?>
                                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        <?php endif; ?>
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-semibold text-slate-900">
                                    <?php echo e($contribution ? number_format($contribution->amount, 0) : '0'); ?> RWF
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-slate-600">
                                    <?php echo e($contribution && $contribution->payment_date ? $contribution->payment_date->format('M d, Y') : '-'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-semibold text-slate-900">
                                        <?php echo e($yearlyTotal ? number_format($yearlyTotal->total_amount, 0) : '0'); ?> RWF
                                    </span>
                                    <?php if($target && $yearlyTotal && $yearlyTotal->total_amount >= $target->target_amount): ?>
                                        <span class="text-lg">🏆</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button onclick="editContribution(<?php echo e($member->id); ?>, '<?php echo e($contribution ? $contribution->amount : 0); ?>')"
                                        class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Set Target Modal -->
<div id="target-modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 backdrop-blur-sm">
    <div class="glass-card max-w-md mx-4 p-6">
        <h3 class="text-lg font-semibold text-slate-900 mb-4">Set Yearly Target for <?php echo e($year); ?></h3>
        <form action="<?php echo e(route('admin.contributions.target')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="year" value="<?php echo e($year); ?>">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Target Amount (RWF)</label>
                <input type="number" name="target_amount" value="<?php echo e($target->target_amount ?? ''); ?>" required
                       class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="2"
                          class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400"><?php echo e($target->description ?? ''); ?></textarea>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-slate-200">
                <button type="button" onclick="document.getElementById('target-modal').classList.add('hidden'); document.getElementById('target-modal').classList.remove('flex')"
                        class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
                    Save Target
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function editContribution(memberId, currentAmount) {
    const newAmount = prompt('Enter contribution amount (RWF):', currentAmount);
    if (newAmount !== null && !isNaN(newAmount)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo e(route('admin.contributions.toggle')); ?>';
        form.innerHTML = `
            <?php echo csrf_field(); ?>
            <input type="hidden" name="member_id" value="${memberId}">
            <input type="hidden" name="month" value="<?php echo e($month); ?>">
            <input type="hidden" name="amount" value="${newAmount}">
        `;
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/contributions/index.blade.php ENDPATH**/ ?>