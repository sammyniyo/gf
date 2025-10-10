<?php $__env->startSection('page-title', 'Edit Committee Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.committees.index')); ?>" class="text-slate-400 hover:text-slate-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Edit Committee Member</h1>
            <p class="mt-1 text-sm text-slate-500">Update member information</p>
        </div>
    </div>

    <!-- Form -->
    <div class="glass-card p-6">
        <form method="POST" action="<?php echo e(route('admin.committees.update', $committee)); ?>" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <?php if($committee->photo): ?>
                <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-lg border border-slate-200">
                    <img src="<?php echo e(Storage::url($committee->photo)); ?>" alt="<?php echo e($committee->name); ?>"
                         class="h-20 w-20 rounded-lg object-cover">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-900">Current Photo</p>
                        <p class="text-xs text-slate-500">Upload a new photo to replace</p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name *</label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name', $committee->name)); ?>" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="position" class="block text-sm font-medium text-slate-700 mb-2">Position *</label>
                    <input type="text" name="position" id="position" value="<?php echo e(old('position', $committee->position)); ?>" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="department" class="block text-sm font-medium text-slate-700 mb-2">Department *</label>
                    <select name="department" id="department" required
                            class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="">Select Department</option>
                        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($dept); ?>" <?php echo e(old('department', $committee->department) == $dept ? 'selected' : ''); ?>><?php echo e($dept); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Display Order</label>
                    <input type="number" name="order" id="order" value="<?php echo e(old('order', $committee->order)); ?>" min="0"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email', $committee->email)); ?>"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" value="<?php echo e(old('phone', $committee->phone)); ?>"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-slate-700 mb-2">Photo (leave empty to keep current)</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                       class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="bio" class="block text-sm font-medium text-slate-700 mb-2">Biography</label>
                <textarea name="bio" id="bio" rows="4"
                          class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400"><?php echo e(old('bio', $committee->bio)); ?></textarea>
                <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo e(old('is_active', $committee->is_active) ? 'checked' : ''); ?>

                       class="h-4 w-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-400">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active (visible on website)</label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                <a href="<?php echo e(route('admin.committees.index')); ?>"
                   class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500">
                    Update Member
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/committees/edit.blade.php ENDPATH**/ ?>