@extends('layouts.app')

@section('title', "About Us | God's Family Choir")

@section('meta_description', "Learn about God's Family Choir, a vibrant worship ministry with over 300 members serving the words of life to the world through gospel messages. Founded in 1998, we blend contemporary expression with timeless truth.")
@section('meta_keywords', "God's Family Choir, About Us, Worship Ministry, Gospel Music, Seventh-day Adventist, Kigali, Rwanda, Choir History, ASA UR Nyarugenge")
@section('canonical_url', route('about'))
@section('og:title', "About Us | God's Family Choir")
@section('og:description', "Learn about God's Family Choir, a vibrant worship ministry with over 300 members serving the words of life to the world through gospel messages.")
@section('og:url', route('about'))

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="hidden md:block absolute -top-32 -left-20 h-72 w-72 rounded-full bg-emerald-200/40 blur-3xl animate-pulse"></div>
    <div class="hidden md:block absolute bottom-0 right-[-10rem] h-80 w-80 rounded-full bg-amber-200/50 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    <div class="hidden md:block absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full bg-gradient-to-r from-emerald-100/20 to-amber-100/20 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-4 pt-28 pb-20 sm:px-8 lg:px-12 sm:pt-32 sm:pb-36">
        <div class="mx-auto max-w-6xl">
            <div class="flex flex-col gap-10 lg:gap-12 lg:flex-row lg:items-center">
                <div class="flex-1 space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100/80 backdrop-blur-sm px-5 py-2 text-xs font-bold uppercase tracking-[0.32em] text-emerald-700 shadow-lg border border-emerald-200/50">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Our Story
                    </span>
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900 leading-[1.1]">
                        One family, one sound, one <span class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-600 bg-clip-text text-transparent animate-gradient-x">mission</span>
                    </h1>
                    <p class="max-w-2xl text-base sm:text-lg text-gray-700 leading-[1.8]">
                        God's Family Choir emerged from a fellowship of Seventh-day Adventist students at Kigali Health Institute (KHI) and Kigali Institute of Science and Technology (KIST). What began as ASA KIST–KHI Choir in 1998 has grown into a vibrant family of over 300 worshippers, musicians, and storytellers whose voices unite to create transformative moments that draw hearts closer to Christ.
                    </p>
                    <p class="max-w-2xl text-base sm:text-lg text-gray-700 leading-[1.8]">
                        For over two decades, we have beautifully blended contemporary expression with timeless truth, serving the words of life to the world through gospel messages.
                    </p>
                    <div class="pt-2">
                        <a href="#journey" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-7 py-3 text-sm font-bold text-white shadow-xl shadow-emerald-500/30 transition-all duration-300 hover:shadow-2xl hover:shadow-emerald-500/40 hover:-translate-y-1 hover:scale-105">
                            Explore our journey
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex-1 lg:pl-12">
                    @php
                        // Configure hero stacked images (can add more images to each array)
                        $heroBackImages = ['3.jpg'];
                        $heroMiddleImages = ['gf-2.jpg'];
                        $heroFrontImages = ['1.jpg'];
                    @endphp

                    <!-- Mobile: Simple hero image to avoid overlap -->
                    <div class="block lg:hidden mb-8">
                        <div class="rounded-2xl overflow-hidden shadow-xl border-4 border-white">
                            <div class="relative hero-stack-slider" data-interval="5000">
                                @foreach($heroFrontImages as $i => $img)
                                    <img src="{{ asset('images/' . $img) }}" alt="God's Family Choir" class="w-full h-80 object-cover hero-stack-slide {{ $i === 0 ? '' : 'hidden' }}" />
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Desktop: Enhanced Stacked Images Effect -->
                    <div class="relative mx-auto max-w-md h-[450px] mb-8 lg:mb-0 hidden lg:block">
                        <!-- Image 3 - Back (furthest) -->
                        <div class="absolute top-8 left-8 w-56 h-72 rounded-2xl overflow-hidden shadow-lg transform rotate-6 transition-all duration-500 hover:rotate-12 hover:scale-105 group" style="z-index: 1;">
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/30 via-transparent to-transparent"></div>
                            <div class="relative h-full w-full hero-stack-slider" data-interval="6000">
                                @foreach($heroBackImages as $i => $img)
                                    <img src="{{ asset('images/' . $img) }}" alt="God's Family Choir - Early Years" class="h-full w-full object-cover hero-stack-slide {{ $i === 0 ? '' : 'hidden' }} transition-transform duration-700 group-hover:scale-110" />
                                @endforeach
                            </div>
                        </div>

                        <!-- Image 2 - Middle -->
                        <div class="absolute top-4 right-8 w-56 h-72 rounded-2xl overflow-hidden shadow-xl transform -rotate-3 transition-all duration-500 hover:-rotate-6 hover:scale-105 group" style="z-index: 2;">
                            <div class="absolute inset-0 bg-gradient-to-t from-amber-900/30 via-transparent to-transparent"></div>
                            <div class="relative h-full w-full hero-stack-slider" data-interval="6000">
                                @foreach($heroMiddleImages as $i => $img)
                                    <img src="{{ asset('images/' . $img) }}" alt="God's Family Choir - Performance" class="h-full w-full object-cover hero-stack-slide {{ $i === 0 ? '' : 'hidden' }} transition-transform duration-700 group-hover:scale-110" />
                                @endforeach
                            </div>
                        </div>

                        <!-- Image 1 - Front (Main) -->
                        <div class="absolute top-12 left-1/2 -translate-x-1/2 w-64 h-80 rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-500 hover:scale-105 border-4 border-white group" style="z-index: 3;">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 via-transparent to-transparent"></div>
                            <div class="relative h-full w-full hero-stack-slider" data-interval="6000">
                                @foreach($heroFrontImages as $i => $img)
                                    <img src="{{ asset('images/' . $img) }}" alt="God's Family Choir - Main" class="h-full w-full object-cover hero-stack-slide {{ $i === 0 ? '' : 'hidden' }} transition-transform duration-700 group-hover:scale-110" />
                                @endforeach
                            </div>
                            <!-- Enhanced Badge Overlay -->
                            <div class="absolute top-4 left-4 right-4 rounded-xl bg-white/95 backdrop-blur-md p-4 shadow-2xl border border-emerald-100/50" style="z-index: 10;">
                                <div class="flex items-center gap-2 mb-1">
                                    <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-xs font-black uppercase tracking-wider text-emerald-600">Since 1998</p>
                                </div>
                                <p class="text-sm font-bold text-gray-900 leading-tight">Voices raised in worship, hearts anchored in purpose.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Timeline Section -->
    <section id="journey" class="relative z-10 px-4 py-20 sm:px-8 lg:px-12 sm:py-32 bg-gradient-to-b from-white via-emerald-50/20 to-white">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-14 sm:mb-20">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Our Journey
                </span>
                <h2 class="mt-6 text-3xl sm:text-5xl lg:text-6xl font-bold text-gray-900">
                    Our <span class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-600 bg-clip-text text-transparent animate-gradient-x">History Roadmap</span>
                </h2>
                <p class="mt-6 max-w-3xl mx-auto text-base sm:text-xl text-gray-600 leading-relaxed font-medium">
                    From humble beginnings as a small group of Adventist students gathering for Sabbath worship to a thriving family of over 300 members, our journey has been marked by God's faithfulness and the dedication of countless voices united in worship. Each milestone represents a step forward in our mission to serve the words of life to the world through gospel messages.
                </p>
                    </div>

            <!-- Enhanced Timeline Roadmap -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 top-0 bottom-0 w-1.5 bg-gradient-to-b from-emerald-200 via-emerald-400 to-emerald-200 transform -translate-x-1/2 hidden lg:block shadow-lg"></div>

                <div class="space-y-12 sm:space-y-16 lg:space-y-20">
                    @php
                        $roadmapMilestones = [
                            [
                                'year' => '1998',
                                'title' => 'The Beginning',
                                'description' => 'God\'s Family Choir was born when Adventist students from Kigali Health Institute (KHI) and Kigali Institute of Science and Technology (KIST) began organizing small spiritual activities. As their fellowship grew, they realized the need for a choir to lead Sabbath worship services. The group was officially recognized as the Adventist Students Association (ASA KIST–KHI), and their choir naturally adopted the same name.',
                                'image' => 'gf-beg.jpg',
                                'position' => 'left',
                                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'
                            ],
                            [
                                'year' => '2000',
                                'title' => 'A Name That Defines Us',
                                'description' => 'The members decided to give the choir a more meaningful and distinctive name. From that moment, it became known as God\'s Family Choir—a name that soon extended to the entire association, which affectionately came to be called "God\'s Family." This name reflects our core identity: we are truly a family united in worship and service.',
                                'image' => 'gf-be2.jpg',
                                'position' => 'right',
                                'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                            ],
                            [
                                'year' => '2013',
                                'title' => 'First Album Released',
                                'description' => 'We released our first audio album accompanied by DVD 1, marking a significant milestone in our musical journey. What began with just a few voices singing songs from other groups had evolved into a choir creating its own musical expressions of worship. This album established our commitment to excellence in recording and sharing the gospel through music.',
                                'image' => 'gf-be23.png',
                                'position' => 'left',
                                'icon' => 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3'
                            ],
                            [
                                'year' => '2014',
                                'title' => 'First Evangelistic Campaign',
                                'description' => 'We organized and conducted our first public evangelistic campaign in Kibungo. This marked the beginning of our commitment to evangelism beyond music. The campaign brought many souls to Christ and strengthened our dedication to spreading the gospel through both song and direct evangelistic service.',
                                'image' => 'kibungo-camp.jpg',
                                'position' => 'right',
                                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 002 2h2.945M15 11a3 3 0 11-6 0m5.945 2H18a2 2 0 012 2v1a2 2 0 01-2 2h-2.945M15 11a3 3 0 11-6 0m-4.055 2H6a2 2 0 00-2 2v1a2 2 0 002 2h2.945M9 11a3 3 0 11-6 0m12 0a3 3 0 11-6 0'
                            ],
                            [
                                'year' => '2015',
                                'title' => 'Second Evangelistic Campaign',
                                'description' => 'We conducted our second evangelistic campaign in Nyabisindu, continuing our mission to reach souls for Christ across different regions of Rwanda. Each campaign deepens our conviction that music and evangelism work hand in hand to transform lives and bring people into God\'s family.',
                                'image' => 'amavuna.jpeg',
                                'position' => 'left',
                                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 002 2h2.945M15 11a3 3 0 11-6 0m5.945 2H18a2 2 0 012 2v1a2 2 0 01-2 2h-2.945M15 11a3 3 0 11-6 0m-4.055 2H6a2 2 0 00-2 2v1a2 2 0 002 2h2.945M9 11a3 3 0 11-6 0m12 0a3 3 0 11-6 0'
                            ],
                            [
                                'year' => '2017',
                                'title' => 'Second Album Released',
                                'description' => 'We released our second audio album, continuing to grow musically and spiritually. With each project, we refine our sound and deepen our commitment to creating music that touches hearts and points people to Christ. Our musical journey reflects our spiritual growth as a family.',
                                'image' => 'album-2-2017.jpg',
                                'position' => 'right',
                                'icon' => 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3'
                            ],
                            [
                                'year' => '2019',
                                'title' => 'Third Album & Third Campaign',
                                'description' => 'A remarkable year as we released our third audio album accompanied by DVD 2, and conducted our third evangelistic campaign in Nyacyonga. This dual achievement demonstrated our balanced commitment to both musical excellence and evangelistic service. We continue to see lives transformed through the power of worship and the gospel message.',
                                'image' => 'album-3-2019.jpg',
                                'position' => 'left',
                                'icon' => 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3'
                            ],
                            [
                                'year' => '2023',
                                'title' => 'Fourth Album Released',
                                'description' => 'We released our fourth audio album accompanied by DVD 3, marking another milestone in our musical journey. Through these projects, we have grown from singing songs from other groups to creating our own expressions of worship. We are now preparing for our fifth album and DVD 4, continuing to build on this legacy.',
                                'image' => 'gf-2025.jpg',
                                'position' => 'right',
                                'icon' => 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3'
                            ],
                            [
                                'year' => '2025',
                                'title' => 'Continuing the Legacy',
                                'description' => 'Today, we stand strong with over 300 members, including alumni, current students, and God\'s Family Juniors—children of choir members who form their own junior choir to ensure continuity. Our mission remains unchanged: "A family to serve the words of life to the world through gospel messages." We continue to prepare our fifth album and DVD 4, building on the foundation laid by our founding members.',
                                'image' => 'gf-new.jpg',
                                'position' => 'left',
                                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'
                            ],
                        ];
                    @endphp

                    @foreach($roadmapMilestones as $index => $milestone)
                        <div class="relative">
                            <!-- Desktop Timeline Item -->
                            <div class="hidden lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                                @if($milestone['position'] === 'left')
                                    <!-- Content Left -->
                                    <div class="text-right space-y-5 roadmap-item" data-aos="fade-right">
                                        <div class="inline-block">
                                            <span class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black text-2xl shadow-2xl border-4 border-white">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $milestone['icon'] }}" />
                                                </svg>
                                                {{ $milestone['year'] }}
                                            </span>
                                        </div>
                                        <h3 class="text-3xl font-black text-gray-900 leading-tight">{{ $milestone['title'] }}</h3>
                                        <p class="text-gray-600 leading-relaxed text-base font-medium">{{ $milestone['description'] }}</p>
                                    </div>
                                    <!-- Image Right -->
                                    <div class="roadmap-item" data-aos="fade-left">
                                        <div class="relative group">
                                            <div class="absolute -inset-2 bg-gradient-to-r from-amber-600 to-emerald-600 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                                            @php $images = $milestone['images'] ?? [$milestone['image']]; @endphp
                                            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white milestone-slider" data-interval="6000">
                                                @foreach($images as $i => $img)
                                                    <img src="{{ asset('images/' . $img) }}" alt="{{ $milestone['title'] }}" class="w-full h-64 object-cover milestone-slide {{ $i === 0 ? '' : 'hidden' }}" />
                                                @endforeach
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                                                @if(count($images) > 1)
                                                    <button type="button" class="milestone-prev absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-700 rounded-full w-8 h-8 flex items-center justify-center shadow"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg></button>
                                                    <button type="button" class="milestone-next absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-700 rounded-full w-8 h-8 flex items-center justify-center shadow"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Image Left -->
                                    <div class="roadmap-item" data-aos="fade-right">
                                        <div class="relative group">
                                            <div class="absolute -inset-2 bg-gradient-to-r from-amber-600 to-emerald-600 rounded-3xl blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                                            @php $images = $milestone['images'] ?? [$milestone['image']]; @endphp
                                            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white milestone-slider" data-interval="6000">
                                                @foreach($images as $i => $img)
                                                    <img src="{{ asset('images/' . $img) }}" alt="{{ $milestone['title'] }}" class="w-full h-64 object-cover milestone-slide {{ $i === 0 ? '' : 'hidden' }}" />
                                                @endforeach
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                                                @if(count($images) > 1)
                                                    <button type="button" class="milestone-prev absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-700 rounded-full w-8 h-8 flex items-center justify-center shadow"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg></button>
                                                    <button type="button" class="milestone-next absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-gray-700 rounded-full w-8 h-8 flex items-center justify-center shadow"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Content Right -->
                                    <div class="text-left space-y-5 roadmap-item" data-aos="fade-left">
                                        <div class="inline-block">
                                            <span class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 text-white font-black text-2xl shadow-2xl border-4 border-white">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $milestone['icon'] }}" />
                                                </svg>
                                                {{ $milestone['year'] }}
                                            </span>
                                        </div>
                                        <h3 class="text-3xl font-black text-gray-900 leading-tight">{{ $milestone['title'] }}</h3>
                                        <p class="text-gray-600 leading-relaxed text-base font-medium">{{ $milestone['description'] }}</p>
                                </div>
                                @endif
                            </div>

                            <!-- Mobile Timeline Item -->
                            <div class="lg:hidden roadmap-item" data-aos="fade-up">
                                <div class="relative pl-10 border-l-4 border-emerald-400">
                                    <div class="absolute -left-5 top-0 w-10 h-10 rounded-full bg-gradient-to-br from-emerald-600 to-emerald-700 border-4 border-white shadow-2xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $milestone['icon'] }}" />
                                        </svg>
                                    </div>
                                    <div class="space-y-4 pb-8">
                                        <span class="inline-flex items-center justify-center gap-2 px-5 py-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-black text-lg shadow-xl">
                                            {{ $milestone['year'] }}
                                        </span>
                                        <h3 class="text-2xl font-black text-gray-900">{{ $milestone['title'] }}</h3>
                                        <div class="relative group">
                                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-amber-600 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-300"></div>
                                            <div class="relative rounded-2xl overflow-hidden shadow-xl">
                                                <img src="{{ asset('images/' . $milestone['image']) }}" alt="{{ $milestone['title'] }}" class="w-full h-64 object-cover" />
                                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-transparent to-transparent"></div>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 leading-relaxed font-medium">{{ $milestone['description'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Timeline Dot for Desktop -->
                            <div class="hidden lg:block absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-600 to-emerald-700 border-4 border-white shadow-2xl animate-pulse flex items-center justify-center">
                                    <div class="w-3 h-3 rounded-full bg-white"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- GF Juniors Section -->
    <section class="relative z-10 px-4 py-20 sm:px-8 lg:px-12 sm:py-32 bg-gradient-to-br from-amber-50/40 via-white to-emerald-50/30">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-10 lg:gap-12 lg:grid-cols-2 lg:items-center">
                <!-- Image Section -->
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative">
                        <div class="absolute -inset-6 bg-gradient-to-r from-amber-400 via-emerald-400 to-amber-400 rounded-3xl blur-3xl opacity-30 animate-pulse"></div>
                        <div class="relative">
                            <div class="rounded-3xl overflow-hidden shadow-2xl border-8 border-white">
                                <img src="{{ asset('images/choir_of_god_1761667510314.jpeg') }}" alt="GF Juniors - Young Worshippers" class="w-full h-[340px] sm:h-[500px] lg:h-[550px] object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent"></div>
                                <!-- Enhanced Floating Badge -->
                                <div class="absolute bottom-8 left-8 right-8 rounded-2xl bg-white/97 backdrop-blur-md p-6 shadow-2xl border-2 border-amber-100">
                                    <div class="flex items-center gap-4">
                                        <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center text-white shadow-2xl">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-wider text-amber-600 mb-1">Since 2012</p>
                                            <p class="text-xl font-black text-gray-900 leading-tight">Raising the next generation of worshippers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Decorative Elements -->
                            <div class="hidden md:block absolute -top-8 -right-8 w-40 h-40 bg-amber-200/50 rounded-full blur-3xl"></div>
                            <div class="hidden md:block absolute -bottom-8 -left-8 w-48 h-48 bg-emerald-200/50 rounded-full blur-3xl"></div>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="order-1 lg:order-2 space-y-6" data-aos="fade-left">
                    <div class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-6 py-2.5 text-xs font-black uppercase tracking-wide text-white shadow-xl">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Featured Department
                    </div>

                    <h2 class="text-3xl sm:text-5xl lg:text-6xl font-black text-gray-900 leading-tight">
                        GF <span class="bg-gradient-to-r from-amber-600 via-amber-500 to-amber-600 bg-clip-text text-transparent animate-gradient-x">Juniors</span>
                    </h2>

                    <p class="text-lg sm:text-2xl text-gray-700 leading-relaxed font-bold">
                        Nurturing young hearts to worship with passion and purpose
                    </p>

                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed font-medium">
                        GF Juniors is the junior choir formed by children of choir members, ensuring the continuity of this ministry across generations. It's more than a youth choir—it's a family where young worshippers discover their God-given talents, build lifelong friendships, and develop a deep relationship with Christ. Through weekly rehearsals, mentorship programs, and performance opportunities, we're shaping the next generation of worship leaders who will carry the torch forward.
                    </p>

                    <!-- Enhanced Features List -->
                    <div class="space-y-4 pt-4">
                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border-2 border-amber-200 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 group">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-black text-gray-900 text-lg mb-1">Vocal Training & Music Theory</h4>
                                <p class="text-sm text-gray-600 leading-relaxed font-medium">Professional coaching in singing, harmonization, and musical fundamentals taught by experienced instructors</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border-2 border-emerald-200 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 group">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center text-white shadow-xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-black text-gray-900 text-lg mb-1">Spiritual Mentorship</h4>
                                <p class="text-sm text-gray-600 leading-relaxed font-medium">Guidance from experienced leaders who invest in character development and spiritual growth</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 p-5 rounded-2xl bg-white border-2 border-amber-200 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 group">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center text-white shadow-xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-black text-gray-900 text-lg mb-1">Performance Opportunities</h4>
                                <p class="text-sm text-gray-600 leading-relaxed font-medium">Regular chances to minister at events, church services, and community outreaches</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="pt-6">
                        <a href="{{ route('choir.register.form') }}" class="inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-8 py-4 text-sm sm:text-base font-black text-white shadow-2xl shadow-amber-500/40 transition-all duration-300 hover:shadow-3xl hover:shadow-amber-500/50 hover:-translate-y-1 hover:scale-105">
                            Join GF Juniors Today
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="relative z-10 px-4 py-20 sm:px-8 lg:px-12 sm:py-32">
        <div class="mx-auto max-w-6xl">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-6 py-2 text-xs font-black uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                    </svg>
                    Purpose & Values
                </span>
                <h2 class="mt-6 text-3xl sm:text-5xl lg:text-6xl font-black text-gray-900">
                    Why we sing and how we <span class="bg-gradient-to-r from-amber-600 via-amber-500 to-amber-600 bg-clip-text text-transparent animate-gradient-x">live it out</span>
                </h2>
                <p class="mt-6 max-w-3xl mx-auto text-base sm:text-xl text-gray-600 leading-relaxed font-medium">
                    Our ministry flows from a clear identity. We pursue the presence of God, honor excellence, and cultivate a culture of discipleship and service on and off stage. These core values shape everything we do.
                </p>
            </div>

            <div class="mt-12 sm:mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @php
                    $values = [
                        ['icon' => '✨', 'title' => 'Pure Worship', 'body' => 'We create environments where people encounter Jesus, beyond performances and playlists. Every song is a prayer, every note a declaration of God\'s goodness.', 'color' => 'emerald'],
                        ['icon' => '🤍', 'title' => 'Family Culture', 'body' => 'Accountability, mentorship, and shared meals keep us grounded in authentic relationship. We\'re not just a choir—we\'re a family committed to each other\'s growth.', 'color' => 'amber'],
                        ['icon' => '🎓', 'title' => 'Continuous Growth', 'body' => 'Workshops, vocal coaching, and spiritual retreats keep our gifts sharp and hearts aligned. We believe in investing in both talent and character.', 'color' => 'emerald'],
                        ['icon' => '🌍', 'title' => 'Community Impact', 'body' => 'Outreaches, prison visits, and scholarship drives extend our ministry beyond the stage. We serve because worship compels us to action.', 'color' => 'amber'],
                        ['icon' => '🎙️', 'title' => 'Creative Excellence', 'body' => 'We steward diverse musical styles while remaining rooted in biblical truth. Excellence honors God and inspires others to pursue their best.', 'color' => 'emerald'],
                        ['icon' => '🙏', 'title' => 'Prayer First', 'body' => 'Every rehearsal and event is undergirded by intentional intercession. We don\'t just sing about prayer—we pray before, during, and after everything we do.', 'color' => 'amber'],
                    ];
                @endphp
                @foreach($values as $value)
                    @php
                        $isEmerald = $value['color'] === 'emerald';
                        $borderClass = $isEmerald ? 'border-emerald-200 hover:border-emerald-400' : 'border-amber-200 hover:border-amber-400';
                        $hoverBgClass = $isEmerald ? 'from-emerald-500/0 to-emerald-600/0' : 'from-amber-500/0 to-amber-600/0';
                        $iconBgClass = $isEmerald ? 'from-emerald-100 to-emerald-50 border-emerald-200' : 'from-amber-100 to-amber-50 border-amber-200';
                        $lineClass = $isEmerald ? 'from-emerald-500 via-emerald-400 to-emerald-300' : 'from-amber-500 via-amber-400 to-amber-300';
                    @endphp
                    <div class="group relative overflow-hidden rounded-3xl border-2 {{ $borderClass }} bg-white p-8 shadow-xl transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-br {{ $hoverBgClass }} opacity-0 transition-opacity duration-500 group-hover:opacity-5"></div>
                        <div class="relative">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $iconBgClass }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 border-2">
                                <span class="text-4xl">{{ $value['icon'] }}</span>
                            </div>
                            <h3 class="mt-4 text-2xl font-black text-gray-900 mb-3">{{ $value['title'] }}</h3>
                            <p class="text-sm text-gray-600 leading-relaxed font-medium">{{ $value['body'] }}</p>
                            <div class="mt-6 h-1.5 w-16 bg-gradient-to-r {{ $lineClass }} rounded-full"></div>
                        </div>
                    </div>
                @endforeach
            </div>

               <!-- Enhanced Stats Grid -->
               <div class="mt-20 sm:mt-24 lg:mt-24 grid gap-5 rounded-3xl border border-emerald-100 bg-white p-6 sm:p-8 shadow-xl sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $stats = [
                        ['label' => 'Active Members', 'value' => 300, 'color' => 'emerald', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['label' => 'Years of Service', 'value' => 27, 'color' => 'amber', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['label' => 'Evangelistic Campaigns', 'value' => 3, 'color' => 'emerald', 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 002 2h2.945M15 11a3 3 0 11-6 0m5.945 2H18a2 2 0 012 2v1a2 2 0 01-2 2h-2.945M15 11a3 3 0 11-6 0m-4.055 2H6a2 2 0 00-2 2v1a2 2 0 002 2h2.945M9 11a3 3 0 11-6 0m12 0a3 3 0 11-6 0'],
                        ['label' => 'Audio Albums', 'value' => 4, 'color' => 'amber', 'icon' => 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3'],
                    ];
                @endphp
                @foreach($stats as $stat)
                    @php
                        $isEmerald = $stat['color'] === 'emerald';
                        $iconBgClass = $isEmerald ? 'bg-emerald-100' : 'bg-amber-100';
                        $iconColorClass = $isEmerald ? 'text-emerald-600' : 'text-amber-600';
                        $textClass = $isEmerald ? 'text-emerald-600' : 'text-amber-600';
                    @endphp
                    <div class="group text-center">
                        <div class="inline-flex w-14 h-14 {{ $iconBgClass }} rounded-2xl items-center justify-center {{ $iconColorClass }} mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stat['icon'] }}" />
                            </svg>
                        </div>
                        <p class="text-sm font-bold {{ $textClass }} uppercase tracking-wider mb-2">{{ $stat['label'] }}</p>
                        <p class="text-4xl font-extrabold text-gray-900"><span class="about-counter" data-target="{{ $stat['value'] }}">0</span>+</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Departments Section -->
    <section class="relative z-10 px-4 py-20 sm:px-8 lg:px-12 sm:py-32">
        <div class="absolute inset-0 bg-gradient-to-b from-emerald-50/40 via-white to-amber-50/30"></div>
        <div class="hidden md:block absolute -top-40 -right-40 w-96 h-96 bg-emerald-200/30 rounded-full blur-3xl"></div>
        <div class="hidden md:block absolute -bottom-40 -left-40 w-96 h-96 bg-amber-200/30 rounded-full blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl">
            <div class="text-center mb-14 sm:mb-20">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-2 text-xs font-black uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    Our Departments
                </span>
                <h2 class="mt-6 text-3xl sm:text-5xl lg:text-6xl font-black text-gray-900">
                    Departments that <span class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-amber-500 bg-clip-text text-transparent animate-gradient-x">Shape Us</span>
                </h2>
                <p class="mt-6 max-w-3xl mx-auto text-lg sm:text-xl text-gray-600 leading-relaxed font-medium">
                    Each department brings unique strengths to our ministry, working together to build disciples, nurture talent, and create excellence in worship. Our collaborative structure ensures every aspect of our mission is stewarded with care.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @php
                    $departments = [
                        [
                            'name' => 'Coaching Staff',
                            'lead' => 'DM Heureuse Uwumutima',
                            'description' => 'Developing vocal excellence and musical skills through dedicated training, workshops, and one-on-one mentorship for all choir members. We believe that technical excellence serves spiritual purpose.',
                            'image' => 'departments/heureuse.png',
                            'gradient' => 'from-blue-500 to-blue-600',
                            'bgGradient' => 'from-blue-50 to-blue-100',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'borderColor' => 'border-blue-200',
                            'textColor' => 'text-blue-600'
                        ],
                        [
                            'name' => 'Spiritual Affairs',
                            'lead' => 'Yves Iraduhumuriza',
                            'description' => 'Anchoring our ministry in prayer, Bible study, and spiritual formation—ensuring hearts stay aligned with God\'s purpose. We nurture the inner life that fuels outward expression.',
                            'image' => 'departments/yves.png',
                            'gradient' => 'from-purple-500 to-purple-600',
                            'bgGradient' => 'from-purple-50 to-purple-100',
                            'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                            'borderColor' => 'border-purple-200',
                            'textColor' => 'text-purple-600'
                        ],
                        [
                            'name' => 'Fashion & Kits',
                            'lead' => 'Olivier Nshimyumuremyi',
                            'description' => 'Designing and coordinating our visual identity with elegant, coordinated outfits that reflect professionalism and unity. We understand that presentation matters in ministry.',
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
                            'description' => 'Raising the next generation of worshippers through age-appropriate training, mentorship, and performance opportunities for young people. We invest in tomorrow\'s leaders today.',
                            'image' => 'departments/aime.png',
                            'gradient' => 'from-amber-500 to-orange-600',
                            'bgGradient' => 'from-amber-50 to-orange-100',
                            'icon' => 'M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            'borderColor' => 'border-amber-200',
                            'textColor' => 'text-amber-600'
                        ],
                        [
                            'name' => 'Disciplinary',
                            'lead' => 'Benie Solange Dusabimana',
                            'description' => 'Upholding standards of excellence, accountability, and godly conduct—creating an environment of respect and growth. Discipline is love in action.',
                            'image' => 'departments/benie.png',
                            'gradient' => 'from-slate-500 to-slate-600',
                            'bgGradient' => 'from-slate-50 to-slate-100',
                            'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'borderColor' => 'border-slate-200',
                            'textColor' => 'text-slate-600'
                        ],
                        [
                            'name' => 'Fellowship',
                            'lead' => 'Thierry Uwiringiye Hirwa',
                            'description' => 'Building authentic community through social events, team bonding, and care initiatives that make everyone feel valued and connected. We believe in doing life together.',
                            'image' => 'departments/hirwa.png',
                            'gradient' => 'from-emerald-500 to-teal-600',
                            'bgGradient' => 'from-emerald-50 to-teal-100',
                            'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                            'borderColor' => 'border-emerald-200',
                            'textColor' => 'text-emerald-600'
                        ],
                    ];
                @endphp

                @foreach($departments as $dept)
                    <div class="group relative">
                        <!-- Enhanced Card -->
                        <div class="relative h-full overflow-hidden rounded-3xl bg-white border-2 {{ $dept['borderColor'] }} shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3">
                            <!-- Top Section with Icon Background -->
                            <div class="relative h-44 overflow-hidden bg-gradient-to-br {{ $dept['bgGradient'] }}">
                                <!-- Icon Placeholder Background -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-gradient-to-br {{ $dept['gradient'] }} rounded-full blur-2xl opacity-40 animate-pulse"></div>
                                        <div class="relative w-28 h-28 bg-gradient-to-br {{ $dept['gradient'] }} rounded-full flex items-center justify-center shadow-2xl opacity-25">
                                            <svg class="w-14 h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $dept['icon'] }}" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Floating Icon Badge -->
                                <div class="absolute top-4 right-4 w-12 h-12 bg-white/95 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-xl transform group-hover:rotate-12 transition-transform duration-300 border-2 border-white">
                                    <svg class="w-6 h-6 {{ $dept['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $dept['icon'] }}" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Lead Photo Section - Fixed hover scale -->
                            <div class="relative px-6 -mt-20 mb-5 flex justify-center z-10">
                                <div class="relative transform group-hover:scale-110 transition-all duration-500 ease-out cursor-pointer">
                                    <!-- Enhanced Glow Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-br {{ $dept['gradient'] }} rounded-3xl blur-2xl opacity-50 group-hover:opacity-100 group-hover:blur-3xl transition-all duration-500"></div>

                                    <!-- Photo Container -->
                                    <div class="relative w-36 h-36 rounded-3xl overflow-hidden border-4 border-white shadow-2xl bg-gradient-to-br {{ $dept['bgGradient'] }} group-hover:shadow-[0_20px_50px_rgba(0,0,0,0.3)] group-hover:border-6 transition-all duration-500">
                                        @if(file_exists(public_path($dept['image'])))
                                            <img src="{{ asset($dept['image']) }}" alt="{{ $dept['lead'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-out" />
                                        @else
                                            <!-- Placeholder Avatar -->
                                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br {{ $dept['gradient'] }} group-hover:scale-110 transition-transform duration-500">
                                                <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Hover Hint Badge -->
                                    <div class="absolute -bottom-3 -right-3 bg-white rounded-full p-2 shadow-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 border-2 {{ $dept['borderColor'] }}">
                                        <svg class="w-5 h-5 {{ $dept['textColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="px-6 pb-8 text-center">
                                <!-- Lead Name -->
                                <div class="mb-5">
                                    <p class="text-xs font-black {{ $dept['textColor'] }} uppercase tracking-wider mb-2">Department Lead</p>
                                    <h4 class="text-xl font-black text-gray-900">{{ $dept['lead'] }}</h4>
                                </div>

                                <!-- Department Name -->
                                <h3 class="text-2xl font-black text-gray-900 mb-4">{{ $dept['name'] }}</h3>

                                <!-- Description -->
                                <p class="text-sm text-gray-600 leading-relaxed mb-5 font-medium">{{ $dept['description'] }}</p>

                                <!-- Decorative Line -->
                                <div class="h-1.5 w-20 bg-gradient-to-r {{ $dept['gradient'] }} rounded-full mx-auto"></div>
                            </div>

                            <!-- Hover Glow Effect -->
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                                <div class="absolute inset-0 bg-gradient-to-br {{ $dept['gradient'] }} opacity-5"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Enhanced CTA to Committee Page -->
            <div class="mt-16 sm:mt-20 text-center">
                <div class="inline-flex flex-col items-center gap-6 p-8 sm:p-10 rounded-3xl bg-gradient-to-br from-white via-emerald-50/50 to-white border-2 border-emerald-200 shadow-2xl max-w-2xl">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-2xl">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-sm font-bold text-emerald-600 uppercase tracking-wider mb-1">Want to learn more?</p>
                            <p class="text-2xl font-black text-gray-900">View our full committee structure</p>
                        </div>
                    </div>
                    <a href="{{ route('committee.index') }}" class="inline-flex items-center gap-3 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-3.5 text-sm sm:text-base font-black text-white shadow-xl shadow-emerald-500/40 transition-all duration-300 hover:shadow-2xl hover:shadow-emerald-500/50 hover:-translate-y-1 hover:scale-105">
                        Explore All Team Members
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Founding Members Section -->
    <section class="relative z-10 px-4 py-20 sm:px-8 lg:px-12 sm:py-32 bg-gradient-to-br from-amber-50/30 via-white to-emerald-50/30">
        <div class="mx-auto max-w-6xl">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-amber-600 to-amber-700 px-6 py-2 text-xs font-black uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                        <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                    </svg>
                    Our Foundation
                </span>
                <h2 class="mt-6 text-3xl sm:text-5xl lg:text-6xl font-black text-gray-900">
                    The <span class="bg-gradient-to-r from-amber-600 via-amber-500 to-amber-600 bg-clip-text text-transparent animate-gradient-x">Founding Pillars</span>
                </h2>
                <p class="mt-6 max-w-3xl mx-auto text-base sm:text-xl text-gray-600 leading-relaxed font-medium">
                    These individuals were among the pillars who laid the foundation of God's Family Choir. Their vision, dedication, and faith created the legacy we continue to build upon today.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $foundingMembers = [
                        ['name' => 'Nshimiyimana Kizito', 'color' => 'emerald'],
                        ['name' => 'Ntihinyuzwa Isaac', 'color' => 'amber'],
                        ['name' => 'Nzitonda Jacques', 'color' => 'emerald'],
                        ['name' => 'Munyazikwiye Bernard', 'color' => 'amber'],
                    ];
                @endphp
                @foreach($foundingMembers as $member)
                    @php
                        $isEmerald = $member['color'] === 'emerald';
                        $borderClass = $isEmerald ? 'border-emerald-200' : 'border-amber-200';
                        $decorClass = $isEmerald ? 'from-emerald-200/20' : 'from-amber-200/20';
                        $iconBgClass = $isEmerald ? 'from-emerald-500 to-emerald-600' : 'from-amber-500 to-amber-600';
                        $textClass = $isEmerald ? 'text-emerald-600' : 'text-amber-600';
                        $lineClass = $isEmerald ? 'from-emerald-500 to-emerald-300' : 'from-amber-500 to-amber-300';
                    @endphp
                    <div class="group relative overflow-hidden rounded-2xl border-2 {{ $borderClass }} bg-white p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br {{ $decorClass }} to-transparent rounded-bl-full"></div>
                        <div class="relative text-center">
                            <div class="w-20 h-20 mx-auto mb-4 bg-gradient-to-br {{ $iconBgClass }} rounded-full flex items-center justify-center text-white shadow-xl group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-black text-gray-900 mb-2">{{ $member['name'] }}</h3>
                            <p class="text-xs font-bold {{ $textClass }} uppercase tracking-wider">Founding Member</p>
                            <div class="mt-4 h-1 w-12 bg-gradient-to-r {{ $lineClass }} rounded-full mx-auto"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Leadership Section -->
    <section class="relative z-10 px-4 py-20 sm:px-8 lg:px-12 sm:py-32">
        <div class="mx-auto max-w-6xl rounded-3xl border-2 border-emerald-200 bg-white/95 backdrop-blur-sm p-8 sm:p-12 shadow-2xl">
            <div class="grid gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
                <div class="space-y-6">
                    <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-2.5 text-xs font-black uppercase tracking-wide text-white shadow-xl">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                        Meet the directors
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-black text-gray-900 leading-tight">Guided by <span class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-600 bg-clip-text text-transparent animate-gradient-x">servant leaders</span></h2>
                    <p class="text-base sm:text-lg text-gray-600 leading-relaxed font-medium">
                        Our leadership team shepherds the choir with humility and strategy, equipping every section—sopranos to band—to thrive spiritually and musically. They steward vision, develop emerging leaders, and ensure our ministry stays anchored in sound doctrine and authentic worship.
                    </p>
                    <a href="{{ route('committee.index') }}" class="inline-flex items-center gap-2 rounded-full border-2 border-emerald-300 bg-white px-7 py-3.5 text-sm font-black text-emerald-700 transition-all duration-300 hover:border-emerald-500 hover:bg-emerald-50 hover:-translate-y-1 shadow-md">
                        View leadership directory
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    @php
                        $leaders = [
                            ['name' => 'Elidad TUYISENGE', 'role' => 'Chairman', 'bio' => 'Providing strategic direction and spiritual oversight, ensuring the choir remains focused on its mission of worship and excellence.', 'color' => 'emerald'],
                            ['name' => 'Kizito NSHIMIYIMANA', 'role' => 'Former Chairman', 'bio' => 'Built a strong foundation of unity and purpose, leaving a lasting legacy of faithful service and visionary leadership.', 'color' => 'amber'],
                            ['name' => 'Aminadab Tuyisenge', 'role' => 'Former Chairman', 'bio' => 'Pioneered key initiatives that shaped the choir\'s identity and established enduring traditions of excellence and integrity.', 'color' => 'emerald'],
                            ['name' => 'Innocent IRADUKUNDA', 'role' => 'Current President', 'bio' => 'Leading day-to-day operations with dedication, coordinating all departments to achieve our collective vision with precision and heart.', 'color' => 'amber'],
                        ];
                    @endphp
                    @foreach($leaders as $leader)
                        @php
                            $isEmerald = $leader['color'] === 'emerald';
                            $borderClass = $isEmerald ? 'border-emerald-200' : 'border-amber-200';
                            $textClass = $isEmerald ? 'text-emerald-600' : 'text-amber-600';
                            $lineClass = $isEmerald ? 'from-emerald-500 to-emerald-300' : 'from-amber-500 to-amber-300';
                        @endphp
                        <div class="group rounded-2xl border-2 {{ $borderClass }} bg-white p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                            <p class="text-xl font-black text-gray-900 mb-1">{{ $leader['name'] }}</p>
                            <p class="text-sm font-black {{ $textClass }} uppercase tracking-wider mb-3">{{ $leader['role'] }}</p>
                            <p class="text-sm text-gray-600 leading-relaxed font-medium">{{ $leader['bio'] }}</p>
                            <div class="mt-4 h-1.5 w-14 bg-gradient-to-r {{ $lineClass }} rounded-full"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative z-10 px-4 pt-20 pb-24 sm:px-8 lg:px-12 sm:pt-36 sm:pb-40 bg-gradient-to-b from-white to-gray-50">
        <div class="mx-auto max-w-5xl rounded-3xl border-2 border-emerald-200 bg-white p-8 sm:p-14 text-center shadow-2xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2 text-xs font-bold uppercase tracking-wider text-white shadow-lg">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                </svg>
                Join the family
            </span>
            <h2 class="mt-6 text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-[1.2]">
                Add your voice to the <span class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-600 bg-clip-text text-transparent animate-gradient-x">story</span>
            </h2>
            <p class="mt-6 text-base sm:text-lg text-gray-600 max-w-3xl mx-auto leading-[1.8]">
                We are always listening for new voices, musicians, production minds, and intercessors who feel called to serve through worship. Wherever you are on your journey, there is room for you here. Come as you are, and let's grow together.
            </p>

            <!-- Mission Statement Box -->
            <div class="mt-10 mb-10 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-emerald-50 via-emerald-50/50 to-amber-50/30 border-2 border-emerald-200/60 max-w-2xl mx-auto">
                <p class="text-sm font-bold text-emerald-700 mb-3 uppercase tracking-wider">Our Mission Statement</p>
                <p class="text-lg sm:text-xl font-semibold text-emerald-800 italic leading-[1.6]">
                    "A family to serve the words of life to the world through gospel messages."
                </p>
            </div>

            <!-- CTA Buttons -->
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('choir.register.form') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-4 text-base font-bold text-white shadow-xl shadow-emerald-500/30 transition-all duration-300 hover:shadow-2xl hover:shadow-emerald-500/40 hover:-translate-y-1">
                    Register to audition
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                <a href="{{ route('events.index') }}" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-emerald-300 bg-white px-8 py-4 text-base font-bold text-emerald-700 transition-all duration-300 hover:border-emerald-500 hover:bg-emerald-50 hover:-translate-y-1 shadow-md">
                    Experience a live worship night
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</div>

<x-static.footer />
@endsection

@push('styles')
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

    /* Smooth hover transitions */
    @media (hover: hover) {
        .group:hover .group-hover\:scale-150 {
            transform: scale(1.5);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Enhanced Counter animation
        const counters = document.querySelectorAll('.about-counter');
        if (!('IntersectionObserver' in window) || counters.length === 0) {
            counters.forEach(counter => counter.textContent = counter.dataset.target);
        } else {
        const easeOut = (t) => 1 - Math.pow(1 - t, 3);

        const animateCounter = (counter) => {
            const target = Number(counter.dataset.target || 0);
                const duration = 2000;
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
            }, { threshold: 0.25 });

            counters.forEach(counter => counterObserver.observe(counter));
        }

        // Enhanced Roadmap items scroll animation
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

        // Enhanced smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#' || !href) return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.offsetTop - 100;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Milestone slider initialization
        const initMilestoneSlider = (container) => {
            const slides = container.querySelectorAll('.milestone-slide');
            if (!slides || slides.length <= 1) return;
            let index = 0;
            const intervalMs = Number(container.dataset.interval || 6000);

            const show = (i) => {
                slides.forEach((el, idx) => {
                    if (idx === i) {
                        el.classList.remove('hidden');
                    } else {
                        el.classList.add('hidden');
                    }
                });
                if (dots && dots.length) {
                    dots.forEach((d, di) => {
                        if (di === i) {
                            d.classList.add('bg-white');
                            d.classList.remove('bg-white/50');
                            d.classList.add('scale-125');
                        } else {
                            d.classList.remove('bg-white');
                            d.classList.add('bg-white/50');
                            d.classList.remove('scale-125');
                        }
                    });
                }
            };

            const next = () => { index = (index + 1) % slides.length; show(index); };
            const prev = () => { index = (index - 1 + slides.length) % slides.length; show(index); };

            let timer = setInterval(next, intervalMs);

            const reset = () => { clearInterval(timer); timer = setInterval(next, intervalMs); };

            const nextBtn = container.querySelector('.milestone-next');
            const prevBtn = container.querySelector('.milestone-prev');
            if (nextBtn) nextBtn.addEventListener('click', () => { next(); reset(); });
            if (prevBtn) prevBtn.addEventListener('click', () => { prev(); reset(); });

            // Pagination dots
            let dots = null;
            const dotsWrap = document.createElement('div');
            dotsWrap.className = 'absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-2 z-10';
            dots = [];
            slides.forEach((_, i) => {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'w-2.5 h-2.5 rounded-full transition transform ' + (i === 0 ? 'bg-white scale-125' : 'bg-white/50');
                dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                dot.addEventListener('click', () => { index = i; show(index); reset(); });
                dotsWrap.appendChild(dot);
                dots.push(dot);
            });
            container.appendChild(dotsWrap);

            // Pause on hover (desktop)
            container.addEventListener('mouseenter', () => clearInterval(timer));
            container.addEventListener('mouseleave', () => { reset(); });

            // Keyboard navigation
            container.setAttribute('tabindex', '0');
            container.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') { next(); reset(); }
                if (e.key === 'ArrowLeft') { prev(); reset(); }
            });

            // Touch / swipe navigation
            let startX = 0;
            let isTouching = false;
            const threshold = 40;
            const onStart = (x) => { startX = x; isTouching = true; };
            const onMove = (x) => { if (!isTouching) return; };
            const onEnd = (x) => {
                if (!isTouching) return;
                const dx = x - startX;
                if (Math.abs(dx) > threshold) {
                    if (dx < 0) { next(); } else { prev(); }
                    reset();
                }
                isTouching = false;
            };

            container.addEventListener('touchstart', (e) => onStart(e.touches[0].clientX), { passive: true });
            container.addEventListener('touchmove', (e) => onMove(e.touches[0].clientX), { passive: true });
            container.addEventListener('touchend', (e) => onEnd((e.changedTouches && e.changedTouches[0]?.clientX) || startX));
            container.addEventListener('pointerdown', (e) => onStart(e.clientX));
            container.addEventListener('pointerup', (e) => onEnd(e.clientX));
        };

        document.querySelectorAll('.milestone-slider').forEach(initMilestoneSlider);

        // Hero stacked images slider (simple autoplay)
        const initHeroStackSlider = (container) => {
            const slides = container.querySelectorAll('.hero-stack-slide');
            if (!slides || slides.length <= 1) return;
            let i = 0;
            const show = (idx) => {
                slides.forEach((el, j) => {
                    if (j === idx) el.classList.remove('hidden');
                    else el.classList.add('hidden');
                });
            };
            const intv = Number(container.dataset.interval || 6000);
            const next = () => { i = (i + 1) % slides.length; show(i); };
            let timer = setInterval(next, intv);
            container.addEventListener('mouseenter', () => clearInterval(timer));
            container.addEventListener('mouseleave', () => { timer = setInterval(next, intv); });
        };

        document.querySelectorAll('.hero-stack-slider').forEach(initHeroStackSlider);
    });
</script>
@endpush
