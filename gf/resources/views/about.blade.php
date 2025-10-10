@extends('layouts.app')

@section('content')
<!-- Cinematic Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Dynamic Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/gf-2.jpg') }}" alt="About Us" class="w-full h-full object-cover opacity-15" />
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/95 via-emerald-900/90 to-black/95"></div>
        </div>

    <!-- Animated Mesh Gradient -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-amber-500/20 to-emerald-500/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-emerald-500/20 to-blue-500/20 rounded-full blur-3xl animate-pulse animation-delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-br from-purple-500/20 to-amber-500/20 rounded-full blur-3xl animate-pulse animation-delay-2000"></div>
        </div>

    <!-- Floating Musical Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        @for($i = 1; $i <= 12; $i++)
            <div class="absolute musical-note-float" style="
                top: {{ rand(10, 80) }}%;
                left: {{ rand(5, 90) }}%;
                animation-delay: {{ $i * 0.4 }}s;
                font-size: {{ rand(25, 50) }}px;
                opacity: {{ rand(8, 18) / 100 }};
            ">{{ ['♪', '♫', '♬', '♩', '🎵', '🎶'][rand(0, 5)] }}</div>
        @endfor
        </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-24 text-center">
        <div class="inline-block mb-8 animate-fade-in-up">
            <span class="px-8 py-4 bg-gradient-to-r from-amber-500/20 to-emerald-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-bold tracking-wider">
                ✨ OUR STORY ✨
            </span>
        </div>
        <h1 class="text-6xl md:text-8xl font-black text-white mb-10 leading-tight animate-fade-in-up animation-delay-200">
            About <span class="bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-200 bg-clip-text text-transparent animate-gradient-x">God's Family</span>
        </h1>
        <p class="text-2xl md:text-3xl text-emerald-100 max-w-5xl mx-auto leading-relaxed animate-fade-in-up animation-delay-400 font-light">
            We are a community of believers united in worship, creating <span class="text-amber-300 font-semibold">breathtaking music</span> that glorifies God and touches hearts around the world.
        </p>

        <!-- Live Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16 animate-fade-in-up animation-delay-600">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-amber-400 mb-2 counter" data-target="60">0</div>
                <div class="text-emerald-200 font-semibold">Active Members</div>
                                </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-amber-400 mb-2 counter" data-target="25">0</div>
                <div class="text-emerald-200 font-semibold">Years of Worship</div>
                            </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-amber-400 mb-2 counter" data-target="500">0</div>
                <div class="text-emerald-200 font-semibold">Performances</div>
                        </div>
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-black text-amber-400 mb-2 counter" data-target="10">0</div>
                <div class="text-emerald-200 font-semibold">Million+ Listeners</div>
                                </div>
                            </div>
                        </div>
</section>

<!-- Interactive Timeline with Parallax -->
<section class="py-32 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, #10b981 2px, transparent 0), radial-gradient(circle at 75% 75%, #f59e0b 2px, transparent 0); background-size: 60px 60px;"></div>
                    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="text-center mb-24">
            <div class="inline-block mb-6">
                <span class="px-6 py-3 bg-gradient-to-r from-emerald-500/10 to-amber-500/10 backdrop-blur-xl border border-emerald-400/20 rounded-full text-emerald-600 text-sm font-bold">
                    🎯 OUR JOURNEY
                </span>
                                        </div>
            <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-8 bg-gradient-to-r from-gray-900 via-emerald-800 to-gray-900 bg-clip-text text-transparent">Our Journey</h2>
            <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">From humble beginnings to <span class="text-emerald-600 font-semibold">international recognition</span></p>
                                    </div>

        <div class="relative">
            <!-- Animated Timeline Line -->
            <div class="absolute left-1/2 transform -translate-x-1/2 w-2 h-full bg-gradient-to-b from-emerald-500 via-amber-500 to-emerald-600 rounded-full shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-b from-emerald-400 via-amber-400 to-emerald-500 rounded-full animate-pulse"></div>
                                </div>

            @foreach([
                ['year' => '1998', 'title' => 'The Genesis', 'description' => 'Started with just 12 passionate members in a small church basement, united by faith and love for music', 'image' => '1.jpg', 'icon' => '🌟'],
                ['year' => '2005', 'title' => 'First Album', 'description' => 'Released our debut worship album "Songs of Faith" - a milestone that changed everything', 'image' => '2.jpg', 'icon' => '🎵'],
                ['year' => '2010', 'title' => 'Global Reach', 'description' => 'Began international tours, sharing our music and message across continents', 'image' => '3.jpg', 'icon' => '🌍'],
                ['year' => '2015', 'title' => 'Digital Revolution', 'description' => 'Launched our online presence, reaching millions through streaming platforms', 'image' => '4.jpg', 'icon' => '💻'],
                ['year' => '2023', 'title' => 'Present Glory', 'description' => 'Over 60 active members and millions of listeners worldwide, still growing strong', 'image' => '5.jpg', 'icon' => '✨'],
            ] as $milestone)
                <div class="relative mb-20 timeline-item group">
                    <div class="flex items-center {{ $loop->iteration % 2 == 0 ? 'flex-row-reverse' : '' }}">
                        <!-- Content Card -->
                        <div class="w-5/12 {{ $loop->iteration % 2 == 0 ? 'text-right' : '' }}">
                            <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl p-10 hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-3 group-hover:scale-105 border border-gray-100/50">
                                <div class="flex items-center {{ $loop->iteration % 2 == 0 ? 'justify-end' : '' }} mb-4">
                                    <span class="text-3xl mr-3">{{ $milestone['icon'] }}</span>
                                    <div class="text-5xl font-black bg-gradient-to-r from-emerald-600 to-amber-600 bg-clip-text text-transparent">{{ $milestone['year'] }}</div>
                            </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-6">{{ $milestone['title'] }}</h3>
                                <p class="text-gray-600 leading-relaxed text-lg">{{ $milestone['description'] }}</p>

                                <!-- Decorative Element -->
                                <div class="mt-6 {{ $loop->iteration % 2 == 0 ? 'ml-auto' : 'mr-auto' }} w-20 h-1 bg-gradient-to-r from-emerald-500 to-amber-500 rounded-full"></div>
                        </div>
                    </div>

                        <!-- Center Image -->
                        <div class="w-2/12 flex justify-center">
                            <div class="relative group">
                                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-emerald-500 via-amber-500 to-emerald-600 flex items-center justify-center shadow-2xl group-hover:scale-110 transition-all duration-500">
                                    <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white">
                                        <img src="{{ asset('images/' . $milestone['image']) }}" alt="{{ $milestone['title'] }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                            </div>
                                <!-- Glow Effect -->
                                <div class="absolute -inset-4 rounded-full bg-gradient-to-br from-emerald-400/30 to-amber-400/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-pulse"></div>
                                <!-- Ring Animation -->
                                <div class="absolute -inset-2 rounded-full border-2 border-emerald-400/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-spin" style="animation-duration: 3s;"></div>
                        </div>
                    </div>

                        <!-- Spacer -->
                        <div class="w-5/12"></div>
                                    </div>
                                </div>
            @endforeach
                            </div>
                        </div>
</section>

<!-- Core Values with 3D Effects -->
<section class="py-32 bg-gradient-to-br from-emerald-50 via-white to-amber-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-20 w-64 h-64 bg-emerald-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-20 w-64 h-64 bg-amber-500 rounded-full blur-3xl"></div>
                        </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <div class="text-center mb-24">
            <div class="inline-block mb-6">
                <span class="px-6 py-3 bg-gradient-to-r from-amber-500/10 to-emerald-500/10 backdrop-blur-xl border border-amber-400/20 rounded-full text-amber-600 text-sm font-bold">
                    💎 OUR VALUES
                </span>
                    </div>
            <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-8 bg-gradient-to-r from-gray-900 via-amber-700 to-gray-900 bg-clip-text text-transparent">Our Core Values</h2>
            <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">The <span class="text-amber-600 font-semibold">principles</span> that guide everything we do</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['icon' => '🙏', 'title' => 'Faith', 'description' => 'Our foundation is built on unwavering faith in God and His word, guiding every note we sing', 'color' => 'from-blue-500 to-blue-600', 'bg' => 'from-blue-50 to-blue-100'],
                ['icon' => '🎵', 'title' => 'Excellence', 'description' => 'We strive for musical excellence in every performance, recording, and moment of worship', 'color' => 'from-emerald-500 to-emerald-600', 'bg' => 'from-emerald-50 to-emerald-100'],
                ['icon' => '❤️', 'title' => 'Love', 'description' => 'Love for God, each other, and the communities we serve drives our ministry forward', 'color' => 'from-red-500 to-red-600', 'bg' => 'from-red-50 to-red-100'],
                ['icon' => '🤝', 'title' => 'Unity', 'description' => 'We believe in the power of coming together as one voice, one heart, one family', 'color' => 'from-purple-500 to-purple-600', 'bg' => 'from-purple-50 to-purple-100'],
                ['icon' => '🌟', 'title' => 'Inspiration', 'description' => 'Our music aims to inspire and uplift hearts everywhere, bringing hope and joy', 'color' => 'from-amber-500 to-amber-600', 'bg' => 'from-amber-50 to-amber-100'],
                ['icon' => '🌍', 'title' => 'Service', 'description' => 'Serving God and our community through worship, outreach, and compassionate action', 'color' => 'from-teal-500 to-teal-600', 'bg' => 'from-teal-50 to-teal-100'],
            ] as $value)
                <div class="group relative">
                    <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-10 shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-4 group-hover:scale-105 border border-gray-100/50 relative overflow-hidden">
                        <!-- Background Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br {{ $value['bg'] }} opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            <div class="text-8xl mb-8 group-hover:scale-110 transition-transform duration-500 group-hover:rotate-12">{{ $value['icon'] }}</div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:{{ $value['color'] }} group-hover:bg-clip-text transition-all duration-500">{{ $value['title'] }}</h3>
                            <p class="text-gray-600 leading-relaxed text-lg">{{ $value['description'] }}</p>

                            <!-- Decorative Line -->
                            <div class="mt-8 w-16 h-1 bg-gradient-to-r {{ $value['color'] }} rounded-full group-hover:w-24 transition-all duration-500"></div>
            </div>

                        <!-- Floating Elements -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-gradient-to-r {{ $value['color'] }} rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-ping"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
    </div>
</section>

<!-- Photo Gallery with Masonry Layout -->
<section class="py-32 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,<svg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"><g fill=\"none\" fill-rule=\"evenodd\"><g fill=\"%23059669\" fill-opacity=\"0.1\"><circle cx=\"30\" cy=\"30\" r=\"2\"/></g></svg>');"></div>
    </div>

    <div class="relative z-10 max-w-8xl mx-auto px-6">
        <div class="text-center mb-24">
            <div class="inline-block mb-6">
                <span class="px-6 py-3 bg-gradient-to-r from-emerald-500/10 to-amber-500/10 backdrop-blur-xl border border-emerald-400/20 rounded-full text-emerald-600 text-sm font-bold">
                    📸 MOMENTS OF GLORY
                </span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-8 bg-gradient-to-r from-gray-900 via-emerald-800 to-gray-900 bg-clip-text text-transparent">Moments of Glory</h2>
            <p class="text-2xl text-gray-600 max-w-4xl mx-auto leading-relaxed">Capturing our <span class="text-emerald-600 font-semibold">beautiful journey</span> through the years</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach(['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '1.jpg', '2.jpg', '3.jpg'] as $index => $image)
                <div class="group relative overflow-hidden rounded-3xl bg-gray-200 hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-4 {{ $index % 3 === 0 ? 'aspect-square' : 'aspect-[4/5]' }}">
                    <img src="{{ asset('images/' . $image) }}" alt="Choir Moment"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <!-- Content -->
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform duration-500 opacity-0 group-hover:opacity-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold bg-emerald-500/20 backdrop-blur-xl px-3 py-1 rounded-full">Performance</span>
                            <span class="text-xs opacity-75">2023</span>
                        </div>
                        <h4 class="text-lg font-bold mb-2">Beautiful Moment</h4>
                        <p class="text-sm opacity-90">Capturing the spirit of worship</p>
            </div>

                    <!-- Play Button (for some images) -->
                    @if($index % 2 === 0)
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    @endif
                    </div>
                @endforeach
            </div>
    </div>
</section>

<!-- Final CTA with Advanced Effects -->
<section class="py-32 bg-gradient-to-br from-emerald-900 via-emerald-800 to-black relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-emerald-900/50 via-transparent to-amber-900/30"></div>
        </div>

    <!-- Floating Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        @for($i = 1; $i <= 15; $i++)
            <div class="absolute floating-element" style="
                top: {{ rand(10, 80) }}%;
                left: {{ rand(5, 90) }}%;
                animation-delay: {{ $i * 0.2 }}s;
                font-size: {{ rand(20, 45) }}px;
                opacity: {{ rand(5, 15) / 100 }};
            ">{{ ['✨', '⭐', '💫', '🌟', '🎵', '🎶', '🙏'][rand(0, 6)] }}</div>
        @endfor
            </div>

    <!-- Mesh Gradient Orbs -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gradient-to-br from-amber-500/30 to-emerald-500/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-gradient-to-br from-emerald-500/30 to-blue-500/30 rounded-full blur-3xl animate-pulse animation-delay-1000"></div>
        </div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
        <div class="inline-block mb-8">
            <span class="px-8 py-4 bg-gradient-to-r from-amber-500/20 to-emerald-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-bold tracking-wider">
                🎯 JOIN OUR FAMILY
            </span>
        </div>
        <h2 class="text-5xl md:text-7xl font-black text-white mb-12 leading-tight">
            Join Our <span class="bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-200 bg-clip-text text-transparent animate-gradient-x">Family</span>
        </h2>
        <p class="text-2xl md:text-3xl text-emerald-100 mb-16 leading-relaxed max-w-5xl mx-auto font-light">
            Be part of something <span class="text-amber-300 font-semibold">greater</span>. Experience the joy of worshiping together and creating beautiful music that touches hearts.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-8 justify-center mb-20">
            <a href="{{ route('choir.register.form') }}"
               class="group relative px-12 py-6 bg-gradient-to-r from-amber-500 to-amber-600 text-emerald-950 font-bold rounded-2xl hover:shadow-2xl hover:shadow-amber-500/50 transition-all duration-500 transform hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-amber-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <span class="relative flex items-center justify-center gap-3 text-lg">
                    Become a Member
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </span>
            </a>
            <a href="/events"
               class="group relative px-12 py-6 border-2 border-emerald-400 text-emerald-300 font-bold rounded-2xl hover:bg-emerald-400 hover:text-emerald-900 transition-all duration-500 transform hover:-translate-y-2 backdrop-blur-xl">
                <span class="relative flex items-center justify-center gap-3 text-lg">
                    View Our Events
                    <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </span>
            </a>
        </div>

        <!-- Scripture Quote with Enhanced Design -->
        <div class="relative p-12 bg-white/10 backdrop-blur-2xl rounded-3xl border border-white/20 shadow-2xl max-w-4xl mx-auto">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-gradient-to-r from-amber-500 to-emerald-500 rounded-full flex items-center justify-center">
                <span class="text-2xl">📖</span>
            </div>
            <p class="text-xl md:text-2xl text-emerald-100 italic leading-relaxed mb-6">
                "Sing to the Lord a new song; sing to the Lord, all the earth. Sing to the Lord, praise his name; proclaim his salvation day after day."
            </p>
            <div class="flex items-center justify-center gap-4">
                <div class="w-8 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent"></div>
                <p class="text-emerald-300 font-semibold text-lg">— Psalm 96:1-2</p>
                <div class="w-8 h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent"></div>
                </div>
            </div>
        </div>
    </section>

    <x-static.footer />

<style>
    @keyframes float-musical-note {
        0% { transform: translateY(0) rotate(0deg); opacity: 0; }
        10% { opacity: 0.18; }
        90% { opacity: 0.18; }
        100% { transform: translateY(-120vh) rotate(360deg); opacity: 0; }
    }
    .musical-note-float {
        position: absolute;
        color: white;
        animation: float-musical-note 30s linear infinite;
    }

    @keyframes floating-element {
        0% { transform: translateY(0) rotate(0deg); opacity: 0; }
        10% { opacity: 0.15; }
        90% { opacity: 0.15; }
        100% { transform: translateY(-100vh) rotate(180deg); opacity: 0; }
    }
    .floating-element {
        position: absolute;
        color: white;
        animation: floating-element 35s linear infinite;
    }

    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(50px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out forwards;
            opacity: 0;
        }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }
    .animation-delay-1000 { animation-delay: 1s; }
    .animation-delay-2000 { animation-delay: 2s; }

    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 3s ease infinite;
    }

    .timeline-item {
        opacity: 0;
        transform: translateY(80px);
        animation: fade-in-up 1s ease-out forwards;
    }
    .timeline-item:nth-child(1) { animation-delay: 0.3s; }
    .timeline-item:nth-child(2) { animation-delay: 0.6s; }
    .timeline-item:nth-child(3) { animation-delay: 0.9s; }
    .timeline-item:nth-child(4) { animation-delay: 0.12s; }
    .timeline-item:nth-child(5) { animation-delay: 1.5s; }

    /* Counter Animation */
    .counter {
        font-variant-numeric: tabular-nums;
    }
</style>

<script>
    // Counter Animation
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);

                // Add suffix for million
                if (target >= 10 && counter.textContent === '10') {
                    counter.textContent = '10M+';
                }
            }, 16);
        });
    }

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                if (entry.target.classList.contains('timeline-item')) {
                    entry.target.style.animationPlayState = 'running';
                }
            }
        });
    }, observerOptions);

    // Observe timeline items
    document.addEventListener('DOMContentLoaded', () => {
        const timelineItems = document.querySelectorAll('.timeline-item');
        timelineItems.forEach(item => {
            observer.observe(item);
        });

        // Animate counters when hero section is visible
        const heroSection = document.querySelector('section');
        if (heroSection) {
            const heroObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        heroObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            heroObserver.observe(heroSection);
        }
    });

    // Parallax scrolling effect
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.musical-note-float, .floating-element');

        parallaxElements.forEach((element, index) => {
            const speed = 0.5 + (index % 3) * 0.1;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
</script>

@endsection
