@extends('layouts.app')

@section('content')
    <section class="max-w-4xl mx-auto py-16 px-4">
        <div class="rounded-2xl border border-emerald-800/20 bg-white shadow">
            @if ($event->cover_image)
                <img src="{{ asset($event->cover_image) }}" class="w-full h-64 object-cover rounded-t-2xl"
                    alt="{{ $event->title }}">
            @endif
            <div class="p-6">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <div class="text-xs uppercase tracking-wide text-emerald-700/80">{{ $event->type }}</div>
                        <h1 class="text-2xl font-bold">{{ $event->title }}</h1>
                    </div>
                    @if ($event->isFull())
                        <span class="inline-block px-3 py-1 text-sm bg-red-100 text-red-700 rounded">Full</span>
                    @endif
                </div>

                <p class="mt-2 text-gray-700">
                    {{ $event->start_at->format('D, M j, Y g:i A') }}
                    @if ($event->location)
                        • {{ $event->location }}
                    @endif
                </p>

                @if ($event->description)
                    <div class="prose mt-4">{{ $event->description }}</div>
                @endif

                @if (session('success'))
                    <div class="mt-6 rounded-lg bg-emerald-50 text-emerald-800 p-4">
                        {{ session('success') }}
                    </div>
                @endif

                @unless ($event->isFull() || $event->isPast())
                    <form method="POST" action="{{ route('events.register', $event) }}" class="mt-8 grid gap-4">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium">Full name</label>
                                <input name="name" value="{{ old('name') }}" required
                                    class="mt-1 w-full rounded-lg border p-2.5" />
                                @error('name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Email</label>
                                <input name="email" type="email" value="{{ old('email') }}" required
                                    class="mt-1 w-full rounded-lg border p-2.5" />
                                @error('email')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Phone (optional)</label>
                                <input name="phone" pattern="[0-9]{10,15}" value="{{ old('phone') }}"
                                    class="mt-1 w-full rounded-lg border p-2.5" />
                                @error('phone')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        @if ($event->isConcert())
                            <div class="mt-4">
                                <label class="block text-sm font-semibold mb-2">Support amount (RWF)</label>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($donations as $rwf)
                                        <label
                                            class="inline-flex items-center gap-2 rounded-xl border px-3 py-2 cursor-pointer hover:bg-emerald-50">
                                            <input type="radio" name="amount_offered" value="{{ $rwf }}"
                                                class="accent-emerald-600"
                                                {{ old('amount_offered', 0) == $rwf ? 'checked' : '' }} />
                                            <span class="text-sm">{{ number_format($rwf) }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('amount_offered')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500 mt-1">Choose what you can. 0 is okay too.</p>
                            </div>
                        @endif

                        <div class="mt-6">
                            <button
                                class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-3">
                                Get e-Ticket
                            </button>
                        </div>
                    </form>
                @endunless
            </div>
        </div>
    </section>
@endsection
