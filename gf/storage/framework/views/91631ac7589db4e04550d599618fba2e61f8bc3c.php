<?php $__env->startSection('title', 'Create Devotion'); ?>

<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('admin.devotions.store')); ?>" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <?php echo csrf_field(); ?>

    <div class="lg:col-span-2 space-y-6">
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Content</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                    <input type="text" name="title" value="<?php echo e(old('title')); ?>" required class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Scripture Reference</label>
                    <input type="text" name="scripture_reference" value="<?php echo e(old('scripture_reference')); ?>" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400" placeholder="John 3:16">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Excerpt</label>
                    <textarea name="excerpt" rows="3" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400" placeholder="Short summary..."><?php echo e(old('excerpt')); ?></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Content</label>
                    <div id="editor-container" class="bg-white rounded-lg border border-slate-300"></div>
                    <textarea name="content" id="content" class="hidden" required><?php echo e(old('content')); ?></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Publish</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                    <input type="text" name="category" value="<?php echo e(old('category', 'general')); ?>" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Publish Date</label>
                    <input type="datetime-local" name="published_at" value="<?php echo e(old('published_at')); ?>" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_published" value="1" class="rounded border-slate-300 text-slate-900 focus:ring-slate-400" <?php echo e(old('is_published') ? 'checked' : ''); ?>>
                    <span class="text-sm text-slate-700">Publish now</span>
                </label>
            </div>

            <div class="mt-6 flex gap-2">
                <a href="<?php echo e(route('admin.devotions.index')); ?>" class="inline-flex items-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">Create Devotion</button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    #editor-container {
        height: 400px;
    }
    .ql-editor {
        font-size: 16px;
        line-height: 1.6;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link'],
                ['clean']
            ]
        },
        placeholder: 'Write the devotion...'
    });

    // Set initial content
    const oldContent = <?php echo json_encode(old('content', '')); ?>;
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Update hidden textarea on form submit
    const form = document.querySelector('form');
    const contentField = document.querySelector('#content');

    form.addEventListener('submit', function(e) {
        contentField.value = quill.root.innerHTML;
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/devotions/create.blade.php ENDPATH**/ ?>