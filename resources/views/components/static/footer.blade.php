<!-- Footer -->
<footer class="relative bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- About Section -->
            <div class="lg:col-span-1">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ asset('adventist-en-tm--denim.png') }}" alt="God's Family Choir Logo" class="h-12 w-12 object-contain">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-amber-600 bg-clip-text text-transparent">
                        God's Family Choir
                    </h3>
                </div>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    Sharing the love of Christ through sacred music since 1998.
                </p>

                <!-- Quick Stats -->
                <div class="flex gap-4">
                    <div class="text-center">
                        <p class="text-lg font-bold text-emerald-600">25+</p>
                        <p class="text-xs text-slate-500">Years</p>
                    </div>
                    <div class="text-center">
                        <p class="text-lg font-bold text-amber-600">300+</p>
                        <p class="text-xs text-slate-500">Members</p>
                    </div>
                    <div class="text-center">
                        <p class="text-lg font-bold text-blue-600">4</p>
                        <p class="text-xs text-slate-500">Albums</p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    @foreach([
                        ['name' => 'Home', 'url' => route('home')],
                        ['name' => 'About Us', 'url' => route('about')],
                        ['name' => 'Events', 'url' => route('events.index')],
                        ['name' => 'Our Story', 'url' => route('story')],
                        ['name' => 'Devotions', 'url' => route('devotions.index')],
                        ['name' => 'Join Choir', 'url' => route('choir.register.form')],
                        ['name' => 'Member Portal', 'url' => route('member.portal')],
                    ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-sm text-slate-600 hover:text-emerald-600 transition-colors">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Information -->
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-4">Get in Touch</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="text-sm text-slate-600 hover:text-emerald-600 transition-colors break-all">
                            asa.godsfamilychoir2017@gmail.com
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <a href="tel:+250783871782" class="text-sm text-slate-600 hover:text-amber-600 transition-colors">
                            +250 783 871 782
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-sm text-slate-600">ASA UR Nyarugenge SDA<br>Kigali, Rwanda</p>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-4">Stay Connected</h4>
                <p class="text-slate-600 text-xs mb-3">
                    Get updates on events and new music
                </p>

                @if(session('subscriber_success'))
                    <div class="mb-3 p-2 bg-emerald-50 border border-emerald-200 rounded-lg text-emerald-700 text-xs">
                        {{ session('subscriber_success') }}
                    </div>
                @endif

                @if(session('subscriber_error'))
                    <div class="mb-3 p-2 bg-red-50 border border-red-200 rounded-lg text-red-700 text-xs">
                        {{ session('subscriber_error') }}
                    </div>
                @endif

                <form action="{{ route('subscribe') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="flex gap-2">
                        <input type="email" name="email" placeholder="Your email" required
                            class="flex-1 px-3 py-2 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm placeholder-slate-400">
                        <button type="submit"
                            class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors">
                            Join
                        </button>
                    </div>
                </form>

                <!-- Social Media -->
                <div class="flex gap-2">
                    <a href="https://www.facebook.com/FChoirOfGod" class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors" title="Facebook">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="https://www.instagram.com/choir_of_god" class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 hover:text-white transition-colors" title="Instagram">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="https://www.youtube.com/@godsfamilychoir5583" class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors" title="YouTube">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                    <a
                        href="https://www.tiktok.com/@gods.family.choir?_t=ZM-90j5gj8DyqC&_r=1"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="TikTok"
                        class="group w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center transition-colors hover:bg-black hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black/60"
                        title="TikTok"
                    >
                        <i class="fab fa-tiktok text-sm"></i>
                        <span class="sr-only">TikTok</span>
                    </a>
                    <!-- Spotify -->
                    <a
                        href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Spotify"
                        class="group w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center transition-colors hover:bg-green-500 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-600/60"
                        title="Spotify"
                    >
                        <i class="fab fa-spotify text-sm"></i>
                        <span class="sr-only">Spotify</span>
                    </a>
                    <!-- Apple Music -->
                    <a
                        href="https://music.apple.com/us/artist/gods-family-choir/1793673660"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Apple Music"
                        class="group w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center transition-colors hover:bg-purple-600 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-600/60"
                        title="Apple Music"
                    >
                        <i class="fab fa-apple text-sm"></i>
                        <span class="sr-only">Apple Music</span>
                    </a>


                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-8 pt-6 border-t border-slate-200">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Copyright -->
                <p class="text-slate-600 text-xs text-center md:text-left">
                    © {{ date('Y') }} <span class="text-emerald-600 font-semibold">God's Family Choir</span> - ASA UR Nyarugenge SDA. All rights reserved.
                </p>

                <!-- Links -->
                <div class="flex items-center gap-4">
                    <a href="{{ route('privacy-policy') }}" class="text-slate-500 hover:text-emerald-600 text-xs transition-colors">
                        Privacy
                    </a>
                    <a href="{{ route('terms-of-use') }}" class="text-slate-500 hover:text-emerald-600 text-xs transition-colors">
                        Terms
                    </a>
                    <a href="{{ route('contact') }}" class="text-slate-500 hover:text-emerald-600 text-xs transition-colors">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Scripture Banner -->
            <div class="mt-6 text-center">
                <div class="inline-block bg-gradient-to-r from-emerald-50 to-amber-50 rounded-lg px-6 py-3 border border-emerald-200">
                    <p class="text-slate-700 italic text-xs">
                        "Make a joyful noise to the Lord, all the earth!"
                    </p>
                    <p class="text-emerald-600 font-semibold text-xs mt-0.5">— Psalm 100:1</p>
                </div>
            </div>

            <!-- Contact Developer Section -->
            <div class="mt-6 text-center">
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs font-semibold text-slate-600">Website Developed by</p>
                            <p class="text-sm font-bold text-slate-900">GF Social Media Team</p>
                        </div>
                    </div>
                    <div class="h-8 w-px bg-slate-300"></div>
                    <div class="flex items-center gap-2">
                        <a href="mailto:samniyo20@gmail.com" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xs font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-sm hover:shadow-md">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Contact Developer</span>
                        </a>
                        <a href="https://wa.me/250783871782" target="_blank" class="inline-flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all duration-300 shadow-sm hover:shadow-md" title="WhatsApp Developer">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
