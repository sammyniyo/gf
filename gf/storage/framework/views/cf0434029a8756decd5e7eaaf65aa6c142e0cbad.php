<?php
    use Illuminate\Support\Facades\Storage;
?>

<?php $__env->startSection('title', 'Events | God\'s Family Choir'); ?>

<?php $__env->startSection('content'); ?>
<!-- Revolutionary Split Hero Section -->
<section class="relative min-h-[70vh] overflow-hidden bg-white">
    <!-- Two-Tone Background -->
    <div class="absolute inset-0">
        <!-- Left Side - Dark -->
        <div class="absolute inset-y-0 left-0 w-1/2 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900"></div>
        <!-- Right Side - Image -->
        <div class="absolute inset-y-0 right-0 w-1/2">
            <img src="<?php echo e(asset('images/gf.jpg')); ?>" alt="Events" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-l from-transparent via-emerald-600/20 to-gray-900"></div>
        </div>

        <!-- Diagonal Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 via-transparent to-transparent"></div>
    </div>

    <!-- Content Container -->
    <div class="relative z-10 min-h-[70vh] flex items-center">
        <div class="max-w-7xl mx-auto px-6 py-16 w-full">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-white space-y-6">
                    <!-- Compact Badge -->
                    <div class="inline-flex items-center gap-2 bg-emerald-500/20 backdrop-blur-sm border border-emerald-400/30 rounded-lg px-4 py-2">
                        <div class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
                        <span class="text-emerald-300 text-xs font-bold uppercase tracking-wider">Events & Concerts</span>
                    </div>

                    <!-- Bold Title -->
                    <div>
                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-tight mb-4">
                            <span class="block text-white">Worship</span>
                            <span class="block bg-gradient-to-r from-emerald-400 to-amber-400 bg-clip-text text-transparent">Events</span>
                        </h1>
                        <div class="flex items-center gap-3">
                            <div class="h-1 w-16 bg-gradient-to-r from-emerald-400 to-transparent rounded-full"></div>
                            <p class="text-base text-gray-300">
                                Discover upcoming worship gatherings
                            </p>
                        </div>
                    </div>

                    <!-- Compact Stats Row -->
                    <div class="flex items-center gap-6 pt-4">
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-emerald-400"><?php echo e($events->total()); ?></span>
                            <span class="text-sm text-gray-400 font-medium">Events</span>
                        </div>
                        <div class="w-px h-10 bg-gray-700"></div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-amber-400"><?php echo e($events->where('start_at', '>=', now())->count()); ?></span>
                            <span class="text-sm text-gray-400 font-medium">Upcoming</span>
                        </div>
                        <div class="w-px h-10 bg-gray-700"></div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl font-black text-emerald-400"><?php echo e($events->sum('capacity') ?? '∞'); ?></span>
                            <span class="text-sm text-gray-400 font-medium">Seats</span>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-2">
                        <button onclick="document.querySelector('#filters').scrollIntoView({behavior: 'smooth'})"
                                class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold rounded-xl hover:shadow-2xl hover:shadow-emerald-500/50 hover:-translate-y-1 transition-all">
                            <span>Browse All Events</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Right Side - Floating Card with Next Event -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <!-- Glow Effect -->
                        <div class="absolute -inset-4 bg-gradient-to-r from-emerald-500/30 to-amber-500/30 rounded-3xl blur-2xl animate-pulse-slow"></div>

                        <!-- Card -->
                        <div class="relative bg-white rounded-2xl shadow-2xl p-8 border border-gray-100">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-black text-gray-900">Next Event</h3>
                                <div class="px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white text-xs font-bold rounded-lg">
                                    UPCOMING
                                </div>
                            </div>

                            <?php
                                $nextEvent = $events->where('start_at', '>=', now())->first();
                            ?>

                            <?php if($nextEvent): ?>
                                <div class="space-y-4">
                                    <h4 class="text-xl font-bold text-gray-900 line-clamp-2"><?php echo e($nextEvent->title); ?></h4>

                                    <div class="flex items-center gap-4 text-sm text-gray-600">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium"><?php echo e($nextEvent->start_at->format('M j, Y')); ?></span>
                                        </div>
                                        <?php if($nextEvent->location): ?>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="font-medium"><?php echo e(Str::limit($nextEvent->location, 20)); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if($nextEvent->capacity): ?>
                                        <div class="space-y-2">
                                            <div class="flex justify-between text-sm">
                                                <span class="text-gray-600 font-medium">Availability</span>
                                                <span class="text-gray-900 font-bold"><?php echo e(max($nextEvent->capacity - $nextEvent->registrations_count, 0)); ?> / <?php echo e($nextEvent->capacity); ?> seats</span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-2">
                                                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 h-2 rounded-full transition-all"
                                                     style="width: <?php echo e($nextEvent->capacity > 0 ? (($nextEvent->capacity - max($nextEvent->capacity - $nextEvent->registrations_count, 0)) / $nextEvent->capacity * 100) : 0); ?>%"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <a href="<?php echo e(route('events.show', $nextEvent)); ?>"
                                       class="block text-center w-full px-6 py-3 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 transition-all">
                                        View Details
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-gray-600">No upcoming events</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 w-32 h-32 bg-emerald-500/20 rounded-full blur-3xl"></div>
    <div class="absolute top-1/4 right-1/4 w-24 h-24 bg-amber-500/20 rounded-full blur-2xl"></div>
</section>

<!-- Modern Filters Section -->
<section id="filters" class="sticky top-0 z-30 bg-white/95 backdrop-blur-2xl border-b border-gray-200 shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-6">
        <form method="GET" action="<?php echo e(route('events.index')); ?>" class="space-y-4" id="filterForm">
            <!-- Main Filter Bar -->
            <div class="flex flex-wrap items-center gap-3">
                <!-- Status Pills -->
                <?php $current = request('status', 'upcoming'); ?>
                <div class="flex gap-2">
                    <?php $__currentLoopData = ['upcoming' => ['label' => 'Upcoming', 'icon' => '🎯'], 'past' => ['label' => 'Past', 'icon' => '📅'], 'all' => ['label' => 'All', 'icon' => '📊']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="status" value="<?php echo e($key); ?>" class="peer sr-only" <?php echo e($current === $key ? 'checked' : ''); ?> onchange="this.form.submit()">
                            <div class="flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300
                                <?php echo e($current === $key
                                    ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg shadow-emerald-500/30 scale-105'
                                    : 'bg-gray-100 text-gray-600 hover:bg-gray-200 hover:scale-105'); ?>">
                                <span><?php echo e($data['icon']); ?></span>
                                <span><?php echo e($data['label']); ?></span>
                            </div>
                        </label>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="h-8 w-px bg-gray-300 mx-1"></div>

                <!-- Enhanced Search -->
                <div class="relative flex-1 min-w-[280px]">
                    <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search events by name, type, location..."
                        class="w-full pl-11 pr-4 py-2.5 rounded-xl border-2 border-gray-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 text-sm transition-all">
                    <svg class="w-5 h-5 absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <!-- Type Filter -->
                <select name="type" onchange="this.form.submit()" class="px-5 py-2.5 rounded-xl border-2 border-gray-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 text-sm font-medium transition-all appearance-none bg-white pr-10 cursor-pointer hover:border-gray-300">
                    <option value="">All Types</option>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t); ?>" <?php echo e(request('type') === $t ? 'selected' : ''); ?>><?php echo e($t); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <!-- Advanced Filters Toggle -->
                <button type="button" onclick="toggleAdvanced()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border-2 border-gray-200 text-gray-600 text-sm font-bold hover:bg-gray-50 hover:border-gray-300 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                    <span>Filters</span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-300" id="advancedIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <?php if(request()->has(['q', 'type', 'from', 'to', 'open_only']) && request()->filled(['q', 'type', 'from', 'to']) || request()->boolean('open_only')): ?>
                    <a href="<?php echo e(route('events.index')); ?>" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-red-600 text-sm font-bold hover:bg-red-50 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Clear All
                    </a>
                <?php endif; ?>
            </div>

            <!-- Advanced Filters (Hidden by default) -->
            <div id="advancedFilters" class="hidden space-y-3 pt-4 border-t border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Date From -->
                    <div class="relative">
                        <label class="text-xs font-bold text-gray-600 mb-2 block uppercase tracking-wide">From Date</label>
                        <input type="date" name="from" value="<?php echo e(request('from')); ?>"
                            class="w-full px-4 py-2.5 rounded-xl border-2 border-gray-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 text-sm transition-all">
                    </div>

                    <!-- Date To -->
                    <div class="relative">
                        <label class="text-xs font-bold text-gray-600 mb-2 block uppercase tracking-wide">To Date</label>
                        <input type="date" name="to" value="<?php echo e(request('to')); ?>"
                            class="w-full px-4 py-2.5 rounded-xl border-2 border-gray-200 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 text-sm transition-all">
                    </div>

                    <!-- Available Seats -->
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-3 px-5 py-2.5 rounded-xl border-2 border-gray-200 cursor-pointer hover:bg-gray-50 hover:border-emerald-500 transition-all">
                            <input type="checkbox" name="open_only" value="1" <?php echo e(request()->boolean('open_only') ? 'checked' : ''); ?>

                                class="w-5 h-5 rounded text-emerald-600 focus:ring-emerald-500 focus:ring-offset-0 border-gray-300">
                            <span class="text-sm text-gray-700 font-bold">Available seats only</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-700 text-white text-sm font-bold shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:scale-105 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Apply Filters
                    </button>
                </div>
            </div>

            <!-- Active Filters Tags -->
            <?php
                $filters = collect([
                    request('q') ? ['label' => 'Search: "'.e(request('q')).'"', 'param' => 'q'] : null,
                    request('type') ? ['label' => e(request('type')), 'param' => 'type'] : null,
                    request('from') ? ['label' => 'From: '.e(request('from')), 'param' => 'from'] : null,
                    request('to') ? ['label' => 'To: '.e(request('to')), 'param' => 'to'] : null,
                    request()->boolean('open_only') ? ['label' => 'Available seats', 'param' => 'open_only'] : null,
                ])->filter();
            ?>

            <?php if($filters->isNotEmpty()): ?>
                <div class="flex flex-wrap items-center gap-2 pt-1">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-wide">Active Filters:</span>
                    <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('events.index', request()->except($filter['param']))); ?>"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-50 to-emerald-50 text-emerald-700 rounded-xl text-xs font-bold hover:from-emerald-100 hover:to-emerald-100 transition-all group border border-emerald-200">
                            <span><?php echo e($filter['label']); ?></span>
                            <svg class="w-3.5 h-3.5 group-hover:scale-125 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                </div>
            <?php endif; ?>
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
<section class="py-20 bg-gradient-to-b from-gray-50 via-white to-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <?php if($events->isEmpty()): ?>
            <!-- Enhanced Empty State -->
            <div class="text-center py-24">
                <div class="relative inline-flex items-center justify-center w-32 h-32 mb-8">
                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/30 to-amber-500/30 rounded-full blur-2xl animate-pulse"></div>
                    <div class="relative w-32 h-32 bg-gradient-to-br from-emerald-100 to-amber-100 rounded-full flex items-center justify-center">
                        <svg class="w-16 h-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-4xl font-black text-gray-900 mb-4">No Events Found</h3>
                <p class="text-xl text-gray-600 mb-10 max-w-md mx-auto">Try adjusting your filters or check back later for exciting upcoming events</p>
                <a href="<?php echo e(route('events.index')); ?>" class="inline-flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold text-lg rounded-xl shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:scale-105 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset All Filters
                </a>
            </div>
        <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isPast = $event->start_at->isPast();
                        $isFull = $event->capacity && $event->registrations_count >= $event->capacity;
                        $isOpen = !$isPast && !$isFull;
                        $seatsLeft = $event->capacity ? max($event->capacity - $event->registrations_count, 0) : null;
                    ?>

                    <article class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3">
                        <!-- Enhanced Event Image -->
                        <div class="relative h-64 overflow-hidden">
                            <?php if($event->cover_image): ?>
                                <img src="<?php echo e(Storage::url($event->cover_image)); ?>" alt="<?php echo e($event->title); ?>" class="w-full h-full object-cover transform group-hover:scale-110 group-hover:rotate-2 transition-all duration-700" />
                            <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-purple-500 via-pink-500 to-orange-500"></div>
                            <?php endif; ?>

                            <!-- Gradient Overlay - Light for better image visibility -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-40 group-hover:opacity-20 transition-opacity"></div>

                            <!-- Enhanced Status Badge -->
                            <div class="absolute top-4 right-4 z-10">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-white/30 rounded-full blur-md"></div>
                                    <span class="relative flex items-center gap-2 px-4 py-2 rounded-full text-xs font-black backdrop-blur-xl border-2
                                        <?php echo e($isPast ? 'bg-gray-700/90 border-gray-500/50 text-white' :
                                           ($isFull ? 'bg-red-600/90 border-red-400/50 text-white' :
                                           'bg-emerald-600/90 border-emerald-400/50 text-white')); ?>">
                                        <span class="text-base"><?php echo e($isPast ? '📅' : ($isFull ? '🔒' : '✅')); ?></span>
                                        <span><?php echo e($isPast ? 'Past Event' : ($isFull ? 'Full' : 'Open')); ?></span>
                                    </span>
                                </div>
                            </div>

                            <!-- Enhanced Event Type -->
                            <div class="absolute top-4 left-4 z-10">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-amber-500/50 rounded-2xl blur-lg"></div>
                                    <span class="relative px-4 py-2 bg-white/95 backdrop-blur-sm rounded-2xl text-xs font-black text-gray-900 uppercase tracking-wider shadow-xl">
                                        <?php echo e($event->type); ?>

                                    </span>
                                </div>
                            </div>

                            <!-- Date Badge at Bottom -->
                            <div class="absolute bottom-4 left-4 right-4 z-10">
                                <div class="flex items-center gap-3 bg-white/95 backdrop-blur-xl rounded-2xl px-4 py-3 shadow-2xl">
                                    <div class="flex items-center justify-center w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-500 rounded-xl">
                                        <div class="text-center">
                                            <div class="text-white text-xs font-bold leading-none"><?php echo e($event->start_at->format('M')); ?></div>
                                            <div class="text-white text-lg font-black leading-none mt-0.5"><?php echo e($event->start_at->format('j')); ?></div>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-900 font-bold text-sm"><?php echo e($event->start_at->format('l, F j, Y')); ?></p>
                                        <p class="text-gray-600 text-xs font-medium"><?php echo e($event->start_at->format('g:i A')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Event Content -->
                        <div class="p-6 space-y-4">
                            <!-- Location -->
                            <?php if($event->location): ?>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="font-medium truncate"><?php echo e($event->location); ?></span>
                                </div>
                            <?php endif; ?>

                            <!-- Title -->
                            <h3 class="text-2xl font-black text-gray-900 line-clamp-2 group-hover:text-emerald-600 transition-colors leading-tight">
                                <?php echo e($event->title); ?>

                            </h3>

                            <!-- Description -->
                            <?php if($event->description): ?>
                                <p class="text-gray-600 line-clamp-2 leading-relaxed text-sm">
                                    <?php echo e($event->description); ?>

                                </p>
                            <?php endif; ?>

                            <!-- Enhanced Capacity Info -->
                            <?php if($seatsLeft !== null): ?>
                                <div class="bg-gradient-to-r from-gray-50 to-emerald-50 rounded-2xl p-4 space-y-2">
                                    <div class="flex justify-between items-center text-sm">
                                        <span class="font-bold text-gray-700">Capacity</span>
                                        <span class="font-black <?php echo e($seatsLeft > 0 ? 'text-emerald-600' : 'text-red-600'); ?>">
                                            <?php echo e($seatsLeft); ?> / <?php echo e($event->capacity); ?> seats left
                                        </span>
                                    </div>
                                    <div class="flex-1 bg-gray-200 rounded-full h-3 overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 transition-all duration-500 rounded-full shadow-lg"
                                            style="width: <?php echo e($event->capacity > 0 ? (($event->capacity - $seatsLeft) / $event->capacity * 100) : 0); ?>%">
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-4">
                                    <p class="text-center text-sm font-bold text-indigo-700">♾️ Unlimited Capacity</p>
                                </div>
                            <?php endif; ?>

                            <!-- Enhanced Actions -->
                            <div class="flex gap-3 pt-2">
                                <a href="<?php echo e(route('events.show', $event)); ?>"
                                    class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl font-black text-sm transition-all duration-300
                                        <?php echo e($isOpen
                                            ? 'bg-gradient-to-r from-emerald-600 to-emerald-700 text-white shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:-translate-y-1 hover:scale-105'
                                            : 'bg-gray-200 text-gray-500 cursor-not-allowed'); ?>">
                                    <?php if($isOpen): ?>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        Register Now
                                    <?php else: ?>
                                        <span><?php echo e($isPast ? '📅 Past Event' : '🔒 Full'); ?></span>
                                    <?php endif; ?>
                                </a>

                                <a href="<?php echo e(route('events.ics', $event)); ?>"
                                    class="inline-flex items-center justify-center p-4 rounded-xl border-2 border-gray-200 text-gray-700 hover:border-emerald-600 hover:text-emerald-600 hover:bg-emerald-50 transition-all hover:scale-110"
                                    title="Add to calendar">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <?php if($events->hasPages()): ?>
                <div class="mt-16">
                    <?php echo e($events->links()); ?>

                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-40">
        <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-blob animation-delay-2000"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-black text-white mb-6">
            Don't See What You're Looking For?
        </h2>
        <p class="text-xl text-emerald-200 mb-10">
            Stay updated with our latest events and special announcements
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('contact.submit')); ?>" class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black text-lg rounded-xl shadow-2xl shadow-emerald-500/50 hover:scale-105 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Contact Us
            </a>
            <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center justify-center gap-3 px-10 py-4 bg-white/10 backdrop-blur-xl border-2 border-white/30 text-white font-black text-lg rounded-xl hover:bg-white/20 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</section>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.static.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('static.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<style>
    /* Smooth Floating Animation */
    @keyframes float {
        0%, 100% {
            transform: translate(0, 0) scale(1);
            opacity: 0.3;
        }
        33% {
            transform: translate(30px, -30px) scale(1.05);
            opacity: 0.4;
        }
        66% {
            transform: translate(-20px, 20px) scale(0.95);
            opacity: 0.35;
        }
    }
    .animate-float {
        animation: float 20s ease-in-out infinite;
    }
    .animate-float-delayed {
        animation: float 20s ease-in-out infinite;
        animation-delay: 10s;
    }

    /* Slow Pulse */
    @keyframes pulse-slow {
        0%, 100% {
            opacity: 0.2;
            transform: scale(1);
        }
        50% {
            opacity: 0.3;
            transform: scale(1.05);
        }
    }
    .animate-pulse-slow {
        animation: pulse-slow 8s ease-in-out infinite;
    }

    /* Scroll Down Indicator */
    @keyframes scroll-down {
        0% {
            transform: translateY(0);
            opacity: 0;
        }
        40% {
            opacity: 1;
        }
        80% {
            transform: translateY(16px);
            opacity: 0;
        }
        100% {
            opacity: 0;
        }
    }
    .animate-scroll-down {
        animation: scroll-down 2s ease-in-out infinite;
    }

    /* Fade In Up */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
        opacity: 0;
    }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }
    .animation-delay-800 { animation-delay: 0.8s; }

    /* Blob Animation */
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
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/events/index.blade.php ENDPATH**/ ?>