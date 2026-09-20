@extends('layouts.app')

@section('title', 'Leadership | God\'s Family Choir')
@section('meta_description', 'Meet the leadership and committee of God\'s Family Choir: presidency, coaching, fellowship, and the teams who serve the ministry.')
@section('canonical_url', route('committee.index'))
@section('og:title', 'Leadership | God\'s Family Choir')
@section('og:description', 'The people who guide God\'s Family Choir in worship, coaching, and service.')
@section('og:url', route('committee.index'))

@php
    $visibleDepartments = collect($departments)
        ->merge($committees->keys())
        ->unique()
        ->filter(fn ($department) => $committees->has($department) && $committees[$department]->isNotEmpty())
        ->values();
@endphp

@section('content')
<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32">
    <div class="mx-auto max-w-6xl px-4 sm:px-5">
        <div class="mb-8 text-center">
            <p class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-[11px] font-semibold uppercase tracking-wide text-emerald-700">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-600"></span>
                Leadership
            </p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">The hearts behind the choir</h1>
            <p class="mx-auto mt-2 max-w-xl text-sm leading-6 text-slate-600 sm:text-base">
                The committee that stewards worship, coaching, fellowship, and the day-to-day life of God’s Family.
            </p>
        </div>

        @if(filled($pageNotice ?? null))
            <p class="mx-auto mb-8 max-w-2xl border-y border-emerald-100 bg-emerald-50/80 px-4 py-3 text-center text-sm leading-6 text-emerald-800 sm:rounded-2xl sm:border">
                {{ $pageNotice }}
            </p>
        @endif

        @if($visibleDepartments->isNotEmpty())
            <div class="sticky top-[4.5rem] z-20 -mx-4 mb-10 border-b border-slate-100 bg-white/90 px-4 py-3 backdrop-blur sm:top-20 sm:mx-0 sm:rounded-2xl sm:border sm:border-slate-200/80 sm:px-4">
                <div class="-mx-1 flex gap-2 overflow-x-auto px-1 sm:flex-wrap sm:justify-center sm:overflow-visible">
                    @foreach($visibleDepartments as $department)
                        <a href="#{{ \Illuminate\Support\Str::slug($department) }}"
                           class="inline-flex min-h-[36px] shrink-0 items-center rounded-full border border-slate-200 bg-white px-3 text-sm font-medium text-slate-600 transition hover:border-emerald-200 hover:text-emerald-700">
                            {{ $department }}
                            <span class="ml-1.5 text-xs text-slate-400">{{ $committees[$department]->count() }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="space-y-12">
                @foreach($visibleDepartments as $department)
                    @include('committee.partials.section', [
                        'department' => $department,
                        'members' => $committees[$department],
                    ])
                @endforeach
            </div>
        @else
            <article class="mx-auto max-w-lg rounded-[28px] border border-slate-200/80 bg-white p-8 text-center shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Coming soon</p>
                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900">Leadership profiles are being updated</h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">Check back shortly, or write to the choir office if you need someone now.</p>
                <a href="{{ route('contact') }}"
                   class="mt-6 inline-flex min-h-[48px] items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white hover:bg-emerald-600">
                    Write to us
                </a>
            </article>
        @endif

        <div class="mt-16 rounded-[28px] border border-slate-200 bg-slate-50 px-5 py-8 text-center sm:px-8">
            <h2 class="text-xl font-semibold tracking-tight text-slate-900">Want to serve with us?</h2>
            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600">
                Register as a member, or send a note if you want to help behind the scenes.
            </p>
            <div class="mt-5 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="{{ route('registration.member') }}"
                   class="inline-flex min-h-[48px] items-center justify-center rounded-full bg-emerald-700 px-5 text-sm font-semibold text-white hover:bg-emerald-600">
                    Join the choir
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-flex min-h-[48px] items-center justify-center rounded-full border border-slate-200 bg-white px-5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Contact the office
                </a>
            </div>
        </div>
    </div>
</div>

<x-static.footer />
@endsection
