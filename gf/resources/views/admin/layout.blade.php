<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-100 antialiased">
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
        body {
            font-family: 'Inter', sans-serif;
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
            color: #475569;
            transition: all 0.25s ease;
        }

        .sidebar-link:hover {
            color: #0f172a;
            background: rgba(241, 245, 249, 0.8);
        }

        .sidebar-link svg {
            width: 1.25rem;
            height: 1.25rem;
        }

        .sidebar-link.active {
            color: #0f172a;
            background: linear-gradient(120deg, rgba(224, 231, 255, 0.9), rgba(199, 210, 254, 0.95));
            border: 1px solid rgba(99, 102, 241, 0.25);
            box-shadow: 0 22px 45px -28px rgba(79, 70, 229, 0.42);
        }

        .sidebar-dot {
            display: inline-flex;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 9999px;
            background: #818cf8;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.86);
            border: 1px solid rgba(226, 232, 240, 0.7);
            box-shadow: 0 18px 45px -35px rgba(15, 23, 42, 0.4);
            border-radius: 1.25rem;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5f5;
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a5b4fc;
        }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen bg-slate-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:flex-col lg:w-72 bg-white/85 backdrop-blur border-r border-slate-200">
            <div class="px-6 pt-8 pb-6 border-b border-slate-200/70">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-slate-900 text-white shadow-sm">
                        <span class="text-sm font-semibold tracking-wide">GF</span>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.25em] text-slate-400">Admin</p>
                        <h1 class="text-lg font-semibold text-slate-900 leading-tight">God's Family Choir</h1>
                    </div>
                </div>
            </div>

            <div class="px-6 py-6 border-b border-slate-200/70">
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center w-12 h-12 text-slate-700 rounded-xl bg-slate-100 border border-slate-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-500 truncate">Administrator</p>
                    </div>
                </div>
                        </div>

            <nav class="flex-1 overflow-y-auto px-4 py-8 space-y-8">
                <div>
                    <p class="px-3 text-xs font-semibold uppercase tracking-widest text-slate-400">Overview</p>
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
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold text-indigo-600 bg-indigo-100 rounded-full">{{ $upcoming_events_count }}</span>
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

                        <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="flex-1">Messages</span>
                            @if(isset($unread_contacts_count) && $unread_contacts_count > 0)
                                <span class="inline-flex items-center px-2 py-0.5 text-xs font-semibold text-rose-600 bg-rose-100 rounded-full animate-pulse">{{ $unread_contacts_count }}</span>
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
                    <p class="px-3 text-xs font-semibold uppercase tracking-widest text-slate-400">Content</p>
                    <div class="mt-3 space-y-1.5">
                        <a href="{{ route('admin.stories.index') }}" class="sidebar-link {{ request()->routeIs('admin.stories.*') ? 'active' : '' }}">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="flex-1">Behind Stories</span>
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
                    </div>
                </div>

                <div>
                    <p class="px-3 text-xs font-semibold uppercase tracking-widest text-slate-400">Workspace</p>
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

            <div class="px-6 py-6 mt-auto border-t border-slate-200/70">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400/40 focus:ring-offset-2 focus:ring-offset-slate-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="sticky top-0 z-30 border-b border-slate-200/70 bg-white/85 backdrop-blur">
                <div class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <h2 class="text-lg font-semibold text-slate-900">@yield('page-title', 'Dashboard')</h2>
                            <span class="inline-flex items-center rounded-full border border-slate-200 bg-white/70 px-2.5 py-0.5 text-xs font-medium text-slate-500">Live overview</span>
                        </div>
                        <p class="mt-1 text-sm text-slate-500 hidden sm:block">Refine the choir's operations with a crystal-clear command center.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden md:flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-1.5 shadow-sm">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input type="search" placeholder="Search workspace" class="w-full border-0 bg-transparent text-sm text-slate-600 placeholder:text-slate-400 focus:outline-none focus:ring-0" />
                </div>

                        <!-- Notifications -->
                        <div x-data="notificationDropdown()" class="relative">
                            <button @click="toggleDropdown()" class="relative inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-3 py-2 text-slate-500 transition hover:border-slate-300 hover:text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400/40">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                 class="absolute right-0 mt-2 w-96 origin-top-right rounded-2xl bg-white border border-slate-200 shadow-2xl z-50"
                                 style="display: none;">

                                <!-- Header -->
                                <div class="px-5 py-4 border-b border-slate-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-900">Notifications</h3>
                                        <button @click="markAllAsRead()"
                                                x-show="unreadCount > 0"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition">
                                            Mark all read
                                        </button>
                                    </div>
                                </div>

                                <!-- Notifications List -->
                                <div class="max-h-96 overflow-y-auto">
                                    <template x-if="notifications.length === 0">
                                        <div class="px-5 py-8 text-center">
                                            <svg class="w-12 h-12 mx-auto text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="mt-2 text-sm text-slate-500">No notifications yet</p>
                                        </div>
                                    </template>

                                    <template x-for="notification in notifications" :key="notification.id">
                                        <div @click="markAsRead(notification)"
                                             class="px-5 py-4 border-b border-slate-100 hover:bg-slate-50 transition cursor-pointer"
                                             :class="{ 'bg-indigo-50/30': !notification.is_read }">
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
                                                        <span x-show="!notification.is_read" class="flex-shrink-0 w-2 h-2 rounded-full bg-indigo-500"></span>
                                                    </div>
                                                    <p class="mt-1 text-sm text-slate-600 line-clamp-2" x-text="notification.message"></p>
                                                    <p class="mt-1 text-xs text-slate-400" x-text="notification.relative_time"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <!-- Footer -->
                                <div class="px-5 py-3 bg-slate-50 rounded-b-2xl border-t border-slate-200">
                                    <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 transition">
                                        View all notifications
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="hidden sm:flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-sm font-semibold text-slate-600 shadow-sm">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6a9 9 0 110 12 9 9 0 010-12z" />
                            </svg>
                            <span id="current-time">{{ now()->format('M d, Y · H:i') }}</span>
            </div>

                        <a href="{{ route('admin.events.create') }}" class="hidden sm:inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400/50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Quick Create
                    </a>
                </div>
            </div>
            </header>

            <main class="flex-1 overflow-y-auto">
                <div class="py-10">
                    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 space-y-6">
                        @if(session('success'))
                            <div class="glass-card px-5 py-4 backdrop-blur">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-semibold text-emerald-700">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

                        @if(session('error'))
                            <div class="glass-card px-5 py-4 backdrop-blur border-rose-200/60">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-semibold text-rose-700">{{ session('error') }}</p>
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
                        blue: 'bg-blue-100',
                        green: 'bg-emerald-100',
                        red: 'bg-rose-100',
                        yellow: 'bg-amber-100',
                        purple: 'bg-purple-100'
                    };
                    return colors[color] || 'bg-slate-100';
                },

                getColorText(color) {
                    const colors = {
                        blue: 'text-blue-600',
                        green: 'text-emerald-600',
                        red: 'text-rose-600',
                        yellow: 'text-amber-600',
                        purple: 'text-purple-600'
                    };
                    return colors[color] || 'text-slate-600';
                }
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
