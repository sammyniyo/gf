

<?php $__env->startSection('page-title', 'Schedule Meeting'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl space-y-6">
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.meetings.index')); ?>" class="text-slate-400 hover:text-slate-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Schedule New Meeting</h1>
            <p class="mt-1 text-sm text-slate-500">Create and send meeting invitations</p>
        </div>
    </div>

    <div class="glass-card p-6">
        <form method="POST" action="<?php echo e(route('admin.meetings.store')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Meeting Title *</label>
                <input type="text" name="title" required
                       class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="3"
                          class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400"></textarea>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Date & Time *</label>
                    <input type="datetime-local" name="meeting_date" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Location</label>
                    <input type="text" name="location" placeholder="Physical location"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Virtual Meeting Link</label>
                    <input type="url" name="meeting_link" placeholder="https://zoom.us/..."
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Invite *</label>
                <select name="attendee_type" id="attendee-type" required
                        class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                    <option value="committee">Committee Members Only</option>
                    <option value="all_members">All Active Members</option>
                    <option value="custom">Select Specific Members</option>
                </select>
            </div>
            <div id="custom-members" class="hidden">
                <label class="block text-sm font-medium text-slate-700 mb-2">Select Members</label>
                <div class="max-h-48 overflow-y-auto space-y-2 border border-slate-200 rounded-lg p-3">
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="custom_attendees[]" value="<?php echo e($member->id); ?>"
                                   class="h-4 w-4 text-indigo-600 border-slate-300 rounded">
                            <span class="text-sm text-slate-700"><?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?></span>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-slate-200">
                <a href="<?php echo e(route('admin.meetings.index')); ?>" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Create Meeting</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('attendee-type').addEventListener('change', function() {
    const customDiv = document.getElementById('custom-members');
    customDiv.classList.toggle('hidden', this.value !== 'custom');
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/meetings/create.blade.php ENDPATH**/ ?>