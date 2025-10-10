@extends('layouts.app')

@section('title', 'Contact Us | God\'s Family Choir')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/gf-2.jpg') }}" alt="Contact Us" class="w-full h-full object-cover opacity-15" />
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 to-emerald-900/95"></div>
    </div>

    <!-- Mesh Gradient -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-emerald-500 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-4xl mx-auto px-6 py-16 text-center">
        <div class="inline-block mb-6 animate-fade-in-up">
            <span class="px-4 py-2 bg-amber-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-semibold">
                GET IN TOUCH
            </span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight animate-fade-in-up animation-delay-200">
            We'd Love to <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Hear From You</span>
        </h1>
        <p class="text-xl text-emerald-100 max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-400">
            Whether you have a question, feedback, or want to book us for an event, reach out and let's connect
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12">

            <!-- Contact Information -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Let's Start a <span class="text-emerald-600">Conversation</span>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        We're here to answer your questions, discuss collaboration opportunities, or simply chat about our ministry. Reach out through any of these channels.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div class="space-y-4">
                    <!-- Email -->
                    <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="group block p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-emerald-300">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Email Us</h3>
                                <p class="text-emerald-600 font-medium">asa.godsfamilychoir2017@gmail.com</p>
                                <p class="text-sm text-gray-500 mt-1">We respond within 24 hours</p>
                            </div>
                        </div>
                    </a>

                    <!-- Phone -->
                    <a href="tel:+250783871782" class="group block p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-amber-300">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Call Us</h3>
                                <p class="text-amber-600 font-medium">+250 783 871 782</p>
                                <p class="text-sm text-gray-500 mt-1">Mon-Sat, 9AM-6PM</p>
                            </div>
                        </div>
                    </a>

                    <!-- Location -->
                    <div class="group block p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-blue-300">
                        <div class="flex items-start gap-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Visit Us</h3>
                                <p class="text-blue-600 font-medium">ASA UR Nyarugenge SDA</p>
                                <p class="text-sm text-gray-500 mt-1">Kigali, Rwanda</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Follow Our Journey</h3>
                    <div class="flex gap-3">
                        @foreach([
                            ['name' => 'Facebook', 'icon' => 'FB.png', 'color' => 'from-blue-600 to-blue-700'],
                            ['name' => 'Instagram', 'icon' => 'instagram.png', 'color' => 'from-pink-600 to-purple-600'],
                            ['name' => 'YouTube', 'icon' => 'youtube_BIG.png', 'color' => 'from-red-600 to-red-700'],
                            ['name' => 'Spotify', 'icon' => 'SPOT_BIG.png', 'color' => 'from-green-600 to-green-700'],
                            ['name' => 'TikTok', 'icon' => 'tiktok_BIG.png', 'color' => 'from-gray-800 to-gray-900'],
                        ] as $social)
                            <a href="#" class="group w-12 h-12 bg-gradient-to-br {{ $social['color'] }} rounded-xl flex items-center justify-center hover:scale-110 transition-transform shadow-lg">
                                <img src="{{ asset('images/' . $social['icon']) }}" alt="{{ $social['name'] }}" class="w-6 h-6 opacity-90 group-hover:opacity-100" />
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Response Badge -->
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-emerald-50 rounded-xl border border-emerald-200">
                    <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-emerald-800 font-semibold">⚡ We respond within 24 hours</span>
                </div>
            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 p-8">
                        <h3 class="text-2xl font-bold text-white flex items-center gap-3">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                            Send us a Message
                        </h3>
                        <p class="text-emerald-100 mt-2">Fill out the form and we'll get back to you soon</p>
                    </div>

                    <!-- Form Body -->
                    <form method="POST" action="{{ route('contact.submit') }}" class="p-8 space-y-6">
                        @csrf

                        <div class="relative">
                            <input type="text" name="name" required
                                class="peer w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none"
                                placeholder=" ">
                            <label class="absolute left-4 -top-3 bg-white px-2 text-sm font-semibold text-emerald-600">
                                Your Name <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <div class="relative">
                            <input type="email" name="email" required
                                class="peer w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none"
                                placeholder=" ">
                            <label class="absolute left-4 -top-3 bg-white px-2 text-sm font-semibold text-emerald-600">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <div class="relative">
                            <select name="subject" required
                                class="peer w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none">
                                <option value="">Choose a subject</option>
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="Prayer Request">Prayer Request</option>
                                <option value="Booking">Event Booking / Invitation</option>
                                <option value="Join Choir">Joining the Choir</option>
                                <option value="Partnership">Partnership Opportunity</option>
                                <option value="Feedback">Feedback</option>
                            </select>
                            <label class="absolute left-4 -top-3 bg-white px-2 text-sm font-semibold text-emerald-600">
                                Subject <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <div class="relative">
                            <textarea name="message" rows="6" required
                                class="peer w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all outline-none resize-none"
                                placeholder=" "></textarea>
                            <label class="absolute left-4 -top-3 bg-white px-2 text-sm font-semibold text-emerald-600">
                                Your Message <span class="text-red-500">*</span>
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full py-4 px-6 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold rounded-xl hover:shadow-xl hover:shadow-emerald-500/50 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center gap-3">
                            <span>Send Message</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Scripture Quote -->
        <div class="mt-20 text-center">
            <div class="inline-block bg-gradient-to-r from-emerald-50 to-amber-50 rounded-2xl p-8 max-w-3xl border border-emerald-200">
                <svg class="w-10 h-10 text-emerald-600/50 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z"/>
                </svg>
                <blockquote class="text-2xl text-gray-700 font-light italic leading-relaxed mb-4">
                    Let your speech always be gracious, seasoned with salt, so that you may know how you ought to answer each person
                </blockquote>
                <p class="text-emerald-600 font-semibold text-lg">— Colossians 4:6</p>
            </div>
        </div>
    </div>
</section>

<x-static.footer />

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(20px, -50px) scale(1.1); }
        50% { transform: translate(-20px, 20px) scale(0.9); }
        75% { transform: translate(50px, 50px) scale(1.05); }
    }
    .animate-blob {
        animation: blob 10s ease-in-out infinite;
    }
    .animation-delay-2000 { animation-delay: 2s; }

    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
</style>
@endsection
