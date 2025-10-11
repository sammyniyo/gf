<?php $__env->startSection('page-title', 'Contributions Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Contributions Management</h1>
            <p class="mt-1 text-sm text-slate-500">Track member contributions with advanced filtering and analytics</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.contributions.create')); ?>"
               class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Contribution
            </a>
            <a href="<?php echo e(route('admin.contributions.export')); ?>"
               class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Export
            </a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid gap-5 md:grid-cols-3">
        <div class="glass-card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-600">Total Amount</p>
                    <p class="text-2xl font-bold text-slate-900"><?php echo e(number_format($totalAmount, 0)); ?> RWF</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
            </div>
        </div>

    <div class="glass-card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-600">Paid Amount</p>
                    <p class="text-2xl font-bold text-emerald-600"><?php echo e(number_format($paidAmount, 0)); ?> RWF</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    </div>
            </div>
        </div>

        <div class="glass-card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-600">Pending Amount</p>
                    <p class="text-2xl font-bold text-amber-600"><?php echo e(number_format($pendingAmount, 0)); ?> RWF</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="glass-card p-6">
        <form method="GET" action="<?php echo e(route('admin.contributions.index')); ?>" class="space-y-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-slate-700 mb-2">Search</label>
                    <div class="relative">
                        <input type="text" name="search" id="search" value="<?php echo e(request('search')); ?>" placeholder="Search by name or email..."
                               class="w-full px-3 py-2 pl-9 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <svg class="absolute w-4 h-4 text-slate-400 left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Member Filter -->
                <div>
                    <label for="member_id" class="block text-sm font-medium text-slate-700 mb-2">Member</label>
                    <select name="member_id" id="member_id" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="">All Members</option>
                        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($member->id); ?>" <?php echo e(request('member_id') == $member->id ? 'selected' : ''); ?>>
                                <?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Payment Status -->
                <div>
                    <label for="payment_status" class="block text-sm font-medium text-slate-700 mb-2">Payment Status</label>
                    <select name="payment_status" id="payment_status" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="">All Status</option>
                        <option value="paid" <?php echo e(request('payment_status') === 'paid' ? 'selected' : ''); ?>>Paid</option>
                        <option value="pending" <?php echo e(request('payment_status') === 'pending' ? 'selected' : ''); ?>>Pending</option>
                    </select>
                </div>

                <!-- Payment Type -->
                <div>
                    <label for="payment_type" class="block text-sm font-medium text-slate-700 mb-2">Payment Type</label>
                    <select name="payment_type" id="payment_type" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="">All Types</option>
                        <option value="monthly" <?php echo e(request('payment_type') === 'monthly' ? 'selected' : ''); ?>>Monthly</option>
                        <option value="one_time" <?php echo e(request('payment_type') === 'one_time' ? 'selected' : ''); ?>>One-time</option>
                    </select>
                </div>

                <!-- Target Filter -->
                <div>
                    <label for="target_id" class="block text-sm font-medium text-slate-700 mb-2">Target</label>
                    <select name="target_id" id="target_id" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="">All Targets</option>
                        <?php $__currentLoopData = $targets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($target->id); ?>" <?php echo e(request('target_id') == $target->id ? 'selected' : ''); ?>>
                                <?php echo e($target->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label for="date_from" class="block text-sm font-medium text-slate-700 mb-2">From Date</label>
                    <input type="date" name="date_from" id="date_from" value="<?php echo e(request('date_from')); ?>"
                           class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                </div>

                <!-- Date To -->
                <div>
                    <label for="date_to" class="block text-sm font-medium text-slate-700 mb-2">To Date</label>
                    <input type="date" name="date_to" id="date_to" value="<?php echo e(request('date_to')); ?>"
                           class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                </div>

                <!-- Sort By -->
                <div>
                    <label for="sort_by" class="block text-sm font-medium text-slate-700 mb-2">Sort By</label>
                    <select name="sort_by" id="sort_by" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="created_at" <?php echo e(request('sort_by') === 'created_at' ? 'selected' : ''); ?>>Date Created</option>
                        <option value="amount" <?php echo e(request('sort_by') === 'amount' ? 'selected' : ''); ?>>Amount</option>
                        <option value="payment_date" <?php echo e(request('sort_by') === 'payment_date' ? 'selected' : ''); ?>>Payment Date</option>
                    </select>
                </div>

                <!-- Sort Order -->
                            <div>
                    <label for="sort_order" class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                    <select name="sort_order" id="sort_order" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="desc" <?php echo e(request('sort_order') === 'desc' ? 'selected' : ''); ?>>Descending</option>
                        <option value="asc" <?php echo e(request('sort_order') === 'asc' ? 'selected' : ''); ?>>Ascending</option>
                    </select>
                            </div>
                        </div>

            <!-- Filter Buttons -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-200">
                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z" />
                        </svg>
                        Apply Filters
                    </button>
                    <a href="<?php echo e(route('admin.contributions.index')); ?>"
                       class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Clear
                    </a>
                </div>

                <div class="text-sm text-slate-500">
                    Showing <?php echo e($contributions->count()); ?> of <?php echo e($contributions->total()); ?> contributions
                </div>
            </div>
        </form>
    </div>

    <!-- Contributions Table -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Member</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Payment Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Target</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Payment Date</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <?php $__empty_1 = true; $__currentLoopData = $contributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contribution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-600">
                                        <?php echo e(substr($contribution->member->first_name ?? 'U', 0, 1)); ?><?php echo e(substr($contribution->member->last_name ?? 'N', 0, 1)); ?>

                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900">
                                            <?php echo e($contribution->member->first_name ?? 'Unknown'); ?> <?php echo e($contribution->member->last_name ?? 'Member'); ?>

                                        </div>
                                        <div class="text-xs text-slate-500"><?php echo e($contribution->member->email ?? 'No email'); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="text-sm font-semibold text-slate-900">
                                    <?php echo e(number_format($contribution->amount, 0)); ?> RWF
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                    <?php echo e($contribution->has_paid ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'); ?>">
                                    <?php echo e($contribution->has_paid ? 'Paid' : 'Pending'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                    <?php echo e($contribution->payment_type === 'monthly' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800'); ?>">
                                    <?php echo e(ucfirst(str_replace('_', ' ', $contribution->payment_type ?? 'monthly'))); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-slate-600">
                                    <?php echo e($contribution->target->name ?? 'No target'); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-slate-600">
                                    <?php echo e($contribution->payment_date ? $contribution->payment_date->format('M d, Y') : '-'); ?>

                                    </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="<?php echo e(route('admin.contributions.show', $contribution)); ?>"
                                        class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        View
                                    </a>
                                    <a href="<?php echo e(route('admin.contributions.edit', $contribution)); ?>"
                                       class="text-slate-600 hover:text-slate-900 text-sm font-medium">
                                        Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.contributions.destroy', $contribution)); ?>"
                                          class="inline" onsubmit="return confirm('Are you sure you want to delete this contribution?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm font-medium">
                                            Delete
                                </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 mb-4">
                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-semibold text-slate-900 mb-1">No contributions found</h3>
                                    <p class="text-sm text-slate-500">Contributions will appear here once they are recorded</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
    </div>
</div>

    <!-- Pagination -->
    <?php if($contributions->hasPages()): ?>
        <div class="glass-card px-6 py-4">
            <?php echo e($contributions->links('pagination.tailwind')); ?>

            </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/contributions/index.blade.php ENDPATH**/ ?>