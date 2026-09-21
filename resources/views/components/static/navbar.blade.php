@php
    $isHome = request()->is('/');
    $aboutActive = request()->is('about*') || request()->is('story*') || request()->is('committee*')
        || request()->is('devotions*') || request()->is('utility-folder*') || request()->is('resources*');
    $navLink = 'inline-flex items-center gap-1 whitespace-nowrap rounded-full px-2.5 py-2 text-sm font-medium text-white/90 transition hover:bg-white/10 hover:text-white';
    $navActive = 'bg-white/15 text-amber-100 hover:bg-white/20 hover:text-amber-50';
    $dropPanel = 'absolute top-full z-50 mt-2 w-64 overflow-hidden rounded-xl border border-emerald-100 bg-white py-1.5 text-slate-700 shadow-xl';
    $activeChoristersOpen = \App\Models\PageSettings::activeChoristersRegistrationOpen();
@endphp

<header
    class="pointer-events-none fixed inset-x-0 top-0 z-50"
    x-data="{
        mobileMenuOpen: false,
        scrolled: {{ $isHome ? 'false' : 'true' }},
        openMenu: null
    }"
    x-init="
        const onScroll = () => { scrolled = {{ $isHome ? 'window.scrollY > 24' : 'true' }}; };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    "
    @keydown.escape.window="openMenu = null; mobileMenuOpen = false">
    <div class="pointer-events-auto mx-auto mt-3 w-[calc(100%-1.5rem)] max-w-4xl sm:mt-4 sm:w-[calc(100%-2rem)]">
        <div class="rounded-2xl text-white transition-all duration-300"
             :class="(scrolled || mobileMenuOpen)
                ? 'bg-emerald-800/95 shadow-xl shadow-black/20 ring-1 ring-white/10 backdrop-blur-md'
                : 'bg-white/10 shadow-lg ring-1 ring-white/20 backdrop-blur-md'">
            <div class="flex h-14 items-center justify-between gap-2 px-3 sm:px-4">
                <a href="{{ route('home') }}" class="group flex min-w-0 shrink-0 items-center gap-3">
                    <img src="{{ asset('adventist-en--white.png') }}" alt="God's Family Choir" class="h-8 w-8 object-contain transition-transform duration-300 group-hover:scale-105 sm:h-9 sm:w-9">
                    <span class="min-w-0">
                        <span class="block truncate text-base font-semibold tracking-tight text-amber-100">God's Family Choir</span>
                        <span class="hidden text-[11px] font-medium text-emerald-200/90 sm:block">Voices United in Praise</span>
                    </span>
                </a>

                <nav class="hidden items-center gap-0.5 lg:flex">
                    <a href="{{ route('home') }}" class="{{ $navLink }} {{ request()->is('/') ? $navActive : '' }}">Home</a>

                    <div class="relative"
                         @mouseenter="openMenu = 'about'"
                         @mouseleave="openMenu = openMenu === 'about' ? null : openMenu"
                         @click.outside="openMenu === 'about' && (openMenu = null)">
                        <button type="button" @click.stop="openMenu = 'about'" class="{{ $navLink }} {{ $aboutActive ? $navActive : '' }}" :aria-expanded="openMenu === 'about'">
                            About
                            <svg class="h-3.5 w-3.5 transition-transform" :class="{ 'rotate-180': openMenu === 'about' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openMenu === 'about'" x-cloak
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="{{ $dropPanel }} left-0">
                            <a href="{{ route('about') }}" class="block px-4 py-2.5 hover:bg-emerald-50 {{ request()->is('about*') ? 'bg-emerald-50' : '' }}">
                                <span class="block text-sm font-semibold text-slate-900">The choir</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Who we are and our mission</span>
                            </a>
                            <a href="{{ route('story') }}" class="block px-4 py-2.5 hover:bg-emerald-50 {{ request()->is('story*') ? 'bg-emerald-50' : '' }}">
                                <span class="block text-sm font-semibold text-slate-900">Stories</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Voices from the family</span>
                            </a>
                            <a href="{{ route('committee.index') }}" class="block px-4 py-2.5 hover:bg-emerald-50 {{ request()->is('committee*') ? 'bg-emerald-50' : '' }}">
                                <span class="block text-sm font-semibold text-slate-900">Leadership</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Committee and ministry leads</span>
                            </a>
                            <div class="my-1 border-t border-slate-100"></div>
                            <a href="{{ route('devotions.index') }}" class="block px-4 py-2.5 hover:bg-emerald-50 {{ request()->is('devotions*') ? 'bg-emerald-50' : '' }}">
                                <span class="block text-sm font-semibold text-slate-900">Devotions</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Reflections for the week</span>
                            </a>
                            <a href="{{ route('resources.index') }}" class="block px-4 py-2.5 hover:bg-emerald-50 {{ request()->is('utility-folder*') || request()->is('resources*') ? 'bg-emerald-50' : '' }}">
                                <span class="block text-sm font-semibold text-slate-900">Resources</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Scores and study materials</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('events.index') }}" class="{{ $navLink }} {{ request()->is('events*') ? $navActive : '' }}">Events</a>
                    <a href="{{ route('shop.index') }}" class="{{ $navLink }} {{ request()->is('shop*') ? $navActive : '' }}">Music</a>
                    <a href="{{ route('contact') }}" class="{{ $navLink }} {{ request()->is('contact*') ? $navActive : '' }}">Contact</a>
                </nav>

                <div class="flex shrink-0 items-center gap-2">
                    <div class="relative hidden lg:block"
                         @mouseenter="openMenu = 'join'"
                         @mouseleave="openMenu = openMenu === 'join' ? null : openMenu"
                         @click.outside="openMenu === 'join' && (openMenu = null)">
                        <button type="button" @click.stop="openMenu = 'join'"
                            class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-amber-500 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-400"
                            :aria-expanded="openMenu === 'join'">
                            Join Us
                            <svg class="h-3.5 w-3.5 transition-transform" :class="{ 'rotate-180': openMenu === 'join' }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openMenu === 'join'" x-cloak
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="{{ $dropPanel }} right-0">
                            <a href="{{ route('registration.member') }}" class="block px-4 py-3 hover:bg-emerald-50">
                                <span class="block text-sm font-semibold text-slate-900">Join the Choir</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Register and join the main group</span>
                            </a>
                            <a href="{{ route('registration.friendship') }}" class="block px-4 py-3 hover:bg-amber-50">
                                <span class="block text-sm font-semibold text-slate-900">Become a Friend</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Support our ministry</span>
                            </a>
                            @if($activeChoristersOpen)
                            <a href="{{ route('active-choristers') }}" class="block px-4 py-3 hover:bg-emerald-50">
                                <span class="block text-sm font-semibold text-slate-900">Active Choristers</span>
                                <span class="mt-0.5 block text-xs text-slate-500">Accept the terms to join that group</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <button type="button"
                        @click="mobileMenuOpen = !mobileMenuOpen; openMenu = null"
                        class="inline-flex items-center justify-center rounded-lg p-2 text-white hover:bg-white/10 lg:hidden"
                        aria-label="Toggle menu">
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div x-show="mobileMenuOpen" x-cloak
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="border-t border-white/10 lg:hidden">
                <div class="max-h-[70vh] space-y-1 overflow-y-auto px-3 py-3">
                    <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->is('/') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Home</a>

                    <p class="px-3 pt-3 text-[11px] font-semibold uppercase tracking-wider text-emerald-200">About</p>
                    <a href="{{ route('about') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('about*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">The choir</a>
                    <a href="{{ route('story') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('story*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Stories</a>
                    <a href="{{ route('committee.index') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('committee*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Leadership</a>
                    <a href="{{ route('devotions.index') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('devotions*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Devotions</a>
                    <a href="{{ route('resources.index') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('utility-folder*') || request()->is('resources*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Resources</a>

                    <p class="px-3 pt-3 text-[11px] font-semibold uppercase tracking-wider text-emerald-200">Listen</p>
                    <a href="{{ route('events.index') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('events*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Events</a>
                    <a href="{{ route('shop.index') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2 text-sm {{ request()->is('shop*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Music</a>
                    <a href="{{ route('contact') }}" @click="mobileMenuOpen = false" class="block rounded-lg px-3 py-2.5 text-sm font-medium {{ request()->is('contact*') ? 'bg-white/15 text-amber-100' : 'text-white hover:bg-white/10' }}">Contact</a>
                </div>
                <div class="space-y-2 border-t border-white/10 px-3 py-4">
                    <a href="{{ route('registration.member') }}" @click="mobileMenuOpen = false" class="block rounded-xl bg-emerald-600 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-emerald-500">Join the Choir</a>
                    <a href="{{ route('registration.friendship') }}" @click="mobileMenuOpen = false" class="block rounded-xl bg-amber-500 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-amber-400">Become a Friend</a>
                    @if($activeChoristersOpen)
                    <a href="{{ route('active-choristers') }}" @click="mobileMenuOpen = false" class="block rounded-xl border border-white/20 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-white/10">Active Choristers</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
