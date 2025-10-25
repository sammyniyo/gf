@extends('admin.layout')

@section('title', 'Edit Album')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('admin.albums.index') }}"
               class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Album</h1>
        </div>
        <p class="text-gray-600 dark:text-gray-400 ml-9">Update album information</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.albums.update', $album) }}" method="POST" enctype="multipart/form-data"
          class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
        @csrf
        @method('PUT')

        <!-- Current Cover Preview -->
        @if($album->cover_image)
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Current Cover Image
            </label>
            <img src="{{ $album->cover_image_url }}"
                 alt="{{ $album->title }}"
                 class="w-48 h-48 rounded-lg object-cover shadow-lg">
        </div>
        @endif

        <!-- Album Title -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Album Title <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   id="title"
                   name="title"
                   value="{{ old('title', $album->title) }}"
                   required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            @error('title')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-6">
            <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Description
            </label>
            <textarea id="description"
                      name="description"
                      rows="4"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">{{ old('description', $album->description) }}</textarea>
            @error('description')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Price (USD) <span class="text-red-500">*</span>
                </label>
                <input type="number"
                       id="price"
                       name="price"
                       value="{{ old('price', $album->price) }}"
                       step="0.01"
                       min="0"
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Set to 0 for free albums</p>
                @error('price')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Track Count -->
            <div>
                <label for="track_count" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Number of Tracks
                </label>
                <input type="number"
                       id="track_count"
                       name="track_count"
                       value="{{ old('track_count', $album->track_count) }}"
                       min="0"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                @error('track_count')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Cover Image -->
        <div class="mb-6">
            <label for="cover_image" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Album Cover Image {{ $album->cover_image ? '(Replace existing)' : '' }}
            </label>
            <input type="file"
                   id="cover_image"
                   name="cover_image"
                   accept="image/jpeg,image/jpg,image/png,image/webp"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, or WebP. Max 5MB. Leave empty to keep current image.</p>
            @error('cover_image')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Streaming Links -->
        <div class="mb-6 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Streaming Links (Optional)</h3>

            <div class="space-y-4">
                <!-- Spotify -->
                <div>
                    <label for="spotify_url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Spotify URL
                    </label>
                    <input type="url"
                           id="spotify_url"
                           name="spotify_url"
                           value="{{ old('spotify_url', $album->spotify_url) }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                           placeholder="https://open.spotify.com/album/...">
                </div>

                <!-- Apple Music -->
                <div>
                    <label for="apple_music_url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Apple Music URL
                    </label>
                    <input type="url"
                           id="apple_music_url"
                           name="apple_music_url"
                           value="{{ old('apple_music_url', $album->apple_music_url) }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                           placeholder="https://music.apple.com/album/...">
                </div>

                <!-- YouTube -->
                <div>
                    <label for="youtube_url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        YouTube URL
                    </label>
                    <input type="url"
                           id="youtube_url"
                           name="youtube_url"
                           value="{{ old('youtube_url', $album->youtube_url) }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                           placeholder="https://youtube.com/playlist?list=...">
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Release Date -->
            <div>
                <label for="release_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Release Date
                </label>
                <input type="date"
                       id="release_date"
                       name="release_date"
                       value="{{ old('release_date', $album->release_date?->format('Y-m-d')) }}"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Display Order
                </label>
                <input type="number"
                       id="order"
                       name="order"
                       value="{{ old('order', $album->order) }}"
                       min="0"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Lower numbers appear first</p>
            </div>
        </div>

        <!-- Checkboxes -->
        <div class="mb-8 space-y-3">
            <div class="flex items-center">
                <input type="checkbox"
                       id="is_featured"
                       name="is_featured"
                       value="1"
                       {{ old('is_featured', $album->is_featured) ? 'checked' : '' }}
                       class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                <label for="is_featured" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Featured Album (Show on homepage)
                </label>
            </div>

            <div class="flex items-center">
                <input type="checkbox"
                       id="is_active"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $album->is_active) ? 'checked' : '' }}
                       class="w-5 h-5 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                <label for="is_active" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                    Active (Visible in shop)
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
            <a href="{{ route('admin.albums.index') }}"
               class="px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-semibold rounded-lg transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold rounded-lg transition-all transform hover:scale-105 shadow-lg">
                Update Album
            </button>
        </div>
    </form>
</div>
@endsection

