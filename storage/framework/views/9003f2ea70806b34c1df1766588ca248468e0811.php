<?php $__env->startSection('page-title', 'Site Settings'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Site Settings</h2>
        <p class="text-slate-600 mt-1">Control site-wide maintenance and coming soon mode</p>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.site-settings.update')); ?>" method="POST" class="glass-card p-8 space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Coming Soon Mode Toggle -->
        <div class="flex items-center justify-between p-6 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-lg border-2 border-emerald-200">
            <div>
                <label for="is_coming_soon" class="text-lg font-semibold text-slate-900">Enable Coming Soon Mode</label>
                <p class="text-sm text-slate-600 mt-1">Show a coming soon page site-wide</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_coming_soon" value="0">
                <input type="checkbox" name="is_coming_soon" id="is_coming_soon" value="1" class="sr-only peer" <?php echo e($settings->is_coming_soon ? 'checked' : ''); ?>>
                <div class="w-14 h-8 bg-slate-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-7 after:w-7 after:transition-all peer-checked:bg-emerald-600"></div>
            </label>
        </div>

        <!-- Title -->
        <div>
            <label for="coming_soon_title" class="block text-sm font-semibold text-slate-900 mb-2">
                Coming Soon Title
            </label>
            <input
                type="text"
                name="coming_soon_title"
                id="coming_soon_title"
                value="<?php echo e(old('coming_soon_title', $settings->coming_soon_title)); ?>"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                placeholder="Coming Soon!"
            >
        </div>

        <!-- Message -->
        <div>
            <label for="coming_soon_message" class="block text-sm font-semibold text-slate-900 mb-2">
                Coming Soon Message
            </label>
            <textarea
                name="coming_soon_message"
                id="coming_soon_message"
                rows="3"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                placeholder="We are working hard to bring you something amazing..."
            ><?php echo e(old('coming_soon_message', $settings->coming_soon_message)); ?></textarea>
        </div>

        <!-- Target Date -->
        <div>
            <label for="target_date" class="block text-sm font-semibold text-slate-900 mb-2">
                Launch Date (Optional)
            </label>
            <input
                type="date"
                name="target_date"
                id="target_date"
                value="<?php echo e(old('target_date', $settings->target_date ? $settings->target_date->format('Y-m-d') : '')); ?>"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
            >
            <p class="text-xs text-slate-500 mt-1">Leave empty to auto-calculate next Thursday</p>
        </div>

        <!-- Contact Email -->
        <div>
            <label for="contact_email" class="block text-sm font-semibold text-slate-900 mb-2">
                Contact Email (Optional)
            </label>
            <input
                type="email"
                name="contact_email"
                id="contact_email"
                value="<?php echo e(old('contact_email', $settings->contact_email)); ?>"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                placeholder="contact@example.com"
            >
        </div>

        <!-- Current Status -->
        <div class="p-4 bg-blue-50 border border-blue-200 rounded-lg">
            <div class="flex items-center gap-2 text-blue-800">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span class="font-semibold">Coming Soon Mode is <?php echo e($settings->is_coming_soon ? 'ACTIVE' : 'INACTIVE'); ?></span>
            </div>
            <p class="text-sm text-blue-700 mt-2">
                When active, only admins can access the site. All other visitors will see the coming soon page.
            </p>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-4 border-t border-slate-200">
            <div class="text-sm text-slate-500">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Changes take effect immediately
            </div>
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white text-sm font-semibold rounded-lg hover:bg-emerald-700 transition">
                Save Settings
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\resources\views/admin/site-settings/index.blade.php ENDPATH**/ ?>