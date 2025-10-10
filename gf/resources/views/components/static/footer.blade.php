<!-- Footer -->
<footer class="relative bg-gradient-to-b from-gray-900 to-black text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.05) 35px, rgba(255,255,255,.05) 70px);"></div>
    </div>

    <!-- Glowing Orbs -->
    <div class="absolute top-20 left-20 w-96 h-96 bg-emerald-600 rounded-full blur-3xl opacity-10"></div>
    <div class="absolute bottom-20 right-20 w-96 h-96 bg-amber-500 rounded-full blur-3xl opacity-10"></div>

    <div class="relative max-w-7xl mx-auto px-6 pt-16 pb-8">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-12 border-b border-gray-800">

            <!-- About Section -->
            <div class="lg:col-span-4">
                <!-- <div class="flex items-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="God's Family Choir" class="h-16 w-auto">
                </div> -->
                <h3 class="text-2xl font-bold mb-4 bg-gradient-to-r from-emerald-400 to-amber-400 bg-clip-text text-transparent">
                    God's Family Choir
                </h3>
                <p class="text-gray-400 leading-relaxed mb-6">
                    Sharing the love of Christ through sacred music since 1998. Join us in worship as we uplift souls with every harmony and glorify God through our voices.
                </p>

                <!-- Quick Stats -->
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-3 bg-white/5 rounded-lg backdrop-blur-sm">
                        <p class="text-2xl font-black text-emerald-400">25+</p>
                        <p class="text-xs text-gray-500">Years</p>
                    </div>
                    <div class="text-center p-3 bg-white/5 rounded-lg backdrop-blur-sm">
                        <p class="text-2xl font-black text-amber-400">60+</p>
                        <p class="text-xs text-gray-500">Members</p>
                    </div>
                    <div class="text-center p-3 bg-white/5 rounded-lg backdrop-blur-sm">
                        <p class="text-2xl font-black text-blue-400">500+</p>
                        <p class="text-xs text-gray-500">Shows</p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="lg:col-span-2">
                <h4 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-gradient-to-b from-emerald-500 to-emerald-600 rounded-full"></span>
                    Quick Links
                </h4>
                <ul class="space-y-3">
                    @foreach([
                        ['name' => 'Home', 'url' => route('home')],
                        ['name' => 'About Us', 'url' => route('about')],
                        ['name' => 'Events', 'url' => route('events.index')],
                        ['name' => 'Our Story', 'url' => route('story')],
                        ['name' => 'Devotions', 'url' => route('devotions.index')],
                        ['name' => 'Join Choir', 'url' => route('choir.register.form')],
                    ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="group inline-flex items-center gap-2 text-gray-400 hover:text-emerald-400 transition-colors">
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="lg:col-span-3">
                <h4 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-gradient-to-b from-amber-500 to-amber-600 rounded-full"></span>
                    Get in Touch
                </h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 group">
                        <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-500/20 transition-colors">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Email</p>
                            <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="text-gray-300 hover:text-emerald-400 transition-colors text-sm">
                                asa.godsfamilychoir2017@gmail.com
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 group">
                        <div class="w-10 h-10 bg-amber-500/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-amber-500/20 transition-colors">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Phone</p>
                            <a href="tel:+250783871782" class="text-gray-300 hover:text-amber-400 transition-colors text-sm">
                                +250 783 871 782
                            </a>
                        </div>
                    </li>
                    <li class="flex items-start gap-3 group">
                        <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center flex-shrink-0 group-hover:bg-blue-500/20 transition-colors">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Location</p>
                            <p class="text-gray-300 text-sm">ASA UR Nyarugenge SDA<br>Kigali, Rwanda</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="lg:col-span-3">
                <h4 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <span class="w-1 h-6 bg-gradient-to-b from-blue-500 to-blue-600 rounded-full"></span>
                    Stay Connected
                </h4>
                <p class="text-gray-400 text-sm mb-4">
                    Subscribe to receive updates on events, new music, and spiritual devotions
                </p>

                @if(session('subscriber_success'))
                    <div class="mb-3 p-3 bg-emerald-500/20 border border-emerald-500/50 rounded-xl text-emerald-300 text-sm">
                        {{ session('subscriber_success') }}
                    </div>
                @endif

                @if(session('subscriber_error'))
                    <div class="mb-3 p-3 bg-red-500/20 border border-red-500/50 rounded-xl text-red-300 text-sm">
                        {{ session('subscriber_error') }}
                    </div>
                @endif

                <form action="{{ route('subscribe') }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="relative">
                        <input type="email" name="email" placeholder="Your email address" required
                            class="w-full px-4 py-3 bg-white/5 border border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-white placeholder-gray-500 transition-all">
                        <button type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white rounded-lg font-semibold hover:shadow-lg hover:shadow-emerald-500/50 transition-all">
                            Subscribe
                        </button>
                    </div>
                </form>

                <!-- Social Media -->
                <div class="mt-6">
                    <p class="text-sm text-gray-500 mb-3">Follow our journey</p>
                    <div class="flex gap-2">
                        <!-- Facebook -->
                        <a href="#" class="group w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center hover:bg-blue-600 transition-all transform hover:scale-110" title="Facebook">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>

                        <!-- Instagram -->
                        <a href="#" class="group w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 transition-all transform hover:scale-110" title="Instagram">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>

                        <!-- YouTube -->
                        <a href="#" class="group w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center hover:bg-red-600 transition-all transform hover:scale-110" title="YouTube">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                        </a>

                        <!-- Spotify -->
                        <a href="#" class="group w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center hover:bg-green-600 transition-all transform hover:scale-110" title="Spotify">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                            </svg>
                        </a>

                        <!-- TikTok -->
                        <a href="#" class="group w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center hover:bg-gray-800 transition-all transform hover:scale-110" title="TikTok">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            </svg>
                        </a>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/250783871782" class="group w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center hover:bg-green-500 transition-all transform hover:scale-110" title="WhatsApp">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="py-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Copyright -->
                <div class="text-center md:text-left">
                    <p class="text-gray-500 text-sm">
                        © {{ date('Y') }} <span class="text-emerald-400 font-semibold">God's Family Choir</span> - ASA UR Nyarugenge SDA
                    </p>
                    <p class="text-gray-600 text-xs mt-1">
                        All rights reserved. Made with ❤️ for God's glory
                    </p>
                </div>

                <!-- Links -->
                <div class="flex items-center gap-6">
                    @foreach(['Privacy Policy', 'Terms of Service', 'Contact'] as $link)
                        <a href="#" class="text-gray-500 hover:text-emerald-400 text-sm transition-colors">
                            {{ $link }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Scripture Banner -->
        <div class="mt-8 text-center pb-8">
            <div class="inline-block bg-gradient-to-r from-emerald-500/10 to-amber-500/10 rounded-2xl px-8 py-4 border border-emerald-500/20">
                <p class="text-gray-300 italic text-sm">
                    "Make a joyful noise to the Lord, all the earth! Serve the Lord with gladness!"
                </p>
                <p class="text-emerald-400 font-semibold text-xs mt-1">— Psalm 100:1-2</p>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scroll-top"
        class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-emerald-600 to-emerald-700 text-white rounded-full shadow-lg hover:shadow-xl flex items-center justify-center opacity-0 pointer-events-none transition-all duration-300 hover:scale-110 z-50"
        onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
</footer>

<script>
    // Scroll to top button visibility
    window.addEventListener('scroll', function() {
        const scrollTop = document.getElementById('scroll-top');
        if (window.pageYOffset > 300) {
            scrollTop.classList.remove('opacity-0', 'pointer-events-none');
            scrollTop.classList.add('opacity-100');
        } else {
            scrollTop.classList.add('opacity-0', 'pointer-events-none');
            scrollTop.classList.remove('opacity-100');
        }
    });
</script>
