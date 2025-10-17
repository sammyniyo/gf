@extends('layouts.app')

@section('title', $event->title . ' | God\'s Family Choir')

@section('content')
<!-- Stunning Hero Section -->
<section class="relative min-h-[85vh] flex items-end overflow-hidden bg-gradient-to-br from-slate-950 via-purple-950 to-black">
    <!-- Event Cover Image -->
    <div class="absolute inset-0">
        @if($event->cover_image)
            <img src="{{ Storage::url($event->cover_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-30" />
        @else
            <img src="{{ asset('images/gf-2.jpg') }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-20" />
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-purple-900/40 via-transparent to-transparent"></div>
    </div>

    <!-- Enhanced Mesh Gradient Animation -->
    <div class="absolute inset-0 opacity-40">
        <div class="absolute top-0 left-0 w-[700px] h-[700px] bg-gradient-to-r from-amber-500/40 to-orange-500/40 rounded-full blur-[140px] animate-blob"></div>
        <div class="absolute top-0 right-0 w-[700px] h-[700px] bg-gradient-to-l from-purple-500/40 to-pink-500/40 rounded-full blur-[140px] animate-blob animation-delay-2000"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-16 w-full">
        <!-- Breadcrumb -->
        <nav class="mb-8 animate-fade-in-up">
            <ol class="flex items-center gap-3 text-sm">
                <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors font-medium">Home</a></li>
                <li><span class="text-gray-600">›</span></li>
                <li><a href="{{ route('events.index') }}" class="text-gray-400 hover:text-white transition-colors font-medium">Events</a></li>
                <li><span class="text-gray-600">›</span></li>
                <li><span class="text-white font-bold">{{ Str::limit($event->title, 40) }}</span></li>
            </ol>
        </nav>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Event Type & Status -->
                <div class="flex flex-wrap items-center gap-3 animate-fade-in-up animation-delay-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-amber-500/50 rounded-2xl blur-xl"></div>
                        <span class="relative px-5 py-2.5 bg-white/95 backdrop-blur-sm rounded-2xl text-sm font-black text-gray-900 uppercase tracking-wider shadow-2xl">
                            {{ $event->type }}
                        </span>
                    </div>

                    @php
                        $isPast = $event->start_at->isPast();
                        $isFull = $event->capacity && $event->registrations_count >= $event->capacity;
                        $isOpen = !$isPast && !$isFull;
                    @endphp

                    <div class="relative">
                        <div class="absolute inset-0 {{ $isOpen ? 'bg-emerald-500/50' : 'bg-gray-500/50' }} rounded-2xl blur-xl"></div>
                        <span class="relative flex items-center gap-2 px-5 py-2.5 backdrop-blur-xl rounded-2xl text-sm font-black border-2 shadow-2xl
                            {{ $isPast ? 'bg-gray-700/90 border-gray-500/50 text-white' :
                               ($isFull ? 'bg-red-600/90 border-red-400/50 text-white' :
                               'bg-emerald-600/90 border-emerald-400/50 text-white') }}">
                            <span class="text-lg">{{ $isPast ? '📅' : ($isFull ? '🔒' : '✅') }}</span>
                            <span>{{ $isPast ? 'Past Event' : ($isFull ? 'Event Full' : 'Registration Open') }}</span>
                        </span>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-5xl md:text-7xl font-black text-white leading-tight animate-fade-in-up animation-delay-400">
                    {{ $event->title }}
                </h1>

                <!-- Description -->
                @if($event->description)
                    <p class="text-xl md:text-2xl text-gray-300 leading-relaxed animate-fade-in-up animation-delay-600">
                        {{ $event->description }}
                    </p>
                @endif
            </div>

            <!-- Quick Stats Card -->
            <div class="lg:col-span-1 animate-fade-in-up animation-delay-800">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/30 to-emerald-500/30 rounded-3xl blur-2xl"></div>
                    <div class="relative bg-white/10 backdrop-blur-2xl border-2 border-white/20 rounded-3xl p-8 space-y-6 shadow-2xl">
                        <!-- Date & Time -->
                        <div class="flex items-start gap-4">
                            <div class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl shadow-xl">
                                <div class="text-center">
                                    <div class="text-white text-xs font-bold leading-none uppercase">{{ $event->start_at->format('M') }}</div>
                                    <div class="text-white text-2xl font-black leading-none mt-1">{{ $event->start_at->format('j') }}</div>
                                </div>
                            </div>
                            <div>
                                <p class="text-white font-black text-lg">{{ $event->start_at->format('l') }}</p>
                                <p class="text-emerald-300 font-bold">{{ $event->start_at->format('F j, Y') }}</p>
                                <p class="text-gray-400 text-sm mt-1">{{ $event->start_at->format('g:i A') }}
                                    @if($event->end_at)
                                        - {{ $event->end_at->format('g:i A') }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="h-px bg-gradient-to-r from-transparent via-white/30 to-transparent"></div>

                        <!-- Location -->
                        @if($event->location)
                            <div class="flex items-start gap-4">
                                <div class="flex items-center justify-center w-12 h-12 bg-emerald-500/20 backdrop-blur-xl border border-emerald-400/30 rounded-xl">
                                    <svg class="w-6 h-6 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-400 text-sm font-medium uppercase tracking-wide">Location</p>
                                    <p class="text-white font-bold text-lg">{{ $event->location }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Capacity -->
                        @if($event->capacity)
                            <div class="flex items-start gap-4">
                                <div class="flex items-center justify-center w-12 h-12 bg-purple-500/20 backdrop-blur-xl border border-purple-400/30 rounded-xl">
                                    <svg class="w-6 h-6 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-gray-400 text-sm font-medium uppercase tracking-wide">Capacity</p>
                                    <p class="text-white font-black text-lg">{{ $event->registrations_count }} / {{ $event->capacity }}</p>
                                    <div class="mt-2 bg-gray-700/50 rounded-full h-2.5 overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-purple-500 to-pink-500 transition-all duration-500 rounded-full"
                                            style="width: {{ $event->capacity > 0 ? ($event->registrations_count / $event->capacity * 100) : 0 }}%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="h-px bg-gradient-to-r from-transparent via-white/30 to-transparent"></div>

                        <!-- CTA Button -->
                        @if($isOpen)
                            <a href="{{ route('events.register', $event) }}"
                               class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black text-lg rounded-xl shadow-2xl shadow-emerald-500/50 hover:scale-105 transition-all">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Register Now
                            </a>
                        @else
                            <div class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-gray-700 text-white font-black text-lg rounded-xl shadow-xl cursor-not-allowed">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                {{ $isPast ? 'Event Has Passed' : 'Event is Full' }}
                            </div>
                        @endif

                        <!-- Add to Calendar -->
                        <a href="{{ route('events.ics', $event) }}"
                           class="w-full inline-flex items-center justify-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-xl border-2 border-white/30 text-white font-bold text-sm rounded-xl hover:bg-white/20 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Add to Calendar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Details Section -->
<section class="py-20 bg-gradient-to-b from-white via-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12">
                <!-- About This Event -->
                @if($event->description)
                    <div class="bg-white rounded-3xl shadow-xl p-10 border border-gray-100">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-black text-gray-900">About This Event</h2>
                        </div>
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 leading-relaxed text-lg">{{ $event->description }}</p>
                        </div>
                    </div>
                @endif

                <!-- Registration Status -->
                @if($event->capacity)
                    <div class="relative overflow-hidden bg-gradient-to-br from-emerald-600 to-teal-600 rounded-3xl shadow-2xl p-10 text-white">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                        <div class="absolute bottom-0 left-0 w-96 h-96 bg-black/10 rounded-full blur-3xl"></div>

                        <div class="relative">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-xl rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-black">Registration Status</h3>
                            </div>

                            <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-6 mb-4">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-lg font-bold">Seats Filled</span>
                                    <span class="text-2xl font-black">{{ $event->registrations_count }} / {{ $event->capacity }}</span>
                                </div>
                                <div class="bg-white/20 rounded-full h-4 overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-amber-400 to-yellow-300 transition-all duration-500 rounded-full shadow-lg"
                                        style="width: {{ $event->capacity > 0 ? ($event->registrations_count / $event->capacity * 100) : 0 }}%">
                                    </div>
                                </div>
                            </div>

                            <p class="text-emerald-100 text-lg leading-relaxed">
                                @if($event->registrations_count >= $event->capacity)
                                    🔒 This event is currently full. Join the waiting list to be notified if spots become available.
                                @else
                                    ✅ {{ $event->capacity - $event->registrations_count }} {{ Str::plural('spot', $event->capacity - $event->registrations_count) }} remaining! Register now to secure your place.
                                @endif
                            </p>
                        </div>
                    </div>
                @endif

                <!-- What to Expect -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-3xl shadow-xl p-10 border border-purple-100">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900">What to Expect</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-purple-200 rounded-lg flex items-center justify-center">
                                <span class="text-purple-700 font-black">1</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-lg">Spirit-Filled Worship</p>
                                <p class="text-gray-600">Experience powerful praise and worship that uplifts your spirit</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-purple-200 rounded-lg flex items-center justify-center">
                                <span class="text-purple-700 font-black">2</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-lg">Fellowship & Community</p>
                                <p class="text-gray-600">Connect with fellow believers in a warm, welcoming environment</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-8 h-8 bg-purple-200 rounded-lg flex items-center justify-center">
                                <span class="text-purple-700 font-black">3</span>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-lg">Inspirational Message</p>
                                <p class="text-gray-600">Receive a transformative word that speaks to your heart</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Share This Event -->
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 sticky top-24">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Share This Event</h3>
                    <div class="space-y-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('events.show', $event)) }}" target="_blank"
                           class="flex items-center gap-3 w-full px-6 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 hover:scale-105 transition-all shadow-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Share on Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('events.show', $event)) }}&text={{ urlencode($event->title) }}" target="_blank"
                           class="flex items-center gap-3 w-full px-6 py-4 bg-sky-500 text-white font-bold rounded-xl hover:bg-sky-600 hover:scale-105 transition-all shadow-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Share on Twitter
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($event->title . ' - ' . route('events.show', $event)) }}" target="_blank"
                           class="flex items-center gap-3 w-full px-6 py-4 bg-green-600 text-white font-bold rounded-xl hover:bg-green-700 hover:scale-105 transition-all shadow-lg">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                            Share on WhatsApp
                        </a>
                        <button onclick="copyLink()"
                           class="flex items-center gap-3 w-full px-6 py-4 bg-gray-700 text-white font-bold rounded-xl hover:bg-gray-800 hover:scale-105 transition-all shadow-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                            <span id="copyText">Copy Link</span>
                        </button>
                    </div>
                </div>

                <!-- Need Help -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-3xl shadow-xl p-8 border border-amber-100">
                    <h3 class="text-2xl font-black text-gray-900 mb-4">Need Help?</h3>
                    <p class="text-gray-700 mb-6 leading-relaxed">
                        Have questions about this event? We're here to help!
                    </p>
                    <a href="{{ route('contact.submit') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-bold rounded-xl shadow-lg hover:scale-105 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Back to Events -->
<section class="py-16 bg-gradient-to-br from-emerald-950 via-teal-950 to-black relative overflow-hidden">
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-6">
            Explore More Events
        </h2>
        <p class="text-lg text-emerald-200 mb-8">
            Discover other inspiring worship experiences and concerts
        </p>
        <a href="{{ route('events.index') }}" class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-emerald-950 font-black text-lg rounded-xl shadow-2xl shadow-amber-500/50 hover:scale-105 transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            View All Events
        </a>
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
    .animation-delay-600 { animation-delay: 0.6s; }
    .animation-delay-800 { animation-delay: 0.8s; }
</style>

<script>
function copyLink() {
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
        const button = document.getElementById('copyText');
        button.textContent = 'Link Copied!';
        setTimeout(() => {
            button.textContent = 'Copy Link';
        }, 2000);
    });
}
</script>
@endsection
