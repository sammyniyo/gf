<header class="bg-[#022c22] text-white sticky top-0 z-50 shadow">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between h-20">
        <!-- Logo -->
        <a href="#" class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-lime-400 rounded-full"></div>
            <span class="font-semibold text-lg tracking-wide">Vcum</span>
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-8 text-sm font-medium">
            <a href="#features" class="hover:text-lime-300 transition">Features</a>
            <a href="#pages" class="hover:text-lime-300 transition">Pages</a>
            <a href="#blog" class="hover:text-lime-300 transition">Blog</a>
            <a href="#contact" class="hover:text-lime-300 transition">Contact</a>
        </nav>

        <!-- CTA & Login -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="#" class="text-white hover:text-lime-300 text-sm font-medium">Log In</a>
            <a href="#"
                class="bg-lime-400 hover:bg-lime-500 text-black font-semibold text-sm px-5 py-2 rounded-md transition">
                Get Started
            </a>
        </div>

        <!-- Mobile Menu Toggle -->
        <div class="md:hidden">
            <button @click="open = !open" x-data="{ open: false }" x-on:click="open = !open" class="focus:outline-none">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="white" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Mobile Menu -->
            <div x-show="open" x-transition
                class="absolute top-20 left-0 w-full bg-[#022c22] shadow-md p-6 space-y-4 md:hidden z-40">
                <a href="#features" class="block text-sm text-white hover:text-lime-400">Features</a>
                <a href="#pages" class="block text-sm text-white hover:text-lime-400">Pages</a>
                <a href="#blog" class="block text-sm text-white hover:text-lime-400">Blog</a>
                <a href="#contact" class="block text-sm text-white hover:text-lime-400">Contact</a>
                <hr class="border-white/10">
                <a href="#" class="block text-sm text-white">Log In</a>
                <a href="#"
                    class="block text-sm text-black bg-lime-400 hover:bg-lime-500 px-4 py-2 rounded-md text-center">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</header>
