

<?php $__env->startSection('page-title', 'Add Story'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl space-y-6">
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.stories.index')); ?>" class="text-slate-400 hover:text-slate-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Add New Story</h1>
            <p class="mt-1 text-sm text-slate-500">Share a behind-the-scenes story</p>
        </div>
    </div>

    <div class="glass-card p-6">
        <form method="POST" action="<?php echo e(route('admin.stories.store')); ?>" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title *</label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Category</label>
                    <input type="text" name="category" value="<?php echo e(old('category')); ?>" placeholder="e.g., Testimony, Event"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Event Date</label>
                    <input type="date" name="event_date" value="<?php echo e(old('event_date')); ?>"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Excerpt</label>
                    <textarea name="excerpt" rows="2" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400"><?php echo e(old('excerpt')); ?></textarea>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Content *</label>
                    <textarea name="content" rows="8" required class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400"><?php echo e(old('content')); ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Featured Image</label>
                    <input type="file" name="featured_image" accept="image/*"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Location</label>
                    <input type="text" name="location" value="<?php echo e(old('location')); ?>"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_published" id="is_published" value="1" <?php echo e(old('is_published') ? 'checked' : ''); ?>

                       class="h-4 w-4 text-indigo-600 border-slate-300 rounded">
                <label for="is_published" class="ml-2 text-sm text-slate-700">Publish immediately</label>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-slate-200">
                <a href="<?php echo e(route('admin.stories.index')); ?>" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Create Story</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/stories/create.blade.php ENDPATH**/ ?>