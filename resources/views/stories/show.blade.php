@extends('layouts.app')

@section('title', $story->meta_title ?? $story->title . ' | God\'s Family Choir')
@section('meta_description', $story->meta_description ?? $story->excerpt)
@section('meta_keywords', $story->meta_keywords ? implode(', ', $story->meta_keywords) : '')

@section('content')
<div class="fixed inset-x-0 top-0 z-40 h-0.5 bg-slate-200">
    <div id="reading-progress" class="h-full bg-emerald-700" style="width: 0%"></div>
</div>

<div class="bg-white">
    <section class="px-4 pt-28 pb-10 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-3xl">
            <nav class="mb-6 text-sm text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('stories.index') }}" class="hover:text-emerald-700">Stories</a>
            </nav>

            <div class="mb-4 flex flex-wrap items-center gap-2">
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ ucfirst($story->category) }}</span>
                @if($story->is_featured)
                    <span class="rounded-full bg-emerald-700 px-3 py-1 text-xs font-semibold text-white">Featured</span>
                @endif
            </div>

            <h1 class="text-3xl font-semibold leading-tight text-slate-900 sm:text-4xl">{{ $story->title }}</h1>

            <div class="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-sm text-slate-500">
                @if($story->author)
                    <span>{{ $story->author->name }}</span>
                @endif
                <span>{{ $story->published_at->format('M d, Y') }}</span>
                <span>{{ $story->reading_time }} min read</span>
                <span>{{ number_format($story->views_count) }} views</span>
            </div>
        </div>
    </section>

    <article class="px-4 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-3xl">
            @if($story->featured_image)
                <img src="{{ asset('storage/' . $story->featured_image) }}" alt="{{ $story->title }}" class="mb-10 w-full rounded-2xl object-cover">
            @endif

            <div class="prose prose-lg prose-slate prose-a:text-emerald-700 max-w-none">
                {!! $story->content !!}
            </div>

            @if($story->tags && count($story->tags) > 0)
                <div class="mt-10 flex flex-wrap gap-2">
                    @foreach($story->tags as $tag)
                        <a href="{{ route('stories.index', ['tag' => $tag]) }}" class="rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-600 hover:border-emerald-300 hover:text-emerald-700">
                            #{{ $tag }}
                        </a>
                    @endforeach
                </div>
            @endif

            <div class="mt-10 rounded-2xl border border-slate-200 p-6">
                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <p class="text-sm font-semibold text-slate-800">Enjoyed this story?</p>
                        <button onclick="likeStory()" id="like-btn" class="mt-3 inline-flex w-full items-center justify-center gap-2 rounded-full border border-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 hover:border-emerald-300 hover:text-emerald-700">
                            <span id="like-count">{{ number_format($story->likes_count) }} likes</span>
                        </button>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">Share</p>
                        <div class="mt-3 grid grid-cols-3 gap-2">
                            <button onclick="shareOnSocial('facebook')" class="rounded-full border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">Facebook</button>
                            <button onclick="shareOnSocial('twitter')" class="rounded-full border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">X</button>
                            <button onclick="copyLink(this)" class="rounded-full bg-emerald-700 px-3 py-2 text-xs font-semibold text-white hover:bg-emerald-600">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    @if($relatedStories->count() > 0)
        <section class="border-t border-slate-100 px-4 py-16 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-6xl">
                <h2 class="text-xl font-semibold text-slate-900">Related stories</h2>
                <div class="mt-6 grid gap-6 md:grid-cols-3">
                    @foreach($relatedStories as $related)
                        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                            <a href="{{ route('story.show', $related) }}" class="block">
                                @if($related->featured_image)
                                    <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="h-44 w-full object-cover">
                                @else
                                    <div class="h-32 bg-slate-100"></div>
                                @endif
                            </a>
                            <div class="p-5">
                                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ ucfirst($related->category) }}</p>
                                <h3 class="mt-1 font-semibold text-slate-900">
                                    <a href="{{ route('story.show', $related) }}" class="hover:text-emerald-700">{{ $related->title }}</a>
                                </h3>
                                <p class="mt-3 text-xs text-slate-500">{{ $related->reading_time }} min · {{ number_format($related->views_count) }} views</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="px-4 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl rounded-3xl bg-emerald-900 px-8 py-12 text-center text-white">
            <h2 class="text-2xl font-semibold sm:text-3xl">Explore more stories</h2>
            <a href="{{ route('stories.index') }}" class="mt-6 inline-flex rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">
                View all stories
            </a>
        </div>
    </section>
</div>

<x-static.footer />

<script>
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
            document.getElementById('like-count').textContent = data.likes.toLocaleString() + ' likes';
            liked = true;
        }
    })
    .catch(error => console.error('Error:', error));
}

function shareOnSocial(platform) {
    const url = window.location.href;
    const title = encodeURIComponent('{{ $story->title }}');
    let shareUrl = '';
    if (platform === 'facebook') {
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
    } else if (platform === 'twitter') {
        shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${title}`;
    }
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}

function copyLink(buttonEl) {
    const url = window.location.href;
    const onSuccess = () => {
        const original = buttonEl.textContent;
        buttonEl.textContent = 'Copied';
        setTimeout(() => { buttonEl.textContent = original; }, 2000);
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

window.addEventListener('scroll', function() {
    const article = document.querySelector('article');
    if (!article) return;
    const progress = Math.min(100, Math.max(0, (window.pageYOffset - article.offsetTop + window.innerHeight) / article.offsetHeight * 100));
    document.getElementById('reading-progress').style.width = progress + '%';
});
</script>
@endsection
