<!DOCTYPE html>
<html lang="en" class="h-full antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        :root {
            --admin-bg: #030712;
            --admin-bg-alt: #0b1120;
            --admin-surface: rgba(15, 23, 42, 0.72);
            --admin-surface-strong: rgba(15, 23, 42, 0.9);
            --admin-border: rgba(71, 85, 105, 0.45);
            --admin-border-soft: rgba(71, 85, 105, 0.18);
            --admin-text: rgba(226, 232, 240, 0.95);
            --admin-text-muted: rgba(148, 163, 184, 0.75);
            --admin-accent: #38bdf8;
            --admin-accent-strong: #0ea5e9;
            --admin-accent-soft: rgba(56, 189, 248, 0.18);
            --admin-success: #34d399;
            --admin-warning: #facc15;
            --admin-danger: #f87171;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at 10% 0%, #1e3a8a 0%, #0f172a 45%, #020617 100%);
            background-size: 200% 200%;
            background-attachment: fixed;
            color: var(--admin-text);
            animation: gradientShift 28s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
        }

        .admin-sidebar {
            background: linear-gradient(180deg, rgba(6, 11, 27, 0.92), rgba(11, 17, 32, 0.96));
            box-shadow: 0 32px 80px rgba(2, 6, 23, 0.65);
            border-right: 1px solid var(--admin-border-soft);
            backdrop-filter: blur(24px);
        }

        .sidebar-section {
            border-bottom: 1px solid var(--admin-border-soft);
        }

        .sidebar-footer {
            border-top: 1px solid var(--admin-border-soft);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            width: 100%;
            padding: 0.65rem 0.85rem;
            border-radius: 0.9rem;
            font-weight: 600;
            font-size: 0.9375rem;
            color: var(--admin-text-muted);
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(56, 189, 248, 0.15), transparent);
            transform: translateX(-120%);
            transition: transform 0.5s ease;
        }

        .sidebar-link:hover::before {
            transform: translateX(120%);
        }

        .sidebar-link:hover {
            color: var(--admin-text);
            background: rgba(148, 163, 184, 0.08);
            transform: translateX(4px);
        }

        .sidebar-link svg {
            width: 1.25rem;
            height: 1.25rem;
            color: var(--admin-text-muted);
            filter: drop-shadow(0 0 6px rgba(8, 145, 178, 0.35));
        }

        .sidebar-link:hover svg,
        .sidebar-link.active svg {
            color: var(--admin-accent);
        }

        .sidebar-link.active {
            color: var(--admin-text);
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.24), rgba(56, 189, 248, 0.18));
            border: 1px solid rgba(56, 189, 248, 0.35);
            box-shadow: 0 12px 32px rgba(14, 165, 233, 0.18);
            transform: translateX(4px);
        }

        .sidebar-dot {
            display: inline-flex;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            background: radial-gradient(circle at 30% 30%, var(--admin-accent) 0%, var(--admin-accent-strong) 75%);
            box-shadow: 0 0 10px rgba(14, 165, 233, 0.6);
            animation: pulse 2.2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.08); }
        }

        .admin-brand__mark {
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.85), rgba(14, 165, 233, 0.65));
            border-radius: 1.25rem;
            border: 1px solid rgba(56, 189, 248, 0.4);
            box-shadow: 0 16px 42px rgba(8, 145, 178, 0.4);
            color: #e0f2fe;
        }

        .admin-brand__label {
            color: var(--admin-text-muted);
            letter-spacing: 0.35em;
        }

        .admin-brand__title {
            color: var(--admin-text);
        }

        .admin-user-card {
            background: linear-gradient(120deg, rgba(14, 165, 233, 0.12), rgba(56, 189, 248, 0.08));
            border: 1px solid rgba(56, 189, 248, 0.2);
        }

        .admin-user-card__avatar {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.9), rgba(8, 145, 178, 0.85));
            border: 1px solid rgba(125, 211, 252, 0.35);
            box-shadow: 0 14px 32px rgba(8, 145, 178, 0.45);
        }

        .admin-avatar-badge {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.75), rgba(56, 189, 248, 0.6));
            border: 1px solid rgba(56, 189, 248, 0.35);
            color: #e0f2fe;
            box-shadow: 0 12px 28px rgba(14, 165, 233, 0.35);
        }

        .admin-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(148, 163, 184, 0.14);
            color: var(--admin-text-muted);
            font-weight: 600;
        }

        .admin-pill--accent {
            border-color: rgba(56, 189, 248, 0.35);
            background: rgba(14, 165, 233, 0.18);
            color: #e0f2fe;
        }

        .admin-pill--alert {
            border-color: rgba(248, 113, 113, 0.35);
            background: rgba(248, 113, 113, 0.2);
            color: #fecdd3;
        }

        .glass-card {
            background: var(--admin-surface);
            border: 1px solid var(--admin-border);
            box-shadow: 0 24px 60px rgba(2, 6, 23, 0.45);
            border-radius: 1.25rem;
            backdrop-filter: blur(26px);
            color: var(--admin-text);
        }

        .admin-header {
            background: linear-gradient(120deg, rgba(6, 11, 27, 0.92), rgba(12, 22, 41, 0.96));
            border-bottom: 1px solid var(--admin-border-soft);
            box-shadow: 0 28px 64px rgba(2, 6, 23, 0.55);
            backdrop-filter: blur(22px);
        }

        .admin-header__badge {
            border-radius: 9999px;
            border: 1px solid rgba(56, 189, 248, 0.35);
            background: rgba(14, 165, 233, 0.2);
            color: #e0f2fe;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0.25rem 0.75rem;
        }

        .admin-header__badge-dot {
            display: inline-block;
            width: 0.4rem;
            height: 0.4rem;
            border-radius: 9999px;
            background: #e0f2fe;
            box-shadow: 0 0 8px rgba(56, 189, 248, 0.7);
        }

        .admin-quick-action {
            border-radius: 0.9rem;
            border: 1px solid rgba(56, 189, 248, 0.35);
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.5), rgba(56, 189, 248, 0.4));
            box-shadow: 0 18px 40px rgba(14, 165, 233, 0.3);
            color: #e0f2fe;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .admin-quick-action:hover {
            transform: translateY(-1px) scale(1.02);
            box-shadow: 0 22px 46px rgba(14, 165, 233, 0.38);
        }

        .admin-quick-action:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(125, 211, 252, 0.3);
        }

        .admin-icon-button {
            border-radius: 0.9rem;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(15, 23, 42, 0.65);
            color: var(--admin-text-muted);
            transition: all 0.2s ease;
            box-shadow: 0 8px 24px rgba(2, 6, 23, 0.4);
        }

        .admin-icon-button:hover {
            color: var(--admin-text);
            border-color: rgba(56, 189, 248, 0.35);
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 12px 32px rgba(14, 165, 233, 0.18);
        }

        .admin-icon-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.28);
        }

        .admin-danger-btn {
            border-radius: 0.9rem;
            border: 1px solid rgba(248, 113, 113, 0.35);
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.75), rgba(248, 113, 113, 0.7));
            color: #fee2e2;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .admin-danger-btn:hover {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.85), rgba(248, 113, 113, 0.8));
            color: #fff5f5;
            box-shadow: 0 16px 40px rgba(248, 113, 113, 0.35);
        }

        .admin-toast-success {
            border-color: rgba(52, 211, 153, 0.35);
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(52, 211, 153, 0.12));
            color: #bbf7d0;
        }

        .admin-toast-error {
            border-color: rgba(248, 113, 113, 0.35);
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.18), rgba(248, 113, 113, 0.14));
            color: #fecaca;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
            background-color: transparent;
        }

        ::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.4);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(14, 165, 233, 0.8), rgba(56, 189, 248, 0.8));
            border-radius: 8px;
            box-shadow: 0 0 6px rgba(14, 165, 233, 0.45);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(2, 132, 199, 0.9), rgba(14, 165, 233, 0.9));
        }

        @supports (scrollbar-color: auto) {
            :root {
                scrollbar-width: thin;
                scrollbar-color: rgba(56, 189, 248, 0.8) rgba(15, 23, 42, 0.4);
            }
        }

        .section-title {
            color: var(--admin-text-muted);
            text-shadow: none;
        }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen transition-colors">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:flex-col lg:w-72 admin-sidebar">
            <div class="px-6 pt-8 pb-6 sidebar-section">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-12 h-12 admin-brand__mark">
                        <span class="text-base font-black tracking-wide">GF</span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase admin-brand__label">Admin</p>
                        <h1 class="text-base font-semibold leading-tight admin-brand__title">God's Family Choir</h1>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6 sidebar-section">
                <div class="flex items-center gap-4 p-3 rounded-xl admin-user-card">
                    <div class="flex items-center justify-center w-12 h-12 rounded-xl admin-user-card__avatar">
                        <svg class="w-6 h-6 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-100 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs font-medium text-slate-300 truncate">Administrator</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 overflow-y-auto px-4 py-8 space-y-8">
                <div>
                    <p class="px-3 text-xs font-semibold uppercase section-title">Overview</p>
                    <div class="mt-3 space-y-1.5">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="flex-1">Dashboard</span>
                            @if(request()->routeIs('admin.dashboard'))
                                <span class="sidebar-dot"></span>
                            @endif
                        </a>

                        <a href="{{ route('admin.events.index') }}" class="sidebar-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="flex-1">Events</span>
                            @if(isset($upcoming_events_count) && $upcoming_events_count > 0)
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold admin-pill admin-pill--accent">{{ $upcoming_events_count }}</span>
                            @endif
                        </a>

                        <a href="{{ route('admin.registrations.index') }}" class="sidebar-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                            <span class="flex-1">Registrations</span>
                        </a>

                        <a href="{{ route('admin.members.index') }}" class="sidebar-link {{ request()->routeIs('admin.members.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="flex-1">Members</span>
                        </a>

                        <!-- Quick create links removed from sidebar (kept in header) -->

                        <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="flex-1">Messages</span>
                            @if(isset($unread_contacts_count) && $unread_contacts_count > 0)
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold admin-pill admin-pill--alert animate-pulse">{{ $unread_contacts_count }}</span>
                            @endif
                        </a>

                        <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="flex-1">Admin Users</span>
                        </a>

                        <a href="{{ route('admin.committees.index') }}" class="sidebar-link {{ request()->routeIs('admin.committees.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="flex-1">Committee</span>
                            </a>
                        </div>
                    </div>

                <div>
                    <p class="px-3 text-xs font-bold uppercase tracking-widest section-title">Content</p>
                    <div class="mt-3 space-y-1.5">
                        <a href="{{ route('admin.stories.index') }}" class="sidebar-link {{ request()->routeIs('admin.stories.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="flex-1">Behind Stories</span>
                        </a>

                        <a href="{{ route('admin.devotions.index') }}" class="sidebar-link {{ request()->routeIs('admin.devotions.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="flex-1">Devotions</span>
                        </a>

                        <a href="{{ route('admin.meetings.index') }}" class="sidebar-link {{ request()->routeIs('admin.meetings.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="flex-1">Meetings</span>
                        </a>

                        <a href="{{ route('admin.contributions.index') }}" class="sidebar-link {{ request()->routeIs('admin.contributions.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="flex-1">Contributions</span>
                        </a>

                        <a href="{{ route('admin.resources.index') }}" class="sidebar-link {{ request()->routeIs('admin.resources.*') ? 'active' : '' }}">
                            <svg fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                            </svg>
                            <span class="flex-1">Resources</span>
                            @php
                                $resourcesCount = \App\Models\Resource::count();
                            @endphp
                            @if($resourcesCount > 0)
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold admin-pill admin-pill--accent">{{ $resourcesCount }}</span>
                            @endif
                        </a>
                    </div>
                </div>

                <div>
                    <p class="px-3 text-xs font-semibold uppercase section-title">Workspace</p>
                    <div class="mt-3 space-y-1.5">
                        <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <span class="flex-1">View Website</span>
                        </a>

                        <a href="{{ route('admin.profile') }}" class="sidebar-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            <span class="flex-1">Profile Settings</span>
                        </a>
                    </div>
                </div>
            </nav>

            <div class="px-6 py-6 mt-auto sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-danger-btn w-full inline-flex items-center justify-center gap-2 px-4 py-3 text-sm transition-all focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                        <svg class="w-5 h-5 text-rose-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="sticky top-0 z-30 admin-header">
                <div class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-5">
                    <div class="flex items-center gap-4">
                        <div class="hidden lg:flex items-center justify-center w-12 h-12 admin-brand__mark">
                            <svg class="w-6 h-6 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2.5">
                                <h2 class="text-xl font-semibold text-slate-100 tracking-tight">@yield('page-title', 'Dashboard')</h2>
                                <span class="inline-flex items-center gap-1.5 admin-header__badge">
                                    <span class="admin-header__badge-dot animate-pulse"></span>
                                    Live
                                </span>
                            </div>
                            <p class="mt-0.5 text-sm text-slate-300 hidden sm:block font-medium">Manage your choir's operations efficiently</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <!-- Quick Create -->
                        <div x-data="{ open:false }" class="relative">
                            <button @click="open=!open" @click.away="open=false" class="admin-quick-action inline-flex items-center gap-2 px-4 py-2.5 text-sm">
                                <svg class="w-4 h-4 text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                <span class="hidden sm:inline">Quick Create</span>
                                <span class="sm:hidden">New</span>
                            </button>
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-56 rounded-xl border border-slate-800/40 bg-slate-950/90 backdrop-blur-xl py-2 shadow-2xl shadow-slate-900/60 z-50"
                                 style="display:none;">
                                <a href="{{ route('admin.events.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-800/60 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    New Event
                                </a>
                                <a href="{{ route('admin.devotions.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-800/60 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    New Devotion
                                </a>
                                <a href="{{ route('admin.stories.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-800/60 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    New Story
                                </a>
                                <a href="{{ route('admin.resources.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-800/60 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-cyan-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                        <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                    </svg>
                                    Upload Resource
                                </a>
                                <div class="my-1.5 border-t border-slate-700/40"></div>
                                <a href="{{ route('registration.member') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-200 hover:bg-slate-800/60 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    Register Member
                                </a>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div x-data="notificationDropdown()" class="relative">
                            <button @click="toggleDropdown()" class="admin-icon-button relative inline-flex items-center justify-center w-11 h-11">
                                <svg class="w-5 h-5 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span x-show="unreadCount > 0" class="absolute -top-1 -right-1 flex h-5 w-5">
                                    <span class="absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75 animate-ping"></span>
                                    <span x-text="unreadCount" class="relative inline-flex h-5 w-5 rounded-full bg-rose-500 text-[10px] font-bold text-white items-center justify-center"></span>
                                </span>
                            </button>

                            <!-- Notification Dropdown -->
                            <div x-show="open"
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-96 origin-top-right rounded-2xl bg-slate-950/95 border border-slate-800/40 backdrop-blur-2xl shadow-2xl shadow-slate-900/60 z-50"
                                 style="display: none;">

                                <!-- Header -->
                                <div class="px-5 py-4 border-b border-slate-800/40">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-100">Notifications</h3>
                                        <button @click="markAllAsRead()"
                                                x-show="unreadCount > 0"
                                                class="text-sm font-medium text-cyan-300 hover:text-cyan-200 transition">
                                            Mark all read
                                        </button>
                                    </div>
                                </div>

                                <!-- Notifications List -->
                                <div class="max-h-96 overflow-y-auto">
                                    <template x-if="notifications.length === 0">
                                        <div class="px-5 py-8 text-center text-slate-400">
                                            <svg class="w-12 h-12 mx-auto text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="mt-2 text-sm text-slate-500">No notifications yet</p>
                                        </div>
                                    </template>

                                    <template x-for="notification in notifications" :key="notification.id">
                                        <div @click="markAsRead(notification)"
                                             class="px-5 py-4 border-b border-slate-800/40 transition cursor-pointer hover:bg-slate-900/60"
                                             :class="{ 'bg-cyan-500/10 backdrop-blur-sm': !notification.is_read }">
                                            <div class="flex gap-3">
                                                <!-- Icon -->
                                                <div class="flex-shrink-0">
                                                    <div :class="`flex items-center justify-center w-10 h-10 rounded-xl ${getColorBg(notification.color)}`">
                                                        <svg :class="`w-5 h-5 ${getColorText(notification.color)}`" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="notification.icon_class" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                <!-- Content -->
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-2">
                                                        <p class="text-sm font-semibold text-slate-100" x-text="notification.title"></p>
                                                        <span x-show="!notification.is_read" class="flex-shrink-0 w-2 h-2 rounded-full bg-cyan-400 shadow-sm"></span>
                                                    </div>
                                                    <p class="mt-1 text-sm text-slate-300 line-clamp-2" x-text="notification.message"></p>
                                                    <p class="mt-1 text-xs text-slate-500" x-text="notification.relative_time"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <!-- Footer -->
                                <div class="px-5 py-3 bg-slate-900/60 rounded-b-2xl border-t border-slate-800/40">
                                    <a href="#" class="text-sm font-medium text-cyan-300 hover:text-cyan-200 transition">
                                        View all notifications
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="hidden lg:flex items-center gap-2.5 rounded-xl border border-slate-800/40 bg-slate-900/60 px-4 py-2 text-sm font-medium text-slate-200 shadow-lg shadow-slate-900/40">
                            <svg class="w-4 h-4 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span id="current-time" class="text-slate-200">{{ now()->format('M d, Y · H:i') }}</span>
                        </div>

                        <!-- Profile Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open=!open" @click.away="open=false" class="admin-icon-button inline-flex items-center gap-2.5 pl-2 pr-3 py-2 text-slate-200 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg admin-avatar-badge">
                                    <span class="text-sm font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <span class="hidden md:block text-sm font-semibold text-slate-200">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-56 origin-top-right rounded-xl border border-slate-800/40 bg-slate-950/95 backdrop-blur-2xl shadow-2xl shadow-slate-900/60 z-50"
                                 style="display:none;">
                                <div class="px-4 py-3 border-b border-slate-800/40">
                                    <p class="text-sm font-semibold text-slate-100">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="py-2 space-y-1">
                                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-200 hover:bg-slate-800/60 transition rounded-lg">
                                        <svg class="w-5 h-5 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Profile Settings
                                    </a>
                                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-200 hover:bg-slate-800/60 transition rounded-lg">
                                        <svg class="w-5 h-5 text-cyan-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                        View Website
                                    </a>
                                </div>
                                <div class="border-t border-slate-800/40 py-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-sm text-rose-200 hover:bg-rose-500/10 transition rounded-lg">
                                            <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="py-10">
                    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">
                        @if(session('success'))
                            <div class="glass-card px-5 py-4 backdrop-blur admin-toast-success">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-semibold text-emerald-100">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="glass-card px-5 py-4 backdrop-blur admin-toast-error">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-rose-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-semibold text-rose-100">{{ session('error') }}</p>
                                </div>
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
        </main>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        function updateTime() {
            const now = new Date();
            const options = {
                month: 'short',
                day: 'numeric',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };

            const currentTime = document.getElementById('current-time');
            if (currentTime) {
                currentTime.textContent = now.toLocaleDateString('en-US', options).replace(',', ' ·');
            }
        }

        setInterval(updateTime, 60000);

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (event) {
                event.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Notification Dropdown Component
        function notificationDropdown() {
            return {
                open: false,
                notifications: [],
                unreadCount: 0,
                loading: false,

                async init() {
                    await this.fetchNotifications();
                    // Poll for new notifications every 30 seconds
                    setInterval(() => this.fetchNotifications(), 30000);
                },

                toggleDropdown() {
                    this.open = !this.open;
                    if (this.open && this.notifications.length === 0) {
                        this.fetchNotifications();
                    }
                },

                async fetchNotifications() {
                    try {
                        const response = await fetch('{{ route("admin.notifications.index") }}', {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        });
                        const data = await response.json();
                        this.notifications = data.notifications;
                        this.unreadCount = data.unread_count;
                    } catch (error) {
                        console.error('Failed to fetch notifications:', error);
                    }
                },

                async markAsRead(notification) {
                    if (notification.is_read) {
                        // If already read, just navigate
                        if (notification.action_url) {
                            window.location.href = notification.action_url;
                        }
                        return;
                    }

                    try {
                        const response = await fetch(`/admin/notifications/${notification.id}/read`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                            }
                        });

                        if (response.ok) {
                            notification.is_read = true;
                            this.unreadCount = Math.max(0, this.unreadCount - 1);

                            // Navigate to action URL if provided
                            if (notification.action_url) {
                                setTimeout(() => {
                                    window.location.href = notification.action_url;
                                }, 200);
                            }
                        }
                    } catch (error) {
                        console.error('Failed to mark notification as read:', error);
                    }
                },

                async markAllAsRead() {
                    try {
                        const response = await fetch('{{ route("admin.notifications.read-all") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        });

                        if (response.ok) {
                            this.notifications.forEach(n => n.is_read = true);
                            this.unreadCount = 0;
                        }
                    } catch (error) {
                        console.error('Failed to mark all as read:', error);
                    }
                },

                getColorBg(color) {
                    const colors = {
                        blue: 'bg-cyan-500/10 border border-cyan-400/30',
                        green: 'bg-emerald-500/10 border border-emerald-400/30',
                        red: 'bg-rose-500/10 border border-rose-400/30',
                        yellow: 'bg-amber-500/10 border border-amber-400/30',
                        purple: 'bg-violet-500/10 border border-violet-400/30'
                    };
                    return colors[color] || 'bg-slate-800/40 border border-slate-700/40';
                },

                getColorText(color) {
                    const colors = {
                        blue: 'text-cyan-200',
                        green: 'text-emerald-200',
                        red: 'text-rose-200',
                        yellow: 'text-amber-200',
                        purple: 'text-violet-200'
                    };
                    return colors[color] || 'text-slate-200';
                }
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
