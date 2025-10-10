@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Header Bar (neutral) -->
    <div class="mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="mt-1 text-sm text-gray-500">Here's what's happening with your choir today.</p>
            </div>
            <div class="hidden md:flex items-center gap-3">
                <span class="px-3 py-1.5 text-sm text-gray-700 bg-white border border-gray-200 rounded-md">{{ now()->format('M d, Y') }}</span>
            </div>
        </div>
    </div>

    <!-- Stats Grid with Gradients -->
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Total Events Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-md bg-gray-100 text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="px-2 py-0.5 text-xs font-medium text-gray-700 bg-gray-100 rounded">Total</span>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Events</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $total_events }}</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('admin.events.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">View all</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Events Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-md bg-gray-100 text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="px-2 py-0.5 text-xs font-medium text-gray-700 bg-gray-100 rounded">Upcoming</span>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Upcoming Events</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $upcoming_events }}</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('admin.events.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">Manage</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Registrations Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-md bg-gray-100 text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <span class="px-2 py-0.5 text-xs font-medium text-gray-700 bg-gray-100 rounded">Active</span>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Total Registrations</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $total_registrations }}</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                        </svg>
                        <a href="{{ route('admin.registrations.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">View all</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Members Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="p-5">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2 rounded-md bg-gray-100 text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="px-2 py-0.5 text-xs font-medium text-gray-700 bg-gray-100 rounded">Members</span>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500">Choir Members</p>
                    <p class="mt-1 text-2xl font-semibold text-gray-900">{{ $total_members }}</p>
                    <div class="flex items-center mt-3">
                        <svg class="w-4 h-4 mr-1 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        <a href="{{ route('admin.members.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts & Activity Section -->
    <div class="grid grid-cols-1 gap-6 mb-8 lg:grid-cols-3">
        <!-- Recent Activity Timeline -->
        <div class="lg:col-span-2">
            <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-blue-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 rounded-lg gradient-bg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">Recent Activity</h2>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-purple-700 bg-purple-100 rounded-full">Live</span>
                    </div>
                </div>
                <div class="p-6">
                    @if($recent_registrations->count() > 0 || $recent_members->count() > 0)
                        <div class="space-y-6">
                            @foreach($recent_registrations->take(3) as $registration)
                                <div class="flex items-start space-x-4 group">
                                    <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full gradient-bg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-semibold text-gray-900">New Event Registration</p>
                                            <span class="text-xs text-gray-500">{{ $registration->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-600">
                                            <span class="font-medium text-purple-600">{{ $registration->name }}</span> registered for
                                            <span class="font-medium">{{ $registration->event->name ?? 'N/A' }}</span>
                                        </p>
                                        <div class="flex items-center mt-2 space-x-2">
                                            <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $registration->tickets }} {{ Str::plural('ticket', $registration->tickets) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @foreach($recent_members->take(2) as $member)
                                <div class="flex items-start space-x-4 group">
                                    <div class="flex-shrink-0">
                                        @if($member->photo)
                                            <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->first_name }}" class="w-12 h-12 border-2 border-purple-200 rounded-full">
                                        @else
                                            <div class="flex items-center justify-center w-12 h-12 text-lg font-bold text-white rounded-full gradient-bg-2">
                                                {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-semibold text-gray-900">New Choir Member</p>
                                            <span class="text-xs text-gray-500">{{ $member->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-600">
                                            <span class="font-medium text-pink-600">{{ $member->first_name }} {{ $member->last_name }}</span> joined the choir
                                        </p>
                                        <div class="flex items-center mt-2 space-x-2">
                                            @if($member->voice_part)
                                                <span class="inline-flex items-center px-2.5 py-0.5 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                                    🎵 {{ $member->voice_part }}
                                                </span>
                                            @endif
                                            <span class="text-xs text-gray-500">{{ $member->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{ route('admin.registrations.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-purple-600 transition-all duration-200 bg-purple-100 rounded-lg hover:bg-purple-200">
                                View All Activity
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="mt-4 text-sm text-gray-500">No recent activity</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Quick Stats Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions Card -->
            <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-purple-50">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg gradient-bg-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                    </div>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.events.create') }}" class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium text-white transition-all duration-200 transform rounded-xl gradient-bg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Event
                        </span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <a href="{{ route('admin.registrations.export') }}" class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-gray-100 rounded-xl hover:bg-gray-200">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Export Data
                        </span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>

                    <a href="{{ route('admin.contacts.index') }}" class="flex items-center justify-between w-full px-4 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-gray-100 rounded-xl hover:bg-gray-200">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Messages
                        </span>
                        @if($total_contacts > 0)
                            <span class="px-2 py-0.5 text-xs font-semibold text-white bg-red-500 rounded-full">{{ $total_contacts }}</span>
                        @else
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        @endif
                    </a>
                </div>
            </div>

            <!-- System Status Card -->
            <div class="overflow-hidden bg-white shadow-lg rounded-2xl">
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-green-50 to-blue-50">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg gradient-bg-4">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">System Status</h3>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Database</span>
                        <span class="flex items-center text-sm font-semibold text-green-600">
                            <span class="w-2 h-2 mr-2 bg-green-500 rounded-full animate-pulse"></span>
                            Online
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Mail Service</span>
                        <span class="flex items-center text-sm font-semibold text-green-600">
                            <span class="w-2 h-2 mr-2 bg-green-500 rounded-full animate-pulse"></span>
                            Active
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Storage</span>
                        <span class="flex items-center text-sm font-semibold text-green-600">
                            <span class="w-2 h-2 mr-2 bg-green-500 rounded-full animate-pulse"></span>
                            Healthy
                        </span>
                    </div>
                    <div class="pt-4 mt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span>Last Check</span>
                            <span>{{ now()->format('H:i:s') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add animation on load
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.stat-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '1';
            }, index * 100);
        });
    });
</script>
@endpush
