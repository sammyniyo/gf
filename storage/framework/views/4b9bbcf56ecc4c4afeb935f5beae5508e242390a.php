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
                                <p class="text-xs font-bold uppercase tracking-wide text-emerald-600">Since 1998</p>
                                <p class="mt-1 text-base font-bold text-gray-900">Voices raised in worship, hearts anchored in purpose.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-20 grid gap-6 rounded-3xl border border-emerald-100 bg-white/90 p-6 shadow-xl sm:grid-cols-2 lg:grid-cols-4">
                <?php
                    $stats = [
                        ['label' => 'Active members', 'value' => 400, 'color' => 'emerald'],
                        ['label' => 'Years of service', 'value' => 27, 'color' => 'amber'],
                        ['label' => 'Outrreaches', 'value' => 10, 'color' => 'emerald'],
                        ['label' => 'Recorded projects', 'value' => 4, 'color' => 'amber'],
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
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-emerald-700">Our Journey</span>
                <h2 class="mt-6 text-4xl font-bold text-gray-900 sm:text-5xl">Our <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">History Roadmap</span></h2>
                <p class="mt-4 max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed">
                    From humble beginnings in 1998 to touching lives across nations, our journey has been marked by God's faithfulness and the dedication of countless voices united in worship.
                        </p>
                    </div>

            <!-- Modern Timeline Roadmap -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-emerald-200 via-emerald-400 to-emerald-200 transform -translate-x-1/2 hidden lg:block"></div>

                <div class="space-y-16">
                    <?php
                        $roadmapMilestones = [
                            [
                                'year' => '1998',
                                'title' => 'The Beginning',
                                'description' => 'God\'s Family Choir was born from a prayer meeting. A small group of passionate young believers felt called to use their voices for God\'s glory, starting what would become a powerful ministry.',
                                'image' => '1.jpg',
                                'position' => 'left'
                            ],
                            [
                                'year' => '2003',
                                'title' => 'First Album Released',
                                'description' => 'Released our debut album "Songs of Zion" which touched hearts across the nation and established our musical identity rooted in authentic worship.',
                                'image' => '2.jpg',
                                'position' => 'right'
                            ],
                            [
                                'year' => '2008',
                                'title' => 'Nationwide Impact',
                                'description' => 'Our "One Voice" tour reached 12 cities with crusades, concerts, and community missions, bringing the message of hope to thousands.',
                                'image' => '3.jpg',
                                'position' => 'left'
                            ],
                            [
                                'year' => '2012',
                                'title' => 'GF Juniors Launched',
                                'description' => 'Established our youth division to nurture the next generation of worshippers. GF Juniors has become a beacon of hope for young people discovering their musical calling.',
                                'image' => '4.jpg',
                                'position' => 'right'
                            ],
                            [
                                'year' => '2016',
                                'title' => 'International Recognition',
                                'description' => 'Released the live album "Heaven\'s Echo" recorded across multiple cities. Our music began reaching international audiences through streaming platforms.',
                                'image' => '5.jpg',
                                'position' => 'left'
                            ],
                            [
                                'year' => '2022',
                                'title' => 'Digital Transformation',
                                'description' => 'Launched immersive online worship experiences that now connect thousands monthly, expanding our reach beyond physical boundaries.',
                                'image' => 'gf-2.jpg',
                                'position' => 'right'
                            ],
                            [
                                'year' => '2025',
                                'title' => 'Continuing the Legacy',
                                'description' => 'Today, we stand strong with over 160 active members, multiple departments, and a vision to reach even more souls with the gospel through music.',
                                'image' => '1.jpg',
                                'position' => 'left'
                            ],
                        ];
                    ?>

                    <?php $__currentLoopData = $roadmapMilestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="relative">
                            <!-- Desktop Timeline Item -->
                            <div class="hidden lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                                <?php if($milestone['position'] === 'left'): ?>
                                    <!-- Content Left -->
                                    <div class="text-right space-y-4 roadmap-item" data-aos="fade-right">
                                        <div class="inline-block">
                                            <span class="inline-flex items-center justify-center px-6 py-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold text-2xl shadow-xl">
                                                <?php echo e($milestone['year']); ?>

                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900"><?php echo e($milestone['title']); ?></h3>
                                        <p class="text-gray-600 leading-relaxed"><?php echo e($milestone['description']); ?></p>
                                    </div>
                                    <!-- Image Right -->
                                    <div class="roadmap-item" data-aos="fade-left">
                                        <div class="relative group">
                                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-amber-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                                            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                                                <img src="<?php echo e(asset('images/' . $milestone['image'])); ?>" alt="<?php echo e($milestone['title']); ?>" class="w-full h-72 object-cover transform group-hover:scale-105 transition duration-500" />
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <!-- Image Left -->
                                    <div class="roadmap-item" data-aos="fade-right">
                                        <div class="relative group">
                                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-emerald-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                                            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                                                <img src="<?php echo e(asset('images/' . $milestone['image'])); ?>" alt="<?php echo e($milestone['title']); ?>" class="w-full h-72 object-cover transform group-hover:scale-105 transition duration-500" />
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Content Right -->
                                    <div class="text-left space-y-4 roadmap-item" data-aos="fade-left">
                                        <div class="inline-block">
                                            <span class="inline-flex items-center justify-center px-6 py-2 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 text-white font-bold text-2xl shadow-xl">
                                                <?php echo e($milestone['year']); ?>

                                            </span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-900"><?php echo e($milestone['title']); ?></h3>
                                        <p class="text-gray-600 leading-relaxed"><?php echo e($milestone['description']); ?></p>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Mobile Timeline Item -->
                            <div class="lg:hidden roadmap-item" data-aos="fade-up">
                                <div class="relative pl-8 border-l-4 border-emerald-300">
                                    <div class="absolute -left-4 top-0 w-8 h-8 rounded-full bg-gradient-to-br from-emerald-600 to-emerald-700 border-4 border-white shadow-lg"></div>
                                    <div class="space-y-4 pb-8">
                                        <span class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold text-lg shadow-lg">
                                            <?php echo e($milestone['year']); ?>

                                        </span>
                                        <h3 class="text-xl font-bold text-gray-900"><?php echo e($milestone['title']); ?></h3>
                                        <div class="relative group">
                                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-amber-600 rounded-xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                                            <div class="relative rounded-xl overflow-hidden shadow-xl">
                                                <img src="<?php echo e(asset('images/' . $milestone['image'])); ?>" alt="<?php echo e($milestone['title']); ?>" class="w-full h-56 object-cover" />
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent"></div>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed"><?php echo e($milestone['description']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Timeline Dot for Desktop -->
                            <div class="hidden lg:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                                <div class="w-6 h-6 rounded-full bg-gradient-to-br from-emerald-600 to-emerald-700 border-4 border-white shadow-xl animate-pulse"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- GF Juniors Section -->
    <section class="relative z-10 px-6 py-24 sm:px-8 lg:px-12 bg-gradient-to-br from-amber-50/30 via-white to-emerald-50/30">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                <!-- Image Section -->
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-amber-400 via-emerald-400 to-amber-400 rounded-3xl blur-2xl opacity-20 animate-pulse"></div>
                        <div class="relative">
                            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                                <img src="<?php echo e(asset('images/choir_of_god_1761667510314.jpeg')); ?>" alt="GF Juniors - Young Worshippers" class="w-full h-[500px] object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/20 to-transparent"></div>
                                <!-- Floating Badge -->
                                <div class="absolute bottom-6 left-6 right-6 rounded-2xl bg-white/95 backdrop-blur-md p-6 shadow-2xl">
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center text-white shadow-xl">
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                    </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold uppercase tracking-wider text-amber-600">Since 2012</p>
                                            <p class="text-lg font-bold text-gray-900">Raising the next generation of worshippers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Decorative Elements -->
                            <div class="absolute -top-6 -right-6 w-32 h-32 bg-amber-200/40 rounded-full blur-3xl"></div>
                            <div class="absolute -bottom-6 -left-6 w-40 h-40 bg-emerald-200/40 rounded-full blur-3xl"></div>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="order-1 lg:order-2 space-y-6" data-aos="fade-left">
                    <div class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-xl">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Featured Department
                    </div>

                    <h2 class="text-4xl font-bold text-gray-900 sm:text-5xl leading-tight">
                        GF <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">Juniors</span>
                    </h2>

                    <p class="text-xl text-gray-700 leading-relaxed font-medium">
                        Nurturing young hearts to worship with passion and purpose
                    </p>

                    <p class="text-lg text-gray-600 leading-relaxed">
                        GF Juniors is more than a youth choir—it's a family where young worshippers discover their God-given talents, build lifelong friendships, and develop a deep relationship with Christ. Through weekly rehearsals, mentorship programs, and performance opportunities, we're shaping the next generation of worship leaders.
                    </p>

                    <!-- Stats Grid -->
                    <!-- <div class="grid grid-cols-3 gap-4 py-6">
                        <div class="text-center p-4 rounded-2xl bg-gradient-to-br from-amber-50 to-white border-2 border-amber-100 shadow-md hover:shadow-xl transition-all hover:-translate-y-1">
                            <p class="text-3xl font-black text-amber-600">50+</p>
                            <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mt-1">Young Members</p>
                        </div>
                        <div class="text-center p-4 rounded-2xl bg-gradient-to-br from-emerald-50 to-white border-2 border-emerald-100 shadow-md hover:shadow-xl transition-all hover:-translate-y-1">
                            <p class="text-3xl font-black text-emerald-600">12</p>
                            <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mt-1">Years Strong</p>
                        </div>
                        <div class="text-center p-4 rounded-2xl bg-gradient-to-br from-amber-50 to-white border-2 border-amber-100 shadow-md hover:shadow-xl transition-all hover:-translate-y-1">
                            <p class="text-3xl font-black text-amber-600">25+</p>
                            <p class="text-xs font-bold text-gray-600 uppercase tracking-wider mt-1">Performances</p>
                        </div>
                    </div> -->

                    <!-- Features List -->
                    <div class="space-y-4 pt-4">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white border-2 border-amber-100 shadow-sm hover:shadow-md transition-all">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Vocal Training & Music Theory</h4>
                                <p class="text-sm text-gray-600 mt-1">Professional coaching in singing, harmonization, and musical fundamentals</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white border-2 border-emerald-100 shadow-sm hover:shadow-md transition-all">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Spiritual Mentorship</h4>
                                <p class="text-sm text-gray-600 mt-1">Guidance from experienced leaders who invest in character development</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-4 rounded-xl bg-white border-2 border-amber-100 shadow-sm hover:shadow-md transition-all">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-900">Performance Opportunities</h4>
                                <p class="text-sm text-gray-600 mt-1">Regular chances to minister at events, church services, and community outreaches</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="pt-6">
                        <a href="<?php echo e(route('choir.register.form')); ?>" class="inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-8 py-4 text-base font-bold text-white shadow-xl shadow-amber-500/30 transition hover:shadow-2xl hover:shadow-amber-500/40 hover:-translate-y-1">
                            Join GF Juniors Today
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
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

    <!-- Departments Section -->
    <section class="relative z-10 px-6 py-24 sm:px-8 lg:px-12">
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-50/30 via-white to-amber-50/30"></div>
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-amber-200/20 rounded-full blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white shadow-lg">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    Our Departments
                </span>
                <h2 class="mt-6 text-4xl font-bold text-gray-900 sm:text-5xl">
                    Departments that <span class="bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text text-transparent">Shape Us</span>
                </h2>
                <p class="mt-4 max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed">
                    Each department brings unique strengths to our ministry, working together to build disciples, nurture talent, and create excellence in worship.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php
                    $departments = [
                        [
                            'name' => 'Coaching Department',
                            'lead' => 'DM Heureuse Uwumutima',
                            'description' => 'Developing vocal excellence and musical skills through dedicated training, workshops, and one-on-one mentorship for all choir members.',
                            'image' => 'departments/heureuse.png',
                            'gradient' => 'from-blue-500 to-blue-600',
                            'bgGradient' => 'from-blue-50 to-blue-100',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'borderColor' => 'border-blue-200',
                            'textColor' => 'text-blue-600'
                        ],
                        [
                            'name' => 'Spiritual Department',
                            'lead' => 'Yves Iraduhumuriza',
                            'description' => 'Anchoring our ministry in prayer, Bible study, and spiritual formation—ensuring hearts stay aligned with God\'s purpose.',
                            'image' => 'departments/yves.png',
                            'gradient' => 'from-purple-500 to-purple-600',
                            'bgGradient' => 'from-purple-50 to-purple-100',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'borderColor' => 'border-purple-200',
                            'textColor' => 'text-purple-600'
                        ],
                        [
                            'name' => 'Fashion Department',
                            'lead' => 'Olivier Nshimyumuremyi',
                            'description' => 'Designing and coordinating our visual identity with elegant, coordinated outfits that reflect professionalism and unity.',
                            'image' => 'departments/olivier.png',
                            'gradient' => 'from-pink-500 to-rose-600',
                            'bgGradient' => 'from-pink-50 to-rose-100',
                            'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01',
                            'borderColor' => 'border-pink-200',
                            'textColor' => 'text-pink-600'
                        ],
                        [
                            'name' => 'GF Juniors',
                            'lead' => 'Marie Aime Sokongari',
                            'description' => 'Raising the next generation of worshippers through age-appropriate training, mentorship, and performance opportunities for young people.',
                            'image' => 'departments/aime.png',
                            'gradient' => 'from-amber-500 to-orange-600',
                            'bgGradient' => 'from-amber-50 to-orange-100',
                            'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            'borderColor' => 'border-amber-200',
                            'textColor' => 'text-amber-600'
                        ],
                        [
                            'name' => 'Disciplinary Department',
                            'lead' => 'Benie Solange Dusabimana',
                            'description' => 'Upholding standards of excellence, accountability, and godly conduct—creating an environment of respect and growth.',
                            'image' => 'departments/benie.png',
                            'gradient' => 'from-slate-500 to-slate-600',
                            'bgGradient' => 'from-slate-50 to-slate-100',
                            'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'borderColor' => 'border-slate-200',
                            'textColor' => 'text-slate-600'
                        ],
                        [
                            'name' => 'Fellowship Department',
                            'lead' => 'Thierry Uwiringiye Hirwa',
                            'description' => 'Building authentic community through social events, team bonding, and care initiatives that make everyone feel valued and connected.',
                            'image' => 'departments/hirwa.png',
                            'gradient' => 'from-emerald-500 to-teal-600',
                            'bgGradient' => 'from-emerald-50 to-teal-100',
                            'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                            'borderColor' => 'border-emerald-200',
                            'textColor' => 'text-emerald-600'
                        ],
                    ];
                ?>

                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative">
                        <!-- Card -->
                        <div class="relative h-full overflow-hidden rounded-2xl bg-white border-2 <?php echo e($dept['borderColor']); ?> shadow-md hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <!-- Top Section with Icon Background -->
                            <div class="relative h-40 overflow-hidden bg-gradient-to-br <?php echo e($dept['bgGradient']); ?>">
                                <!-- Icon Placeholder Background -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-gradient-to-br <?php echo e($dept['gradient']); ?> rounded-full blur-2xl opacity-30 animate-pulse"></div>
                                        <div class="relative w-24 h-24 bg-gradient-to-br <?php echo e($dept['gradient']); ?> rounded-full flex items-center justify-center shadow-2xl opacity-20">
                                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($dept['icon']); ?>" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Floating Icon Badge -->
                                <div class="absolute top-3 right-3 w-10 h-10 bg-white/95 backdrop-blur-sm rounded-lg flex items-center justify-center shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                                    <svg class="w-5 h-5 <?php echo e($dept['textColor']); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($dept['icon']); ?>" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Lead Photo Section - Overlapping -->
                            <div class="relative px-6 -mt-16 mb-4 flex justify-center z-10">
                                <div class="relative transform group-hover:scale-150 group-hover:z-50 transition-all duration-500 ease-out cursor-pointer">
                                    <!-- Enhanced Glow Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-br <?php echo e($dept['gradient']); ?> rounded-2xl blur-lg opacity-40 group-hover:opacity-100 group-hover:blur-2xl group-hover:scale-110 transition-all duration-500"></div>

                                    <!-- Photo Container -->
                                    <div class="relative w-32 h-32 rounded-2xl overflow-hidden border-4 border-white shadow-2xl bg-gradient-to-br <?php echo e($dept['bgGradient']); ?> group-hover:shadow-[0_30px_80px_rgba(0,0,0,0.4)] group-hover:border-8 transition-all duration-500">
                                        <?php if(file_exists(public_path($dept['image']))): ?>
                                            <img src="<?php echo e(asset($dept['image'])); ?>" alt="<?php echo e($dept['lead']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" />
                                        <?php else: ?>
                                            <!-- Placeholder Avatar -->
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br <?php echo e($dept['gradient']); ?> group-hover:scale-105 transition-transform duration-700">
                                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Hover Hint Badge -->
                                    <div class="absolute -bottom-2 -right-2 bg-white rounded-full p-1.5 shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg class="w-4 h-4 <?php echo e($dept['textColor']); ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="px-6 pb-6 text-center">
                                <!-- Lead Name -->
                                <div class="mb-4">
                                    <p class="text-xs font-bold <?php echo e($dept['textColor']); ?> uppercase tracking-wider mb-1">Department Lead</p>
                                    <h4 class="text-lg font-bold text-gray-900"><?php echo e($dept['lead']); ?></h4>
                                </div>

                                <!-- Department Name -->
                                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo e($dept['name']); ?></h3>

                                <!-- Description -->
                                <p class="text-sm text-gray-600 leading-relaxed mb-4"><?php echo e($dept['description']); ?></p>

                                <!-- Decorative Line -->
                                <div class="h-1 w-16 bg-gradient-to-r <?php echo e($dept['gradient']); ?> rounded-full mx-auto"></div>
                            </div>

                            <!-- Hover Glow Effect -->
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                                <div class="absolute inset-0 bg-gradient-to-br <?php echo e($dept['gradient']); ?> opacity-5"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- CTA to Committee Page -->
            <div class="mt-16 text-center">
                <div class="inline-flex flex-col items-center gap-4 p-8 rounded-2xl bg-gradient-to-br from-white to-gray-50 border-2 border-emerald-100 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-sm font-semibold text-emerald-600">Want to learn more?</p>
                            <p class="text-lg font-bold text-gray-900">View our full committee structure</p>
                        </div>
                    </div>
                    <a href="<?php echo e(route('committee.index')); ?>" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-3 text-sm font-bold text-white shadow-lg shadow-emerald-500/30 transition hover:shadow-xl hover:shadow-emerald-500/50 hover:-translate-y-1">
                        Explore All Team Members
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
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
                            ['name' => 'Elidad TUYISENGE', 'role' => 'Chairman', 'bio' => 'Providing strategic direction and spiritual oversight, ensuring the choir remains focused on its mission of worship and excellence.', 'color' => 'emerald'],
                            ['name' => 'Kizito NSHIMIYIMANA', 'role' => 'Former Chairman', 'bio' => 'Built a strong foundation of unity and purpose, leaving a lasting legacy of faithful service and leadership.', 'color' => 'amber'],
                            ['name' => 'Aminadab Tuyisenge', 'role' => 'Former Chairman', 'bio' => 'Pioneered key initiatives that shaped the choir\'s identity and established enduring traditions of excellence.', 'color' => 'emerald'],
                            ['name' => 'Innocent IRADUKUNDA', 'role' => 'Current President', 'bio' => 'Leading day-to-day operations with dedication, coordinating all departments to achieve our collective vision.', 'color' => 'amber'],
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

    /* Roadmap Animations */
    .roadmap-item {
        opacity: 0;
        animation: fadeInScale 0.8s ease forwards;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.95) translateY(20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    /* Scroll-triggered animation support */
    @media (prefers-reduced-motion: no-preference) {
        .roadmap-item {
            opacity: 0;
        }

        .roadmap-item.visible {
            animation: fadeInScale 0.8s ease forwards;
        }
    }

    /* Timeline pulse animation */
    @keyframes timelinePulse {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.8;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Counter animation
        const counters = document.querySelectorAll('.about-counter');
        if (!('IntersectionObserver' in window) || counters.length === 0) {
            counters.forEach(counter => counter.textContent = counter.dataset.target);
        } else {
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

            const counterObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.35 });

            counters.forEach(counter => counterObserver.observe(counter));
        }

        // Roadmap items scroll animation
        const roadmapItems = document.querySelectorAll('.roadmap-item');
        if ('IntersectionObserver' in window && roadmapItems.length > 0) {
            const roadmapObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });

            roadmapItems.forEach((item, index) => {
                // Add staggered animation delay
                item.style.animationDelay = `${index * 0.1}s`;
                roadmapObserver.observe(item);
            });
        } else {
            // Fallback: make all items visible if no IntersectionObserver
            roadmapItems.forEach(item => {
                item.style.opacity = '1';
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#' || !href) return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Documents/gf-1/resources/views/about.blade.php ENDPATH**/ ?>