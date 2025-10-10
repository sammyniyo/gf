@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/gf-2.jpg') }}" alt="Daily Devotions" class="w-full h-full object-cover opacity-15" />
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 via-emerald-900/85 to-emerald-950/95"></div>
    </div>

    <!-- Mesh Gradient Animation -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-emerald-500 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-96 h-96 bg-teal-500 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Musical Notes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        @for($i = 1; $i <= 8; $i++)
            <div class="absolute musical-note" style="
                top: {{ rand(10, 80) }}%;
                left: {{ rand(5, 90) }}%;
                animation-delay: {{ $i * 0.6 }}s;
                font-size: {{ rand(25, 55) }}px;
                opacity: {{ rand(5, 12) / 100 }};
            ">{{ ['♪', '♫', '♬', '♩'][rand(0, 3)] }}</div>
        @endfor
    </div>

    <div class="relative z-10 text-center px-4 max-w-5xl mx-auto py-20">
        <div class="inline-block mb-6 animate-fade-in-up">
            <span class="px-4 py-2 bg-amber-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-semibold">
                SPIRITUAL JOURNEY
            </span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight animate-fade-in-up animation-delay-200">
            Daily <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Devotions</span>
        </h1>
        <p class="text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto leading-relaxed mb-8 animate-fade-in-up animation-delay-400">
            Nourish your soul with daily reflections, scripture, and spiritual insights from our choir community
        </p>
        <div class="flex flex-wrap gap-6 justify-center items-center animate-fade-in-up animation-delay-600">
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Updated Daily
            </div>
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                From the Heart
            </div>
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Scripture Based
            </div>
        </div>
    </div>
</section>

<!-- Devotions Grid -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Recent Devotions</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto mb-8">
                Discover spiritual wisdom and inspiration through our carefully curated daily devotions
            </p>

            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center gap-3">
                <button class="px-4 py-2 bg-gradient-to-r from-emerald-500 to-lime-500 text-white rounded-full text-sm font-medium hover:from-emerald-600 hover:to-lime-600 transition-all">
                    All Devotions
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-full text-sm font-medium hover:bg-emerald-50 hover:border-emerald-300 transition-all">
                    Unity (2)
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-full text-sm font-medium hover:bg-emerald-50 hover:border-emerald-300 transition-all">
                    Worship (1)
                </button>
                <button class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-full text-sm font-medium hover:bg-emerald-50 hover:border-emerald-300 transition-all">
                    Joy (1)
                </button>
            </div>
        </div>

        @if($devotions->count() > 0)
            <!-- Devotions Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($devotions as $index => $devotion)
                    <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            @if($devotion->featured_image)
                                <img src="{{ Storage::url($devotion->featured_image) }}"
                                     alt="{{ $devotion->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-emerald-400 to-lime-500 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-emerald-500 text-white text-sm font-semibold rounded-full">
                                    {{ ucfirst($devotion->category) }}
                                </span>
                            </div>

                            <!-- Date -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-black/20 backdrop-blur-sm text-white text-sm font-medium rounded-full">
                                    {{ $devotion->created_at->format('M d') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                                {{ $devotion->title }}
                            </h3>

                            @if($devotion->scripture_reference)
                                <div class="mb-3">
                                    <span class="text-sm text-emerald-600 font-medium">
                                        📖 {{ $devotion->scripture_reference }}
                                    </span>
                                </div>
                            @endif

                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $devotion->excerpt }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    @if($devotion->author)
                                        <span>By {{ $devotion->author }}</span>
                                    @endif
                                </div>

                                <a href="{{ route('devotions.show', $devotion) }}"
                                   class="inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700 transition-colors">
                                    Read More
                                    <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <div class="bg-white rounded-2xl shadow-lg p-4">
                    {{ $devotions->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-emerald-100 to-lime-100 rounded-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">No Devotions Yet</h3>
                <p class="text-gray-600 max-w-md mx-auto">
                    We're preparing beautiful devotions for you. Check back soon for daily spiritual inspiration!
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-lime-600">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-white mb-6">Stay Connected</h2>
        <p class="text-xl text-emerald-100 mb-8">
            Join our community and receive daily devotions directly in your inbox
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
            <input type="email"
                   placeholder="Enter your email"
                   class="flex-1 px-6 py-4 rounded-xl border-0 text-gray-900 placeholder-gray-500 focus:ring-2 focus:ring-emerald-300 focus:outline-none">
            <button class="px-8 py-4 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 transition-colors">
                Subscribe
            </button>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.static.footer')

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(20px, -50px) scale(1.1); }
    50% { transform: translate(-20px, 20px) scale(0.9); }
    75% { transform: translate(50px, 50px) scale(1.05); }
}

.animate-blob {
    animation: blob 10s ease-in-out infinite;
}

.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-4000 { animation-delay: 4s; }

@keyframes float-musical {
    0% { transform: translateY(0) translateX(0) rotate(0deg); opacity: 0; }
    10% { opacity: 0.12; }
    90% { opacity: 0.12; }
    100% { transform: translateY(-100vh) translateX(30px) rotate(360deg); opacity: 0; }
}

.musical-note {
    position: absolute;
    color: white;
    animation: float-musical 18s linear infinite;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-600 { animation-delay: 0.6s; }

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection
