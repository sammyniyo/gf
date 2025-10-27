@extends('admin.layout')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('admin.events.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Events
        </a>
        <h1 class="mt-2 text-3xl font-bold text-gray-900">{{ $event->name }} - Registrations</h1>
        <p class="mt-2 text-gray-600">{{ $registrations->total() }} {{ Str::plural('registration', $registrations->total()) }} for this event</p>
    </div>

    <!-- Event Info Card -->
    <div class="p-6 mb-6 bg-white rounded-lg shadow">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div>
                <p class="text-sm font-medium text-gray-600">Date</p>
                <p class="mt-1 text-lg text-gray-900">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Time</p>
                <p class="mt-1 text-lg text-gray-900">{{ $event->time }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Location</p>
                <p class="mt-1 text-lg text-gray-900">{{ $event->location }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Total Tickets</p>
                <p class="mt-1 text-lg text-gray-900">{{ $registrations->sum('tickets') }}</p>
            </div>
        </div>
    </div>

    <!-- Registrations Table -->
    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Email</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Phone</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Tickets</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Code</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($registrations as $registration)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $registration->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $registration->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $registration->phone ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">
                                    {{ $registration->tickets }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-mono text-gray-900">{{ $registration->registration_code }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $registration->created_at->format('M d, Y') }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">No registrations found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($registrations->hasPages())
        <div class="mt-4">
            {{ $registrations->links() }}
        </div>
    @endif
</div>
@endsection

