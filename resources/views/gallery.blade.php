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
        background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-item {
        transform: translateY(0);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
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
        user-select: none;
        -webkit-user-drag: none;
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

    /* Filter buttons */
    .filter-btn.active {
        background: linear-gradient(to right, #059669, #047857) !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }

    #gallery-grid {
        display: grid;
        gap: clamp(1.75rem, 2vw, 2.75rem);
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        justify-items: center;
    }

    @media (min-width: 1024px) {
        #gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        }
    }

    @media (min-width: 1536px) {
        #gallery-grid {
            gap: clamp(2.25rem, 3vw, 3.25rem);
            grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
        }
    }

    .gallery-card {
        position: relative;
        display: block;
        width: 100%;
        max-width: 440px;
        padding: clamp(0.95rem, 1.5vw, 1.6rem);
        border-radius: 1.85rem;
        background: linear-gradient(140deg, rgba(16, 185, 129, 0.22), rgba(6, 182, 212, 0.12) 45%, rgba(249, 115, 22, 0.18));
        border: 1.5px solid rgba(34, 197, 94, 0.15);
        cursor: pointer;
        transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.6s cubic-bezier(0.23, 1, 0.32, 1), filter 0.6s ease, border-color 0.4s ease;
    }

    .gallery-card::after {
        content: "";
        position: absolute;
        inset: -18% -18% auto -18%;
        height: 60%;
        border-radius: inherit;
        background: radial-gradient(circle at center, rgba(16, 185, 129, 0.4), transparent 65%);
        opacity: 0;
        transition: opacity 0.6s ease;
        pointer-events: none;
        filter: blur(28px);
    }

    .gallery-card:hover {
        transform: translateY(-18px) scale(1.02);
        box-shadow: 0 45px 100px -35px rgba(15, 118, 110, 0.5);
        filter: saturate(1.05);
        border-color: rgba(34, 197, 94, 0.3);
    }

    .gallery-card:hover::after {
        opacity: 1;
    }

    .gallery-card-inner {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 380px;
        border-radius: 1.45rem;
        overflow: hidden;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.99) 0%, rgba(236, 253, 245, 0.97) 100%);
        box-shadow: 0 28px 65px -38px rgba(15, 118, 110, 0.6), 0 20px 45px -22px rgba(15, 23, 42, 0.28);
        transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.4s ease;
    }

    .gallery-card:hover .gallery-card-inner {
        transform: translateY(-3px);
        box-shadow: 0 32px 70px -38px rgba(15, 118, 110, 0.65), 0 22px 50px -22px rgba(15, 23, 42, 0.32);
    }

    .gallery-visual {
        position: relative;
        border-radius: clamp(1.15rem, 1.7vw, 1.5rem);
        overflow: hidden;
        background: radial-gradient(circle at top, rgba(15, 118, 110, 0.25), rgba(15, 23, 42, 0.88));
        aspect-ratio: 4 / 3;
        margin-bottom: 0.5rem;
    }

    .gallery-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1), filter 0.7s ease;
    }

    .gallery-card:hover .gallery-visual img {
        transform: scale(1.08) translateY(-4px);
        filter: saturate(1.1);
    }

    .gallery-card-meta {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 1.15rem;
        padding: clamp(1.35rem, 2.2vw, 2rem);
        flex: 1;
    }

    .gallery-card-meta::before {
        content: "";
        position: absolute;
        inset: 0 1.5rem auto;
        height: 1px;
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.3), rgba(14, 116, 144, 0.4), rgba(16, 185, 129, 0.3));
        opacity: 0.7;
        transform: translateY(-0.85rem);
    }

    .gallery-meta-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.55rem;
    }

    .gallery-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.45rem 1rem;
        border-radius: 999px;
        font-size: 0.78rem;
        font-weight: 600;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(5, 150, 105, 0.12));
        color: #065f46;
        border: 1px solid rgba(16, 185, 129, 0.3);
        backdrop-filter: blur(4px);
        transition: all 0.3s ease;
    }

    .gallery-chip:hover {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.22), rgba(5, 150, 105, 0.18));
        border-color: rgba(16, 185, 129, 0.4);
        transform: translateY(-1px);
    }

    .gallery-chip svg {
        width: 0.9rem;
        height: 0.9rem;
    }

    .gallery-chip-featured {
        background: linear-gradient(120deg, rgba(252, 211, 77, 0.9), rgba(249, 115, 22, 0.85));
        color: #78350f;
        border: none;
        box-shadow: 0 8px 18px -10px rgba(250, 204, 21, 0.6);
    }

    .gallery-chip-muted {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.1), rgba(51, 65, 85, 0.08));
        color: #1e293b;
        border: 1px solid rgba(15, 23, 42, 0.15);
        transition: all 0.3s ease;
    }

    .gallery-chip-muted:hover {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.15), rgba(51, 65, 85, 0.12));
        border-color: rgba(15, 23, 42, 0.2);
        transform: translateY(-1px);
    }

    .gallery-card-title {
        font-size: clamp(1.35rem, 2.5vw, 1.75rem);
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.018em;
        line-height: 1.3;
        margin-top: 0.25rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .gallery-card-description {
        font-size: 0.975rem;
        line-height: 1.75;
        color: rgba(15, 23, 42, 0.82);
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 0.5rem;
    }

    .gallery-card-meta-footer {
        display: inline-flex;
        align-items: center;
        gap: 0.8rem;
        font-weight: 600;
        color: #047857;
        font-size: 0.975rem;
        transition: all 0.3s ease;
        margin-top: auto;
        padding-top: 0.75rem;
    }

    .gallery-card:hover .gallery-card-meta-footer {
        color: #059669;
    }

    .gallery-card-meta-footer svg {
        width: 1.15rem;
        height: 1.15rem;
        transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .gallery-card:hover .gallery-card-meta-footer svg {
        transform: translateX(6px);
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
                        class="filter-btn active px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg">
                    All Images
                </button>
                @php
                    $categories = \App\Models\Gallery::getCategories();
                @endphp
                @foreach($categories as $key => $label)
                    <button data-category="{{ $key }}"
                            class="filter-btn px-6 py-2.5 rounded-full font-semibold text-sm transition-all bg-gray-100 text-gray-700 hover:bg-gray-200">
                        {{ $label }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="relative py-16 px-6 bg-gray-50">
            <div class="max-w-7xl mx-auto">
            @if($galleries->count() > 0)
                <div id="gallery-grid">
                    @foreach($galleries as $gallery)
                        <div class="gallery-card group gallery-item"
                             data-category="{{ $gallery->category ?? 'other' }}"
                             onclick="openLightbox({{ $loop->index }})">
                            <div class="gallery-card-inner">
                                <!-- Image Container -->
                                <div class="gallery-visual">
                                    <img src="{{ $gallery->image_url }}"
                                         alt="{{ $gallery->title ?? 'Gallery Image' }}"
                                         class="gallery-image"
                                         loading="lazy"
                                         oncontextmenu="return false;">

                                    @if($gallery->is_featured)
                                        <div class="absolute top-5 left-5 z-20">
                                            <span class="gallery-chip gallery-chip-featured text-xs uppercase tracking-wide">
                                                <svg fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                Featured
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Zoom Icon -->
                                    <div class="absolute top-5 right-5 w-12 h-12 bg-white/15 backdrop-blur-xl rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-20 text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                                        </svg>
                                    </div>

                                    <!-- Overlay -->
                                    <div class="gallery-overlay"></div>
                                    <div class="gallery-info">
                                        @if($gallery->category)
                                            <span class="gallery-chip gallery-chip-muted mb-3">
                                                {{ $categories[$gallery->category] ?? $gallery->category }}
                                            </span>
                                        @endif
                                        @if($gallery->title)
                                            <h3 class="text-white font-bold text-2xl mb-2">{{ $gallery->title }}</h3>
                                        @endif
                                        @if($gallery->description)
                                            <p class="text-white/85 text-sm leading-relaxed mb-3">{{ \Illuminate\Support\Str::limit($gallery->description, 120) }}</p>
                                        @endif
                                        @if($gallery->event_date)
                                            <p class="text-white/80 text-xs tracking-wide">
                                                {{ $gallery->event_date->format('F d, Y') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Meta -->
                                <div class="gallery-card-meta">
                                    <div class="gallery-meta-chips">
                                        @if($gallery->category)
                                            <span class="gallery-chip">
                                                <svg fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h2.307c.339 0 .653.154.861.416l.84 1.049A1 1 0 009.193 5H15a2 2 0 012 2v1H3V4zm0 5h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V9zm5 2a1 1 0 100 2h4a1 1 0 100-2H8z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $categories[$gallery->category] ?? $gallery->category }}
                                            </span>
                                        @endif
                                        @if($gallery->event_date)
                                            <span class="gallery-chip gallery-chip-muted">
                                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-9 4h8m-9 4h6m-6 4h4M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ $gallery->event_date->format('M d, Y') }}
                                            </span>
                                        @endif
                                        @if($gallery->is_featured)
                                            <span class="gallery-chip gallery-chip-featured">
                                                <svg fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                Featured
                                            </span>
                                        @endif
                                    </div>

                                    @if($gallery->title)
                                        <h3 class="gallery-card-title" title="{{ $gallery->title }}">{{ $gallery->title }}</h3>
                                    @endif

                                    @if($gallery->description)
                                        <p class="gallery-card-description" title="{{ $gallery->description }}">{{ $gallery->description }}</p>
                                    @endif

                                    <div class="gallery-card-meta-footer">
                                        <span>View Details</span>
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7-7 7m7-7H3"/>
                                        </svg>
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
                    b.classList.add('active');
                    b.classList.add('bg-gradient-to-r', 'from-emerald-600', 'to-emerald-700', 'text-white', 'shadow-lg');
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
            if (noResults) {
                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
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
        const description = [image.category, image.date].filter(Boolean).join(' | ');
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
