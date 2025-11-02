@extends('admin.layout')

@section('title', 'Edit Gallery Image')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('admin.galleries.index') }}"
               class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-black">Edit Gallery Image</h1>
        </div>
        <p class="text-gray-800 ml-9">Update gallery image details</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data"
          class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
        @csrf
        @method('PUT')

        <!-- Current Image -->
        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Current Image
            </label>
            <img src="{{ Storage::disk('public')->url($gallery->image_path) }}"
                 alt="{{ $gallery->title ?? 'Gallery Image' }}"
                 class="max-w-full max-h-64 rounded-lg border border-gray-300">
        </div>

        <!-- New Image Upload (Optional) -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Replace Image (Optional)
            </label>
            <input type="file" id="image" name="image" accept="image/*"
                   onchange="previewImage(this)"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            <div id="imagePreview" class="mt-4 hidden">
                <img id="preview" src="" alt="Preview" class="max-w-full max-h-64 rounded-lg">
            </div>
            @error('image')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Title -->
        <div class="mb-6">
            <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Title
            </label>
            <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}"
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
            <textarea id="description" name="description" rows="4"
                      class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">{{ old('description', $gallery->description) }}</textarea>
            @error('description')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div class="mb-6">
            <label for="category" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Category
            </label>
            <select id="category" name="category"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                <option value="">Select a category</option>
                @foreach($categories as $key => $label)
                    <option value="{{ $key }}" {{ old('category', $gallery->category) == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('category')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Event Date -->
        <div class="mb-6">
            <label for="event_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Event Date
            </label>
            <input type="date" id="event_date" name="event_date"
                   value="{{ old('event_date', $gallery->event_date?->format('Y-m-d')) }}"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            @error('event_date')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Order -->
        <div class="mb-6">
            <label for="order" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Display Order
            </label>
            <input type="number" id="order" name="order" value="{{ old('order', $gallery->order) }}" min="0"
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            @error('order')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Options -->
        <div class="mb-6">
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Featured</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-500">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex gap-4">
            <button type="submit"
                    class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all shadow-lg hover:shadow-xl">
                Update Image
            </button>
            <a href="{{ route('admin.galleries.index') }}"
               class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold transition">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const previewDiv = document.getElementById('imagePreview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewDiv.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        previewDiv.classList.add('hidden');
    }
}
</script>
@endsection

