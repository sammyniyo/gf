@extends('layouts.app')

@section('title', 'Stories | God\'s Family Choir')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/gf-2.jpg') }}" alt="Our Story" class="w-full h-full object-cover opacity-15" />
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
                OUR JOURNEY
            </span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight animate-fade-in-up animation-delay-200">
            Stories Behind <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Our Music</span>
        </h1>
        <p class="text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto leading-relaxed mb-8 animate-fade-in-up animation-delay-400">
            Discover the beautiful journey behind our music, the stories that inspire our songs, and the special moments that define our choir
        </p>
        <div class="flex flex-wrap gap-6 justify-center items-center animate-fade-in-up animation-delay-600">
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Musical Journey
            </div>
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Heart & Soul
            </div>
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Community
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Musical Journey</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Every song has a story, every performance a memory, and every moment a lesson learned
            </p>
        </div>

        @if($stories->count() > 0)
            <!-- Stories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($stories as $index => $story)
                    <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            @if($story->featured_image)
                                <img src="{{ Storage::url($story->featured_image) }}"
                                     alt="{{ $story->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-emerald-400 via-teal-400 to-cyan-500 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-emerald-600 text-white text-sm font-semibold rounded-full">
                                    {{ ucfirst($story->category) }}
                                </span>
                            </div>

                            <!-- Date -->
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 bg-black/20 backdrop-blur-sm text-white text-sm font-medium rounded-full">
                                    {{ $story->event_date ? $story->event_date->format('M Y') : $story->created_at->format('M Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-emerald-600 transition-colors">
                                {{ $story->title }}
                            </h3>

                            @if($story->location)
                                <div class="mb-3">
                                    <span class="text-sm text-emerald-600 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        {{ $story->location }}
                                    </span>
                                </div>
                            @endif

                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $story->excerpt }}
                            </p>

                            <a href="{{ route('story.show', $story) }}"
                               class="inline-flex items-center text-emerald-600 font-semibold hover:text-emerald-700 transition-colors">
                                Read Full Story
                                <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <div class="bg-white rounded-2xl shadow-lg p-4">
                    {{ $stories->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Stories Coming Soon</h3>
                <p class="text-gray-600 max-w-md mx-auto">
                    We're gathering beautiful stories from our musical journey. Check back soon for inspiring tales from our choir!
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-teal-600">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-white mb-6">Share Your Story</h2>
        <p class="text-xl text-emerald-100 mb-8">
            Have a special memory or story from our choir? We'd love to hear it and share it with our community
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
            <a href="{{ route('contact') }}"
               class="px-8 py-4 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 transition-colors">
                Share Your Story
            </a>
            <a href="{{ route('choir.register.form') }}"
               class="px-8 py-4 bg-emerald-500 text-white font-bold rounded-xl hover:bg-emerald-400 transition-colors">
                Join Our Choir
            </a>
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
