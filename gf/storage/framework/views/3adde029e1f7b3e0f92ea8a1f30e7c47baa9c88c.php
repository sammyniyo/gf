<!-- resources/views/components/landing/unlock-power.blade.php -->
<section class="relative bg-white py-24 overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-emerald-50 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">
                JOIN OUR COMMUNITY
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Discover Your Place in the <span class="text-emerald-600">Harmony</span>
        </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                Whether you're a seasoned vocalist or just beginning your musical journey, there's a place for you in God's Family Choir
            </p>
        </div>

        <!-- Programs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Program 1 -->
            <div class="group relative bg-gradient-to-br from-emerald-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-emerald-100">
                <div class="absolute top-6 right-6 w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🎤</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-2">Choir Membership</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">Join our main choir and be part of Sunday worship services, concerts, and special events throughout the year.</p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Weekly rehearsals & training
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Performance opportunities
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Spiritual development
                    </li>
                </ul>
                <a href="<?php echo e(route('choir.register.form')); ?>" class="inline-flex items-center gap-2 text-emerald-600 font-semibold hover:gap-3 transition-all">
                    Apply Now
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Program 2 -->
            <div class="group relative bg-gradient-to-br from-blue-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-blue-100">
                <div class="absolute top-6 right-6 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🎵</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-2">Vocal Academy</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">Professional voice training for all skill levels. Learn proper technique, music theory, and performance skills.</p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        One-on-one coaching
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Group masterclasses
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Music theory foundation
                    </li>
                </ul>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 text-blue-600 font-semibold hover:gap-3 transition-all">
                    Enroll Today
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Program 3 -->
            <div class="group relative bg-gradient-to-br from-purple-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-purple-100">
                <div class="absolute top-6 right-6 w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-2xl">👶</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-2">Youth Program</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">Nurturing young talents aged 8-17 with age-appropriate training and performance opportunities in a fun environment.</p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Age-appropriate curriculum
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Fun learning activities
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-purple-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Character development
                    </li>
                </ul>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 text-purple-600 font-semibold hover:gap-3 transition-all">
                    Register Child
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Program 4 -->
            <div class="group relative bg-gradient-to-br from-amber-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-amber-100">
                <div class="absolute top-6 right-6 w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🎹</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-2">Instrumental Classes</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">Master piano, guitar, drums, and other instruments to accompany worship and enhance your musical skills.</p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Multiple instruments offered
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Professional instructors
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Worship band integration
                    </li>
                </ul>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 text-amber-600 font-semibold hover:gap-3 transition-all">
                    Learn More
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Program 5 -->
            <div class="group relative bg-gradient-to-br from-pink-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-pink-100">
                <div class="absolute top-6 right-6 w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-2xl">✍️</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-2">Songwriting Workshop</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">Learn to write original worship songs that inspire. Discover melody creation, lyric writing, and arrangement.</p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-pink-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Lyric composition techniques
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-pink-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Melody & harmony creation
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-pink-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Recording opportunities
                    </li>
                </ul>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 text-pink-600 font-semibold hover:gap-3 transition-all">
                    Join Workshop
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <!-- Program 6 -->
            <div class="group relative bg-gradient-to-br from-indigo-50 to-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-indigo-100">
                <div class="absolute top-6 right-6 w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                    <span class="text-2xl">🙏</span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-2">Prayer & Fellowship</h3>
                <p class="text-gray-600 mb-4 leading-relaxed">Join our weekly prayer meetings and fellowship gatherings. Build relationships and grow spiritually together.</p>
                <ul class="space-y-2 mb-6">
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Weekly prayer sessions
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Bible study groups
                    </li>
                    <li class="flex items-start gap-2 text-sm text-gray-700">
                        <svg class="w-5 h-5 text-indigo-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Community support
                    </li>
                </ul>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:gap-3 transition-all">
                    Get Involved
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center bg-gradient-to-r from-emerald-600 to-emerald-700 text-white p-12 rounded-3xl shadow-xl">
            <h3 class="text-3xl font-bold mb-4">Ready to Begin Your Journey?</h3>
            <p class="text-emerald-100 mb-8 max-w-2xl mx-auto text-lg">
                Take the first step towards musical excellence and spiritual growth. Our doors are always open to passionate individuals.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo e(route('choir.register.form')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-white text-emerald-600 font-bold rounded-xl hover:bg-emerald-50 transition-all transform hover:-translate-y-1 shadow-lg">
                    Join the Choir
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-800 text-white font-bold rounded-xl hover:bg-emerald-900 transition-all transform hover:-translate-y-1">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/landing/unlock-power.blade.php ENDPATH**/ ?>