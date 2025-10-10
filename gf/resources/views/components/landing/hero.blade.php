<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">

    <!-- Animated Background Layers -->
    <div class="absolute inset-0 z-0">
        <!-- Main Background Image with Parallax -->
        <div class="absolute inset-0 parallax-bg">
            <img src="{{ asset('images/gf-2.jpg') }}" alt="God's Family Choir"
                class="w-full h-full object-cover opacity-20 scale-110" />
        </div>

        <!-- Gradient Overlays -->
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 via-emerald-900/80 to-emerald-950/95"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/50 via-transparent to-amber-950/30"></div>

        <!-- Animated Mesh Gradient -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 left-0 w-96 h-96 bg-amber-500/30 rounded-full blur-3xl animate-blob"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/30 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-teal-500/30 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
        </div>
    </div>

    <!-- Floating Musical Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-10">
        @for($i = 1; $i <= 8; $i++)
            <div class="absolute musical-note" style="
                top: {{ rand(10, 80) }}%;
                left: {{ rand(5, 90) }}%;
                animation-delay: {{ $i * 0.5 }}s;
                font-size: {{ rand(20, 60) }}px;
                opacity: {{ rand(5, 15) / 100 }};
            ">{{ ['♪', '♫', '♬', '♩'][rand(0, 3)] }}</div>
        @endfor
    </div>

    <!-- Main Content Container -->
    <div class="relative z-20 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-20">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left Column: Content -->
            <div class="text-left space-y-8">

                <!-- Animated Badge -->
                <div class="inline-flex items-center gap-3 bg-gradient-to-r from-amber-500/20 to-emerald-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full px-6 py-3 shadow-2xl animate-fade-in-up">
                    <div class="relative">
                        <div class="w-3 h-3 bg-amber-400 rounded-full animate-pulse"></div>
                        <div class="absolute inset-0 w-3 h-3 bg-amber-400 rounded-full animate-ping"></div>
                    </div>
                    <span class="text-amber-300 font-semibold text-sm tracking-wide">CELEBRATING 25+ YEARS OF WORSHIP</span>
                    <span class="px-3 py-1 bg-amber-500/30 rounded-full text-amber-200 text-xs font-bold">Since 1998</span>
                </div>

                <!-- Main Headline with Gradient Animation -->
                <div class="space-y-4 animate-fade-in-up animation-delay-200">
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black leading-none">
                        <span class="block text-white mb-2 tracking-tight">God's Family</span>
                        <span class="block bg-gradient-to-r from-amber-400 via-amber-300 to-yellow-200 bg-clip-text text-transparent animate-gradient-x">
                            Choir
                        </span>
                    </h1>
                    <div class="flex items-center gap-4">
                        <div class="h-1 w-20 bg-gradient-to-r from-amber-400 to-transparent rounded-full"></div>
                        <p class="text-xl sm:text-2xl text-emerald-100 font-light tracking-wide">
                            Voices United in <span class="text-amber-400 font-semibold">Faith</span>
                        </p>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-lg sm:text-xl text-gray-300 leading-relaxed max-w-2xl animate-fade-in-up animation-delay-400">
                    A vibrant <span class="text-emerald-300 font-semibold">Seventh-day Adventist</span> community rooted in ASA UR Nyarugenge—where devoted hearts glorify God through <span class="text-amber-300 font-semibold">spirit-filled harmonies</span> and transformative worship.
                </p>

                <!-- Stats Bar -->
                <div class="grid grid-cols-3 gap-6 py-6 animate-fade-in-up animation-delay-600">
                    <div class="text-center lg:text-left">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-amber-400 counter" data-target="60">0</span>
                            <span class="text-2xl text-amber-400">+</span>
                        </div>
                        <p class="text-sm text-gray-400 mt-1">Active Members</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-emerald-400 counter" data-target="500">0</span>
                            <span class="text-2xl text-emerald-400">+</span>
                        </div>
                        <p class="text-sm text-gray-400 mt-1">Performances</p>
                    </div>
                    <div class="text-center lg:text-left">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-teal-400 counter" data-target="10">0</span>
                            <span class="text-2xl text-teal-400">M+</span>
                        </div>
                        <p class="text-sm text-gray-400 mt-1">Online Reach</p>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4 animate-fade-in-up animation-delay-800">
                    <a href="{{ route('choir.register.form') }}" class="group relative inline-flex items-center justify-center gap-3 px-8 py-5 bg-gradient-to-r from-amber-500 to-amber-600 text-emerald-950 font-bold rounded-2xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:shadow-amber-500/50 hover:-translate-y-1 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-yellow-400 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <svg class="w-6 h-6 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span class="relative z-10">Join the Choir</span>
                    </a>

                    <a href="https://www.youtube.com/watch?v=DR1QiuFpx9I&pp=ygUPbXd1YmFoZSB1d2l0ZWth" target="_blank" class="group inline-flex items-center justify-center gap-3 px-8 py-5 bg-white/10 backdrop-blur-xl border-2 border-white/30 text-white font-bold rounded-2xl hover:bg-white/20 hover:border-white/50 transition-all duration-300 hover:-translate-y-1">
                        <svg class="w-6 h-6 group-hover:scale-125 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <span>Watch Performance</span>
                    </a>
                </div>

                <!-- Feature Pills -->
                <div class="flex flex-wrap gap-3 pt-4 animate-fade-in-up animation-delay-1000">
                    @foreach([
                        ['icon' => '🎵', 'text' => 'Worship Excellence'],
                        ['icon' => '🙏', 'text' => 'Spiritual Growth'],
                        ['icon' => '❤️', 'text' => 'Community Impact']
                    ] as $feature)
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-900/40 backdrop-blur-sm border border-emerald-700/50 rounded-full hover:bg-emerald-800/60 hover:border-emerald-600/70 transition-all duration-300 group cursor-pointer">
                            <span class="text-xl group-hover:scale-125 transition-transform">{{ $feature['icon'] }}</span>
                            <span class="text-sm text-gray-300 font-medium">{{ $feature['text'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Column: Visual Content -->
            <div class="relative lg:block animate-fade-in-left">
                <!-- Main Image Card -->
                <div class="relative group">
                    <!-- Glowing Border Effect -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 via-emerald-500 to-teal-500 rounded-3xl blur-2xl opacity-30 group-hover:opacity-50 transition duration-1000 animate-pulse"></div>

                    <!-- Image Container -->
                    <div class="relative bg-emerald-900/50 backdrop-blur-xl border border-emerald-700/50 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/gf-2.jpg') }}" alt="God's Family Choir Performance"
                            class="w-full h-[500px] object-cover transform group-hover:scale-110 transition duration-700" />

                        <!-- Overlay Content -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-8">
                            <div>
                                <p class="text-white text-2xl font-bold mb-2">Latest Performance</p>
                                <p class="text-gray-300">Easter Celebration 2024</p>
                            </div>
                        </div>

                        <!-- Play Button Overlay -->
                        <a href="https://www.youtube.com/watch?v=DR1QiuFpx9I&pp=ygUPbXd1YmFoZSB1d2l0ZWth" target="_blank" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="w-20 h-20 bg-amber-500 rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-transform">
                                <svg class="w-10 h-10 text-emerald-950 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </a>
                    </div>

                    <!-- Floating Gallery Cards -->
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-emerald-800/80 backdrop-blur-xl border border-emerald-600/50 rounded-2xl overflow-hidden shadow-xl transform hover:scale-110 transition-transform cursor-pointer">
                        <img src="{{ asset('images/1.jpg') }}" alt="Gallery 1" class="w-full h-full object-cover" />
                    </div>

                    <div class="absolute -top-6 -right-6 w-32 h-32 bg-emerald-800/80 backdrop-blur-xl border border-emerald-600/50 rounded-2xl overflow-hidden shadow-xl transform hover:scale-110 transition-transform cursor-pointer">
                        <img src="{{ asset('images/3.jpg') }}" alt="Gallery 2" class="w-full h-full object-cover" />
                    </div>
                </div>

                <!-- Floating Stats Card -->
                <div class="absolute -bottom-12 right-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl p-6 shadow-2xl transform hover:scale-105 transition-transform cursor-pointer hidden lg:block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white text-2xl font-black">8+</p>
                            <p class="text-emerald-950 text-sm font-semibold">Albums Released</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripture Quote -->
        <div class="mt-24 text-center animate-fade-in-up animation-delay-1200">
            <div class="inline-block relative">
                <div class="absolute -inset-4 bg-gradient-to-r from-amber-500/20 to-emerald-500/20 blur-xl rounded-full"></div>
                <div class="relative bg-emerald-900/40 backdrop-blur-xl border border-emerald-700/50 rounded-2xl px-8 py-6 max-w-3xl">
                    <svg class="w-8 h-8 text-amber-400/50 mb-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z"/>
                    </svg>
                    <blockquote class="text-xl sm:text-2xl text-white font-light italic leading-relaxed">
                        Oh come, let us sing to the Lord; let us make a joyful noise to the rock of our salvation!
                    </blockquote>
                    <p class="text-amber-400 font-semibold mt-4 text-lg">— Psalm 95:1</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
        <div class="flex flex-col items-center gap-2 cursor-pointer group" onclick="document.querySelector('#features').scrollIntoView({behavior: 'smooth'})">
            <p class="text-emerald-300 text-sm font-medium group-hover:text-amber-400 transition-colors">Scroll to Explore</p>
            <svg class="w-6 h-6 text-emerald-300 group-hover:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>

<style>
    @keyframes gradient-x {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 3s ease infinite;
    }

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
        10% { opacity: 0.15; }
        90% { opacity: 0.15; }
        100% { transform: translateY(-100vh) translateX(50px) rotate(360deg); opacity: 0; }
    }
    .musical-note {
        position: absolute;
        color: white;
        animation: float-musical 15s linear infinite;
        pointer-events: none;
    }

    @keyframes fade-in-up {
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
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }
    .animation-delay-800 { animation-delay: 0.8s; }
    .animation-delay-1000 { animation-delay: 1s; }
    .animation-delay-1200 { animation-delay: 1.2s; }

    @keyframes fade-in-left {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    .animate-fade-in-left {
        animation: fade-in-left 1s ease-out 0.4s forwards;
        opacity: 0;
    }

    /* Parallax effect */
    .parallax-bg {
        transition: transform 0.1s ease-out;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 16);
    });

    // Parallax scroll effect
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelector('.parallax-bg');
        if (parallax && scrolled < window.innerHeight) {
            parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Mouse move parallax for floating cards
    document.addEventListener('mousemove', (e) => {
        const cards = document.querySelectorAll('.relative.group > .absolute');
        const mouseX = e.clientX / window.innerWidth;
        const mouseY = e.clientY / window.innerHeight;

        cards.forEach((card, index) => {
            const speed = (index + 1) * 5;
            const x = (mouseX - 0.5) * speed;
            const y = (mouseY - 0.5) * speed;
            card.style.transform = `translate(${x}px, ${y}px)`;
        });
    });
});
</script>
