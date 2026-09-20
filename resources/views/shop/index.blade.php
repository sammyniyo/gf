@extends('layouts.app')

@section('title', 'Music | God\'s Family Choir')
@section('meta_description', 'Listen to and download albums from God\'s Family Choir. Stream on Spotify, Apple Music, and YouTube.')

@section('content')
<div class="bg-white">
    <section class="px-4 pt-28 pb-12 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-4xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">
                Music
            </span>
            <h1 class="mt-4 text-3xl font-semibold text-slate-900 sm:text-4xl">
                Listen & <span class="text-emerald-700">download</span>
            </h1>
            <p class="mx-auto mt-3 max-w-2xl text-base text-slate-600">
                Albums from God's Family Choir — stream them or take them with you.
            </p>

            <form action="{{ route('shop.search') }}" method="GET" class="relative mx-auto mt-8 max-w-xl">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search albums"
                       class="w-full rounded-full border border-slate-200 bg-white px-5 py-3 pr-28 text-slate-900 placeholder:text-slate-400 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                <button type="submit" class="absolute right-1.5 top-1/2 -translate-y-1/2 rounded-full bg-emerald-700 px-5 py-2 text-sm font-semibold text-white hover:bg-emerald-600">
                    Search
                </button>
            </form>

            <div class="mt-6 flex flex-wrap justify-center gap-2">
                <a href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J" target="_blank" rel="noopener"
                   class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">Spotify</a>
                <a href="https://music.apple.com/us/artist/gods-family-choir/1793673660" target="_blank" rel="noopener"
                   class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">Apple Music</a>
                <a href="https://www.youtube.com/@godsfamilychoir5583" target="_blank" rel="noopener"
                   class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:border-emerald-300 hover:text-emerald-700">YouTube</a>
            </div>
        </div>
    </section>

    @if(request('q'))
        <section class="px-4 pb-6 sm:px-8 lg:px-12">
            <div class="mx-auto max-w-6xl">
                <p class="text-sm text-slate-500">Results for “{{ request('q') }}”</p>
            </div>
        </section>
    @endif

    @if($featuredAlbums->count() > 0)
    <section class="px-4 pb-12 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <h2 class="text-xl font-semibold text-slate-900">Featured</h2>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($featuredAlbums as $album)
                    <x-shop.album-card :album="$album" :featured="true" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <section class="px-4 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-6 flex items-end justify-between gap-4">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">{{ request('q') ? 'Search results' : 'Albums' }}</h2>
                    <p class="text-sm text-slate-500">{{ $albums->total() }} {{ Str::plural('album', $albums->total()) }}</p>
                </div>
            </div>

            @if($albums->count() > 0)
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($albums as $album)
                        <x-shop.album-card :album="$album" />
                    @endforeach
                </div>

                @if($albums->hasPages())
                    <div class="mt-10">
                        {{ $albums->links() }}
                    </div>
                @endif
            @else
                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-8 py-16 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">No albums found</h3>
                    <p class="mt-2 text-sm text-slate-600">Try another search, or browse the full collection.</p>
                    <a href="{{ route('shop.index') }}" class="mt-6 inline-flex rounded-full bg-emerald-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-emerald-600">
                        View all albums
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="px-4 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl rounded-3xl bg-emerald-900 px-8 py-12 text-center text-white">
            <h2 class="text-2xl font-semibold sm:text-3xl">Support the ministry</h2>
            <p class="mx-auto mt-3 max-w-xl text-sm text-emerald-100">
                Downloads keep the choir recording and sharing the gospel through song.
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3">
                <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">
                    Contact us
                </a>
                <a href="{{ route('about') }}" class="inline-flex rounded-full border border-white/30 px-5 py-2.5 text-sm font-semibold text-white hover:bg-white/10">
                    About the choir
                </a>
            </div>
        </div>
    </section>
</div>

<x-static.footer />
@endsection
