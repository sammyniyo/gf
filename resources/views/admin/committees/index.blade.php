@extends('admin.layout')

@section('page-title', 'Committee Members')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Committee Members</h1>
            <p class="mt-1 text-sm text-slate-500">Manage leadership and committee members</p>
        </div>
        <a href="{{ route('admin.committees.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Member
        </a>
    </div>

    <!-- Committee Members Grid -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($committees as $member)
            <div class="glass-card overflow-hidden">
                <!-- Member Photo -->
                <div class="relative h-48 bg-gradient-to-br from-indigo-100 to-slate-100">
                    @if($member->photo)
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}"
                             class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full w-full items-center justify-center">
                            <div class="flex h-24 w-24 items-center justify-center rounded-full bg-white text-3xl font-bold text-indigo-600 shadow-lg">
                                {{ substr($member->name, 0, 1) }}
                            </div>
                        </div>
                    @endif

                    <!-- Status Badge -->
                    @if($member->is_active)
                        <span class="absolute top-3 right-3 inline-flex items-center gap-1 rounded-full bg-emerald-500 px-2.5 py-1 text-xs font-semibold text-white shadow-lg">
                            <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                            Active
                        </span>
                    @else
                        <span class="absolute top-3 right-3 inline-flex items-center gap-1 rounded-full bg-slate-500 px-2.5 py-1 text-xs font-semibold text-white shadow-lg">
                            Inactive
                        </span>
                    @endif
                </div>

                <!-- Member Info -->
                <div class="p-5">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-900">{{ $member->name }}</h3>
                        <p class="text-sm font-semibold text-indigo-600">{{ $member->position }}</p>
                        <p class="mt-1 text-xs text-slate-500">{{ $member->department }}</p>
                    </div>

                    @if($member->bio)
                        <p class="mb-4 text-sm text-slate-600 line-clamp-2">{{ $member->bio }}</p>
                    @endif

                    <!-- Contact Info -->
                    <div class="space-y-2 mb-4">
                        @if($member->email)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <a href="mailto:{{ $member->email }}" class="text-xs text-indigo-600 hover:text-indigo-800 truncate">{{ $member->email }}</a>
                            </div>
                        @endif

                        @if($member->phone)
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-xs text-slate-600">{{ $member->phone }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Order -->
                    <div class="flex items-center gap-2 mb-4 pb-4 border-b border-slate-200">
                        <span class="text-xs font-semibold text-slate-500">Display Order:</span>
                        <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-slate-100 text-xs font-bold text-slate-700">
                            {{ $member->order }}
                        </span>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <a href="{{ route('admin.committees.edit', $member) }}"
                           class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-white bg-indigo-600 rounded-lg transition hover:bg-indigo-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('admin.committees.destroy', $member) }}" method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete this committee member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-rose-700 bg-rose-100 rounded-lg transition hover:bg-rose-200">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="glass-card py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-sm font-semibold text-slate-900">No committee members</h3>
                        <p class="mt-1 text-sm text-slate-500">Get started by adding your first committee member.</p>
                        <div class="mt-6">
                            <a href="{{ route('admin.committees.create') }}"
                               class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Member
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($committees->hasPages())
        <div class="glass-card px-6 py-4">
            {{ $committees->links() }}
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
@endsection

