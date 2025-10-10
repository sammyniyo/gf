@extends('admin.layout')

@section('page-title', 'Contact Messages')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Contact Messages</h1>
            <p class="mt-1 text-sm text-slate-500">Manage all contact form submissions and inquiries</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-3 py-1.5 text-xs font-semibold text-slate-600">
                Total: <span class="text-slate-900">{{ $contacts->total() }}</span>
            </span>
            @if($contacts->where('is_read', false)->count() > 0)
                <span class="inline-flex items-center gap-2 rounded-full border border-rose-200 bg-rose-50/70 px-3 py-1.5 text-xs font-semibold text-rose-700 animate-pulse">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    Unread: <span class="text-rose-900">{{ $contacts->where('is_read', false)->count() }}</span>
                </span>
            @endif
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="flex gap-2">
        <button class="filter-tab active rounded-xl px-4 py-2 text-sm font-semibold text-white bg-indigo-600 transition" data-filter="all">
            All ({{ $contacts->total() }})
        </button>
        <button class="filter-tab rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 transition hover:bg-slate-50" data-filter="unread">
            Unread ({{ $contacts->where('is_read', false)->count() }})
        </button>
        <button class="filter-tab rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 bg-white border border-slate-200 transition hover:bg-slate-50" data-filter="read">
            Read ({{ $contacts->where('is_read', true)->count() }})
        </button>
    </div>

    <!-- Messages List -->
    <div class="space-y-4">
        @forelse($contacts as $contact)
            <div class="message-card glass-card overflow-hidden transition-all {{ !$contact->is_read ? 'border-l-4 border-indigo-400' : '' }}"
                data-status="{{ $contact->is_read ? 'read' : 'unread' }}">
                <div class="p-5">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <!-- Left Side - Sender Info -->
                        <div class="flex items-start flex-1 gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl text-lg font-bold {{ $contact->is_read ? 'bg-slate-200 text-slate-600' : 'bg-indigo-100 text-indigo-600' }}">
                                {{ substr($contact->name, 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2.5 flex-wrap">
                                    <h3 class="text-base font-semibold text-slate-900">{{ $contact->name }}</h3>
                                    @if(!$contact->is_read)
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-semibold text-indigo-700 bg-indigo-100 rounded-full">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                            </svg>
                                            New
                                        </span>
                                    @endif
                                </div>

                                <div class="flex flex-wrap gap-3 mt-2">
                                    <a href="mailto:{{ $contact->email }}" class="flex items-center gap-1.5 text-xs text-indigo-600 hover:text-indigo-800">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        {{ $contact->email }}
                                    </a>
                                    @if($contact->phone ?? false)
                                        <div class="flex items-center gap-1.5 text-xs text-slate-600">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            {{ $contact->phone }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Subject & Preview -->
                                <div class="p-3 mt-3 rounded-lg bg-slate-50 border border-slate-200">
                                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Subject</p>
                                    <p class="mt-1 text-sm font-semibold text-slate-900">{{ $contact->subject ?? 'No subject' }}</p>

                                    @if($contact->message ?? false)
                                        <p class="mt-2 text-xs font-semibold text-slate-500 uppercase tracking-wide">Message Preview</p>
                                        <p class="mt-1 text-sm text-slate-700 line-clamp-2">{{ Str::limit($contact->message, 150) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Side - Date & Actions -->
                        <div class="flex flex-col items-start lg:items-end gap-3">
                            <div class="text-left lg:text-right">
                                <p class="text-xs font-semibold text-slate-500">{{ $contact->created_at->format('M d, Y') }}</p>
                                <p class="text-xs text-slate-400">{{ $contact->created_at->format('h:i A') }}</p>
                                <p class="mt-0.5 text-xs font-semibold text-indigo-600">{{ $contact->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-white bg-indigo-600 rounded-lg transition hover:bg-indigo-500">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    View
                                </a>

                                @if(!$contact->is_read)
                                    <form action="{{ route('admin.contacts.read', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-emerald-700 bg-emerald-100 rounded-lg transition hover:bg-emerald-200">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Mark Read
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.contacts.unread', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-slate-700 bg-slate-200 rounded-lg transition hover:bg-slate-300">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            Unread
                                        </button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-rose-700 bg-rose-100 rounded-lg transition hover:bg-rose-200">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <div class="glass-card py-12 text-center">
                <div class="flex flex-col items-center">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-semibold text-slate-900">No messages yet</h3>
                    <p class="mt-1 text-sm text-slate-500">Contact form submissions will appear here</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($contacts->hasPages())
        <div class="glass-card px-6 py-4">
            {{ $contacts->links() }}
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
                t.classList.remove('active', 'bg-indigo-600', 'text-white');
                t.classList.add('bg-white', 'text-slate-700', 'border', 'border-slate-200');
            });

            this.classList.add('active', 'bg-indigo-600', 'text-white');
            this.classList.remove('bg-white', 'text-slate-700', 'border', 'border-slate-200');

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
