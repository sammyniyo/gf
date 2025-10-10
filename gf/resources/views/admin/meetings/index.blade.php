@extends('admin.layout')

@section('page-title', 'Meetings')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Meetings</h1>
            <p class="mt-1 text-sm text-slate-500">Schedule and manage meetings with email invitations</p>
        </div>
        <a href="{{ route('admin.meetings.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Schedule Meeting
        </a>
    </div>

    <div class="space-y-4">
        @forelse($meetings as $meeting)
            <div class="glass-card p-5">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-bold text-slate-900">{{ $meeting->title }}</h3>
                            @if($meeting->email_sent)
                                <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-semibold text-emerald-700">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Invitations Sent
                                </span>
                            @endif
                        </div>
                        <p class="text-sm text-slate-600 mb-3">{{ $meeting->description }}</p>
                        <div class="flex flex-wrap gap-3 text-sm">
                            <div class="flex items-center gap-2 text-slate-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $meeting->meeting_date->format('M d, Y \a\t H:i A') }}
                            </div>
                            @if($meeting->location)
                                <div class="flex items-center gap-2 text-slate-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $meeting->location }}
                                </div>
                            @endif
                            <div class="flex items-center gap-2 text-slate-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ $meeting->attendees->count() }} attendees
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        @if(!$meeting->email_sent)
                            <form action="{{ route('admin.meetings.send-invitations', $meeting) }}" method="POST">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-semibold text-white bg-emerald-600 rounded-lg hover:bg-emerald-500">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Send Invites
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('admin.meetings.destroy', $meeting) }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-semibold text-rose-700 bg-rose-100 rounded-lg hover:bg-rose-200">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="glass-card py-12 text-center">
                <h3 class="text-sm font-semibold text-slate-900">No meetings scheduled</h3>
                <p class="mt-1 text-sm text-slate-500">Create your first meeting</p>
            </div>
        @endforelse
    </div>

    @if($meetings->hasPages())
        <div class="glass-card px-6 py-4">{{ $meetings->links() }}</div>
    @endif
</div>
@endsection

