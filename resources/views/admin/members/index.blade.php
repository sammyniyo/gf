@extends('admin.layout')

@section('page-title', 'Members Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Members & Friends</h1>
            <p class="mt-1 text-sm text-slate-500">Manage choir members and friends registrations</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-3 py-1.5 text-xs font-semibold text-slate-600">
                Total: <span class="text-slate-900">{{ $members->total() }}</span>
            </span>
            <a href="{{ route('admin.members.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400/50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Member
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <div class="glass-card p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Members</p>
                    <p class="mt-1 text-2xl font-bold text-slate-900">{{ $members->total() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Choir Members</p>
                    <p class="mt-1 text-2xl font-bold text-slate-900">{{ App\Models\Member::where('member_type', 'member')->count() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="glass-card p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Friends</p>
                    <p class="mt-1 text-2xl font-bold text-slate-900">{{ App\Models\Member::where('member_type', 'friendship')->count() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
            </div>
        </div>

    <div class="glass-card p-5">
            <div class="flex items-center justify-between">
            <div>
                    <p class="text-sm font-medium text-slate-500">Active</p>
                    <p class="mt-1 text-2xl font-bold text-slate-900">{{ App\Models\Member::where('status', 'active')->count() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>
            </div>

    <!-- Search & Filters -->
    <div class="glass-card p-5">
        <form method="GET" action="{{ route('admin.members.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div>
                <label for="search" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Name, email, phone..."
                    class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
            </div>

            <div>
                <label for="member_type" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Type</label>
                <select name="member_type" id="member_type" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <option value="">All Types</option>
                    <option value="member" {{ request('member_type') == 'member' ? 'selected' : '' }}>Members</option>
                    <option value="friendship" {{ request('member_type') == 'friendship' ? 'selected' : '' }}>Friends</option>
                </select>
            </div>

            <div>
                <label for="status" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Status</label>
                <select name="status" id="status" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg transition hover:bg-indigo-500">
                    Filter
                </button>
                <a href="{{ route('admin.members.index') }}" class="px-4 py-2 text-sm font-semibold text-slate-600 bg-slate-100 rounded-lg transition hover:bg-slate-200">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Members Table -->
    <div class="glass-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Member</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Member ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Voice</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Joined</th>
                        <th class="px-4 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
        @forelse($members as $member)
                        <tr class="hover:bg-slate-50 transition">
                            <!-- Member Info -->
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    @if($member->profile_photo)
                                        <img src="{{ $member->profile_photo_url }}" alt="{{ $member->full_name }}"
                                            class="w-10 h-10 rounded-full object-cover border-2 border-slate-200">
                                    @else
                                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 font-semibold text-sm">
                                            {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900">{{ $member->full_name }}</div>
                                        @if($member->occupation)
                                            <div class="text-xs text-slate-500">{{ $member->occupation }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Member ID -->
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-bold text-indigo-600 bg-indigo-50 rounded">
                                    {{ $member->member_id ?? 'N/A' }}
                                </span>
                            </td>

                            <!-- Contact -->
                            <td class="px-4 py-4">
                                <div class="text-xs text-slate-600">
                                    <div class="truncate max-w-[200px]">{{ $member->email }}</div>
                                    <div class="text-slate-500">{{ $member->phone }}</div>
                                </div>
                            </td>

                            <!-- Type -->
                            <td class="px-4 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full
                                        {{ $member->member_type === 'member' ? 'bg-indigo-100 text-indigo-700' : 'bg-amber-100 text-amber-700' }}">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($member->member_type === 'member')
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        @else
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        @endif
                                    </svg>
                                        {{ $member->member_type === 'member' ? 'Member' : 'Friend' }}
                                </span>
                                @if($member->member_type === 'member' && $member->is_active_chorister)
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-700" title="Active Chorister">
                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                        </svg>
                                        Chorister
                                    </span>
                                @endif
                                </div>
                            </td>

                            <!-- Voice Type -->
                            <td class="px-4 py-4">
                                @if($member->voice_type)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $member->voice_type === 'soprano' ? 'bg-pink-100 text-pink-700' : '' }}
                                    {{ $member->voice_type === 'alto' ? 'bg-purple-100 text-purple-700' : '' }}
                                    {{ $member->voice_type === 'tenor' ? 'bg-blue-100 text-blue-700' : '' }}
                                    {{ $member->voice_type === 'bass' ? 'bg-indigo-100 text-indigo-700' : '' }}
                                    {{ $member->voice_type === 'unsure' ? 'bg-slate-100 text-slate-700' : '' }}">
                                    {{ ucfirst($member->voice_type) }}
                                </span>
                                @else
                                    <span class="text-xs text-slate-400">-</span>
                            @endif
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold rounded-full
                                {{ $member->status === 'active' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                    {{ $member->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                {{ $member->status === 'inactive' ? 'bg-slate-100 text-slate-700' : '' }}">
                                    <span class="w-1.5 h-1.5 rounded-full
                                        {{ $member->status === 'active' ? 'bg-emerald-500' : '' }}
                                        {{ $member->status === 'pending' ? 'bg-amber-500' : '' }}
                                        {{ $member->status === 'inactive' ? 'bg-slate-400' : '' }}">
                                    </span>
                                {{ ucfirst($member->status) }}
                            </span>
                            </td>

                        <!-- Joined Date -->
                            <td class="px-4 py-4">
                                <div class="text-xs text-slate-600">
                                    {{ $member->created_at->format('M j, Y') }}
                        </div>
                                <div class="text-xs text-slate-400">
                                    {{ $member->created_at->diffForHumans() }}
                    </div>
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.members.show', $member) }}"
                                        class="inline-flex items-center justify-center w-8 h-8 text-slate-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition"
                                        title="View Details">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('admin.members.edit', $member) }}"
                                        class="inline-flex items-center justify-center w-8 h-8 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                        title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.members.destroy', $member) }}" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete {{ $member->full_name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                            class="inline-flex items-center justify-center w-8 h-8 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                            title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                            </button>
                        </form>
                    </div>
                            </td>
                        </tr>
        @empty
                        <tr>
                            <td colspan="8" class="px-4 py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-sm font-semibold text-slate-900">No members found</h3>
                                    <p class="mt-1 text-sm text-slate-500">Try adjusting your search or filter criteria</p>
                    </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
    </div>

    <!-- Pagination -->
    @if($members->hasPages())
        <div class="glass-card px-6 py-4">
            {{ $members->links() }}
        </div>
    @endif
</div>
@endsection
