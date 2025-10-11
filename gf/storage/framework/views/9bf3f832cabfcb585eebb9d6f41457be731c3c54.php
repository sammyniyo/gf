<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php
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
?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Important Notifications -->
    <?php if($unread_contacts_count > 0 || $upcoming_events > 0): ?>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <?php if($unread_contacts_count > 0): ?>
                <a href="<?php echo e(route('admin.contacts.index')); ?>" class="glass-card p-5 border-l-4 border-rose-500 hover:shadow-lg transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100 group-hover:bg-rose-200 transition-colors">
                            <svg class="w-6 h-6 text-rose-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">Unread Messages</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl font-bold text-rose-600"><?php echo e($unread_contacts_count); ?></span>
                                <span class="text-xs text-slate-500">new</span>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Click to view messages</p>
    </div>
                </div>
                </a>
            <?php endif; ?>

            <?php if($upcoming_events > 0): ?>
                <a href="<?php echo e(route('admin.events.index')); ?>" class="glass-card p-5 border-l-4 border-indigo-500 hover:shadow-lg transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 group-hover:bg-indigo-200 transition-colors">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">Upcoming Events</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl font-bold text-indigo-600"><?php echo e($upcoming_events); ?></span>
                                <span class="text-xs text-slate-500">scheduled</span>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Events to manage</p>
                        </div>
                    </div>
                </a>
            <?php endif; ?>

            <?php if($total_members > 0): ?>
                <a href="<?php echo e(route('admin.members.index')); ?>" class="glass-card p-5 border-l-4 border-emerald-500 hover:shadow-lg transition-all group">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 group-hover:bg-emerald-200 transition-colors">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-slate-900">Active Members</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl font-bold text-emerald-600"><?php echo e($total_members); ?></span>
                                <span class="text-xs text-slate-500">total</span>
                            </div>
                            <p class="text-xs text-slate-500 mt-1">Choir community</p>
                        </div>
                    </div>
                </a>
            <?php endif; ?>
            </div>
    <?php endif; ?>

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
                        Welcome back, <?php echo e(Auth::user()->name); ?> 👋
                    </h1>
                    <p class="max-w-xl text-sm text-white/80">
                        Your choir's performance at a glance. Keep nurturing breathtaking moments while we surface the signals that matter.
                    </p>
        </div>

                <div class="grid gap-5 sm:grid-cols-3">
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-4 shadow-lg shadow-indigo-900/20">
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/80">New Registrations</p>
                        <p class="mt-2 text-3xl font-semibold"><?php echo e($recentRegistrationCount); ?></p>
                        <p class="mt-1 text-xs text-white/70"><?php echo e($registrationPulse); ?> tickets secured</p>
                    </div>
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-4 shadow-lg shadow-indigo-900/20">
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Fresh Members</p>
                        <p class="mt-2 text-3xl font-semibold"><?php echo e($recentMemberCount); ?></p>
                        <p class="mt-1 text-xs text-white/70">Welcomed in the latest batch</p>
                    </div>
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-4 shadow-lg shadow-indigo-900/20">
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Inbox Momentum</p>
                        <p class="mt-2 text-3xl font-semibold"><?php echo e($recentMessagesCount); ?></p>
                        <p class="mt-1 text-xs text-white/70">New conversations opened</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <a href="<?php echo e(route('admin.events.create')); ?>" class="inline-flex items-center gap-2 rounded-full bg-white px-4 py-2 text-sm font-semibold text-indigo-600 transition hover:bg-indigo-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Schedule event
                    </a>
                    <a href="<?php echo e(route('admin.registrations.index')); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/20">
                        Review registrations
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
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
                    <span class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-600"><?php echo e($upcoming_events); ?> upcoming</span>
                </div>

                <div class="mt-6 space-y-5">
                    <?php $__empty_1 = true; $__currentLoopData = ($upcoming_events_list ?? collect())->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200/60 bg-white/70 p-4 shadow-sm">
                            <div class="flex h-12 w-12 flex-col items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                                <span class="text-xs font-semibold uppercase"><?php echo e(optional($event->date)->format('M')); ?></span>
                                <span class="text-lg font-semibold"><?php echo e(optional($event->date)->format('d')); ?></span>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-slate-800"><?php echo e($event->name); ?></p>
                                <p class="text-xs text-slate-500"><?php echo e($event->location ?? 'Location TBA'); ?></p>
                                <div class="mt-2 flex flex-wrap items-center gap-2">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-indigo-100 px-2 py-0.5 text-[11px] font-semibold text-indigo-600">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6a9 9 0 110 12 9 9 0 010-12z" />
                    </svg>
                                        <?php echo e($event->start_at ? $event->start_at->format('H:i') : ($event->time ?: 'All day')); ?>

                                    </span>
                                    <a href="<?php echo e(route('admin.events.edit', $event)); ?>" class="text-xs font-semibold text-slate-500 underline-offset-2 hover:text-slate-700 hover:underline">Edit</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="rounded-2xl border border-dashed border-slate-300/80 bg-white/60 p-6 text-center text-sm text-slate-500">
                            No upcoming events on the calendar just yet. Create your next moment in seconds.
                        </div>
                    <?php endif; ?>
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
                <p class="text-2xl font-bold text-slate-900"><?php echo e(number_format($total_page_views)); ?></p>
                <p class="text-xs text-slate-500 mt-1">All time page views</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">Unique Visitors</span>
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900"><?php echo e(number_format($unique_visitors)); ?></p>
                <p class="text-xs text-slate-500 mt-1">Distinct visitors</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">Today's Views</span>
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900"><?php echo e(number_format($today_views)); ?></p>
                <p class="text-xs text-slate-500 mt-1">Views today</p>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-slate-600">This Month</span>
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <p class="text-2xl font-bold text-slate-900"><?php echo e(number_format($month_views)); ?></p>
                <p class="text-xs text-slate-500 mt-1">Views this month</p>
            </div>
        </div>

        <!-- Popular Pages -->
        <?php if($popular_pages->count() > 0): ?>
            <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                <h3 class="text-sm font-semibold text-slate-900 mb-3">Popular Pages</h3>
                <div class="space-y-2">
                    <?php $__currentLoopData = $popular_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between py-2 border-b border-slate-100 last:border-0">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900"><?php echo e($page->page_title ?: 'Untitled'); ?></p>
                                <p class="text-xs text-slate-500 truncate"><?php echo e($page->url); ?></p>
                            </div>
                            <span class="inline-flex items-center px-2 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold ml-3">
                                <?php echo e(number_format($page->views_count)); ?> views
                            </span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <section class="grid gap-5 md:grid-cols-2 xl:grid-cols-4">
        <article class="relative overflow-hidden rounded-2xl border border-indigo-100 bg-white/85 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
            <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-2 rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-semibold text-indigo-600">Events</span>
                <svg class="h-7 w-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <p class="mt-6 text-3xl font-semibold text-slate-900"><?php echo e($total_events); ?></p>
            <p class="mt-2 text-sm text-slate-500"><?php echo e($upcomingRatio); ?>% of events are future-facing</p>
            <a href="<?php echo e(route('admin.events.index')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-indigo-600">
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
            <p class="mt-6 text-3xl font-semibold text-slate-900"><?php echo e(number_format($total_contribution_amount, 0)); ?> RWF</p>
            <p class="mt-2 text-sm text-slate-500"><?php echo e(number_format($paid_contribution_amount, 0)); ?> RWF collected</p>
            <a href="<?php echo e(route('admin.contributions.index')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-emerald-600">
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
            <p class="mt-6 text-3xl font-semibold text-slate-900"><?php echo e($total_members); ?></p>
            <p class="mt-2 text-sm text-slate-500">Voices united in the choir</p>
            <a href="<?php echo e(route('admin.members.index')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
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
            <p class="mt-6 text-3xl font-semibold text-slate-900"><?php echo e($total_songs); ?></p>
            <p class="mt-2 text-sm text-slate-500">Songs in our repertoire</p>
            <a href="<?php echo e(route('admin.songs.index')); ?>" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-purple-600">
                Browse songs
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </article>
    </section>

    <!-- Contribution Targets Progress -->
    <?php if($targets_progress->count() > 0): ?>
        <section class="glass-card p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Contribution Targets Progress</h2>
                    <p class="text-sm text-slate-500">Track progress towards our financial goals</p>
                </div>
                <a href="<?php echo e(route('admin.contributions.targets')); ?>" class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                    Manage Targets →
                </a>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <?php $__currentLoopData = $targets_progress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rounded-xl border border-slate-200 bg-white/70 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="font-semibold text-slate-900"><?php echo e($target['name']); ?></h3>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                <?php echo e($target['type'] === 'student' ? 'bg-blue-100 text-blue-700' : ''); ?>

                                <?php echo e($target['type'] === 'alumni' ? 'bg-purple-100 text-purple-700' : ''); ?>

                                <?php echo e($target['type'] === 'general' ? 'bg-slate-100 text-slate-700' : ''); ?>">
                                <?php echo e(ucfirst($target['type'])); ?>

                            </span>
                        </div>

                        <div class="mb-3">
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="text-slate-600">Progress</span>
                                <span class="font-semibold text-slate-900"><?php echo e($target['progress_percentage']); ?>%</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="h-2 rounded-full transition-all duration-300
                                    <?php echo e($target['is_completed'] ? 'bg-emerald-500' : 'bg-indigo-500'); ?>"
                                     style="width: <?php echo e(min($target['progress_percentage'], 100)); ?>%"></div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-600"><?php echo e(number_format($target['current_amount'])); ?> / <?php echo e(number_format($target['target_amount'])); ?> RWF</span>
                            <?php if($target['is_completed']): ?>
                                <span class="text-emerald-600 font-semibold">✓ Completed</span>
                            <?php else: ?>
                                <span class="text-slate-500"><?php echo e(number_format($target['remaining_amount'])); ?> RWF remaining</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Featured Songs -->
    <?php if($featured_songs->count() > 0): ?>
        <section class="glass-card p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Featured Songs</h2>
                    <p class="text-sm text-slate-500">Our most popular and featured musical pieces</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="<?php echo e(route('admin.songs.create')); ?>" class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add Song
                    </a>
                    <a href="<?php echo e(route('admin.songs.index')); ?>" class="text-sm font-semibold text-purple-600 hover:text-purple-500">
                        View All →
                    </a>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <?php $__currentLoopData = $featured_songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative overflow-hidden rounded-xl border border-slate-200 bg-white/70 p-4 transition hover:shadow-lg">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold
                                <?php echo e($song->type === 'vocal' ? 'bg-purple-100 text-purple-700' : 'bg-indigo-100 text-indigo-700'); ?>">
                                <?php echo e(ucfirst($song->type)); ?>

                            </span>
                            <?php if($song->audio_file): ?>
                                <button onclick="playSong('<?php echo e($song->audio_url); ?>', '<?php echo e($song->title); ?>')"
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-purple-100 text-purple-600 transition hover:bg-purple-200">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </div>

                        <h3 class="font-semibold text-slate-900 mb-1"><?php echo e($song->title); ?></h3>

                        <?php if($song->composer): ?>
                            <p class="text-sm text-slate-600 mb-2">by <?php echo e($song->composer); ?></p>
                        <?php endif; ?>

                        <div class="flex items-center justify-between text-xs text-slate-500">
                            <span><?php echo e($song->formatted_duration); ?></span>
                            <span><?php echo e($song->plays_count); ?> plays</span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

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
                    <?php $__empty_1 = true; $__currentLoopData = $timelineItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-start gap-4 rounded-2xl border border-slate-200/70 bg-white/70 p-4 shadow-sm">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl <?php echo e($item['type'] === 'registration' ? 'bg-emerald-50 text-emerald-600' : 'bg-blue-50 text-blue-600'); ?>">
                                <?php if($item['type'] === 'registration'): ?>
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                <?php else: ?>
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between gap-4">
                                    <p class="text-sm font-semibold text-slate-800"><?php echo e($item['title']); ?></p>
                                    <span class="text-xs text-slate-400"><?php echo e($item['time']->diffForHumans()); ?></span>
                                </div>
                                <p class="mt-1 text-sm text-slate-600">
                                    <span class="font-semibold text-slate-900"><?php echo e($item['name']); ?></span>
                                    <?php if($item['type'] === 'registration'): ?>
                                        registered for <span class="font-semibold text-slate-900"><?php echo e($item['meta']); ?></span>
                                        <?php if($item['tickets']): ?>
                                            <span class="ml-1 inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-600">
                                                🎟 <?php echo e($item['tickets']); ?>

                                </span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        joined the choir &bull; <span class="font-semibold text-blue-600"><?php echo e($item['meta']); ?></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="rounded-2xl border border-dashed border-slate-300/80 bg-white/60 p-6 text-center text-sm text-slate-500">
                            Activity will appear here as new registrations and members arrive.
                    </div>
                    <?php endif; ?>
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
                    <?php $__empty_1 = true; $__currentLoopData = ($upcoming_events_list ?? collect())->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="transition hover:bg-slate-50/60">
                            <td class="py-4 pr-6">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-50 text-sm font-semibold text-indigo-600">
                                        <?php echo e(Str::upper(Str::substr($event->name, 0, 2))); ?>

                                    </span>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800"><?php echo e($event->name); ?></p>
                                        <p class="text-xs text-slate-500"><?php echo e($event->location ?? 'Location TBA'); ?></p>
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
                                <?php echo e(optional($event->date)->format('M d, Y') ?? 'TBD'); ?>

                            </td>
                            <td class="py-4 pr-6 text-sm text-slate-600">
                                <?php echo e($event->max_attendees ? number_format($event->max_attendees) : 'Open'); ?>

                            </td>
                            <td class="py-4 text-sm">
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.events.edit', $event)); ?>" class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-800">Edit</a>
                                    <a href="<?php echo e(route('admin.events.registrations', $event)); ?>" class="rounded-full bg-indigo-600 px-3 py-1 text-xs font-semibold text-white shadow-sm transition hover:bg-indigo-500">View</a>
                            </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="py-6 text-center text-sm text-slate-500">
                                No future events yet. Let's craft a new headline performance.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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

        const trendLabels = <?php echo json_encode($trendLabels, 15, 512) ?>;
        const trendTotals = <?php echo json_encode($trendTotals, 15, 512) ?>;

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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>