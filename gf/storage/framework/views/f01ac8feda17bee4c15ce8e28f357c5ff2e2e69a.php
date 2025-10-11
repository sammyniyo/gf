<?php $__env->startSection('page-title', 'Songs Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Songs Management</h1>
            <p class="mt-1 text-sm text-slate-500">Manage your choir's musical repertoire</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.songs.create')); ?>"
               class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Song
            </a>
        </div>
    </div>

    <!-- Filters -->
    <div class="glass-card p-6">
        <form method="GET" action="<?php echo e(route('admin.songs.index')); ?>" class="space-y-4">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-5">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-slate-700 mb-2">Search</label>
                    <div class="relative">
                        <input type="text" name="search" id="search" value="<?php echo e(request('search')); ?>" placeholder="Search songs..."
                               class="w-full px-3 py-2 pl-9 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400">
                        <svg class="absolute w-4 h-4 text-slate-400 left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Type Filter -->
                <div>
                    <label for="type" class="block text-sm font-medium text-slate-700 mb-2">Type</label>
                    <select name="type" id="type" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400">
                        <option value="">All Types</option>
                        <option value="vocal" <?php echo e(request('type') === 'vocal' ? 'selected' : ''); ?>>Vocal</option>
                        <option value="instrumental" <?php echo e(request('type') === 'instrumental' ? 'selected' : ''); ?>>Instrumental</option>
                    </select>
                </div>

                <!-- Difficulty Filter -->
                <div>
                    <label for="difficulty" class="block text-sm font-medium text-slate-700 mb-2">Difficulty</label>
                    <select name="difficulty" id="difficulty" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400">
                        <option value="">All Levels</option>
                        <option value="beginner" <?php echo e(request('difficulty') === 'beginner' ? 'selected' : ''); ?>>Beginner</option>
                        <option value="intermediate" <?php echo e(request('difficulty') === 'intermediate' ? 'selected' : ''); ?>>Intermediate</option>
                        <option value="advanced" <?php echo e(request('difficulty') === 'advanced' ? 'selected' : ''); ?>>Advanced</option>
                        <option value="expert" <?php echo e(request('difficulty') === 'expert' ? 'selected' : ''); ?>>Expert</option>
                    </select>
                </div>

                <!-- Featured Filter -->
                <div>
                    <label for="featured" class="block text-sm font-medium text-slate-700 mb-2">Featured</label>
                    <select name="featured" id="featured" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400">
                        <option value="">All Songs</option>
                        <option value="1" <?php echo e(request('featured') === '1' ? 'selected' : ''); ?>>Featured Only</option>
                        <option value="0" <?php echo e(request('featured') === '0' ? 'selected' : ''); ?>>Not Featured</option>
                    </select>
                </div>

                <!-- Sort -->
                <div>
                    <label for="sort_by" class="block text-sm font-medium text-slate-700 mb-2">Sort By</label>
                    <select name="sort_by" id="sort_by" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400">
                        <option value="created_at" <?php echo e(request('sort_by') === 'created_at' ? 'selected' : ''); ?>>Date Added</option>
                        <option value="title" <?php echo e(request('sort_by') === 'title' ? 'selected' : ''); ?>>Title</option>
                        <option value="plays_count" <?php echo e(request('sort_by') === 'plays_count' ? 'selected' : ''); ?>>Popularity</option>
                        <option value="composer" <?php echo e(request('sort_by') === 'composer' ? 'selected' : ''); ?>>Composer</option>
                    </select>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-200">
                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z" />
                        </svg>
                        Apply Filters
                    </button>
                    <a href="<?php echo e(route('admin.songs.index')); ?>"
                       class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Clear
                    </a>
                </div>

                <div class="text-sm text-slate-500">
                    Showing <?php echo e($songs->count()); ?> of <?php echo e($songs->total()); ?> songs
                </div>
            </div>
        </form>
    </div>

    <!-- Songs Grid -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <?php $__empty_1 = true; $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group relative overflow-hidden rounded-xl border border-slate-200 bg-white/70 p-4 transition hover:shadow-lg">
                <!-- Featured Badge -->
                <?php if($song->is_featured): ?>
                    <div class="absolute top-3 right-3 z-10">
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                            ⭐ Featured
                        </span>
                    </div>
                <?php endif; ?>

                <!-- Play Button -->
                <?php if($song->audio_file): ?>
                    <div class="absolute top-3 left-3 z-10">
                        <button onclick="playSong('<?php echo e($song->audio_url); ?>', '<?php echo e($song->title); ?>')"
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600 text-white shadow-lg transition hover:bg-purple-700">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                        </button>
                    </div>
                <?php endif; ?>

                <!-- Song Info -->
                <div class="pt-8">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-slate-900 mb-1 line-clamp-2"><?php echo e($song->title); ?></h3>
                        <?php if($song->composer): ?>
                            <p class="text-sm text-slate-600">by <?php echo e($song->composer); ?></p>
                        <?php endif; ?>
                        <?php if($song->album): ?>
                            <p class="text-xs text-slate-500 mb-2">Album: <?php echo e($song->album); ?></p>
                        <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-1.5 mb-3">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                            <?php echo e($song->type === 'vocal' ? 'bg-purple-100 text-purple-700' : 'bg-indigo-100 text-indigo-700'); ?>">
                            <?php echo e(ucfirst($song->type)); ?>

                        </span>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold
                            <?php echo e($song->difficulty === 'beginner' ? 'bg-green-100 text-green-700' : ''); ?>

                            <?php echo e($song->difficulty === 'intermediate' ? 'bg-yellow-100 text-yellow-700' : ''); ?>

                            <?php echo e($song->difficulty === 'advanced' ? 'bg-orange-100 text-orange-700' : ''); ?>

                            <?php echo e($song->difficulty === 'expert' ? 'bg-red-100 text-red-700' : ''); ?>">
                            <?php echo e(ucfirst($song->difficulty)); ?>

                        </span>
                    </div>

                    <!-- Song Details -->
                    <div class="space-y-1 text-xs text-slate-500">
                        <?php if($song->duration_seconds): ?>
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <?php echo e($song->formatted_duration); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($song->genre): ?>
                            <div class="flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <?php echo e($song->genre); ?>

                            </div>
                        <?php endif; ?>
                        <div class="flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <?php echo e($song->plays_count); ?> plays
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-200">
                        <div class="flex items-center gap-2">
                            <a href="<?php echo e(route('admin.songs.show', $song)); ?>"
                               class="text-xs font-medium text-purple-600 hover:text-purple-700">
                                View
                            </a>
                            <a href="<?php echo e(route('admin.songs.edit', $song)); ?>"
                               class="text-xs font-medium text-slate-600 hover:text-slate-700">
                                Edit
                            </a>
                        </div>

                        <button onclick="toggleFeatured(<?php echo e($song->id); ?>)"
                                class="text-xs font-medium <?php echo e($song->is_featured ? 'text-yellow-600 hover:text-yellow-700' : 'text-slate-400 hover:text-yellow-600'); ?>">
                            ⭐
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full">
                <div class="glass-card py-12 text-center">
                    <div class="flex flex-col items-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100">
                            <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                        </div>
                        <h3 class="mt-4 text-sm font-semibold text-slate-900">No songs found</h3>
                        <p class="mt-1 text-sm text-slate-500">Start building your choir's repertoire</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if($songs->hasPages()): ?>
        <div class="glass-card px-6 py-4">
            <?php echo e($songs->links('pagination.tailwind')); ?>

        </div>
    <?php endif; ?>
</div>

<script>
// Audio player functionality
let currentAudio = null;
let currentPlayingButton = null;

function playSong(audioUrl, title) {
    // Stop current audio if playing
    if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
        if (currentPlayingButton) {
            currentPlayingButton.innerHTML = `
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                </svg>
            `;
        }
    }

    // Create new audio
    currentAudio = new Audio(audioUrl);
    currentPlayingButton = event.target.closest('button');

    // Update button to show pause icon
    currentPlayingButton.innerHTML = `
        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 4a1 1 0 00-1 1v10a1 1 0 102 0V5a1 1 0 00-1-1zm8 0a1 1 0 00-1 1v10a1 1 0 102 0V5a1 1 0 00-1-1z"/>
        </svg>
    `;

    currentAudio.play();

    currentAudio.onended = function() {
        currentPlayingButton.innerHTML = `
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
            </svg>
        `;
        currentAudio = null;
        currentPlayingButton = null;
    };

    currentAudio.onpause = function() {
        currentPlayingButton.innerHTML = `
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
            </svg>
        `;
        currentAudio = null;
        currentPlayingButton = null;
    };
}

function toggleFeatured(songId) {
    fetch(`/admin/songs/${songId}/toggle-featured`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/songs/index.blade.php ENDPATH**/ ?>