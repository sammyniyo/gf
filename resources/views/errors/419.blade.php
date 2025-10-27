@extends('layouts.app')

@section('title', 'Page Expired - 419')

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

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @keyframes clock-tick {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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

    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }

    .animate-clock-tick {
        animation: clock-tick 2s linear infinite;
    }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }

    body {
        background: radial-gradient(circle at top left, rgba(239, 68, 68, 0.18), transparent 45%),
                    radial-gradient(circle at top right, rgba(251, 146, 60, 0.15), transparent 40%),
                    radial-gradient(circle at bottom, rgba(168, 85, 247, 0.18), transparent 45%),
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
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #ef4444, #f97316);
        top: 20%;
        left: 10%;
        animation: float 8s ease-in-out infinite;
    }

    .shape-2 {
        width: 140px;
        height: 140px;
        background: linear-gradient(45deg, #a855f7, #ec4899);
        top: 60%;
        right: 15%;
        animation: float 10s ease-in-out infinite reverse;
    }

    .shape-3 {
        width: 80px;
        height: 80px;
        background: linear-gradient(45deg, #3b82f6, #06b6d4);
        bottom: 30%;
        left: 20%;
        animation: float 7s ease-in-out infinite;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
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

    .button-hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .button-hover:hover::before {
        left: 100%;
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
            <div class="absolute -top-24 -left-20 h-96 w-96 animate-pulse-glow rounded-full bg-gradient-to-br from-red-200 to-orange-200 opacity-40 blur-3xl"></div>
            <div class="absolute top-1/4 right-10 h-80 w-80 animate-pulse-glow rounded-full bg-gradient-to-br from-purple-200 to-pink-200 opacity-30 blur-3xl" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/3 h-72 w-72 animate-pulse-glow rounded-full bg-gradient-to-br from-blue-200 to-cyan-200 opacity-30 blur-3xl" style="animation-delay: 2s;"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">

            <!-- Hero Section -->
            <div class="text-center animate-slide-in">
                <!-- Floating Clock Icon -->
                <div class="mx-auto mb-8 flex h-32 w-32 items-center justify-center animate-float">
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-red-400 to-orange-500 opacity-20 blur-2xl"></div>
                        <div class="relative flex h-24 w-24 items-center justify-center rounded-full bg-white shadow-2xl shadow-red-200/50 ring-4 ring-red-100">
                            <svg class="h-12 w-12 text-red-600 animate-clock-tick" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- 419 Number -->
                <div class="mb-6 animate-slide-in delay-100">
                    <h1 class="text-[clamp(4rem,15vw,10rem)] font-black leading-none bg-gradient-to-r from-red-600 via-orange-600 to-purple-600 bg-clip-text text-transparent">
                        419
                    </h1>
                </div>

                <!-- Main Message -->
                <div class="mx-auto max-w-2xl space-y-4 animate-slide-in delay-200">
                    <h2 class="text-3xl font-bold text-slate-900 sm:text-4xl lg:text-5xl">
                        Oops! Your Session Timed Out
                    </h2>
                    <p class="text-lg text-slate-600 sm:text-xl">
                        Your session has expired for security reasons. Don't worry—this happens to keep your account safe. Just refresh and try again!
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row animate-slide-in delay-300">
                    <button onclick="window.location.reload()"
                            class="button-hover group inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-red-600 to-orange-600 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-red-300/50 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-red-400/50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 sm:w-auto">
                        <svg class="h-5 w-5 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Refresh Page
                    </button>

                    <a href="{{ route('home') }}"
                       class="button-hover group inline-flex w-full items-center justify-center gap-2 rounded-2xl border-2 border-slate-300 bg-white px-8 py-4 text-base font-semibold text-slate-700 shadow-lg transition-all hover:scale-105 hover:border-red-300 hover:text-red-600 hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600 sm:w-auto">
                        <svg class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Go Home
                    </a>

                    <a href="{{ route('login') }}"
                       class="button-hover group inline-flex w-full items-center justify-center gap-2 rounded-2xl border-2 border-red-200 bg-red-50 px-8 py-4 text-base font-semibold text-red-700 shadow-lg transition-all hover:scale-105 hover:bg-red-600 hover:text-white hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 sm:w-auto">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        Sign In Again
                    </a>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="mt-20 grid gap-6 lg:grid-cols-2 animate-slide-in delay-400">
                <!-- Why This Happened Card -->
                <div class="rounded-3xl border border-red-200 bg-gradient-to-br from-red-50 to-orange-50 p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-red-100">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Why This Happened</h3>
                            <p class="text-slate-600 mb-4">
                                Your session expired for security reasons. This typically happens when you've been inactive for too long or when the server restarts.
                            </p>
                            <ul class="text-sm text-slate-600 space-y-1">
                                <li>• Session timeout for security</li>
                                <li>• Server restart or maintenance</li>
                                <li>• Browser cache issues</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- How to Prevent Card -->
                <div class="rounded-3xl border border-blue-200 bg-gradient-to-br from-blue-50 to-cyan-50 p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-blue-100">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">How to Prevent This</h3>
                            <p class="text-slate-600 mb-4">
                                Here are some tips to avoid session timeouts in the future:
                            </p>
                            <ul class="text-sm text-slate-600 space-y-1">
                                <li>• Keep your browser tab active</li>
                                <li>• Use "Keep me signed in" option</li>
                                <li>• Complete forms within 15 minutes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Add shake animation to the clock icon
        const clockIcon = document.querySelector('.animate-clock-tick');
        if (clockIcon) {
            setInterval(() => {
                clockIcon.classList.add('animate-shake');
                setTimeout(() => {
                    clockIcon.classList.remove('animate-shake');
                }, 500);
            }, 3000);
        }

        // Add floating particles effect
        function createFloatingParticle() {
            const particle = document.createElement('div');
            particle.className = 'absolute w-2 h-2 bg-red-300 rounded-full opacity-20 animate-float';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDuration = (Math.random() * 3 + 2) + 's';
            document.querySelector('.floating-shapes').appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 5000);
        }

        // Create particles periodically
        setInterval(createFloatingParticle, 1500);
    });
</script>
@endpush
