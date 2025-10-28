<?php $__env->startSection('title', 'Page Not Found - 404'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    @keyframes pulse-glow {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    @keyframes slide-in {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    .animate-slide-in {
        animation: slide-in 0.6s ease-out forwards;
    }

    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $quickLinks = [
            [
                'label' => 'Back to Homepage',
                'href' => route('home'),
                'description' => 'Return to our welcoming home',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />',
                'color' => 'indigo',
            ],
            [
                'label' => 'Browse Events',
                'href' => route('events.index'),
                'description' => 'Upcoming choir performances',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />',
                'color' => 'purple',
            ],
            [
                'label' => 'Daily Devotions',
                'href' => route('devotions.index'),
                'description' => 'Spiritual nourishment daily',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />',
                'color' => 'blue',
            ],
            [
                'label' => 'Stories & Testimonies',
                'href' => route('stories.index'),
                'description' => 'Inspiring faith journeys',
                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />',
                'color' => 'pink',
            ],
        ];
    ?>

    <section class="relative min-h-screen overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <!-- Animated Background Blobs -->
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -top-24 -left-20 h-96 w-96 animate-pulse-glow rounded-full bg-gradient-to-br from-indigo-200 to-purple-200 opacity-40 blur-3xl"></div>
            <div class="absolute top-1/4 right-10 h-80 w-80 animate-pulse-glow rounded-full bg-gradient-to-br from-pink-200 to-rose-200 opacity-30 blur-3xl" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-1/3 h-72 w-72 animate-pulse-glow rounded-full bg-gradient-to-br from-blue-200 to-cyan-200 opacity-30 blur-3xl" style="animation-delay: 2s;"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8 lg:py-24">

            <!-- Hero Section -->
            <div class="text-center animate-slide-in">
                <!-- Floating Music Note Icon -->
                <div class="mx-auto mb-8 flex h-32 w-32 items-center justify-center animate-float">
                    <div class="relative">
                        <div class="absolute inset-0 rounded-full bg-gradient-to-br from-indigo-400 to-purple-500 opacity-20 blur-2xl"></div>
                        <div class="relative flex h-24 w-24 items-center justify-center rounded-full bg-white shadow-2xl shadow-indigo-200/50 ring-4 ring-indigo-100">
                            <svg class="h-12 w-12 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- 404 Number -->
                <div class="mb-6 animate-slide-in delay-100">
                    <h1 class="text-[clamp(4rem,15vw,10rem)] font-black leading-none bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        404
                    </h1>
                </div>

                <!-- Main Message -->
                <div class="mx-auto max-w-2xl space-y-4 animate-slide-in delay-200">
                    <h2 class="text-3xl font-bold text-slate-900 sm:text-4xl lg:text-5xl">
                        Oops! This Page Hit a Wrong Note
                    </h2>
                    <p class="text-lg text-slate-600 sm:text-xl">
                        Looks like this page wandered off the sheet music. Don't worry though—we'll help you find the right harmony.
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row animate-slide-in delay-300">
                    <a href="<?php echo e(route('home')); ?>"
                       class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-4 text-base font-semibold text-white shadow-xl shadow-indigo-300/50 transition-all hover:scale-105 hover:shadow-2xl hover:shadow-indigo-400/50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:w-auto">
                        <svg class="h-5 w-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Take Me Home
                    </a>

                    <a href="<?php echo e(route('contact')); ?>"
                       class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl border-2 border-slate-300 bg-white px-8 py-4 text-base font-semibold text-slate-700 shadow-lg transition-all hover:scale-105 hover:border-indigo-300 hover:text-indigo-600 hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-600 sm:w-auto">
                        <svg class="h-5 w-5 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                        </svg>
                        Report an Issue
                    </a>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->is_admin): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>"
                               class="group inline-flex w-full items-center justify-center gap-2 rounded-2xl border-2 border-indigo-200 bg-indigo-50 px-8 py-4 text-base font-semibold text-indigo-700 shadow-lg transition-all hover:scale-105 hover:bg-indigo-600 hover:text-white hover:shadow-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:w-auto">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                </svg>
                                Admin Dashboard
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Quick Links Grid -->
            <div class="mt-20 animate-slide-in delay-400">
                <div class="text-center mb-10">
                    <h3 class="text-2xl font-bold text-slate-900">Looking for Something Specific?</h3>
                    <p class="mt-2 text-slate-600">Here are some popular destinations to get you back on track</p>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <?php $__currentLoopData = $quickLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($link['href']); ?>"
                           class="group relative overflow-hidden rounded-3xl border border-<?php echo e($link['color']); ?>-200 bg-white p-6 shadow-lg transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-<?php echo e($link['color']); ?>-200/50">
                            <!-- Gradient Background on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-br from-<?php echo e($link['color']); ?>-50 to-<?php echo e($link['color']); ?>-100 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>

                            <!-- Content -->
                            <div class="relative">
                                <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-<?php echo e($link['color']); ?>-100 to-<?php echo e($link['color']); ?>-200 text-<?php echo e($link['color']); ?>-600 shadow-lg shadow-<?php echo e($link['color']); ?>-200/50 transition-transform duration-300 group-hover:scale-110">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <?php echo $link['icon']; ?>

                                    </svg>
                                </div>

                                <h4 class="text-lg font-bold text-slate-900 mb-2"><?php echo e($link['label']); ?></h4>
                                <p class="text-sm text-slate-600 mb-4"><?php echo e($link['description']); ?></p>

                                <div class="flex items-center text-<?php echo e($link['color']); ?>-600 font-semibold text-sm">
                                    Explore
                                    <svg class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-16 grid gap-6 lg:grid-cols-2">
                <!-- Need Help Card -->
                <div class="rounded-3xl border border-indigo-200 bg-gradient-to-br from-indigo-50 to-purple-50 p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-indigo-100">
                            <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Need Help?</h3>
                            <p class="text-slate-600 mb-4">
                                If you believe this is an error or you need assistance finding what you're looking for, our team is here to help.
                            </p>
                            <a href="<?php echo e(route('contact')); ?>"
                               class="inline-flex items-center gap-2 text-indigo-600 font-semibold hover:text-indigo-700">
                                Contact Support
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Fun Fact Card -->
                <div class="rounded-3xl border border-pink-200 bg-gradient-to-br from-pink-50 to-rose-50 p-8 shadow-xl">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-pink-100">
                            <svg class="h-6 w-6 text-pink-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">Did You Know?</h3>
                            <p class="text-slate-600">
                                While you're here, our choir has performed at over 50 events this year, touching countless hearts with worship and praise. Join us in our next service!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\resources\views/errors/missing.blade.php ENDPATH**/ ?>