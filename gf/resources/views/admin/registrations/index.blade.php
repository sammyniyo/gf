@extends('admin.layout')

@section('page-title', 'Event Registrations')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="mb-8 overflow-hidden rounded-2xl gradient-bg">
        <div class="px-8 py-8">
            <div class="flex flex-col justify-between lg:flex-row lg:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white">Event Registrations</h1>
                    <p class="mt-2 text-lg text-purple-100">Manage all event registrations and ticket codes</p>
                </div>
                <div class="mt-4 lg:mt-0">
                    <a href="{{ route('admin.registrations.export') }}" class="inline-flex items-center px-6 py-3 text-sm font-semibold text-white transition-all duration-200 transform bg-white rounded-xl bg-opacity-20 backdrop-filter backdrop-blur-lg hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Export to CSV
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-4">
        <div class="p-6 bg-white shadow-lg rounded-2xl border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Registrations</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $registrations->total() }}</p>
                </div>
                <div class="p-3 rounded-xl gradient-bg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white shadow-lg rounded-2xl border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Tickets</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">{{ $registrations->sum('tickets') }}</p>
                </div>
                <div class="p-3 rounded-xl gradient-bg-3">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white shadow-lg rounded-2xl border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">This Month</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $registrations->filter(function($reg) { return $reg->created_at->isCurrentMonth(); })->count() }}
                    </p>
                </div>
                <div class="p-3 rounded-xl gradient-bg-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="p-6 bg-white shadow-lg rounded-2xl border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Today</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900">
                        {{ $registrations->filter(function($reg) { return $reg->created_at->isToday(); })->count() }}
                    </p>
                </div>
                <div class="p-3 rounded-xl gradient-bg-2">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrations Cards -->
    <div class="space-y-4">
        @forelse($registrations as $registration)
            <div class="overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl border border-gray-100">
                <div class="p-6">
                    <div class="flex flex-col justify-between lg:flex-row lg:items-center">
                        <!-- Left Side - User Info -->
                        <div class="flex items-center flex-1 space-x-4">
                            <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 text-2xl font-bold text-white rounded-full gradient-bg">
                                {{ substr($registration->name, 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl font-bold text-gray-900">{{ $registration->name }}</h3>
                                <div class="flex flex-wrap gap-3 mt-2">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm text-gray-600">{{ $registration->email }}</span>
                                    </div>
                                    @if($registration->phone)
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span class="text-sm text-gray-600">{{ $registration->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Center - Event & Ticket Info -->
                        <div class="flex flex-wrap gap-4 mt-4 lg:mt-0 lg:mx-6">
                            <div class="p-4 rounded-xl bg-gradient-to-br from-purple-50 to-blue-50">
                                <p class="text-xs font-medium text-gray-600">Event</p>
                                <p class="mt-1 text-sm font-bold text-gray-900">{{ $registration->event->name ?? 'N/A' }}</p>
                            </div>

                            <div class="p-4 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50">
                                <p class="text-xs font-medium text-gray-600">Tickets</p>
                                <div class="flex items-center mt-1 space-x-2">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                    <span class="text-sm font-bold text-gray-900">{{ $registration->tickets }}</span>
                                </div>
                            </div>

                            <div class="p-4 rounded-xl bg-gradient-to-br from-orange-50 to-pink-50">
                                <p class="text-xs font-medium text-gray-600">Registration Code</p>
                                <p class="mt-1 text-sm font-mono font-bold text-gray-900">{{ $registration->registration_code }}</p>
                            </div>
                        </div>

                        <!-- Right Side - Date & Actions -->
                        <div class="flex flex-col items-end mt-4 space-y-3 lg:mt-0">
                            <div class="text-right">
                                <p class="text-xs font-medium text-gray-600">Registered</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $registration->created_at->format('M d, Y') }}</p>
                                <p class="text-xs text-gray-500">{{ $registration->created_at->format('h:i A') }}</p>
                            </div>

                            <div class="flex gap-2">
                                <a href="{{ route('admin.registrations.show', $registration) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 rounded-lg gradient-bg hover:scale-105">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Details
                                </a>
                                <form action="{{ route('admin.registrations.destroy', $registration) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-red-500 rounded-lg hover:bg-red-600 hover:scale-105">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="py-24 text-center bg-white shadow-lg rounded-2xl">
                <div class="flex flex-col items-center">
                    <div class="p-6 rounded-full gradient-bg">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-2xl font-bold text-gray-900">No Registrations Yet</h3>
                    <p class="mt-2 text-gray-600">Event registrations will appear here once people start signing up</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($registrations->hasPages())
        <div class="mt-8">
            <div class="p-6 bg-white shadow-lg rounded-2xl">
                {{ $registrations->links() }}
            </div>
        </div>
    @endif
</div>
@endsection
