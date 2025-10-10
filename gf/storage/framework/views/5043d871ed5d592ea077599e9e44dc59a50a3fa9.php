<?php $__env->startSection('content'); ?>
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="<?php echo e(route('admin.registrations.index')); ?>" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Registrations
        </a>
        <h1 class="mt-2 text-3xl font-bold text-gray-900">Registration Details</h1>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Registration Info -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Registration Information</h2>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="text-sm font-medium text-gray-600">Registration Code</label>
                    <p class="mt-1 text-lg font-mono text-gray-900"><?php echo e($registration->registration_code); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Name</label>
                    <p class="mt-1 text-lg text-gray-900"><?php echo e($registration->name); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Email</label>
                    <p class="mt-1 text-lg text-gray-900"><?php echo e($registration->email); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Phone</label>
                    <p class="mt-1 text-lg text-gray-900"><?php echo e($registration->phone ?? 'N/A'); ?></p>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-600">Number of Tickets</label>
                    <p class="mt-1">
                        <span class="inline-flex px-3 py-1 text-base font-semibold text-blue-800 bg-blue-100 rounded-full">
                            <?php echo e($registration->tickets); ?>

                        </span>
                    </p>
                </div>
                <?php if($registration->total_amount): ?>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Total Amount</label>
                        <p class="mt-1 text-lg text-gray-900">$<?php echo e(number_format($registration->total_amount, 2)); ?></p>
                    </div>
                <?php endif; ?>
                <div>
                    <label class="text-sm font-medium text-gray-600">Registration Date</label>
                    <p class="mt-1 text-lg text-gray-900"><?php echo e($registration->created_at->format('F d, Y')); ?></p>
                    <p class="text-sm text-gray-500"><?php echo e($registration->created_at->format('h:i A')); ?></p>
                </div>
            </div>
        </div>

        <!-- Event Info -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Event Information</h2>
            </div>
            <div class="p-6 space-y-4">
                <?php if($registration->event): ?>
                    <?php if($registration->event->image): ?>
                        <div>
                            <img src="<?php echo e(Storage::url($registration->event->image)); ?>" alt="<?php echo e($registration->event->name); ?>" class="object-cover w-full h-48 rounded-lg">
                        </div>
                    <?php endif; ?>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Event Name</label>
                        <p class="mt-1 text-lg font-semibold text-gray-900"><?php echo e($registration->event->name); ?></p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Description</label>
                        <p class="mt-1 text-gray-900"><?php echo e($registration->event->description); ?></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Date</label>
                            <p class="mt-1 text-gray-900"><?php echo e(\Carbon\Carbon::parse($registration->event->date)->format('M d, Y')); ?></p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Time</label>
                            <p class="mt-1 text-gray-900"><?php echo e($registration->event->time); ?></p>
                        </div>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Location</label>
                        <p class="mt-1 text-gray-900"><?php echo e($registration->event->location); ?></p>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">Event information not available</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="mt-6">
        <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="mb-4 text-lg font-semibold text-gray-900">Actions</h2>
            <div class="flex flex-wrap gap-3">
                <a href="<?php echo e(route('tickets.verify', $registration->registration_code)); ?>" target="_blank" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View Ticket
                </a>
                <form action="<?php echo e(route('admin.registrations.destroy', $registration)); ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this registration? This action cannot be undone.');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete Registration
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/registrations/show.blade.php ENDPATH**/ ?>