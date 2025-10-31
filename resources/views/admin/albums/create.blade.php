@extends('admin.layout')

@section('title', 'Create Album')

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
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Create New Album</h1>
        </div>
        <p class="text-gray-600 dark:text-gray-400 ml-9">Add a new album to your digital store</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.albums.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
        @csrf

        <!-- Album Title -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Album Title <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   id="title"
                   name="title"
                   value="{{ old('title') }}"
                   required
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                   placeholder="e.g., Heavenly Praise Vol. 1">
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
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                      placeholder="Describe the album...">{{ old('description') }}</textarea>
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
                       value="{{ old('price', '0') }}"
                       step="0.01"
                       min="0"
                       required
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                       placeholder="9.99">
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
                       value="{{ old('track_count') }}"
                       min="0"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                       placeholder="12">
                @error('track_count')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Cover Image -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Album Cover Image
            </label>
            <div class="flex items-center space-x-2">
                <label for="cover_image" class="cursor-pointer bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                    Choose File
                </label>
                <span id="cover_image_filename" class="text-gray-400 dark:text-gray-300">No file chosen</span>
                <input type="file"
                       id="cover_image"
                       name="cover_image"
                       accept="image/jpeg,image/jpg,image/png,image/webp"
                       class="hidden"
                       onchange="document.getElementById('cover_image_filename').textContent = this.files[0] ? this.files[0].name : 'No file chosen';">
            </div>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">JPG, PNG, or WebP. Max 5MB.</p>
            @error('cover_image')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- ZIP File Upload -->
        <div class="mb-6 p-6 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
                Album ZIP File
            </h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                Upload a ZIP file containing all the album tracks, artwork, and metadata. This will be used for downloads.
            </p>
            <div class="flex items-center space-x-2">
                <label for="zip_file" class="cursor-pointer bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                    Choose File
                </label>
                <span id="zip_file_filename" class="text-gray-400 dark:text-gray-300">No file chosen</span>
                <input type="file"
                       id="zip_file"
                       name="zip_file"
                       accept=".zip"
                       class="hidden"
                       onchange="document.getElementById('zip_file_filename').textContent = this.files[0] ? this.files[0].name : 'No file chosen';">
            </div>
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">ZIP file only. Max 100MB.</p>
            @error('zip_file')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror

            <div class="mt-3 p-3 bg-emerald-50 dark:bg-emerald-900/20 rounded-lg border border-emerald-200 dark:border-emerald-700">
                <h4 class="text-sm font-semibold text-emerald-800 dark:text-emerald-200 mb-2">ZIP File Should Include:</h4>
                <ul class="text-xs text-emerald-700 dark:text-emerald-300 space-y-1">
                    <li>• All audio tracks (MP3 format recommended)</li>
                    <li>• Album artwork (cover.jpg)</li>
                    <li>• Album information file (album_info.txt)</li>
                    <li>• Sheet music PDFs (if available)</li>
                </ul>
            </div>
        </div>

        <!-- Streaming Links -->
        <div class="mb-6 p-6 bg-gray-50 dark:bg-gray-900 rounded-lg border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Streaming Links (Optional)</h3>

            <div class="space-y-4">
                <!-- Spotify -->
                <div>
                    <label for="spotify_url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                        </svg>
                        Spotify URL
                    </label>
                    <input type="url"
                           id="spotify_url"
                           name="spotify_url"
                           value="{{ old('spotify_url') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                           placeholder="https://open.spotify.com/album/...">
                </div>

                <!-- Apple Music -->
                <div>
                    <label for="apple_music_url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.997 6.124c0-.738-.065-1.47-.24-2.19-.317-1.31-1.062-2.31-2.18-3.043C21.003.517 20.373.285 19.7.164c-.517-.093-1.038-.135-1.564-.15-.04-.003-.083-.01-.124-.013H5.988c-.152.01-.303.017-.455.026C4.786.07 4.043.15 3.34.428 2.004.958 1.04 1.88.475 3.208c-.192.448-.292.925-.363 1.408-.056.392-.088.785-.1 1.18-.013.37-.006.74-.006 1.11v9.185c0 .158.002.316.006.474.014.55.05 1.097.175 1.635.088.382.21.753.384 1.106.65 1.318 1.63 2.19 2.948 2.68.753.28 1.534.402 2.336.445.302.017.605.025.908.025h12.054c.307 0 .616-.006.922-.023.867-.05 1.713-.19 2.52-.514 1.048-.42 1.863-1.11 2.442-2.078.41-.686.63-1.424.723-2.193.042-.348.063-.697.068-1.046.005-.37.004-.738.004-1.108V6.124z"/>
                        </svg>
                        Apple Music URL
                    </label>
                    <input type="url"
                           id="apple_music_url"
                           name="apple_music_url"
                           value="{{ old('apple_music_url') }}"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                           placeholder="https://music.apple.com/album/...">
                </div>

                <!-- YouTube -->
                <div>
                    <label for="youtube_url" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z"/>
                        </svg>
                        YouTube URL
                    </label>
                    <input type="url"
                           id="youtube_url"
                           name="youtube_url"
                           value="{{ old('youtube_url') }}"
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
                       value="{{ old('release_date') }}"
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
                       value="{{ old('order', '0') }}"
                       min="0"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent"
                       placeholder="0">
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
                       {{ old('is_featured') ? 'checked' : '' }}
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
                       {{ old('is_active', true) ? 'checked' : '' }}
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
            <button type="submit" id="submit-btn"
                    class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-semibold rounded-lg transition-all transform hover:scale-105 shadow-lg">
                Create Album
            </button>
        </div>
    </form>

    <!-- Upload Progress -->
    <div id="upload-progress" class="hidden mt-6 bg-white dark:bg-gray-800 rounded-xl border border-emerald-200 dark:border-emerald-700 p-6 shadow">
        <div class="flex items-center gap-3 mb-2">
            <svg class="w-5 h-5 text-emerald-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
            </svg>
            <p class="text-sm font-semibold text-emerald-700 dark:text-emerald-300">Uploading files… <span id="upload-percent">0%</span></p>
        </div>
        <div class="w-full bg-emerald-100 dark:bg-emerald-900/30 rounded-full h-3 overflow-hidden">
            <div id="upload-bar" class="h-3 bg-emerald-600 rounded-full transition-all" style="width: 0%"></div>
        </div>
        <p id="upload-detail" class="mt-2 text-xs text-emerald-700 dark:text-emerald-300">Starting…</p>
    </div>
</div>
@endsection

@push('scripts')
<script>
(function() {
    const form = document.querySelector('form[action="{{ route('admin.albums.store') }}"]');
    if (!form) return;

    const progressBox = document.getElementById('upload-progress');
    const bar = document.getElementById('upload-bar');
    const percent = document.getElementById('upload-percent');
    const detail = document.getElementById('upload-detail');
    const submitBtn = document.getElementById('submit-btn');

    form.addEventListener('submit', function(e) {
        // Use XHR only when there is at least one file to track
        const hasCover = document.getElementById('cover_image')?.files?.length > 0;
        const hasZip = document.getElementById('zip_file')?.files?.length > 0;
        if (!hasCover && !hasZip) return; // normal submit

        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-60','cursor-not-allowed');
        progressBox.classList.remove('hidden');
        bar.style.width = '0%';
        percent.textContent = '0%';
        detail.textContent = 'Preparing files…';

        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);

        // CSRF
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (token) xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.upload.onprogress = function (evt) {
            if (evt.lengthComputable) {
                const p = Math.round((evt.loaded / evt.total) * 100);
                bar.style.width = p + '%';
                percent.textContent = p + '%';
                detail.textContent = p < 100 ? 'Uploading…' : 'Processing on server…';
            }
        };

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status >= 200 && xhr.status < 400) {
                    // Follow redirect if present
                    const locationHeader = xhr.getResponseHeader('X-Redirect-To');
                    if (locationHeader) {
                        window.location.href = locationHeader;
                    } else if (xhr.responseURL) {
                        // Laravel usually responds with redirect; responseURL will be final URL
                        window.location.href = '{{ route('admin.albums.index') }}';
                    } else {
                        window.location.href = '{{ route('admin.albums.index') }}';
                    }
                } else {
                    detail.textContent = 'Upload failed. Please try again.';
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-60','cursor-not-allowed');
                }
            }
        };

        const formData = new FormData(form);
        xhr.send(formData);
    });
})();
</script>
@endpush

