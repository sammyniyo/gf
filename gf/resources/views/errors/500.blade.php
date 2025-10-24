@extends('layouts.app')

@section('title', 'Server Error - 500')

@push('styles')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    @keyframes pulse-glow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.8; }
    }

    @keyframes slide-in {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 3s ease-in-out infinite;
    }

    .animate-slide-in {
        animation: slide-in 0.8s ease-out forwards;
    }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }

    body {
        background: radial-gradient(circle at top left, rgba(139, 69, 19, 0.18), transparent 45%),
                    radial-gradient(circle at top right, rgba(220, 38, 38, 0.15), transparent 40%),
                    radial-gradient(circle at bottom, rgba(75, 85, 99, 0.18), transparent 45%),
                    #f8fafc;
    }

    .floating-shapes {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .floating-shape {
        position: absolute;
        border-radius: 50%;
        opacity: 0.1;
    }

    .shape-1 {
        width: 90px;
        height: 90px;
        background: linear-gradient(45deg, #8b4513, #dc2626);
        top: 20%;
        left: 10%;
        animation: float 8s ease-in-out infinite;
    }

    .shape-2 {
        width: 130px;
        height: 130px;
        background: linear-gradient(45deg, #4b5563, #6b7280);
        top: 60%;
        right: 15%;
        animation: float 10s ease-in-out infinite reverse;
    }

    .shape-3 {
        width: 70px;
        height: 70px;
        background: linear-gradient(45deg, #1f2937, #374151);
        bottom: 30%;
        left: 20%;
        animation: float 7s ease-in-out infinite;
    }

    .button-hover {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .button-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
</style>
@endpush

@section('content')
    <!-- Floating Background Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape shape-1 animate-float"></div>
        <div class="floating-shape shape-2 animate-float"></div>
        <div class="floating-shape shape-3 animate-float"></div>
    </div>

    <section class="relative min-h-screen overflow-hidden">
        <!-- Animated Background Blobs -->
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -top-24 -left-20 h-96 w-96 animate-pulse-glow rounded-full bg-gradient-to-br from-amber-200 to-red-200 opacity-40 blur-3xl"></div>
            <div class="absolute top-1/4 right-10 h-80 w-80 animate-pulse-glow rounded-full bg-gradient-to-br from-gray-200 to-slate-200 opacity-30 blur-3xl" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/3 h-72 w-72 animate-pulse-glow rounded-full bg-gradient-to-br from-slate-200 to-gray-200 opacity-30 blur-3xl" style="animation-delay: 2s;"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">

            <!-- Hero Section -->
            <div class="text-center animate-slide-in">
                <!-- Floating Server Icon -->
                <div class="mx-auto mb-8 flex h-32 w-32 items-center justify-center animate-float">
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-amber-400 to-red-500 opacity-20 blur-2xl"></div>
                        <div class="relative flex h-24 w-24 items-center justify-center rounded-full bg-white shadow-2xl shadow-amber-200/50 ring-4 ring-amber-100">
                            <svg class="h-12 w-12 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V6a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3m-13.5 0V9.75a3 3 0 013-3h13.5a3 3 0 013 3v4.5" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- 500 Number -->
                <div class="mb-6 animate-slide-in delay-100">
                    <h1 class="text-[clamp(4rem,15vw,10rem)] font-black leading-none bg-gradient-to-r from-amber-600 via-red-600 to-gray-600 bg-clip-text text-transparent">
                        500
                    </h1>
                </div>

                <!-- Main Message -->
                <div class="mx-auto max-w-2xl space-y-4 animate-slide-in delay-200">
                    <h2 class="text-3xl font-bold text-slate-900 sm:text-4xl lg:text-5xl">
                        Oops! Something Went Wrong
                    </h2>
                    <p class="text-lg text-slate-600 sm:text-xl">
                        We're experiencing some technical difficulties. Our team has been notified and is working to fix this issue.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row animate-slide-in delay-300">
                    <button onclick="window.location.reload()"
                            class="button-hover group inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-amber-600 to-red-600 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-amber-300/50 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-amber-400/50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600 sm:w-auto">
                        <svg class="h-5 w-5 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Try Again
                    </button>

                    <a href="{{ route('home') }}"
                       class="button-hover group inline-flex w-full items-center justify-center gap-2 rounded-2xl border-2 border-slate-300 bg-white px-8 py-4 text-base font-semibold text-slate-700 shadow-lg transition-all hover:scale-105 hover:border-amber-300 hover:text-amber-600 hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600 sm:w-auto">
                        <svg class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Go Home
                    </a>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="mt-20 grid gap-6 lg:grid-cols-2 animate-slide-in delay-400">
                <!-- What Happened Card -->
                <div class="rounded-3xl border border-amber-200 bg-gradient-to-br from-amber-50 to-orange-50 p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-100">
                            <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">What Happened</h3>
                            <p class="text-slate-600 mb-4">
                                Our servers encountered an unexpected error. This could be due to high traffic, maintenance, or a temporary glitch.
                            </p>
                            <ul class="text-sm text-slate-600 space-y-1">
                                <li>• Server overload or maintenance</li>
                                <li>• Database connection issues</li>
                                <li>• Temporary service disruption</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- What We're Doing Card -->
                <div class="rounded-3xl border border-blue-200 bg-gradient-to-br from-blue-50 to-cyan-50 p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">What We're Doing</h3>
                            <p class="text-slate-600 mb-4">
                                Our technical team has been automatically notified and is working to resolve this issue as quickly as possible.
                            </p>
                            <ul class="text-sm text-slate-600 space-y-1">
                                <li>• Monitoring server status</li>
                                <li>• Investigating the root cause</li>
                                <li>• Implementing fixes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
