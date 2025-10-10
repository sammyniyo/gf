<?php $__env->startSection('page-title', 'Event Registrations'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Event Registrations</h1>
            <p class="mt-1 text-sm text-slate-500">Manage all event registrations and ticket codes</p>
        </div>
        <a href="<?php echo e(route('admin.registrations.export')); ?>"
           class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Export to CSV
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="glass-card p-6">
        <form method="GET" class="space-y-4">
            <!-- Search Bar -->
            <div class="flex gap-4">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text"
                           id="search"
                           name="search"
                           value="<?php echo e(request('search')); ?>"
                           placeholder="Search by name, email, phone, or event..."
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="w-48">
                    <label for="event_id" class="block text-sm font-medium text-gray-700 mb-1">Event</label>
                    <select id="event_id" name="event_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Events</option>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($event->id); ?>" <?php echo e(request('event_id') == $event->id ? 'selected' : ''); ?>>
                                <?php echo e($event->title); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="w-32">
                    <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                    <select id="sort_by" name="sort_by" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="created_at" <?php echo e(request('sort_by') == 'created_at' ? 'selected' : ''); ?>>Date</option>
                        <option value="name" <?php echo e(request('sort_by') == 'name' ? 'selected' : ''); ?>>Name</option>
                        <option value="email" <?php echo e(request('sort_by') == 'email' ? 'selected' : ''); ?>>Email</option>
                        <option value="total_amount" <?php echo e(request('sort_by') == 'total_amount' ? 'selected' : ''); ?>>Amount</option>
                    </select>
                </div>
                <div class="w-24">
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                    <select id="sort_order" name="sort_order" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="desc" <?php echo e(request('sort_order') == 'desc' ? 'selected' : ''); ?>>Desc</option>
                        <option value="asc" <?php echo e(request('sort_order') == 'asc' ? 'selected' : ''); ?>>Asc</option>
                    </select>
                </div>
            </div>

            <!-- Date Range Filters -->
            <div class="flex gap-4">
                <div class="w-48">
                    <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                    <input type="date"
                           id="date_from"
                           name="date_from"
                           value="<?php echo e(request('date_from')); ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="w-48">
                    <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                    <input type="date"
                           id="date_to"
                           name="date_to"
                           value="<?php echo e(request('date_to')); ?>"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                        Apply Filters
                    </button>
                    <a href="<?php echo e(route('admin.registrations.index')); ?>"
                       class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">
                        Clear
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="glass-card px-5 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Registrations</p>
                    <p class="mt-2 text-2xl font-bold text-slate-900"><?php echo e($registrations->total()); ?></p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card px-5 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Total Tickets</p>
                    <p class="mt-2 text-2xl font-bold text-slate-900"><?php echo e($registrations->sum('tickets')); ?></p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card px-5 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">This Month</p>
                    <p class="mt-2 text-2xl font-bold text-slate-900">
                        <?php echo e($registrations->filter(function($reg) { return $reg->created_at->isCurrentMonth(); })->count()); ?>

                    </p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-sky-100">
                    <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card px-5 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-600">Today</p>
                    <p class="mt-2 text-2xl font-bold text-slate-900">
                        <?php echo e($registrations->filter(function($reg) { return $reg->created_at->isToday(); })->count()); ?>

                    </p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100">
                    <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrations List -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Participant</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tickets</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-600">
                                        <?php echo e(substr($registration->name, 0, 1)); ?>

                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900"><?php echo e($registration->name); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e($registration->email); ?></div>
                                        <?php if($registration->phone): ?>
                                            <div class="text-xs text-slate-400"><?php echo e($registration->phone); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900"><?php echo e($registration->event->title ?? 'N/A'); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if($registration->total_amount > 0): ?>
                                    <span class="text-sm font-semibold text-emerald-600"><?php echo e(number_format($registration->total_amount)); ?> RWF</span>
                                <?php else: ?>
                                    <span class="text-sm text-slate-400">Free</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                    <?php echo e($registration->tickets); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <code class="text-xs font-mono text-slate-600 bg-slate-100 px-2 py-1 rounded"><?php echo e($registration->registration_code); ?></code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900"><?php echo e($registration->created_at->format('M d, Y')); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e($registration->created_at->format('h:i A')); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?php echo e(route('admin.registrations.show', $registration)); ?>"
                                       class="text-indigo-600 hover:text-indigo-900 transition-colors">
                                        View
                                    </a>
                                    <form action="<?php echo e(route('admin.registrations.destroy', $registration)); ?>" method="POST" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-rose-600 hover:text-rose-900 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                    </div>
                                    <h3 class="mt-4 text-sm font-semibold text-slate-900">No registrations yet</h3>
                                    <p class="mt-1 text-sm text-slate-500">Event registrations will appear here once people start signing up</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-slate-600">
                    Showing <?php echo e($registrations->firstItem() ?? 0); ?> to <?php echo e($registrations->lastItem() ?? 0); ?>

                    of <?php echo e($registrations->total()); ?> results
                </div>
                <?php if($registrations->hasPages()): ?>
                    <div class="flex items-center space-x-2">
                        <?php echo e($registrations->links('pagination.tailwind')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/registrations/index.blade.php ENDPATH**/ ?>