@extends('layouts.app')

@section('title', $event->title . ' | God\'s Family Choir')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Event Cover Image -->
    <div class="absolute inset-0">
        @if($event->cover_image)
            <img src="{{ Storage::url($event->cover_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-20" />
        @else
            <img src="{{ asset('images/gf-2.jpg') }}" alt="{{ $event->title }}" class="w-full h-full object-cover opacity-15" />
        @endif
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 via-emerald-900/85 to-emerald-950/95"></div>
    </div>

    <!-- Mesh Gradient Animation -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-emerald-500 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-96 h-96 bg-teal-500 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-20 text-center">
        <div class="inline-block mb-6 animate-fade-in-up">
            <span class="px-4 py-2 bg-amber-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-semibold">
                {{ strtoupper($event->type) }}
            </span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight animate-fade-in-up animation-delay-200">
            {{ $event->title }}
        </h1>
        @if($event->description)
            <p class="text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto leading-relaxed mb-8 animate-fade-in-up animation-delay-400">
                {{ $event->description }}
            </p>
        @endif

        <!-- Event Details -->
        <div class="flex justify-center gap-8 mb-8 animate-fade-in-up animation-delay-600">
            <div class="text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-500/20 backdrop-blur-xl border border-emerald-400/30 rounded-full mb-3">
                    <svg class="w-8 h-8 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <p class="text-emerald-200 font-bold text-lg">{{ $event->start_at->format('M j, Y') }}</p>
                <p class="text-emerald-300 text-sm">{{ $event->start_at->format('g:i A') }}</p>
            </div>

            @if($event->location)
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full mb-3">
                        <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <p class="text-emerald-200 font-bold text-lg">{{ $event->location }}</p>
                    <p class="text-emerald-300 text-sm">Location</p>
                </div>
            @endif

            @if($event->capacity)
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-teal-500/20 backdrop-blur-xl border border-teal-400/30 rounded-full mb-3">
                        <svg class="w-8 h-8 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="text-emerald-200 font-bold text-lg">{{ $event->capacity }}</p>
                    <p class="text-emerald-300 text-sm">Max Capacity</p>
                </div>
            @endif
        </div>

        <!-- Registration Button -->
        @php
            $isPast = $event->start_at->isPast();
            $isFull = $event->capacity && $event->registrations_count >= $event->capacity;
            $isOpen = !$isPast && !$isFull;
        @endphp

        @if($isOpen)
            <div class="animate-fade-in-up animation-delay-800">
                <a href="{{ route('events.register', $event) }}"
                   class="inline-flex items-center gap-3 px-12 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold text-lg rounded-2xl hover:shadow-2xl hover:shadow-emerald-500/50 hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    Register Now
                </a>
            </div>
        @else
            <div class="animate-fade-in-up animation-delay-800">
                <div class="inline-flex items-center gap-3 px-12 py-4 bg-gray-600 text-white font-bold text-lg rounded-2xl">
                    @if($isPast)
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Event Has Passed
                    @else
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Event is Full
                    @endif
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Event Details Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                @if($event->description)
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">About This Event</h2>
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
                        </div>
                    </div>
                @endif

                <!-- Registration Info -->
                @if($event->capacity)
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-8 border border-emerald-100">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Registration Status</h3>
                        <div class="flex items-center gap-4 mb-4">
                            <div class="flex-1 bg-gray-200 rounded-full h-4 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 transition-all duration-500"
                                    style="width: {{ $event->capacity > 0 ? ($event->registrations_count / $event->capacity * 100) : 0 }}%">
                                </div>
                            </div>
                            <span class="text-sm font-semibold text-gray-700">
                                {{ $event->registrations_count }} / {{ $event->capacity }}
                            </span>
                        </div>
                        <p class="text-gray-600">
                            @if($event->registrations_count >= $event->capacity)
                                This event is currently full. Join the waiting list to be notified if spots become available.
                            @else
                                {{ $event->capacity - $event->registrations_count }} spots remaining.
                            @endif
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Event Details Card -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Event Details</h3>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-emerald-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $event->start_at->format('l, F j, Y') }}</p>
                                <p class="text-gray-600">{{ $event->start_at->format('g:i A') }}</p>
                                @if($event->end_at)
                                    <p class="text-gray-600">Until {{ $event->end_at->format('g:i A') }}</p>
                                @endif
                            </div>
                        </div>

                        @if($event->location)
                            <div class="flex items-start gap-3">
                                <svg class="w-6 h-6 text-emerald-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">Location</p>
                                    <p class="text-gray-600">{{ $event->location }}</p>
                                </div>
                            </div>
                        @endif

                        <div class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-emerald-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <div>
                                <p class="font-semibold text-gray-900">Type</p>
                                <p class="text-gray-600 capitalize">{{ $event->type }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar Actions -->
                <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Add to Calendar</h3>
                    <a href="{{ route('events.ics', $event) }}"
                       class="w-full inline-flex items-center justify-center gap-3 px-4 py-3 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-semibold rounded-xl hover:shadow-lg hover:shadow-emerald-500/50 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Download .ics
                    </a>
                </div>
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
    .animation-delay-4000 { animation-delay: 4s; }

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
@endsection
