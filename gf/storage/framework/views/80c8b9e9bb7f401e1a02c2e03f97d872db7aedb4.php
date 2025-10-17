<?php $__env->startSection('title', 'Behind Stories'); ?>
<?php $__env->startSection('page-title', 'Behind Stories'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header with Actions -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Behind Stories</h1>
            <p class="mt-1 text-sm text-slate-500">Manage stories about the choir's journey</p>
        </div>
        <a href="<?php echo e(route('admin.stories.create')); ?>" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white shadow hover:bg-slate-800">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Story
        </a>
    </div>

    <!-- Filters -->
    <div class="glass-card p-4">
        <form action="<?php echo e(route('admin.stories.index')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Search</label>
                <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search stories..." class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400 text-sm">
                        </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Status</label>
                <select name="status" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400 text-sm">
                                <option value="all">All Statuses</option>
                                <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>Draft</option>
                                <option value="published" <?php echo e(request('status') == 'published' ? 'selected' : ''); ?>>Published</option>
                                <option value="archived" <?php echo e(request('status') == 'archived' ? 'selected' : ''); ?>>Archived</option>
                            </select>
                        </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                <select name="category" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400 text-sm">
                                <option value="all">All Categories</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e(request('category') == $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">Filter</button>
                <a href="<?php echo e(route('admin.stories.index')); ?>" class="inline-flex items-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Reset</a>
            </div>
        </form>
    </div>

    <!-- Stories Table -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Views</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Reading Time</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Published</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Actions</th>
                                </tr>
                            </thead>
                <tbody class="bg-white divide-y divide-slate-100">
                                <?php $__empty_1 = true; $__currentLoopData = $stories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4">
                                            <?php if($story->featured_image): ?>
                                    <img src="<?php echo e(asset('storage/' . $story->featured_image)); ?>" alt="<?php echo e($story->title); ?>" class="w-12 h-12 rounded-lg object-cover">
                                            <?php else: ?>
                                    <div class="w-12 h-12 rounded-lg bg-slate-100 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.stories.edit', $story)); ?>" class="text-sm font-semibold text-slate-900 hover:text-indigo-600"><?php echo e(Str::limit($story->title, 40)); ?></a>
                                                    <?php if($story->is_featured): ?>
                                        <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                    <?php endif; ?>
                                            </div>
                                        </td>
                            <td class="px-6 py-4"><span class="inline-flex items-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-xs font-semibold text-indigo-700"><?php echo e($categories[$story->category] ?? ucfirst($story->category)); ?></span></td>
                            <td class="px-6 py-4 text-sm text-slate-600"><?php echo e($story->author ? $story->author->name : 'N/A'); ?></td>
                            <td class="px-6 py-4">
                                            <?php if($story->status == 'published'): ?>
                                    <span class="inline-flex items-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">Published</span>
                                            <?php elseif($story->status == 'draft'): ?>
                                    <span class="inline-flex items-center rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-600">Draft</span>
                                            <?php else: ?>
                                    <span class="inline-flex items-center rounded-full bg-rose-100 px-2.5 py-0.5 text-xs font-semibold text-rose-700">Archived</span>
                                            <?php endif; ?>
                                        </td>
                            <td class="px-6 py-4 text-sm text-slate-600"><?php echo e(number_format($story->views_count ?? 0)); ?></td>
                            <td class="px-6 py-4 text-sm text-slate-600"><?php echo e($story->reading_time ?? 0); ?> min</td>
                            <td class="px-6 py-4 text-sm text-slate-600"><?php echo e($story->published_at ? $story->published_at->format('M d, Y') : 'Not published'); ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?php echo e(route('admin.stories.edit', $story)); ?>" class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50">Edit</a>
                                    <form method="POST" action="<?php echo e(route('admin.stories.destroy', $story)); ?>" onsubmit="return confirm('Delete this story?');">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="inline-flex items-center gap-1 rounded-lg border border-rose-200 bg-white px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                            <td colspan="9" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                <p class="mt-2 text-sm text-slate-500">No stories found. Create your first story!</p>
                                <a href="<?php echo e(route('admin.stories.create')); ?>" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    Create New Story
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($stories->hasPages()): ?>
            <div class="border-t border-slate-200 px-6 py-4">
                            <?php echo e($stories->links()); ?>

                        </div>
                    <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/stories/index.blade.php ENDPATH**/ ?>