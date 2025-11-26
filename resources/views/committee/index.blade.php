@extends('layouts.app')

@section('title', 'Leadership & Committee | God\'s Family Choir')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-amber-200/30 blur-3xl"></div>

    <section class="relative z-10 px-6 pt-32 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-lg">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
                Leadership Team
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                The Hearts Behind  <span class="bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text text-transparent">God's Family</span>
            </h1>
            <p class="mx-auto mt-6 max-w-3xl text-lg text-gray-600 leading-relaxed">
                Meet the passionate leaders and dedicated committee members who guide our ministry, nurture talent, and create unity through worship
            </p>
        </div>
    </section>
</div>

<!-- Committee Section -->
<section class="relative bg-white py-24">
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-white to-gray-50"></div>

    <div class="relative mx-auto max-w-7xl px-6 sm:px-8 lg:px-12">
        @if($committees->count() > 0)
            <!-- Departments -->
            <div class="space-y-24">
                @foreach($departments as $department)
                    @if($committees->has($department))
                        <div>
                            <!-- Department Header -->
                            <div class="mb-14 text-center">
                                <div class="inline-flex flex-col items-center gap-4">
                                    <div class="inline-flex items-center gap-3 rounded-2xl border-2 border-emerald-200 bg-white px-6 py-3 shadow-lg">
                                        <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-md">
                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <h2 class="text-2xl font-bold text-gray-900">{{ $department }}</h2>
                                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 text-sm font-bold text-white shadow-md">
                                            {{ $committees[$department]->count() }}
                                        </span>
                                    </div>
                                    <div class="h-1 w-24 bg-gradient-to-r from-emerald-500 to-amber-500 rounded-full"></div>
                                </div>
                            </div>

                            <!-- Committee Members Grid -->
                            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center">
                                @foreach($committees[$department] as $member)
                                    <div class="group relative w-full max-w-sm">
                                        <div class="relative overflow-hidden rounded-2xl border-2 border-gray-200 bg-white shadow-lg transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 hover:border-emerald-300">
                                            <!-- Photo Section -->
                                            <div class="relative h-80 overflow-hidden bg-gradient-to-br from-emerald-50 to-gray-100">
                                                @if($member->photo)
                                                    <img src="{{ Storage::url($member->photo) }}"
                                                         alt="{{ $member->name }}"
                                                         class="h-full w-full object-cover object-center transition-transform duration-700 group-hover:scale-110">
                                                @else
                                                    <div class="flex h-full w-full items-center justify-center">
                                                        <div class="relative">
                                                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-full blur-2xl opacity-40 animate-pulse"></div>
                                                            <div class="relative flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 shadow-2xl">
                                                                <span class="text-6xl font-bold text-white">
                                                                    {{ substr($member->name, 0, 1) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <!-- Stylish Overlay -->
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>

                                                <!-- Position Badge on Photo -->
                                                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                                    <div class="bg-white/95 backdrop-blur-sm rounded-xl px-3 py-2 shadow-lg">
                                                        <p class="text-xs font-bold text-emerald-600">{{ $member->position }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Content Section -->
                                            <div class="p-6">
                                                <!-- Name -->
                                                <h3 class="mb-3 text-xl font-bold text-gray-900 transition-colors group-hover:text-emerald-600">
                                                    {{ $member->name }}
                                                </h3>

                                                <!-- Position Badge -->
                                                <div class="mb-3">
                                                    <span class="inline-flex items-center rounded-lg bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700 border border-emerald-200">
                                                        {{ $member->position }}
                                                    </span>
                                                </div>

                                                <!-- Bio -->
                                                @if($member->bio)
                                                    <p class="mb-4 line-clamp-3 text-sm leading-relaxed text-gray-600">
                                                        {{ $member->bio }}
                                                    </p>
                                                @else
                                                    <p class="mb-4 text-sm text-gray-500 italic">
                                                        Dedicated to serving God's Family Choir
                                                    </p>
                                                @endif

                                                <!-- Social Links -->
                                                @if($member->formatted_social_links && count($member->formatted_social_links) > 0)
                                                    <div class="mt-4 flex gap-2 border-t border-gray-100 pt-4">
                                                        @foreach($member->formatted_social_links as $social)
                                                            <a href="{{ $social['url'] }}"
                                                               target="_blank"
                                                               rel="noopener noreferrer"
                                                               class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-100 text-gray-600 transition-all hover:bg-emerald-500 hover:text-white hover:scale-110 hover:shadow-md"
                                                               title="{{ $social['platform'] }}">
                                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="{{ $social['icon'] }}"/>
                                                                </svg>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Decorative corner accent -->
                                            <div class="absolute top-0 left-0 w-20 h-20 bg-gradient-to-br from-emerald-500/10 to-transparent rounded-br-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
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
            <div class="mx-auto max-w-lg rounded-3xl border-2 border-emerald-200 bg-white p-12 text-center shadow-xl">
                <div class="mx-auto mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-emerald-100 to-emerald-50">
                    <svg class="h-12 w-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="mb-3 text-3xl font-bold text-gray-900">Committee Information Coming Soon</h3>
                <p class="text-base text-gray-600 leading-relaxed">
                    We're currently updating our leadership profiles. Check back soon to meet the amazing individuals who guide God's Family Choir!
                </p>
                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contact Us for More Info
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="relative overflow-hidden bg-gradient-to-br from-emerald-600 via-emerald-500 to-teal-500 py-24">
    <div class="absolute inset-0 bg-grid-white/10"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-white/5 rounded-full blur-3xl"></div>

    <div class="relative mx-auto max-w-4xl px-6 text-center">
        <div class="inline-flex items-center gap-2 rounded-full bg-white/20 backdrop-blur-sm px-4 py-2 text-xs font-bold uppercase tracking-wide text-white mb-6">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
            Join Our Team
        </div>

        <h2 class="text-4xl font-bold text-white sm:text-5xl">Become Part of Our Leadership</h2>
        <p class="mx-auto mt-6 max-w-2xl text-lg text-emerald-50 leading-relaxed">
            We're always looking for passionate, dedicated individuals to help guide our ministry. Whether you have musical expertise, organizational skills, or a heart for service—there's a place for you.
        </p>

        <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:justify-center">
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-8 py-4 text-base font-semibold text-emerald-600 shadow-xl hover:shadow-2xl transition-all hover:scale-105">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Get in Touch
            </a>
            <a href="{{ route('choir.register.form') }}"
               class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white px-8 py-4 text-base font-semibold text-white transition-all hover:bg-white/10 hover:scale-105">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
                Join the Choir
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.static.footer')

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
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
