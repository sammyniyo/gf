@extends('layouts.app')

@section('title', 'Registration received | God\'s Family Choir')
@section('meta_description', 'Your God\'s Family Choir registration has been received.')

@php
    $member = session('member');
    $isChoirMember = $member && method_exists($member, 'isMember') && $member->isMember();
    $mainWhatsapp = config('choir.main_whatsapp');
@endphp

@section('content')
<div class="relative min-h-screen bg-white pt-28 pb-16 sm:pt-32">
    <div class="relative mx-auto max-w-2xl px-4 sm:px-5">
        <article class="overflow-hidden rounded-[28px] border border-slate-200/80 bg-white shadow-[0_24px_60px_-28px_rgba(15,23,42,0.28)]">
            <header class="border-b border-slate-100 bg-gradient-to-br from-emerald-50 via-white to-slate-50 px-5 py-8 text-center sm:px-7">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <p class="mt-4 text-[11px] font-semibold uppercase tracking-wider text-emerald-700">Registration received</p>
                <h1 class="mt-2 text-3xl font-semibold tracking-tight text-slate-900">
                    {{ $isChoirMember ? 'Welcome to the choir' : 'Welcome to God\'s Family' }}
                </h1>
                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-600">
                    {{ session('success') ?: 'Thank you. Check your email for the next steps.' }}
                </p>
            </header>

            <div class="space-y-5 p-5 sm:p-7">
                @if($isChoirMember)
                    <div class="rounded-2xl border border-amber-100 bg-amber-50 px-4 py-4 text-sm text-amber-900">
                        <p class="font-semibold">Pending confirmation</p>
                        <p class="mt-1 leading-6">We review member applications within 24–48 hours. You will get an email when you are confirmed.</p>
                    </div>
                @endif

                @if($member)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-5 text-center">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                            Your {{ $isChoirMember ? 'member' : 'friend' }} ID
                        </p>
                        <p class="mt-2 text-2xl font-semibold tracking-wide text-slate-900">{{ $member->member_id }}</p>
                        <p class="mt-1 text-xs text-slate-500">Save this code. You will need it later.</p>
                    </div>
                @endif

                <div>
                    <h2 class="text-sm font-semibold text-slate-900">What happens next</h2>
                    <ol class="mt-3 space-y-3 text-sm leading-6 text-slate-600">
                        <li class="flex gap-3">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-700 text-xs font-semibold text-white">1</span>
                            <span>Join the main God's Family WhatsApp group. Every new member and friend starts there.</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full {{ $isChoirMember ? 'bg-emerald-700' : 'bg-amber-500' }} text-xs font-semibold text-white">2</span>
                            <span>Check your email, including the spam folder.</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full {{ $isChoirMember ? 'bg-emerald-700' : 'bg-amber-500' }} text-xs font-semibold text-white">3</span>
                            <span>{{ $isChoirMember ? 'Wait for confirmation, then come to rehearsals.' : 'Stay close for concerts, programs, and ways to support the choir.' }}</span>
                        </li>
                    </ol>
                </div>

                @if($mainWhatsapp)
                    <div x-data="{ copied: false }" class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4">
                        <p class="text-sm font-semibold text-slate-900">We share this link</p>
                        <p class="mt-1 text-sm leading-6 text-slate-600">This is the main God's Family WhatsApp group. Open it, or copy the link if WhatsApp does not open.</p>
                        <p class="mt-3 break-all rounded-2xl border border-slate-200 bg-white px-4 py-3 font-mono text-xs text-slate-700">{{ $mainWhatsapp }}</p>
                        <div class="mt-3 grid gap-2 sm:grid-cols-2">
                            <button type="button"
                                @click="navigator.clipboard.writeText(@js($mainWhatsapp)).then(() => { copied = true; setTimeout(() => copied = false, 2000) })"
                                class="inline-flex min-h-[48px] items-center justify-center rounded-full border border-slate-200 bg-white px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                                <span x-text="copied ? 'Copied' : 'Copy link'"></span>
                            </button>
                            <a href="{{ $mainWhatsapp }}" target="_blank" rel="noopener"
                               class="inline-flex min-h-[48px] items-center justify-center gap-2 rounded-full bg-[#25D366] px-4 text-sm font-semibold text-white">
                                Open WhatsApp
                            </a>
                        </div>
                    </div>
                @endif

                @if($isChoirMember)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-4 text-sm text-slate-600">
                        <p class="font-semibold text-slate-900">Want the Active Choristers group?</p>
                        <p class="mt-1 leading-6">That group is only for people who read and accept the terms. It is not opened from this page.</p>
                        <a href="{{ route('active-choristers') }}" class="mt-3 inline-flex font-semibold text-emerald-700 underline">
                            Read the Active Choristers terms
                        </a>
                    </div>
                @endif

                @if($member)
                    <div class="grid gap-3 sm:grid-cols-2">
                        <a href="{{ route('member.id-card.download', $member) }}"
                           class="inline-flex min-h-[48px] items-center justify-center rounded-full bg-emerald-700 px-4 text-sm font-semibold text-white">
                            Download ID card
                        </a>
                        <a href="{{ route('member.confirmation.download', $member) }}"
                           class="inline-flex min-h-[48px] items-center justify-center rounded-full border border-slate-200 px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            Download confirmation
                        </a>
                    </div>
                @endif

                <div class="grid gap-3 sm:grid-cols-2">
                    <a href="{{ route('home') }}"
                       class="inline-flex min-h-[48px] items-center justify-center rounded-full border border-slate-200 px-4 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                        Back home
                    </a>
                    <a href="{{ route('events.index') }}"
                       class="inline-flex min-h-[48px] items-center justify-center rounded-full bg-amber-500 px-4 text-sm font-semibold text-white">
                        View events
                    </a>
                </div>
            </div>
        </article>
    </div>
</div>

<x-static.footer />
@endsection
