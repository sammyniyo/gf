<!-- resources/views/components/landing/spotify-albums.blade.php -->
<section class="bg-gradient-to-b from-emerald-950 via-emerald-900 to-emerald-950 py-24 relative overflow-hidden" id="music">
    <!-- Background Musical Notes -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-20 left-20 text-6xl">♪</div>
        <div class="absolute top-40 right-32 text-8xl">♫</div>
        <div class="absolute bottom-32 left-1/4 text-5xl">♬</div>
        <div class="absolute bottom-20 right-20 text-7xl">♩</div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-emerald-800/50 text-emerald-200 rounded-full text-sm font-semibold mb-4 backdrop-blur-sm">
                OUR SACRED MELODIES
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Listen to Our <span class="text-amber-400">Worship Albums</span>
            </h2>
            <p class="text-emerald-200 max-w-2xl mx-auto text-lg leading-relaxed">
                Experience the power of praise through our collection of original worship songs and hymns
            </p>
        </div>

        <!-- Platform Links -->
        <div class="flex justify-center flex-wrap gap-3 mb-16">
            @foreach ([
                ['name' => 'Spotify', 'color' => 'from-green-500 to-green-600', 'icon' => 'SPOT_BIG.png'],
                ['name' => 'YouTube Music', 'color' => 'from-red-500 to-red-600', 'icon' => 'youtube_BIG.png'],
                ['name' => 'Apple Music', 'color' => 'from-pink-500 to-rose-600', 'icon' => null],
            ] as $platform)
                <button class="group px-6 py-3 rounded-full text-sm font-semibold transition-all bg-white/10 hover:bg-white/20 text-white border border-white/20 hover:border-white/40 backdrop-blur-sm flex items-center gap-2">
                    @if($platform['icon'])
                        <img src="{{ asset('images/' . $platform['icon']) }}" class="h-5 w-5 opacity-80 group-hover:opacity-100" alt="{{ $platform['name'] }}">
                    @endif
                    {{ $platform['name'] }}
                </button>
            @endforeach
        </div>

        <!-- Albums/Songs Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 mb-16">
            @foreach ([
                ['title' => 'Voices of Praise', 'year' => '2023', 'songs' => '12 tracks'],
                ['title' => 'Sacred Harmonies', 'year' => '2022', 'songs' => '10 tracks'],
                ['title' => 'Worship in Spirit', 'year' => '2021', 'songs' => '14 tracks'],
                ['title' => 'Heavenly Melodies', 'year' => '2020', 'songs' => '11 tracks'],
                ['title' => 'Songs of Zion', 'year' => '2019', 'songs' => '13 tracks'],
                ['title' => 'Joyful Noise', 'year' => '2018', 'songs' => '9 tracks'],
                ['title' => 'Eternal Praise', 'year' => '2017', 'songs' => '15 tracks'],
                ['title' => 'Faith & Harmony', 'year' => '2016', 'songs' => '10 tracks'],
            ] as $index => $album)
                <div class="group relative bg-emerald-800/40 backdrop-blur-sm p-5 rounded-2xl border border-emerald-700/50 hover:border-amber-500/50 transition-all duration-300 cursor-pointer transform hover:-translate-y-2 hover:shadow-2xl">
                    <div class="relative overflow-hidden rounded-xl aspect-square mb-4 bg-gradient-to-br from-emerald-600 to-emerald-800">
                        <img src="{{ asset('images/' . ($index % 5 + 1) . '.jpg') }}"
                            alt="{{ $album['title'] }} album cover"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <button class="absolute bottom-3 right-3 w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300 shadow-lg hover:scale-110 hover:bg-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-emerald-950">
                                <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="text-white font-bold truncate text-lg">{{ $album['title'] }}</h3>
                    <p class="text-emerald-300 text-sm">{{ $album['year'] }}</p>
                    <p class="text-emerald-400 text-xs mt-1 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 11-.99-3.467l2.31-.66a2.25 2.25 0 001.632-2.163zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 01-1.632 2.163l-1.32.377a1.803 1.803 0 01-.99-3.467l2.31-.66A2.25 2.25 0 009 15.553z" />
                        </svg>
                        {{ $album['songs'] }}
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Featured Playlist/Concert -->
        <div class="bg-gradient-to-r from-amber-900/40 to-emerald-900/40 backdrop-blur-sm border border-amber-500/30 text-white p-8 md:p-12 rounded-3xl flex flex-col lg:flex-row items-center gap-8 shadow-2xl">
            <div class="relative flex-shrink-0 w-full lg:w-1/3">
                <img src="{{ asset('images/gf-2.jpg') }}" alt="Featured performance" class="rounded-2xl w-full shadow-2xl">
                <div class="absolute -bottom-4 -right-4 bg-amber-500 w-16 h-16 rounded-full flex items-center justify-center shadow-xl animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-emerald-950">
                        <path fill-rule="evenodd" d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="flex-1 space-y-6">
                <div>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-amber-500 text-emerald-950 mb-3">
                        FEATURED COLLECTION
                    </span>
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">Greatest Worship Hits</h3>
                    <p class="text-emerald-200 mb-6">Our most beloved songs that have touched hearts across generations. A collection of timeless worship favorites.</p>
                </div>

                <div class="space-y-3">
                    @foreach ([
                        ['title' => 'Amazing Grace (Our Version)', 'duration' => '4:35'],
                        ['title' => 'How Great Thou Art', 'duration' => '5:12'],
                        ['title' => 'Blessed Assurance', 'duration' => '3:48'],
                    ] as $track)
                        <div class="flex items-center gap-3 p-3 hover:bg-emerald-800/30 rounded-lg transition">
                            <span class="text-emerald-400 w-6 text-center">{{ $loop->iteration }}</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-white font-medium truncate">{{ $track['title'] }}</p>
                                <p class="text-emerald-300 text-xs truncate">God's Family Choir</p>
                            </div>
                            <span class="text-emerald-400 text-sm">{{ $track['duration'] }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="https://open.spotify.com" target="_blank" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-400 text-emerald-950 px-6 py-3 rounded-full font-bold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                        </svg>
                        Listen Now
                    </a>
                    <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-full font-bold transition border border-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        View Events
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
