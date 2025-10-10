@extends('admin.layout')

@section('page-title', 'Contact Messages')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="mb-8 overflow-hidden rounded-2xl gradient-bg-3">
        <div class="px-8 py-8">
            <div class="flex flex-col justify-between lg:flex-row lg:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white">Contact Messages</h1>
                    <p class="mt-2 text-lg text-blue-100">Manage all contact form submissions and inquiries</p>
                </div>
                <div class="flex flex-wrap gap-4 mt-4 lg:mt-0">
                    <div class="flex items-center px-4 py-2 space-x-2 bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                        <span class="text-sm font-medium text-white">Total:</span>
                        <span class="text-2xl font-bold text-white">{{ $contacts->total() }}</span>
                    </div>
                    <div class="flex items-center px-4 py-2 space-x-2 bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                        <svg class="w-5 h-5 text-white animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                        <span class="text-sm font-medium text-white">Unread:</span>
                        <span class="text-2xl font-bold text-white">{{ $contacts->where('is_read', false)->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex gap-2 mb-6 overflow-x-auto">
        <button class="filter-tab active px-6 py-3 text-sm font-semibold text-white transition-all duration-200 rounded-xl gradient-bg-3" data-filter="all">
            All Messages ({{ $contacts->total() }})
        </button>
        <button class="filter-tab px-6 py-3 text-sm font-semibold text-gray-700 transition-all duration-200 bg-white rounded-xl hover:bg-gray-50" data-filter="unread">
            Unread ({{ $contacts->where('is_read', false)->count() }})
        </button>
        <button class="filter-tab px-6 py-3 text-sm font-semibold text-gray-700 transition-all duration-200 bg-white rounded-xl hover:bg-gray-50" data-filter="read">
            Read ({{ $contacts->where('is_read', true)->count() }})
        </button>
    </div>

    <!-- Messages List -->
    <div class="space-y-4">
        @forelse($contacts as $contact)
            <div class="message-card overflow-hidden transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-xl border {{ $contact->is_read ? 'border-gray-100' : 'border-blue-200 bg-blue-50' }}"
                data-status="{{ $contact->is_read ? 'read' : 'unread' }}">
                <div class="p-6">
                    <div class="flex flex-col justify-between lg:flex-row lg:items-start">
                        <!-- Left Side - Sender Info -->
                        <div class="flex items-start flex-1 space-x-4">
                            <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 text-2xl font-bold text-white rounded-full {{ $contact->is_read ? 'bg-gray-400' : 'gradient-bg-3' }}">
                                {{ substr($contact->name, 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-3">
                                    <h3 class="text-xl font-bold text-gray-900">{{ $contact->name }}</h3>
                                    @if(!$contact->is_read)
                                        <span class="flex items-center px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full animate-pulse">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                            </svg>
                                            New
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-semibold text-gray-700 bg-gray-100 rounded-full">
                                            Read
                                        </span>
                                    @endif
                                </div>

                                <div class="flex flex-wrap gap-3 mt-2">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <a href="mailto:{{ $contact->email }}" class="text-sm text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                                    </div>
                                    @if($contact->phone ?? false)
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span class="text-sm text-gray-600">{{ $contact->phone }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Subject & Preview -->
                                <div class="p-4 mt-4 rounded-lg bg-gradient-to-br from-gray-50 to-blue-50">
                                    <p class="text-xs font-semibold tracking-wide text-gray-500 uppercase">Subject</p>
                                    <p class="mt-1 text-sm font-bold text-gray-900">{{ $contact->subject ?? 'No subject' }}</p>

                                    @if($contact->message ?? false)
                                        <p class="mt-3 text-xs font-semibold tracking-wide text-gray-500 uppercase">Message Preview</p>
                                        <p class="mt-1 text-sm text-gray-700 line-clamp-2">{{ Str::limit($contact->message, 150) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Date & Actions -->
                        <div class="flex flex-col items-end mt-4 space-y-4 lg:mt-0 lg:ml-6">
                            <div class="text-right">
                                <p class="text-xs font-medium text-gray-600">Received</p>
                                <p class="text-sm font-semibold text-gray-900">{{ $contact->created_at->format('M d, Y') }}</p>
                                <p class="text-xs text-gray-500">{{ $contact->created_at->format('h:i A') }}</p>
                                <p class="mt-1 text-xs font-medium text-blue-600">{{ $contact->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="flex flex-col gap-2 lg:items-end">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                    class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white transition-all duration-200 rounded-lg gradient-bg-3 hover:scale-105 whitespace-nowrap">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View Full Message
                                </a>

                                <div class="flex gap-2">
                                    @if(!$contact->is_read)
                                        <form action="{{ route('admin.contacts.read', $contact) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-green-500 rounded-lg hover:bg-green-600 hover:scale-105">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                                Mark as Read
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.contacts.unread', $contact) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 bg-gray-200 rounded-lg hover:bg-gray-300 hover:scale-105">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                Mark Unread
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
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
            </div>
        @empty
            <div class="py-24 text-center bg-white shadow-lg rounded-2xl">
                <div class="flex flex-col items-center">
                    <div class="p-6 rounded-full gradient-bg-3">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-6 text-2xl font-bold text-gray-900">No Messages Yet</h3>
                    <p class="mt-2 text-gray-600">Contact form submissions will appear here</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($contacts->hasPages())
        <div class="mt-8">
            <div class="p-6 bg-white shadow-lg rounded-2xl">
                {{ $contacts->links() }}
            </div>
        </div>
    @endif
</div>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterTabs = document.querySelectorAll('.filter-tab');
    const messageCards = document.querySelectorAll('.message-card');

    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active tab
            filterTabs.forEach(t => {
                t.classList.remove('active', 'gradient-bg-3', 'text-white');
                t.classList.add('bg-white', 'text-gray-700');
            });

            this.classList.add('active', 'gradient-bg-3', 'text-white');
            this.classList.remove('bg-white', 'text-gray-700');

            // Filter messages
            messageCards.forEach(card => {
                const status = card.dataset.status;

                if (filter === 'all' || status === filter) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endpush
@endsection
