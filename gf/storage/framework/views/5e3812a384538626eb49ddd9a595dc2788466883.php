<?php $__env->startSection('title', 'Daily Devotions | God\'s Family Choir'); ?>

<?php $__env->startSection('content'); ?>
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-32 -left-20 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-96 w-96 rounded-full bg-amber-200/40 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 pt-32 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="text-center space-y-6">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Daily Inspiration
                </span>
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-gray-900 leading-tight">
                    Daily <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Devotions</span>
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    Nourish your soul with daily reflections, scripture, and spiritual insights from our Seventh-day Adventist choir community
                </p>

                <!-- Quick Stats -->
                <div class="flex flex-wrap items-center justify-center gap-8 pt-4">
                    <div class="flex items-center gap-2 text-emerald-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-semibold">Updated Daily</span>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-700">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold">From the Heart</span>
                    </div>
                    <div class="flex items-center gap-2 text-emerald-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="font-semibold">Scripture Based</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Devotions Grid -->
    <section class="relative z-10 px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <?php if($devotions->count() > 0): ?>
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 mb-12">
                    <?php $__currentLoopData = $devotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $devotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="group relative overflow-hidden rounded-3xl border-2 border-gray-100 bg-white shadow-xl transition-all hover:shadow-2xl hover:-translate-y-2">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-600 via-teal-500 to-emerald-600 rounded-3xl blur opacity-0 group-hover:opacity-30 transition-opacity"></div>

                            <div class="relative">
                                <a href="<?php echo e(route('devotions.show', $devotion)); ?>" class="block">
                                    <?php if($devotion->featured_image): ?>
                                        <div class="relative h-64 overflow-hidden">
                                            <img src="<?php echo e(asset('storage/' . $devotion->featured_image)); ?>" alt="<?php echo e($devotion->title); ?>" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="relative h-64 bg-gradient-to-br from-emerald-400 via-teal-500 to-cyan-600 flex items-center justify-center overflow-hidden">
                                            <div class="absolute inset-0 opacity-20">
                                                <div class="absolute top-0 left-0 w-32 h-32 bg-white rounded-full blur-2xl"></div>
                                                <div class="absolute bottom-0 right-0 w-40 h-40 bg-white rounded-full blur-2xl"></div>
                                            </div>
                                            <svg class="h-20 w-20 text-white opacity-80 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Category Badge -->
                                    <div class="absolute top-4 left-4">
                                        <span class="inline-block rounded-full border-2 border-white/50 bg-emerald-600 px-4 py-2 text-xs font-bold text-white shadow-lg">
                                            <?php echo e(ucfirst($devotion->category)); ?>

                                        </span>
                                    </div>

                                    <!-- Date Badge -->
                                    <div class="absolute top-4 right-4">
                                        <span class="inline-block rounded-full border-2 border-white/30 bg-black/40 backdrop-blur-sm px-3 py-1.5 text-xs font-bold text-white">
                                            <?php echo e($devotion->created_at->format('M d')); ?>

                                        </span>
                                    </div>
                                </a>

                                <div class="p-6 space-y-4">
                                    <h3 class="text-2xl font-bold text-gray-900 line-clamp-2 leading-tight group-hover:text-emerald-600 transition-colors">
                                        <a href="<?php echo e(route('devotions.show', $devotion)); ?>"><?php echo e($devotion->title); ?></a>
                                    </h3>

                                    <?php if($devotion->scripture_reference): ?>
                                        <div class="flex items-center gap-2 text-emerald-700">
                                            <svg class="h-5 w-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                            <span class="text-sm font-semibold"><?php echo e($devotion->scripture_reference); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <p class="text-gray-600 line-clamp-3 leading-relaxed"><?php echo e($devotion->excerpt); ?></p>

                                    <!-- Footer -->
                                    <div class="flex items-center justify-between border-t-2 border-gray-100 pt-4">
                                        <?php if($devotion->author): ?>
                                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                                <div class="h-8 w-8 rounded-full bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center text-white text-xs font-bold">
                                                    <?php echo e(strtoupper(substr($devotion->author, 0, 1))); ?>

                                                </div>
                                                <span class="font-medium"><?php echo e($devotion->author); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('devotions.show', $devotion)); ?>" class="inline-flex items-center gap-2 text-emerald-600 font-bold transition-all hover:gap-3">
                                            Read More
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Pagination -->
                <?php if($devotions->hasPages()): ?>
                    <div class="mt-8">
                        <?php echo e($devotions->links()); ?>

                    </div>
                <?php endif; ?>
            <?php else: ?>
                <!-- Empty State -->
                <div class="rounded-3xl border-2 border-gray-200 bg-white p-20 text-center shadow-lg">
                    <div class="mx-auto mb-8 flex h-32 w-32 items-center justify-center rounded-full bg-gradient-to-br from-emerald-100 to-teal-100">
                        <svg class="h-16 w-16 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">No Devotions Yet</h3>
                    <p class="text-lg text-gray-600 max-w-md mx-auto">
                        We're preparing beautiful devotions for you. Check back soon for daily spiritual inspiration!
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Newsletter CTA -->
    <section class="relative z-10 px-6 pb-32 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-5xl">
            <div class="relative overflow-hidden rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-600 via-teal-500 to-emerald-600 p-12 text-center shadow-2xl">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>

                <div class="relative">
                    <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-white/20 backdrop-blur-sm border-2 border-white/30">
                        <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>

                    <h2 class="text-4xl font-bold text-white mb-4 sm:text-5xl">
                        Stay Connected
                    </h2>
                    <p class="text-xl text-emerald-50 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Join our community and receive daily devotions and spiritual insights directly in your inbox
                    </p>

                    <form action="<?php echo e(route('subscribe')); ?>" method="POST" class="mx-auto max-w-md space-y-4">
                        <?php echo csrf_field(); ?>
                        <input type="email" name="email" placeholder="Enter your email address" required
                               class="w-full rounded-xl border-2 border-white/30 bg-white/10 backdrop-blur-sm px-6 py-4 text-white placeholder-emerald-200 transition-all focus:border-white focus:ring-4 focus:ring-white/30 outline-none">
                        <button type="submit" class="w-full inline-flex items-center justify-center gap-3 rounded-xl bg-white px-8 py-4 font-bold text-emerald-700 shadow-xl transition-all hover:shadow-2xl hover:bg-gray-50 hover:-translate-y-1">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Subscribe Now</span>
                        </button>
                    </form>

                    <?php if(session('subscriber_success')): ?>
                        <div class="mt-6 rounded-xl border-2 border-white/50 bg-white/20 backdrop-blur-sm p-4">
                            <p class="text-white font-semibold"><?php echo e(session('subscriber_success')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/devotions/index.blade.php ENDPATH**/ ?>