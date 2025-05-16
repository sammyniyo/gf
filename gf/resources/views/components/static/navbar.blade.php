<header class="bg-emerald-900 text-white sticky top-0 z-50 shadow-lg backdrop-blur-sm bg-opacity-90">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo with Hover Animation -->
            <a href="/" class="flex items-center space-x-2 group">
                <img src="{{ asset('images/logo.png') }}"
                    class="h-16 transition-transform duration-300 group-hover:scale-105" alt="God's Family Choir Logo">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-1">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about*')">About</x-nav-link>
                <x-nav-link href="/music" :active="request()->is('music*')">Our Music</x-nav-link>
                <x-nav-link href="/events" :active="request()->is('events*')">Events</x-nav-link>
                <x-nav-link href="/devotions" :active="request()->is('devotions*')">Devotions</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact*')">Contact</x-nav-link>
            </nav>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center space-x-3">
                <a href="/login"
                    class="px-4 py-2 text-sm font-medium text-emerald-100 hover:text-white transition-colors duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                            clip-rule="evenodd" />
                    </svg>
                    Members
                </a>
                <a href="/join"
                    class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-emerald-500 to-lime-500 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:from-emerald-600 hover:to-lime-600 flex items-center">
                    Join Us
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" x-data="{ open: false }"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-emerald-200 focus:outline-none transition duration-150 ease-in-out">
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

    <!-- Mobile Menu Dropdown -->
    <div x-show="open" x-transition:enter="transition ease-out duration-100 transform"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="md:hidden absolute top-20 inset-x-0 z-40 bg-emerald-800 shadow-lg rounded-b-lg mx-4 overflow-hidden"
        x-data="{ open: false }" @click.away="open = false" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/"
                class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition">Home</a>
            <a href="/about"
                class="block px-3 py-2 rounded-md text-base font-medium bg-emerald-700 text-white">About</a>
            <a href="/music"
                class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition">Our
                Music</a>
            <a href="/events"
                class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition">Events</a>
            <a href="/devotions"
                class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition">Devotions</a>
            <a href="/contact"
                class="block px-3 py-2 rounded-md text-base font-medium text-white hover:bg-emerald-700 transition">Contact</a>
        </div>
        <div class="px-2 pt-2 pb-4 border-t border-emerald-700">
            <a href="/login"
                class="block w-full px-4 py-2 text-center rounded-md text-white bg-emerald-600 hover:bg-emerald-500 transition mb-2">
                Member Login
            </a>
            <a href="/join"
                class="block w-full px-4 py-2 text-center rounded-md text-white bg-gradient-to-r from-emerald-500 to-lime-500 hover:from-emerald-600 hover:to-lime-600 transition">
                Join Our Choir
            </a>
        </div>
    </div>
</header>
