@extends('layouts.app')

@section('title', $story->meta_title ?? $story->title . ' | God\'s Family Choir')
@section('meta_description', $story->meta_description ?? $story->excerpt)
@section('meta_keywords', $story->meta_keywords ? implode(', ', $story->meta_keywords) : '')

@section('content')
<!-- Reading Progress Bar -->
<div class="fixed top-0 left-0 right-0 z-50 h-1 bg-gray-200">
    <div id="reading-progress" class="h-full bg-gradient-to-r from-emerald-500 via-amber-500 to-emerald-500 transition-all duration-300" style="width: 0%"></div>
</div>

<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-32 -left-20 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-96 w-96 rounded-full bg-amber-200/40 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 pt-32 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                    <li>
                        <a href="{{ route('home') }}" class="flex items-center gap-1.5 transition-colors hover:text-emerald-600">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li>
                        <a href="{{ route('stories.index') }}" class="transition-colors hover:text-emerald-600">Stories</a>
                    </li>
                    <li>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li class="max-w-xs truncate font-medium text-amber-600">{{ $story->title }}</li>
                </ol>
            </nav>

            <!-- Badges -->
            <div class="mb-6 flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-2 rounded-xl border-2 border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-bold text-emerald-800 shadow-sm">
                    <div class="h-2 w-2 rounded-full bg-emerald-600 animate-pulse"></div>
                    {{ ucfirst($story->category) }}
                </span>
                @if($story->is_featured)
                    <span class="inline-flex items-center gap-2 rounded-xl border-2 border-amber-200 bg-gradient-to-r from-amber-50 to-amber-100 px-4 py-2 text-sm font-bold text-amber-800 shadow-sm">
                        <svg class="h-4 w-4 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Featured Story
                    </span>
                @endif
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-black leading-tight text-gray-900 sm:text-5xl lg:text-6xl mb-8">
                {{ $story->title }}
            </h1>

            <!-- Meta Info -->
            <div class="flex flex-wrap items-center gap-4">
                @if($story->author)
                    <div class="flex items-center gap-3 rounded-xl border-2 border-gray-200 bg-white px-4 py-3 shadow-sm">
                        <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 text-lg font-bold text-white shadow-md">
                            {{ strtoupper(substr($story->author->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Written by</div>
                            <div class="font-bold text-gray-900">{{ $story->author->name }}</div>
                        </div>
                    </div>
                @endif
                <div class="flex items-center gap-2 rounded-xl border-2 border-gray-200 bg-white px-4 py-3 shadow-sm">
                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold text-gray-700">{{ $story->published_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center gap-2 rounded-xl border-2 border-gray-200 bg-white px-4 py-3 shadow-sm">
                    <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-semibold text-gray-700">{{ $story->reading_time }} min read</span>
                </div>
                <div class="flex items-center gap-2 rounded-xl border-2 border-gray-200 bg-white px-4 py-3 shadow-sm">
                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="font-semibold text-gray-700">{{ number_format($story->views_count) }} views</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <article class="relative z-10 px-6 py-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            <!-- Featured Image -->
            @if($story->featured_image)
                <div class="mb-12 overflow-hidden rounded-3xl shadow-2xl border-4 border-white">
                    <img src="{{ asset('storage/' . $story->featured_image) }}" alt="{{ $story->title }}" class="w-full h-auto">
                </div>
            @endif

            <!-- Content -->
            <div class="prose prose-lg prose-emerald max-w-none mb-12">
                <style>
                    .prose {
                        font-size: 1.125rem;
                        line-height: 1.8;
                        color: #374151;
                    }
                    .prose h2 {
                        font-size: 2rem;
                        font-weight: 800;
                        color: #047857;
                        margin-top: 2.5rem;
                        margin-bottom: 1.5rem;
                        padding-bottom: 0.75rem;
                        border-bottom: 3px solid #6ee7b7;
                    }
                    .prose h3 {
                        font-size: 1.5rem;
                        font-weight: 700;
                        color: #059669;
                        margin-top: 2rem;
                        margin-bottom: 1rem;
                    }
                    .prose p {
                        margin-bottom: 1.5rem;
                    }
                    .prose img {
                        border-radius: 1.5rem;
                        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
                        margin: 2.5rem 0;
                        border: 4px solid white;
                    }
                    .prose a {
                        color: #059669;
                        font-weight: 600;
                        text-decoration: none;
                        border-bottom: 2px solid #6ee7b7;
                        transition: all 0.3s;
                    }
                    .prose a:hover {
                        color: #047857;
                        border-bottom-color: #047857;
                    }
                    .prose blockquote {
                        border-left: 4px solid #f59e0b;
                        background: linear-gradient(to right, #fef3c7, #fef9c3);
                        padding: 1.5rem;
                        border-radius: 1rem;
                        font-style: italic;
                        margin: 2rem 0;
                        font-size: 1.125rem;
                        font-weight: 500;
                    }
                    .prose ul, .prose ol {
                        margin: 1.5rem 0;
                        padding-left: 2rem;
                    }
                    .prose li {
                        margin-bottom: 0.75rem;
                    }
                    .prose strong {
                        color: #065f46;
                        font-weight: 700;
                    }
                </style>
                {!! $story->content !!}
            </div>

            <!-- Tags -->
            @if($story->tags && count($story->tags) > 0)
                <div class="mb-8 overflow-hidden rounded-2xl border-2 border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100 p-6 shadow-lg">
                    <div class="mb-4 flex items-center gap-2 font-bold text-gray-700">
                        <svg class="h-5 w-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                        <span>Tags:</span>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($story->tags as $tag)
                            <a href="{{ route('stories.index', ['tag' => $tag]) }}" class="inline-flex items-center gap-1.5 rounded-full border-2 border-white bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition-all hover:border-emerald-400 hover:bg-gradient-to-r hover:from-emerald-600 hover:to-emerald-700 hover:text-white hover:shadow-md hover:scale-105">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                                {{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Share & Like Section -->
            <div class="relative mb-12 overflow-hidden rounded-3xl border-2 border-gray-100 bg-gradient-to-br from-emerald-50 via-white to-amber-50 p-8 shadow-xl">
                <div class="absolute top-0 left-0 w-40 h-40 bg-emerald-200/30 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-48 h-48 bg-amber-200/30 rounded-full blur-3xl"></div>

                <div class="relative grid gap-6 md:grid-cols-2">
                    <!-- Like Button -->
                    <div class="space-y-3">
                        <div class="text-sm font-bold text-gray-700">Enjoyed this story?</div>
                        <button onclick="likeStory()" id="like-btn" class="group flex w-full items-center gap-4 rounded-2xl bg-gradient-to-r from-red-500 to-pink-600 px-8 py-4 font-bold text-white shadow-xl transition-all hover:shadow-2xl hover:from-red-600 hover:to-pink-700 hover:scale-105">
                            <svg class="h-8 w-8 transition-transform group-hover:scale-125" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            <div class="text-left">
                                <div class="text-xs opacity-90">Love this story</div>
                                <div class="text-lg font-black" id="like-count">{{ number_format($story->likes_count) }} Likes</div>
                            </div>
                        </button>
                    </div>

                    <!-- Share Buttons -->
                    <div class="space-y-3">
                        <div class="text-sm font-bold text-gray-700">Share this story</div>
                        <div class="grid grid-cols-3 gap-3">
                            <button onclick="shareOnSocial('facebook')" class="group flex flex-col items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3 font-bold text-white shadow-lg transition-all hover:bg-blue-700 hover:shadow-xl hover:scale-105">
                                <svg class="h-5 w-5 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                <span class="text-xs">Facebook</span>
                            </button>
                            <button onclick="shareOnSocial('twitter')" class="group flex flex-col items-center justify-center gap-2 rounded-xl bg-sky-500 px-4 py-3 font-bold text-white shadow-lg transition-all hover:bg-sky-600 hover:shadow-xl hover:scale-105">
                                <svg class="h-5 w-5 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                <span class="text-xs">Twitter</span>
                            </button>
                            <button onclick="copyLink(this)" class="group flex flex-col items-center justify-center gap-2 rounded-xl bg-gray-700 px-4 py-3 font-bold text-white shadow-lg transition-all hover:bg-gray-800 hover:shadow-xl hover:scale-105">
                                <svg class="h-5 w-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                </svg>
                                <span class="text-xs">Copy Link</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Author Bio -->
            @if($story->author)
                <div class="mb-12 overflow-hidden rounded-3xl border-2 border-gray-100 bg-gradient-to-r from-emerald-50 via-amber-50 to-emerald-50 shadow-xl">
                    <div class="border-b-2 border-gray-200 bg-white/80 px-8 py-4">
                        <h3 class="text-xl font-bold text-gray-900">About the Author</h3>
                    </div>
                    <div class="flex items-start gap-6 p-8">
                        <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-600 to-emerald-700 text-3xl font-bold text-white shadow-xl">
                            {{ strtoupper(substr($story->author->name, 0, 1)) }}
                        </div>
                        <div class="flex-1">
                            <h4 class="text-2xl font-bold text-gray-900 mb-2">{{ $story->author->name }}</h4>
                            <p class="text-gray-700 leading-relaxed">A passionate member of God's Family Choir, sharing stories of faith, worship, and transformation through our ministry.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </article>

    <!-- Related Stories -->
    @if($relatedStories->count() > 0)
        <section class="relative z-10 px-6 py-20 sm:px-8 lg:px-12 bg-gradient-to-br from-gray-50/50 to-white">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 text-center">
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-2 text-xs font-bold uppercase tracking-wide text-emerald-700 border-2 border-emerald-200">
                        Continue Reading
                    </span>
                    <h2 class="mt-4 text-4xl font-bold text-gray-900">Related <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Stories</span></h2>
                </div>

                <div class="grid gap-8 md:grid-cols-3">
                    @foreach($relatedStories as $related)
                        <article class="group overflow-hidden rounded-2xl border-2 border-gray-100 bg-white shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2">
                            <a href="{{ route('story.show', $related) }}" class="block">
                                @if($related->featured_image)
                                    <div class="relative h-52 overflow-hidden">
                                        <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                        <span class="absolute bottom-3 left-3 rounded-full border-2 border-white/50 bg-white/95 backdrop-blur-sm px-3 py-1.5 text-xs font-bold text-gray-900">
                                            {{ ucfirst($related->category) }}
                                        </span>
                                    </div>
                                @else
                                    <div class="h-52 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                        <svg class="h-12 w-12 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                        </svg>
                                    </div>
                                @endif
                            </a>
                            <div class="p-6 space-y-4">
                                <h3 class="text-xl font-bold text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                    <a href="{{ route('story.show', $related) }}">{{ $related->title }}</a>
                                </h3>
                                <p class="text-gray-600 line-clamp-2">{{ Str::limit($related->excerpt, 100) }}</p>
                                <div class="flex items-center justify-between border-t-2 border-gray-100 pt-4 text-sm text-gray-500">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $related->reading_time }} min
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        {{ number_format($related->views_count) }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Call to Action -->
    <section class="relative z-10 px-6 pb-32 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-5xl">
            <div class="relative overflow-hidden rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-600 via-emerald-500 to-blue-600 p-12 text-center shadow-2xl">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
                <div class="relative">
                    <h2 class="text-4xl font-bold text-white mb-4 sm:text-5xl">
                        Explore More Stories
                    </h2>
                    <p class="text-xl text-emerald-50 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Discover more inspiring testimonies and transformative stories from our Seventh-day Adventist choir ministry
                    </p>
                    <a href="{{ route('stories.index') }}" class="inline-flex items-center gap-3 rounded-xl bg-white px-8 py-4 font-bold text-emerald-700 shadow-xl transition-all hover:shadow-2xl hover:bg-gray-50 hover:-translate-y-1">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        <span>View All Stories</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<x-static.footer />

<script>
// Like Story
let liked = false;
function likeStory() {
    if (liked) return;

    fetch('{{ route("story.like", $story) }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const likeCountEl = document.getElementById('like-count');
            likeCountEl.textContent = data.likes.toLocaleString() + ' Likes';
            liked = true;

            // Add success animation
            const likeBtn = document.getElementById('like-btn');
            likeBtn.classList.add('animate-pulse');
            setTimeout(() => likeBtn.classList.remove('animate-pulse'), 1000);
        }
    })
    .catch(error => console.error('Error:', error));
}

// Share on Social Media
function shareOnSocial(platform) {
    const url = window.location.href;
    const title = encodeURIComponent('{{ $story->title }}');

    let shareUrl = '';
    switch(platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${title}`;
            break;
    }

    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}

// Copy Link (with fallback for non-secure contexts)
function copyLink(buttonEl) {
    const url = window.location.href;
    const onSuccess = () => {
        const btn = buttonEl && buttonEl.closest('button') ? buttonEl.closest('button') : null;
        if (!btn) return;
        const originalHtml = btn.innerHTML;
        btn.innerHTML = '<svg class="h-5 w-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg><span class="text-xs mt-1">Copied!</span>';
        setTimeout(() => { btn.innerHTML = originalHtml; }, 2000);
    };

    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(url).then(onSuccess).catch(() => fallbackCopy(url, onSuccess));
    } else {
        fallbackCopy(url, onSuccess);
    }
}

function fallbackCopy(text, callback) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.top = '-1000px';
    textarea.setAttribute('readonly', '');
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        if (typeof callback === 'function') callback();
    } catch (e) {
        alert('Failed to copy link');
    }
    document.body.removeChild(textarea);
}

// Reading Progress
window.addEventListener('scroll', function() {
    const article = document.querySelector('article');
    if (article) {
        const articleHeight = article.offsetHeight;
        const articleTop = article.offsetTop;
        const windowHeight = window.innerHeight;
        const scrollTop = window.pageYOffset;

        const progress = Math.min(100, Math.max(0, (scrollTop - articleTop + windowHeight) / articleHeight * 100));
        document.getElementById('reading-progress').style.width = progress + '%';
    }
});
</script>
@endsection
