@extends('layouts.app')

@section('title', $album->title . ' - Shop | God\'s Family Choir')
@section('description', $album->description ?? 'Purchase and download ' . $album->title . ' by God\'s Family Choir')

@section('content')
<!-- Stunning Hero Section -->
<section class="relative min-h-[60vh] flex items-end overflow-hidden bg-gradient-to-br from-slate-950 via-purple-950 to-black">
    <!-- Background Image -->
    <div class="absolute inset-0">
        @if($album->cover_image_url)
            <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ $album->cover_image_url }}');"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/80 to-transparent"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-purple-900/40 via-transparent to-transparent"></div>
    </div>

    <!-- Enhanced Mesh Gradient Animation -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-gradient-to-r from-amber-500/30 to-orange-500/30 rounded-full blur-[120px] animate-blob"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-l from-purple-500/30 to-pink-500/30 rounded-full blur-[120px] animate-blob animation-delay-2000"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 w-full">
        <nav class="mb-8">
            <ol class="flex items-center gap-3 text-sm">
                <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors font-medium">Home</a></li>
                <li><span class="text-gray-600">›</span></li>
                <li><a href="{{ route('shop.index') }}" class="text-gray-400 hover:text-white transition-colors font-medium">Shop</a></li>
                <li><span class="text-gray-600">›</span></li>
                <li><span class="text-white font-bold">{{ Str::limit($album->title, 40) }}</span></li>
            </ol>
        </nav>

        <div class="grid lg:grid-cols-3 gap-8 items-end">
            <!-- Album Cover -->
            <div class="lg:col-span-1">
                <div class="relative">
                    <div class="aspect-square rounded-3xl overflow-hidden shadow-2xl bg-gray-100 border-4 border-white/20">
                        <img src="{{ $album->cover_image_url }}"
                             alt="{{ $album->title }}"
                             class="w-full h-full object-cover">
                    </div>
                    <!-- Glow effect -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-500/20 to-purple-500/20 rounded-3xl blur-2xl -z-10"></div>
                </div>
            </div>

            <!-- Album Info -->
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <h1 class="text-4xl md:text-6xl font-black text-white leading-tight mb-4">
                        {{ $album->title }}
                    </h1>
                    @if($album->description)
                    <p class="text-lg md:text-xl text-gray-300 leading-relaxed max-w-2xl">
                        {{ $album->description }}
                    </p>
                    @endif
                </div>

                <!-- Album Details -->
                <div class="flex flex-wrap gap-6">
                    @if($album->track_count > 0)
                    <div class="flex items-center gap-2 text-white">
                        <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                        </svg>
                        <span class="font-bold">{{ $album->track_count }} Tracks</span>
                    </div>
                    @endif

                    @if($album->release_date)
                    <div class="flex items-center gap-2 text-white">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span class="font-bold">Released {{ $album->release_date->format('F Y') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 { animation-delay: 2s; }
</style>

<!-- Main Content -->
<section class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Left Column - Streaming Links & Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Streaming Links -->
                @if($album->spotify_url || $album->apple_music_url || $album->youtube_url)
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h2 class="text-2xl font-black text-gray-900 mb-6">Stream on Your Favorite Platform</h2>
                    <div class="flex flex-wrap gap-4">
                        @if($album->spotify_url)
                        <a href="{{ $album->spotify_url }}"
                           target="_blank"
                           class="flex items-center gap-3 bg-green-500 hover:bg-green-600 text-white px-6 py-4 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-bold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                            </svg>
                            Listen on Spotify
                        </a>
                        @endif

                        @if($album->apple_music_url)
                        <a href="{{ $album->apple_music_url }}"
                           target="_blank"
                           class="flex items-center gap-3 bg-pink-500 hover:bg-pink-600 text-white px-6 py-4 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-bold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.997 6.124c0-.738-.065-1.47-.24-2.19-.317-1.31-1.062-2.31-2.18-3.043C21.003.517 20.373.285 19.7.164c-.517-.093-1.038-.135-1.564-.15-.04-.003-.083-.01-.124-.013H5.988c-.152.01-.303.017-.455.026C4.786.07 4.043.15 3.34.428 2.004.958 1.04 1.88.475 3.208c-.192.448-.292.925-.363 1.408-.056.392-.088.785-.1 1.18-.013.37-.006.74-.006 1.11v9.185c0 .158.002.316.006.474.014.55.05 1.097.175 1.635.088.382.21.753.384 1.106.65 1.318 1.63 2.19 2.948 2.68.753.28 1.534.402 2.336.445.302.017.605.025.908.025h12.054c.307 0 .616-.006.922-.023.867-.05 1.713-.19 2.52-.514 1.048-.42 1.863-1.11 2.442-2.078.41-.686.63-1.424.723-2.193.042-.348.063-.697.068-1.046.005-.37.004-.738.004-1.108V6.124z"/>
                            </svg>
                            Apple Music
                        </a>
                        @endif

                        @if($album->youtube_url)
                        <a href="{{ $album->youtube_url }}"
                           target="_blank"
                           class="flex items-center gap-3 bg-red-500 hover:bg-red-600 text-white px-6 py-4 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-bold">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            YouTube
                        </a>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Additional Info -->
                <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                    <h2 class="text-2xl font-black text-gray-900 mb-6">About This Album</h2>
                    <div class="space-y-4">
                        <div class="flex items-center text-gray-700">
                            <svg class="w-6 h-6 mr-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            <span class="font-bold">Downloadable after purchase</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-6 h-6 mr-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span class="font-bold">High quality MP3 files</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-6 h-6 mr-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-bold">Instant access after purchase</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Purchase Card -->
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 rounded-3xl p-8 shadow-2xl border-2 border-blue-100">
                        <div class="text-center mb-8">
                            @if($album->isFree())
                            <div class="text-6xl font-black text-blue-600 mb-3">FREE</div>
                            <p class="text-gray-700 font-bold">Download this album at no cost</p>
                            @else
                            <div class="text-6xl font-black text-gray-900 mb-3">${{ number_format($album->price, 2) }}</div>
                            <p class="text-gray-700 font-bold">One-time purchase, unlimited downloads</p>
                            @endif
                        </div>

                        <a href="{{ route('shop.purchase', $album->id) }}"
                           class="group block w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white text-center px-8 py-5 rounded-xl font-black text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl overflow-hidden relative">
                            <!-- Shine effect -->
                            <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                            <span class="relative flex items-center justify-center gap-2">
                                {{ $album->isFree() ? 'Download Now' : 'Purchase & Download' }}
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </a>

                        <div class="mt-6 space-y-3 text-center">
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold">Instant access</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold">High quality MP3</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold">Support our ministry</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Albums -->
        @if($relatedAlbums->count() > 0)
        <section class="mt-20 pt-16 border-t border-gray-200">
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-8">You May Also Like</h2>
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
