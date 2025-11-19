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
                        <i class="fas fa-music text-blue-400"></i>
                        <span class="font-bold">{{ $album->track_count }} Tracks</span>
                    </div>
                    @endif

                    @if($album->release_date)
                    <div class="flex items-center gap-2 text-white">
                        <i class="fas fa-calendar-alt text-blue-400"></i>
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
                            <i class="fab fa-spotify text-xl"></i>
                            Listen on Spotify
                        </a>
                        @endif

                        @if($album->apple_music_url)
                        <a href="{{ $album->apple_music_url }}"
                           target="_blank"
                           class="flex items-center gap-3 bg-pink-500 hover:bg-pink-600 text-white px-6 py-4 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-bold">
                            <i class="fab fa-apple text-xl"></i>
                            Apple Music
                        </a>
                        @endif

                        @if($album->youtube_url)
                        <a href="{{ $album->youtube_url }}"
                           target="_blank"
                           class="flex items-center gap-3 bg-red-500 hover:bg-red-600 text-white px-6 py-4 rounded-xl transition-all shadow-lg hover:shadow-xl transform hover:scale-105 font-bold">
                            <i class="fab fa-youtube text-xl"></i>
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
                            <i class="fas fa-download text-blue-600 text-xl mr-4"></i>
                            <span class="font-bold">Downloadable after purchase</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-shield-alt text-blue-600 text-xl mr-4"></i>
                            <span class="font-bold">High quality MP3 files</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-clock text-blue-600 text-xl mr-4"></i>
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
                                <i class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </a>

                        <div class="mt-6 space-y-3 text-center">
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm font-bold">Instant access</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm font-bold">High quality MP3</span>
                            </div>
                            <div class="flex items-center justify-center gap-2 text-gray-700">
                                <i class="fas fa-check-circle text-green-500"></i>
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
