@extends('admin.layout')

@section('page-title', 'Add New Song')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Add New Song</h1>
            <p class="mt-1 text-sm text-slate-500">Add a new song to your choir's repertoire</p>
        </div>
        <a href="{{ route('admin.songs.index') }}"
           class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Songs
        </a>
    </div>

    <!-- Form -->
    <div class="glass-card p-6">
        <form action="{{ route('admin.songs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Basic Information</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Song Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('title') border-red-300 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-slate-700 mb-2">Type *</label>
                        <select name="type" id="type" required
                                class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('type') border-red-300 @enderror">
                            <option value="">Select Type</option>
                            <option value="vocal" {{ old('type') === 'vocal' ? 'selected' : '' }}>Vocal</option>
                            <option value="instrumental" {{ old('type') === 'instrumental' ? 'selected' : '' }}>Instrumental</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('description') border-red-300 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Music Details -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Music Details</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <label for="composer" class="block text-sm font-medium text-slate-700 mb-2">Composer</label>
                        <input type="text" name="composer" id="composer" value="{{ old('composer') }}"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('composer') border-red-300 @enderror">
                        @error('composer')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="arranger" class="block text-sm font-medium text-slate-700 mb-2">Arranger</label>
                        <input type="text" name="arranger" id="arranger" value="{{ old('arranger') }}"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('arranger') border-red-300 @enderror">
                        @error('arranger')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="genre" class="block text-sm font-medium text-slate-700 mb-2">Genre</label>
                        <input type="text" name="genre" id="genre" value="{{ old('genre') }}" placeholder="e.g., Gospel, Contemporary"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('genre') border-red-300 @enderror">
                        @error('genre')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="album" class="block text-sm font-medium text-slate-700 mb-2">Album</label>
                        <input type="text" name="album" id="album" value="{{ old('album') }}" placeholder="e.g., Praise & Worship Vol. 1"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('album') border-red-300 @enderror">
                        @error('album')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <label for="key_signature" class="block text-sm font-medium text-slate-700 mb-2">Key Signature</label>
                        <input type="text" name="key_signature" id="key_signature" value="{{ old('key_signature') }}" placeholder="e.g., C, G, F"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('key_signature') border-red-300 @enderror">
                        @error('key_signature')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tempo" class="block text-sm font-medium text-slate-700 mb-2">Tempo (BPM)</label>
                        <input type="number" name="tempo" id="tempo" value="{{ old('tempo') }}" min="1" max="300"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('tempo') border-red-300 @enderror">
                        @error('tempo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="duration_seconds" class="block text-sm font-medium text-slate-700 mb-2">Duration (seconds)</label>
                        <input type="number" name="duration_seconds" id="duration_seconds" value="{{ old('duration_seconds') }}" min="1"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('duration_seconds') border-red-300 @enderror">
                        @error('duration_seconds')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="difficulty" class="block text-sm font-medium text-slate-700 mb-2">Difficulty Level *</label>
                    <select name="difficulty" id="difficulty" required
                            class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('difficulty') border-red-300 @enderror">
                        <option value="">Select Difficulty</option>
                        <option value="beginner" {{ old('difficulty') === 'beginner' ? 'selected' : '' }}>Beginner</option>
                        <option value="intermediate" {{ old('difficulty') === 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                        <option value="advanced" {{ old('difficulty') === 'advanced' ? 'selected' : '' }}>Advanced</option>
                        <option value="expert" {{ old('difficulty') === 'expert' ? 'selected' : '' }}>Expert</option>
                    </select>
                    @error('difficulty')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Files -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Files</h3>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="audio_file" class="block text-sm font-medium text-slate-700 mb-2">Audio File</label>
                        <input type="file" name="audio_file" id="audio_file" accept=".mp3,.wav,.ogg"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('audio_file') border-red-300 @enderror">
                        <p class="mt-1 text-xs text-slate-500">Supported formats: MP3, WAV, OGG (max 10MB)</p>
                        @error('audio_file')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sheet_music" class="block text-sm font-medium text-slate-700 mb-2">Sheet Music</label>
                        <input type="file" name="sheet_music" id="sheet_music" accept=".pdf"
                               class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('sheet_music') border-red-300 @enderror">
                        <p class="mt-1 text-xs text-slate-500">PDF format only (max 5MB)</p>
                        @error('sheet_music')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Lyrics -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Lyrics</h3>

                <div>
                    <label for="lyrics" class="block text-sm font-medium text-slate-700 mb-2">Song Lyrics</label>
                    <textarea name="lyrics" id="lyrics" rows="8" placeholder="Enter the song lyrics here..."
                              class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-purple-400 focus:border-purple-400 @error('lyrics') border-red-300 @enderror">{{ old('lyrics') }}</textarea>
                    @error('lyrics')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Settings -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900">Settings</h3>

                <div class="flex items-center gap-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                               class="rounded border-slate-300 text-purple-600 focus:ring-purple-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Featured Song</span>
                    </label>

                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}
                               class="rounded border-slate-300 text-purple-600 focus:ring-purple-500">
                        <span class="ml-2 text-sm font-medium text-slate-700">Published</span>
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
                <a href="{{ route('admin.songs.index') }}"
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
@endsection
