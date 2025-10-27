<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oops! Page Not Found | God's Family Choir</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/hero.css', 'resources/js/app.js', 'resources/js/hero.js'])

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 12px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 6px; }
        ::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #3b82f6, #1d4ed8); border-radius: 6px; border: 2px solid #f1f5f9; }
        ::-webkit-scrollbar-thumb:hover { background: linear-gradient(to bottom, #2563eb, #1e40af); }
        html { scrollbar-width: thin; scrollbar-color: #3b82f6 #f1f5f9; scroll-behavior: smooth; }

        /* Animations */
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-20px); } }
        @keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.5); } 50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.8); } }
        @keyframes gradient-shift { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        @keyframes bounce-gentle { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-gradient { background-size: 200% 200%; animation: gradient-shift 3s ease infinite; }
        .animate-bounce-gentle { animation: bounce-gentle 2s ease-in-out infinite; }

        .animation-delay-1 { animation-delay: 0.5s; }
        .animation-delay-2 { animation-delay: 1s; }
        .animation-delay-3 { animation-delay: 1.5s; }
        .animation-delay-4 { animation-delay: 2s; }
    </style>
</head>

<body class="font-sans antialiased bg-gradient-to-br from-slate-950 via-cyan-950 to-blue-950 min-h-screen overflow-x-hidden">
    <!-- Navigation -->
    <nav class="relative z-50 bg-black/30 backdrop-blur-xl border-b border-cyan-400/10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-cyan-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-music text-white text-lg"></i>
                    </div>
                    <span class="text-white font-bold text-xl">God's Family Choir</span>
                </a>

                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-white/80 hover:text-cyan-300 transition-colors font-medium">Home</a>
                    <a href="{{ route('about') }}" class="text-white/80 hover:text-cyan-300 transition-colors font-medium">About</a>
                    <a href="{{ route('events.index') }}" class="text-white/80 hover:text-cyan-300 transition-colors font-medium">Events</a>
                    <a href="{{ route('contact') }}" class="text-white/80 hover:text-cyan-300 transition-colors font-medium">Contact</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="relative min-h-screen flex items-center justify-center px-6">
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Floating Orbs -->
            <div class="absolute top-20 left-10 w-32 h-32 bg-cyan-500/30 rounded-full blur-2xl animate-float"></div>
            <div class="absolute top-40 right-20 w-48 h-48 bg-blue-500/25 rounded-full blur-3xl animate-float animation-delay-1"></div>
            <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-cyan-400/20 rounded-full blur-2xl animate-float animation-delay-2"></div>
            <div class="absolute bottom-20 right-1/3 w-36 h-36 bg-blue-600/25 rounded-full blur-3xl animate-float animation-delay-3"></div>

            <!-- Grid Pattern -->
            <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cpath d=&quot;M30 0L30 60M0 30L60 30&quot; stroke=&quot;%23ffffff&quot; stroke-width=&quot;0.5&quot; fill=&quot;none&quot;/%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative z-10 text-center max-w-6xl mx-auto">
            <!-- 404 Number with Glow Effect -->
            <div class="mb-12 relative">
                <div class="relative inline-block">
                    <h1 class="text-[8rem] md:text-[12rem] lg:text-[16rem] font-black bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-600 bg-clip-text text-transparent animate-gradient leading-none">
                        404
                    </h1>
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 text-[8rem] md:text-[12rem] lg:text-[16rem] font-black text-blue-500/30 blur-sm animate-pulse-glow">
                        404
                    </div>
                </div>
            </div>

            <!-- Main Message -->
            <div class="mb-16">
                <div class="mb-8">
                    <div class="inline-flex items-center gap-3 px-6 py-3 bg-blue-500/20 backdrop-blur-sm border border-blue-400/30 rounded-full mb-8">
                        <i class="fas fa-search text-blue-400 animate-bounce-gentle"></i>
                        <span class="text-blue-300 font-semibold text-sm uppercase tracking-wider">Page Not Found</span>
                    </div>
                </div>

                <h2 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight">
                    Looks like this page
                    <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">wandered off</span>
                    into the digital void
                </h2>

                <p class="text-xl md:text-2xl text-gray-300 leading-relaxed max-w-4xl mx-auto mb-8">
                    Don't worry! Even the best choirs sometimes hit a wrong note. Let's get you back to the harmony of our beautiful website.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6 mb-16">
                <a href="{{ route('home') }}" class="group relative inline-flex items-center gap-4 px-10 py-5 bg-gradient-to-r from-cyan-600 to-blue-600 text-white font-bold rounded-2xl hover:shadow-2xl hover:shadow-cyan-500/50 transition-all duration-500 transform hover:-translate-y-2 hover:scale-105">
                    <i class="fas fa-home text-xl group-hover:rotate-12 transition-transform duration-300"></i>
                    <span class="text-lg">Return Home</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-2xl blur opacity-0 group-hover:opacity-75 transition-opacity duration-500 -z-10"></div>
                </a>

                <a href="{{ route('events.index') }}" class="group inline-flex items-center gap-4 px-10 py-5 bg-white/10 backdrop-blur-sm text-white font-bold rounded-2xl border-2 border-cyan-400/30 hover:bg-white/20 hover:border-cyan-400/50 transition-all duration-500 transform hover:-translate-y-2">
                    <i class="fas fa-calendar-alt text-xl group-hover:scale-110 transition-transform duration-300"></i>
                    <span class="text-lg">Browse Events</span>
                </a>

                <button onclick="history.back()" class="group inline-flex items-center gap-4 px-10 py-5 bg-cyan-600/20 backdrop-blur-sm text-cyan-300 font-bold rounded-2xl border-2 border-cyan-500/30 hover:bg-cyan-500/30 hover:border-cyan-400/50 transition-all duration-500 transform hover:-translate-y-2">
                    <i class="fas fa-arrow-left text-xl group-hover:-translate-x-1 transition-transform duration-300"></i>
                    <span class="text-lg">Go Back</span>
                </button>
            </div>

            <!-- Popular Pages Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
                <a href="{{ route('about') }}" class="group bg-white/5 backdrop-blur-xl border border-cyan-400/10 rounded-2xl p-6 hover:bg-white/10 hover:border-cyan-400/30 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">About Us</h3>
                        <p class="text-gray-400 text-sm">Learn about our choir's mission and values</p>
                    </div>
                </a>

                <a href="{{ route('story') }}" class="group bg-white/5 backdrop-blur-xl border border-blue-400/10 rounded-2xl p-6 hover:bg-white/10 hover:border-blue-400/30 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-book-open text-white text-2xl"></i>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Our Story</h3>
                        <p class="text-gray-400 text-sm">Discover our journey through the years</p>
                    </div>
                </a>

                <a href="{{ route('contact') }}" class="group bg-white/5 backdrop-blur-xl border border-cyan-400/10 rounded-2xl p-6 hover:bg-white/10 hover:border-cyan-400/30 transition-all duration-500 transform hover:-translate-y-2">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-cyan-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-envelope text-white text-2xl"></i>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Contact Us</h3>
                        <p class="text-gray-400 text-sm">Get in touch with our ministry</p>
                    </div>
                </a>
            </div>

            <!-- Help Section -->
            <div class="bg-white/5 backdrop-blur-xl border border-cyan-400/20 rounded-3xl p-8 max-w-4xl mx-auto mb-16">
                <h3 class="text-2xl font-bold text-white mb-6 text-center">
                    <i class="fas fa-compass text-cyan-400 mr-3"></i>
                    Need Help Finding Something?
                </h3>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="text-cyan-400 font-semibold mb-4 text-lg">Quick Links</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('choir.register.form') }}" class="flex items-center gap-3 text-gray-300 hover:text-cyan-300 transition-colors group">
                                <i class="fas fa-music text-cyan-400 group-hover:scale-110 transition-transform"></i>
                                <span>Join the Choir</span>
                            </a></li>
                            <li><a href="{{ route('events.index') }}" class="flex items-center gap-3 text-gray-300 hover:text-cyan-300 transition-colors group">
                                <i class="fas fa-calendar text-cyan-400 group-hover:scale-110 transition-transform"></i>
                                <span>Upcoming Events</span>
                            </a></li>
                            <li><a href="{{ route('privacy-policy') }}" class="flex items-center gap-3 text-gray-300 hover:text-cyan-300 transition-colors group">
                                <i class="fas fa-shield-alt text-cyan-400 group-hover:scale-110 transition-transform"></i>
                                <span>Privacy Policy</span>
                            </a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-blue-400 font-semibold mb-4 text-lg">Popular Content</h4>
                        <ul class="space-y-3">
                            <li><a href="{{ route('about') }}" class="flex items-center gap-3 text-gray-300 hover:text-blue-300 transition-colors group">
                                <i class="fas fa-info-circle text-blue-400 group-hover:scale-110 transition-transform"></i>
                                <span>About Our Ministry</span>
                            </a></li>
                            <li><a href="{{ route('story') }}" class="flex items-center gap-3 text-gray-300 hover:text-blue-300 transition-colors group">
                                <i class="fas fa-history text-blue-400 group-hover:scale-110 transition-transform"></i>
                                <span>Our History</span>
                            </a></li>
                            <li><a href="{{ route('contact') }}" class="flex items-center gap-3 text-gray-300 hover:text-blue-300 transition-colors group">
                                <i class="fas fa-phone text-blue-400 group-hover:scale-110 transition-transform"></i>
                                <span>Get in Touch</span>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Inspirational Quote -->
            <div class="bg-gradient-to-r from-cyan-800/50 to-blue-800/50 backdrop-blur-sm border border-cyan-500/30 rounded-3xl p-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-cyan-400 text-5xl mb-6">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <blockquote class="text-xl md:text-2xl font-light italic text-cyan-50 mb-6 leading-relaxed">
                        "And we know that in all things God works for the good of those who love him, who have been called according to his purpose."
                    </blockquote>
                    <cite class="text-cyan-300 font-semibold text-lg">— Romans 8:28</cite>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="relative z-10 bg-black/30 backdrop-blur-xl border-t border-white/10 py-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-gray-400 mb-4">
                © {{ date('Y') }} God's Family Choir - ASA UR Nyarugenge SDA. All rights reserved.
            </p>
            <div class="flex items-center justify-center gap-6">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors">Home</a>
                <a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors">About</a>
                <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors">Contact</a>
                <a href="{{ route('privacy-policy') }}" class="text-gray-400 hover:text-white transition-colors">Privacy</a>
            </div>
        </div>
    </footer>
</body>
</html>
