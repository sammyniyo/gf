<?php $__env->startSection('title', 'Shop - Digital Albums | God\'s Family Choir'); ?>
<?php $__env->startSection('description', 'Support God\'s Family Choir by purchasing our digital albums. Stream, download, and enjoy our music.'); ?>

<?php $__env->startSection('content'); ?>
<!-- Stunning Hero Section with Animated Background -->
<section class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 text-white py-24 overflow-hidden">
    <!-- Animated Background Patterns -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-emerald-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMC41Ii8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyaWQpIi8+PC9zdmc+')] opacity-10"></div>

    <!-- Floating Music Notes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="music-note absolute top-20 left-10 text-6xl opacity-20 animate-float">♪</div>
        <div class="music-note absolute top-40 right-20 text-4xl opacity-15 animate-float animation-delay-2000">♫</div>
        <div class="music-note absolute bottom-20 left-1/4 text-5xl opacity-10 animate-float animation-delay-3000">♪</div>
        <div class="music-note absolute bottom-40 right-1/3 text-7xl opacity-10 animate-float animation-delay-4000">♬</div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 mb-6 animate-fade-in">
            <svg class="w-5 h-5 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
            </svg>
            <span class="text-sm font-semibold text-emerald-100">Premium Digital Albums</span>
        </div>

        <h1 class="text-5xl md:text-7xl font-extrabold mb-6 animate-fade-in bg-gradient-to-r from-white via-emerald-100 to-white bg-clip-text text-transparent">
            Divine Music Store
        </h1>
        <p class="text-xl md:text-2xl text-emerald-50 mb-10 max-w-3xl mx-auto animate-fade-in animation-delay-200">
            Experience worship like never before. Stream, purchase, and download our anointed albums.
        </p>

        <!-- Enhanced Search Bar -->
        <form action="<?php echo e(route('shop.search')); ?>" method="GET" class="max-w-2xl mx-auto mb-8 animate-fade-in animation-delay-400">
            <div class="relative group">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full blur-lg opacity-50 group-hover:opacity-75 transition-opacity"></div>
                <div class="relative bg-white rounded-full shadow-2xl">
                    <input type="text"
                           name="q"
                           placeholder="Search albums, artists, songs..."
                           class="w-full px-8 py-5 rounded-full text-gray-900 bg-transparent focus:outline-none text-lg"
                           value="<?php echo e(request('q')); ?>">
                    <button type="submit"
                            class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white px-8 py-3 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        <!-- Stats -->
        <div class="flex flex-wrap justify-center gap-8 text-center animate-fade-in animation-delay-600">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-4 border border-white/20">
                <div class="text-3xl font-bold text-white"><?php echo e(\App\Models\Album::active()->count()); ?>+</div>
                <div class="text-sm text-emerald-200">Albums Available</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-4 border border-white/20">
                <div class="text-3xl font-bold text-white">🎵</div>
                <div class="text-sm text-emerald-200">High Quality Audio</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl px-6 py-4 border border-white/20">
                <div class="text-3xl font-bold text-white">∞</div>
                <div class="text-sm text-emerald-200">Unlimited Streaming</div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0; }
    10% { opacity: 0.2; }
    50% { transform: translateY(-100px) rotate(180deg); opacity: 0.2; }
    90% { opacity: 0.2; }
    100% { transform: translateY(-200px) rotate(360deg); opacity: 0; }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animate-float {
    animation: float 15s infinite;
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
    opacity: 0;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animation-delay-200 { animation-delay: 0.2s; }
.animation-delay-400 { animation-delay: 0.4s; }
.animation-delay-600 { animation-delay: 0.6s; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-3000 { animation-delay: 3s; }
.animation-delay-4000 { animation-delay: 4s; }
</style>

<!-- Featured Albums -->
<?php if($featuredAlbums->count() > 0): ?>
<section class="py-20 bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-72 h-72 bg-emerald-200 dark:bg-emerald-900 rounded-full filter blur-3xl opacity-20 -mr-36 -mt-36"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-200 dark:bg-teal-900 rounded-full filter blur-3xl opacity-20 -ml-48 -mb-48"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-400 to-yellow-400 text-amber-900 rounded-full px-4 py-2 mb-4 shadow-lg">
                <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <span class="font-bold text-sm">STAFF PICKS</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
                Featured Albums
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Handpicked collections that will elevate your worship experience
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $featuredAlbums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="fade-in-section" style="animation-delay: <?php echo e($index * 0.1); ?>s;">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shop.album-card','data' => ['album' => $album,'featured' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop.album-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['album' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($album),'featured' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- All Albums -->
<section class="py-20 bg-white dark:bg-gray-800 relative">
    <!-- Elegant gradient divider -->
    <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-500/30 to-transparent"></div>

    <!-- Decorative corner accents -->
    <div class="absolute top-8 left-8 w-20 h-20 border-l-2 border-t-2 border-emerald-500/20 rounded-tl-3xl"></div>
    <div class="absolute top-8 right-8 w-20 h-20 border-r-2 border-t-2 border-emerald-500/20 rounded-tr-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-2">
                    Complete Collection
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Explore our entire library of worship music
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="inline-flex items-center gap-3 bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-full px-6 py-3 border-2 border-emerald-200 dark:border-emerald-800">
                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                    </svg>
                    <span class="font-bold text-2xl text-emerald-600 dark:text-emerald-400"><?php echo e($albums->total()); ?></span>
                    <span class="text-gray-600 dark:text-gray-400 font-medium"><?php echo e(Str::plural('Album', $albums->total())); ?></span>
                </div>
            </div>
        </div>

        <?php if($albums->count() > 0): ?>
            <!-- Filter/Sort Options -->
            <div class="mb-8" x-data="{ activeFilter: 'all', showFilters: false }">
                <div class="flex flex-wrap items-center gap-3">
                    <!-- Toggle Filters Button -->
                    <button @click="showFilters = !showFilters"
                            class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg font-semibold hover:from-emerald-700 hover:to-teal-700 transition-all shadow-md hover:shadow-lg transform hover:scale-105 cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                        Filters & Sort
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': showFilters }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Active Filter Indicator -->
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        <span x-show="activeFilter === 'all'">Showing all albums</span>
                        <span x-show="activeFilter === 'newest'" x-cloak>Sorted by newest</span>
                        <span x-show="activeFilter === 'price'" x-cloak>Sorted by price</span>
                        <span x-show="activeFilter === 'popular'" x-cloak>Sorted by popularity</span>
                    </div>
                </div>

                <!-- Filter Options (Collapsible) -->
                <div x-show="showFilters"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="mt-4 p-4 bg-gray-50 dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700"
                     x-cloak>
                    <div class="flex flex-wrap gap-3">
                        <button @click="activeFilter = 'all'"
                                :class="activeFilter === 'all' ? 'bg-emerald-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                                class="px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-all shadow-md cursor-pointer">
                            All Genres
                        </button>
                        <button @click="activeFilter = 'newest'"
                                :class="activeFilter === 'newest' ? 'bg-emerald-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                                class="px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-all shadow-md cursor-pointer">
                            Newest First
                        </button>
                        <button @click="activeFilter = 'price'"
                                :class="activeFilter === 'price' ? 'bg-emerald-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                                class="px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-all shadow-md cursor-pointer">
                            Price: Low to High
                        </button>
                        <button @click="activeFilter = 'popular'"
                                :class="activeFilter === 'popular' ? 'bg-emerald-600 text-white' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                                class="px-4 py-2 rounded-lg font-semibold hover:bg-emerald-600 hover:text-white transition-all shadow-md cursor-pointer">
                            Most Popular
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="fade-in-section" style="animation-delay: <?php echo e(($index % 8) * 0.05); ?>s;">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.shop.album-card','data' => ['album' => $album]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('shop.album-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['album' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($album)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Enhanced Pagination -->
            <div class="mt-16 flex justify-center">
                <?php echo e($albums->links()); ?>

            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-full mb-6">
                    <svg class="w-16 h-16 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">No Albums Available Yet</h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">We're working hard to bring you amazing worship music!</p>
                <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all transform hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Return Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Support CTA -->
<section class="relative py-24 bg-gradient-to-br from-emerald-600 via-emerald-700 to-teal-700 text-white overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-400 rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-teal-400 rounded-full filter blur-3xl animate-pulse animation-delay-2000"></div>
    </div>

    <!-- Decorative elements -->
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZGVmcz48cGF0dGVybiBpZD0iZ3JpZCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIiBwYXR0ZXJuVW5pdHM9InVzZXJTcGFjZU9uVXNlIj48cGF0aCBkPSJNIDQwIDAgTCAwIDAgMCA0MCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIwLjUiIG9wYWNpdHk9IjAuMSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmlkKSIvPjwvc3ZnPg==')] opacity-20"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <!-- Icon -->
        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-sm rounded-full mb-6 border-2 border-white/20">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </div>

        <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
            Support Our Ministry,<br />
            <span class="bg-gradient-to-r from-amber-200 to-yellow-200 bg-clip-text text-transparent">Transform Lives</span>
        </h2>
        <p class="text-xl md:text-2xl text-emerald-50 mb-10 max-w-3xl mx-auto leading-relaxed">
            Every purchase fuels our mission to create uplifting music and spread the Gospel through song. Join us in making a difference!
        </p>

        <!-- Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-white mb-2">100%</div>
                <div class="text-emerald-100 text-sm">Goes to Ministry</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-white mb-2">🎵</div>
                <div class="text-emerald-100 text-sm">Quality Worship</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                <div class="text-4xl font-bold text-white mb-2">✨</div>
                <div class="text-emerald-100 text-sm">Lives Changed</div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="<?php echo e(route('contact')); ?>"
               class="group inline-flex items-center gap-2 bg-white text-emerald-700 px-8 py-4 rounded-xl font-bold text-lg hover:bg-emerald-50 transition-all transform hover:scale-105 shadow-2xl">
                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact Us
            </a>
            <a href="<?php echo e(route('home')); ?>"
               class="inline-flex items-center gap-2 bg-transparent text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white/10 transition-all transform hover:scale-105 border-2 border-white/40 backdrop-blur-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Learn More About Us
            </a>
        </div>

        <!-- Trust indicators -->
        <div class="mt-10 pt-8 border-t border-white/20">
            <p class="text-sm text-emerald-100 mb-4">Trusted by thousands of worshipers worldwide</p>
            <div class="flex justify-center items-center gap-6 flex-wrap text-emerald-200">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Secure Checkout</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
                    </svg>
                    <span class="text-sm">Instant Delivery</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm">Lightning Fast</span>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/shop/index.blade.php ENDPATH**/ ?>