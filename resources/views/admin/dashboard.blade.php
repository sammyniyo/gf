@extends('admin.layout')

@section('page-title', 'Dashboard')

@php
    $upcomingRatio = $total_events > 0 ? round(($upcoming_events / $total_events) * 100) : 0;
    $recentRegistrationCount = $recent_registrations->count();
    $recentMemberCount = $recent_members->count();
    $registrationPulse = $recent_registrations->sum('tickets');
    $recentContactsCollection = $recent_contacts ?? collect();
    $recentMessagesCount = $recentContactsCollection->count();
    $trendLabels = $registrationTrend['labels'] ?? [];
    $trendTotals = $registrationTrend['totals'] ?? [];

    $timelineItems = collect();

    foreach ($recent_registrations as $registration) {
        $timelineItems->push([
            'type' => 'registration',
            'title' => 'New event registration',
            'name' => $registration->name,
            'meta' => $registration->event->name ?? 'Event archived',
            'tickets' => $registration->tickets,
            'time' => $registration->created_at,
        ]);
    }

    foreach ($recent_members as $member) {
        $timelineItems->push([
            'type' => 'member',
            'title' => 'New choir member',
            'name' => trim($member->first_name . ' ' . $member->last_name),
            'meta' => $member->voice_part ? "{$member->voice_part} section" : 'Awaiting voice assignment',
            'time' => $member->created_at,
        ]);
    }

    $timelineItems = $timelineItems->sortByDesc('time')->take(6);
@endphp

@section('content')
<div class="space-y-6">
    <!-- Important Notifications -->
    @if($unread_contacts_count > 0 || $upcoming_events > 0)
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @if($unread_contacts_count > 0)
                <a href="{{ route('admin.contacts.index') }}" class="p-6 bg-gradient-to-br from-rose-50 via-red-50 to-pink-50 rounded-2xl shadow-xl border-2 border-rose-200 hover:scale-105 hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-rose-500 to-red-600 shadow-lg">
                            <svg class="w-8 h-8 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-rose-600 uppercase tracking-wide">Unread Messages</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-4xl font-black text-rose-900">{{ $unread_contacts_count }}</span>
                                <span class="text-xs text-rose-600 font-semibold">new</span>
                            </div>
                            <p class="text-xs text-rose-600 mt-1 font-medium">Click to view messages</p>
                        </div>
                    </div>
                </a>
            @endif

            @if($upcoming_events > 0)
                <a href="{{ route('admin.events.index') }}" class="p-6 bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50 rounded-2xl shadow-xl border-2 border-indigo-200 hover:scale-105 hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-indigo-600 uppercase tracking-wide">Upcoming Events</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-4xl font-black text-indigo-900">{{ $upcoming_events }}</span>
                                <span class="text-xs text-indigo-600 font-semibold">scheduled</span>
                            </div>
                            <p class="text-xs text-indigo-600 mt-1 font-medium">Events to manage</p>
                        </div>
                    </div>
                </a>
            @endif

            @if($total_members > 0)
                <a href="{{ route('admin.members.index') }}" class="p-6 bg-gradient-to-br from-emerald-50 via-green-50 to-teal-50 rounded-2xl shadow-xl border-2 border-emerald-200 hover:scale-105 hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-500 to-green-600 shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-emerald-600 uppercase tracking-wide">Active Members</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-4xl font-black text-emerald-900">{{ $total_members }}</span>
                                <span class="text-xs text-emerald-600 font-semibold">total</span>
                            </div>
                            <p class="text-xs text-emerald-600 mt-1 font-medium">Choir community</p>
                        </div>
                    </div>
                </a>
            @endif
            </div>
    @endif

    <!-- Events Calendar -->
    <div class="glass-card p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    Events Calendar
                </h2>
                <p class="text-sm text-slate-600 mt-1">View all upcoming and past events</p>
            </div>
            <a href="{{ route('admin.events.create') }}"
                class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Event
            </a>
        </div>

        <!-- Calendar Legend -->
        <div class="flex flex-wrap gap-3 mb-4 p-4 bg-slate-50 rounded-xl">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" style="background-color: #8b5cf6;"></div>
                <span class="text-xs font-medium text-slate-700">Concert</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" style="background-color: #3b82f6;"></div>
                <span class="text-xs font-medium text-slate-700">Workshop</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" style="background-color: #10b981;"></div>
                <span class="text-xs font-medium text-slate-700">Rehearsal</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" style="background-color: #f59e0b;"></div>
                <span class="text-xs font-medium text-slate-700">Meeting</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" style="background-color: #ec4899;"></div>
                <span class="text-xs font-medium text-slate-700">Performance</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 rounded-full" style="background-color: #94a3b8;"></div>
                <span class="text-xs font-medium text-slate-700">Past Events</span>
            </div>
        </div>

        <!-- Calendar Container -->
        <div id="eventsCalendar" class="bg-white rounded-xl p-4 border border-slate-200"></div>
    </div>

    <!-- Birthday Widget - Always show if there are any birthdays this month -->
    <div class="bg-gradient-to-br from-pink-50 via-purple-50 to-indigo-50 rounded-3xl shadow-xl border-2 border-pink-200 p-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-500 to-purple-600 shadow-lg">
                        <span class="text-3xl">🎂</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Birthday Celebrations</h2>
                        <p class="text-sm text-gray-600">Members to celebrate</p>
                    </div>
                </div>
                <form action="{{ route('admin.birthdays.send') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold rounded-full hover:shadow-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Send Today's Emails
                    </button>
                </form>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <!-- Today's Birthdays -->
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <h3 class="text-lg font-bold text-pink-600 mb-4 flex items-center gap-2">
                        <span class="text-2xl">🎉</span>
                        Today's Birthdays ({{ $birthdays_today->count() }})
                    </h3>
                    @if($birthdays_today->count() > 0)
                        <div class="space-y-3">
                            @foreach($birthdays_today as $member)
                                @php
                                    $birthdate = \Carbon\Carbon::parse($member->birthdate);
                                    $age = $birthdate->age;
                                @endphp
                                <div class="flex items-center justify-between p-3 bg-gradient-to-r from-pink-50 to-purple-50 rounded-lg hover:shadow-md transition-all">
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-900">{{ $member->first_name }} {{ $member->last_name }}</p>
                                        <p class="text-sm text-gray-600">{{ $member->email }}</p>
                                        <p class="text-xs text-purple-600 mt-1">Turning {{ $age }} years old 🎂</p>
                                    </div>
                                    <a href="mailto:{{ $member->email }}" class="inline-flex items-center gap-1 px-3 py-1 bg-pink-500 text-white text-xs font-semibold rounded-full hover:bg-pink-600 transition-all">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Email
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No birthdays today</p>
                    @endif
                </div>

                <!-- This Week's Birthdays -->
                <div class="bg-white rounded-2xl p-6 shadow-lg">
                    <h3 class="text-lg font-bold text-indigo-600 mb-4 flex items-center gap-2">
                        <span class="text-2xl">📅</span>
                        This Week ({{ $birthdays_this_week->count() }})
                    </h3>
                    @if($birthdays_this_week->count() > 0)
                        <div class="space-y-3 max-h-80 overflow-y-auto">
                            @foreach($birthdays_this_week as $member)
                                @php
                                    $birthdate = \Carbon\Carbon::parse($member->birthdate);
                                    $today = \Carbon\Carbon::today();
                                    $birthdayThisYear = \Carbon\Carbon::create($today->year, $birthdate->month, $birthdate->day);
                                    $daysUntil = $today->diffInDays($birthdayThisYear, false);
                                    $age = $birthdate->age;
                                @endphp
                                <div class="flex items-center justify-between p-3 bg-indigo-50 rounded-lg hover:shadow-md transition-all">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <p class="font-semibold text-gray-900">{{ $member->first_name }} {{ $member->last_name }}</p>
                                            @if($daysUntil == 0)
                                                <span class="px-2 py-0.5 bg-pink-500 text-white text-xs font-bold rounded-full animate-pulse">TODAY!</span>
                                            @else
                                                <span class="px-2 py-0.5 bg-indigo-500 text-white text-xs font-bold rounded-full">{{ abs($daysUntil) }}d</span>
                                            @endif
                                        </div>
                                        <p class="text-xs text-gray-600">{{ $birthdayThisYear->format('M d') }} • Age {{ $age }}</p>
                                        <p class="text-xs text-gray-500 mt-0.5">{{ ucfirst($member->member_type ?? 'N/A') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-8">No upcoming birthdays this week</p>
                    @endif
                </div>
            </div>

            <!-- This Month Summary -->
            @if($birthdays_this_month->count() > 0)
                <div class="mt-6 p-4 bg-white rounded-xl border-2 border-dashed border-purple-200">
                    <p class="text-center text-sm text-gray-700">
                        <span class="font-bold text-purple-600">{{ $birthdays_this_month->count() }} birthdays</span> this month
                        <span class="text-gray-500">• Make them feel special! 🎁</span>
                    </p>
                </div>
            @endif
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-12">
        <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-indigo-500 via-purple-500 to-sky-500 text-white shadow-xl lg:col-span-8">
            <div class="absolute inset-0 opacity-30">
                <div class="absolute -top-32 -right-36 h-64 w-64 rounded-full bg-white/20 blur-3xl"></div>
                <div class="absolute bottom-0 right-0 h-48 w-48 rounded-full bg-white/10 blur-2xl"></div>
            </div>
            <div class="relative z-10 flex flex-col gap-8 p-8 sm:p-10">
                <div class="flex flex-col gap-3">
                    <span class="inline-flex w-fit items-center gap-2 rounded-full border border-white/30 bg-white/10 px-3 py-1 text-xs font-semibold uppercase tracking-widest">Today's pulse</span>
                    <h1 class="text-3xl font-semibold leading-tight sm:text-4xl">
                        Welcome back, {{ Auth::user()->name }} 👋
                    </h1>
                    <p class="max-w-xl text-sm text-white/80">
                        Your choir's performance at a glance. Keep nurturing breathtaking moments while we surface the signals that matter.
                    </p>
                </div>

                <div class="grid gap-5 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-4 shadow-lg shadow-indigo-900/20">
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/80">New Registrations</p>
                        <p class="mt-2 text-3xl font-semibold">{{ $recentRegistrationCount }}</p>
                        <p class="mt-1 text-xs text-white/70">{{ $registrationPulse }} tickets secured</p>
                    </div>
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-4 shadow-lg shadow-indigo-900/20">
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Fresh Members</p>
                        <p class="mt-2 text-3xl font-semibold">{{ $recentMemberCount }}</p>
                        <p class="mt-1 text-xs text-white/70">Welcomed in the latest batch</p>
                    </div>
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-4 shadow-lg shadow-indigo-900/20">
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Inbox Momentum</p>
                        <p class="mt-2 text-3xl font-semibold">{{ $recentMessagesCount }}</p>
                        <p class="mt-1 text-xs text-white/70">New conversations opened</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('admin.events.create') }}" class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-semibold text-indigo-600 transition hover:bg-indigo-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Schedule event
                    </a>
                    <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/20">
                        Review registrations
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="{{ route('admin.visitors.index') }}" class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/20">
                        View visitors
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section class="lg:col-span-4">
            <div class="glass-card h-full p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-600">Upcoming focus</p>
                        <p class="text-xs text-slate-400">Quick highlights for the next few days</p>
                    </div>
                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-600">{{ $upcoming_events }} upcoming</span>
                </div>

                <div class="mt-6 space-y-5">
                    @forelse(($upcoming_events_list ?? collect())->take(4) as $event)
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200/60 bg-white/70 p-4 shadow-sm">
                            <div class="flex h-12 w-12 flex-col items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                <span class="text-xs font-semibold uppercase">{{ optional($event->date)->format('M') }}</span>
                                <span class="text-lg font-semibold">{{ optional($event->date)->format('d') }}</span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-800">{{ $event->name }}</p>
                                <p class="text-xs text-slate-500">{{ $event->location ?? 'Location TBA' }}</p>
                                <div class="mt-2 flex flex-wrap items-center gap-2">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-indigo-100 px-2 py-0.5 text-[11px] font-semibold text-indigo-600">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6a9 9 0 110 12 9 9 0 010-12z" />
                                        </svg>
                                        {{ $event->start_at ? $event->start_at->format('H:i') : ($event->time ?: 'All day') }}
                                    </span>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="text-xs font-semibold text-slate-500 underline-offset-2 hover:text-slate-700 dark:text-slate-300 hover:underline">Edit</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-300/80 bg-white/60 p-6 text-center text-sm text-slate-500">
                            No upcoming events on the calendar just yet. Create your next moment in seconds.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <!-- Website Analytics -->
    <section class="glass-card p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-semibold text-slate-900">Website Analytics</h2>
                <p class="text-sm text-slate-500">Track visitor engagement and popular content</p>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 mb-6">
            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">Total Views</span>
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($total_page_views) }}</p>
                <p class="text-xs text-slate-500 mt-1">All time page views</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">Unique Visitors</span>
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($unique_visitors) }}</p>
                <p class="text-xs text-slate-500 mt-1">Distinct visitors</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">Today's Views</span>
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($today_views) }}</p>
                <p class="text-xs text-slate-500 mt-1">Views today</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">This Month</span>
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($month_views) }}</p>
                <p class="text-xs text-slate-500 mt-1">Views this month</p>
            </div>
        </div>


        <!-- Popular Pages -->
        @if($popular_pages->count() > 0)
            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <h3 class="text-sm font-semibold text-slate-900 mb-3">Popular Pages</h3>
                <div class="space-y-2">
                    @foreach($popular_pages as $page)
                        <div class="flex items-center justify-between py-2 border-b border-slate-100 last:border-0">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900">{{ $page->page_title ?: 'Untitled' }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $page->url }}</p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold ml-3">
                                {{ number_format($page->views_count) }} views
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <section class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
        <article class="relative overflow-hidden rounded-2xl border border-indigo-100 bg-white/85 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-600">Events</span>
                <svg class="h-7 w-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $total_events }}</p>
            <p class="mt-2 text-sm text-slate-500">{{ $upcomingRatio }}% of events are future-facing</p>
            <a href="{{ route('admin.events.index') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-indigo-600">
                Manage timeline
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </article>

        <article class="relative overflow-hidden rounded-2xl border border-emerald-100 bg-white/85 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-600">Contributions</span>
                <svg class="h-7 w-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                </svg>
            </div>
            <p class="mt-6 text-3xl font-semibold text-slate-900">{{ number_format($total_contribution_amount, 0) }} RWF</p>
            <p class="mt-2 text-sm text-slate-500">{{ number_format($paid_contribution_amount, 0) }} RWF collected</p>
            <a href="{{ route('admin.contributions.index') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-emerald-600">
                View contributions
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </article>

        <article class="relative overflow-hidden rounded-2xl border border-blue-100 bg-white/85 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-2.5 py-1 text-xs font-semibold text-blue-600">Members</span>
                <svg class="h-7 w-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $total_members }}</p>
            <p class="mt-2 text-sm text-slate-500">Voices united in the choir</p>
            <a href="{{ route('admin.members.index') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                Nurture community
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </article>

        <article class="relative overflow-hidden rounded-2xl border border-purple-100 bg-white/85 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-2 rounded-full bg-purple-50 px-2.5 py-1 text-xs font-semibold text-purple-600">Songs</span>
                <svg class="h-7 w-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                </svg>
            </div>
            <p class="mt-6 text-3xl font-semibold text-slate-900">{{ $total_songs }}</p>
            <p class="mt-2 text-sm text-slate-500">Songs in our repertoire</p>
            <a href="{{ route('admin.songs.index') }}" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-purple-600">
                Browse songs
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </article>
    </section>

    <!-- Contribution Targets Progress -->
    @if($targets_progress->count() > 0)
        <section class="glass-card p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Contribution Targets Progress</h2>
                    <p class="text-sm text-slate-500">Track progress towards our financial goals</p>
                </div>
                <a href="{{ route('admin.contributions.targets') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-300">
                    Manage Targets →
                </a>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                @foreach($targets_progress as $target)
                    <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-slate-900">{{ $target['name'] }}</h3>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                {{ $target['type'] === 'student' ? 'bg-blue-100 text-blue-700' : '' }}
                                {{ $target['type'] === 'alumni' ? 'bg-purple-100 text-purple-700' : '' }}
                                {{ $target['type'] === 'general' ? 'bg-slate-100 text-slate-700' : '' }}">
                                {{ ucfirst($target['type']) }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="text-slate-600">Progress</span>
                                <span class="font-semibold text-slate-900">{{ $target['progress_percentage'] }}%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="h-2 rounded-full transition-all duration-300
                                    {{ $target['is_completed'] ? 'bg-emerald-500' : 'bg-indigo-500' }}"
                                     style="width: {{ min($target['progress_percentage'], 100) }}%"></div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-600">{{ number_format($target['current_amount']) }} / {{ number_format($target['target_amount']) }} RWF</span>
                            @if($target['is_completed'])
                                <span class="text-emerald-600 font-semibold">✓ Completed</span>
                            @else
                                <span class="text-slate-500">{{ number_format($target['remaining_amount']) }} RWF remaining</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Featured Songs -->
    @if($featured_songs->count() > 0)
        <section class="glass-card p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Featured Songs</h2>
                    <p class="text-sm text-slate-500">Our most popular and featured musical pieces</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.songs.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500 dark:bg-purple-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Song
                    </a>
                    <a href="{{ route('admin.songs.index') }}" class="text-sm font-semibold text-purple-600 hover:text-purple-500 dark:text-purple-300">
                        View All →
                    </a>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                @foreach($featured_songs as $song)
                    <div class="group relative overflow-hidden rounded-xl border border-slate-200 bg-white/70 p-4 transition hover:shadow-lg">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                {{ $song->type === 'vocal' ? 'bg-purple-100 text-purple-700' : 'bg-indigo-100 text-indigo-700' }}">
                                {{ ucfirst($song->type) }}
                            </span>
                            @if($song->audio_file)
                                <button onclick="playSong('{{ $song->audio_url }}', '{{ $song->title }}')"
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-100 text-purple-600 transition hover:bg-purple-200 dark:bg-purple-900/50">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                    </svg>
                                </button>
                            @endif
                        </div>

                        <h3 class="font-semibold text-slate-900 mb-1">{{ $song->title }}</h3>

                        @if($song->composer)
                            <p class="text-sm text-slate-600 mb-2">by {{ $song->composer }}</p>
                        @endif

                        <div class="flex items-center justify-between text-xs text-slate-500">
                            <span>{{ $song->formatted_duration }}</span>
                            <span>{{ $song->plays_count }} plays</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <div class="grid gap-6 xl:grid-cols-12">
        <section class="xl:col-span-8">
            <div class="glass-card p-6">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-semibold text-slate-600">Registration velocity</p>
                        <p class="text-xs text-slate-400">Performance over the last few weeks</p>
                    </div>
                    <div class="flex items-center gap-2 rounded-full border border-slate-200 bg-white/60 px-2 py-1 text-xs font-semibold text-slate-500">
                        <button type="button" class="rounded-full bg-indigo-600 px-3 py-1 text-white shadow-sm">Last 30 days</button>
                        <span class="px-3 py-1">Quarter</span>
                        <span class="px-3 py-1">Year</span>
                    </div>
                </div>

                <div class="mt-6">
                    <canvas id="registrationsTrendChart" height="220"></canvas>
                </div>
            </div>
        </section>

        <section class="xl:col-span-4">
            <div class="glass-card h-full p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-600">Live activity</p>
                        <p class="text-xs text-slate-400">Newest engagements across the choir</p>
                    </div>
                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                        <svg class="h-3 w-3 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                            <circle cx="10" cy="10" r="3"></circle>
                        </svg>
                        Updating live
                    </span>
                </div>

                <div class="mt-6 space-y-5">
                    @forelse($timelineItems as $item)
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200/70 bg-white/70 p-4 shadow-sm">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl {{ $item['type'] === 'registration' ? 'bg-emerald-50 text-emerald-600' : 'bg-blue-50 text-blue-600' }}">
                                @if($item['type'] === 'registration')
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                @else
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                @endif
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-4">
                                    <p class="text-sm font-semibold text-slate-800">{{ $item['title'] }}</p>
                                    <span class="text-xs text-slate-400">{{ $item['time']->diffForHumans() }}</span>
                                </div>
                                <p class="mt-1 text-sm text-slate-600">
                                    <span class="font-semibold text-slate-900">{{ $item['name'] }}</span>
                                    @if($item['type'] === 'registration')
                                        registered for <span class="font-semibold text-slate-900">{{ $item['meta'] }}</span>
                                        @if($item['tickets'])
                                            <span class="ml-1 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-600">
                                                🎟 {{ $item['tickets'] }}
                                            </span>
                                        @endif
                                    @else
                                        joined the choir &bull; <span class="font-semibold text-blue-600">{{ $item['meta'] }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-2xl border border-dashed border-slate-300/80 bg-white/60 p-6 text-center text-sm text-slate-500">
                            Activity will appear here as new registrations and members arrive.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <section class="glass-card p-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm font-semibold text-slate-600">Event roadmap</p>
                <p class="text-xs text-slate-400">Polished overview of upcoming productions</p>
            </div>
            <div class="flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-2 py-1 text-xs font-semibold text-slate-500">
                <span class="rounded-full bg-slate-900 px-3 py-1 text-white">Outline</span>
                <span class="px-3 py-1">Past performances</span>
                <span class="px-3 py-1">Focus docs</span>
            </div>
        </div>

        <div class="mt-6 overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100 text-left">
                <thead>
                    <tr>
                        <th class="py-3 pr-6 text-xs font-semibold uppercase tracking-wider text-slate-400">Event</th>
                        <th class="py-3 pr-6 text-xs font-semibold uppercase tracking-wider text-slate-400">Status</th>
                        <th class="py-3 pr-6 text-xs font-semibold uppercase tracking-wider text-slate-400">Date</th>
                        <th class="py-3 pr-6 text-xs font-semibold uppercase tracking-wider text-slate-400">Limit</th>
                        <th class="py-3 text-xs font-semibold uppercase tracking-wider text-slate-400">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse(($upcoming_events_list ?? collect())->take(8) as $event)
                        <tr class="transition hover:bg-slate-50/60 dark:bg-slate-700/30">
                            <td class="py-4 pr-6">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-50 text-sm font-semibold text-indigo-600">
                                        {{ Str::upper(Str::substr($event->name, 0, 2)) }}
                                    </span>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">{{ $event->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $event->location ?? 'Location TBA' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 pr-6">
                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-600">
                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                    In progress
                                </span>
                            </td>
                            <td class="py-4 pr-6 text-sm text-slate-600">
                                {{ optional($event->date)->format('M d, Y') ?? 'TBD' }}
                            </td>
                            <td class="py-4 pr-6 text-sm text-slate-600">
                                {{ $event->max_attendees ? number_format($event->max_attendees) : 'Open' }}
                            </td>
                            <td class="py-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.events.edit', $event) }}" class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-600 transition hover:border-slate-300 dark:border-slate-500 hover:text-slate-800 dark:text-slate-200">Edit</a>
                                    <a href="{{ route('admin.events.registrations', $event) }}" class="rounded-full bg-indigo-600 px-3 py-1 text-xs font-semibold text-white shadow-sm transition hover:bg-indigo-500 dark:bg-indigo-400">View</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-sm text-slate-500">
                                No future events yet. Let's craft a new headline performance.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    // Audio player functionality
    let currentAudio = null;
    let currentPlayingButton = null;

    function playSong(audioUrl, title) {
        // Stop current audio if playing
        if (currentAudio) {
            currentAudio.pause();
            currentAudio.currentTime = 0;
            if (currentPlayingButton) {
                currentPlayingButton.innerHTML = `
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                    </svg>
                `;
            }
        }

        // Create new audio
        currentAudio = new Audio(audioUrl);
        currentPlayingButton = event.target.closest('button');

        // Update button to show pause icon
        currentPlayingButton.innerHTML = `
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 4a1 1 0 00-1 1v10a1 1 0 102 0V5a1 1 0 00-1-1zm8 0a1 1 0 00-1 1v10a1 1 0 102 0V5a1 1 0 00-1-1z"/>
            </svg>
        `;

        currentAudio.play();

        currentAudio.onended = function() {
            currentPlayingButton.innerHTML = `
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                </svg>
            `;
            currentAudio = null;
            currentPlayingButton = null;
        };

        currentAudio.onpause = function() {
            currentPlayingButton.innerHTML = `
                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                </svg>
            `;
            currentAudio = null;
            currentPlayingButton = null;
        };
    }

    // Chart functionality
    (function () {
        const ctx = document.getElementById('registrationsTrendChart');

        if (!ctx) {
            return;
        }

        const trendLabels = @json($trendLabels);
        const trendTotals = @json($trendTotals);

        const fallbackLabels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
        const fallbackTotals = [0, 0, 0, 0];

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: trendLabels.length ? trendLabels : fallbackLabels,
                datasets: [
                    {
                        label: 'Registrations',
                        data: trendTotals.length ? trendTotals : fallbackTotals,
                        fill: true,
                        tension: 0.4,
                        backgroundColor: 'rgba(99, 102, 241, 0.15)',
                        borderColor: 'rgba(79, 70, 229, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: '#6366f1',
                        pointBorderWidth: 2,
                        pointRadius: 4
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(15, 23, 42, 0.9)',
                        titleColor: '#f8fafc',
                        bodyColor: '#e2e8f0',
                        borderColor: 'rgba(148, 163, 184, 0.3)',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 12
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: {
                                size: 11,
                                weight: 600
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(148, 163, 184, 0.15)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#94a3b8',
                            font: {
                                size: 11,
                                weight: 600
                            },
                            precision: 0
                        }
                    }
                }
            }
        });
    })();
</script>

<!-- FullCalendar CSS & JS - Load before initialization -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
    // FullCalendar Initialization
    (function() {
        var calendarEl = document.getElementById('eventsCalendar');

        if (calendarEl) {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,listMonth'
                },
                height: 'auto',
                events: '{{ route('admin.calendar.events') }}',
                eventClick: function(info) {
                    info.jsEvent.preventDefault();
                    if (info.event.url) {
                        window.location.href = info.event.url;
                    }
                },
                eventMouseEnter: function(info) {
                    const event = info.event;
                    const props = event.extendedProps;

                    let tooltip = '<div style="padding: 8px; background: white; border-radius: 8px; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); max-width: 250px;">';
                    tooltip += '<div style="font-weight: 600; font-size: 14px; margin-bottom: 4px;">' + event.title + '</div>';
                    if (props.location) {
                        tooltip += '<div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">📍 ' + props.location + '</div>';
                    }
                    if (props.registrations !== undefined) {
                        tooltip += '<div style="font-size: 12px; color: #64748b;">👥 ' + props.registrations + ' registered';
                        if (props.capacity) {
                            tooltip += ' / ' + props.capacity;
                        }
                        tooltip += '</div>';
                    }
                    tooltip += '</div>';

                    const tooltipEl = document.createElement('div');
                    tooltipEl.innerHTML = tooltip;
                    tooltipEl.style.position = 'absolute';
                    tooltipEl.style.zIndex = '9999';
                    tooltipEl.id = 'event-tooltip';
                    document.body.appendChild(tooltipEl);

                    const rect = info.el.getBoundingClientRect();
                    tooltipEl.style.left = rect.left + 'px';
                    tooltipEl.style.top = (rect.bottom + 5) + 'px';
                },
                eventMouseLeave: function(info) {
                    const tooltip = document.getElementById('event-tooltip');
                    if (tooltip) {
                        tooltip.remove();
                    }
                },
                themeSystem: 'standard',
                buttonText: {
                    today: 'Today',
                    month: 'Month',
                    week: 'Week',
                    list: 'List'
                },
                views: {
                    dayGridMonth: {
                        dayMaxEvents: 3
                    }
                }
            });

            calendar.render();
        }
    })();
</script>

@endpush
