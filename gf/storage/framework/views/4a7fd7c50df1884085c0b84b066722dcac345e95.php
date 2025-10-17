<?php $__env->startSection('page-title', 'Members Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Members & Friends</h1>
            <p class="mt-1 text-sm text-slate-500">Manage choir members and friends registrations</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-3 py-1.5 text-xs font-semibold text-slate-600">
                Total: <span class="text-slate-900"><?php echo e($members->total()); ?></span>
            </span>
            <span class="inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-indigo-50/70 px-3 py-1.5 text-xs font-semibold text-indigo-700">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Members: <span class="text-indigo-900"><?php echo e($members->where('member_type', 'member')->count()); ?></span>
            </span>
            <span class="inline-flex items-center gap-2 rounded-full border border-amber-200 bg-amber-50/70 px-3 py-1.5 text-xs font-semibold text-amber-700">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                Friends: <span class="text-amber-900"><?php echo e($members->where('member_type', 'friendship')->count()); ?></span>
            </span>
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-emerald-50/70 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                Active: <span class="text-emerald-900"><?php echo e($members->where('status', 'active')->count()); ?></span>
            </span>
            <a href="<?php echo e(route('admin.members.create')); ?>"
               class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400/50">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Member
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="glass-card p-5">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
            <div>
                <label for="member-type-filter" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Type</label>
                <select id="member-type-filter" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <option value="">All Types</option>
                    <option value="member">Members</option>
                    <option value="friendship">Friends</option>
                </select>
            </div>

            <div>
                <label for="status-filter" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Status</label>
                <select id="status-filter" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div>
                <label for="voice-type-filter" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Voice Type</label>
                <select id="voice-type-filter" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <option value="">All Voice Types</option>
                    <option value="soprano">Soprano</option>
                    <option value="alto">Alto</option>
                    <option value="tenor">Tenor</option>
                    <option value="bass">Bass</option>
                    <option value="unsure">Unsure</option>
                </select>
            </div>

            <div>
                <label for="experience-filter" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Experience</label>
                <select id="experience-filter" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <option value="">All Levels</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                    <option value="professional">Professional</option>
                </select>
            </div>

            <div>
                <label for="search-input" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Search</label>
                <div class="relative">
                    <input type="text" id="search-input" placeholder="Search members..."
                        class="w-full px-3 py-2 pl-9 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    <svg class="absolute w-4 h-4 text-slate-400 left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Members Grid -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3" id="members-grid">
        <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="member-card glass-card overflow-hidden transition-all hover:shadow-lg"
                data-member-type="<?php echo e(strtolower($member->member_type ?? 'member')); ?>"
                data-status="<?php echo e(strtolower($member->status)); ?>"
                data-voice-type="<?php echo e(strtolower($member->voice_type ?? '')); ?>"
                data-experience="<?php echo e(strtolower($member->musical_experience ?? '')); ?>"
                data-search="<?php echo e(strtolower($member->first_name . ' ' . $member->last_name . ' ' . ($member->occupation ?? ''))); ?>">

                <!-- Member Header -->
                <div class="relative h-24 bg-gradient-to-br from-indigo-100 to-slate-100">
                    <div class="absolute bottom-0 left-0 right-0 px-5 pb-4 transform translate-y-1/2">
                        <div class="flex items-end justify-between">
                            <div class="relative">
                                <?php if($member->profile_photo ?? false): ?>
                                    <div class="relative group cursor-pointer" onclick="openImageModal('<?php echo e($member->profile_photo_url); ?>', '<?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?>')">
                                        <img class="object-cover w-16 h-16 border-4 border-white rounded-xl shadow-lg transition-all duration-300 group-hover:scale-110 group-hover:shadow-2xl"
                                             src="<?php echo e($member->profile_photo_url); ?>"
                                             alt="<?php echo e($member->first_name); ?>">
                                        <!-- Zoom Icon -->
                                        <div class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                            </svg>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="flex items-center justify-center w-16 h-16 text-lg font-bold text-indigo-600 bg-white border-4 border-white rounded-xl shadow-lg">
                                        <?php echo e(substr($member->first_name, 0, 1)); ?><?php echo e(substr($member->last_name, 0, 1)); ?>

                                    </div>
                                <?php endif; ?>

                                <!-- Status Indicator -->
                                <div class="absolute -bottom-1 -right-1 w-4 h-4 border-2 border-white rounded-full
                                    <?php echo e($member->status === 'active' ? 'bg-emerald-500' : ''); ?>

                                    <?php echo e($member->status === 'pending' ? 'bg-yellow-500' : ''); ?>

                                    <?php echo e($member->status === 'inactive' ? 'bg-slate-400' : ''); ?>">
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="flex gap-1.5">
                                <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-white/80 text-slate-600 transition hover:bg-white hover:text-indigo-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Member Details -->
                <div class="px-5 pt-10 pb-5">
                    <div class="mb-4">
                        <h3 class="text-base font-semibold text-slate-900"><?php echo e($member->first_name); ?> <?php echo e($member->last_name); ?></h3>
                        <?php if($member->occupation ?? false): ?>
                            <p class="text-xs text-slate-500"><?php echo e($member->occupation); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="space-y-2.5">
                        <!-- Email -->
                        <div class="flex items-center gap-2.5">
                            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-indigo-100">
                                <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-xs text-slate-600 truncate"><?php echo e($member->email); ?></span>
                        </div>

                        <!-- Phone -->
                        <?php if($member->phone ?? false): ?>
                            <div class="flex items-center gap-2.5">
                                <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-sky-100">
                                    <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <span class="text-xs text-slate-600"><?php echo e($member->phone); ?></span>
                            </div>
                        <?php endif; ?>

                        <!-- Tags -->
                        <div class="flex flex-wrap gap-1.5 pt-3 border-t border-slate-200">
                            <!-- Member Type Badge -->
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-semibold rounded-full
                                <?php echo e(($member->member_type ?? 'member') === 'member' ? 'bg-indigo-100 text-indigo-700' : 'bg-amber-100 text-amber-700'); ?>">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <?php if(($member->member_type ?? 'member') === 'member'): ?>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    <?php else: ?>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    <?php endif; ?>
                                </svg>
                                <?php echo e(($member->member_type ?? 'member') === 'member' ? 'Member' : 'Friend'); ?>

                            </span>

                            <?php if($member->voice_type ?? false): ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-semibold rounded-full
                                    <?php echo e($member->voice_type === 'soprano' ? 'bg-pink-100 text-pink-700' : ''); ?>

                                    <?php echo e($member->voice_type === 'alto' ? 'bg-purple-100 text-purple-700' : ''); ?>

                                    <?php echo e($member->voice_type === 'tenor' ? 'bg-blue-100 text-blue-700' : ''); ?>

                                    <?php echo e($member->voice_type === 'bass' ? 'bg-indigo-100 text-indigo-700' : ''); ?>

                                    <?php echo e($member->voice_type === 'unsure' ? 'bg-slate-100 text-slate-700' : ''); ?>">
                                    <?php echo e(ucfirst($member->voice_type)); ?>

                                </span>
                            <?php endif; ?>

                            <?php if($member->musical_experience ?? false): ?>
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-semibold rounded-full bg-slate-100 text-slate-700">
                                    <?php echo e(ucfirst($member->musical_experience)); ?>

                                </span>
                            <?php endif; ?>

                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-xs font-semibold rounded-full
                                <?php echo e($member->status === 'active' ? 'bg-emerald-100 text-emerald-700' : ''); ?>

                                <?php echo e($member->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : ''); ?>

                                <?php echo e($member->status === 'inactive' ? 'bg-slate-100 text-slate-700' : ''); ?>">
                                <?php echo e(ucfirst($member->status)); ?>

                            </span>
                        </div>

                        <!-- Joined Date -->
                        <div class="flex items-center justify-between pt-3 text-xs text-slate-500 border-t border-slate-200">
                            <span><?php echo e($member->created_at->diffForHumans()); ?></span>
                            <span><?php echo e($member->created_at->format('M j, Y')); ?></span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2 mt-4">
                        <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                            class="flex-1 px-3 py-2 text-xs font-semibold text-center text-white bg-indigo-600 rounded-lg transition hover:bg-indigo-500">
                            View Details
                        </a>

                        <?php if($member->member_id): ?>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false"
                                class="px-3 py-2 text-xs font-semibold text-purple-600 bg-purple-100 rounded-lg transition hover:bg-purple-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </button>
                            <div x-show="open"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 bottom-full mb-2 w-40 bg-white rounded-lg shadow-lg border border-slate-200 py-1 z-10"
                                style="display: none;">
                                <a href="<?php echo e(route('member.id-card.download', $member)); ?>"
                                    class="block px-3 py-2 text-xs text-slate-700 hover:bg-purple-50 transition">
                                    <i class="fas fa-id-card mr-2"></i>ID Card
                                </a>
                                <a href="<?php echo e(route('member.confirmation.download', $member)); ?>"
                                    class="block px-3 py-2 text-xs text-slate-700 hover:bg-purple-50 transition">
                                    <i class="fas fa-file-alt mr-2"></i>Confirmation
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('admin.members.destroy', $member)); ?>"
                            class="inline" onsubmit="return confirm('Are you sure you want to delete this member?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                class="px-3 py-2 text-xs font-semibold text-rose-600 bg-rose-100 rounded-lg transition hover:bg-rose-200">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full">
                <div class="glass-card py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-sm font-semibold text-slate-900">No members found</h3>
                        <p class="mt-1 text-sm text-slate-500">Members will appear here once they register</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if($members->hasPages()): ?>
        <div class="glass-card px-6 py-4">
            <?php echo e($members->links()); ?>

        </div>
    <?php endif; ?>
</div>

<!-- Image Lightbox Modal -->
<div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4 backdrop-blur-sm">
    <div class="relative max-w-5xl w-full">
        <!-- Close Button -->
        <button onclick="closeImageModal()" class="absolute top-4 right-4 z-10 flex items-center justify-center w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full transition-all duration-300">
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

<?php $__env->startPush('scripts'); ?>
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

document.addEventListener('DOMContentLoaded', function() {
    const memberTypeFilter = document.getElementById('member-type-filter');
    const statusFilter = document.getElementById('status-filter');
    const voiceTypeFilter = document.getElementById('voice-type-filter');
    const experienceFilter = document.getElementById('experience-filter');
    const searchInput = document.getElementById('search-input');
    const memberCards = document.querySelectorAll('.member-card');

    function filterMembers() {
        const memberType = memberTypeFilter.value.toLowerCase();
        const status = statusFilter.value.toLowerCase();
        const voiceType = voiceTypeFilter.value.toLowerCase();
        const experience = experienceFilter.value.toLowerCase();
        const searchTerm = searchInput.value.toLowerCase();

        memberCards.forEach(card => {
            const cardMemberType = card.dataset.memberType;
            const cardStatus = card.dataset.status;
            const cardVoiceType = card.dataset.voiceType;
            const cardExperience = card.dataset.experience;
            const cardSearch = card.dataset.search;

            const memberTypeMatch = !memberType || cardMemberType.includes(memberType);
            const statusMatch = !status || cardStatus.includes(status);
            const voiceTypeMatch = !voiceType || cardVoiceType.includes(voiceType);
            const experienceMatch = !experience || cardExperience.includes(experience);
            const searchMatch = !searchTerm || cardSearch.includes(searchTerm);

            if (memberTypeMatch && statusMatch && voiceTypeMatch && experienceMatch && searchMatch) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    memberTypeFilter.addEventListener('change', filterMembers);
    statusFilter.addEventListener('change', filterMembers);
    voiceTypeFilter.addEventListener('change', filterMembers);
    experienceFilter.addEventListener('change', filterMembers);
    searchInput.addEventListener('input', filterMembers);
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/members/index.blade.php ENDPATH**/ ?>