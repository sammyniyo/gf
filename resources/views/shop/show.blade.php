@extends('layouts.app')

@section('title', $album->title . ' | God\'s Family Choir')
@section('meta_description', $album->description ?? 'Listen to and download ' . $album->title . ' by God\'s Family Choir')

@section('content')
<div class="bg-white">
    <section class="px-4 pt-28 pb-12 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-6xl">
            <nav class="mb-8 text-sm text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('shop.index') }}" class="hover:text-emerald-700">Music</a>
            </nav>

            <div class="grid gap-10 lg:grid-cols-[280px_1fr] lg:items-start">
                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">
                    <img src="{{ $album->cover_image_url }}" alt="{{ $album->title }}" class="aspect-square w-full object-cover">
                </div>

                <div>
                    <h1 class="text-3xl font-semibold text-slate-900 sm:text-4xl">{{ $album->title }}</h1>
                    @if($album->description)
                        <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-600">{{ $album->description }}</p>
                    @endif

                    <p class="mt-4 text-sm text-slate-500">
                        @if($album->track_count > 0)
                            {{ $album->track_count }} {{ Str::plural('track', $album->track_count) }}
                        @endif
                        @if($album->track_count > 0 && $album->release_date)
                            ·
                        @endif
                        @if($album->release_date)
                            {{ $album->release_date->format('F Y') }}
                        @endif
                    </p>

                    @if($album->spotify_url || $album->apple_music_url || $album->youtube_url)
                        <div class="mt-6 flex flex-wrap gap-2">
                            @if($album->spotify_url)
                                <a href="{{ $album->spotify_url }}" target="_blank" rel="noopener"
                                   class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">Spotify</a>
                            @endif
                            @if($album->apple_music_url)
                                <a href="{{ $album->apple_music_url }}" target="_blank" rel="noopener"
                                   class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">Apple Music</a>
                            @endif
                            @if($album->youtube_url)
                                <a href="{{ $album->youtube_url }}" target="_blank" rel="noopener"
                                   class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">YouTube</a>
                            @endif
                        </div>
                    @endif

                    <div class="mt-8 max-w-sm rounded-2xl border border-slate-200 p-6">
                        <p class="text-lg font-semibold {{ $album->isFree() ? 'text-emerald-700' : 'text-slate-900' }}">
                            {{ $album->isFree() ? 'Free download' : '$' . number_format($album->price, 2) }}
                        </p>
                        <p class="mt-1 text-sm text-slate-500">High-quality MP3 · Instant access</p>
                        <a href="{{ route('shop.purchase', $album->id) }}"
                           class="mt-5 inline-flex w-full items-center justify-center rounded-full bg-emerald-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-600">
                            {{ $album->isFree() ? 'Download' : 'Purchase' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($relatedAlbums->count() > 0)
        <section class="border-t border-slate-100 px-4 py-16 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-6xl">
                <h2 class="text-xl font-semibold text-slate-900">More albums</h2>
                <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($relatedAlbums as $relatedAlbum)
                        <x-shop.album-card :album="$relatedAlbum" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>

<x-static.footer />
@endsection
