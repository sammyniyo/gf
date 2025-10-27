@extends('layouts.app')

@section('title', 'Our Story | God\'s Family Choir')

<style>
    /* Custom Green Scrollbar */
    /* For Webkit browsers (Chrome, Safari, Edge) */
    ::-webkit-scrollbar {
        width: 12px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f5f3;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #10b981, #059669);
        border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #059669, #047857);
    }

    /* For Firefox */
    * {
        scrollbar-width: thin;
        scrollbar-color: #10b981 #f1f5f3;
    }
</style>

@php
    use App\Http\Controllers\StoryController;
    $storyController = new StoryController();

    function getStoryImages($chapter = null) {
        $metadataFile = storage_path('app/story-images-metadata.json');

        if (!file_exists($metadataFile)) {
            return collect([]);
        }

        $metadata = json_decode(file_get_contents($metadataFile), true);

        if ($chapter) {
            $metadata = array_filter($metadata, function($item) use ($chapter) {
                return $item['chapter'] === $chapter;
            });
        }

        return collect($metadata);
    }
@endphp

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-black py-24 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-amber-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <div class="mb-8">
            <span class="inline-block px-4 py-2 bg-amber-500/20 backdrop-blur-sm text-amber-300 rounded-full text-sm font-semibold mb-6 border border-amber-400/30">
                OUR JOURNEY
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                The Story of <span class="text-amber-400">God's Family Choir</span>
            </h1>
            <p class="text-xl md:text-2xl text-emerald-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                A journey of faith, harmony, and transformation spanning over two decades of worship ministry
            </p>
        </div>

        <!-- Reading Stats -->
        <div class="flex items-center justify-center gap-8 text-emerald-200">
            <div class="flex items-center gap-2">
                <i class="fas fa-clock text-amber-400"></i>
                <span class="font-medium">8 min read</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-calendar-alt text-amber-400"></i>
                <span class="font-medium">Last updated: {{ date('M d, Y') }}</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fas fa-eye text-amber-400"></i>
                <span class="font-medium">2.3k views</span>
            </div>
        </div>
    </div>
</section>

<!-- Table of Contents -->
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <i class="fas fa-list text-emerald-600"></i>
                Table of Contents
            </h3>
            <nav class="space-y-3">
                <a href="#humble-beginnings" class="flex items-center gap-3 text-gray-600 hover:text-emerald-600 transition-colors group">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full group-hover:scale-150 transition-transform"></span>
                    <span class="font-medium">Humble Beginnings (1998-2005)</span>
                </a>
                <a href="#growth-years" class="flex items-center gap-3 text-gray-600 hover:text-emerald-600 transition-colors group">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full group-hover:scale-150 transition-transform"></span>
                    <span class="font-medium">Years of Growth (2005-2015)</span>
                </a>
                <a href="#ministry-expansion" class="flex items-center gap-3 text-gray-600 hover:text-emerald-600 transition-colors group">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full group-hover:scale-150 transition-transform"></span>
                    <span class="font-medium">Ministry Expansion (2015-2020)</span>
                </a>
                <a href="#present-day" class="flex items-center gap-3 text-gray-600 hover:text-emerald-600 transition-colors group">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full group-hover:scale-150 transition-transform"></span>
                    <span class="font-medium">Present Day & Future Vision</span>
                </a>
            </nav>
        </div>
    </div>
</section>

<!-- Story Content -->
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Story Timeline -->
        <div class="space-y-20">
            <!-- Chapter 1: Humble Beginnings -->
            <article id="humble-beginnings" class="relative">
                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    <!-- Timeline Marker -->
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            1
                        </div>
                        <div class="w-1 h-20 bg-gradient-to-b from-emerald-500 to-transparent mx-auto mt-4"></div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1">
                        <div class="mb-8">
                            <span class="inline-block px-3 py-1 bg-emerald-100 text-emerald-800 text-sm font-semibold rounded-full mb-4">
                                1998-2005
                            </span>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                                Humble Beginnings
                            </h2>
                        </div>

                        <!-- Featured Image -->
                        <div class="relative mb-8 group">
                            @php
                                $humbleImages = getStoryImages('humble-beginnings');
                                $featuredImage = $humbleImages->first();
                            @endphp
                            @if($featuredImage)
                                <img src="{{ asset('storage/' . $featuredImage['path']) }}" alt="{{ $featuredImage['title'] }}" class="w-full h-64 md:h-80 object-cover rounded-2xl shadow-xl group-hover:shadow-2xl transition-shadow duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-2xl"></div>
                                <div class="absolute bottom-4 left-4 text-white">
                                    <p class="text-sm opacity-90">{{ $featuredImage['title'] }}</p>
                                </div>
                            @else
                                <img src="{{ asset('images/gf-2.jpg') }}" alt="Early days of God's Family Choir" class="w-full h-64 md:h-80 object-cover rounded-2xl shadow-xl group-hover:shadow-2xl transition-shadow duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-2xl"></div>
                                <div class="absolute bottom-4 left-4 text-white">
                                    <p class="text-sm opacity-90">The founding members in 1998</p>
                                </div>
                            @endif
                        </div>

                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                It all began in the heart of ASA UR Nyarugenge, where a small group of devoted Seventh-day Adventist believers felt called to use their voices in service to God. What started as a simple gathering of 12 passionate individuals has grown into a ministry that has touched thousands of lives.
                            </p>

                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                In those early days, we met in a modest church hall, armed with nothing but our faith and a few hymnals. The vision was simple yet profound: to create a space where worship wasn't just about singing, but about experiencing God's presence in a tangible way.
                            </p>

                            <!-- Quote Box -->
                            <blockquote class="bg-gradient-to-r from-emerald-50 to-amber-50 border-l-4 border-emerald-500 p-6 rounded-r-xl my-8">
                                <p class="text-gray-800 text-lg italic mb-4">
                                    "We didn't have the best equipment or the largest venue, but we had something more powerful - unity of purpose and hearts committed to glorifying God through music."
                                </p>
                                <cite class="text-emerald-600 font-semibold">— Pastor Samuel, Founding Director</cite>
                            </blockquote>

                            <p class="text-gray-700 text-lg leading-relaxed">
                                The early years were marked by dedication, sacrifice, and a deep commitment to excellence in worship. Each rehearsal was more than practice; it was a spiritual experience that prepared us not just for performances, but for ministry.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Chapter 2: Years of Growth -->
            <article id="growth-years" class="relative">
                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    <!-- Timeline Marker -->
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            2
                        </div>
                        <div class="w-1 h-20 bg-gradient-to-b from-amber-500 to-transparent mx-auto mt-4"></div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1">
                        <div class="mb-8">
                            <span class="inline-block px-3 py-1 bg-amber-100 text-amber-800 text-sm font-semibold rounded-full mb-4">
                                2005-2015
                            </span>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                                Years of Growth
                            </h2>
                        </div>

                        <!-- Image Gallery -->
                        @php
                            $growthImages = getStoryImages('growth-years')->take(2);
                        @endphp
                        @if($growthImages->count() > 0)
                            <div class="grid md:grid-cols-2 gap-6 mb-8">
                                @foreach($growthImages as $image)
                                    <div class="relative group">
                                        <img src="{{ asset('storage/' . $image['path']) }}" alt="{{ $image['title'] }}" class="w-full h-48 object-cover rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl"></div>
                                        <div class="absolute bottom-3 left-3 text-white text-sm">
                                            <i class="fas fa-camera mr-1"></i>
                                            {{ $image['title'] }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="grid md:grid-cols-2 gap-6 mb-8">
                                <div class="relative group">
                                    <img src="{{ asset('images/1.jpg') }}" alt="Choir performance" class="w-full h-48 object-cover rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl"></div>
                                    <div class="absolute bottom-3 left-3 text-white text-sm">
                                        <i class="fas fa-camera mr-1"></i>
                                        Performance at Kigali Convention
                                    </div>
                                </div>
                                <div class="relative group">
                                    <img src="{{ asset('images/2.jpg') }}" alt="Community outreach" class="w-full h-48 object-cover rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-xl"></div>
                                    <div class="absolute bottom-3 left-3 text-white text-sm">
                                        <i class="fas fa-heart mr-1"></i>
                                        Community Outreach Program
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                The decade from 2005 to 2015 marked a period of remarkable expansion. Our membership grew from 12 to over 50 dedicated members, and our ministry extended far beyond the walls of our church.
                            </p>

                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                We began to receive invitations to perform at Seventh-day Adventist conferences, community events, and even international gatherings. Each opportunity was seen as a divine appointment to share the gospel through music.
                            </p>

                            <!-- Stats Box -->
                            <div class="bg-gradient-to-r from-emerald-600 to-amber-600 rounded-2xl p-8 text-white mb-8">
                                <h3 class="text-2xl font-bold mb-6 text-center">Milestones Achieved</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                                    <div>
                                        <div class="text-3xl font-bold mb-2">50+</div>
                                        <div class="text-sm opacity-90">Active Members</div>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold mb-2">200+</div>
                                        <div class="text-sm opacity-90">Performances</div>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold mb-2">15+</div>
                                        <div class="text-sm opacity-90">Cities Visited</div>
                                    </div>
                                    <div>
                                        <div class="text-3xl font-bold mb-2">5</div>
                                        <div class="text-sm opacity-90">Awards Won</div>
                                    </div>
                                </div>
                            </div>

                            <p class="text-gray-700 text-lg leading-relaxed">
                                This period also saw the establishment of our youth training program, where experienced members mentored younger singers, ensuring the continuity and growth of our ministry for future generations.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Chapter 3: Ministry Expansion -->
            <article id="ministry-expansion" class="relative">
                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    <!-- Timeline Marker -->
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            3
                        </div>
                        <div class="w-1 h-20 bg-gradient-to-b from-blue-500 to-transparent mx-auto mt-4"></div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1">
                        <div class="mb-8">
                            <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 text-sm font-semibold rounded-full mb-4">
                                2015-2020
                            </span>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                                Ministry Expansion
                            </h2>
                        </div>

                        <!-- Video/Media Placeholder -->
                        <div class="relative mb-8 group">
                            <div class="w-full h-64 md:h-80 bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl">
                                <div class="text-center text-white">
                                    <i class="fas fa-play-circle text-6xl mb-4 opacity-80"></i>
                                    <p class="text-lg">Watch: Our Journey Documentary</p>
                                    <p class="text-sm opacity-75 mt-2">Coming Soon</p>
                                </div>
                            </div>
                        </div>

                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                The years 2015-2020 represented a season of digital transformation and expanded reach. We embraced technology to share our ministry with a global audience, while maintaining our commitment to authentic, spirit-filled worship.
                            </p>

                            <!-- Timeline Events -->
                            <div class="space-y-6 mb-8">
                                <div class="flex gap-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">2017</div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-1">First International Tour</h4>
                                        <p class="text-gray-600">Performed in Kenya and Uganda, reaching 10,000+ people</p>
                                    </div>
                                </div>
                                <div class="flex gap-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">2018</div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-1">Digital Ministry Launch</h4>
                                        <p class="text-gray-600">Started online streaming and social media presence</p>
                                    </div>
                                </div>
                                <div class="flex gap-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">2019</div>
                                    <div>
                                        <h4 class="font-bold text-gray-900 mb-1">Recording Studio Established</h4>
                                        <p class="text-gray-600">Began producing original worship music</p>
                                    </div>
                                </div>
                            </div>

                            <p class="text-gray-700 text-lg leading-relaxed">
                                This era also marked the beginning of our community outreach programs, where we used music as a tool for healing, hope, and social transformation in underserved communities across Rwanda.
                            </p>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Chapter 4: Present Day -->
            <article id="present-day" class="relative">
                <div class="flex flex-col lg:flex-row gap-12 items-start">
                    <!-- Timeline Marker -->
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            4
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex-1">
                        <div class="mb-8">
                            <span class="inline-block px-3 py-1 bg-purple-100 text-purple-800 text-sm font-semibold rounded-full mb-4">
                                2020-Present
                            </span>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                                Present Day & Future Vision
                            </h2>
                        </div>

                        <!-- Current Stats -->
                        <div class="grid md:grid-cols-3 gap-6 mb-8">
                            <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                                <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                                <div class="text-3xl font-bold text-emerald-600 mb-2">60+</div>
                                <div class="text-gray-600 font-medium">Active Members</div>
                            </div>
                            <div class="text-center p-6 bg-amber-50 rounded-2xl">
                                <div class="w-16 h-16 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-globe text-white text-xl"></i>
                                </div>
                                <div class="text-3xl font-bold text-amber-600 mb-2">25+</div>
                                <div class="text-gray-600 font-medium">Countries Reached</div>
                            </div>
                            <div class="text-center p-6 bg-blue-50 rounded-2xl">
                                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-heart text-white text-xl"></i>
                                </div>
                                <div class="text-3xl font-bold text-blue-600 mb-2">500+</div>
                                <div class="text-gray-600 font-medium">Lives Touched</div>
                            </div>
                        </div>

                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700 text-lg leading-relaxed mb-6">
                                Today, God's Family Choir stands as a testament to what God can accomplish through willing hearts and dedicated service. We continue to evolve, embracing new technologies while staying true to our foundational mission of worship excellence.
                            </p>

                            <!-- Future Vision Box -->
                            <div class="bg-gradient-to-r from-purple-600 to-emerald-600 rounded-2xl p-8 text-white mb-8">
                                <h3 class="text-2xl font-bold mb-4">
                                    <i class="fas fa-telescope mr-3"></i>
                                    Our Vision for the Future
                                </h3>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-emerald-300 mt-1"></i>
                                        <span>Establish a music academy to train the next generation</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-emerald-300 mt-1"></i>
                                        <span>Expand our reach to every continent through digital ministry</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-emerald-300 mt-1"></i>
                                        <span>Create original worship resources for Seventh-day Adventist churches worldwide</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <i class="fas fa-check-circle text-emerald-300 mt-1"></i>
                                        <span>Build partnerships with other Adventist ministries globally</span>
                                    </li>
                                </ul>
                            </div>

                            <p class="text-gray-700 text-lg leading-relaxed">
                                As we look forward, our prayer is that God's Family Choir will continue to be a vessel of His grace, touching hearts and transforming lives through the power of worship for many generations to come.
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-gradient-to-br from-emerald-900 via-emerald-800 to-black py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
            Be Part of Our Continuing Story
        </h2>
        <p class="text-xl text-emerald-100 mb-8 max-w-2xl mx-auto">
            Whether you want to join our choir, support our ministry, or simply be part of our community, there's a place for you in God's Family.
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
            <a href="{{ route('choir.register.form') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-amber-400 to-amber-500 text-emerald-950 font-bold rounded-xl hover:shadow-xl hover:shadow-amber-500/50 transition-all duration-300 transform hover:-translate-y-2">
                <i class="fas fa-music"></i>
                Join the Choir
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-bold rounded-xl border-2 border-white/30 hover:bg-white/20 hover:border-white/50 transition-all duration-300 transform hover:-translate-y-2">
                <i class="fas fa-envelope"></i>
                Get in Touch
            </a>
        </div>
    </div>
</section>

<!-- Social Share -->
<section class="bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                Share Our Story
            </h3>
            <div class="flex items-center justify-center gap-4">
                <button onclick="shareOnSocial('facebook')" class="group flex items-center gap-3 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </button>
                <button onclick="shareOnSocial('twitter')" class="group flex items-center gap-3 px-6 py-3 bg-sky-500 text-white rounded-xl hover:bg-sky-600 transition-colors">
                    <i class="fab fa-twitter"></i>
                    <span>Twitter</span>
                </button>
                <button onclick="shareOnSocial('linkedin')" class="group flex items-center gap-3 px-6 py-3 bg-blue-700 text-white rounded-xl hover:bg-blue-800 transition-colors">
                    <i class="fab fa-linkedin-in"></i>
                    <span>LinkedIn</span>
                </button>
                <button onclick="copyLink()" class="group flex items-center gap-3 px-6 py-3 bg-gray-600 text-white rounded-xl hover:bg-gray-700 transition-colors">
                    <i class="fas fa-link"></i>
                    <span>Copy Link</span>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
function shareOnSocial(platform) {
    const url = window.location.href;
    const title = document.title;

    let shareUrl = '';
    switch(platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`;
            break;
        case 'linkedin':
            shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
            break;
    }

    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link copied to clipboard!');
    });
}

// Smooth scrolling for table of contents
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Reading progress indicator
window.addEventListener('scroll', function() {
    const article = document.querySelector('article');
    if (article) {
        const articleHeight = article.offsetHeight;
        const articleTop = article.offsetTop;
        const windowHeight = window.innerHeight;
        const scrollTop = window.pageYOffset;

        const progress = Math.min(100, Math.max(0, (scrollTop - articleTop + windowHeight) / articleHeight * 100));

        // Update progress indicator if it exists
        const progressBar = document.querySelector('.reading-progress');
        if (progressBar) {
            progressBar.style.width = progress + '%';
        }
    }
});
</script>

<!-- Reading Progress Bar -->
<div class="fixed top-0 left-0 w-full h-1 bg-gray-200 z-50">
    <div class="reading-progress h-full bg-gradient-to-r from-emerald-500 to-amber-500 transition-all duration-300" style="width: 0%"></div>
</div>
@endsection
