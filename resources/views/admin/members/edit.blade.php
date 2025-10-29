@extends('admin.layout')

@section('page-title', 'Edit Member - ' . $member->full_name)

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Member</h1>
            <p class="text-sm text-slate-600 mt-1">Update member status and notes</p>
        </div>
        <a href="{{ route('admin.members.show', $member) }}"
            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Member
        </a>
    </div>

    <!-- Edit Form -->
    <div class="glass-card p-6">
        <form method="POST" action="{{ route('admin.members.update', $member) }}">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" name="status" required
                        class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="pending" {{ $member->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ $member->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $member->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Voice Type -->
                <div>
                    <label for="voice_type" class="block text-sm font-medium text-slate-700 mb-2">
                        Voice Type
                    </label>
                    <select id="voice_type" name="voice_type"
                        class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Select voice type</option>
                        <option value="soprano" {{ $member->voice_type === 'soprano' ? 'selected' : '' }}>Soprano</option>
                        <option value="alto" {{ $member->voice_type === 'alto' ? 'selected' : '' }}>Alto</option>
                        <option value="tenor" {{ $member->voice_type === 'tenor' ? 'selected' : '' }}>Tenor</option>
                        <option value="bass" {{ $member->voice_type === 'bass' ? 'selected' : '' }}>Bass</option>
                        <option value="unsure" {{ $member->voice_type === 'unsure' ? 'selected' : '' }}>Not sure</option>
                    </select>
                    @error('voice_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Admin Notes -->
            <div class="mt-6">
                <label for="notes" class="block text-sm font-medium text-slate-700 mb-2">
                    Admin Notes
                </label>
                <textarea id="notes" name="notes" rows="4"
                    class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                    placeholder="Add any admin notes about this member...">{{ old('notes', $member->notes ?? '') }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-slate-500">
                    These notes are only visible to administrators.
                </p>
            </div>

            <!-- Status Change Warning -->
            @if($member->status !== 'active')
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="text-sm font-semibold text-blue-900">Status Change Notice</h4>
                            <p class="mt-1 text-sm text-blue-700">
                                Changing this member's status to <strong>Active</strong> will send them a welcome email with login credentials.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 mt-8">
                <a href="{{ route('admin.members.show', $member) }}"
                    class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-6 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Update Member
                </button>
            </div>
        </form>
    </div>

    <!-- Member Preview Card -->
    <div class="glass-card p-6">
        <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
            <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-100">
                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            Member Information Preview
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-1">Full Name</label>
                <p class="text-sm text-slate-900 font-medium">{{ $member->full_name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-1">Member ID</label>
                <p class="text-sm text-slate-900 font-mono font-semibold">{{ $member->member_id ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-1">Email</label>
                <p class="text-sm text-slate-900">{{ $member->email }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-1">Phone</label>
                <p class="text-sm text-slate-900">{{ $member->phone }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-1">Current Status</label>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                    {{ $member->status === 'active' ? 'bg-emerald-100 text-emerald-700' : '' }}
                    {{ $member->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                    {{ $member->status === 'inactive' ? 'bg-slate-100 text-slate-700' : '' }}">
                    {{ ucfirst($member->status) }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-500 mb-1">Member Since</label>
                <p class="text-sm text-slate-900">{{ $member->created_at->format('F j, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
