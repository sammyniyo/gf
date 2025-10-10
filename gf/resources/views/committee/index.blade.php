@extends('layouts.app')

@section('title', 'Leadership | God\'s Family Choir')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-slate-100">
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-100 via-white to-slate-100"></div>
    <div class="absolute -top-32 -left-20 h-72 w-72 rounded-full bg-indigo-200/50 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-80 w-80 rounded-full bg-sky-200/60 blur-3xl"></div>

    <section class="relative z-10 px-6 pt-32 pb-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-white/70 px-4 py-1 text-xs font-semibold uppercase tracking-[0.32em] text-indigo-600 shadow-sm">
                Our Leadership
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                Meet the minds behind <span class="bg-gradient-to-r from-indigo-600 to-sky-500 bg-clip-text text-transparent">God's Family</span>
            </h1>
            <p class="mx-auto mt-6 max-w-3xl text-lg text-slate-600">
                The dedicated leaders who guide our choir's mission and ensure every voice is heard in harmony
            </p>
        </div>
    </section>
</div>

<!-- Committee Section -->
<section class="relative bg-slate-50 py-24">
    <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        @if($committees->count() > 0)
            <!-- Departments -->
            <div class="space-y-20">
                @foreach($departments as $department)
                    @if($committees->has($department))
                        <div>
                            <!-- Department Header -->
                            <div class="mb-12 text-center">
                                <div class="inline-flex items-center gap-3 rounded-full border border-indigo-200 bg-white/80 px-5 py-2 shadow-sm backdrop-blur">
                                    <svg class="h-5 w-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    <span class="text-sm font-semibold text-slate-900">{{ $department }}</span>
                                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-indigo-100 text-xs font-bold text-indigo-600">
                                        {{ $committees[$department]->count() }}
                                    </span>
                                </div>
                            </div>

                            <!-- Committee Members Grid -->
                            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                                @foreach($committees[$department] as $member)
                                    <div class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white/80 backdrop-blur transition-all duration-300 hover:shadow-xl hover:shadow-indigo-100/50">
                                        <!-- Photo Section -->
                                        <div class="relative h-72 overflow-hidden bg-gradient-to-br from-indigo-100 to-slate-100">
                                            @if($member->photo)
                                                <img src="{{ Storage::url($member->photo) }}"
                                                     alt="{{ $member->name }}"
                                                     class="h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-105">
                                            @else
                                                <div class="flex h-full w-full items-center justify-center">
                                                    <div class="flex h-32 w-32 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-sky-500 shadow-lg">
                                                        <span class="text-5xl font-bold text-white">
                                                            {{ substr($member->name, 0, 1) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif

                                            <!-- Overlay gradient -->
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                                        </div>

                                        <!-- Content Section -->
                                        <div class="p-6">
                                            <!-- Position Badge -->
                                            <div class="mb-3">
                                                <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-600">
                                                    {{ $member->position }}
                                                </span>
                                            </div>

                                            <!-- Name -->
                                            <h3 class="mb-2 text-xl font-bold text-slate-900 transition-colors group-hover:text-indigo-600">
                                                {{ $member->name }}
                                            </h3>

                                            <!-- Bio -->
                                            @if($member->bio)
                                                <p class="mb-4 line-clamp-2 text-sm leading-relaxed text-slate-600">
                                                    {{ $member->bio }}
                                                </p>
                                            @endif

                                            <!-- Contact Info -->
                                            <div class="space-y-2 border-t border-slate-100 pt-4">
                                                @if($member->email)
                                                    <a href="mailto:{{ $member->email }}"
                                                       class="group/email flex items-center gap-2 text-sm text-slate-600 transition-colors hover:text-indigo-600">
                                                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100 transition-colors group-hover/email:bg-indigo-100">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                        <span class="truncate text-xs">{{ $member->email }}</span>
                                                    </a>
                                                @endif

                                                @if($member->phone)
                                                    <a href="tel:{{ $member->phone }}"
                                                       class="group/phone flex items-center gap-2 text-sm text-slate-600 transition-colors hover:text-indigo-600">
                                                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100 transition-colors group-hover/phone:bg-indigo-100">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                            </svg>
                                                        </div>
                                                        <span class="text-xs">{{ $member->phone }}</span>
                                                    </a>
                                                @endif
                                            </div>

                                            <!-- Social Links -->
                                            @if($member->formatted_social_links && count($member->formatted_social_links) > 0)
                                                <div class="mt-4 flex gap-2 border-t border-slate-100 pt-4">
                                                    @foreach($member->formatted_social_links as $social)
                                                        <a href="{{ $social['url'] }}"
                                                           target="_blank"
                                                           rel="noopener noreferrer"
                                                           class="flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-slate-600 transition-all hover:bg-indigo-100 hover:text-indigo-600 hover:scale-110"
                                                           title="{{ $social['platform'] }}">
                                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                                                <path d="{{ $social['icon'] }}"/>
                                                            </svg>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="mx-auto max-w-md rounded-3xl border border-slate-200 bg-white/80 p-12 text-center shadow-lg backdrop-blur">
                <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-br from-indigo-100 to-sky-100">
                    <svg class="h-10 w-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-2xl font-bold text-slate-900">Committee Coming Soon</h3>
                <p class="text-sm text-slate-600">
                    We're currently updating our leadership information. Check back soon to meet our amazing committee members!
                </p>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-500 to-sky-500 py-24">
    <div class="absolute inset-0 bg-grid-white/10"></div>
    <div class="relative mx-auto max-w-4xl px-6 text-center">
        <h2 class="text-4xl font-bold text-white sm:text-5xl">Interested in Leadership?</h2>
        <p class="mx-auto mt-6 max-w-2xl text-lg text-indigo-100">
            We're always looking for dedicated members to help guide our mission. Join us in making a difference through music and worship.
        </p>
        <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:justify-center">
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-8 py-4 text-base font-semibold text-indigo-600 shadow-lg transition hover:bg-indigo-50">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact Us
            </a>
            <a href="{{ route('choir.register.form') }}"
               class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white px-8 py-4 text-base font-semibold text-white transition hover:bg-white/10">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Join Our Choir
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.static.footer')

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.bg-grid-white\/10 {
    background-image:
        linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
    background-size: 3rem 3rem;
}
</style>
@endsection
