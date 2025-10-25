@extends('layouts.app')

@section('title', 'Download ' . $purchase->album->title . ' | God\'s Family Choir')

@section('content')
<section class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-8 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800 rounded-lg p-6">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-emerald-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <div>
                    <h3 class="font-semibold text-emerald-900 dark:text-emerald-100 mb-1">{{ session('success') }}</h3>
                </div>
            </div>
        </div>
        @endif

        <!-- Download Card -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 text-white p-8 text-center">
                <svg class="w-20 h-20 mx-auto mb-4 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
                <h1 class="text-3xl font-bold mb-2">Thank You for Your Purchase!</h1>
                <p class="text-emerald-100">Your album is ready to download</p>
            </div>

            <!-- Album Details -->
            <div class="p-8">
                <div class="flex gap-6 mb-8">
                    <img src="{{ $purchase->album->cover_image_url }}"
                         alt="{{ $purchase->album->title }}"
                         class="w-32 h-32 rounded-xl shadow-lg object-cover">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            {{ $purchase->album->title }}
                        </h2>
                        @if($purchase->album->track_count > 0)
                        <p class="text-gray-600 dark:text-gray-400 mb-2">
                            {{ $purchase->album->track_count }} tracks
                        </p>
                        @endif
                        <p class="text-sm text-gray-500 dark:text-gray-500">
                            Purchased by {{ $purchase->customer_name }}
                        </p>
                    </div>
                </div>

                <!-- Download Button -->
                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl p-6 mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white mb-1">Download Your Album</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Downloads remaining: {{ $purchase->max_downloads - $purchase->download_count }}
                            </p>
                        </div>
                        @if($purchase->canDownload())
                        <form action="{{ route('shop.process-download', $purchase->download_code) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-8 py-3 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download Now
                            </button>
                        </form>
                        @else
                        <button disabled
                                class="bg-gray-400 text-white font-bold px-8 py-3 rounded-lg cursor-not-allowed opacity-50">
                            Download Limit Reached
                        </button>
                        @endif
                    </div>

                    @if($purchase->downloaded_at)
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        First downloaded: {{ $purchase->downloaded_at->format('M d, Y h:i A') }}
                    </p>
                    @endif
                </div>

                <!-- Download Code -->
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 rounded-xl p-6 mb-8">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Your Download Code</h3>
                    <div class="flex items-center gap-3">
                        <code class="flex-1 bg-white dark:bg-gray-800 px-4 py-3 rounded-lg font-mono text-lg text-gray-900 dark:text-white border-2 border-emerald-300 dark:border-emerald-700">
                            {{ $purchase->download_code }}
                        </code>
                        <button onclick="copyDownloadCode()"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-lg transition-colors flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        Save this code to access your download later. We've also sent it to {{ $purchase->customer_email }}
                    </p>
                </div>

                <!-- Streaming Options -->
                @if($purchase->album->spotify_url || $purchase->album->apple_music_url || $purchase->album->youtube_url)
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Listen Now on Your Favorite Platform</h3>
                    <div class="flex gap-3 flex-wrap">
                        @if($purchase->album->spotify_url)
                        <a href="{{ $purchase->album->spotify_url }}"
                           target="_blank"
                           class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                            </svg>
                            Spotify
                        </a>
                        @endif

                        @if($purchase->album->apple_music_url)
                        <a href="{{ $purchase->album->apple_music_url }}"
                           target="_blank"
                           class="flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.997 6.124c0-.738-.065-1.47-.24-2.19-.317-1.31-1.062-2.31-2.18-3.043C21.003.517 20.373.285 19.7.164c-.517-.093-1.038-.135-1.564-.15-.04-.003-.083-.01-.124-.013H5.988c-.152.01-.303.017-.455.026C4.786.07 4.043.15 3.34.428 2.004.958 1.04 1.88.475 3.208c-.192.448-.292.925-.363 1.408-.056.392-.088.785-.1 1.18-.013.37-.006.74-.006 1.11v9.185c0 .158.002.316.006.474.014.55.05 1.097.175 1.635.088.382.21.753.384 1.106.65 1.318 1.63 2.19 2.948 2.68.753.28 1.534.402 2.336.445.302.017.605.025.908.025h12.054c.307 0 .616-.006.922-.023.867-.05 1.713-.19 2.52-.514 1.048-.42 1.863-1.11 2.442-2.078.41-.686.63-1.424.723-2.193.042-.348.063-.697.068-1.046.005-.37.004-.738.004-1.108V6.124z"/>
                            </svg>
                            Apple Music
                        </a>
                        @endif

                        @if($purchase->album->youtube_url)
                        <a href="{{ $purchase->album->youtube_url }}"
                           target="_blank"
                           class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/>
                            </svg>
                            YouTube
                        </a>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Back to Shop -->
                <div class="mt-8 text-center">
                    <a href="{{ route('shop.index') }}"
                       class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-medium">
                        Browse more albums
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function copyDownloadCode() {
    const code = "{{ $purchase->download_code }}";
    navigator.clipboard.writeText(code).then(() => {
        alert('Download code copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy:', err);
    });
}
</script>
@endsection

