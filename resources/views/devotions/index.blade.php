@extends('layouts.app')

@section('title', 'Daily Devotions | God\'s Family Choir')

@section('content')
<div class="bg-white">
    <section class="px-4 pt-28 pb-12 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-4xl text-center">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">
                Daily inspiration
            </span>
            <h1 class="mt-4 text-3xl font-semibold text-slate-900 sm:text-4xl">
                Daily <span class="text-emerald-700">devotions</span>
            </h1>
            <p class="mx-auto mt-3 max-w-2xl text-base text-slate-600">
                Scripture and short reflections from the choir community.
            </p>
        </div>
    </section>

    <section class="px-4 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            @if($devotions->count() > 0)
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($devotions as $devotion)
                        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                            <a href="{{ route('devotions.show', $devotion) }}" class="block">
                                @if($devotion->featured_image)
                                    <div class="relative h-48 overflow-hidden bg-slate-100">
                                        <img src="{{ asset('storage/' . $devotion->featured_image) }}" alt="{{ $devotion->title }}" class="h-full w-full object-cover">
                                        <span class="absolute left-3 top-3 rounded-full bg-emerald-700 px-3 py-1 text-xs font-semibold text-white">{{ ucfirst($devotion->category) }}</span>
                                    </div>
                                @else
                                    <div class="flex h-36 items-center justify-center bg-emerald-800">
                                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-semibold text-white">{{ ucfirst($devotion->category) }}</span>
                                    </div>
                                @endif
                            </a>
                            <div class="p-5">
                                <p class="text-xs text-slate-500">{{ $devotion->created_at->format('M d, Y') }}</p>
                                <h3 class="mt-1 text-lg font-semibold text-slate-900">
                                    <a href="{{ route('devotions.show', $devotion) }}" class="hover:text-emerald-700">{{ $devotion->title }}</a>
                                </h3>
                                @if($devotion->scripture_reference)
                                    <p class="mt-2 text-sm font-medium text-emerald-700">{{ $devotion->scripture_reference }}</p>
                                @endif
                                <p class="mt-2 line-clamp-3 text-sm text-slate-600">{{ $devotion->excerpt }}</p>
                                <a href="{{ route('devotions.show', $devotion) }}" class="mt-4 inline-flex text-sm font-semibold text-emerald-700 hover:text-emerald-800">
                                    Read more
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($devotions->hasPages())
                    <div class="mt-10">
                        {{ $devotions->links() }}
                    </div>
                @endif
            @else
                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-8 py-16 text-center">
                    <h3 class="text-lg font-semibold text-slate-900">No devotions yet</h3>
                    <p class="mt-2 text-sm text-slate-600">Check back soon for daily reflections.</p>
                </div>
            @endif
        </div>
    </section>

    <section class="px-4 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl rounded-3xl bg-emerald-900 px-8 py-12 text-center text-white">
            <h2 class="text-2xl font-semibold sm:text-3xl">Stay connected</h2>
            <p class="mx-auto mt-3 max-w-xl text-sm text-emerald-100">
                Get new devotions and choir updates by email.
            </p>
            <form action="{{ route('subscribe') }}" method="POST" class="mx-auto mt-6 flex max-w-md flex-col gap-3 sm:flex-row">
                @csrf
                <input type="email" name="email" placeholder="Your email" required
                       class="w-full rounded-full border border-white/20 bg-white/10 px-4 py-2.5 text-white placeholder:text-emerald-200 focus:border-white focus:outline-none">
                <button type="submit" class="rounded-full bg-white px-5 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50">
                    Subscribe
                </button>
            </form>
            @if(session('subscriber_success'))
                <p class="mt-4 text-sm text-emerald-100">{{ session('subscriber_success') }}</p>
            @endif
        </div>
    </section>
</div>

<x-static.footer />
@endsection
