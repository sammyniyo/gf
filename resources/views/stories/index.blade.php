@extends('layouts.app')

@section('title', 'Stories & Testimonies | God\'s Family Choir')

@section('content')
<div class="bg-white">
    <section class="px-4 pt-28 pb-12 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-4xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">
                Stories
            </span>
            <h1 class="mt-4 text-3xl font-semibold text-slate-900 sm:text-4xl">
                Stories of <span class="text-emerald-700">faith</span>
            </h1>
            <p class="mx-auto mt-3 max-w-2xl text-base text-slate-600">
                Testimonies of worship, ministry, and God’s faithfulness through the choir.
            </p>

            <form action="{{ route('stories.index') }}" method="GET" class="relative mx-auto mt-8 max-w-xl">
                <input type="text" name="search" placeholder="Search stories" value="{{ request('search') }}"
                       class="w-full rounded-full border border-slate-200 bg-white px-5 py-3 pr-28 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 rounded-full bg-emerald-700 px-5 py-2 text-sm font-semibold text-white hover:bg-emerald-600">
                    Search
                </button>
            </form>
        </div>
    </section>

    @if($featuredStories->count() > 0)
    <section class="px-4 pb-12 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <h2 class="text-xl font-semibold text-slate-900">Featured</h2>
            <div class="mt-6 grid gap-6 md:grid-cols-3">
                @foreach($featuredStories as $featured)
                    <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                        <a href="{{ route('story.show', $featured) }}" class="block">
                            @if($featured->featured_image)
                                <div class="relative h-48 overflow-hidden bg-slate-100">
                                    <img src="{{ asset('storage/' . $featured->featured_image) }}" alt="{{ $featured->title }}" class="h-full w-full object-cover">
                                    <span class="absolute left-3 top-3 rounded-full bg-emerald-700 px-3 py-1 text-xs font-semibold text-white">Featured</span>
                                </div>
                            @else
                                <div class="flex h-48 items-center justify-center bg-emerald-800">
                                    <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-semibold text-white">Featured</span>
                                </div>
                            @endif
                        </a>
                        <div class="p-5">
                            <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ ucfirst($featured->category) }}</p>
                            <h3 class="mt-1 text-lg font-semibold text-slate-900">
                                <a href="{{ route('story.show', $featured) }}" class="hover:text-emerald-700">{{ $featured->title }}</a>
                            </h3>
                            <p class="mt-2 line-clamp-3 text-sm text-slate-600">{{ $featured->excerpt }}</p>
                            <p class="mt-4 text-xs text-slate-500">{{ $featured->reading_time }} min · {{ number_format($featured->views_count) }} views</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="px-4 py-12 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-10 lg:grid-cols-4">
                <aside class="space-y-6 lg:col-span-1">
                    <div class="rounded-2xl border border-slate-200 bg-white p-5">
                        <h3 class="text-sm font-semibold text-slate-900">Categories</h3>
                        <div class="mt-3 space-y-1">
                            <a href="{{ route('stories.index') }}"
                               class="flex items-center justify-between rounded-full px-3 py-2 text-sm {{ !request('category') ? 'bg-emerald-700 text-white' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-800' }}">
                                All stories
                            </a>
                            @foreach($categories as $key => $label)
                                <a href="{{ route('stories.index', ['category' => $key]) }}"
                                   class="flex items-center justify-between rounded-full px-3 py-2 text-sm {{ request('category') == $key ? 'bg-emerald-700 text-white' : 'text-slate-600 hover:bg-emerald-50 hover:text-emerald-800' }}">
                                    {{ $label }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    @if(count($popularTags) > 0)
                        <div class="rounded-2xl border border-slate-200 bg-white p-5">
                            <h3 class="text-sm font-semibold text-slate-900">Tags</h3>
                            <div class="mt-3 flex flex-wrap gap-2">
                                @foreach($popularTags as $tag => $count)
                                    <a href="{{ route('stories.index', ['tag' => $tag]) }}"
                                       class="rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-600 hover:border-emerald-300 hover:text-emerald-700">
                                        #{{ $tag }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5">
                        <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Stories</p>
                        <p class="mt-1 text-3xl font-semibold text-emerald-800">{{ $stories->total() }}</p>
                    </div>
                </aside>

                <div class="lg:col-span-3">
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-slate-900">
                                {{ request('search') ? 'Search results' : (request('category') ? ucfirst(request('category')) : 'All stories') }}
                            </h2>
                            <p class="text-sm text-slate-500">{{ $stories->total() }} {{ Str::plural('story', $stories->total()) }}</p>
                        </div>
                        <form action="{{ route('stories.index') }}" method="GET">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            <select name="sort" onchange="this.form.submit()"
                                    class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm text-slate-700 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most read</option>
                                <option value="liked" {{ request('sort') == 'liked' ? 'selected' : '' }}>Most liked</option>
                            </select>
                        </form>
                    </div>

                    @if($stories->count() > 0)
                        <div class="mb-10 grid gap-6 md:grid-cols-2">
                            @foreach($stories as $story)
                                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                    <a href="{{ route('story.show', $story) }}" class="block">
                                        @if($story->featured_image)
                                            <div class="relative h-48 overflow-hidden bg-slate-100">
                                                <img src="{{ asset('storage/' . $story->featured_image) }}" alt="{{ $story->title }}" class="h-full w-full object-cover">
                                                <span class="absolute bottom-3 left-3 rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-slate-800">{{ ucfirst($story->category) }}</span>
                                                @if($story->is_featured)
                                                    <span class="absolute right-3 top-3 rounded-full bg-emerald-700 px-3 py-1 text-xs font-semibold text-white">Featured</span>
                                                @endif
                                            </div>
                                        @else
                                            <div class="flex h-40 items-center justify-center bg-slate-100">
                                                <span class="text-sm font-medium text-slate-400">{{ ucfirst($story->category) }}</span>
                                            </div>
                                        @endif
                                    </a>
                                    <div class="p-5">
                                        <h3 class="text-lg font-semibold text-slate-900">
                                            <a href="{{ route('story.show', $story) }}" class="hover:text-emerald-700">{{ $story->title }}</a>
                                        </h3>
                                        <p class="mt-2 line-clamp-2 text-sm text-slate-600">{{ Str::limit($story->excerpt, 120) }}</p>
                                        <p class="mt-4 text-xs text-slate-500">
                                            {{ $story->reading_time }} min · {{ number_format($story->views_count) }} views · {{ $story->published_at->format('M d') }}
                                        </p>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        @if($stories->hasPages())
                            {{ $stories->links() }}
                        @endif
                    @else
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 px-8 py-16 text-center">
                            <h3 class="text-lg font-semibold text-slate-900">No stories found</h3>
                            <p class="mt-2 text-sm text-slate-600">Try another search or category.</p>
                            <a href="{{ route('stories.index') }}" class="mt-6 inline-flex rounded-full bg-emerald-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-600">
                                View all stories
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl rounded-3xl bg-emerald-900 px-8 py-12 text-center text-white">
            <h2 class="text-2xl font-semibold sm:text-3xl">Have a story to share?</h2>
            <p class="mx-auto mt-3 max-w-xl text-sm text-emerald-100">
                Tell us how God has worked through this ministry.
            </p>
            <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">
                Share your story
            </a>
        </div>
    </section>
</div>

<x-static.footer />
@endsection
