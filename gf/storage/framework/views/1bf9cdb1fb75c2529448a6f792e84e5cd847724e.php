<?php $__env->startSection('title', "About Us | God's Family Choir"); ?>

<?php $__env->startSection('content'); ?>
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-32 -left-20 h-72 w-72 rounded-full bg-emerald-200/40 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-80 w-80 rounded-full bg-amber-200/50 blur-3xl"></div>

    <section class="relative z-10 px-6 pt-32 pb-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="flex flex-col gap-10 lg:flex-row lg:items-center">
                <div class="flex-1 space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100/80 px-4 py-1 text-xs font-semibold uppercase tracking-[0.32em] text-emerald-700 shadow-sm">
                        Our Story
                    </span>
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl lg:text-6xl">
                        One family, one sound, one <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">mission</span>
                    </h1>
                    <p class="max-w-2xl text-lg text-gray-600 leading-relaxed">
                        God's Family Choir is a collective of worshippers, musicians, and storytellers whose voices unite to create moments that bring people closer to Christ. For over two decades we have blended contemporary expression with timeless truth, taking the sound of heaven from Ghana to the world.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#journey" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/30 transition hover:shadow-xl hover:shadow-emerald-500/40 hover:-translate-y-0.5">
                            Explore our journey
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 rounded-full border-2 border-emerald-200 px-6 py-3 text-sm font-semibold text-emerald-700 transition hover:border-emerald-400 hover:bg-emerald-50">
                            Get in touch
                        </a>
                    </div>
                </div>
                <div class="flex-1">
                    <!-- Stacked Images Effect -->
                    <div class="relative mx-auto max-w-md h-[500px]">
                        <!-- Image 3 - Back -->
                        <div class="absolute top-8 left-4 w-72 h-96 rounded-2xl overflow-hidden shadow-xl transform rotate-6 transition-transform hover:rotate-12">
                            <img src="<?php echo e(asset('images/3.jpg')); ?>" alt="God's Family Choir" class="h-full w-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/20 to-transparent"></div>
                        </div>

                        <!-- Image 2 - Middle -->
                        <div class="absolute top-4 right-8 w-72 h-96 rounded-2xl overflow-hidden shadow-2xl transform -rotate-3 transition-transform hover:-rotate-6">
                            <img src="<?php echo e(asset('images/gf-2.jpg')); ?>" alt="God's Family Choir" class="h-full w-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-amber-900/20 to-transparent"></div>
                        </div>

                        <!-- Image 1 - Front (Main) -->
                        <div class="absolute top-12 left-1/2 -translate-x-1/2 w-80 h-96 rounded-2xl overflow-hidden shadow-2xl transform transition-transform hover:scale-105 border-4 border-white">
                            <img src="<?php echo e(asset('images/1.jpg')); ?>" alt="God's Family Choir" class="h-full w-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/40 via-transparent to-transparent"></div>
                            <!-- Badge Overlay -->
                            <div class="absolute bottom-6 left-6 right-6 rounded-xl bg-white/95 backdrop-blur-sm p-4 shadow-lg">
                                <p class="text-xs font-bold uppercase tracking-wide text-emerald-600">Since 1999</p>
                                <p class="mt-1 text-base font-bold text-gray-900">Voices raised in worship, hearts anchored in purpose.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-20 grid gap-6 rounded-3xl border border-emerald-100 bg-white/90 p-6 shadow-xl sm:grid-cols-2 lg:grid-cols-4">
                <?php
                    $stats = [
                        ['label' => 'Active members', 'value' => 160, 'color' => 'emerald'],
                        ['label' => 'Years of ministry', 'value' => 25, 'color' => 'amber'],
                        ['label' => 'Cities reached', 'value' => 32, 'color' => 'emerald'],
                        ['label' => 'Recorded projects', 'value' => 18, 'color' => 'amber'],
                    ];
                ?>
                <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group space-y-3 rounded-2xl bg-gradient-to-br from-<?php echo e($stat['color']); ?>-50 to-white p-6 shadow-md hover:shadow-xl transition-all hover:-translate-y-1">
                        <p class="text-xs font-bold text-<?php echo e($stat['color']); ?>-600 uppercase tracking-wider"><?php echo e($stat['label']); ?></p>
                        <p class="text-4xl font-black text-gray-900"><span class="about-counter" data-target="<?php echo e($stat['value']); ?>">0</span>+</p>
                        <div class="h-1 w-12 bg-gradient-to-r from-<?php echo e($stat['color']); ?>-500 to-<?php echo e($stat['color']); ?>-300 rounded-full"></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section id="journey" class="relative z-10 px-6 py-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
                <div class="space-y-10">
                    <div class="space-y-4">
                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-emerald-700">Where we began</span>
                        <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Planted in prayer, growing through <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">service</span></h2>
                        <p class="text-base text-gray-600 leading-relaxed">
                            What began as a prayer group within a local youth fellowship has grown into a multi-generational choir with a global footprint. Our sound has evolved, but our heartbeat remains the same: to make Christ known through excellent, Spirit-filled music.
                        </p>
                    </div>

                    <div class="rounded-3xl border border-emerald-100 bg-white p-8 shadow-xl">
                        <h3 class="text-xl font-bold text-gray-900">Our rhythm</h3>
                        <p class="mt-2 text-sm text-gray-500">Every rehearsal, outreach, and production is anchored in three rhythms that keep us healthy.</p>
                        <dl class="mt-8 grid gap-6 sm:grid-cols-3">
                            <div class="space-y-2">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                    </svg>
                                </div>
                                <dt class="text-xs font-bold uppercase tracking-wider text-emerald-600">Worship</dt>
                                <dd class="text-sm text-gray-600">Intimacy with God first.</dd>
                            </div>
                            <div class="space-y-2">
                                <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <dt class="text-xs font-bold uppercase tracking-wider text-amber-600">Community</dt>
                                <dd class="text-sm text-gray-600">Family beyond stage lights.</dd>
                            </div>
                            <div class="space-y-2">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <dt class="text-xs font-bold uppercase tracking-wider text-emerald-600">Impact</dt>
                                <dd class="text-sm text-gray-600">Music that meets needs.</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="relative flex flex-col gap-8 rounded-3xl border border-amber-100 bg-gradient-to-br from-amber-50/50 to-white p-8 shadow-xl">
                    <h3 class="text-xl font-bold text-gray-900">Highlights over the years</h3>
                    <ol class="space-y-6">
                        <?php
                            $milestones = [
                                ['year' => '1999', 'title' => 'Choir founded', 'detail' => 'God impressed on a group of young worshippers to devote their voices to His service.'],
                                ['year' => '2008', 'title' => 'First nationwide tour', 'detail' => 'Our "One Voice" tour reached 12 cities with crusades, concerts, and community missions.'],
                                ['year' => '2014', 'title' => 'International recording debut', 'detail' => 'Released the live album "Heaven\'s Echo" recorded across Accra and Johannesburg.'],
                                ['year' => '2022', 'title' => 'Digital worship experiences', 'detail' => 'Launched immersive online worship rooms that now connect thousands monthly.'],
                            ];
                        ?>
                        <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="relative border-l-4 border-emerald-300 pl-6 hover:border-emerald-500 transition-colors">
                                <span class="inline-flex rounded-full bg-gradient-to-r from-emerald-100 to-emerald-50 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-emerald-700 shadow-sm"><?php echo e($milestone['year']); ?></span>
                                <p class="mt-3 text-base font-bold text-gray-900"><?php echo e($milestone['title']); ?></p>
                                <p class="mt-1 text-sm text-gray-600 leading-relaxed"><?php echo e($milestone['detail']); ?></p>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="relative z-10 px-6 py-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="text-center">
                <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-amber-700">Purpose &amp; values</span>
                <h2 class="mt-6 text-3xl font-bold text-gray-900 sm:text-4xl">Why we sing and how we <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">live it out</span></h2>
                <p class="mt-4 max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed">
                    Our ministry flows from a clear identity. We pursue the presence of God, honour excellence, and cultivate a culture of discipleship and service on and off stage.
                </p>
            </div>

            <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php
                    $values = [
                        ['icon' => '✨', 'title' => 'Pure Worship', 'body' => 'We create environments where people encounter Jesus, beyond performances and playlists.', 'color' => 'emerald'],
                        ['icon' => '🤍', 'title' => 'Family Culture', 'body' => 'Accountability, mentorship, and shared meals keep us grounded in authentic relationship.', 'color' => 'amber'],
                        ['icon' => '🎓', 'title' => 'Continuous Growth', 'body' => 'Workshops, vocal coaching, and spiritual retreats keep our gifts sharp and hearts aligned.', 'color' => 'emerald'],
                        ['icon' => '🌍', 'title' => 'Community Impact', 'body' => 'Outreaches, prison visits, and scholarship drives extend our ministry beyond the stage.', 'color' => 'amber'],
                        ['icon' => '🎙️', 'title' => 'Creative Excellence', 'body' => 'We steward diverse musical styles while remaining rooted in biblical truth.', 'color' => 'emerald'],
                        ['icon' => '🙏', 'title' => 'Prayer First', 'body' => 'Every rehearsal and event is undergirded by intentional intercession.', 'color' => 'amber'],
                    ];
                ?>
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative overflow-hidden rounded-3xl border-2 border-<?php echo e($value['color']); ?>-100 bg-white p-8 shadow-lg transition hover:-translate-y-2 hover:shadow-2xl hover:border-<?php echo e($value['color']); ?>-300">
                        <div class="absolute inset-0 bg-gradient-to-br from-<?php echo e($value['color']); ?>-500/0 to-<?php echo e($value['color']); ?>-600/0 opacity-0 transition group-hover:opacity-5"></div>
                        <div class="relative">
                            <div class="w-14 h-14 bg-gradient-to-br from-<?php echo e($value['color']); ?>-100 to-<?php echo e($value['color']); ?>-50 rounded-2xl flex items-center justify-center mb-4">
                                <span class="text-3xl"><?php echo e($value['icon']); ?></span>
                            </div>
                            <h3 class="mt-4 text-xl font-bold text-gray-900"><?php echo e($value['title']); ?></h3>
                            <p class="mt-3 text-sm text-gray-600 leading-relaxed"><?php echo e($value['body']); ?></p>
                            <div class="mt-4 h-1 w-12 bg-gradient-to-r from-<?php echo e($value['color']); ?>-500 to-<?php echo e($value['color']); ?>-300 rounded-full"></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section class="relative z-10 px-6 py-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl rounded-3xl border border-emerald-100 bg-white p-10 shadow-xl">
            <div class="grid gap-10 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
                <div class="space-y-5">
                    <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white shadow-lg">
                        Meet the directors
                    </span>
                    <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Guided by <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">servant leaders</span></h2>
                    <p class="text-base text-gray-600 leading-relaxed">
                        Our leadership team shepherds the choir with humility and strategy, equipping every section—sopranos to band—to thrive spiritually and musically. They steward vision, develop emerging leaders, and ensure our ministry stays anchored in sound doctrine.
                    </p>
                    <a href="<?php echo e(route('committee.index')); ?>" class="inline-flex items-center gap-2 rounded-full border-2 border-emerald-200 px-6 py-3 text-sm font-bold text-emerald-700 transition hover:border-emerald-400 hover:bg-emerald-50 hover:-translate-y-0.5 shadow-sm">
                        View leadership directory
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <?php
                        $leaders = [
                            ['name' => 'Ps. Evans Owusu', 'role' => 'Founder & Lead Pastor', 'bio' => 'Visionary leader with a passion for worship renewal across the continent.', 'color' => 'emerald'],
                            ['name' => 'Adjoa Mensah', 'role' => 'Music Director', 'bio' => 'Arranger and vocal coach helping singers unlock their full range and anointing.', 'color' => 'amber'],
                            ['name' => 'Michael Tetteh', 'role' => 'Band Director', 'bio' => 'Drummer and producer crafting the sonic bedrock that carries our sound.', 'color' => 'emerald'],
                            ['name' => 'Selina Addae', 'role' => 'Prayer & Care Lead', 'bio' => 'Ensures every voice is supported spiritually, emotionally, and practically.', 'color' => 'amber'],
                        ];
                    ?>
                    <?php $__currentLoopData = $leaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group rounded-2xl border-2 border-<?php echo e($leader['color']); ?>-100 bg-white p-6 shadow-md hover:shadow-xl transition-all hover:-translate-y-1">
                            <p class="text-lg font-bold text-gray-900"><?php echo e($leader['name']); ?></p>
                            <p class="text-sm font-bold text-<?php echo e($leader['color']); ?>-600"><?php echo e($leader['role']); ?></p>
                            <p class="mt-3 text-sm text-gray-600 leading-relaxed"><?php echo e($leader['bio']); ?></p>
                            <div class="mt-4 h-1 w-10 bg-gradient-to-r from-<?php echo e($leader['color']); ?>-500 to-<?php echo e($leader['color']); ?>-300 rounded-full"></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="relative z-10 px-6 py-24 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-6xl">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div class="rounded-3xl border-2 border-emerald-100 bg-gradient-to-br from-emerald-50/50 to-white p-10 shadow-xl">
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white shadow-lg">Equip</span>
                    <h2 class="mt-5 text-3xl font-bold text-gray-900 sm:text-4xl">Training the <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">next generation</span></h2>
                    <p class="mt-4 text-base text-gray-600 leading-relaxed">
                        Beyond the main choir, our academies nurture young vocalists and instrumentalists through mentorship, theory classes, and worship internships. We partner with local churches to host seasonal boot camps that strengthen choirs across the nation.
                    </p>
                    <dl class="mt-8 space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-base font-bold text-gray-900">Mentorship circles</p>
                                <p class="mt-1 text-sm text-gray-600">Section leaders guide small groups through spiritual and musical development plans.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-base font-bold text-gray-900">Songwriting labs</p>
                                <p class="mt-1 text-sm text-gray-600">Writers collaborate with pastors to craft songs rooted in sound doctrine and local stories.</p>
                            </div>
                        </div>
                    </dl>
                </div>
                <div class="rounded-3xl border-2 border-amber-100 bg-gradient-to-br from-amber-50/50 to-white p-10 shadow-xl">
                    <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white shadow-lg">Serve</span>
                    <h2 class="mt-5 text-3xl font-bold text-gray-900 sm:text-4xl">Serving beyond the <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">stage</span></h2>
                    <p class="mt-4 text-base text-gray-600 leading-relaxed">
                        Worship is our launchpad for tangible love. Through our "Hearts in Motion" initiative we volunteer in hospitals, support prison ministries, and collaborate with NGOs to provide relief in times of crisis. Music opens doors—service keeps them open.
                    </p>
                    <ul class="mt-8 space-y-4">
                        <li class="flex items-start gap-4">
                            <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 text-white font-bold shadow-lg">1</span>
                            <span class="text-sm text-gray-700 leading-relaxed">Scholarships for young musicians in underserved communities.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 text-white font-bold shadow-lg">2</span>
                            <span class="text-sm text-gray-700 leading-relaxed">Quarterly community worship nights with free medical outreaches.</span>
                        </li>
                        <li class="flex items-start gap-4">
                            <span class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 text-white font-bold shadow-lg">3</span>
                            <span class="text-sm text-gray-700 leading-relaxed">Partnership with local churches to revitalize dormant choir ministries.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="relative z-10 px-6 pb-40 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-5xl rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-white via-emerald-50/30 to-white p-12 text-center shadow-2xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-4 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-lg">Join the family</span>
            <h2 class="mt-6 text-4xl font-black text-gray-900 sm:text-5xl">Add your voice to the <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">story</span></h2>
            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                We are always listening for new voices, musicians, production minds, and intercessors who feel called to serve through worship. Wherever you are on your journey, there is room for you here.
            </p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="<?php echo e(route('choir.register.form')); ?>" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-4 text-base font-bold text-white shadow-xl shadow-emerald-500/30 transition hover:shadow-2xl hover:shadow-emerald-500/40 hover:-translate-y-1">
                    Register to audition
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="<?php echo e(route('events.index')); ?>" class="inline-flex items-center gap-2 rounded-full border-2 border-emerald-200 px-8 py-4 text-base font-bold text-emerald-700 transition hover:border-emerald-400 hover:bg-emerald-50 hover:-translate-y-1">
                    Experience a live worship night
                </a>
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

<?php $__env->startPush('styles'); ?>
<style>
    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradientSlide 6s ease infinite;
    }

    @keyframes gradientSlide {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .animate-fade-in-up {
        opacity: 0;
        animation: fadeInUp 0.9s ease forwards;
    }

    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const counters = document.querySelectorAll('.about-counter');
        if (!('IntersectionObserver' in window) || counters.length === 0) {
            counters.forEach(counter => counter.textContent = counter.dataset.target);
            return;
        }

        const easeOut = (t) => 1 - Math.pow(1 - t, 3);

        const animateCounter = (counter) => {
            const target = Number(counter.dataset.target || 0);
            const duration = 1600;
            const start = performance.now();

            const tick = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                const value = Math.floor(easeOut(progress) * target);
                counter.textContent = value.toLocaleString();
                if (progress < 1) {
                    requestAnimationFrame(tick);
                }
            };

            requestAnimationFrame(tick);
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.35 });

        counters.forEach(counter => observer.observe(counter));
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/about.blade.php ENDPATH**/ ?>