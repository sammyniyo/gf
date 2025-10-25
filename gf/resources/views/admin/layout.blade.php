<!DOCTYPE html>
<html lang="en" class="h-full antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <style>
        :root {
            --admin-bg: #eef2ff;
            --admin-bg-alt: #f8fafc;
            --admin-surface: rgba(255, 255, 255, 0.82);
            --admin-surface-strong: rgba(255, 255, 255, 0.97);
            --admin-border: rgba(15, 23, 42, 0.08);
            --admin-border-soft: rgba(148, 163, 184, 0.18);
            --admin-text: #0f172a;
            --admin-text-muted: rgba(15, 23, 42, 0.64);
            --admin-accent: #6366f1;
            --admin-accent-strong: #4338ca;
            --admin-accent-soft: rgba(99, 102, 241, 0.12);
            --admin-success: #16a34a;
            --admin-warning: #f59e0b;
            --admin-danger: #ef4444;
            --admin-shadow-soft: 0 18px 40px -22px rgba(15, 23, 42, 0.28);
            --admin-shadow-strong: 0 32px 64px -28px rgba(79, 70, 229, 0.35);
            --admin-ring: 0 0 0 1px rgba(99, 102, 241, 0.18);
            --admin-radius-lg: 1.25rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--admin-text);
        }

        .admin-body {
            background:
                radial-gradient(120% 120% at 0% 0%, rgba(129, 140, 248, 0.18), transparent 52%),
                radial-gradient(140% 140% at 100% 0%, rgba(14, 165, 233, 0.12), transparent 48%),
                linear-gradient(180deg, rgba(248, 250, 252, 0.85), rgba(241, 245, 249, 0.98));
        }

        .admin-sidebar {
            background: var(--admin-surface);
            border-right: 1px solid var(--admin-border);
            box-shadow: var(--admin-shadow-soft);
            backdrop-filter: blur(24px);
        }

        .sidebar-section {
            border-bottom: 1px solid var(--admin-border);
        }

        .sidebar-footer {
            border-top: 1px solid var(--admin-border);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.65rem 0.85rem;
            border-radius: 0.95rem;
            font-weight: 600;
            font-size: 0.9375rem;
            color: var(--admin-text-muted);
            transition: all 0.25s ease;
            position: relative;
            background: transparent;
            border: 1px solid transparent;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(120deg, rgba(148, 163, 184, 0.12), transparent 75%);
            opacity: 0;
            transform: translateY(6px);
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            color: var(--admin-text);
            border-color: var(--admin-border-soft);
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 18px 36px -22px rgba(99, 102, 241, 0.45);
            transform: translateY(-2px);
        }

        .sidebar-link:hover::before {
            opacity: 1;
            transform: translateY(0);
        }

        .sidebar-link svg {
            width: 1.2rem;
            height: 1.2rem;
            color: var(--admin-text-muted);
            transition: color 0.25s ease;
        }

        .sidebar-link:hover svg,
        .sidebar-link.active svg {
            color: var(--admin-accent);
        }

        .sidebar-link.active {
            color: var(--admin-text);
            background: linear-gradient(120deg, rgba(99, 102, 241, 0.18), rgba(129, 140, 248, 0.24));
            border-color: rgba(99, 102, 241, 0.32);
            box-shadow: var(--admin-shadow-strong);
        }

        .sidebar-dot {
            display: inline-flex;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            background: radial-gradient(circle at 40% 40%, var(--admin-accent) 0%, var(--admin-accent-strong) 75%);
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.35);
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.75; transform: scale(1.08); }
        }

        .admin-brand__mark {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.18), rgba(79, 70, 229, 0.12));
            border-radius: 1.1rem;
            border: 1px solid rgba(99, 102, 241, 0.28);
            box-shadow: var(--admin-shadow-soft);
            color: var(--admin-accent);
        }

        .admin-brand__label {
            color: var(--admin-text-muted);
            letter-spacing: 0.35em;
        }

        .admin-brand__title {
            color: var(--admin-text);
        }

        .admin-user-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.75), rgba(236, 233, 255, 0.7));
            border: 1px solid rgba(148, 163, 184, 0.35);
            border-radius: 1.1rem;
            box-shadow: 0 18px 32px -20px rgba(79, 70, 229, 0.4);
        }

        .admin-user-card__avatar {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.95), rgba(37, 99, 235, 0.9));
            border: 1px solid rgba(129, 140, 248, 0.35);
            box-shadow: 0 18px 32px -16px rgba(99, 102, 241, 0.45);
        }

        .admin-avatar-badge {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.75), rgba(79, 70, 229, 0.6));
            border: 1px solid rgba(129, 140, 248, 0.35);
            color: #ffffff;
            box-shadow: 0 12px 28px rgba(99, 102, 241, 0.25);
        }

        .admin-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            border-radius: 9999px;
            border: 1px solid rgba(148, 163, 184, 0.28);
            background: rgba(148, 163, 184, 0.12);
            color: var(--admin-text-muted);
            font-weight: 600;
            padding: 0.15rem 0.65rem;
        }

        .admin-pill--accent {
            border-color: rgba(99, 102, 241, 0.36);
            background: rgba(99, 102, 241, 0.18);
            color: var(--admin-accent-strong);
        }

        .admin-pill--alert {
            border-color: rgba(239, 68, 68, 0.28);
            background: rgba(254, 202, 202, 0.2);
            color: #b91c1c;
        }

        .glass-card {
            background: var(--admin-surface-strong);
            border: 1px solid var(--admin-border);
            box-shadow: var(--admin-shadow-soft);
            border-radius: var(--admin-radius-lg);
            backdrop-filter: blur(26px);
            color: var(--admin-text);
        }

        .admin-header {
            background: linear-gradient(120deg, rgba(255, 255, 255, 0.92), rgba(248, 250, 252, 0.94));
            border-bottom: 1px solid var(--admin-border);
            box-shadow: 0 20px 48px -28px rgba(15, 23, 42, 0.38);
            backdrop-filter: blur(18px);
        }

        .admin-header__badge {
            border-radius: 9999px;
            border: 1px solid rgba(99, 102, 241, 0.24);
            background: rgba(99, 102, 241, 0.14);
            color: var(--admin-accent-strong);
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
            background: var(--admin-accent-strong);
            box-shadow: 0 0 8px rgba(99, 102, 241, 0.45);
        }

        .admin-quick-action {
            border-radius: 0.95rem;
            border: 1px solid rgba(99, 102, 241, 0.4);
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.95), rgba(99, 102, 241, 0.9));
            box-shadow: 0 24px 46px -22px rgba(79, 70, 229, 0.55);
            color: #ffffff;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .admin-quick-action:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 32px 54px -20px rgba(79, 70, 229, 0.6);
        }

        .admin-quick-action:focus {
            outline: none;
            box-shadow: var(--admin-ring), 0 0 0 4px rgba(165, 180, 252, 0.35);
        }

        .admin-icon-button {
            border-radius: 0.9rem;
            border: 1px solid rgba(203, 213, 225, 0.6);
            background: rgba(255, 255, 255, 0.78);
            color: var(--admin-text-muted);
            transition: all 0.2s ease;
            box-shadow: 0 14px 28px -20px rgba(15, 23, 42, 0.4);
        }

        .admin-icon-button:hover {
            color: var(--admin-text);
            border-color: rgba(99, 102, 241, 0.32);
            background: rgba(255, 255, 255, 0.92);
            box-shadow: 0 18px 36px -18px rgba(99, 102, 241, 0.35);
        }

        .admin-icon-button:focus {
            outline: none;
            box-shadow: var(--admin-ring), 0 0 0 4px rgba(165, 180, 252, 0.35);
        }

        .admin-danger-btn {
            border-radius: 0.95rem;
            border: 1px solid rgba(239, 68, 68, 0.35);
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.92), rgba(248, 113, 113, 0.88));
            color: #ffffff;
            font-weight: 700;
            transition: all 0.2s ease;
            box-shadow: 0 24px 44px -22px rgba(239, 68, 68, 0.4);
        }

        .admin-danger-btn:hover {
            background: linear-gradient(135deg, rgba(220, 38, 38, 0.92), rgba(248, 113, 113, 0.88));
            box-shadow: 0 30px 52px -24px rgba(239, 68, 68, 0.45);
        }

        .admin-main {
            position: relative;
            z-index: 0;
        }

        .admin-main::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(120% 120% at 50% -20%, rgba(99, 102, 241, 0.08), transparent 65%),
                linear-gradient(180deg, rgba(255, 255, 255, 0.55), rgba(248, 250, 252, 0.9));
            pointer-events: none;
            z-index: -1;
        }

        #admin-toast-container {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            width: min(320px, calc(100vw - 3rem));
            pointer-events: none;
        }

        #admin-toast-container > * {
            pointer-events: auto;
        }

        .admin-toast {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            width: 100%;
            border-radius: 1rem;
            border: 1px solid rgba(148, 163, 184, 0.3);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(241, 245, 249, 0.95));
            color: var(--admin-text);
            box-shadow: 0 22px 48px -24px rgba(15, 23, 42, 0.35);
            backdrop-filter: blur(18px);
            padding: 0.95rem 1.1rem;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.35s ease, transform 0.35s ease, box-shadow 0.35s ease;
        }

        .admin-toast--enter {
            opacity: 1;
            transform: translateY(0);
        }

        .admin-toast--leaving {
            opacity: 0;
            transform: translateY(-6px);
        }

        .admin-toast__icon {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 9999px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.18);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.45);
        }

        .admin-toast__message {
            flex: 1;
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .admin-toast__close {
            position: absolute;
            top: 0.4rem;
            right: 0.4rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 1.75rem;
            height: 1.75rem;
            border-radius: 9999px;
            background: rgba(15, 23, 42, 0.04);
            border: 1px solid rgba(148, 163, 184, 0.28);
            color: var(--admin-text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .admin-toast__close:hover {
            background: rgba(15, 23, 42, 0.08);
            color: var(--admin-text);
        }

        .admin-toast--success,
        .admin-toast-success {
            border-color: rgba(34, 197, 94, 0.28);
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.16), rgba(187, 247, 208, 0.18));
            color: #166534;
        }

        .admin-toast--success .admin-toast__icon,
        .admin-toast-success .admin-toast__icon {
            background: rgba(34, 197, 94, 0.14);
            border-color: rgba(34, 197, 94, 0.28);
            color: #15803d;
        }

        .admin-toast--info {
            border-color: rgba(59, 130, 246, 0.28);
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.14), rgba(191, 219, 254, 0.2));
            color: #1d4ed8;
        }

        .admin-toast--info .admin-toast__icon {
            background: rgba(59, 130, 246, 0.16);
            border-color: rgba(59, 130, 246, 0.24);
            color: #1d4ed8;
        }

        .admin-toast--warning {
            border-color: rgba(245, 158, 11, 0.3);
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.14), rgba(253, 230, 138, 0.22));
            color: #b45309;
        }

        .admin-toast--warning .admin-toast__icon {
            background: rgba(245, 158, 11, 0.2);
            border-color: rgba(245, 158, 11, 0.3);
            color: #b45309;
        }

        .admin-toast--error,
        .admin-toast-error {
            border-color: rgba(239, 68, 68, 0.3);
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.16), rgba(254, 202, 202, 0.2));
            color: #b91c1c;
        }

        .admin-toast--error .admin-toast__icon,
        .admin-toast-error .admin-toast__icon {
            background: rgba(239, 68, 68, 0.16);
            border-color: rgba(239, 68, 68, 0.3);
            color: #b91c1c;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
            background-color: transparent;
        }

        ::-webkit-scrollbar-track {
            background: rgba(226, 232, 240, 0.6);
            border-radius: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(99, 102, 241, 0.7), rgba(129, 140, 248, 0.75));
            border-radius: 8px;
            box-shadow: 0 0 6px rgba(99, 102, 241, 0.35);
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(79, 70, 229, 0.85), rgba(99, 102, 241, 0.85));
        }

        @supports (scrollbar-color: auto) {
            :root {
                scrollbar-width: thin;
                scrollbar-color: rgba(99, 102, 241, 0.65) rgba(226, 232, 240, 0.6);
            }
        }

        .section-title {
            color: var(--admin-text-muted);
            text-shadow: none;
            font-weight: 700;
            letter-spacing: 0.18em;
        }

        @media (max-width: 1024px) {
            .admin-sidebar {
                box-shadow: none;
                border-right: none;
            }
        }
    </style>


    @stack('styles')
</head>
<body class="min-h-screen transition-colors admin-body">
    <div id="admin-toast-container" aria-live="polite" aria-atomic="true"></div>
    <script>
        window.__adminToastQueue = window.__adminToastQueue || [];
    </script>
    @if(session('success'))
        <script>
            window.__adminToastQueue.push({ type: 'success', message: @json(session('success')) });
        </script>
    @endif
    @if(session('error'))
        <script>
            window.__adminToastQueue.push({ type: 'error', message: @json(session('error')) });
        </script>
    @endif
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:flex-col lg:w-72 admin-sidebar lg:fixed lg:inset-y-0 lg:left-0 lg:z-40 lg:h-screen lg:overflow-y-auto">
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
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs font-medium text-slate-500 truncate">Administrator</p>
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

                        <a href="{{ route('admin.albums.index') }}" class="sidebar-link {{ request()->routeIs('admin.albums.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                            <span class="flex-1">Albums (Shop)</span>
                            @php
                                $albumsCount = \App\Models\Album::where('is_active', true)->count();
                            @endphp
                            @if($albumsCount > 0)
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold admin-pill admin-pill--accent">{{ $albumsCount }}</span>
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
                    <button type="submit" class="admin-danger-btn w-full inline-flex items-center justify-center gap-2 px-4 py-3 text-sm transition-all focus:outline-none focus:ring-2 focus:ring-rose-300 focus:ring-offset-2 focus:ring-offset-white">
                        <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden lg:ml-72">
            <header class="sticky top-0 z-30 admin-header">
                <div class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-5">
                    <div class="flex items-center gap-4">
                        <div class="hidden lg:flex items-center justify-center w-12 h-12 admin-brand__mark">
                            <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center gap-2.5">
                                <h2 class="text-xl font-semibold text-slate-900 tracking-tight">@yield('page-title', 'Dashboard')</h2>
                                <span class="inline-flex items-center gap-1.5 admin-header__badge">
                                    <span class="admin-header__badge-dot animate-pulse"></span>
                                    Live
                                </span>
                            </div>
                            <p class="mt-0.5 text-sm text-slate-500 hidden sm:block font-medium">Manage your choir's operations efficiently</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <!-- Quick Create -->
                        <div x-data="{ open:false }" class="relative">
                            <button @click="open=!open" @click.away="open=false" class="admin-quick-action inline-flex items-center gap-2 px-4 py-2.5 text-sm">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
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
                                 class="absolute right-0 mt-2 w-56 rounded-xl border border-slate-200 bg-white/95 backdrop-blur-md py-2 shadow-xl shadow-slate-200 z-50"
                                 style="display:none;">
                                <a href="{{ route('admin.events.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    New Event
                                </a>
                                <a href="{{ route('admin.devotions.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    New Devotion
                                </a>
                                <a href="{{ route('admin.stories.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                    </svg>
                                    New Story
                                </a>
                                <a href="{{ route('admin.resources.create') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-indigo-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                        <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                    </svg>
                                    Upload Resource
                                </a>
                                <div class="my-1.5 border-t border-slate-200"></div>
                                <a href="{{ route('registration.member') }}" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-100 transition-colors rounded-lg">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                    </svg>
                                    Register Member
                                </a>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div x-data="notificationDropdown()" class="relative">
                            <button @click="toggleDropdown()" class="admin-icon-button relative inline-flex items-center justify-center w-11 h-11">
                                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                 class="absolute right-0 mt-2 w-96 origin-top-right rounded-2xl bg-white/95 border border-slate-200 backdrop-blur-md shadow-xl shadow-slate-200 z-50"
                                 style="display: none;">

                                <!-- Header -->
                                <div class="px-5 py-4 border-b border-slate-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-900">Notifications</h3>
                                        <button @click="markAllAsRead()"
                                                x-show="unreadCount > 0"
                                                class="text-sm font-medium text-indigo-500 hover:text-cyan-200 transition">
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
                                             class="px-5 py-4 border-b border-slate-200 transition cursor-pointer hover:bg-slate-50"
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
                                                        <p class="text-sm font-semibold text-slate-900" x-text="notification.title"></p>
                                                        <span x-show="!notification.is_read" class="flex-shrink-0 w-2 h-2 rounded-full bg-cyan-400 shadow-sm"></span>
                                                    </div>
                                                    <p class="mt-1 text-sm text-slate-500 line-clamp-2" x-text="notification.message"></p>
                                                    <p class="mt-1 text-xs text-slate-500" x-text="notification.relative_time"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <!-- Footer -->
                                <div class="px-5 py-3 bg-slate-50 rounded-b-2xl border-t border-slate-200">
                                    <a href="#" class="text-sm font-medium text-indigo-500 hover:text-cyan-200 transition">
                                        View all notifications
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="hidden lg:flex items-center gap-2.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-600 shadow-sm shadow-slate-200/60">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span id="current-time" class="text-slate-600">{{ now()->format('M d, Y · H:i') }}</span>
                        </div>

                        <!-- Profile Dropdown -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open=!open" @click.away="open=false" class="admin-icon-button inline-flex items-center gap-2.5 pl-2 pr-3 py-2 text-slate-600 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:ring-offset-2 focus:ring-offset-white">
                                <div class="flex items-center justify-center w-8 h-8 rounded-lg admin-avatar-badge">
                                    <span class="text-sm font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                </div>
                                <span class="hidden md:block text-sm font-semibold text-slate-600">{{ Auth::user()->name }}</span>
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
                                 class="absolute right-0 mt-2 w-56 origin-top-right rounded-xl border border-slate-200 bg-white/95 backdrop-blur-md shadow-xl shadow-slate-200 z-50"
                                 style="display:none;">
                                <div class="px-4 py-3 border-b border-slate-200">
                                    <p class="text-sm font-semibold text-slate-900">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-slate-400 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="py-2 space-y-1">
                                    <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 transition rounded-lg">
                                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Profile Settings
                                    </a>
                                    <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 px-4 py-2 text-sm text-slate-600 hover:bg-slate-100 transition rounded-lg">
                                        <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                                        </svg>
                                        View Website
                                    </a>
                                </div>
                                <div class="border-t border-slate-200 py-2">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition rounded-lg">
                                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <main class="admin-main flex-1 overflow-y-auto">
                <div class="py-10">
                    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">
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

        const adminToaster = (() => {
            const container = document.getElementById('admin-toast-container');

            if (!container) {
                return {
                    show: () => null,
                    dismiss: () => {},
                };
            }

            const activeToasts = new Map();
            let counter = 0;

            const icons = {
                success: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 6L9 17l-5-5"/></svg>',
                info: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><line x1="12" y1="11" x2="12" y2="17"/><line x1="12" y1="7" x2="12.01" y2="7"/></svg>',
                warning: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.29 3.86L1.82 18a1 1 0 00.86 1.5h18.64a1 1 0 00.86-1.5L12.71 3.86a1 1 0 00-1.72 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>',
                error: '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>',
            };

            function getIcon(type) {
                return icons[type] || icons.info;
            }

            function dismiss(id) {
                const instance = activeToasts.get(id);
                if (!instance) {
                    return;
                }

                if (instance.timeout) {
                    clearTimeout(instance.timeout);
                }

                const element = instance.el;
                element.classList.remove('admin-toast--enter');
                element.classList.add('admin-toast--leaving');

                activeToasts.delete(id);

                setTimeout(() => {
                    element.remove();
                }, 250);
            }

            function show(message, options = {}) {
                if (!message) {
                    return null;
                }

                const {
                    id,
                    type = 'info',
                    duration = 5000,
                    sticky = false,
                } = options;

                const toastId = id || `toast-${Date.now()}-${++counter}`;
                const normalizedType = Object.prototype.hasOwnProperty.call(icons, type) ? type : 'info';

                if (activeToasts.has(toastId)) {
                    const existing = activeToasts.get(toastId);
                    existing.el.className = `admin-toast admin-toast--${normalizedType} admin-toast--enter`;
                    existing.iconEl.innerHTML = getIcon(normalizedType);
                    existing.messageEl.textContent = message;
                    existing.sticky = sticky;

                    if (existing.timeout) {
                        clearTimeout(existing.timeout);
                        existing.timeout = null;
                    }

                    if (!sticky) {
                        existing.timeout = setTimeout(() => dismiss(toastId), duration);
                    }

                    return toastId;
                }

                const toastEl = document.createElement('div');
                toastEl.className = `admin-toast admin-toast--${normalizedType}`;
                toastEl.setAttribute('role', 'status');
                toastEl.setAttribute('aria-live', normalizedType === 'error' ? 'assertive' : 'polite');

                const iconEl = document.createElement('span');
                iconEl.className = 'admin-toast__icon';
                iconEl.innerHTML = getIcon(normalizedType);
                toastEl.appendChild(iconEl);

                const messageEl = document.createElement('div');
                messageEl.className = 'admin-toast__message';
                messageEl.textContent = message;
                toastEl.appendChild(messageEl);

                const closeButton = document.createElement('button');
                closeButton.type = 'button';
                closeButton.className = 'admin-toast__close';
                closeButton.setAttribute('aria-label', 'Dismiss notification');
                closeButton.innerHTML = '<svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="3" x2="9" y2="9"/><line x1="9" y1="3" x2="3" y2="9"/></svg>';
                closeButton.addEventListener('click', () => dismiss(toastId));
                toastEl.appendChild(closeButton);

                container.prepend(toastEl);
                requestAnimationFrame(() => {
                    toastEl.classList.add('admin-toast--enter');
                });

                let timeoutId = null;
                if (!sticky) {
                    timeoutId = setTimeout(() => dismiss(toastId), duration);
                }

                activeToasts.set(toastId, {
                    el: toastEl,
                    iconEl,
                    messageEl,
                    timeout: timeoutId,
                    sticky,
                });

                return toastId;
            }

            return {
                show,
                dismiss,
            };
        })();

        window.adminToaster = adminToaster;

        (function hydrateToastQueue() {
            const pending = Array.isArray(window.__adminToastQueue) ? window.__adminToastQueue : [];

            window.__adminToastQueue = {
                push(toast) {
                    if (!toast || !toast.message) {
                        return null;
                    }
                    const { message, ...rest } = toast;
                    return adminToaster.show(message, rest);
                }
            };

            pending.forEach(toast => window.__adminToastQueue.push(toast));
        })();

        (function monitorNetworkStatus() {
            const offlineToastId = 'network-status';
            const offlineMessage = 'You are offline. Some actions are unavailable until connection returns.';

            if (!navigator.onLine) {
                adminToaster.show(offlineMessage, {
                    type: 'warning',
                    sticky: true,
                    id: offlineToastId,
                });
            }

            window.addEventListener('offline', () => {
                adminToaster.show(offlineMessage, {
                    type: 'warning',
                    sticky: true,
                    id: offlineToastId,
                });
            });

            window.addEventListener('online', () => {
                adminToaster.dismiss(offlineToastId);
                adminToaster.show('Back online. You can resume your work.', {
                    type: 'success',
                });
            });
        })();

        (function monitorDatabaseStatus() {
            const dbToastId = 'database-status';
            const state = { connected: null };
            const healthEndpoint = '{{ route("admin.system.health") }}';

            async function check() {
                if (!navigator.onLine) {
                    return;
                }

                try {
                    const response = await fetch(healthEndpoint, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        credentials: 'same-origin',
                        cache: 'no-store',
                    });

                    let data = {};
                    try {
                        data = await response.clone().json();
                    } catch (parseError) {
                        data = {};
                    }

                    const isConnected = response.ok && data.database === true;
                    const previous = state.connected;
                    state.connected = isConnected;

                    if (isConnected) {
                        if (previous === false) {
                            adminToaster.dismiss(dbToastId);
                            adminToaster.show('Database connection restored.', { type: 'success' });
                        } else {
                            adminToaster.dismiss(dbToastId);
                        }
                        return;
                    }

                    const message = data && typeof data.message === 'string' && data.message.length
                        ? `Database issue: ${data.message}`
                        : 'Database connection could not be confirmed.';

                    const severity = response.status >= 500 ? 'error' : 'warning';

                    adminToaster.show(message, {
                        type: severity,
                        sticky: true,
                        id: dbToastId,
                    });
                } catch (error) {
                    if (state.connected !== false) {
                        state.connected = false;
                        adminToaster.show('Unable to reach the server for a database check.', {
                            type: 'warning',
                            sticky: true,
                            id: dbToastId,
                        });
                    }
                }
            }

            check();
            setInterval(check, 60000);
        })();

        (function monitorClientErrors() {
            const seen = new Map();
            const ttl = 20000;

            function shouldShow(key) {
                const now = Date.now();
                const last = seen.get(key) || 0;
                if (now - last < ttl) {
                    return false;
                }
                seen.set(key, now);
                return true;
            }

            function sanitise(message) {
                if (!message) {
                    return '';
                }
                const trimmed = String(message).trim();
                return trimmed.length > 140 ? `${trimmed.slice(0, 137)}...` : trimmed;
            }

            window.addEventListener('error', (event) => {
                const message = sanitise(event?.message);
                if (!message) {
                    return;
                }
                const key = `error:${message}`;
                if (!shouldShow(key)) {
                    return;
                }
                adminToaster.show(`Unexpected error: ${message}`, { type: 'error' });
            });

            window.addEventListener('unhandledrejection', (event) => {
                const reason = event?.reason;
                const baseMessage = typeof reason === 'string'
                    ? reason
                    : reason?.message || 'An unexpected promise error occurred.';
                const message = sanitise(baseMessage);
                if (!message) {
                    return;
                }
                const key = `rejection:${message}`;
                if (!shouldShow(key)) {
                    return;
                }
                adminToaster.show(`Unhandled promise rejection: ${message}`, { type: 'error' });
            });
        })();

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
                        blue: 'bg-indigo-100 border border-indigo-200',
                        green: 'bg-emerald-100 border border-emerald-200',
                        red: 'bg-rose-100 border border-rose-200',
                        yellow: 'bg-amber-100 border border-amber-200',
                        purple: 'bg-violet-100 border border-violet-200'
                    };
                    return colors[color] || 'bg-slate-100 border border-slate-200';
                },

                getColorText(color) {
                    const colors = {
                        blue: 'text-indigo-600',
                        green: 'text-emerald-600',
                        red: 'text-rose-600',
                        yellow: 'text-amber-600',
                        purple: 'text-violet-600'
                    };
                    return colors[color] || 'text-slate-600';
                }
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
