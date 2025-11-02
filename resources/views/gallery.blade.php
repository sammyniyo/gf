{{-- resources/views/gallery.blade.php --}}
@extends('layouts.app')

@section('title', "Gallery | God's Family Choir")

@push('styles')
<style>
    /* ────────────────────────────────────── Lightbox ────────────────────────────────────── */
    .lightbox-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0,0,0,.95);
        backdrop-filter: blur(10px);
        align-items: center;
        justify-content: center;
    }
    .lightbox-modal.active { display: flex; animation: fadeIn .3s ease; }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

    .lightbox-content { position:relative; max-width:90vw; max-height:90vh; }
    .lightbox-image   { max-width:100%; max-height:90vh; object-fit:contain; border-radius:.5rem; user-select:none; -webkit-user-drag:none; }

    .lightbox-close, .lightbox-nav {
        position:absolute; color:#fff; font-size:2rem; cursor:pointer;
        width:3rem; height:3rem; display:flex; align-items:center; justify-content:center;
        background:rgba(255,255,255,.1); border-radius:50%; transition:background .3s;
    }
    .lightbox-close:hover, .lightbox-nav:hover { background:rgba(255,255,255,.2); }
    .lightbox-close { top:-3rem; right:0; }
    .lightbox-prev  { left:1rem; top:50%; transform:translateY(-50%); }
    .lightbox-next  { right:1rem; top:50%; transform:translateY(-50%); }

    /* ────────────────────────────────────── Filters ────────────────────────────────────── */
    .filter-btn {
        @apply px-6 py-2.5 rounded-full font-semibold text-sm transition-all;
    }
    .filter-btn:not(.active) { @apply bg-gray-100 text-gray-700 hover:bg-gray-200; }
    .filter-btn.active {
        @apply bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg;
    }

    /* ────────────────────────────────────── Grid ────────────────────────────────────── */
    #gallery-grid { @apply grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3; }
    .gallery-item {
        @apply flex flex-col bg-white rounded-2xl shadow-lg overflow-hidden cursor-pointer;
        min-height: 450px;
        transition: transform .5s, box-shadow .5s;
    }
    .gallery-item:hover { @apply -translate-y-2 shadow-2xl; }

    @media (min-width:768px)  { .gallery-item { min-height:480px; } }
    @media (min-width:1024px) { .gallery-item { min-height:520px; } }
</style>
@endpush

@section('content')
<div class="relative overflow-hidden bg-white">

    {{-- Hero --}}
    <section class="relative py-20 px-6 bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-800 text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-amber-500 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto text-center">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-semibold mb-6">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
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

    {{-- Filters (sticky) --}}
    <section class="sticky top-16 z-40 bg-white/95 backdrop-blur-lg border-b border-gray-200 shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-wrap items-center justify-center gap-3">
                <button data-category="all" class="filter-btn active">All Images</button>

                @php $categories = \App\Models\Gallery::getCategories(); @endphp
                @foreach($categories as $key => $label)
                    <button data-category="{{ $key }}" class="filter-btn">{{ $label }}</button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Grid --}}
    <section class="py-16 px-6 bg-gray-50">
        <div class="max-w-7xl mx-auto">

            @if($galleries->count())
                <div id="gallery-grid">
                    @foreach($galleries as $gallery)
                        @php
                            $catKey = $gallery->category ?? 'other';
                            $catLabel = $categories[$catKey] ?? ucfirst($catKey);
                        @endphp

                        <article
                            class="gallery-item"
                            data-category="{{ $catKey }}"
                            data-index="{{ $loop->index }}"
                            onclick="openLightbox({{ $loop->index }})"
                            aria-label="Open {{ $gallery->title ?? 'image' }} in lightbox">

                            {{-- Image container --}}
                            <div class="relative w-full aspect-[4/3] overflow-hidden bg-gray-100">
                                <img src="{{ $gallery->image_url }}"
                                     alt="{{ $gallery->title ?? 'Gallery image' }}"
                                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                     loading="lazy"
                                     onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                                     oncontextmenu="return false;">

                                {{-- Fallback SVG --}}
                                <div class="hidden inset-0 w-full h-full bg-gradient-to-br from-emerald-400 to-teal-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>

                                {{-- Hover overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6 text-white">
                                    @if($gallery->category)
                                        <span class="inline-block px-3 py-1 bg-emerald-600 rounded-full text-xs font-semibold mb-2">
                                            {{ $catLabel }}
                                        </span>
                                    @endif
                                    @if($gallery->title)
                                        <h3 class="font-bold text-xl mb-2">{{ $gallery->title }}</h3>
                                    @endif
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span class="text-sm font-medium">View Full Size</span>
                                    </div>
                                </div>

                                {{-- Zoom icon --}}
                                <div class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                                    </svg>
                                </div>
                            </div>

                            {{-- Card footer (always visible) --}}
                            <footer class="p-5 bg-white">
                                <div class="flex items-start justify-between gap-3 mb-2">
                                    @if($gallery->category)
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 text-emerald-700 rounded-full text-xs font-semibold">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                      d="M3 4a1 1 0 011-1h2.307c.339 0 .653.154.861.416l.84 1.049A1 1 0 009.193 5H15a2 2 0 012 2v1H3V4zm0 5h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            {{ $catLabel }}
                                        </span>
                                    @endif
                                    @if($gallery->event_date)
                                        <span class="text-gray-500 text-xs flex items-center gap-1.5 whitespace-nowrap">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $gallery->event_date->format('M d, Y') }}
                                        </span>
                                    @endif
                                </div>

                                @if($gallery->title)
                                    <h3 class="text-gray-900 font-bold text-lg leading-tight line-clamp-2">
                                        {{ $gallery->title }}
                                    </h3>
                                @endif
                            </footer>
                        </article>
                    @endforeach
                </div>

                {{-- No results (filtered) --}}
                <div id="no-results" class="hidden text-center py-20">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="text-gray-600 text-xl font-semibold">No images found in this category</p>
                </div>

            @else
                {{-- Empty gallery --}}
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

{{-- Lightbox Modal (outside the main flow) --}}
<div id="lightbox-modal" class="lightbox-modal" oncontextmenu="return false;" role="dialog" aria-modal="true" aria-hidden="true">
    <button class="lightbox-close" onclick="closeLightbox()" aria-label="Close lightbox">×</button>
    <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)" aria-label="Previous image">‹</button>
    <button class="lightbox-nav lightbox-next" onclick="changeImage(1)" aria-label="Next image">›</button>

    <div class="lightbox-content">
        <img id="lightbox-image" class="lightbox-image" src="" alt="" draggable="false">
        <div id="lightbox-info" class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-black/80 to-transparent text-white">
            <h3 id="lightbox-title" class="text-2xl font-bold mb-2"></h3>
            <p id="lightbox-description" class="text-white/90"></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // ------------------------------------------------- Data -------------------------------------------------
    const galleryImages = @json($galleries->map(fn($g) => [
        'url'   => $g->image_url,
        'title' => $g->title,
        'category' => $g->category ? ($categories[$g->category] ?? $g->category) : null,
        'date'    => $g->event_date?->format('M d, Y')
    ])->toArray());

    // ------------------------------------------------- Elements -------------------------------------------------
    const filterBtns   = document.querySelectorAll('.filter-btn');
    const items        = document.querySelectorAll('.gallery-item');
    const noResults    = document.getElementById('no-results');
    const modal        = document.getElementById('lightbox-modal');
    const imgEl        = document.getElementById('lightbox-image');
    const titleEl      = document.getElementById('lightbox-title');
    const descEl       = document.getElementById('lightbox-description');

    let currentIndex = 0;

    // ------------------------------------------------- Filter -------------------------------------------------
    filterBtns.forEach(btn => btn.addEventListener('click', () => {
        const cat = btn.dataset.category;

        // active button
        filterBtns.forEach(b => b.classList.toggle('active', b === btn));

        // show / hide items
        let visible = 0;
        items.forEach(it => {
            const show = cat === 'all' || it.dataset.category === cat;
            it.classList.toggle('hidden', !show);
            if (show) visible++;
        });

        noResults?.classList.toggle('hidden', visible > 0);
    }));

    // ------------------------------------------------- Lightbox -------------------------------------------------
    window.openLightbox = idx => {
        if (!galleryImages.length) return;
        currentIndex = idx;
        updateLightbox();
        modal.classList.add('active');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    };

    window.closeLightbox = () => {
        modal.classList.remove('active');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    };

    window.changeImage = dir => {
        currentIndex = (currentIndex + dir + galleryImages.length) % galleryImages.length;
        updateLightbox();
    };

    function updateLightbox() {
        const i = galleryImages[currentIndex];
        imgEl.src = i.url;
        titleEl.textContent = i.title || 'Gallery Image';
        descEl.textContent = [i.category, i.date].filter(Boolean).join(' | ');
    }

    // ------------------------------------------------- Keyboard & clicks -------------------------------------------------
    document.addEventListener('keydown', e => {
        if (!modal.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') changeImage(-1);
        if (e.key === 'ArrowRight') changeImage(1);
    });

    modal.addEventListener('click', e => {
        if (e.target === modal) closeLightbox();
    });

    // ------------------------------------------------- Prevent download / drag -------------------------------------------------
    document.addEventListener('contextmenu', e => e.target.tagName === 'IMG' && e.preventDefault());
    document.addEventListener('dragstart',   e => e.target.tagName === 'IMG' && e.preventDefault());
</script>
@endpush

<x-static.footer />
@endsection
