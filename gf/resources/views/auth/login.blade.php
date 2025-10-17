@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 p-4">
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row">

        <!-- Left Side - Animated Characters -->
        <div class="w-full md:w-1/2 bg-gradient-to-br from-slate-50 to-slate-100 p-8 md:p-12 flex items-center justify-center relative overflow-hidden">
            <div id="characters-container" class="relative w-full max-w-md aspect-square flex items-center justify-center">

                <!-- Purple Rectangle Character -->
                <div id="char-purple" class="absolute transition-all duration-500 ease-out" style="left: 25%; top: 15%; transform-origin: center;">
                    <div class="relative">
                        <div class="w-32 h-44 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl shadow-lg"></div>
                        <!-- Eyes -->
                        <div class="absolute top-12 left-0 right-0 flex justify-center gap-6">
                            <div class="char-eye w-3 h-3 bg-slate-900 rounded-full"></div>
                            <div class="char-eye w-3 h-3 bg-slate-900 rounded-full"></div>
                        </div>
                        <!-- Mouth -->
                        <div class="char-mouth absolute top-20 left-0 right-0 flex justify-center">
                            <div class="w-8 h-1 bg-slate-900 rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- Black Rectangle Character -->
                <div id="char-black" class="absolute transition-all duration-500 ease-out" style="left: 48%; top: 28%; transform-origin: center;">
                    <div class="relative">
                        <div class="w-24 h-32 bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-lg"></div>
                        <!-- Eyes -->
                        <div class="absolute top-8 left-0 right-0 flex justify-center gap-4">
                            <div class="char-eye w-3 h-3 bg-white rounded-full"></div>
                            <div class="char-eye w-3 h-3 bg-white rounded-full"></div>
                        </div>
                        <!-- Mouth -->
                        <div class="char-mouth absolute top-14 left-0 right-0 flex justify-center">
                            <div class="w-6 h-1 bg-white rounded-full"></div>
                        </div>
                    </div>
            </div>

                <!-- Orange Circle Character -->
                <div id="char-orange" class="absolute transition-all duration-500 ease-out" style="left: 8%; top: 52%; transform-origin: center;">
                    <div class="relative">
                        <div class="w-36 h-36 bg-gradient-to-br from-orange-400 to-orange-500 rounded-full shadow-lg"></div>
                        <!-- Eyes -->
                        <div class="absolute top-12 left-0 right-0 flex justify-center gap-8">
                            <div class="char-eye w-3 h-3 bg-slate-900 rounded-full"></div>
                            <div class="char-eye w-3 h-3 bg-slate-900 rounded-full"></div>
                        </div>
                        <!-- Mouth -->
                        <div class="char-mouth absolute top-20 left-0 right-0 flex justify-center">
                            <div class="w-10 h-1 bg-slate-900 rounded-full"></div>
                                </div>
                                </div>
                            </div>

                <!-- Yellow Blob Character -->
                <div id="char-yellow" class="absolute transition-all duration-500 ease-out" style="left: 55%; top: 55%; transform-origin: center;">
                    <div class="relative">
                        <div class="w-32 h-40 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-[40%_60%_70%_30%/60%_30%_70%_40%] shadow-lg"></div>
                        <!-- Eyes (just a line) -->
                        <div class="absolute top-16 left-0 right-0 flex justify-center">
                            <div class="char-mouth w-12 h-1 bg-slate-900 rounded-full"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex items-center justify-center">
            <div class="w-full max-w-md">

                <!-- Close Button (top-right) -->
                <div class="flex justify-end mb-6">
                    <a href="{{ route('home') }}" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </a>
                </div>

                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold text-slate-900 mb-2">Welcome back!</h1>
                    <p class="text-slate-500">Please enter your details</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl">
                        <p class="text-sm font-medium text-emerald-800">{{ session('status') }}</p>
                        </div>
                    @endif

                <!-- Login Form -->
                <form id="login-form" method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                    <!-- Email -->
                        <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                        <input
                            id="email"
                                   type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                            class="w-full px-4 py-3 bg-white border-b-2 border-slate-200 focus:border-slate-900 focus:outline-none transition-colors @error('email') border-rose-500 @enderror"
                            placeholder="anna@gmail.com"
                        >
                            @error('email')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                        <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                        <div class="relative">
                            <input
                                id="password"
                                   type="password"
                                   name="password"
                                   required
                                class="w-full px-4 py-3 bg-white border-b-2 border-slate-200 focus:border-slate-900 focus:outline-none transition-colors pr-12 @error('password') border-rose-500 @enderror"
                                placeholder="••••••••"
                            >
                            <button type="button" id="toggle-password" class="absolute right-2 top-1/2 -translate-y-1/2 p-2 text-slate-400 hover:text-slate-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                        </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-slate-600">
                            <input
                                type="checkbox"
                                       name="remember"
                                class="w-4 h-4 rounded border-slate-300 text-slate-900 focus:ring-slate-400"
                            >
                            <span>Remember for 30 days</span>
                            </label>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-slate-600 hover:text-slate-900 font-medium">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full py-3 bg-slate-900 text-white rounded-xl font-semibold hover:bg-slate-800 transition-colors shadow-lg shadow-slate-900/20"
                    >
                        Log in
                    </button>
                </form>

               
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
(function() {
    const hasErrors = {{ $errors->any() ? 'true' : 'false' }};
    const purple = document.getElementById('char-purple');
    const black = document.getElementById('char-black');
    const orange = document.getElementById('char-orange');
    const yellow = document.getElementById('char-yellow');

    // Character animation states
    function setNeutral() {
        if (!purple || !black || !orange || !yellow) return;

        // Reset positions and rotations
        purple.style.transform = 'rotate(0deg) scale(1)';
        black.style.transform = 'rotate(0deg) scale(1)';
        orange.style.transform = 'rotate(0deg) scale(1)';
        yellow.style.transform = 'rotate(0deg) scale(1)';

        // Normal eyes
        document.querySelectorAll('.char-eye').forEach(eye => {
            eye.style.height = '0.75rem';
            eye.style.marginTop = '0';
        });

        // Normal mouths
        document.querySelectorAll('.char-mouth').forEach(mouth => {
            mouth.style.transform = 'scaleY(1)';
        });
    }

    function setCrying() {
        if (!purple || !black || !orange || !yellow) return;

        // Sad tilts and movements
        purple.style.transform = 'rotate(-8deg) scale(0.95)';
        black.style.transform = 'rotate(5deg) scale(0.95)';
        orange.style.transform = 'rotate(-5deg) translateY(10px) scale(0.95)';
        yellow.style.transform = 'rotate(8deg) scale(0.95)';

        // Sad eyes (closed/squinting)
        document.querySelectorAll('.char-eye').forEach(eye => {
            eye.style.height = '0.25rem';
            eye.style.marginTop = '0.25rem';
        });

        // Sad mouths (curved down)
        document.querySelectorAll('.char-mouth').forEach(mouth => {
            mouth.style.transform = 'scaleY(-1)';
        });
    }

    function setHappy() {
        if (!purple || !black || !orange || !yellow) return;

        // Happy bounces
        purple.style.transform = 'rotate(5deg) scale(1.05) translateY(-8px)';
        black.style.transform = 'rotate(-3deg) scale(1.05) translateY(-5px)';
        orange.style.transform = 'rotate(3deg) scale(1.08) translateY(-10px)';
        yellow.style.transform = 'rotate(-5deg) scale(1.05) translateY(-6px)';

        // Happy eyes (wide)
        document.querySelectorAll('.char-eye').forEach(eye => {
            eye.style.height = '0.875rem';
            eye.style.marginTop = '0';
        });

        // Happy mouths (wide)
        document.querySelectorAll('.char-mouth').forEach((mouth, index) => {
            mouth.style.transform = 'scaleX(1.3) scaleY(1)';
        });
    }

    // Initial state
    if (hasErrors) {
        setCrying();
    } else {
        setNeutral();
    }

    // Password field - show anticipation
    const passwordInput = document.getElementById('password');
    if (passwordInput) {
        passwordInput.addEventListener('focus', function() {
            if (!hasErrors) {
                // Slight anticipation
                purple.style.transform = 'rotate(2deg) scale(1.02)';
                orange.style.transform = 'rotate(-2deg) scale(1.02)';
            }
        });

        passwordInput.addEventListener('blur', function() {
            if (!hasErrors) setNeutral();
        });
    }

    // Form submission - celebrate
    const form = document.getElementById('login-form');
    if (form) {
        form.addEventListener('submit', function() {
            setHappy();
        });
    }

    // Toggle password visibility
    const togglePassword = document.getElementById('toggle-password');
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
        });
    }
})();
</script>

<style>
    /* Smooth transitions for all character elements */
    .char-eye, .char-mouth {
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
</style>
@endpush
