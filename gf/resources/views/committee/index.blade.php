@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/gf-2.jpg') }}" alt="Our Committee" class="w-full h-full object-cover opacity-15" />
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
                OUR LEADERSHIP
            </span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight animate-fade-in-up animation-delay-200">
            Meet Our <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Committee</span>
        </h1>
        <p class="text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto leading-relaxed mb-8 animate-fade-in-up animation-delay-400">
            The dedicated leaders who guide our choir's mission and ensure every voice is heard in harmony
        </p>
        <div class="flex flex-wrap gap-6 justify-center items-center animate-fade-in-up animation-delay-600">
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Leadership
            </div>
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Excellence
            </div>
            <div class="flex items-center text-emerald-200">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Dedication
            </div>
        </div>
    </div>
</section>

<!-- Committee Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Leadership Team</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Meet the passionate individuals who lead our choir's various departments and ensure our mission continues to flourish
            </p>
        </div>

        @if($committees->count() > 0)
            <!-- Departments Grid -->
            <div class="space-y-16">
                @foreach($departments as $department)
                    @if($committees->has($department))
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                            <!-- Department Header -->
                            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-8 py-6">
                                <h3 class="text-2xl font-bold text-white flex items-center">
                                    <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    {{ $department }}
                                </h3>
                                <p class="text-emerald-100 mt-2">{{ $committees[$department]->count() }} {{ Str::plural('member', $committees[$department]->count()) }}</p>
                            </div>

                            <!-- Committee Members -->
                            <div class="p-8">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                    @foreach($committees[$department] as $member)
                                        <div class="group text-center">
                                            <!-- Photo -->
                                            <div class="relative mb-6">
                                                <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2">
                                                    @if($member->photo)
                                                        <img src="{{ Storage::url($member->photo) }}"
                                                             alt="{{ $member->name }}"
                                                             class="w-full h-full object-cover">
                                                    @else
                                                        <div class="w-full h-full bg-gradient-to-br from-emerald-400 via-teal-400 to-cyan-500 flex items-center justify-center">
                                                            <span class="text-4xl font-bold text-white">
                                                                {{ substr($member->name, 0, 1) }}
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- Position Badge -->
                                                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                                    <span class="px-3 py-1 bg-emerald-600 text-white text-xs font-semibold rounded-full shadow-lg">
                                                        {{ $member->position }}
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Member Info -->
                                            <div class="space-y-3">
                                                <h4 class="text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition-colors">
                                                    {{ $member->name }}
                                                </h4>

                                                @if($member->bio)
                                                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                                        {{ $member->bio }}
                                                    </p>
                                                @endif

                                                <!-- Contact Info -->
                                                <div class="space-y-2">
                                                    @if($member->email)
                                                        <a href="mailto:{{ $member->email }}"
                                                           class="inline-flex items-center text-emerald-600 hover:text-emerald-700 text-sm font-medium transition-colors">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                            </svg>
                                                            {{ $member->email }}
                                                        </a>
                                                    @endif

                                                    @if($member->phone)
                                                        <a href="tel:{{ $member->phone }}"
                                                           class="inline-flex items-center text-emerald-600 hover:text-emerald-700 text-sm font-medium transition-colors">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                            </svg>
                                                            {{ $member->phone }}
                                                        </a>
                                                    @endif
                                                </div>

                                                <!-- Social Links -->
                                                @if($member->formatted_social_links && count($member->formatted_social_links) > 0)
                                                    <div class="flex justify-center space-x-3 pt-2">
                                                        @foreach($member->formatted_social_links as $social)
                                                            <a href="{{ $social['url'] }}"
                                                               target="_blank"
                                                               rel="noopener noreferrer"
                                                               class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all duration-300 transform hover:scale-110"
                                                               title="{{ $social['platform'] }}">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="{{ $social['icon'] }}"/>
                                                                </svg>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="w-32 h-32 mx-auto mb-8 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Committee Coming Soon</h3>
                <p class="text-gray-600 max-w-md mx-auto">
                    We're currently updating our leadership information. Check back soon to meet our amazing committee members!
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-teal-600">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold text-white mb-6">Join Our Leadership</h2>
        <p class="text-xl text-emerald-100 mb-8">
            Interested in taking on a leadership role in our choir? We're always looking for dedicated members to help guide our mission
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
            <a href="{{ route('contact') }}"
               class="px-8 py-4 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 transition-colors">
                Contact Us
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
