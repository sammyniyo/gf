@extends('layouts.app')

@section('title', 'Stories & Testimonies | God\'s Family Choir')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-32 -left-20 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-96 w-96 rounded-full bg-amber-200/40 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 pt-32 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="text-center space-y-6">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                    </svg>
                    Inspiring Stories
                </span>
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-gray-900 leading-tight">
                    Stories of <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Faith</span> & <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">Transformation</span>
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    Discover inspiring testimonies of worship, ministry, and God's faithfulness through our Seventh-day Adventist choir journey
                </p>

                <!-- Search Bar -->
                <div class="mt-8 max-w-2xl mx-auto">
                    <form action="{{ route('stories.index') }}" method="GET" class="relative">
                        <input type="text" name="search" placeholder="Search stories, testimonies..." value="{{ request('search') }}"
                               class="w-full rounded-2xl border-2 border-gray-200 px-6 py-4 pr-32 text-gray-900 placeholder-gray-400 shadow-lg transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-3 font-bold text-white shadow-lg transition-all hover:shadow-xl hover:-translate-y-0.5">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Stories -->
    @if($featuredStories->count() > 0)
    <section class="relative z-10 px-6 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-xs font-bold uppercase tracking-wide text-amber-700 border-2 border-amber-200">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    Featured Stories
                </span>
                <h2 class="mt-4 text-4xl font-bold text-gray-900 sm:text-5xl">
                    Highlighted <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">Testimonies</span>
                </h2>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                @foreach($featuredStories as $featured)
                    <article class="group relative overflow-hidden rounded-3xl border-2 border-gray-100 bg-white shadow-xl transition-all hover:shadow-2xl hover:-translate-y-2">
                        <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 via-amber-500 to-emerald-600 rounded-3xl blur opacity-0 group-hover:opacity-30 transition-opacity"></div>

                        <div class="relative">
                            <a href="{{ route('story.show', $featured) }}" class="block">
                                @if($featured->featured_image)
                                    <div class="relative h-64 overflow-hidden">
                                        <img src="{{ asset('storage/' . $featured->featured_image) }}" alt="{{ $featured->title }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                                        <!-- Featured Badge -->
                                        <div class="absolute top-4 right-4 flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-4 py-2 text-sm font-bold text-white shadow-xl">
                                            <svg class="h-4 w-4 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                            Featured
                                        </div>

                                        <!-- Category -->
                                        <div class="absolute bottom-4 left-4 rounded-full border-2 border-white/50 bg-white/95 backdrop-blur-sm px-3 py-1.5 text-xs font-bold text-gray-900">
                                            {{ ucfirst($featured->category) }}
                                        </div>
                                    </div>
                                @else
                                    <div class="relative h-64 bg-gradient-to-br from-emerald-600 via-emerald-700 to-emerald-800 flex items-center justify-center overflow-hidden">
                                        <div class="absolute inset-0 opacity-10">
                                            <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full blur-2xl"></div>
                                            <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                        </div>
                                        <svg class="h-16 w-16 text-white opacity-50" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                        </svg>
                                    </div>
                                @endif
                            </a>

                            <div class="p-6 space-y-4">
                                <h3 class="text-2xl font-bold text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                    <a href="{{ route('story.show', $featured) }}">{{ $featured->title }}</a>
                                </h3>
                                <p class="text-gray-600 line-clamp-3 leading-relaxed">{{ $featured->excerpt }}</p>

                                <!-- Meta -->
                                <div class="flex items-center gap-4 border-t-2 border-gray-100 pt-4 text-sm text-gray-500">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-medium">{{ $featured->reading_time }} min</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <span class="font-medium">{{ number_format($featured->views_count) }}</span>
                                    </div>
                                    @if($featured->likes_count > 0)
                                        <div class="flex items-center gap-1.5">
                                            <svg class="h-4 w-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-medium">{{ number_format($featured->likes_count) }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Main Content -->
    <section class="relative z-10 px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-12 lg:grid-cols-4">
                <!-- Sidebar -->
                <aside class="lg:col-span-1 space-y-6">
                    <!-- Categories -->
                    <div class="overflow-hidden rounded-2xl border-2 border-gray-100 bg-white shadow-lg">
                        <div class="border-b-2 border-gray-100 bg-gradient-to-r from-emerald-50 to-emerald-100 p-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-600 text-white">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900">Categories</h3>
                            </div>
                        </div>
                        <div class="p-4 space-y-2">
                            <a href="{{ route('stories.index') }}" class="group flex items-center justify-between rounded-xl px-4 py-3 transition-all {{ !request('category') ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg' : 'hover:bg-emerald-50' }}">
                                <span class="font-semibold">All Stories</span>
                                <svg class="h-4 w-4 {{ !request('category') ? 'text-white' : 'text-gray-400 group-hover:text-emerald-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                            @foreach($categories as $key => $label)
                                <a href="{{ route('stories.index', ['category' => $key]) }}" class="group flex items-center justify-between rounded-xl px-4 py-3 transition-all {{ request('category') == $key ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg' : 'hover:bg-emerald-50' }}">
                                    <span class="font-semibold">{{ $label }}</span>
                                    <svg class="h-4 w-4 {{ request('category') == $key ? 'text-white' : 'text-gray-400 group-hover:text-emerald-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Popular Tags -->
                    @if(count($popularTags) > 0)
                        <div class="overflow-hidden rounded-2xl border-2 border-amber-100 bg-gradient-to-br from-amber-50 to-orange-50 shadow-lg">
                            <div class="border-b-2 border-amber-200 bg-gradient-to-r from-amber-100 to-orange-100 p-6">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-600 text-white">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900">Popular Tags</h3>
                                </div>
                            </div>
                            <div class="p-4 flex flex-wrap gap-2">
                                @foreach($popularTags as $tag => $count)
                                    <a href="{{ route('stories.index', ['tag' => $tag]) }}" class="inline-flex items-center gap-1.5 rounded-full border-2 border-amber-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition-all hover:border-amber-400 hover:bg-gradient-to-r hover:from-amber-500 hover:to-orange-500 hover:text-white hover:shadow-md hover:scale-105">
                                        <span>#{{ $tag }}</span>
                                        <span class="text-xs opacity-75">({{ $count }})</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Stats -->
                    <div class="overflow-hidden rounded-2xl border-2 border-blue-100 bg-gradient-to-br from-blue-50 to-indigo-50 shadow-lg">
                        <div class="border-b-2 border-blue-200 bg-gradient-to-r from-blue-100 to-indigo-100 p-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900">Stats</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between rounded-xl border-2 border-blue-200 bg-white p-4 shadow-sm">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">
                                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Total Stories</span>
                                </div>
                                <span class="text-3xl font-black text-emerald-600">{{ $stories->total() }}</span>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Stories Grid -->
                <div class="lg:col-span-3">
                    <!-- Header with Sort -->
                    <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">
                                {{ request('search') ? 'Search Results' : (request('category') ? ucfirst(request('category')) : 'All Stories') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">{{ $stories->total() }} {{ Str::plural('story', $stories->total()) }} found</p>
                        </div>
                        <form action="{{ route('stories.index') }}" method="GET" class="flex items-center gap-2">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            <select name="sort" onchange="this.form.submit()" class="rounded-xl border-2 border-gray-200 px-4 py-2.5 font-semibold text-gray-700 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none bg-white shadow-sm">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest First</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Most Popular</option>
                                <option value="liked" {{ request('sort') == 'liked' ? 'selected' : '' }}>Most Liked</option>
                            </select>
                        </form>
                    </div>

                    <!-- Stories Grid -->
                    @if($stories->count() > 0)
                        <div class="grid gap-8 md:grid-cols-2 mb-12">
                            @foreach($stories as $story)
                                <article class="group relative overflow-hidden rounded-2xl border-2 border-gray-100 bg-white shadow-lg transition-all hover:shadow-2xl hover:-translate-y-1">
                                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-600 to-blue-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition-opacity"></div>

                                    <div class="relative">
                                        <a href="{{ route('story.show', $story) }}" class="block">
                                            @if($story->featured_image)
                                                <div class="relative h-56 overflow-hidden">
                                                    <img src="{{ asset('storage/' . $story->featured_image) }}" alt="{{ $story->title }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>

                                                    <!-- Category Badge -->
                                                    <div class="absolute bottom-3 left-3 flex items-center gap-2 rounded-full border-2 border-white/50 bg-white/95 backdrop-blur-sm px-3 py-1.5 text-xs font-bold text-gray-900 shadow-lg">
                                                        <div class="h-2 w-2 rounded-full bg-emerald-600 animate-pulse"></div>
                                                        {{ ucfirst($story->category) }}
                                                    </div>

                                                    @if($story->is_featured)
                                                        <div class="absolute top-3 right-3 flex items-center gap-1.5 rounded-full bg-gradient-to-r from-amber-500 to-amber-600 px-3 py-1.5 text-xs font-bold text-white shadow-lg">
                                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                            </svg>
                                                            Featured
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="relative h-56 bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 flex items-center justify-center overflow-hidden">
                                                    <div class="absolute inset-0 opacity-20">
                                                        <div class="absolute top-0 left-0 w-24 h-24 bg-emerald-500 rounded-full blur-2xl"></div>
                                                        <div class="absolute bottom-0 right-0 w-32 h-32 bg-blue-500 rounded-full blur-2xl"></div>
                                                    </div>
                                                    <svg class="h-16 w-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </a>

                                        <div class="p-6 space-y-4">
                                            <h3 class="text-xl font-bold text-gray-900 line-clamp-2 leading-tight group-hover:text-emerald-600 transition-colors">
                                                <a href="{{ route('story.show', $story) }}">{{ $story->title }}</a>
                                            </h3>
                                            <p class="text-gray-600 line-clamp-2 leading-relaxed">{{ Str::limit($story->excerpt, 120) }}</p>

                                            <!-- Tags -->
                                            @if($story->tags && count($story->tags) > 0)
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach(array_slice($story->tags, 0, 3) as $tag)
                                                        <span class="inline-block rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600">
                                                            #{{ $tag }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            @endif

                                            <!-- Meta -->
                                            <div class="flex items-center justify-between border-t-2 border-gray-100 pt-4 text-sm">
                                                <div class="flex items-center gap-4 text-gray-500">
                                                    <div class="flex items-center gap-1.5">
                                                        <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <span class="font-medium">{{ $story->reading_time }}m</span>
                                                    </div>
                                                    <div class="flex items-center gap-1.5">
                                                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        <span class="font-medium">{{ number_format($story->views_count) }}</span>
                                                    </div>
                                                    @if($story->likes_count > 0)
                                                        <div class="flex items-center gap-1.5">
                                                            <svg class="h-4 w-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="font-medium">{{ number_format($story->likes_count) }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <span class="font-medium text-gray-400">{{ $story->published_at->format('M d') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if($stories->hasPages())
                            <div class="mt-8">
                                {{ $stories->links() }}
                            </div>
                        @endif
                    @else
                        <div class="rounded-3xl border-2 border-gray-200 bg-white p-16 text-center shadow-lg">
                            <svg class="mx-auto h-20 w-20 text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">No Stories Found</h3>
                            <p class="text-gray-600 mb-8 max-w-md mx-auto">We couldn't find any stories matching your criteria. Try adjusting your search or filters.</p>
                            <a href="{{ route('stories.index') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-4 font-bold text-white shadow-xl transition-all hover:shadow-2xl hover:-translate-y-1">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                                View All Stories
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="relative z-10 px-6 pb-32 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-5xl">
            <div class="relative overflow-hidden rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-600 via-emerald-500 to-blue-600 p-12 text-center shadow-2xl">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
                <div class="relative">
                    <h2 class="text-4xl font-bold text-white mb-4 sm:text-5xl">
                        Have a Story to Share?
                    </h2>
                    <p class="text-xl text-emerald-50 mb-8 max-w-2xl mx-auto leading-relaxed">
                        We'd love to hear how God has worked in your life through our ministry. Your testimony could inspire others!
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 rounded-xl bg-white px-8 py-4 font-bold text-emerald-700 shadow-xl transition-all hover:shadow-2xl hover:bg-gray-50 hover:-translate-y-1">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Share Your Story</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<x-static.footer />
@endsection
