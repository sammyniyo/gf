{{-- resources/views/gallery.blade.php --}}
@extends('layouts.app')

@section('title', "Gallery | God's Family Choir")

@push('styles')
<style>
    /* Ensure navbar stays on top */
    header.bg-gradient-to-r {
        position: sticky !important;
        top: 0 !important;
        z-index: 100 !important;
    }

    /* Lightbox Modal */
    .lightbox-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(10px);
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
    }

    .lightbox-modal.active {
        display: flex;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .lightbox-content {
        position: relative;
        max-width: 90vw;
        max-height: 90vh;
    }

    .lightbox-image {
        max-width: 100%;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 0.5rem;
        user-select: none;
        -webkit-user-drag: none;
    }

    .lightbox-close,
    .lightbox-nav {
        position: absolute;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        width: 3rem;
        height: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transition: background 0.3s;
    }

    .lightbox-close:hover,
    .lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .lightbox-close {
        top: -3rem;
        right: 0;
    }

    .lightbox-prev {
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
    }

    .lightbox-next {
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Filter Buttons */
    .filter-btn.active {
        background: linear-gradient(to right, #059669, #047857) !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }

    /* Gallery Grid */
    #gallery-grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        #gallery-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 1024px) {
        #gallery-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    /* Ensure content doesn't cover header */
    body {
        padding-top: 0;
    }

    /* Hidden class for filtering */
    .hidden { display: none !important; }
</style>
@endpush

@section('content')
<div class="relative overflow-hidden bg-white pt-16">

    <!-- Hero Section -->
    <section class="relative py-20 px-6 bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-amber-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto text-center">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-semibold mb-6">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                </svg>
                Our Gallery
            </span>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-black mb-6">
                Moments of <span class="bg-gradient-to-r from-amber-300 to-emerald-300 bg-clip-text text-transparent">Worship</span>
            </h1>
            <p class="text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto leading-relaxed">
                Capturing the beauty of our ministry, the joy of fellowship, and the power of worship through the lens
            </p>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="sticky top-16 z-40 bg-white/95 backdrop-blur-lg border-b border-gray-200 shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-wrap items-center justify-center gap-3">
                <button data-category="all" class="filter-btn active px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg">All Images</button>

                @php $categories = \App\Models\Gallery::getCategories(); @endphp
                @foreach($categories as $key => $label)
                    <button data-category="{{ $key }}" class="filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-gray-100 text-gray-700 hover:bg-gray-200">{{ $label }}</button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">

            @if($galleries->count() > 0)
                <div id="gallery-grid">
                    @foreach($galleries as $gallery)
                        @php
                            $catKey = $gallery->category ?? 'other';
                            $catLabel = $categories[$catKey] ?? ucfirst($catKey);
                        @endphp
                        <div class="group relative cursor-pointer overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 gallery-item"
                             data-category="{{ $catKey }}"
                             onclick="openGalleryLightbox({{ $loop->index }})">
                            <!-- Image -->
                            <img src="{{ $gallery->image_url }}"
                                 alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                 class="w-full h-auto transform group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy"
                                 oncontextmenu="return false;">

                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <span class="inline-block px-3 py-1 bg-emerald-600 text-white rounded-full text-xs font-semibold mb-2">
                                        {{ $catLabel }}
                                    </span>
                                    @if($gallery->title)
                                        <h3 class="text-white font-bold text-xl mb-2">{{ $gallery->title }}</h3>
                                    @endif

                                    <!-- View Button -->
                                    <div class="flex items-center gap-2 text-white/80 hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span class="text-sm font-medium">View Full Size</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Zoom Icon -->
                            <div class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- No Results -->
                <div id="no-results" class="hidden text-center py-20">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-600 text-xl font-semibold">No images found in this category</p>
                </div>

            @else
                <!-- Empty Gallery -->
                <div class="text-center py-20">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-600 text-xl font-semibold">Gallery is coming soon!</p>
                    <p class="text-gray-500 mt-2">Check back later for amazing photos</p>
                </div>
            @endif
        </div>
    </section>
</div>

<!-- Lightbox Modal -->
<div id="gallery-lightbox" class="fixed inset-0 bg-black/95 z-[9999] hidden items-center justify-center p-4 backdrop-blur-sm" oncontextmenu="return false;">
    <!-- Close Button -->
    <button onclick="closeGalleryLightbox()" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors z-50">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Previous Button -->
    <button onclick="previousGalleryImage()" class="absolute left-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <!-- Next Button -->
    <button onclick="nextGalleryImage()" class="absolute right-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Image Container -->
    <div class="relative max-w-6xl w-full">
        <img id="gallery-lightbox-image" src="" alt="" class="w-full h-auto rounded-2xl shadow-2xl max-h-[80vh] object-contain mx-auto" draggable="false">

        <!-- Image Info -->
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 rounded-b-2xl">
            <h3 id="gallery-lightbox-title" class="text-white font-bold text-2xl mb-2"></h3>
            <p id="gallery-lightbox-category" class="text-white/80"></p>
        </div>

        <!-- Image Counter -->
        <div class="absolute top-4 left-4 px-4 py-2 bg-white/10 backdrop-blur-xl rounded-full">
            <span id="gallery-lightbox-counter" class="text-white font-semibold"></span>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Prepare gallery data safely in PHP
    @php
        $galleryImages = $galleries->map(function($g) use ($categories) {
            return [
                'url'       => $g->image_url,
                'title'     => $g->title,
                'category'  => $g->category ? ($categories[$g->category] ?? $g->category) : null,
                'date'      => $g->event_date?->format('M d, Y')
            ];
        })->toArray();
    @endphp

    const galleryImages = @json($galleryImages);

    const filterBtns = document.querySelectorAll('.filter-btn');
    const items = document.querySelectorAll('.gallery-item');
    const noResults = document.getElementById('no-results');
    const lightbox = document.getElementById('gallery-lightbox');
    const imgEl = document.getElementById('gallery-lightbox-image');
    const titleEl = document.getElementById('gallery-lightbox-title');
    const categoryEl = document.getElementById('gallery-lightbox-category');
    const counterEl = document.getElementById('gallery-lightbox-counter');

    let currentGalleryIndex = 0;

    // Filter
    filterBtns.forEach(btn => btn.addEventListener('click', () => {
        const cat = btn.dataset.category;

        // Update active button styles
        filterBtns.forEach(b => {
            if (b === btn) {
                b.classList.add('active');
                b.className = 'filter-btn active px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg';
            } else {
                b.classList.remove('active');
                b.className = 'filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-gray-100 text-gray-700 hover:bg-gray-200';
            }
        });

        let visible = 0;
        items.forEach(it => {
            const show = cat === 'all' || it.dataset.category === cat;
            it.classList.toggle('hidden', !show);
            if (show) visible++;
        });

        if (noResults) noResults.classList.toggle('hidden', visible > 0);
    }));

    // Lightbox Functions
    window.openGalleryLightbox = (idx) => {
        if (!galleryImages.length) return;
        currentGalleryIndex = idx;
        updateGalleryLightbox();
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    };

    window.closeGalleryLightbox = () => {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
    };

    window.previousGalleryImage = () => {
        currentGalleryIndex = (currentGalleryIndex - 1 + galleryImages.length) % galleryImages.length;
        updateGalleryLightbox();
    };

    window.nextGalleryImage = () => {
        currentGalleryIndex = (currentGalleryIndex + 1) % galleryImages.length;
        updateGalleryLightbox();
    };

    function updateGalleryLightbox() {
        const img = galleryImages[currentGalleryIndex];
        imgEl.src = img.url;
        imgEl.alt = img.title || 'Gallery image';
        titleEl.textContent = img.title || 'Gallery Image';
        categoryEl.textContent = img.category || '';
        counterEl.textContent = `${currentGalleryIndex + 1} / ${galleryImages.length}`;
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (lightbox.classList.contains('hidden')) return;
        if (e.key === 'ArrowLeft') previousGalleryImage();
        if (e.key === 'ArrowRight') nextGalleryImage();
        if (e.key === 'Escape') closeGalleryLightbox();
    });

    // Close lightbox when clicking outside the image
    lightbox.addEventListener('click', function(e) {
        if (e.target === this) {
            closeGalleryLightbox();
        }
    });

    // Prevent right-click & drag on gallery images
    document.addEventListener('contextmenu', e => {
        if (e.target.tagName === 'IMG' && e.target.closest('#gallery-grid')) {
            e.preventDefault();
        }
    });
    document.addEventListener('dragstart', e => {
        if (e.target.tagName === 'IMG' && e.target.closest('#gallery-grid')) {
            e.preventDefault();
        }
    });
</script>
@endpush

<x-static.footer />
@endsection
