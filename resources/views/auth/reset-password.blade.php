@extends('layouts.auth')

@section('title', 'Reset Password')

@push('styles')
    <style>
        /* Reset and base styles */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #1f2937;
        }

        /* Animations */
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

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
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

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

        /* Floating background elements */
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
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            top: 20%;
            left: 10%;
            animation: float 8s ease-in-out infinite;
        }

        .shape-2 {
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #f093fb, #f5576c);
            top: 60%;
            right: 15%;
            animation: float 10s ease-in-out infinite reverse;
        }

        .shape-3 {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            bottom: 30%;
            left: 20%;
            animation: float 7s ease-in-out infinite;
        }

        /* Glass effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Input focus effects */
        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            transform: scale(1.02);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }

        /* Button hover effects */
        .button-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .button-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Ensure text is always visible */
        .text-visible {
            color: #1f2937 !important;
        }

        .text-white-visible {
            color: #ffffff !important;
        }

        .text-slate-visible {
            color: #64748b !important;
        }

        .text-indigo-visible {
            color: #4f46e5 !important;
        }

        /* Form styling */
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Input styling */
        .form-input {
            background: #ffffff;
            border: 2px solid #e5e7eb;
            color: #1f2937;
        }

        .form-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* Button styling */
        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #ffffff;
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #4338ca, #6d28d9);
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

    <div class="relative min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-6xl mx-auto flex flex-col lg:flex-row lg:items-stretch lg:gap-10">
            <!-- Left Panel - Info Section -->
            <div class="hidden lg:flex w-full max-w-xl flex-col justify-between overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-700 via-slate-900 to-slate-950 p-10 text-white shadow-2xl animate-slide-in">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-3 rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white ring-1 ring-white/25 backdrop-blur animate-bounce">
                        <span class="inline-flex h-2.5 w-2.5 animate-pulse rounded-full bg-emerald-300"></span>
                        <span class="text-white-visible">Password Reset</span>
                    </div>
                    <div class="space-y-4">
                        <h1 class="text-4xl font-semibold leading-tight tracking-tight text-white-visible">
                            Create new password
                        </h1>
                        <p class="text-base text-white-visible opacity-90">
                            You're almost there! Enter your email and create a strong new password to regain access to your admin dashboard.
                        </p>
                    </div>
                    <dl class="grid grid-cols-1 gap-4 text-sm">
                        <div class="rounded-2xl bg-white/10 p-4 ring-1 ring-white/10 backdrop-blur">
                            <dt class="font-semibold uppercase tracking-wider text-indigo-200 text-white-visible">
                                Security First
                            </dt>
                            <dd class="mt-2 flex items-center gap-2 text-lg font-medium text-white-visible">
                                <svg class="h-5 w-5 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Choose a strong password with at least 8 characters for maximum security.
                            </dd>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 ring-1 ring-white/10 backdrop-blur">
                            <dt class="font-semibold uppercase tracking-wider text-indigo-200 text-white-visible">
                                Quick Access
                            </dt>
                            <dd class="mt-2 flex items-center gap-2 text-lg font-medium text-white-visible">
                                <svg class="h-5 w-5 text-sky-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Once reset, you'll be automatically signed in to your dashboard.
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="flex items-center justify-between text-xs text-white-visible opacity-70">
                    <span>Secure reset · {{ now()->format('M d, Y') }}</span>
                    <span>@GF</span>
                </div>
            </div>

            <!-- Right Panel - Reset Password Form -->
            <div class="flex w-full flex-1 items-center justify-center">
                <div class="w-full max-w-lg rounded-3xl form-container p-8 shadow-xl animate-slide-in delay-200">
                    <div class="mb-8 flex items-center justify-between animate-slide-in delay-300">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-visible animate-bounce">Password Reset</p>
                            <h2 class="mt-2 text-2xl font-semibold text-visible animate-slide-in delay-400">Create new password</h2>
                            <p class="mt-1 text-sm text-slate-visible animate-slide-in delay-500">Enter your email and choose a strong new password.</p>
                        </div>
                        <a href="{{ route('home') }}" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-300 bg-white text-gray-500 transition hover:text-indigo-500" aria-label="Back to website">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>

                    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="animate-slide-in delay-300">
                            <label for="email" class="text-sm font-semibold text-visible">Email address</label>
                            <div class="mt-2">
                                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                                       class="form-input input-focus block w-full rounded-2xl px-4 py-3 text-base shadow-sm transition focus:outline-none"
                                       placeholder="admin@choir.org">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="animate-slide-in delay-400">
                            <label for="password" class="text-sm font-semibold text-visible">New password</label>
                            <div class="mt-2">
                                <input id="password" type="password" name="password" required autocomplete="new-password"
                                       class="form-input input-focus block w-full rounded-2xl px-4 py-3 text-base shadow-sm transition focus:outline-none"
                                       placeholder="Enter your new password">
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-slate-visible">Must be at least 8 characters</p>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="animate-slide-in delay-500">
                            <label for="password_confirmation" class="text-sm font-semibold text-visible">Confirm new password</label>
                            <div class="mt-2">
                                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                                       class="form-input input-focus block w-full rounded-2xl px-4 py-3 text-base shadow-sm transition focus:outline-none"
                                       placeholder="Confirm your new password">
                            </div>
                        </div>

                        <button type="submit"
                                class="btn-primary button-hover animate-slide-in delay-500 inline-flex w-full items-center justify-center gap-2 rounded-2xl px-5 py-3 text-sm font-semibold shadow-lg transition focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Reset Password
                        </button>
                    </form>

                    <div class="mt-8 space-y-4">
                        <!-- Back to Login -->
                        <div class="text-center">
                            <p class="text-sm text-slate-visible">
                                Remember your password?
                                <a href="{{ route('login') }}" class="font-semibold text-indigo-visible hover:text-indigo-600">
                                    Sign in here
                                </a>
                            </p>
                        </div>

                        <!-- Back to Home -->
                        <div class="text-center">
                            <a href="{{ route('home') }}" class="text-sm text-slate-visible hover:text-indigo-600 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
