@extends('admin.layout')

@section('page-title', 'Edit Story')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.stories.index') }}" class="text-slate-400 hover:text-slate-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Edit Story</h1>
        </div>
    </div>

    <div class="glass-card p-6">
        <form method="POST" action="{{ route('admin.stories.update', $story) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $story->title) }}" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Category</label>
                    <input type="text" name="category" value="{{ old('category', $story->category) }}"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Event Date</label>
                    <input type="date" name="event_date" value="{{ old('event_date', $story->event_date?->format('Y-m-d')) }}"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Excerpt</label>
                    <textarea name="excerpt" rows="2" class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">{{ old('excerpt', $story->excerpt) }}</textarea>
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Content *</label>
                    <textarea name="content" rows="8" required class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">{{ old('content', $story->content) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Featured Image</label>
                    <input type="file" name="featured_image" accept="image/*"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                    @if($story->featured_image)
                        <p class="mt-1 text-xs text-slate-500">Current image will be replaced if new one uploaded</p>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', $story->location) }}"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-lg focus:ring-1 focus:ring-indigo-400">
                </div>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $story->is_published) ? 'checked' : '' }}
                       class="h-4 w-4 text-indigo-600 border-slate-300 rounded">
                <label for="is_published" class="ml-2 text-sm text-slate-700">Published</label>
            </div>
            <div class="flex gap-3 justify-end pt-4 border-t border-slate-200">
                <a href="{{ route('admin.stories.index') }}" class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">Cancel</a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-500">Update Story</button>
            </div>
        </form>
    </div>
</div>
@endsection

