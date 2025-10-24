@extends('layouts.auth')

@section('title', 'Admin Login')

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
            <!-- Left Panel - Welcome Section -->
            <div class="hidden lg:flex w-full max-w-xl flex-col justify-between overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-700 via-slate-900 to-slate-950 p-10 text-white shadow-2xl animate-slide-in">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-3 rounded-full bg-white/10 px-4 py-2 text-sm font-semibold text-white ring-1 ring-white/25 backdrop-blur animate-bounce">
                        <span class="inline-flex h-2.5 w-2.5 animate-pulse rounded-full bg-emerald-300"></span>
                        <span class="text-white-visible">God's Family Choir Admin Suite</span>
                    </div>
                    <div class="space-y-4">
                        <h1 class="text-4xl font-semibold leading-tight tracking-tight text-white-visible">
                            Welcome back, Maestro.
                        </h1>
                        <p class="text-base text-white-visible opacity-90">
                            Manage rehearsals, events, resources, and member updates from a unified, elegant control center. Your next great service starts here.
                        </p>
                    </div>
                    <dl class="grid grid-cols-1 gap-4 text-sm">
                        <div class="rounded-2xl bg-white/10 p-4 ring-1 ring-white/10 backdrop-blur">
                            <dt class="font-semibold uppercase tracking-wider text-indigo-200 text-white-visible">
                                Today
                            </dt>
                            <dd class="mt-2 flex items-center gap-2 text-lg font-medium text-white-visible">
                                <svg class="h-5 w-5 text-emerald-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19a7 7 0 1 0-7-7" />
                                </svg>
                                Keep rehearsals running on time and the music flowing.
                            </dd>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4 ring-1 ring-white/10 backdrop-blur">
                            <dt class="font-semibold uppercase tracking-wider text-indigo-200 text-white-visible">
                                Pro Tip
                            </dt>
                            <dd class="mt-2 flex items-center gap-2 text-lg font-medium text-white-visible">
                                <svg class="h-5 w-5 text-sky-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3a9 9 0 1 0 9 9" />
                                </svg>
                                Use quick actions from the dashboard to publish updates faster.
                            </dd>
                        </div>
                    </dl>
                </div>
                <div class="flex items-center justify-between text-xs text-white-visible opacity-70">
                    <span>Secured access · {{ now()->format('M d, Y') }}</span>
                    <span>@GF</span>
                </div>
            </div>

            <!-- Right Panel - Login Form -->
            <div class="flex w-full flex-1 items-center justify-center">
                <div class="w-full max-w-lg rounded-3xl form-container p-8 shadow-xl animate-slide-in delay-200">
                    <div class="mb-8 flex items-center justify-between animate-slide-in delay-300">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-visible animate-bounce">Admin Access</p>
                            <h2 class="mt-2 text-2xl font-semibold text-visible animate-slide-in delay-400">Sign in to continue</h2>
                            <p class="mt-1 text-sm text-slate-visible animate-slide-in delay-500">Use your choir admin credentials to unlock the dashboard.</p>
                        </div>
                        <a href="{{ route('home') }}" class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-gray-300 bg-white text-gray-500 transition hover:text-indigo-500" aria-label="Back to website">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>

                    @if (session('status'))
                        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-600">
                            We couldn't sign you in. Double-check your email and password, then try again.
                        </div>
                    @endif

                    <form id="admin-login-form" method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <div class="animate-slide-in delay-300">
                            <label for="email" class="text-sm font-semibold text-visible">Email address</label>
                            <div class="mt-2">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                       class="form-input input-focus block w-full rounded-2xl px-4 py-3 text-base shadow-sm transition focus:outline-none"
                                       placeholder="admin@choir.org">
                            </div>
                        </div>

                        <div class="animate-slide-in delay-400">
                            <div class="flex items-center justify-between text-sm">
                                <label for="password" class="font-semibold text-visible">Password</label>
                                @if (Route::has('password.request'))
                                    <a class="font-semibold text-indigo-visible hover:text-indigo-600" href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>
                            <div class="mt-2 relative">
                                <input id="password" type="password" name="password" required autocomplete="current-password"
                                       class="form-input input-focus peer block w-full rounded-2xl px-4 py-3 pr-12 text-base shadow-sm transition focus:outline-none"
                                       placeholder="Enter your password">
                                <button type="button" id="toggle-password"
                                        class="absolute inset-y-0 right-3 inline-flex items-center justify-center rounded-full p-2 text-gray-400 transition hover:text-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400"
                                        aria-label="Toggle password visibility">
                                    <svg data-state="visible" class="h-5 w-5 transition-opacity duration-150" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12s3.5-6 9-6 9 6 9 6-3.5 6-9 6-9-6-9-6z" />
                                        <circle cx="12" cy="12" r="2.5" />
                                    </svg>
                                    <svg data-state="hidden" class="hidden h-5 w-5 transition-opacity duration-150" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-5.5 0-10-7-10-7a21.526 21.526 0 015.186-5.835" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.878 9.878a3 3 0 104.242 4.242M15 15l5 5M3 3l5 5" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-visible">
                                <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <span>Keep me signed in</span>
                            </label>
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-visible">
                                Secure Login
                            </span>
                        </div>

                        <button type="submit"
                                class="btn-primary button-hover animate-slide-in delay-500 inline-flex w-full items-center justify-center gap-2 rounded-2xl px-5 py-3 text-sm font-semibold shadow-lg transition focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                            Sign in to dashboard
                        </button>
                    </form>

                    <div class="mt-8 rounded-2xl border border-gray-200 bg-white/80 p-5 text-sm text-slate-visible">
                        <div class="flex items-start gap-3">
                            <span class="mt-1 inline-flex h-7 w-7 items-center justify-center rounded-full bg-indigo-100 text-indigo-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c1.656 0 3-1.567 3-3.5S13.656 4 12 4s-3 1.567-3 3.5S10.344 11 12 11z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.5 20.5a6.5 6.5 0 0 1 13 0" />
                                </svg>
                            </span>
                            <div>
                                <p class="font-semibold text-visible">Need an account?</p>
                                <p class="mt-1 text-slate-visible">
                                    Admin credentials are issued by the choir leadership team. Contact your coordinator if you require access.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const form = document.getElementById('admin-login-form');
            const submitButton = form.querySelector('button[type="submit"]');

            // Password toggle functionality
            if (toggle && passwordInput) {
                const iconVisible = toggle.querySelector('svg[data-state="visible"]');
                const iconHidden = toggle.querySelector('svg[data-state="hidden"]');

                toggle.addEventListener('click', () => {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

                    if (iconVisible && iconHidden) {
                        iconVisible.classList.toggle('hidden', !isPassword);
                        iconHidden.classList.toggle('hidden', isPassword);
                    }
                });
            }

            // Enhanced form interactions
            const inputs = form.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.classList.add('animate-bounce');
                });

                input.addEventListener('blur', () => {
                    input.parentElement.classList.remove('animate-bounce');
                });
            });

            // Form submission animation
            form.addEventListener('submit', (e) => {
                submitButton.classList.add('animate-bounce');
                submitButton.innerHTML = `
                    <svg class="h-5 w-5 animate-spin" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Signing in...
                `;
            });

            // Add floating particles effect
            function createFloatingParticle() {
                const particle = document.createElement('div');
                particle.className = 'absolute w-2 h-2 bg-indigo-300 rounded-full opacity-20 animate-float';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 3 + 2) + 's';
                document.querySelector('.floating-shapes').appendChild(particle);

                setTimeout(() => {
                    particle.remove();
                }, 5000);
            }

            // Create particles periodically
            setInterval(createFloatingParticle, 2000);
        });
    </script>
@endpush
