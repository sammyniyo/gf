@extends('admin.layout')

@section('page-title', 'Schedule Meeting')

@section('content')
<div class="max-w-3xl space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.meetings.index') }}" class="text-slate-400 hover:text-slate-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Schedule New Meeting</h1>
            <p class="mt-1 text-sm text-slate-500">Create and send meeting invitations</p>
        </div>
    </div>

    @php
        $committeeDepartments = $committees
            ->filter(fn ($committee) => filled($committee->department))
            ->groupBy('department')
            ->sortKeys();
    @endphp

    <div class="glass-card p-6">
        <form method="POST" action="{{ route('admin.meetings.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Meeting Title *</label>
                <input type="text" name="title" required
                       class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="3"
                          class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400"></textarea>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Date & Time *</label>
                    <input type="datetime-local" name="meeting_date" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Location</label>
                    <input type="text" name="location" placeholder="Physical location"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Virtual Meeting Link</label>
                    <input type="url" name="meeting_link" placeholder="https://zoom.us/..."
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Invite *</label>
                <select name="attendee_type" id="attendee-type" required
                        class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                    <option value="committee" {{ old('attendee_type', 'committee') === 'committee' ? 'selected' : '' }}>
                        Specific Committees / Departments
                    </option>
                    <option value="all_members" {{ old('attendee_type') === 'all_members' ? 'selected' : '' }}>
                        All Active Members
                    </option>
                    <option value="custom" {{ old('attendee_type') === 'custom' ? 'selected' : '' }}>
                        Select Individual Members
                    </option>
                </select>
            </div>

            <div id="committee-groups" class="{{ old('attendee_type', 'committee') === 'committee' ? '' : 'hidden' }}">
                <label class="block text-sm font-medium text-slate-700 mb-2">Choose Committees / Departments *</label>
                @if($committeeDepartments->isEmpty())
                    <div class="border border-dashed border-slate-200 rounded-lg p-4 text-sm text-slate-500 bg-slate-50">
                        No active committees found. Add active committee contacts first to send targeted invitations.
                    </div>
                @else
                    <div class="flex items-center justify-between mb-2 text-xs text-slate-500 uppercase tracking-wide">
                        <span>{{ $committeeDepartments->count() }} committees available</span>
                        <div class="space-x-3">
                            <button type="button" class="font-semibold hover:text-indigo-600" onclick="toggleCommitteeSelection(true)">Select all</button>
                            <button type="button" class="font-semibold hover:text-indigo-600" onclick="toggleCommitteeSelection(false)">Clear</button>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-3 max-h-60 overflow-y-auto border border-slate-200 rounded-lg p-3 bg-slate-50/60">
                        @foreach($committeeDepartments as $department => $departmentCommittees)
                            <label class="flex items-start gap-3 p-3 rounded-lg bg-white shadow-sm border border-slate-200 hover:border-indigo-300 hover:bg-indigo-50/30 transition">
                                <input type="checkbox"
                                       name="committee_departments[]"
                                       value="{{ $department }}"
                                       class="mt-1 h-4 w-4 text-indigo-600 border-slate-300 rounded committee-checkbox"
                                       {{ in_array($department, old('committee_departments', [])) ? 'checked' : '' }}>
                                <span class="text-sm">
                                    <span class="font-semibold text-slate-800">{{ $department }}</span>
                                    <span class="block text-xs text-slate-500 mt-1">{{ $departmentCommittees->count() }} contact{{ $departmentCommittees->count() > 1 ? 's' : '' }}</span>
                                </span>
                            </label>
                        @endforeach
                    </div>
                @endif
            </div>

            <div id="custom-members" class="{{ old('attendee_type') === 'custom' ? '' : 'hidden' }}">
                <label class="block text-sm font-medium text-slate-700 mb-2">Select Members</label>
                <div class="max-h-48 overflow-y-auto space-y-2 border border-slate-200 rounded-lg p-3">
                    @foreach($members as $member)
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="custom_attendees[]" value="{{ $member->id }}"
                                   class="h-4 w-4 text-indigo-600 border-slate-300 rounded"
                                   {{ in_array($member->id, old('custom_attendees', [])) ? 'checked' : '' }}>
                            <span class="text-sm text-slate-700">{{ $member->first_name }} {{ $member->last_name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-slate-200">
                <a href="{{ route('admin.meetings.index') }}" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Create Meeting</button>
            </div>
        </form>
    </div>
</div>

<script>
const attendeeTypeSelect = document.getElementById('attendee-type');
const customMembersDiv = document.getElementById('custom-members');
const committeeDiv = document.getElementById('committee-groups');

function refreshAttendeeSections() {
    const type = attendeeTypeSelect.value;
    customMembersDiv.classList.toggle('hidden', type !== 'custom');
    committeeDiv.classList.toggle('hidden', type !== 'committee');
}

function toggleCommitteeSelection(selectAll) {
    document.querySelectorAll('.committee-checkbox').forEach((checkbox) => {
        checkbox.checked = selectAll;
    });
}

attendeeTypeSelect.addEventListener('change', refreshAttendeeSections);
document.addEventListener('DOMContentLoaded', refreshAttendeeSections);
</script>
@endsection

