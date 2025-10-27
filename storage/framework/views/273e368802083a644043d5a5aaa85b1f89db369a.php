<!-- resources/views/components/landing/final-cta.blade.php -->
<section class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-emerald-950 text-white py-32 overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-10 left-10 w-64 h-64 bg-amber-400 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-emerald-600 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-amber-500 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Musical Notes Background -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-1/4 text-6xl animate-float-slow">♪</div>
        <div class="absolute top-40 right-1/4 text-8xl animate-float-medium">♫</div>
        <div class="absolute bottom-32 left-1/3 text-7xl animate-float-fast">♬</div>
        <div class="absolute bottom-20 right-1/3 text-5xl animate-float-slow">♩</div>
    </div>

    <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
        <!-- Main Content -->
        <div class="mb-12">
            <span class="inline-block px-4 py-2 bg-amber-500/20 backdrop-blur-sm text-amber-300 rounded-full text-sm font-semibold mb-6 border border-amber-400/30">
                JOIN OUR FAMILY
            </span>
            <h2 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                Your Voice Matters in the
                <span class="text-amber-400">Symphony of Worship</span>
            </h2>
            <p class="text-xl md:text-2xl text-emerald-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                Whether you want to join our choir, attend our events, or support our ministry, there's a place for you in God's Family
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-16">
            <a href="<?php echo e(route('choir.register.form')); ?>" class="group relative inline-flex items-center gap-3 px-10 py-5 bg-gradient-to-r from-amber-400 to-amber-500 text-emerald-950 font-bold rounded-2xl shadow-2xl hover:shadow-amber-500/50 transition-all duration-300 transform hover:-translate-y-2 hover:scale-105 w-full sm:w-auto justify-center">
                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                </svg>
                <span>Join the Choir</span>
                <div class="absolute inset-0 bg-gradient-to-r from-amber-300 to-amber-400 rounded-2xl blur opacity-0 group-hover:opacity-75 transition-opacity -z-10"></div>
            </a>

            <a href="<?php echo e(route('events.index')); ?>" class="group inline-flex items-center gap-3 px-10 py-5 bg-white/10 backdrop-blur-sm text-white font-bold rounded-2xl border-2 border-white/30 hover:bg-white/20 hover:border-white/50 transition-all duration-300 transform hover:-translate-y-2 w-full sm:w-auto justify-center">
                <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
                <span>View Upcoming Events</span>
            </a>
        </div>

        <!-- Additional Links -->
        <div class="flex flex-wrap items-center justify-center gap-8 mb-12">
            <a href="<?php echo e(route('about')); ?>" class="group flex items-center gap-2 text-emerald-200 hover:text-white transition-colors">
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">Learn About Us</span>
            </a>

            <a href="<?php echo e(route('contact')); ?>" class="group flex items-center gap-2 text-emerald-200 hover:text-white transition-colors">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span class="font-medium">Get in Touch</span>
            </a>

            <a href="<?php echo e(route('story')); ?>" class="group flex items-center gap-2 text-emerald-200 hover:text-white transition-colors">
                <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="font-medium">Our Story</span>
            </a>
        </div>

        <!-- Scripture Quote -->
        <div class="relative max-w-3xl mx-auto">
            <div class="bg-emerald-800/50 backdrop-blur-sm border border-emerald-700/50 rounded-2xl p-8 shadow-2xl">
                <div class="text-amber-400 text-5xl mb-4">"</div>
                <blockquote class="text-xl md:text-2xl font-light italic text-emerald-50 mb-4 leading-relaxed">
                    Sing to the Lord a new song; sing to the Lord, all the earth. Sing to the Lord, praise his name; proclaim his salvation day after day.
                </blockquote>
                <cite class="text-amber-400 font-semibold text-lg">— Psalm 96:1-2</cite>
            </div>

            <!-- Decorative Musical Note -->
            <div class="absolute -top-6 -right-6 w-16 h-16 bg-amber-400 rounded-full flex items-center justify-center text-3xl shadow-xl animate-bounce">
                ♪
            </div>
        </div>

        <!-- Social Proof -->
        <div class="mt-16 flex flex-col sm:flex-row items-center justify-center gap-8 text-emerald-200">
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-amber-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="font-medium">Trusted by 500+ Members</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">25+ Years of Excellence</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">International Recognition</span>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes float-slow {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    @keyframes float-medium {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(-8deg); }
    }
    @keyframes float-fast {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-25px) rotate(10deg); }
    }
    .animate-float-slow { animation: float-slow 10s ease-in-out infinite; }
    .animate-float-medium { animation: float-medium 7s ease-in-out infinite; }
    .animate-float-fast { animation: float-fast 8s ease-in-out infinite; }
</style>
<?php /**PATH C:\Users\samsh\Documents\gf\resources\views/components/landing/final-cta.blade.php ENDPATH**/ ?>