@extends('layouts.app')

@section('title', $album->title . ' - Shop | God\'s Family Choir')
@section('description', $album->description ?? 'Purchase and download ' . $album->title . ' by God\'s Family Choir')

@section('content')
<section class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('shop.index') }}"
               class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Shop
            </a>
        </div>

        <!-- Album Details -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- Album Cover -->
            <div class="relative">
                <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl bg-gray-200 dark:bg-gray-800">
                    <img src="{{ $album->cover_image_url }}"
                         alt="{{ $album->title }}"
                         class="w-full h-full object-cover">
                </div>

                <!-- Streaming Links -->
                <div class="mt-6 flex gap-4 flex-wrap">
                    @if($album->spotify_url)
                    <a href="{{ $album->spotify_url }}"
                       target="_blank"
                       class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                        </svg>
                        Listen on Spotify
                    </a>
                    @endif

                    @if($album->apple_music_url)
                    <a href="{{ $album->apple_music_url }}"
                       target="_blank"
                       class="flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg transition-all shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.997 6.124c0-.738-.065-1.47-.24-2.19-.317-1.31-1.062-2.31-2.18-3.043C21.003.517 20.373.285 19.7.164c-.517-.093-1.038-.135-1.564-.15-.04-.003-.083-.01-.124-.013H5.988c-.152.01-.303.017-.455.026C4.786.07 4.043.15 3.34.428 2.004.958 1.04 1.88.475 3.208c-.192.448-.292.925-.363 1.408-.056.392-.088.785-.1 1.18-.013.37-.006.74-.006 1.11v9.185c0 .158.002.316.006.474.014.55.05 1.097.175 1.635.088.382.21.753.384 1.106.65 1.318 1.63 2.19 2.948 2.68.753.28 1.534.402 2.336.445.302.017.605.025.908.025h12.054c.307 0 .616-.006.922-.023.867-.05 1.713-.19 2.52-.514 1.048-.42 1.863-1.11 2.442-2.078.41-.686.63-1.424.723-2.193.042-.348.063-.697.068-1.046.005-.37.004-.738.004-1.108V6.124z"/>
                        </svg>
                        Apple Music
                    </a>
                    @endif

                    @if($album->youtube_url)
                    <a href="{{ $album->youtube_url }}"
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

            <!-- Album Info and Purchase -->
            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ $album->title }}
                </h1>

                @if($album->description)
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    {{ $album->description }}
                </p>
                @endif

                <!-- Album Details -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-md mb-8">
                    <div class="space-y-4">
                        @if($album->track_count > 0)
                        <div class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-6 h-6 mr-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                            </svg>
                            <span class="font-medium">{{ $album->track_count }} Tracks</span>
                        </div>
                        @endif

                        @if($album->release_date)
                        <div class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-6 h-6 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="font-medium">Released {{ $album->release_date->format('F Y') }}</span>
                        </div>
                        @endif

                        <div class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-6 h-6 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <span class="font-medium">Downloadable after purchase</span>
                        </div>
                    </div>
                </div>

                <!-- Price and Purchase CTA -->
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 rounded-xl p-8 shadow-lg">
                    <div class="mb-6">
                        @if($album->isFree())
                        <div class="text-5xl font-bold text-emerald-600 mb-2">FREE</div>
                        <p class="text-gray-700 dark:text-gray-300">Download this album at no cost</p>
                        @else
                        <div class="text-5xl font-bold text-gray-900 dark:text-white mb-2">${{ number_format($album->price, 2) }}</div>
                        <p class="text-gray-700 dark:text-gray-300">One-time purchase, unlimited downloads</p>
                        @endif
                    </div>

                    <a href="{{ route('shop.purchase', $album->id) }}"
                       class="block w-full bg-emerald-600 hover:bg-emerald-700 text-white text-center px-8 py-4 rounded-lg font-bold text-lg transition-all duration-200 transform hover:scale-[1.02] shadow-xl hover:shadow-2xl">
                        {{ $album->isFree() ? 'Download Now' : 'Purchase & Download' }}
                    </a>

                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400 text-center">
                        ✓ Instant access  ✓ High quality MP3  ✓ Support our ministry
                    </p>
                </div>
            </div>
        </div>

        <!-- Related Albums -->
        @if($relatedAlbums->count() > 0)
        <section class="border-t border-gray-200 dark:border-gray-700 pt-16">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">You May Also Like</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedAlbums as $relatedAlbum)
                    <x-shop.album-card :album="$relatedAlbum" />
                @endforeach
            </div>
        </section>
        @endif
    </div>
</section>
@endsection

