<section class="relative min-h-[85vh] sm:min-h-screen overflow-hidden bg-black">
    <!-- Slideshow Background -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div class="hero-track">
            <div class="hero-slide">
                <img src="{{ asset('images/gf.jpg') }}" alt="God's Family Choir - Worship" />
            </div>
            <div class="hero-slide">
                <img src="{{ asset('images/GF-21.jpg') }}" alt="God's Family Choir - Community" />
            </div>
            <div class="hero-slide">
                <img src="{{ asset('images/GF-22.jpg') }}" alt="God's Family Choir - Excellence" />
            </div>
            <div class="hero-slide">
                <img src="{{ asset('images/GF-23.jpg') }}" alt="God's Family Choir - Excellence" />
            </div>
            <div class="hero-slide">
                <img src="{{ asset('images/GF-24.jpg') }}" alt="God's Family Choir - Excellence" />
            </div>
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
    <div class="relative z-10 min-h-[85vh] sm:min-h-screen flex items-center pb-20 sm:pb-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-16 sm:py-20 w-full">
            <div class="text-center space-y-6 sm:space-y-7">

                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 px-4 py-2 text-[10px] sm:text-xs font-semibold uppercase tracking-[0.22em] text-white/90 shadow-lg animate-fade-in-up">
                    <div class="relative">
                        <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></div>
                    </div>
                    <span>Uniting Hearts Through Worship</span>
                </div>

                <div class="space-y-4">
                    <h1 class="animate-fade-in-up animation-delay-200">
                        <span class="block text-3xl sm:text-4xl md:text-5xl lg:text-[3.5rem] font-bold text-white leading-tight tracking-tight drop-shadow-lg">
                            Sing to the
                        </span>
                        <span class="block text-3xl sm:text-4xl md:text-5xl lg:text-[3.5rem] font-bold leading-tight tracking-tight">
                            <span class="bg-gradient-to-r from-emerald-300 to-amber-300 bg-clip-text text-transparent">
                                Glory of God
                            </span>
                        </span>
                    </h1>

                    <div class="flex items-center justify-center gap-3">
                        <div class="h-px w-12 bg-gradient-to-r from-transparent via-emerald-400 to-transparent"></div>
                        <div class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></div>
                        <div class="h-px w-12 bg-gradient-to-r from-transparent via-amber-400 to-transparent"></div>
                    </div>

                    <p class="text-sm sm:text-base lg:text-lg text-white/80 font-light leading-relaxed max-w-xl mx-auto animate-fade-in-up animation-delay-400">
                        Experience divine connection through <span class="text-emerald-300 font-medium">powerful worship</span> and musical excellence
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-xs sm:max-w-sm mx-auto animate-fade-in-up animation-delay-600">
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl px-4 py-4">
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-2xl sm:text-3xl font-bold text-white counter" data-target="300">0</span>
                            <span class="text-lg text-emerald-400 font-semibold">+</span>
                        </div>
                        <div class="mt-1 text-[10px] sm:text-xs text-white/65 font-medium uppercase tracking-wider">Members</div>
                    </div>
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-xl px-4 py-4">
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-2xl sm:text-3xl font-bold text-white counter" data-target="27">0</span>
                        </div>
                        <div class="mt-1 text-[10px] sm:text-xs text-white/65 font-medium uppercase tracking-wider">Years</div>
                    </div>
                </div>

                <div class="flex items-center justify-center animate-fade-in-up animation-delay-800">
                    <a href="{{ route('registration.member') }}" class="group relative inline-flex items-center justify-center gap-2 px-6 py-3 sm:px-7 sm:py-3.5 bg-emerald-700 text-sm sm:text-base text-white font-semibold rounded-full shadow-lg shadow-emerald-900/20 transition hover:bg-emerald-600 hover:-translate-y-0.5 overflow-hidden">
                        <div class="absolute inset-0 bg-emerald-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <svg class="w-4 h-4 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span class="relative z-10">Join the Choir</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Elegant Scroll Indicator -->
    <div class="absolute bottom-6 sm:bottom-8 left-0 right-0 flex justify-center z-20 animate-bounce">
        <button onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})" class="flex flex-col items-center gap-3 group">
            <span class="text-white/70 text-xs font-semibold uppercase tracking-wider group-hover:text-emerald-300 transition-colors">Discover More</span>
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-1 group-hover:border-emerald-400 transition-all">
                <div class="w-1.5 h-3 bg-gradient-to-b from-emerald-400 to-amber-400 rounded-full animate-scroll-down"></div>
            </div>
        </button>
    </div>
</section>

<style>
    .hero-track {
        position: absolute;
        inset: 0;
        display: flex;
        height: 100%;
        transform: translateX(0);
        transition: transform 0.8s ease-in-out;
        will-change: transform;
    }

    .hero-slide {
        position: relative;
        flex: 0 0 100%;
        width: 100%;
        height: 100%;
    }

    .hero-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
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
    const track = document.querySelector('.hero-track');
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.slide-indicator');
    let currentSlide = 0;
    const slideInterval = 5000;
    let autoPlayInterval;

    function showSlide(index) {
        if (!track || !slides.length) return;
        track.style.transform = 'translateX(-' + (index * 100) + '%)';
        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        clearInterval(autoPlayInterval);
        autoPlayInterval = setInterval(nextSlide, slideInterval);
    }

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => goToSlide(index));
    });

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

