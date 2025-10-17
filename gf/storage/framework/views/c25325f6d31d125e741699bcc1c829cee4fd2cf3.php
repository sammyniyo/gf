<?php $__env->startSection('page-title', 'Upload Resource'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="<?php echo e(route('admin.resources.index')); ?>" class="inline-flex items-center justify-center w-10 h-10 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 transition">
            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Upload New Resource</h1>
            <p class="mt-1 text-sm text-slate-600">Add a new document to the utility folder</p>
        </div>
    </div>

    <!-- Form -->
    <form action="<?php echo e(route('admin.resources.store')); ?>" method="POST" enctype="multipart/form-data" class="glass-card p-8 space-y-6">
        <?php echo csrf_field(); ?>

        <?php if($errors->any()): ?>
            <div class="rounded-lg bg-rose-50 border border-rose-200 p-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-rose-800 mb-1">Upload Failed</h3>
                        <ul class="text-sm text-rose-700 space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>• <?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Title <span class="text-rose-500">*</span>
            </label>
            <input type="text" name="title" id="title" required
                   value="<?php echo e(old('title')); ?>"
                   class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400"
                   placeholder="Enter resource title">
            <?php $__errorArgs = ['title'];
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

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Description
            </label>
            <textarea name="description" id="description" rows="3"
                      class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400"
                      placeholder="Enter resource description (optional)"><?php echo e(old('description')); ?></textarea>
            <?php $__errorArgs = ['description'];
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

        <!-- Category -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Category <span class="text-rose-500">*</span>
            </label>
            <select name="category" id="category" required
                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400">
                <option value="">Select a category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e(old('category') === $key ? 'selected' : ''); ?>>
                        <?php echo e($label); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <p class="mt-2 text-xs text-slate-500">
                <strong>Tip:</strong> Choose "Uniforms" for uniform photos, "Lyrics" for song lyrics PDFs, etc.
            </p>
        </div>

        <!-- File Upload -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                File <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <input type="file" name="file" id="file" required
                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.webp"
                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
            </div>
            <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <p class="mt-2 text-xs text-slate-500">
                Accepted formats: PDF, DOC, DOCX, JPG, PNG, GIF, WEBP (Max: 20MB)
            </p>

            <!-- File Preview -->
            <div id="filePreview" class="mt-4 hidden">
                <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-lg border border-slate-200">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p id="fileName" class="text-sm font-semibold text-slate-900"></p>
                        <p id="fileSize" class="text-xs text-slate-500"></p>
                    </div>
                    <button type="button" onclick="clearFile()" class="text-slate-400 hover:text-rose-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Status Toggle -->
        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-lg">
            <input type="checkbox" name="is_active" id="is_active" checked
                   class="w-5 h-5 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500 focus:ring-offset-0">
            <label for="is_active" class="text-sm font-medium text-slate-700">
                Make resource active immediately
            </label>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-3 pt-4">
            <button type="submit"
                    class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                Upload Resource
            </button>
            <a href="<?php echo e(route('admin.resources.index')); ?>"
               class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
document.getElementById('file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById('filePreview').classList.remove('hidden');
        document.getElementById('fileName').textContent = file.name;

        const fileSize = (file.size / 1024).toFixed(2);
        document.getElementById('fileSize').textContent = fileSize < 1024
            ? fileSize + ' KB'
            : (fileSize / 1024).toFixed(2) + ' MB';
    }
});

function clearFile() {
    document.getElementById('file').value = '';
    document.getElementById('filePreview').classList.add('hidden');
}
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/resources/create.blade.php ENDPATH**/ ?>