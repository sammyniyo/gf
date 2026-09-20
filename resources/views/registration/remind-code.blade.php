@extends('layouts.app')

@section('title', 'Remind my registration code | God\'s Family Choir')
@section('meta_description', 'Get your God\'s Family Choir member or friend registration code by email.')

@section('content')
<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32">
    <div class="relative mx-auto max-w-lg px-4 sm:px-5">
        <div class="mb-8 text-center">
            <p class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-700">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                Already registered
            </p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900">Remind my code</h1>
            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600">
                Enter the email you used to register. We will send your member or friend ID.
            </p>
        </div>

        <article class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
            <form method="POST" action="{{ route('registration.remind-code.send') }}" class="space-y-5 p-5 sm:p-7">
                @csrf

                @if (session('success'))
                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                        {{ session('error') }}
                    </div>
                @endif

                <label class="block">
                    <span class="mb-1.5 block text-sm font-medium text-slate-700">Email</span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="min-h-[48px] w-full rounded-2xl border border-slate-200 bg-white px-4 text-sm outline-none ring-emerald-600/20 focus:border-emerald-600 focus:ring-4">
                    @error('email')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </label>

                <button type="submit"
                    class="inline-flex min-h-[52px] w-full items-center justify-center rounded-full bg-emerald-700 text-sm font-semibold text-white">
                    Email me my code
                </button>
            </form>
        </article>

        <p class="mt-6 text-center text-sm text-slate-500">
            Back to
            <a href="{{ route('registration.member') }}" class="font-semibold text-emerald-700 underline">member</a>
            or
            <a href="{{ route('registration.friendship') }}" class="font-semibold text-amber-700 underline">friend</a>
            registration.
        </p>
    </div>
</div>

<x-static.footer />
@endsection
