@extends('admin.layout')

@section('page-title', 'Members Management')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="mb-8 overflow-hidden rounded-2xl gradient-bg-2">
        <div class="px-8 py-8">
            <div class="flex flex-col justify-between lg:flex-row lg:items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white">Choir Members</h1>
                    <p class="mt-2 text-lg text-pink-100">Manage your choir member registrations</p>
                </div>
                <div class="flex flex-wrap gap-4 mt-4 lg:mt-0">
                    <div class="flex items-center px-4 py-2 space-x-2 bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                        <span class="text-sm font-medium text-white">Total:</span>
                        <span class="text-2xl font-bold text-white">{{ $members->total() }}</span>
                    </div>
                    <div class="flex items-center px-4 py-2 space-x-2 bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                        <span class="text-sm font-medium text-white">Active:</span>
                        <span class="text-2xl font-bold text-white">{{ $members->where('status', 'active')->count() }}</span>
                    </div>
                    <div class="flex items-center px-4 py-2 space-x-2 bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg">
                        <span class="text-sm font-medium text-white">Pending:</span>
                        <span class="text-2xl font-bold text-white">{{ $members->where('status', 'pending')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="p-6 mb-8 bg-white shadow-lg rounded-2xl">
        <div class="flex items-center mb-4 space-x-3">
            <div class="p-2 rounded-lg gradient-bg-2">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900">Filters & Search</h3>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <div>
                <label for="status-filter" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                <select id="status-filter" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div>
                <label for="voice-type-filter" class="block mb-2 text-sm font-medium text-gray-700">Voice Type</label>
                <select id="voice-type-filter" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all">
                    <option value="">All Voice Types</option>
                    <option value="soprano">Soprano</option>
                    <option value="alto">Alto</option>
                    <option value="tenor">Tenor</option>
                    <option value="bass">Bass</option>
                    <option value="unsure">Unsure</option>
                </select>
            </div>

            <div>
                <label for="experience-filter" class="block mb-2 text-sm font-medium text-gray-700">Experience</label>
                <select id="experience-filter" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all">
                    <option value="">All Levels</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                    <option value="professional">Professional</option>
                </select>
            </div>

            <div>
                <label for="search-input" class="block mb-2 text-sm font-medium text-gray-700">Search</label>
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Search members..."
                        class="w-full px-4 py-2.5 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all">
                    <svg class="absolute w-5 h-5 text-gray-400 left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Members Grid -->
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3" id="members-grid">
        @forelse($members as $member)
            <div class="member-card overflow-hidden transition-all duration-300 transform bg-white shadow-lg rounded-2xl hover:scale-105 border border-gray-100"
                data-status="{{ strtolower($member->status) }}"
                data-voice-type="{{ strtolower($member->voice_type ?? '') }}"
                data-experience="{{ strtolower($member->musical_experience ?? '') }}"
                data-search="{{ strtolower($member->first_name . ' ' . $member->last_name . ' ' . ($member->occupation ?? '')) }}">

                <!-- Member Header -->
                <div class="relative h-32 gradient-bg-2">
                    <div class="absolute inset-0 bg-black opacity-10"></div>
                    <div class="absolute bottom-0 left-0 right-0 px-6 pb-4 transform translate-y-1/2">
                        <div class="flex items-end justify-between">
                            <div class="relative">
                                @if($member->profile_photo ?? false)
                                    <img class="object-cover w-20 h-20 border-4 border-white rounded-full shadow-xl" src="{{ $member->profile_photo_url }}" alt="{{ $member->first_name }}">
                                @else
                                    <div class="flex items-center justify-center w-20 h-20 text-2xl font-bold text-white border-4 border-white rounded-full shadow-xl gradient-bg-2">
                                        {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                    </div>
                                @endif

                                <!-- Status Indicator -->
                                <div class="absolute bottom-0 right-0 w-5 h-5 border-2 border-white rounded-full
                                    {{ $member->status === 'active' ? 'bg-green-500' : '' }}
                                    {{ $member->status === 'pending' ? 'bg-yellow-500' : '' }}
                                    {{ $member->status === 'inactive' ? 'bg-red-500' : '' }}">
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="flex gap-2">
                                <a href="{{ route('admin.members.show', $member) }}"
                                    class="p-2 text-white transition-all duration-200 transform bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg hover:scale-110">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.members.edit', $member) }}"
                                    class="p-2 text-white transition-all duration-200 transform bg-white rounded-lg shadow-lg bg-opacity-20 backdrop-filter backdrop-blur-lg hover:scale-110">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Member Details -->
                <div class="px-6 pt-12 pb-6">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900">{{ $member->first_name }} {{ $member->last_name }}</h3>
                        @if($member->occupation ?? false)
                            <p class="text-sm text-gray-600">{{ $member->occupation }}</p>
                        @endif
                    </div>

                    <div class="space-y-3">
                        <!-- Email -->
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-purple-100 rounded-lg">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600 truncate">{{ $member->email }}</span>
                        </div>

                        <!-- Phone -->
                        @if($member->phone ?? false)
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-blue-100 rounded-lg">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-600">{{ $member->phone }}</span>
                            </div>
                        @endif

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-200">
                            @if($member->voice_type ?? false)
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full
                                    {{ $member->voice_type === 'soprano' ? 'bg-pink-100 text-pink-800' : '' }}
                                    {{ $member->voice_type === 'alto' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $member->voice_type === 'tenor' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $member->voice_type === 'bass' ? 'bg-indigo-100 text-indigo-800' : '' }}
                                    {{ $member->voice_type === 'unsure' ? 'bg-gray-100 text-gray-800' : '' }}">
                                    🎵 {{ ucfirst($member->voice_type) }}
                                </span>
                            @endif

                            @if($member->musical_experience ?? false)
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full
                                    {{ $member->musical_experience === 'beginner' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $member->musical_experience === 'intermediate' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $member->musical_experience === 'advanced' ? 'bg-orange-100 text-orange-800' : '' }}
                                    {{ $member->musical_experience === 'professional' ? 'bg-red-100 text-red-800' : '' }}">
                                    ⭐ {{ ucfirst($member->musical_experience) }}
                                </span>
                            @endif

                            <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full
                                {{ $member->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $member->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $member->status === 'inactive' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($member->status) }}
                            </span>
                        </div>

                        <!-- Joined Date -->
                        <div class="flex items-center justify-between pt-3 text-xs text-gray-500 border-t border-gray-200">
                            <span>Joined {{ $member->created_at->diffForHumans() }}</span>
                            <span>{{ $member->created_at->format('M j, Y') }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2 mt-4">
                        <a href="{{ route('admin.members.show', $member) }}"
                            class="flex-1 px-4 py-2 text-sm font-medium text-center text-white transition-all duration-200 rounded-lg gradient-bg-2 hover:scale-105">
                            View Details
                        </a>
                        <form method="POST" action="{{ route('admin.members.destroy', $member) }}"
                            class="inline" onsubmit="return confirm('Are you sure you want to delete this member?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white transition-all duration-200 bg-red-500 rounded-lg hover:bg-red-600 hover:scale-105">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="py-24 text-center bg-white shadow-lg rounded-2xl">
                    <div class="flex flex-col items-center">
                        <div class="p-6 rounded-full gradient-bg-2">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-2xl font-bold text-gray-900">No Members Found</h3>
                        <p class="mt-2 text-gray-600">Members will appear here once they register</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($members->hasPages())
        <div class="mt-8">
            <div class="p-6 bg-white shadow-lg rounded-2xl">
                {{ $members->links() }}
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusFilter = document.getElementById('status-filter');
    const voiceTypeFilter = document.getElementById('voice-type-filter');
    const experienceFilter = document.getElementById('experience-filter');
    const searchInput = document.getElementById('search-input');
    const memberCards = document.querySelectorAll('.member-card');

    function filterMembers() {
        const status = statusFilter.value.toLowerCase();
        const voiceType = voiceTypeFilter.value.toLowerCase();
        const experience = experienceFilter.value.toLowerCase();
        const searchTerm = searchInput.value.toLowerCase();

        let visibleCount = 0;

        memberCards.forEach(card => {
            const cardStatus = card.dataset.status;
            const cardVoiceType = card.dataset.voiceType;
            const cardExperience = card.dataset.experience;
            const cardSearch = card.dataset.search;

            const statusMatch = !status || cardStatus.includes(status);
            const voiceTypeMatch = !voiceType || cardVoiceType.includes(voiceType);
            const experienceMatch = !experience || cardExperience.includes(experience);
            const searchMatch = !searchTerm || cardSearch.includes(searchTerm);

            if (statusMatch && voiceTypeMatch && experienceMatch && searchMatch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show "no results" message if needed
        const noResultsMessage = document.getElementById('no-results-message');
        if (noResultsMessage) {
            noResultsMessage.style.display = visibleCount === 0 ? '' : 'none';
        }
    }

    statusFilter.addEventListener('change', filterMembers);
    voiceTypeFilter.addEventListener('change', filterMembers);
    experienceFilter.addEventListener('change', filterMembers);
    searchInput.addEventListener('input', filterMembers);
});
</script>
@endpush
@endsection
