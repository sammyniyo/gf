@extends('admin.layout')

@section('page-title', 'Behind Stories')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Behind Stories</h1>
            <p class="mt-1 text-sm text-slate-500">Share the journey and testimonies</p>
        </div>
        <a href="{{ route('admin.stories.create') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Story
        </a>
    </div>

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
        @forelse($stories as $story)
            <div class="glass-card overflow-hidden">
                @if($story->featured_image)
                    <img src="{{ Storage::url($story->featured_image) }}" alt="{{ $story->title }}" class="h-48 w-full object-cover">
                @else
                    <div class="h-48 bg-gradient-to-br from-indigo-100 to-slate-100 flex items-center justify-center">
                        <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                @endif
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-2">
                        @if($story->is_published)
                            <span class="inline-flex items-center rounded-full bg-emerald-100 px-2 py-0.5 text-xs font-semibold text-emerald-700">Published</span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-slate-200 px-2 py-0.5 text-xs font-semibold text-slate-700">Draft</span>
                        @endif
                        @if($story->category)
                            <span class="inline-flex items-center rounded-full bg-indigo-100 px-2 py-0.5 text-xs font-semibold text-indigo-700">{{ $story->category }}</span>
                        @endif
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-2">{{ $story->title }}</h3>
                    <p class="text-sm text-slate-600 line-clamp-2 mb-4">{{ $story->excerpt }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.stories.edit', $story) }}" class="flex-1 text-center px-3 py-2 text-xs font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-500">Edit</a>
                        <form action="{{ route('admin.stories.destroy', $story) }}" method="POST" class="inline" onsubmit="return confirm('Delete this story?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-2 text-xs font-semibold text-rose-700 bg-rose-100 rounded-lg hover:bg-rose-200">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full glass-card py-12 text-center">
                <div class="flex h-12 w-12 mx-auto items-center justify-center rounded-full bg-slate-100 mb-4">
                    <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-slate-900">No stories yet</h3>
                <p class="mt-1 text-sm text-slate-500">Start sharing your journey</p>
            </div>
        @endforelse
    </div>

    @if($stories->hasPages())
        <div class="glass-card px-6 py-4">
            {{ $stories->links() }}
        </div>
    @endif
</div>
@endsection

