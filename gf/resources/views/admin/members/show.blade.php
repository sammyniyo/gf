@extends('admin.layout')

@section('page-title', 'Member Details')

@section('content')
<div class="space-y-6">
    <!-- Member Header -->
    <div class="glass-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                @if($member->profile_photo)
                    <div class="relative group cursor-pointer" onclick="openImageModal('{{ $member->profile_photo_url }}', '{{ $member->full_name }}')">
                        <img class="h-20 w-20 rounded-full object-cover shadow-lg transition-all duration-300 group-hover:shadow-2xl group-hover:scale-105"
                             src="{{ $member->profile_photo_url }}"
                             alt="{{ $member->full_name }}">
                        <!-- Zoom Icon Overlay -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black/50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </div>
                    </div>
                @else
                    <div class="h-20 w-20 rounded-full bg-gradient-to-br from-indigo-100 to-slate-100 flex items-center justify-center shadow-lg">
                        <span class="text-2xl font-bold text-indigo-600">{{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}</span>
                    </div>
                @endif
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">{{ $member->full_name }}</h1>
                    <p class="text-lg text-slate-600">{{ $member->occupation }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                            {{ $member->status === 'active' ? 'bg-emerald-100 text-emerald-700' : '' }}
                            {{ $member->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $member->status === 'inactive' ? 'bg-slate-100 text-slate-700' : '' }}">
                            {{ ucfirst($member->status) }}
                        </span>
                        <span class="text-sm text-slate-500">Member #{{ str_pad($member->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.members.edit', $member) }}"
                   class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.members.index') }}"
                   class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-emerald-100">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    Personal Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Email</label>
                        <p class="text-sm text-slate-900">{{ $member->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Phone</label>
                        <p class="text-sm text-slate-900">{{ $member->phone }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Date of Birth</label>
                        <p class="text-sm text-slate-900">{{ $member->date_of_birth?->format('F j, Y') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Gender</label>
                        <p class="text-sm text-slate-900">{{ ucfirst($member->gender) }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-500 mb-1">Address</label>
                        <p class="text-sm text-slate-900">{{ $member->address }}</p>
                    </div>
                </div>
            </div>

            <!-- Professional Information -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6" />
                        </svg>
                    </div>
                    Professional Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Occupation</label>
                        <p class="text-sm text-slate-900">{{ $member->occupation }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Workplace</label>
                        <p class="text-sm text-slate-900">{{ $member->workplace ?? 'Not specified' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Education Level</label>
                        <p class="text-sm text-slate-900">{{ ucfirst($member->education_level ?? 'Not specified') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Skills</label>
                        <p class="text-sm text-slate-900">{{ $member->skills ?? 'Not specified' }}</p>
                    </div>
                </div>
            </div>

            <!-- Choir Details -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-purple-100">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    </div>
                    Choir Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Voice Type</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                            {{ $member->voice_type === 'soprano' ? 'bg-pink-100 text-pink-700' : '' }}
                            {{ $member->voice_type === 'alto' ? 'bg-purple-100 text-purple-700' : '' }}
                            {{ $member->voice_type === 'tenor' ? 'bg-blue-100 text-blue-700' : '' }}
                            {{ $member->voice_type === 'bass' ? 'bg-indigo-100 text-indigo-700' : '' }}
                            {{ $member->voice_type === 'unsure' ? 'bg-slate-100 text-slate-700' : '' }}">
                            {{ ucfirst($member->voice_type ?? 'Not specified') }}
                        </span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Musical Experience</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                            {{ $member->musical_experience === 'beginner' ? 'bg-emerald-100 text-emerald-700' : '' }}
                            {{ $member->musical_experience === 'intermediate' ? 'bg-amber-100 text-amber-700' : '' }}
                            {{ $member->musical_experience === 'advanced' ? 'bg-orange-100 text-orange-700' : '' }}
                            {{ $member->musical_experience === 'professional' ? 'bg-red-100 text-red-700' : '' }}">
                            {{ ucfirst($member->musical_experience ?? 'Not specified') }}
                        </span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Instruments</label>
                        <p class="text-sm text-slate-900">{{ $member->instruments ?? 'None specified' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Choir Experience</label>
                        <p class="text-sm text-slate-900">{{ ucfirst($member->choir_experience ?? 'Not specified') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Availability</label>
                        <p class="text-sm text-slate-900">{{ ucfirst($member->availability ?? 'Not specified') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Newsletter</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                            {{ $member->newsletter ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-700' }}">
                            {{ $member->newsletter ? 'Subscribed' : 'Not Subscribed' }}
                        </span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-500 mb-1">Why Join Choir</label>
                    <p class="text-sm text-slate-900 bg-slate-50 p-4 rounded-xl border border-slate-200">{{ $member->why_join }}</p>
                </div>
            </div>
            </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Emergency Contact -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-red-100">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    Emergency Contact
                </h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Name</label>
                        <p class="text-sm text-slate-900">{{ $member->emergency_contact_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Phone</label>
                        <p class="text-sm text-slate-900">{{ $member->emergency_contact_phone }}</p>
                    </div>
                </div>
            </div>

            <!-- Application Details -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100">
                        <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    Application Details
                </h2>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Application Date</label>
                        <p class="text-sm text-slate-900">{{ $member->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-500 mb-1">Member ID</label>
                        <p class="text-sm text-slate-900">#{{ str_pad($member->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="glass-card p-6">
                <h2 class="text-lg font-semibold text-slate-900 mb-4 flex items-center gap-2">
                    <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-amber-100">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    Quick Actions
                </h2>
                <div class="space-y-3">
                    <a href="mailto:{{ $member->email }}"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Send Email
                    </a>
                    <a href="tel:{{ $member->phone }}"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Call Member
                    </a>
                    <button onclick="copyToClipboard('{{ $member->email }}')"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Copy Email
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Lightbox Modal -->
<div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4 backdrop-blur-sm">
    <div class="relative max-w-5xl w-full">
        <!-- Close Button -->
        <button onclick="closeImageModal()" class="absolute top-4 right-4 z-10 flex items-center justify-center w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full transition-all duration-300 group">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Image Container -->
        <div class="relative bg-white rounded-2xl overflow-hidden shadow-2xl">
            <img id="modalImage" src="" alt="" class="w-full h-auto max-h-[85vh] object-contain">
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                <p id="modalImageName" class="text-white text-xl font-semibold"></p>
            </div>
        </div>
    </div>
</div>

<script>
function openImageModal(imageUrl, imageName) {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalImageName = document.getElementById('modalImageName');

    modalImage.src = imageUrl;
    modalImageName.textContent = imageName;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = '';
}

// Close modal when clicking outside the image
document.getElementById('imageModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeImageModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const button = event.target.closest('button');
        const originalText = button.innerHTML;
        button.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Copied!
        `;
        button.classList.remove('border-slate-200', 'bg-white', 'text-slate-600', 'hover:border-slate-300', 'hover:text-slate-700');
        button.classList.add('bg-emerald-600', 'text-white');

        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-emerald-600', 'text-white');
            button.classList.add('border-slate-200', 'bg-white', 'text-slate-600', 'hover:border-slate-300', 'hover:text-slate-700');
        }, 2000);
    }).catch(function(err) {
        console.error('Could not copy text: ', err);
        alert('Failed to copy to clipboard');
    });
}
</script>
@endsection
