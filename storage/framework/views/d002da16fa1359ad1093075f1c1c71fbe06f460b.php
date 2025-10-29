<?php $__env->startSection('title', 'Utility Folder | God\'s Family Choir'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-amber-200/30 blur-3xl"></div>

    <section class="relative z-10 px-6 pt-32 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-lg">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                    <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                </svg>
                Utility Folder
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                Choir <span class="bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text text-transparent">Resources</span>
            </h1>
            <p class="mx-auto mt-6 max-w-3xl text-lg text-gray-600 leading-relaxed">
                Access lyrics, music sheets, announcements, code of conduct, and view our beautiful choir uniforms
            </p>
        </div>
    </section>
</div>

<!-- Category Filter -->
<section class="relative bg-white py-8">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <div class="flex items-center justify-center">
            <div class="inline-flex items-center gap-3 p-2 bg-gray-100 rounded-xl">
                <a href="<?php echo e(route('resources.index')); ?>"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-lg text-sm font-semibold transition-all
                   <?php echo e($selectedCategory === 'all' ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-gray-900'); ?>">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    All Resources
                </a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('resources.index', ['category' => $key])); ?>"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-lg text-sm font-semibold transition-all
                       <?php echo e($selectedCategory === $key ? 'bg-white text-emerald-600 shadow-md' : 'text-gray-600 hover:text-gray-900'); ?>">
                        <?php echo e($label); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>

<?php if($uniforms->count() > 0 && ($selectedCategory === 'all' || $selectedCategory === 'uniforms')): ?>
<!-- Uniforms Showcase Section -->
<section class="relative bg-gradient-to-b from-white to-gray-50 py-24">
    <div class="absolute inset-0 bg-gradient-to-br from-pink-50/30 via-white to-rose-50/20"></div>

    <div class="relative mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-pink-600 to-rose-600 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-lg">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h4a1 1 0 010 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414L5 6.414V8a1 1 0 01-2 0V4zm9 1a1 1 0 110-2h4a1 1 0 011 1v4a1 1 0 11-2 0V6.414l-2.293 2.293a1 1 0 11-1.414-1.414L13.586 5H12zm-9 7a1 1 0 112 0v1.586l2.293-2.293a1 1 0 011.414 1.414L6.414 15H8a1 1 0 110 2H4a1 1 0 01-1-1v-4zm13-1a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 110-2h1.586l-2.293-2.293a1 1 0 011.414-1.414L15 13.586V12a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Our Uniforms
            </span>
            <h2 class="mt-6 text-4xl font-bold text-gray-900 sm:text-5xl">
                Dressed in <span class="bg-gradient-to-r from-pink-600 to-rose-500 bg-clip-text text-transparent">Excellence</span>
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                Elegant, coordinated, and professional—our uniforms reflect the beauty of unity and the excellence of our ministry
            </p>
        </div>

        <!-- Uniforms Grid -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <?php $__currentLoopData = $uniforms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uniform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group relative">
                    <div class="relative overflow-hidden rounded-2xl border-2 border-gray-200 bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-pink-300">
                        <!-- Image -->
                        <div class="relative h-96 overflow-hidden bg-gradient-to-br from-pink-50 to-gray-100">
                            <img src="<?php echo e($uniform->file_url); ?>"
                                 alt="<?php echo e($uniform->title); ?>"
                                 class="h-full w-full object-cover object-center transition-transform duration-700 group-hover:scale-110">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                            <!-- Title on Image -->
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <h3 class="text-xl font-bold"><?php echo e($uniform->title); ?></h3>
                                <?php if($uniform->description): ?>
                                    <p class="mt-2 text-sm text-white/90"><?php echo e($uniform->description); ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Action Buttons Overlay -->
                            <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 flex gap-2">
                                <button onclick="openPreview(<?php echo e($uniform->id); ?>, '<?php echo e(addslashes($uniform->title)); ?>', 'image', '<?php echo e(route('resources.download', $uniform)); ?>')"
                                   class="inline-flex items-center gap-2 bg-white/95 backdrop-blur-sm text-pink-600 px-4 py-2 rounded-xl text-sm font-semibold shadow-lg hover:bg-white transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </button>
                                <a href="<?php echo e(route('resources.download', $uniform)); ?>"
                                   class="inline-flex items-center gap-2 bg-pink-600 backdrop-blur-sm text-white px-4 py-2 rounded-xl text-sm font-semibold shadow-lg hover:bg-pink-700 transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </div>

                        <!-- Decorative corner -->
                        <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-pink-500/10 to-transparent rounded-br-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Documents Section -->
<section class="relative bg-white py-24">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        <?php if($resources->count() > 0): ?>
            <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category !== 'uniforms'): ?> <!-- Skip uniforms as they're showcased above -->
                    <div class="mb-16 last:mb-0">
                        <!-- Category Header -->
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900"><?php echo e(\App\Models\Resource::getCategories()[$category] ?? $category); ?></h2>
                            <div class="mt-2 h-1 w-24 bg-gradient-to-r from-emerald-500 to-amber-500 rounded-full"></div>
                        </div>

                        <!-- Documents Grid -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="group relative overflow-hidden rounded-xl border-2 border-gray-200 bg-white p-6 shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1 hover:border-emerald-300">
                                    <!-- File Icon/Preview -->
                                    <div class="mb-4">
                                        <?php if($resource->isImage()): ?>
                                            <img src="<?php echo e($resource->file_url); ?>" alt="<?php echo e($resource->title); ?>" class="w-full h-40 object-cover rounded-lg">
                                        <?php elseif($resource->isPdf()): ?>
                                            <div class="w-full h-40 rounded-lg bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
                                                <svg class="w-20 h-20 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        <?php else: ?>
                                            <div class="w-full h-40 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                                <svg class="w-20 h-20 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Content -->
                                    <div class="mb-4">
                                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-emerald-600 transition-colors"><?php echo e($resource->title); ?></h3>
                                        <?php if($resource->description): ?>
                                            <p class="text-sm text-gray-600 line-clamp-2"><?php echo e($resource->description); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Meta Info -->
                                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                                        <span class="font-semibold"><?php echo e(strtoupper($resource->file_type)); ?></span>
                                        <span><?php echo e($resource->formatted_file_size); ?></span>
                                        <span><?php echo e($resource->downloads); ?> downloads</span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex items-center gap-2">
                                        <?php if($resource->isPdf() || $resource->isImage()): ?>
                                            <button onclick="openPreview(<?php echo e($resource->id); ?>, '<?php echo e(addslashes($resource->title)); ?>', '<?php echo e($resource->isPdf() ? 'pdf' : 'image'); ?>', '<?php echo e(route('resources.download', $resource)); ?>')"
                                               class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white transition-all hover:bg-emerald-500 hover:shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Preview
                                            </button>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('resources.download', $resource)); ?>"
                                           class="<?php echo e(($resource->isPdf() || $resource->isImage()) ? '' : 'flex-1'); ?> inline-flex items-center justify-center gap-2 rounded-lg border-2 border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition-all hover:border-emerald-500 hover:text-emerald-600 hover:shadow-lg">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">No Resources Available</h3>
                <p class="text-gray-600">Check back soon for new resources and documents.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Footer -->
<?php echo $__env->make('components.static.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Preview Modal -->
<div id="previewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/95 p-4 backdrop-blur-sm" onclick="closePreviewModal(event)">
    <div class="relative w-full max-w-6xl h-[90vh]" onclick="event.stopPropagation()">
        <!-- Close Button -->
        <button onclick="closePreviewModal()" class="absolute -top-12 right-0 z-10 flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-all duration-300 text-white font-semibold">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Close Preview
        </button>

        <!-- Download Button -->
        <a id="downloadButton" href="#" class="absolute -top-12 right-36 z-10 flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-500 rounded-lg transition-all duration-300 text-white font-semibold shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download
        </a>

        <!-- Resource Title -->
        <div class="absolute -top-12 left-0 z-10 px-4 py-2 bg-white/10 rounded-lg backdrop-blur-sm">
            <p id="previewTitle" class="text-white font-semibold"></p>
        </div>

        <!-- Preview Container -->
        <div class="w-full h-full bg-white rounded-xl overflow-hidden shadow-2xl">
            <!-- PDF Preview -->
            <iframe id="pdfPreview" class="w-full h-full hidden" frameborder="0"></iframe>

            <!-- Image Preview -->
            <div id="imagePreview" class="w-full h-full hidden items-center justify-center bg-gray-100">
                <img id="imagePreviewImg" src="" alt="" class="max-w-full max-h-full object-contain">
            </div>

            <!-- Loading State -->
            <div id="previewLoading" class="w-full h-full flex items-center justify-center">
                <div class="text-center">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-emerald-500 border-t-transparent"></div>
                    <p class="mt-4 text-gray-600 font-semibold">Loading preview...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openPreview(resourceId, title, type, downloadUrl) {
    const modal = document.getElementById('previewModal');
    const pdfPreview = document.getElementById('pdfPreview');
    const imagePreview = document.getElementById('imagePreview');
    const imagePreviewImg = document.getElementById('imagePreviewImg');
    const previewLoading = document.getElementById('previewLoading');
    const previewTitle = document.getElementById('previewTitle');
    const downloadButton = document.getElementById('downloadButton');

    // Set title and download link
    previewTitle.textContent = title;
    downloadButton.href = downloadUrl;

    // Show modal and loading state
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    previewLoading.classList.remove('hidden');
    pdfPreview.classList.add('hidden');
    imagePreview.classList.add('hidden');
    document.body.style.overflow = 'hidden';

    // Load preview based on type
    if (type === 'pdf') {
        const previewUrl = `/resources/${resourceId}/preview`;
        pdfPreview.src = previewUrl;

        // Wait a moment then show PDF
        setTimeout(() => {
            previewLoading.classList.add('hidden');
            pdfPreview.classList.remove('hidden');
        }, 500);
    } else {
        // For images, get the image URL and display it
        fetch(`/resources/${resourceId}/preview`)
            .then(response => response.blob())
            .then(blob => {
                const imageUrl = URL.createObjectURL(blob);
                imagePreviewImg.src = imageUrl;
                previewLoading.classList.add('hidden');
                imagePreview.classList.remove('hidden');
                imagePreview.classList.add('flex');
            })
            .catch(error => {
                console.error('Failed to load image:', error);
                previewLoading.innerHTML = '<p class="text-rose-600">Failed to load preview</p>';
            });
    }
}

function closePreviewModal(event) {
    if (event && event.target !== event.currentTarget && event.type === 'click') {
        return; // Don't close if clicking inside modal
    }

    const modal = document.getElementById('previewModal');
    const pdfPreview = document.getElementById('pdfPreview');
    const imagePreviewImg = document.getElementById('imagePreviewImg');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
    pdfPreview.src = '';
    imagePreviewImg.src = '';
    document.body.style.overflow = '';
}

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePreviewModal();
    }
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Documents/gf-1/resources/views/resources/index.blade.php ENDPATH**/ ?>