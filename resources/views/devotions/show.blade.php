@extends('layouts.app')

@section('title', $devotion->title . ' | God\'s Family Choir')

@section('content')
<div class="bg-white">
    <section class="px-4 pt-28 pb-10 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-3xl">
            <nav class="mb-6 text-sm text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('devotions.index') }}" class="hover:text-emerald-700">Devotions</a>
            </nav>

            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ ucfirst($devotion->category) }}</span>
            <h1 class="mt-4 text-3xl font-semibold leading-tight text-slate-900 sm:text-4xl">{{ $devotion->title }}</h1>

            @if($devotion->scripture_reference)
                <p class="mt-4 text-base font-medium text-emerald-700">{{ $devotion->scripture_reference }}</p>
            @endif

            <div class="mt-5 flex flex-wrap gap-x-5 gap-y-2 text-sm text-slate-500">
                @if($devotion->author)
                    <span>{{ $devotion->author }}</span>
                @endif
                <span>{{ $devotion->created_at->format('F d, Y') }}</span>
            </div>
        </div>
    </section>

    <article class="px-4 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-10 lg:grid-cols-3">
                <div class="lg:col-span-2">
                    @if($devotion->featured_image)
                        <img src="{{ asset('storage/' . $devotion->featured_image) }}" alt="{{ $devotion->title }}" class="mb-8 w-full rounded-2xl object-cover">
                    @endif

                    <div class="prose prose-lg prose-slate prose-a:text-emerald-700 max-w-none">
                        {!! nl2br(e($devotion->content)) !!}
                    </div>

                    <div class="mt-10 rounded-2xl border border-slate-200 p-6">
                        <p class="text-sm font-semibold text-slate-800">Share</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <button onclick="shareOnSocial('facebook')" class="rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">Facebook</button>
                            <button onclick="shareOnSocial('twitter')" class="rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">X</button>
                            <button onclick="shareOnSocial('whatsapp')" class="rounded-full border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">WhatsApp</button>
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    @if($relatedDevotions->count() > 0)
                        <div class="rounded-2xl border border-slate-200 p-5">
                            <h3 class="text-sm font-semibold text-slate-900">Related</h3>
                            <div class="mt-4 space-y-4">
                                @foreach($relatedDevotions as $related)
                                    <a href="{{ route('devotions.show', $related) }}" class="block">
                                        <p class="text-sm font-semibold text-slate-900 hover:text-emerald-700">{{ $related->title }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $related->created_at->format('M d, Y') }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="rounded-2xl bg-emerald-900 p-6 text-white">
                        <h3 class="text-lg font-semibold">Stay updated</h3>
                        <p class="mt-2 text-sm text-emerald-100">New devotions by email.</p>
                        <form action="{{ route('subscribe') }}" method="POST" class="mt-4 space-y-3">
                            @csrf
                            <input type="email" name="email" placeholder="Your email" required
                                   class="w-full rounded-full border border-white/20 bg-white/10 px-4 py-2.5 text-sm text-white placeholder:text-emerald-200 focus:border-white focus:outline-none">
                            <button type="submit" class="w-full rounded-full bg-white px-4 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">
                                Subscribe
                            </button>
                        </form>
                        @if(session('subscriber_success'))
                            <p class="mt-3 text-sm text-emerald-100">{{ session('subscriber_success') }}</p>
                        @endif
                    </div>
                </aside>
            </div>
        </div>
    </article>

    <section class="px-4 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl rounded-3xl bg-emerald-900 px-8 py-12 text-center text-white">
            <h2 class="text-2xl font-semibold sm:text-3xl">More daily reflections</h2>
            <a href="{{ route('devotions.index') }}" class="mt-6 inline-flex rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">
                View all devotions
            </a>
        </div>
    </section>
</div>

<x-static.footer />

<script>
function shareOnSocial(platform) {
    const url = window.location.href;
    const title = encodeURIComponent('{{ $devotion->title }}');
    let shareUrl = '';
    if (platform === 'facebook') {
        shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
    } else if (platform === 'twitter') {
        shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${title}`;
    } else if (platform === 'whatsapp') {
        shareUrl = `https://wa.me/?text=${title}%20${encodeURIComponent(url)}`;
    }
    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}
</script>
@endsection
