@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-black">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/gf-2.jpg') }}" alt="Events" class="w-full h-full object-cover opacity-15" />
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/90 via-emerald-900/85 to-emerald-950/95"></div>
    </div>

    <!-- Mesh Gradient Animation -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-20 left-20 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-emerald-500 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/2 w-96 h-96 bg-teal-500 rounded-full blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Musical Notes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        @for($i = 1; $i <= 8; $i++)
            <div class="absolute musical-note" style="
                top: {{ rand(10, 80) }}%;
                left: {{ rand(5, 90) }}%;
                animation-delay: {{ $i * 0.6 }}s;
                font-size: {{ rand(25, 55) }}px;
                opacity: {{ rand(5, 12) / 100 }};
            ">{{ ['♪', '♫', '♬', '♩'][rand(0, 3)] }}</div>
        @endfor
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 py-20 text-center">
        <div class="inline-block mb-6 animate-fade-in-up">
            <span class="px-4 py-2 bg-amber-500/20 backdrop-blur-xl border border-amber-400/30 rounded-full text-amber-300 text-sm font-semibold">
                UPCOMING EVENTS
            </span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight animate-fade-in-up animation-delay-200">
            Worship <span class="bg-gradient-to-r from-amber-400 to-amber-200 bg-clip-text text-transparent">Events & Concerts</span>
        </h1>
        <p class="text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto leading-relaxed mb-8 animate-fade-in-up animation-delay-400">
            Join us in celebration, worship, and fellowship at our upcoming services and special performances
        </p>

        <!-- Quick Stats -->
        <div class="flex justify-center gap-8 mb-8 animate-fade-in-up animation-delay-600">
            <div class="text-center">
                <p class="text-3xl font-black text-amber-400">{{ $events->total() }}</p>
                <p class="text-sm text-emerald-300">Events Listed</p>
            </div>
            <div class="w-px bg-emerald-700"></div>
            <div class="text-center">
                <p class="text-3xl font-black text-amber-400">{{ $events->where('start_at', '>=', now())->count() }}</p>
                <p class="text-sm text-emerald-300">Upcoming</p>
            </div>
        </div>
    </div>
</section>

<!-- Filters Section -->
<section class="sticky top-0 z-30 bg-white/95 backdrop-blur-xl border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-5">
        <form method="GET" action="{{ route('events.index') }}" class="space-y-4" id="filterForm">
            <!-- Main Filter Bar -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Status Pills -->
                @php $current = request('status', 'upcoming'); @endphp
                <div class="flex gap-2">
                    @foreach(['upcoming' => 'Upcoming', 'past' => 'Past', 'all' => 'All'] as $key => $label)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="status" value="{{ $key }}" class="peer sr-only" {{ $current === $key ? 'checked' : '' }} onchange="this.form.submit()">
                            <div class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200
                                {{ $current === $key
                                    ? 'bg-emerald-600 text-white shadow-md shadow-emerald-200'
                                    : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                {{ $label }}
                            </div>
                        </label>
                    @endforeach
                </div>

                <div class="h-6 w-px bg-gray-200 mx-1"></div>

                <!-- Search -->
                <div class="relative flex-1 min-w-[240px]">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search events..."
                        class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-200 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100 text-sm transition-all">
                    <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Type Filter -->
                <select name="type" onchange="this.form.submit()" class="px-4 py-2 rounded-full border border-gray-200 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100 text-sm transition-all appearance-none bg-white pr-8 cursor-pointer">
                    <option value="">All Types</option>
                    @foreach($types as $t)
                        <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>

                <!-- Advanced Filters Toggle -->
                <button type="button" onclick="toggleAdvanced()" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-gray-200 text-gray-600 text-sm font-medium hover:bg-gray-50 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                    <span>More</span>
                    <svg class="w-3 h-3 transition-transform" id="advancedIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                @if(request()->has(['q', 'type', 'from', 'to', 'open_only']) && request()->filled(['q', 'type', 'from', 'to']) || request()->boolean('open_only'))
                    <a href="{{ route('events.index') }}" class="inline-flex items-center gap-1 px-3 py-2 rounded-full text-gray-500 text-sm font-medium hover:bg-gray-100 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Clear
                    </a>
                @endif
            </div>

            <!-- Advanced Filters (Hidden by default) -->
            <div id="advancedFilters" class="hidden space-y-3 pt-2 border-t border-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <!-- Date From -->
                    <div class="relative">
                        <label class="text-xs font-medium text-gray-500 mb-1 block">From Date</label>
                        <input type="date" name="from" value="{{ request('from') }}"
                            class="w-full px-4 py-2 rounded-full border border-gray-200 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100 text-sm transition-all">
                    </div>

                    <!-- Date To -->
                    <div class="relative">
                        <label class="text-xs font-medium text-gray-500 mb-1 block">To Date</label>
                        <input type="date" name="to" value="{{ request('to') }}"
                            class="w-full px-4 py-2 rounded-full border border-gray-200 focus:border-emerald-400 focus:ring-2 focus:ring-emerald-100 text-sm transition-all">
                    </div>

                    <!-- Available Seats -->
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-gray-200 cursor-pointer hover:bg-gray-50 transition-all">
                            <input type="checkbox" name="open_only" value="1" {{ request()->boolean('open_only') ? 'checked' : '' }}
                                class="w-4 h-4 rounded text-emerald-600 focus:ring-emerald-500 focus:ring-offset-0 border-gray-300">
                            <span class="text-sm text-gray-700 font-medium">Available seats only</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-6 py-2 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-sm font-semibold hover:shadow-lg hover:shadow-emerald-200 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Apply Filters
                    </button>
                </div>
            </div>

            <!-- Active Filters Tags -->
            @php
                $filters = collect([
                    request('q') ? ['label' => 'Search: "'.e(request('q')).'"', 'param' => 'q'] : null,
                    request('type') ? ['label' => e(request('type')), 'param' => 'type'] : null,
                    request('from') ? ['label' => 'From: '.e(request('from')), 'param' => 'from'] : null,
                    request('to') ? ['label' => 'To: '.e(request('to')), 'param' => 'to'] : null,
                    request()->boolean('open_only') ? ['label' => 'Available seats', 'param' => 'open_only'] : null,
                ])->filter();
            @endphp

            @if($filters->isNotEmpty())
                <div class="flex flex-wrap items-center gap-2 pt-1">
                    @foreach($filters as $filter)
                        <a href="{{ route('events.index', request()->except($filter['param'])) }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-medium hover:bg-emerald-100 transition-all group">
                            <span>{{ $filter['label'] }}</span>
                            <svg class="w-3 h-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    @endforeach
                </div>
            @endif
        </form>
    </div>
</section>

<script>
function toggleAdvanced() {
    const filters = document.getElementById('advancedFilters');
    const icon = document.getElementById('advancedIcon');
    filters.classList.toggle('hidden');
    icon.style.transform = filters.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
}
</script>

<!-- Events Grid -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-6">
        @if($events->isEmpty())
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-emerald-100 rounded-full mb-6">
                    <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-3">No Events Found</h3>
                <p class="text-gray-600 mb-8">Try adjusting your filters or check back later for upcoming events</p>
                <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold rounded-xl hover:shadow-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset All Filters
                </a>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                    @php
                        $isPast = $event->start_at->isPast();
                        $isFull = $event->capacity && $event->registrations_count >= $event->capacity;
                        $isOpen = !$isPast && !$isFull;
                        $seatsLeft = $event->capacity ? max($event->capacity - $event->registrations_count, 0) : null;
                    @endphp

                    <article class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                        <!-- Event Image -->
                        <div class="relative h-56 overflow-hidden">
                            @if($event->cover_image)
                                <img src="{{ asset($event->cover_image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-emerald-500 to-emerald-700"></div>
                            @endif

                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="px-4 py-2 rounded-full text-xs font-bold backdrop-blur-xl border
                                    {{ $isPast ? 'bg-gray-500/80 border-gray-400/50 text-white' :
                                       ($isFull ? 'bg-red-500/80 border-red-400/50 text-white' :
                                       'bg-emerald-500/80 border-emerald-400/50 text-white') }}">
                                    {{ $isPast ? '📅 Past Event' : ($isFull ? '🔒 Full' : '✅ Open') }}
                                </span>
                            </div>

                            <!-- Event Type -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-sm rounded-full text-xs font-bold text-emerald-900 uppercase tracking-wide">
                                    {{ $event->type }}
                                </span>
                            </div>
                        </div>

                        <!-- Event Content -->
                        <div class="p-6 space-y-4">
                            <!-- Date & Location -->
                            <div class="flex items-start gap-4 text-sm text-gray-600">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ $event->start_at->format('M j, Y') }}</span>
                                </div>
                                @if($event->location)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="truncate">{{ $event->location }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                {{ $event->title }}
                            </h3>

                            <!-- Description -->
                            @if($event->description)
                                <p class="text-gray-600 line-clamp-3 leading-relaxed">
                                    {{ $event->description }}
                                </p>
                            @endif

                            <!-- Capacity Info -->
                            <div class="flex items-center gap-2 pt-2">
                                @if($seatsLeft !== null)
                                    <div class="flex-1 bg-gray-100 rounded-full h-2 overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 transition-all duration-500"
                                            style="width: {{ $event->capacity > 0 ? (($event->capacity - $seatsLeft) / $event->capacity * 100) : 0 }}%">
                                        </div>
                                    </div>
                                    <span class="text-sm font-semibold {{ $seatsLeft > 0 ? 'text-emerald-600' : 'text-red-600' }}">
                                        {{ $seatsLeft }} {{ Str::plural('seat', $seatsLeft) }} left
                                    </span>
                                @else
                                    <span class="text-sm text-gray-500">♾️ Unlimited capacity</span>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="flex gap-3 pt-4">
                                <a href="{{ route('events.show', $event) }}"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-bold transition-all duration-300
                                        {{ $isOpen
                                            ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white hover:shadow-lg hover:shadow-emerald-500/50 hover:-translate-y-0.5'
                                            : 'bg-gray-200 text-gray-500 cursor-not-allowed' }}">
                                    @if($isOpen)
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        Register Now
                                    @else
                                        {{ $isPast ? '📅 Past Event' : '🔒 Full' }}
                                    @endif
                                </a>

                                <a href="{{ route('events.ics', $event) }}"
                                    class="inline-flex items-center justify-center p-3 rounded-xl border-2 border-gray-200 text-gray-700 hover:border-emerald-500 hover:text-emerald-600 hover:bg-emerald-50 transition-all"
                                    title="Add to calendar">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($events->hasPages())
                <div class="mt-12">
                    {{ $events->links() }}
                </div>
            @endif
        @endif
    </div>
</section>

<x-static.footer />

<style>
    @keyframes blob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(20px, -50px) scale(1.1); }
        50% { transform: translate(-20px, 20px) scale(0.9); }
        75% { transform: translate(50px, 50px) scale(1.05); }
    }
    .animate-blob {
        animation: blob 10s ease-in-out infinite;
    }
    .animation-delay-2000 { animation-delay: 2s; }
    .animation-delay-4000 { animation-delay: 4s; }

    @keyframes float-musical {
        0% { transform: translateY(0) translateX(0) rotate(0deg); opacity: 0; }
        10% { opacity: 0.12; }
        90% { opacity: 0.12; }
        100% { transform: translateY(-100vh) translateX(30px) rotate(360deg); opacity: 0; }
    }
    .musical-note {
        position: absolute;
        color: white;
        animation: float-musical 18s linear infinite;
    }

    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }
</style>
@endsection
