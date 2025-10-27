@extends('layouts.app')

@section('title', 'Verify Ticket | God\'s Family Choir')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-white py-12">
    <div class="max-w-4xl mx-auto px-6">
        @if($registration)
            <!-- Valid Ticket -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-6 text-white">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Valid Ticket</h1>
                            <p class="text-emerald-100">Registration confirmed and verified</p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-8">
                    <div class="grid lg:grid-cols-2 gap-8">
                        <!-- Ticket Details -->
                        <div class="space-y-6">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4">Event Details</h2>
                                <div class="space-y-3">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $registration->event->title }}</p>
                                            <p class="text-gray-600 capitalize">{{ $registration->event->type }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $registration->event->start_at->format('l, F j, Y') }}</p>
                                            <p class="text-gray-600">{{ $registration->event->start_at->format('g:i A') }}</p>
                                        </div>
                                    </div>

                                    @if($registration->event->location)
                                        <div class="flex items-start gap-3">
                                            <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <div>
                                                <p class="font-semibold text-gray-900">Location</p>
                                                <p class="text-gray-600">{{ $registration->event->location }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4">Registration Details</h2>
                                <div class="space-y-3">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900">Registered by</p>
                                            <p class="text-gray-600">{{ $registration->name }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900">Ticket Code</p>
                                            <p class="text-gray-600 font-mono">{{ $registration->registration_code }}</p>
                                        </div>
                                    </div>

                                    @if($registration->event->isConcert() && $registration->total_amount > 0)
                                        <div class="flex items-start gap-3">
                                            <svg class="w-5 h-5 text-emerald-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                            <div>
                                                <p class="font-semibold text-gray-900">Support Amount</p>
                                                <p class="text-gray-600">{{ number_format($registration->total_amount) }} RWF</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- QR Code -->
                        <div class="flex flex-col items-center justify-center">
                            <div class="text-center mb-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Ticket QR Code</h3>
                                <p class="text-gray-600">Scan this code at the entrance</p>
                            </div>

                            <x-qr-code :data="route('tickets.verify', $registration->registration_code)" :size="250" class="mb-6" />

                            <div class="text-center">
                                <p class="text-sm text-gray-500 mb-4">
                                    Registration verified on {{ $registration->created_at->format('M j, Y g:i A') }}
                                </p>
                                <a href="{{ route('tickets.pdf', $registration->registration_code) }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download PDF Ticket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Invalid Ticket -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-red-700 px-8 py-6 text-white">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Invalid Ticket</h1>
                            <p class="text-red-100">This ticket code is not valid or has expired</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 text-center">
                    <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Ticket Not Found</h3>
                    <p class="text-gray-600 mb-6">The ticket code you entered is invalid or may have been used already.</p>
                    <a href="{{ route('events.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        View Events
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
