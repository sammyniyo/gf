<?php $__env->startSection('title', 'Edit Member - ' . $member->full_name); ?>

<?php $__env->startSection('content'); ?>
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Edit Member</h1>
                    <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Member
                    </a>
                </div>

                <form method="POST" action="<?php echo e(route('admin.members.update', $member)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select id="status" name="status" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="pending" <?php echo e($member->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="active" <?php echo e($member->status === 'active' ? 'selected' : ''); ?>>Active</option>
                                <option value="inactive" <?php echo e($member->status === 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                            </select>
                        </div>

                        <div>
                            <label for="voice_type" class="block text-sm font-medium text-gray-700 mb-2">Voice Type</label>
                            <select id="voice_type" name="voice_type"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Select voice type</option>
                                <option value="soprano" <?php echo e($member->voice_type === 'soprano' ? 'selected' : ''); ?>>Soprano</option>
                                <option value="alto" <?php echo e($member->voice_type === 'alto' ? 'selected' : ''); ?>>Alto</option>
                                <option value="tenor" <?php echo e($member->voice_type === 'tenor' ? 'selected' : ''); ?>>Tenor</option>
                                <option value="bass" <?php echo e($member->voice_type === 'bass' ? 'selected' : ''); ?>>Bass</option>
                                <option value="unsure" <?php echo e($member->voice_type === 'unsure' ? 'selected' : ''); ?>>Not sure</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                        <textarea id="notes" name="notes" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Add any admin notes about this member..."><?php echo e(old('notes', $member->notes ?? '')); ?></textarea>
                    </div>

                    <div class="flex justify-end space-x-4 mt-8">
                        <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                            class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-all duration-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-200">
                            <i class="fas fa-save mr-2"></i>Update Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/members/edit.blade.php ENDPATH**/ ?>