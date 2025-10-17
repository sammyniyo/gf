<section class="relative min-h-screen overflow-hidden bg-black">
    <!-- Full-Screen Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="<?php echo e(asset('images/hero.jpg')); ?>" alt="God's Family Choir"
             class="w-full h-full object-cover object-center animate-ken-burns" />

        <!-- Multi-Layer Overlays for Depth -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-900/30 via-transparent to-amber-900/30"></div>

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
    <div class="relative z-10 min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20 w-full">
            <div class="text-center max-w-5xl mx-auto space-y-10">

                <!-- Elegant Badge -->
                <div class="inline-flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 px-6 py-3 text-xs font-semibold uppercase tracking-[0.32em] text-white shadow-2xl animate-fade-in-up">
                    <div class="relative">
                        <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                        <div class="absolute inset-0 w-2 h-2 bg-emerald-300 rounded-full animate-ping"></div>
                    </div>
                    <span>Serving God and Thy People</span>
                    <span class="text-white/60">·</span>
                    <span class="text-emerald-300">Since 1998</span>
                </div>

                <!-- Stunning Typography -->
                <div class="space-y-8">
                    <h1 class="relative animate-fade-in-up animation-delay-200">
                        <div class="space-y-4">
                            <span class="block text-5xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black text-white leading-none tracking-tight drop-shadow-2xl">
                                Where Voices
                            </span>
                            <span class="block text-5xl sm:text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black leading-none tracking-tight">
                                <span class="bg-gradient-to-r from-emerald-400 via-teal-300 to-amber-400 bg-clip-text text-transparent drop-shadow-2xl animate-gradient-text" style="background-size: 200% 200%;">
                                    Meet Heaven
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
                    <p class="text-xl sm:text-2xl lg:text-3xl text-white/90 font-light leading-relaxed max-w-3xl mx-auto animate-fade-in-up animation-delay-400 drop-shadow-lg">
                        God's Family Choir - Transforming hearts through <span class="text-emerald-300 font-semibold">spirit-filled harmonies</span> and worship excellence
                    </p>
                </div>

                <!-- Clean Stats Row -->
                <div class="grid grid-cols-3 gap-8 max-w-3xl mx-auto animate-fade-in-up animation-delay-600">
                    <div class="group">
                        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-emerald-400/30 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-baseline justify-center gap-2 mb-2">
                                <span class="text-4xl lg:text-5xl font-black text-white counter" data-target="400">0</span>
                                <span class="text-2xl text-emerald-400 font-bold">+</span>
                            </div>
                            <div class="text-xs lg:text-sm text-white/70 font-semibold uppercase tracking-wider">Members</div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-amber-400/30 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-baseline justify-center gap-2 mb-2">
                                <span class="text-4xl lg:text-5xl font-black text-white counter" data-target="4">0</span>
                                <span class="text-2xl text-amber-400 font-bold">+</span>
                            </div>
                            <div class="text-xs lg:text-sm text-white/70 font-semibold uppercase tracking-wider">Albums</div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-teal-400/30 transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-baseline justify-center gap-2 mb-2">
                                <span class="text-4xl lg:text-5xl font-black text-white counter" data-target="27">0</span>
                                <span class="text-2xl text-teal-400 font-bold"></span>
                            </div>
                            <div class="text-xs lg:text-sm text-white/70 font-semibold uppercase tracking-wider">Years</div>
                        </div>
                    </div>
                </div>

                <!-- Stunning CTA Buttons -->
                <div class="flex flex-wrap items-center justify-center gap-4 animate-fade-in-up animation-delay-800">
                    <a href="<?php echo e(route('choir.register.form')); ?>" class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold rounded-full shadow-2xl shadow-emerald-500/50 transition-all duration-300 hover:shadow-emerald-500/70 hover:-translate-y-1 hover:scale-105 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-600 to-emerald-500 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                        <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        <span class="relative z-10">Join the Choir</span>
                    </a>

                    <a href="<?php echo e(route('events.index')); ?>" class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-xl border-2 border-white/30 text-white font-bold rounded-full hover:bg-white/20 hover:border-white/50 transition-all duration-300 hover:-translate-y-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>Explore Events</span>
                    </a>
                </div>

                <!-- Feature Pills -->
                <div class="flex flex-wrap items-center justify-center gap-3 animate-fade-in-up animation-delay-1000">
                    <?php $__currentLoopData = [
                        ['icon' => '🎵', 'text' => 'Worship Excellence'],
                        ['icon' => '🙏', 'text' => 'Spiritual Growth'],
                        ['icon' => '❤️', 'text' => 'Community Impact']
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/5 backdrop-blur-lg border border-white/10 rounded-full hover:bg-white/10 hover:border-white/20 transition-all duration-300 group cursor-pointer">
                            <span class="text-xl group-hover:scale-125 transition-transform"><?php echo e($feature['icon']); ?></span>
                            <span class="text-sm text-white/80 font-medium"><?php echo e($feature['text']); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Next Event Card -->
                <div class="max-w-2xl mx-auto animate-fade-in-up animation-delay-1200">
                    <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-3xl p-6 hover:bg-white/10 transition-all duration-300 hover:-translate-y-1">
                        <div class="flex items-center justify-between gap-6">
                            <div class="flex items-center gap-4">
                                <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                    </svg>
                                </div>
                                <div class="text-left">
                                    <p class="text-xs font-bold uppercase tracking-wide text-emerald-300 mb-1">Join us in rehearsals</p>
                                    <p class="text-base font-bold text-white">Every Monday and Thursday, 05:30 PM  - 08:00 PM</p>
                                    <p class="text-sm text-white/70 flex items-center gap-1 mt-1">
                                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        ASA UR Nyarugenge SDA Church
                                    </p>
                                </div>
                            </div>
                            <a href="<?php echo e(route('about')); ?>" class="flex-shrink-0 inline-flex items-center justify-center w-10 h-10 bg-white/10 hover:bg-white/20 rounded-full transition-all border border-white/20 hover:border-white/40">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Elegant Scroll Indicator -->
    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 z-20 animate-bounce">
        <button onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})" class="flex flex-col items-center gap-3 group">
            <span class="text-white/70 text-xs font-semibold uppercase tracking-wider group-hover:text-emerald-300 transition-colors">Discover More</span>
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-1 group-hover:border-emerald-400 transition-all">
                <div class="w-1.5 h-3 bg-gradient-to-b from-emerald-400 to-amber-400 rounded-full animate-scroll-down"></div>
            </div>
        </button>
    </div>
</section>

<style>
    /* Ken Burns Zoom Effect */
    @keyframes ken-burns {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.08);
        }
    }

    .animate-ken-burns {
        animation: ken-burns 20s ease-in-out infinite alternate;
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
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/landing/hero.blade.php ENDPATH**/ ?>