@extends('layouts.app')

@section('title', 'Utility Folder | God\'s Family Choir')
@section('meta_description', 'Download choir resources including lyrics, sheet music, announcements, and uniforms from God\'s Family Choir—your hub for ministry materials.')
@section('meta_keywords', 'God\'s Family Choir resources, choir sheet music, Adventist lyrics, worship announcements, choir uniforms, gospel resources Rwanda')
@section('canonical_url', route('resources.index'))
@section('og:title', 'Choir Resources & Utility Folder | God\'s Family Choir')
@section('og:description', 'Access lyrics, music sheets, announcements, the code of conduct, and stunning uniform galleries from God\'s Family Choir in Kigali, Rwanda.')
@section('og:image', asset('images/hero.jpg'))

@section('content')
<div class="bg-white">
    <section class="px-4 pt-28 pb-10 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-4xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">
                Utility folder
            </span>
            <h1 class="mt-4 text-3xl font-semibold text-slate-900 sm:text-4xl">
                Choir <span class="text-emerald-700">resources</span>
            </h1>
            <p class="mx-auto mt-3 max-w-2xl text-base text-slate-600">
                Lyrics, music sheets, announcements, and uniforms.
            </p>
        </div>
    </section>

    <section class="sticky top-16 z-20 border-y border-slate-100 bg-white/95 px-4 py-4 backdrop-blur sm:px-8 lg:px-12">
        <div class="mx-auto flex max-w-6xl flex-wrap justify-center gap-2">
            <a href="{{ route('resources.index') }}"
               class="rounded-full px-4 py-2 text-sm font-semibold {{ $selectedCategory === 'all' ? 'bg-emerald-700 text-white' : 'border border-slate-200 text-slate-600 hover:border-emerald-300 hover:text-emerald-700' }}">
                All
            </a>
            @foreach($categories as $key => $label)
                <a href="{{ route('resources.index', ['category' => $key]) }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold {{ $selectedCategory === $key ? 'bg-emerald-700 text-white' : 'border border-slate-200 text-slate-600 hover:border-emerald-300 hover:text-emerald-700' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </section>

    @if($uniforms->count() > 0 && ($selectedCategory === 'all' || $selectedCategory === 'uniforms'))
    <section class="px-4 py-14 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <h2 class="text-xl font-semibold text-slate-900">Uniforms</h2>
            <p class="mt-1 text-sm text-slate-600">How the choir dresses for worship and ministry.</p>

            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($uniforms as $uniform)
                    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                        <div class="relative h-80 bg-slate-100">
                            <img src="{{ $uniform->file_url }}" alt="{{ $uniform->title }}" class="h-full w-full object-cover object-center">
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-5 text-white">
                                <h3 class="text-lg font-semibold">{{ $uniform->title }}</h3>
                                @if($uniform->description)
                                    <p class="mt-1 text-sm text-white/80">{{ $uniform->description }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-2 p-4">
                            <button onclick="openPreview({{ $uniform->id }}, '{{ addslashes($uniform->title) }}', 'image', '{{ route('resources.download', $uniform) }}')"
                                    class="inline-flex flex-1 items-center justify-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-emerald-300 hover:text-emerald-700">
                                View
                            </button>
                            <a href="{{ route('resources.download', $uniform) }}"
                               class="inline-flex flex-1 items-center justify-center rounded-full bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-600">
                                Download
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="px-4 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            @if($resources->count() > 0)
                @foreach($resources as $category => $items)
                    @if($category !== 'uniforms')
                        <div class="mb-14 last:mb-0">
                            <h2 class="text-xl font-semibold text-slate-900">{{ \App\Models\Resource::getCategories()[$category] ?? $category }}</h2>
                            <div class="mt-2 h-0.5 w-12 rounded-full bg-emerald-700"></div>

                            <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($items as $resource)
                                    <div class="rounded-2xl border border-slate-200 bg-white p-5">
                                        @if($resource->isImage())
                                            <img src="{{ $resource->file_url }}" alt="{{ $resource->title }}" class="mb-4 h-40 w-full rounded-xl object-cover">
                                        @else
                                            <div class="mb-4 flex h-40 items-center justify-center rounded-xl bg-slate-50">
                                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase text-emerald-700">{{ $resource->file_type }}</span>
                                            </div>
                                        @endif

                                        <h3 class="font-semibold text-slate-900">{{ $resource->title }}</h3>
                                        @if($resource->description)
                                            <p class="mt-1 line-clamp-2 text-sm text-slate-600">{{ $resource->description }}</p>
                                        @endif
                                        <p class="mt-3 text-xs text-slate-500">{{ strtoupper($resource->file_type) }} · {{ $resource->formatted_file_size }} · {{ $resource->downloads }} downloads</p>

                                        <div class="mt-4 flex gap-2">
                                            @if($resource->isPdf() || $resource->isImage())
                                                <button onclick="openPreview({{ $resource->id }}, '{{ addslashes($resource->title) }}', '{{ $resource->isPdf() ? 'pdf' : 'image' }}', '{{ route('resources.download', $resource) }}')"
                                                        class="inline-flex flex-1 items-center justify-center rounded-full bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-600">
                                                    Preview
                                                </button>
                                            @endif
                                            <a href="{{ route('resources.download', $resource) }}"
                                               class="{{ ($resource->isPdf() || $resource->isImage()) ? '' : 'flex-1' }} inline-flex items-center justify-center rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 hover:border-emerald-300 hover:text-emerald-700">
                                                Download
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-8 py-16 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">No resources yet</h3>
                    <p class="mt-2 text-sm text-slate-600">Check back soon for lyrics, sheets, and documents.</p>
                </div>
            @endif
        </div>
    </section>
</div>

@include('components.static.footer')

<div id="previewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4" onclick="closePreviewModal(event)">
    <div class="relative h-[90vh] w-full max-w-6xl" onclick="event.stopPropagation()">
        <div class="absolute inset-x-0 top-4 z-20 flex items-center justify-between gap-3 px-2 sm:-top-12">
            <p id="previewTitle" class="truncate rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white"></p>
            <div class="flex items-center gap-2">
                <a id="downloadButton" href="#" class="inline-flex items-center rounded-full bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-600">Download</a>
                <button onclick="closePreviewModal()" class="inline-flex items-center rounded-full border border-white/20 px-4 py-2 text-sm font-semibold text-white hover:bg-white/10">Close</button>
            </div>
        </div>
        <div class="h-full overflow-hidden rounded-2xl bg-white">
            <iframe id="pdfPreview" class="hidden h-full w-full" frameborder="0"></iframe>
            <div id="imagePreview" class="hidden h-full items-center justify-center bg-slate-100">
                <img id="imagePreviewImg" src="" alt="" class="max-h-full max-w-full object-contain">
            </div>
            <div id="previewLoading" class="flex h-full items-center justify-center">
                <p class="text-sm font-medium text-slate-500">Loading preview…</p>
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

    previewTitle.textContent = title;
    downloadButton.href = downloadUrl;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    previewLoading.classList.remove('hidden');
    pdfPreview.classList.add('hidden');
    imagePreview.classList.add('hidden');
    document.body.style.overflow = 'hidden';

    if (type === 'pdf') {
        pdfPreview.src = `/resources/${resourceId}/preview`;
        setTimeout(() => {
            previewLoading.classList.add('hidden');
            pdfPreview.classList.remove('hidden');
        }, 500);
    } else {
        fetch(`/resources/${resourceId}/preview`)
            .then(response => response.blob())
            .then(blob => {
                imagePreviewImg.src = URL.createObjectURL(blob);
                previewLoading.classList.add('hidden');
                imagePreview.classList.remove('hidden');
                imagePreview.classList.add('flex');
            })
            .catch(() => {
                previewLoading.innerHTML = '<p class="text-sm text-red-600">Failed to load preview</p>';
            });
    }
}

function closePreviewModal(event) {
    if (event && event.target !== event.currentTarget && event.type === 'click') {
        return;
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

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePreviewModal();
    }
});
</script>
@endsection
