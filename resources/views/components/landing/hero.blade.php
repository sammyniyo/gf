<section class="relative min-h-[85vh] sm:min-h-screen overflow-hidden bg-black">
    <!-- Slideshow Background Images with Morph Transitions -->
    <div class="absolute inset-0 z-0">
        <!-- Image 1 -->
        <div class="hero-slide active absolute inset-0">
            <img src="{{ asset('images/gf.jpg') }}" alt="God's Family Choir - Worship"
                 class="w-full h-full object-cover object-center" />
        </div>
        <!-- Image 2 -->
        <div class="hero-slide absolute inset-0">
            <img src="{{ asset('images/GF-21.jpg') }}" alt="God's Family Choir - Community"
                 class="w-full h-full object-cover object-center" />
        </div>
        <!-- Image 3 -->
        <div class="hero-slide absolute inset-0">
            <img src="{{ asset('images/GF-22.jpg') }}" alt="God's Family Choir - Excellence"
                 class="w-full h-full object-cover object-center" />
        </div>
        <!-- Image 4 -->
        <div class="hero-slide absolute inset-0">
            <img src="{{ asset('images/GF-23.jpg') }}" alt="God's Family Choir - Excellence"
                 class="w-full h-full object-cover object-center" />
        </div>
        <!-- Image 5 -->
        <div class="hero-slide absolute inset-0">
            <img src="{{ asset('images/GF-24.jpg') }}" alt="God's Family Choir - Excellence"
                 class="w-full h-full object-cover object-center" />
        </div>

        <!-- Multi-Layer Overlays for Depth -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-black/70 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/30 via-transparent to-amber-900/30 z-10"></div>

        <!-- Dissolving Gradient Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.15]">
            <!-- Horizontal gradient lines -->
            <div class="absolute inset-0" style="
                background-image: repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 99px,
                    rgba(16, 185, 129, 0.2) 99px,
                    rgba(251, 191, 36, 0.2) 100px
                );
                mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
                -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
            "></div>
            <!-- Vertical gradient lines -->
            <div class="absolute inset-0" style="
                background-image: repeating-linear-gradient(
                    90deg,
                    transparent,
                    transparent 99px,
                    rgba(16, 185, 129, 0.2) 99px,
                    rgba(251, 191, 36, 0.2) 100px
                );
                mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
                -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 80%);
            "></div>
        </div>

        <!-- Animated Gradient Grid Overlay -->
        <div class="absolute inset-0 opacity-[0.08] animate-grid-flow">
            <div class="absolute inset-0" style="
                background: linear-gradient(90deg, transparent 0%, rgba(16, 185, 129, 0.3) 50%, transparent 100%),
                            linear-gradient(0deg, transparent 0%, rgba(251, 191, 36, 0.3) 50%, transparent 100%);
                background-size: 200px 200px;
            "></div>
        </div>

        <!-- Subtle Vignette -->
        <div class="absolute inset-0 shadow-[inset_0_0_100px_rgba(0,0,0,0.5)]"></div>
    </div>

    <!-- Main Hero Content -->
    <div class="relative z-10 min-h-[85vh] sm:min-h-screen flex items-center pb-24 sm:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-16 sm:py-20 w-full">
            <div class="text-center max-w-5xl mx-auto space-y-8 sm:space-y-10">

                <!-- Elegant Badge -->
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 px-6 py-3 text-xs font-semibold uppercase tracking-[0.32em] text-white shadow-2xl animate-fade-in-up">
                    <div class="relative">
                        <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                        <div class="absolute inset-0 w-2 h-2 bg-emerald-300 rounded-full animate-ping"></div>
                    </div>
                    <span>Uniting Hearts Through Worship</span>
                </div>

                <!-- Stunning Typography -->
                <div class="space-y-8">
                    <h1 class="relative animate-fade-in-up animation-delay-200">
                        <div class="space-y-4">
                            <span class="block text-4xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black text-white leading-none tracking-tight drop-shadow-2xl">
                                Sing to the
                            </span>
                            <span class="block text-4xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black leading-none tracking-tight">
                                <span class="bg-gradient-to-r from-emerald-400 via-teal-300 to-amber-400 bg-clip-text text-transparent drop-shadow-2xl animate-gradient-text" style="background-size: 200% 200%;">
                                    Glory of God
                                </span>
                            </span>
                        </div>

                        <!-- Decorative Line -->
                        <div class="flex items-center justify-center gap-4 mt-8">
                            <div class="h-1 w-24 bg-gradient-to-r from-transparent via-emerald-400 to-transparent rounded-full"></div>
                            <div class="w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
                            <div class="h-1 w-24 bg-gradient-to-r from-transparent via-amber-400 to-transparent rounded-full"></div>
                        </div>
                    </h1>

                    <!-- Tagline -->
                    <p class="text-lg sm:text-xl lg:text-2xl text-white/90 font-light leading-relaxed max-w-3xl mx-auto animate-fade-in-up animation-delay-400 drop-shadow-lg">
                        Experience divine connection through <span class="text-emerald-300 font-semibold">powerful worship</span> and musical excellence
                    </p>
                </div>

                <!-- Clean Stats Row -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 max-w-md sm:max-w-2xl mx-auto animate-fade-in-up animation-delay-600">
                    <div class="group">
                        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-5 sm:p-6 hover:bg-white/10 hover:border-emerald-400/30 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-baseline justify-center gap-2 mb-2">
                                <span class="text-4xl lg:text-5xl font-black text-white counter" data-target="300">0</span>
                                <span class="text-2xl text-emerald-400 font-bold">+</span>
                            </div>
                            <div class="text-xs lg:text-sm text-white/70 font-semibold uppercase tracking-wider">Members</div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-5 sm:p-6 hover:bg-white/10 hover:border-amber-400/30 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-baseline justify-center gap-2 mb-2">
                                <span class="text-4xl lg:text-5xl font-black text-white counter" data-target="27">0</span>
                                <span class="text-2xl text-amber-400 font-bold"></span>
                            </div>
                            <div class="text-xs lg:text-sm text-white/70 font-semibold uppercase tracking-wider">Years</div>
                        </div>
                    </div>
                </div>

                <!-- Primary CTA Button -->
                <div class="flex items-center justify-center animate-fade-in-up animation-delay-800 mb-20 sm:mb-24">
                    <a href="{{ route('registration.member') }}" class="group relative inline-flex items-center justify-center gap-3 px-8 py-4 sm:px-10 sm:py-5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold rounded-full shadow-2xl shadow-emerald-500/50 transition-all duration-300 hover:shadow-emerald-500/70 hover:-translate-y-1 hover:scale-105 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-600 to-emerald-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span class="relative z-10">Join the Choir</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Elegant Scroll Indicator -->
    <div class="absolute bottom-6 sm:bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce">
        <button onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})" class="flex flex-col items-center gap-3 group mx-auto">
            <span class="text-white/70 text-xs font-semibold uppercase tracking-wider group-hover:text-emerald-300 transition-colors">Discover More</span>
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-1 group-hover:border-emerald-400 transition-all">
                <div class="w-1.5 h-3 bg-gradient-to-b from-emerald-400 to-amber-400 rounded-full animate-scroll-down"></div>
            </div>
        </button>
    </div>
</section>

<style>
    /* Hero Slideshow with Morph Transitions */
    .hero-slide {
        opacity: 0;
        visibility: hidden;
        transition: opacity 2s ease-in-out, visibility 0s 2s, transform 20s ease-in-out;
        transform: scale(1);
        z-index: 1;
    }

    .hero-slide.active {
        opacity: 1;
        visibility: visible;
        transition: opacity 2s ease-in-out, visibility 0s, transform 20s ease-in-out;
        z-index: 2;
        animation: morphZoom 8s ease-in-out forwards;
    }

    .hero-slide img {
        filter: blur(0px);
        transition: filter 2s ease-in-out;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @keyframes morphZoom {
        0% {
            transform: scale(1) rotate(0deg);
        }
        50% {
            transform: scale(1.05) rotate(0.2deg);
        }
        100% {
            transform: scale(1.02) rotate(0deg);
        }
    }

    /* Slideshow Indicators */
    .slide-indicator {
        position: relative;
        cursor: pointer;
    }

    .slide-indicator.active {
        background: linear-gradient(135deg, #10b981, #14b8a6) !important;
        transform: scale(1.3);
        box-shadow: 0 0 15px rgba(16, 185, 129, 0.6);
    }

    .slide-indicator:hover {
        transform: scale(1.2);
    }

    /* Smooth Floating Animations */
    @keyframes float-slow {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(30px, -30px); }
        66% { transform: translate(-20px, 20px); }
    }

    @keyframes float-slow-reverse {
        0%, 100% { transform: translate(0, 0); }
        33% { transform: translate(-30px, 30px); }
        66% { transform: translate(20px, -20px); }
    }

    @keyframes float-delayed {
        0%, 100% { transform: translate(0, 0); }
        50% { transform: translate(20px, -40px); }
    }

    .animate-float-slow {
        animation: float-slow 25s ease-in-out infinite;
    }

    .animate-float-slow-reverse {
        animation: float-slow-reverse 30s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float-delayed 20s ease-in-out infinite;
    }

    /* Gradient Text Animation */
    @keyframes gradient-text {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .animate-gradient-text {
        animation: gradient-text 5s ease infinite;
    }

    /* Fade In Up Animation */
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

    /* Grid Flow Animation */
    @keyframes grid-flow {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    .animate-grid-flow {
        animation: grid-flow 15s ease-in-out infinite;
    }

    /* Scroll Down Indicator */
    @keyframes scroll-down {
        0% {
            transform: translateY(0);
            opacity: 0;
        }
        40% {
            opacity: 1;
        }
        80% {
            transform: translateY(16px);
            opacity: 0;
        }
        100% {
            opacity: 0;
        }
    }

    .animate-scroll-down {
        animation: scroll-down 2s ease-in-out infinite;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero Slideshow with Smooth Transitions
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.slide-indicator');
    let currentSlide = 0;
    const slideInterval = 6000; // 6 seconds per slide
    let autoPlayInterval;

    function showSlide(index) {
        // Update slides
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });

        // Update indicators
        indicators.forEach((indicator, i) => {
            if (i === index) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        // Reset autoplay
        clearInterval(autoPlayInterval);
        autoPlayInterval = setInterval(nextSlide, slideInterval);
    }

    // Indicator click events
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToSlide(index));
    });

    // Start slideshow
    autoPlayInterval = setInterval(nextSlide, slideInterval);

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
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

                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));
});
</script>

