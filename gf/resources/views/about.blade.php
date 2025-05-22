@extends('layouts.app')
@section('content')
    <section class="bg-white text-emerald-950 pt-20 pb-28 relative overflow-hidden">
        <!-- Animated Background Waves -->
        <div class="absolute top-0 left-0 w-full h-96 bg-emerald-950 -z-10 overflow-hidden">
            <div class="absolute bottom-0 w-full h-20 bg-gradient-to-t from-emerald-900 to-transparent"></div>
            <div class="music-waves absolute bottom-0 w-full h-12 opacity-30">
                <div class="wave"></div>
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>

        <!-- Floating Musical Notes -->
        <div class="musical-notes absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
            <div class="note">♪</div>
            <div class="note">♫</div>
            <div class="note">♬</div>
            <div class="note">♩</div>
        </div>

        <!-- Page Heading with Parallax Effect -->
        <div class="parallax-header max-w-4xl mx-auto px-4 text-center mb-16">
            <h2 class="text-4xl sm:text-6xl font-extrabold text-black mb-4 transform transition duration-1000">About God's
                Family Choir</h2>
            <p class="text-xl text-emerald-500 font-light tracking-wider">Rooted in worship, united in harmony.</p>
            <div class="mt-8">
                <button
                    class="play-history-audio bg-white text-emerald-800 px-6 py-3 rounded-full font-medium hover:bg-emerald-100 transition flex items-center mx-auto gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                            clip-rule="evenodd" />
                    </svg>
                    Hear Our Story
                </button>
            </div>
        </div>

        <!-- Interactive Timeline -->
        <div class="max-w-6xl mx-auto px-4 mb-28">
            <h3 class="text-3xl font-bold text-emerald-800 mb-12 text-center">Our Sacred Timeline</h3>

            <div class="timeline relative">
                <!-- Timeline Line -->
                <div class="timeline-line absolute left-1/2 h-full w-1 bg-emerald-200 transform -translate-x-1/2"></div>

                <!-- Timeline Items -->
                <div class="timeline-container space-y-16">
                    <!-- 1998 - Founding -->
                    <div class="timeline-item group">
                        <div class="timeline-content transform transition-all duration-500">
                            <div
                                class="timeline-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-emerald-500 hover:shadow-xl transition">
                                <div class="timeline-year text-emerald-600 font-bold text-lg mb-2">1998</div>
                                <h4 class="text-xl font-bold text-gray-800 mb-3">The Birth of Harmony</h4>
                                <p class="text-gray-700">A small group of students at ASA UR Nyarugenge SDA church united by
                                    their love for sacred music. With just 12 voices, they held their first rehearsal in a
                                    modest classroom.</p>
                                <div class="mt-4">
                                    <img src="{{ asset('images/founding-members.jpg') }}" alt="Original members"
                                        class="rounded-lg w-full h-48 object-cover opacity-90 hover:opacity-100 transition">
                                </div>
                            </div>
                        </div>
                        <div
                            class="timeline-dot absolute left-1/2 transform -translate-x-1/2 bg-emerald-500 rounded-full w-5 h-5 border-4 border-white shadow-lg group-hover:scale-125 transition">
                        </div>
                    </div>

                    <!-- 2003 - First Major Concert -->
                    <div class="timeline-item group">
                        <div class="timeline-content transform transition-all duration-500">
                            <div
                                class="timeline-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-emerald-500 hover:shadow-xl transition">
                                <div class="timeline-year text-emerald-600 font-bold text-lg mb-2">2003</div>
                                <h4 class="text-xl font-bold text-gray-800 mb-3">Breaking New Ground</h4>
                                <p>Our first major concert at Kigali Conference Center marked our transition from church
                                    choir to community worship leaders. The event was completely sold out with over 500
                                    attendees.</p>
                                <div class="mt-4 grid grid-cols-2 gap-2">
                                    <img src="{{ asset('images/concert-2003-1.jpg') }}" alt="2003 Concert"
                                        class="rounded-lg h-32 object-cover">
                                    <img src="{{ asset('images/concert-2003-2.jpg') }}" alt="2003 Concert"
                                        class="rounded-lg h-32 object-cover">
                                </div>
                            </div>
                        </div>
                        <div
                            class="timeline-dot absolute left-1/2 transform -translate-x-1/2 bg-emerald-500 rounded-full w-5 h-5 border-4 border-white shadow-lg group-hover:scale-125 transition">
                        </div>
                    </div>

                    <!-- 2010 - International Recognition -->
                    <div class="timeline-item group">
                        <div class="timeline-content transform transition-all duration-500">
                            <div
                                class="timeline-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-emerald-500 hover:shadow-xl transition">
                                <div class="timeline-year text-emerald-600 font-bold text-lg mb-2">2010</div>
                                <h4 class="text-xl font-bold text-gray-800 mb-3">Crossing Borders</h4>
                                <p>Our first international tour took us to 5 countries across East Africa. We were honored
                                    to perform at the All Africa Music Festival, sharing our unique blend of traditional
                                    Rwandan melodies with sacred harmonies.</p>
                                <div class="mt-4">
                                    <div class="relative h-48 rounded-lg overflow-hidden">
                                        <img src="{{ asset('images/africa-tour.jpg') }}" alt="Africa Tour"
                                            class="w-full h-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                                            <span class="text-white font-medium">Performing in Nairobi, Kenya</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="timeline-dot absolute left-1/2 transform -translate-x-1/2 bg-emerald-500 rounded-full w-5 h-5 border-4 border-white shadow-lg group-hover:scale-125 transition">
                        </div>
                    </div>

                    <!-- 2018 - 20th Anniversary -->
                    <div class="timeline-item group">
                        <div class="timeline-content transform transition-all duration-500">
                            <div
                                class="timeline-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-emerald-500 hover:shadow-xl transition">
                                <div class="timeline-year text-emerald-600 font-bold text-lg mb-2">2018</div>
                                <h4 class="text-xl font-bold text-gray-800 mb-3">Two Decades of Divine Harmony</h4>
                                <p>Our 20th anniversary celebration featured a 100-voice choir performing with a full
                                    orchestra at the Kigali Convention Center. We released our first live album and
                                    documentary film chronicling our journey.</p>
                                <div class="mt-4">
                                    <button
                                        class="watch-video flex items-center gap-2 text-emerald-600 hover:text-emerald-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Watch Anniversary Highlights
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="timeline-dot absolute left-1/2 transform -translate-x-1/2 bg-emerald-500 rounded-full w-5 h-5 border-4 border-white shadow-lg group-hover:scale-125 transition">
                        </div>
                    </div>

                    <!-- Present Day -->
                    <div class="timeline-item group">
                        <div class="timeline-content transform transition-all duration-500">
                            <div
                                class="timeline-card bg-white p-6 rounded-xl shadow-lg border-l-4 border-emerald-500 hover:shadow-xl transition">
                                <div class="timeline-year text-emerald-600 font-bold text-lg mb-2">Present</div>
                                <h4 class="text-xl font-bold text-gray-800 mb-3">A Living Legacy</h4>
                                <p>Today, God's Family Choir stands as one of Rwanda's most beloved worship ministries with
                                    over 60 active members across three generations. Our music school has trained hundreds,
                                    and our digital ministry reaches millions worldwide.</p>
                                <div class="mt-4 grid grid-cols-3 gap-2">
                                    <div class="stat-box bg-emerald-50 p-3 rounded-lg text-center">
                                        <div class="text-2xl font-bold text-emerald-700">25+</div>
                                        <div class="text-xs text-gray-600">Years Singing</div>
                                    </div>
                                    <div class="stat-box bg-emerald-50 p-3 rounded-lg text-center">
                                        <div class="text-2xl font-bold text-emerald-700">500+</div>
                                        <div class="text-xs text-gray-600">Performances</div>
                                    </div>
                                    <div class="stat-box bg-emerald-50 p-3 rounded-lg text-center">
                                        <div class="text-2xl font-bold text-emerald-700">10M+</div>
                                        <div class="text-xs text-gray-600">Views Online</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="timeline-dot absolute left-1/2 transform -translate-x-1/2 bg-emerald-500 rounded-full w-5 h-5 border-4 border-white shadow-lg group-hover:scale-125 transition">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Values Carousel -->
        <div class="max-w-6xl mx-auto px-4 mb-28">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-emerald-800 mb-2">The Heart of Our Harmony</h3>
                <p class="text-gray-600">What guides our voices and our mission</p>
            </div>

            <div class="values-carousel relative">
                <div class="carousel-track flex gap-6 overflow-x-auto py-4 px-2 scrollbar-hide">
                    @foreach ([['title' => 'Sacred Sound', 'desc' => 'We believe music is a divine gift meant to glorify God and uplift souls', 'icon' => '🎵', 'color' => 'bg-emerald-100'], ['title' => 'Generational Bridge', 'desc' => 'Mentoring young talent while honoring our founders\' legacy', 'icon' => '🌉', 'color' => 'bg-amber-100'], ['title' => 'Cultural Heritage', 'desc' => 'Celebrating Rwandan musical traditions in sacred context', 'icon' => '🇷🇼', 'color' => 'bg-blue-100'], ['title' => 'Spiritual Discipline', 'desc' => 'Approaching rehearsals as worship sessions', 'icon' => '🙏', 'color' => 'bg-purple-100'], ['title' => 'Creative Excellence', 'desc' => 'Pursuing musical mastery as an offering to God', 'icon' => '✨', 'color' => 'bg-red-100'], ['title' => 'Kingdom Community', 'desc' => 'A family beyond music, supporting each other in life', 'icon' => '❤️', 'color' => 'bg-pink-100']] as $value)
                        <div class="carousel-slide flex-shrink-0 w-72">
                            <div
                                class="value-card h-full {{ $value['color'] }} p-6 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-2">
                                <div class="text-5xl mb-4 text-center">{{ $value['icon'] }}</div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2 text-center">{{ $value['title'] }}</h4>
                                <p class="text-gray-700 text-center">{{ $value['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button
                    class="carousel-prev absolute left-0 top-1/2 -translate-y-1/2 -ml-6 bg-white rounded-full p-2 shadow-lg hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button
                    class="carousel-next absolute right-0 top-1/2 -translate-y-1/2 -mr-6 bg-white rounded-full p-2 shadow-lg hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Interactive Gallery -->
        <div class="max-w-6xl mx-auto px-4 mb-20">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-emerald-800 mb-2">Echoes of Praise</h3>
                <p class="text-gray-600">Explore our journey through the years</p>
            </div>

            <div class="interactive-gallery grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ([['image' => 'gf-1.jpg', 'year' => '2005', 'caption' => 'Easter Celebration at St. Famille'], ['image' => 'gf-2.jpg', 'year' => '2012', 'caption' => 'Recording Our First Album'], ['image' => 'gf-3.jpg', 'year' => '2015', 'caption' => 'Community Outreach in Rubavu'], ['image' => 'gf-4.jpg', 'year' => '2017', 'caption' => 'National Prayer Breakfast'], ['image' => 'gf-5.jpg', 'year' => '2019', 'caption' => 'Youth Choir Workshop'], ['image' => 'gf-6.jpg', 'year' => '2021', 'caption' => 'Virtual Concert During Pandemic'], ['image' => 'gf-7.jpg', 'year' => '2022', 'caption' => '25th Anniversary Gala'], ['image' => 'gf-8.jpg', 'year' => '2023', 'caption' => 'New Members Initiation']] as $photo)
                    <div
                        class="gallery-item relative rounded-xl overflow-hidden shadow-md hover:shadow-xl transition cursor-pointer group">
                        <img src="{{ asset('images/' . $photo['image']) }}" alt="{{ $photo['caption'] }}"
                            class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-4">
                            <div>
                                <div class="text-sm text-emerald-300 font-medium">{{ $photo['year'] }}</div>
                                <div class="text-white font-medium">{{ $photo['caption'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <button
                    class="view-more-btn bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-full font-medium transition flex items-center gap-2 mx-auto">
                    Explore Full Archive
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="max-w-4xl mx-auto px-4 mb-20">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-emerald-800 mb-2">Voices About Our Voice</h3>
                <p class="text-gray-600">What people say about our ministry</p>
            </div>

            <div class="testimonial-slider relative bg-emerald-50 rounded-xl p-8 shadow-inner">
                <div class="testimonial-slides">
                    @foreach ([['quote' => 'God\'s Family Choir doesn\'t just sing—they usher you into the presence of God. Their harmonies carry the anointing of decades of prayer and worship.', 'author' => 'Pastor Théoneste N.', 'role' => 'ASA UR Nyarugenge'], ['quote' => 'I grew up listening to this choir, and now my children are blessed by their music. They\'re a national treasure that keeps getting better with time.', 'author' => 'Marie Claire U.', 'role' => 'Longtime Listener'], ['quote' => 'Joining this choir changed my life. It\'s not just about music—it\'s spiritual formation through disciplined worship and genuine community.', 'author' => 'Eric M.', 'role' => 'Choir Member Since 2015']] as $testimonial)
                        <div class="testimonial-slide text-center px-4">
                            <div class="text-emerald-600 text-5xl mb-4">“</div>
                            <p class="text-lg text-gray-700 mb-6">{{ $testimonial['quote'] }}</p>
                            <div class="font-bold text-emerald-800">{{ $testimonial['author'] }}</div>
                            <div class="text-sm text-gray-500">{{ $testimonial['role'] }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="testimonial-dots flex justify-center mt-6 space-x-2">
                    <button class="dot w-3 h-3 rounded-full bg-emerald-200 hover:bg-emerald-400 transition"></button>
                    <button class="dot w-3 h-3 rounded-full bg-emerald-200 hover:bg-emerald-400 transition"></button>
                    <button class="dot w-3 h-3 rounded-full bg-emerald-200 hover:bg-emerald-400 transition"></button>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div
            class="max-w-4xl mx-auto px-4 text-center bg-emerald-800 rounded-2xl p-12 shadow-2xl relative overflow-hidden">
            <div class="absolute -top-20 -right-20 w-40 h-40 bg-emerald-600 rounded-full opacity-20"></div>
            <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-emerald-700 rounded-full opacity-20"></div>

            <h3 class="text-3xl font-bold text-white mb-4">Become Part of Our Story</h3>
            <p class="text-emerald-100 mb-8 max-w-2xl mx-auto">Whether you want to join us, invite us to minister, or
                support our mission, we'd love to connect.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button
                    class="bg-white text-emerald-800 hover:bg-emerald-100 px-6 py-3 rounded-full font-medium transition">
                    Join the Choir
                </button>
                <button
                    class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-emerald-800 px-6 py-3 rounded-full font-medium transition">
                    Invite Us
                </button>
                <button
                    class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-full font-medium transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Watch Our Story
                </button>
            </div>
        </div>

        <!-- Closing Verse -->
        <div class="mt-24 text-center max-w-3xl mx-auto px-4 relative">
            <div
                class="verse-container bg-white p-8 rounded-xl shadow-lg border-t-4 border-emerald-500 transform hover:scale-105 transition duration-500 cursor-pointer">
                <div class="text-emerald-600 text-5xl mb-4">“</div>
                <blockquote class="italic text-2xl text-gray-700 font-light">Sing to the Lord a new song, his praise in the
                    assembly of the faithful.</blockquote>
                <div class="text-emerald-900 font-semibold mt-4">— Psalm 149:1</div>
                <div class="mt-6">
                    <button
                        class="play-psalm bg-emerald-100 hover:bg-emerald-200 text-emerald-800 rounded-full p-3 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 001.414 1.414m2.828-9.9a9 9 0 011.414 1.414" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <x-static.footer />
@endsection

<style>
    /* Music Waves Animation */
    .music-waves .wave {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"><path d="M0,60 C150,120 350,0 500,60 C650,120 850,0 1000,60 C1150,120 1200,60 1200,60 L1200,120 L0,120 Z" fill="%234fd1c5"></path></svg>');
        background-size: cover;
        background-repeat: no-repeat;
        animation: wave 12s linear infinite;
    }

    .music-waves .wave:nth-child(2) {
        animation: wave 15s linear infinite reverse;
        opacity: 0.5;
    }

    .music-waves .wave:nth-child(3) {
        animation: wave 18s linear infinite;
        opacity: 0.2;
    }

    @keyframes wave {
        0% {
            background-position-x: 0;
        }

        100% {
            background-position-x: 1200px;
        }
    }

    /* Musical Notes Animation */
    .musical-notes .note {
        position: absolute;
        font-size: 1.5rem;
        opacity: 0;
        animation: floatNote 8s linear infinite;
    }

    .musical-notes .note:nth-child(1) {
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }

    .musical-notes .note:nth-child(2) {
        top: 30%;
        left: 80%;
        animation-delay: 2s;
    }

    .musical-notes .note:nth-child(3) {
        top: 70%;
        left: 15%;
        animation-delay: 4s;
    }

    .musical-notes .note:nth-child(4) {
        top: 85%;
        left: 65%;
        animation-delay: 6s;
    }

    @keyframes floatNote {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 0;
        }

        10% {
            opacity: 0.4;
        }

        90% {
            opacity: 0.4;
        }

        100% {
            transform: translateY(-100vh) rotate(360deg);
            opacity: 0;
        }
    }

    /* Timeline Styling */
    .timeline-container {
        position: relative;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .timeline-item {
        position: relative;
        display: flex;
        justify-content: center;
    }

    .timeline-content {
        width: 45%;
    }

    .timeline-item:nth-child(odd) .timeline-content {
        margin-right: auto;
        text-align: right;
    }

    .timeline-item:nth-child(even) .timeline-content {
        margin-left: auto;
    }

    @media (max-width: 768px) {

        .timeline-item:nth-child(odd) .timeline-content,
        .timeline-item:nth-child(even) .timeline-content {
            width: 90%;
            margin-left: 10%;
            text-align: left;
        }
    }

    /* Gallery Hover Effect */
    .gallery-item::after {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.3);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover::after {
        opacity: 1;
    }

    /* Carousel Scroll Snap */
    .carousel-track {
        scroll-snap-type: x mandatory;
    }

    .carousel-slide {
        scroll-snap-align: start;
    }
</style>

<script>
    // This would be implemented with your preferred JS framework
    document.addEventListener('DOMContentLoaded', function() {
        // Timeline animation
        const timelineItems = document.querySelectorAll('.timeline-item');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelector('.timeline-content').style.opacity = 1;
                    entry.target.querySelector('.timeline-content').style.transform =
                        'translateX(0)';
                }
            });
        }, {
            threshold: 0.1
        });

        timelineItems.forEach((item, index) => {
            item.querySelector('.timeline-content').style.transitionDelay = `${index * 0.1}s`;
            if (index % 2 === 0) {
                item.querySelector('.timeline-content').style.transform = 'translateX(-50px)';
            } else {
                item.querySelector('.timeline-content').style.transform = 'translateX(50px)';
            }
            item.querySelector('.timeline-content').style.opacity = 0;
            observer.observe(item);
        });

        // Play history audio
        document.querySelector('.play-history-audio').addEventListener('click', function() {
            // Implementation for playing an audio timeline
            alert('Playing choir history audio timeline...');
        });

        // Play Psalm audio
        document.querySelector('.play-psalm').addEventListener('click', function() {
            // Implementation for playing Psalm 149
            alert('Playing Psalm 149...');
        });
    });
</script>
