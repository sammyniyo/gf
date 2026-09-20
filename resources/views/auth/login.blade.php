@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')
<div class="relative min-h-screen overflow-hidden">
    <img src="/images/gf-beg.jpg" alt="" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-emerald-950/85"></div>

    <div class="relative mx-auto flex min-h-screen max-w-md items-center px-4 py-10 sm:px-6">
        <div class="w-full rounded-3xl bg-white p-8 shadow-2xl sm:p-10">
            <div class="flex items-start justify-between gap-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-emerald-800">
                        <img src="/adventist-en--white.png" alt="" class="h-6 w-6 object-contain">
                    </span>
                    <span>
                        <span class="block text-sm font-semibold text-slate-900">God's Family Choir</span>
                        <span class="block text-xs text-slate-500">Admin</span>
                    </span>
                </a>
                <a href="{{ route('home') }}" class="text-sm font-medium text-emerald-700 hover:text-emerald-800">
                    Website
                </a>
            </div>

            <h1 class="mt-8 text-2xl font-semibold text-slate-900">Sign in</h1>
            <p class="mt-1 text-sm text-slate-500">Use your admin email and password.</p>

            @if (session('status'))
                <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    We couldn't sign you in. Check your email and password, then try again.
                </div>
            @endif

            <form id="admin-login-form" method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="email" class="text-sm font-semibold text-slate-800">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="mt-2 block w-full rounded-xl border border-slate-200 px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100"
                           placeholder="admin@choir.org">
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-sm font-semibold text-slate-800">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-sm font-medium text-emerald-700 hover:text-emerald-800" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    <div class="relative mt-2">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="block w-full rounded-xl border border-slate-200 px-4 py-3 pr-12 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100"
                               placeholder="Enter your password">
                        <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-2 inline-flex items-center justify-center rounded-lg px-2 text-slate-400 hover:text-emerald-700"
                                aria-label="Show password">
                            <svg data-state="visible" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12s3.5-6 9-6 9 6 9 6-3.5 6-9 6-9-6-9-6z" />
                                <circle cx="12" cy="12" r="2.5" />
                            </svg>
                            <svg data-state="hidden" class="hidden h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-5.5 0-10-7-10-7a21.526 21.526 0 015.186-5.835" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.878 9.878a3 3 0 104.242 4.242M15 15l5 5M3 3l5 5" />
                            </svg>
                        </button>
                    </div>
                </div>

                <label for="remember_me" class="inline-flex items-center gap-2 text-sm text-slate-600">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-emerald-700 focus:ring-emerald-500">
                    <span>Keep me signed in</span>
                </label>

                <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-600">
                    Sign in
                </button>
            </form>
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

        if (toggle && passwordInput) {
            const iconVisible = toggle.querySelector('svg[data-state="visible"]');
            const iconHidden = toggle.querySelector('svg[data-state="hidden"]');

            toggle.addEventListener('click', () => {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                toggle.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
                if (iconVisible && iconHidden) {
                    iconVisible.classList.toggle('hidden', isPassword);
                    iconHidden.classList.toggle('hidden', !isPassword);
                }
            });
        }

        form.addEventListener('submit', () => {
            submitButton.disabled = true;
            submitButton.textContent = 'Signing in…';
        });
    });
</script>
@endpush
