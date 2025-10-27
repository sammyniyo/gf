@extends('layouts.app')

@section('content')
    <section class="max-w-6xl mx-auto py-16 px-4">
        <h1 class="text-3xl font-bold mb-8">Upcoming Events</h1>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($events as $e)
                <a href="{{ route('events.show', $e) }}"
                    class="group rounded-2xl overflow-hidden border border-emerald-800/20 bg-white shadow-sm hover:shadow-lg transition">
                    @if ($e->cover_image)
                        <img src="{{ asset($e->cover_image) }}" class="w-full h-40 object-cover" alt="{{ $e->title }}">
                    @endif
                    <div class="p-5">
                        <div class="text-xs uppercase tracking-wide text-emerald-700/80">{{ $e->type }}</div>
                        <h3 class="mt-1 text-lg font-semibold group-hover:text-emerald-700">{{ $e->title }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ $e->start_at->format('D, M j, Y g:i A') }}</p>
                        @if ($e->location)
                            <p class="text-sm text-gray-600">{{ $e->location }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <p>No events yet.</p>
            @endforelse
        </div>
    </section>
@endsection
