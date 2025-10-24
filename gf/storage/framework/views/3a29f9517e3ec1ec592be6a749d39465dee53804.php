<?php $__env->startSection('page-title', 'Add New Song'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Add New Song</h1>
            <p class="mt-1 text-sm text-slate-500">Add a new song to your choir's repertoire</p>
        </div>
        <a href="<?php echo e(route('admin.songs.index')); ?>"
           class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Songs
        </a>
    </div>

    <!-- Form -->
    <div class="glass-card p-6">
        <form action="<?php echo e(route('admin.songs.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Basic Information -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Basic Information</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Song Title *</label>
                        <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-slate-700 mb-2">Type *</label>
                        <select name="type" id="type" required
                                class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option value="">Select Type</option>
                            <option value="vocal" <?php echo e(old('type') === 'vocal' ? 'selected' : ''); ?>>Vocal</option>
                            <option value="instrumental" <?php echo e(old('type') === 'instrumental' ? 'selected' : ''); ?>>Instrumental</option>
                        </select>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('description')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Music Details -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Music Details</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <label for="composer" class="block text-sm font-medium text-slate-700 mb-2">Composer</label>
                        <input type="text" name="composer" id="composer" value="<?php echo e(old('composer')); ?>"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['composer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['composer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="arranger" class="block text-sm font-medium text-slate-700 mb-2">Arranger</label>
                        <input type="text" name="arranger" id="arranger" value="<?php echo e(old('arranger')); ?>"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['arranger'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['arranger'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="genre" class="block text-sm font-medium text-slate-700 mb-2">Genre</label>
                        <input type="text" name="genre" id="genre" value="<?php echo e(old('genre')); ?>" placeholder="e.g., Gospel, Contemporary"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['genre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['genre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="album" class="block text-sm font-medium text-slate-700 mb-2">Album</label>
                        <input type="text" name="album" id="album" value="<?php echo e(old('album')); ?>" placeholder="e.g., Praise & Worship Vol. 1"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['album'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['album'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <label for="key_signature" class="block text-sm font-medium text-slate-700 mb-2">Key Signature</label>
                        <input type="text" name="key_signature" id="key_signature" value="<?php echo e(old('key_signature')); ?>" placeholder="e.g., C, G, F"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['key_signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['key_signature'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="tempo" class="block text-sm font-medium text-slate-700 mb-2">Tempo (BPM)</label>
                        <input type="number" name="tempo" id="tempo" value="<?php echo e(old('tempo')); ?>" min="1" max="300"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['tempo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['tempo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="duration_seconds" class="block text-sm font-medium text-slate-700 mb-2">Duration (seconds)</label>
                        <input type="number" name="duration_seconds" id="duration_seconds" value="<?php echo e(old('duration_seconds')); ?>" min="1"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['duration_seconds'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['duration_seconds'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div>
                    <label for="difficulty" class="block text-sm font-medium text-slate-700 mb-2">Difficulty Level *</label>
                    <select name="difficulty" id="difficulty" required
                            class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['difficulty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <option value="">Select Difficulty</option>
                        <option value="beginner" <?php echo e(old('difficulty') === 'beginner' ? 'selected' : ''); ?>>Beginner</option>
                        <option value="intermediate" <?php echo e(old('difficulty') === 'intermediate' ? 'selected' : ''); ?>>Intermediate</option>
                        <option value="advanced" <?php echo e(old('difficulty') === 'advanced' ? 'selected' : ''); ?>>Advanced</option>
                        <option value="expert" <?php echo e(old('difficulty') === 'expert' ? 'selected' : ''); ?>>Expert</option>
                    </select>
                    <?php $__errorArgs = ['difficulty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Files -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Files</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="audio_file" class="block text-sm font-medium text-slate-700 mb-2">Audio File</label>
                        <input type="file" name="audio_file" id="audio_file" accept=".mp3,.wav,.ogg"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['audio_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <p class="mt-1 text-xs text-slate-500">Supported formats: MP3, WAV, OGG (max 10MB)</p>
                        <?php $__errorArgs = ['audio_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="sheet_music" class="block text-sm font-medium text-slate-700 mb-2">Sheet Music</label>
                        <input type="file" name="sheet_music" id="sheet_music" accept=".pdf"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['sheet_music'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <p class="mt-1 text-xs text-slate-500">PDF format only (max 5MB)</p>
                        <?php $__errorArgs = ['sheet_music'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Lyrics -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Lyrics</h3>

                <div>
                    <label for="lyrics" class="block text-sm font-medium text-slate-700 mb-2">Song Lyrics</label>
                    <textarea name="lyrics" id="lyrics" rows="8" placeholder="Enter the song lyrics here..."
                              class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 <?php $__errorArgs = ['lyrics'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('lyrics')); ?></textarea>
                    <?php $__errorArgs = ['lyrics'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <!-- Settings -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Settings</h3>

                <div class="flex items-center gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" <?php echo e(old('is_featured') ? 'checked' : ''); ?>

                               class="rounded border-slate-300 text-purple-600 focus:ring-purple-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Featured Song</span>
                    </label>

                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1" <?php echo e(old('is_published', true) ? 'checked' : ''); ?>

                               class="rounded border-slate-300 text-purple-600 focus:ring-purple-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Published</span>
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
                <a href="<?php echo e(route('admin.songs.index')); ?>"
                   class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-purple-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-purple-600/20 transition hover:bg-purple-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Add Song
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/admin/songs/create.blade.php ENDPATH**/ ?>