@extends('layouts.app')

@section('title', 'Shop - Digital Albums | God\'s Family Choir')
@section('description', 'Support God\'s Family Choir by purchasing our digital albums. Stream, download, and enjoy our music.')

@section('content')
<!-- Stunning Hero Section -->
<section class="relative min-h-[85vh] flex items-end overflow-hidden bg-gradient-to-br from-slate-950 via-purple-950 to-black">
    <!-- Event Cover Image -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-purple-900/40 via-transparent to-transparent"></div>
    </div>

    <!-- Enhanced Mesh Gradient Animation -->
    <div class="absolute inset-0 opacity-40">
        <div class="absolute top-0 left-0 w-[700px] h-[700px] bg-gradient-to-r from-amber-500/40 to-orange-500/40 rounded-full blur-[140px] animate-blob"></div>
        <div class="absolute top-0 right-0 w-[700px] h-[700px] bg-gradient-to-l from-purple-500/40 to-pink-500/40 rounded-full blur-[140px] animate-blob animation-delay-2000"></div>
    </div>

    <!-- Floating Music Notes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="music-note absolute top-20 left-10 text-6xl opacity-10 animate-float text-blue-400">♪</div>
        <div class="music-note absolute top-40 right-20 text-4xl opacity-8 animate-float animation-delay-2000 text-purple-400">♫</div>
        <div class="music-note absolute bottom-20 left-1/4 text-5xl opacity-6 animate-float animation-delay-3000 text-indigo-400">♪</div>
        <div class="music-note absolute bottom-40 right-1/3 text-7xl opacity-5 animate-float animation-delay-4000 text-blue-400">♬</div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 w-full">
        
        <nav class="mb-8 animate-fade-in-up">
            <ol class="flex items-center gap-3 text-sm">
                <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors font-medium">Home</a></li>
                <li><span class="text-gray-600">›</span></li>
                <li><span class="text-white font-bold">Music Shop</span></li>
            </ol>
        </nav>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 mb-6 animate-fade-in-up shadow-lg">
                    <i class="fas fa-compact-disc text-blue-400"></i>
                    <span class="text-sm font-semibold text-white">Premium Digital Albums</span>
                </div>

                <!-- Title -->
                <h1 class="text-5xl md:text-7xl font-black text-white leading-tight animate-fade-in-up animation-delay-400">
                    Divine Music<br />Store
                </h1>

                <!-- Description -->
                <p class="text-xl md:text-2xl text-gray-300 leading-relaxed animate-fade-in-up animation-delay-600 max-w-2xl">
                    Experience worship like never before. Stream, purchase, and download our anointed albums.
                </p>

                <!-- Enhanced Search Bar -->
                <form action="{{ route('shop.search') }}" method="GET" class="max-w-2xl animate-fade-in-up animation-delay-800">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-2xl blur-lg opacity-30 group-hover:opacity-50 transition-opacity"></div>
                        <div class="relative bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl border border-white/20">
                            <input type="text"
                                   name="q"
                                   placeholder="Search albums, artists, songs..."
                                   class="w-full px-6 py-4 rounded-2xl text-white placeholder-gray-400 bg-transparent focus:outline-none text-lg"
                                   value="{{ request('q') }}">
                            <button type="submit"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Quick Stats Card -->
            <div class="lg:col-span-1 animate-fade-in-up animation-delay-800">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/30 to-emerald-500/30 rounded-3xl blur-2xl"></div>
                    <div class="relative bg-white/10 backdrop-blur-2xl border-2 border-white/20 rounded-3xl p-8 space-y-6 shadow-2xl">
                        <!-- Stats -->
                        <div class="text-center">
                            <div class="text-5xl font-black text-white mb-2">{{ \App\Models\Album::active()->count() }}+</div>
                            <div class="text-sm text-gray-300 uppercase tracking-wider">Albums Available</div>
                        </div>
                        <div class="h-px bg-white/20"></div>
                        <div class="text-center">
                            <div class="text-4xl mb-2">🎵</div>
                            <div class="text-sm text-gray-300 uppercase tracking-wider">High Quality</div>
                        </div>
                        <div class="h-px bg-white/20"></div>
                        <div class="text-center">
                            <div class="text-4xl mb-2">∞</div>
                            <div class="text-sm text-gray-300 uppercase tracking-wider">Unlimited Access</div>
                        </div>
                    </div>
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

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0; }
    10% { opacity: 0.2; }
    50% { transform: translateY(-100px) rotate(180deg); opacity: 0.2; }
    90% { opacity: 0.2; }
    100% { transform: translateY(-200px) rotate(360deg); opacity: 0; }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animate-float {
    animation: float 15s infinite;
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-600 { animation-delay: 0.6s; }
.animation-delay-800 { animation-delay: 0.8s; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-3000 { animation-delay: 3s; }
.animation-delay-4000 { animation-delay: 4s; }
</style>

<!-- Featured Albums -->
@if($featuredAlbums->count() > 0)
<section class="py-20 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full filter blur-3xl opacity-30 -mr-48 -mt-48"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 rounded-full filter blur-3xl opacity-30 -ml-48 -mb-48"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-orange-400 text-white rounded-full px-6 py-3 mb-6 shadow-lg">
                <i class="fas fa-star animate-pulse"></i>
                <span class="font-bold text-sm uppercase tracking-wider">Staff Picks</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">
                Featured Albums
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Handpicked collections that will elevate your worship experience
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredAlbums as $index => $album)
                <div class="fade-in-section" style="animation-delay: {{ $index * 0.1 }}s;">
                    <x-shop.album-card :album="$album" :featured="true" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Albums -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white relative">
    <!-- Elegant gradient divider -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-blue-400/30 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-2">
                    Complete Collection
                </h2>
                <p class="text-lg text-gray-600">
                    Explore our entire library of worship music
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full px-6 py-3 border-2 border-blue-200 shadow-lg">
                    <i class="fas fa-compact-disc text-blue-600"></i>
                    <span class="font-black text-2xl text-blue-600">{{ $albums->total() }}</span>
                    <span class="text-gray-600 font-medium">{{ Str::plural('Album', $albums->total()) }}</span>
                </div>
            </div>
        </div>

        @if($albums->count() > 0)
            <!-- Filter/Sort Options -->
            <div class="mb-8" x-data="{ activeFilter: 'all', showFilters: false }">
                <div class="flex flex-wrap items-center gap-3">
                    <!-- Toggle Filters Button -->
                    <button @click="showFilters = !showFilters"
                            class="inline-flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-xl font-bold hover:from-blue-600 hover:to-purple-600 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                        <i class="fas fa-filter"></i>
                        Filters & Sort
                        <i class="fas fa-chevron-down text-sm transition-transform" :class="{ 'rotate-180': showFilters }"></i>
                    </button>

                    <!-- Active Filter Indicator -->
                    <div class="text-sm text-gray-600 font-medium">
                        <span x-show="activeFilter === 'all'">Showing all albums</span>
                        <span x-show="activeFilter === 'newest'" x-cloak>Sorted by newest</span>
                        <span x-show="activeFilter === 'price'" x-cloak>Sorted by price</span>
                        <span x-show="activeFilter === 'popular'" x-cloak>Sorted by popularity</span>
                    </div>
                </div>

                <!-- Filter Options (Collapsible) -->
                <div x-show="showFilters"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="mt-4 p-5 bg-white rounded-2xl border border-gray-200 shadow-lg"
                     x-cloak>
                    <div class="flex flex-wrap gap-3">
                        <button @click="activeFilter = 'all'"
                                :class="activeFilter === 'all' ? 'bg-blue-500 text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                class="px-5 py-2.5 rounded-xl font-bold transition-all shadow-md">
                            All Genres
                        </button>
                        <button @click="activeFilter = 'newest'"
                                :class="activeFilter === 'newest' ? 'bg-blue-500 text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                class="px-5 py-2.5 rounded-xl font-bold transition-all shadow-md">
                            Newest First
                        </button>
                        <button @click="activeFilter = 'price'"
                                :class="activeFilter === 'price' ? 'bg-blue-500 text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                class="px-5 py-2.5 rounded-xl font-bold transition-all shadow-md">
                            Price: Low to High
                        </button>
                        <button @click="activeFilter = 'popular'"
                                :class="activeFilter === 'popular' ? 'bg-blue-500 text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                                class="px-5 py-2.5 rounded-xl font-bold transition-all shadow-md">
                            Most Popular
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($albums as $index => $album)
                    <div class="fade-in-section" style="animation-delay: {{ ($index % 8) * 0.05 }}s;">
                        <x-shop.album-card :album="$album" />
                    </div>
                @endforeach
            </div>

            <!-- Enhanced Pagination -->
            <div class="mt-16 flex justify-center">
                {{ $albums->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full mb-6">
                    <i class="fas fa-music text-6xl text-blue-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">No Albums Available Yet</h3>
                <p class="text-lg text-gray-600 mb-6">We're working hard to bring you amazing worship music!</p>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-6 py-3 rounded-xl font-bold transition-all transform hover:scale-105 shadow-lg">
                    <i class="fas fa-home"></i>
                    Return Home
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Support CTA -->
<section class="relative py-24 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white overflow-hidden">
    <!-- Soft Animated Background -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-300 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-300 rounded-full filter blur-3xl animate-pulse animation-delay-2000"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <!-- Icon -->
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full mb-6 border-2 border-white/30">
            <i class="fas fa-heart text-3xl"></i>
        </div>

        <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">
            Support Our Ministry,<br />
            <span class="bg-gradient-to-r from-yellow-200 to-orange-200 bg-clip-text text-transparent">Transform Lives</span>
        </h2>
        <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
            Every purchase fuels our mission to create uplifting music and spread the Gospel through song. Join us in making a difference!
        </p>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 border border-white/30 shadow-lg">
                <div class="text-4xl font-black text-white mb-2">100%</div>
                <div class="text-blue-100 text-sm font-medium">Goes to Ministry</div>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 border border-white/30 shadow-lg">
                <div class="text-4xl font-black text-white mb-2">🎵</div>
                <div class="text-blue-100 text-sm font-medium">Quality Worship</div>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 border border-white/30 shadow-lg">
                <div class="text-4xl font-black text-white mb-2">✨</div>
                <div class="text-blue-100 text-sm font-medium">Lives Changed</div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('contact') }}"
               class="group inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-xl font-black text-lg hover:bg-blue-50 transition-all transform hover:scale-105 shadow-2xl">
                <i class="fas fa-envelope group-hover:rotate-12 transition-transform"></i>
                Contact Us
            </a>
            <a href="{{ route('home') }}"
               class="inline-flex items-center gap-2 bg-transparent text-white px-8 py-4 rounded-xl font-black text-lg hover:bg-white/10 transition-all transform hover:scale-105 border-2 border-white/40 backdrop-blur-sm">
                <i class="fas fa-info-circle"></i>
                Learn More About Us
            </a>
        </div>

        <!-- Trust indicators -->
        <div class="mt-10 pt-8 border-t border-white/30">
            <p class="text-sm text-blue-100 mb-4 font-medium">Trusted by thousands of worshipers worldwide</p>
            <div class="flex justify-center items-center gap-6 flex-wrap text-blue-200">
                <div class="flex items-center gap-2">
                    <i class="fas fa-shield-alt"></i>
                    <span class="text-sm font-medium">Secure Checkout</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-shipping-fast"></i>
                    <span class="text-sm font-medium">Instant Delivery</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-bolt"></i>
                    <span class="text-sm font-medium">Lightning Fast</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.fade-in-section {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
