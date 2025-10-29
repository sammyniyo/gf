<?php $__env->startSection('page-title', 'Audit Logs'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Audit Logs</h1>
            <p class="text-sm text-slate-600 mt-1">Track all system activities and changes</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="document.getElementById('cleanupModal').classList.remove('hidden')"
                class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-white px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Cleanup Old Logs
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="glass-card p-6">
        <form method="GET" action="<?php echo e(route('admin.audit-logs.index')); ?>" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Search</label>
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                        placeholder="Search description, user..."
                        class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Action Filter -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Action</label>
                    <select name="action" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Actions</option>
                        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($action); ?>" <?php echo e(request('action') == $action ? 'selected' : ''); ?>>
                                <?php echo e(ucfirst($action)); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Model Type Filter -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Model Type</label>
                    <select name="model_type" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Types</option>
                        <?php $__currentLoopData = $modelTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type); ?>" <?php echo e(request('model_type') == $type ? 'selected' : ''); ?>>
                                <?php echo e($type); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- User Filter -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">User</label>
                    <select name="user_id" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Users</option>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>" <?php echo e(request('user_id') == $user->id ? 'selected' : ''); ?>>
                                <?php echo e($user->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Date From</label>
                    <input type="date" name="date_from" value="<?php echo e(request('date_from')); ?>"
                        class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Date To -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Date To</label>
                    <input type="date" name="date_to" value="<?php echo e(request('date_to')); ?>"
                        class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                    class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filter
                </button>
                <a href="<?php echo e(route('admin.audit-logs.index')); ?>"
                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Clear
                </a>
            </div>
        </form>
    </div>

    <!-- Audit Logs Table -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Time</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Action</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Model</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Details</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                <?php echo e($log->created_at->format('M d, Y H:i')); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-br from-indigo-100 to-slate-100 flex items-center justify-center">
                                        <span class="text-xs font-bold text-indigo-600">
                                            <?php echo e(substr($log->user_name ?? 'System', 0, 2)); ?>

                                        </span>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-slate-900"><?php echo e($log->user_name ?? 'System'); ?></p>
                                        <p class="text-xs text-slate-500"><?php echo e($log->user_email); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    <?php echo e($log->action_color === 'green' ? 'bg-green-100 text-green-800' : ''); ?>

                                    <?php echo e($log->action_color === 'blue' ? 'bg-blue-100 text-blue-800' : ''); ?>

                                    <?php echo e($log->action_color === 'red' ? 'bg-red-100 text-red-800' : ''); ?>

                                    <?php echo e($log->action_color === 'amber' ? 'bg-amber-100 text-amber-800' : ''); ?>

                                    <?php echo e($log->action_color === 'purple' ? 'bg-purple-100 text-purple-800' : ''); ?>

                                    <?php echo e($log->action_color === 'gray' ? 'bg-gray-100 text-gray-800' : ''); ?>">
                                    <?php echo e($log->action_label); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                <?php echo e($log->model_name); ?>

                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                <div class="max-w-md truncate"><?php echo e($log->description); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="<?php echo e(route('admin.audit-logs.show', $log)); ?>"
                                    class="text-indigo-600 hover:text-indigo-900">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="mt-2">No audit logs found</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($logs->hasPages()): ?>
            <div class="px-6 py-4 border-t border-slate-200">
                <?php echo e($logs->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Cleanup Modal -->
<div id="cleanupModal" class="hidden fixed inset-0 z-50 overflow-y-auto backdrop-blur-sm">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 transition-opacity bg-slate-900/50" onclick="document.getElementById('cleanupModal').classList.add('hidden')"></div>

        <!-- Modal -->
        <div class="relative inline-block overflow-hidden text-left align-bottom transition-all transform glass-card sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form method="POST" action="<?php echo e(route('admin.audit-logs.cleanup')); ?>">
                <?php echo csrf_field(); ?>
                <div class="px-6 pt-6 pb-4">
                    <div class="sm:flex sm:items-start gap-4">
                        <!-- Icon -->
                        <div class="flex items-center justify-center flex-shrink-0 w-14 h-14 mx-auto bg-gradient-to-br from-red-100 to-orange-100 rounded-2xl shadow-lg shadow-red-500/20 sm:mx-0">
                            <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>

                        <!-- Content -->
                        <div class="mt-4 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">
                                Cleanup Old Audit Logs
                            </h3>
                            <p class="text-sm text-slate-600 mb-5">
                                Permanently delete audit logs older than a specified period. This action cannot be undone.
                            </p>

                            <!-- Input -->
                            <div class="bg-slate-50 rounded-xl p-4 border border-slate-200">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">
                                    Delete logs older than (days):
                                </label>
                                <input type="number" name="days" value="90" min="1" max="365" required
                                    class="w-full rounded-xl border-slate-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-lg font-semibold text-slate-900">
                                <p class="mt-3 text-xs text-slate-500 flex items-start gap-2">
                                    <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Recommended: Keep logs for at least 90 days for compliance and troubleshooting purposes.</span>
                                </p>
                            </div>

                            <!-- Warning Box -->
                            <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-xl">
                                <div class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <div class="text-xs text-red-800">
                                        <span class="font-semibold">Warning:</span> This will permanently delete all matching audit logs. This action cannot be reversed.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-6 py-4 sm:flex sm:flex-row-reverse gap-3 border-t border-slate-200">
                    <button type="submit"
                        class="w-full inline-flex justify-center items-center gap-2 rounded-xl px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-sm font-semibold text-white shadow-lg shadow-red-600/30 hover:shadow-red-600/50 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all sm:w-auto">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Logs
                    </button>
                    <button type="button" onclick="document.getElementById('cleanupModal').classList.add('hidden')"
                        class="mt-3 w-full inline-flex justify-center items-center gap-2 rounded-xl border-2 border-slate-200 px-5 py-2.5 bg-white text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all sm:mt-0 sm:w-auto">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Documents/gf-1/resources/views/admin/audit-logs/index.blade.php ENDPATH**/ ?>