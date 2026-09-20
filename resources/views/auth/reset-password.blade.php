@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="relative min-h-screen overflow-hidden">
    <img src="/images/gf-beg.jpg" alt="" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-emerald-950/85"></div>

    <div class="relative mx-auto flex min-h-screen max-w-lg items-center px-4 py-10 sm:px-6">
        <div class="w-full rounded-3xl bg-white p-8 shadow-2xl sm:p-10">
            <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-medium text-emerald-700 hover:text-emerald-800">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back to sign in
            </a>

            <h1 class="mt-6 text-2xl font-semibold text-slate-900">Create a new password</h1>
            <p class="mt-2 text-sm text-slate-500">Choose a password with at least 8 characters.</p>

            <form method="POST" action="{{ route('password.store') }}" class="mt-8 space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="text-sm font-semibold text-slate-800">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username"
                           class="mt-2 block w-full rounded-xl border border-slate-200 px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100"
                           placeholder="admin@choir.org">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="text-sm font-semibold text-slate-800">New password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="mt-2 block w-full rounded-xl border border-slate-200 px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100"
                           placeholder="Enter a new password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="text-sm font-semibold text-slate-800">Confirm password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="mt-2 block w-full rounded-xl border border-slate-200 px-4 py-3 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100"
                           placeholder="Repeat the new password">
                </div>

                <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-full bg-emerald-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-600">
                    Save new password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
