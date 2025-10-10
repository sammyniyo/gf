<header class="bg-gradient-to-r from-emerald-800 to-teal-800 text-white sticky top-0 z-50 shadow-lg backdrop-blur-sm bg-opacity-95 border-b border-emerald-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo - Simplified -->
            <a href="/" class="flex items-center space-x-3 group">
                <!-- <div class="relative">
                <img src="<?php echo e(asset('images/logo.png')); ?>"
                         class="h-10 w-10 rounded-lg transition-all duration-300 hover:scale-105"
                         alt="God's Family Choir Logo">
                </div> -->
                <div class="hidden lg:block">
                    <div class="text-lg font-bold bg-gradient-to-r from-amber-300 to-amber-100 bg-clip-text text-transparent">
                        God's Family Choir
                    </div>
                    <div class="text-xs text-emerald-200 font-medium">Voices United in Praise</div>
                </div>
            </a>

            <!-- Desktop Navigation - Cleaner -->
            <nav class="hidden md:flex items-center space-x-1">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('/') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Home
                </a>
                <a href="/about" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('about*') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    About
                </a>
                <a href="<?php echo e(route('story')); ?>" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('story*') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                    Stories
                </a>
                <a href="/events" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('events*') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Events
                </a>
                <a href="<?php echo e(route('devotions.index')); ?>" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('devotions*') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Devotions
                </a>
                <a href="<?php echo e(route('committee.index')); ?>" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('committee*') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Committee
                </a>
                <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 flex items-center hover:bg-emerald-700/50 hover:text-amber-100 <?php echo e(request()->is('contact*') ? 'bg-emerald-700/50 text-amber-100' : ''); ?>">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Contact
                </a>
            </nav>

            <!-- CTA Button - Simplified -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="<?php echo e(route('choir.register.form')); ?>"
                    class="px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    Join Choir
                </a>
            </div>

            <!-- Mobile Menu Button - Cleaner -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" x-data="{ open: false }"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-emerald-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Dropdown - Cleaner -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150 transform" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden absolute top-16 inset-x-0 z-40 bg-emerald-800 shadow-xl rounded-b-lg mx-4 overflow-hidden border-t border-emerald-700"
        x-data="{ open: false }" @click.away="open = false" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            <a href="/about"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                About
            </a>
            <a href="/story"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                </svg>
                Stories
            </a>
            <a href="/events"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Events
            </a>
            <a href="/devotions"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                Devotions
            </a>
            <a href="/committee"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Committee
            </a>
            <a href="/contact"
                class="flex items-center px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition-all duration-200">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact
            </a>
        </div>
        <div class="px-2 pt-2 pb-4 border-t border-emerald-700">
            <a href="<?php echo e(route('choir.register.form')); ?>"
                class="flex items-center justify-center w-full px-4 py-2 text-center rounded-md text-white font-semibold bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
                Join Our Choir
            </a>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/static/navbar.blade.php ENDPATH**/ ?>