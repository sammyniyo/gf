@extends('layouts.app')

@section('title', 'Download ' . $purchase->album->title . ' | God\'s Family Choir')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-amber-50 py-12">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Alert -->
        @if(session('success'))
        <div class="mb-8 bg-emerald-50 border-l-4 border-emerald-500 rounded-lg p-6 shadow-lg">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p class="font-semibold text-emerald-900">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- Main Download Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header Section -->
            <div class="bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-600 text-white p-8 md:p-12 text-center relative overflow-hidden">
                <!-- Decorative Pattern -->
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 w-48 h-48 bg-teal-300 rounded-full blur-3xl"></div>
                </div>

                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6 border-2 border-white/30">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-3">Thank You!</h1>
                    <p class="text-emerald-100 text-lg">Your album is ready to download</p>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-8 md:p-12">
                <!-- Album Info Card -->
                <div class="flex flex-col md:flex-row gap-6 mb-8 p-6 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl border border-gray-200">
                    <img src="{{ $purchase->album->cover_image_url }}"
                         alt="{{ $purchase->album->title }}"
                         class="w-full md:w-40 h-40 rounded-xl shadow-lg object-cover">
                    <div class="flex-1">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">
                            {{ $purchase->album->title }}
                        </h2>
                        <div class="space-y-2">
                            @if($purchase->album->track_count > 0)
                            <p class="text-gray-700 font-medium">
                                <span class="inline-flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                                    </svg>
                                    {{ $purchase->album->track_count }} Tracks
                                </span>
                            </p>
                            @endif
                            <p class="text-sm text-gray-600">
                                Purchased by <span class="font-semibold">{{ $purchase->customer_name }}</span>
                            </p>
                            @if($purchase->downloaded_at)
                            <p class="text-xs text-gray-500">
                                First downloaded: {{ $purchase->downloaded_at->format('M d, Y h:i A') }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Download Section -->
                <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl p-8 mb-8 border-2 border-emerald-200">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-6">
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2 flex items-center gap-3">
                                <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download Your Album
                            </h3>
                            <p class="text-gray-700 mb-3">
                                Downloads remaining:
                                <span class="font-bold text-emerald-700 text-lg">
                                    {{ $purchase->max_downloads - $purchase->download_count }}
                                </span>
                            </p>
                            <p class="text-sm text-gray-600 flex items-start gap-2">
                                <svg class="w-4 h-4 text-emerald-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                Complete album ZIP file with all tracks and album artwork
                            </p>
                        </div>

                        @if($purchase->canDownload())
                        <form action="{{ route('shop.process-download', $purchase->download_code) }}" method="POST" class="flex-shrink-0">
                            @csrf
                            <button type="submit"
                                    class="group bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl flex items-center gap-3">
                                <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                <span>Download Album ZIP</span>
                            </button>
                        </form>
                        @else
                        <button disabled
                                class="bg-gray-400 text-white font-bold px-8 py-4 rounded-xl cursor-not-allowed opacity-50 shadow-lg">
                            Download Limit Reached
                        </button>
                        @endif
                    </div>
                </div>

                <!-- What's Included -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 mb-8 border border-blue-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        What's Included
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">All Audio Tracks</h4>
                                <p class="text-sm text-gray-600">High-quality MP3 files</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Album Artwork</h4>
                                <p class="text-sm text-gray-600">High-resolution cover image</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Album Information</h4>
                                <p class="text-sm text-gray-600">Track listing and details</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                            <div class="flex-shrink-0 w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 mb-1">Sheet Music</h4>
                                <p class="text-sm text-gray-600">PDF files for available tracks</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Download Code -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-8 mb-8 border-2 border-amber-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        Your Download Code
                    </h3>
                    <div class="flex flex-col sm:flex-row gap-4 mb-4">
                        <code class="flex-1 bg-white px-6 py-4 rounded-xl font-mono text-lg font-bold text-gray-900 border-2 border-amber-300 text-center sm:text-left">
                            {{ $purchase->download_code }}
                        </code>
                        <button onclick="copyDownloadCode()"
                                class="group bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white px-6 py-4 rounded-xl transition-all transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center gap-2 font-semibold">
                            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span>Copy Code</span>
                        </button>
                    </div>
                    <p class="text-sm text-gray-700">
                        Save this code to access your download later. We've also sent it to
                        <span class="font-semibold text-amber-700">{{ $purchase->customer_email }}</span>
                    </p>
                </div>

                <!-- Streaming Options -->
                @if($purchase->album->spotify_url || $purchase->album->apple_music_url || $purchase->album->youtube_url)
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 mb-8 border border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Listen Now on Your Favorite Platform
                    </h3>
                    <div class="flex flex-wrap gap-4">
                        @if($purchase->album->spotify_url)
                        <a href="{{ $purchase->album->spotify_url }}"
                           target="_blank"
                           class="group flex items-center gap-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                            </svg>
                            <span>Spotify</span>
                        </a>
                        @endif

                        @if($purchase->album->apple_music_url)
                        <a href="{{ $purchase->album->apple_music_url }}"
                           target="_blank"
                           class="group flex items-center gap-3 bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 text-white px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.997 6.124c0-.738-.065-1.47-.24-2.19-.317-1.31-1.062-2.31-2.18-3.043C21.003.517 20.373.285 19.7.164c-.517-.093-1.038-.135-1.564-.15-.04-.003-.083-.01-.124-.013H5.988c-.152.01-.303.017-.455.026C4.786.07 4.043.15 3.34.428 2.004.958 1.04 1.88.475 3.208c-.192.448-.292.925-.363 1.408-.056.392-.088.785-.1 1.18-.013.37-.006.74-.006 1.11v9.185c0 .158.002.316.006.474.014.55.05 1.097.175 1.635.088.382.21.753.384 1.106.65 1.318 1.63 2.19 2.948 2.68.753.28 1.534.402 2.336.445.302.017.605.025.908.025h12.054c.307 0 .616-.006.922-.023.867-.05 1.713-.19 2.52-.514 1.048-.42 1.863-1.11 2.442-2.078.41-.686.63-1.424.723-2.193.042-.348.063-.697.068-1.046.005-.37.004-.738.004-1.108V6.124z"/>
                            </svg>
                            <span>Apple Music</span>
                        </a>
                        @endif

                        @if($purchase->album->youtube_url)
                        <a href="{{ $purchase->album->youtube_url }}"
                           target="_blank"
                           class="group flex items-center gap-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/>
                            </svg>
                            <span>YouTube</span>
                        </a>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Back to Shop -->
                <div class="text-center pt-6 border-t border-gray-200">
                    <a href="{{ route('shop.index') }}"
                       class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-semibold transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Browse More Albums</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function copyDownloadCode() {
    const code = "{{ $purchase->download_code }}";

    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(code).then(() => {
            showCopiedFeedback();
        }).catch(() => {
            fallbackCopy(code);
        });
    } else {
        fallbackCopy(code);
    }
}

function fallbackCopy(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.top = '-1000px';
    textarea.setAttribute('readonly', '');
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        showCopiedFeedback();
    } catch (e) {
        alert('Failed to copy code. Please copy manually: ' + text);
    }
    document.body.removeChild(textarea);
}

function showCopiedFeedback() {
    const button = event.target.closest('button');
    if (!button) return;

    const originalHTML = button.innerHTML;
    button.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span>Copied!</span>';
    button.classList.add('bg-green-600', 'hover:bg-green-700');
    button.classList.remove('from-amber-500', 'to-orange-500', 'hover:from-amber-600', 'hover:to-orange-600');

    setTimeout(() => {
        button.innerHTML = originalHTML;
        button.classList.remove('bg-green-600', 'hover:bg-green-700');
        button.classList.add('from-amber-500', 'to-orange-500', 'hover:from-amber-600', 'hover:to-orange-600');
    }, 2000);
}
</script>
@endpush
@endsection
