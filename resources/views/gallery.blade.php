@extends('layouts.app')

@section('title', 'Gallery | God\'s Family Choir')

@push('styles')
<style>
    .gallery-item {
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .gallery-item img {
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        height: auto;
        display: block;
        user-select: none;
        -webkit-user-select: none;
        -webkit-user-drag: none;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) via rgba(0,0,0,0.4), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-item {
        transform: translateY(0);
        transition: transform 0.5s ease;
    }

    .gallery-item:hover {
        transform: translateY(-8px);
    }

    .gallery-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 1.5rem;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-info {
        transform: translateY(0);
    }

    /* Gallery Grid Layout - Match Landing Page Style */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    @media (min-width: 640px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }
    }

    @media (min-width: 1024px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 2rem;
        }
    }

    @media (min-width: 1280px) {
        .gallery-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
    }

    /* Lightbox Modal */
    .lightbox-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(10px);
    }

    .lightbox-modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease;
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
    }

    .lightbox-close {
        position: absolute;
        top: -3rem;
        right: 0;
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

    .lightbox-close:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
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

    .lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .lightbox-prev {
        left: 1rem;
    }

    .lightbox-next {
        right: 1rem;
    }
</style>
@endpush

@section('content')
<div class="relative overflow-hidden bg-white">
    <!-- Hero Section -->
    <section class="relative py-20 px-6 bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-800 text-white overflow-hidden">
        <!-- Background Elements -->
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
                <button data-category="all"
                        class="filter-btn active px-6 py-2 rounded-full font-semibold text-sm transition-all bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg">
                    All Images
                </button>
                @php
                    $categories = \App\Models\Gallery::getCategories();
                @endphp
                @foreach($categories as $key => $label)
                    <button data-category="{{ $key }}"
                            class="filter-btn px-6 py-2 rounded-full font-semibold text-sm transition-all bg-gray-100 text-gray-700 hover:bg-gray-200">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-12 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            @if($galleries->count() > 0)
                <div id="gallery-grid" class="gallery-grid">
                    @foreach($galleries as $gallery)
                        <div class="group relative cursor-pointer gallery-item rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 bg-white"
                             data-category="{{ $gallery->category ?? 'other' }}"
                             onclick="openLightbox({{ $loop->index }})">
                            <!-- Image -->
                            <img src="{{ $gallery->image_url }}"
                                 alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                 class="w-full h-auto transform group-hover:scale-110 transition-transform duration-700"
                                 loading="lazy"
                                 oncontextmenu="return false;">

                            @if($gallery->is_featured)
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="px-3 py-1 bg-amber-500 text-white text-xs font-bold rounded-full shadow-lg">
                                        ⭐ Featured
                                    </span>
                                </div>
                            @endif

                            <!-- Zoom Icon -->
                            <div class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                                </svg>
                            </div>

                            <!-- Overlay -->
                            <div class="gallery-overlay">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    @if($gallery->category)
                                        <span class="inline-block px-3 py-1 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-full text-xs font-semibold mb-2">
                                            {{ $categories[$gallery->category] ?? $gallery->category }}
                                        </span>
                                    @endif
                                    @if($gallery->title)
                                        <h3 class="text-white font-bold text-xl mb-2">{{ $gallery->title }}</h3>
                                    @endif
                                    @if($gallery->description)
                                        <p class="text-white/90 text-sm line-clamp-2 mb-2">{{ $gallery->description }}</p>
                                    @endif
                                    @if($gallery->event_date)
                                        <p class="text-white/80 text-xs">
                                            {{ $gallery->event_date->format('F d, Y') }}
                                        </p>
                                    @endif

                                    <!-- View Button -->
                                    <div class="flex items-center gap-2 text-white/80 hover:text-white transition-colors mt-3">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        <span class="text-sm font-medium">View Full Size</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Empty State (when filtered) -->
                <div id="no-results" class="hidden text-center py-20">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-600 text-xl font-semibold">No images found in this category</p>
                </div>
            @else
                <div class="text-center py-20">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-600 text-xl font-semibold">Gallery is coming soon!</p>
                    <p class="text-gray-500 mt-2">Check back later for amazing photos</p>
                </div>
            @endif
        </div>
    </section>
</div>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="lightbox-modal" oncontextmenu="return false;">
    <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
    <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">&#8249;</button>
    <button class="lightbox-nav lightbox-next" onclick="changeImage(1)">&#8250;</button>
    <div class="lightbox-content">
        <img id="lightbox-image" class="lightbox-image" src="" alt="" oncontextmenu="return false;" draggable="false">
        <div id="lightbox-info" class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent text-white">
            <h3 id="lightbox-title" class="text-2xl font-bold mb-2"></h3>
            <p id="lightbox-description" class="text-white/90"></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const noResults = document.getElementById('no-results');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const category = btn.dataset.category;

            // Update active button
            filterButtons.forEach(b => {
                if (b === btn) {
                    b.classList.add('active', 'bg-gradient-to-r', 'from-emerald-600', 'to-emerald-700', 'text-white', 'shadow-lg');
                    b.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                } else {
                    b.classList.remove('active', 'bg-gradient-to-r', 'from-emerald-600', 'to-emerald-700', 'text-white', 'shadow-lg');
                    b.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                }
            });

            // Filter items
            let visibleCount = 0;
            galleryItems.forEach(item => {
                const itemCategory = item.dataset.category;
                if (category === 'all' || itemCategory === category) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
            } else {
                noResults.classList.add('hidden');
            }
        });
    });

    // Lightbox functionality
    const galleryImages = @json($galleryData);

    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        document.getElementById('lightbox-modal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox-modal').classList.remove('active');
        document.body.style.overflow = '';
    }

    function changeImage(direction) {
        currentIndex = (currentIndex + direction + galleryImages.length) % galleryImages.length;
        updateLightbox();
    }

    function updateLightbox() {
        const image = galleryImages[currentIndex];
        document.getElementById('lightbox-image').src = image.url;
        document.getElementById('lightbox-title').textContent = image.title || 'Gallery Image';
        const description = [image.category, image.date].filter(Boolean).join(' • ');
        document.getElementById('lightbox-description').textContent = description;
    }

    // Prevent image downloads
    document.addEventListener('contextmenu', (e) => {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
            return false;
        }
    });

    // Prevent drag
    document.addEventListener('dragstart', (e) => {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
            return false;
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        const modal = document.getElementById('lightbox-modal');
        if (!modal.classList.contains('active')) return;

        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') changeImage(-1);
        if (e.key === 'ArrowRight') changeImage(1);
    });

        // Close on background click
        document.getElementById('lightbox-modal').addEventListener('click', (e) => {
            if (e.target.id === 'lightbox-modal') closeLightbox();
        });
</script>
@endpush

    <!-- Footer -->
    <x-static.footer />
@endsection

