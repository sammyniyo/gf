<!-- resources/views/components/landing/spotify-albums.blade.php -->
<section class="bg-black py-24" id="discover">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">
                Discover New Music
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                Fresh releases and curated playlists to match your vibe.
            </p>
        </div>

        <!-- Genre Filters -->
        <div class="flex justify-center flex-wrap gap-3 mb-16">
            @foreach (['All', 'Pop', 'Hip-Hop', 'Electronic', 'Rock', 'R&B', 'Indie'] as $genre)
                <button
                    class="px-6 py-2 rounded-full text-sm font-medium transition-all
                    {{ $loop->first ? 'bg-spotify-green text-black' : 'bg-gray-800 hover:bg-gray-700 text-white' }}
                    hover:scale-105 active:scale-95">
                    {{ $genre }}
                </button>
            @endforeach
        </div>

        <!-- Albums Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-16">
            @foreach ([['title' => 'Midnight Memories', 'artist' => 'The Weeknd', 'plays' => '1.2M'], ['title' => 'Solar Power', 'artist' => 'Lorde', 'plays' => '856K'], ['title' => 'Future Nostalgia', 'artist' => 'Dua Lipa', 'plays' => '3.4M'], ['title' => 'Happier Than Ever', 'artist' => 'Billie Eilish', 'plays' => '2.8M'], ['title' => 'Planet Her', 'artist' => 'Doja Cat', 'plays' => '4.1M'], ['title' => 'Justice', 'artist' => 'Justin Bieber', 'plays' => '3.7M'], ['title' => 'Sour', 'artist' => 'Olivia Rodrigo', 'plays' => '5.2M'], ['title' => 'Montero', 'artist' => 'Lil Nas X', 'plays' => '3.9M'], ['title' => '30', 'artist' => 'Adele', 'plays' => '6.8M'], ['title' => 'Certified Lover Boy', 'artist' => 'Drake', 'plays' => '7.5M']] as $album)
                <div
                    class="group relative bg-gray-900 p-4 rounded-xl hover:bg-gray-800 transition-all duration-300 cursor-pointer">
                    <div class="relative overflow-hidden rounded-lg aspect-square mb-4">
                        <img src="https://source.unsplash.com/random/600x600/?album,cover,{{ $album['artist'] }}"
                            alt="{{ $album['title'] }} album cover"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy">
                        <button
                            class="absolute bottom-2 right-2 w-12 h-12 bg-spotify-green rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300 shadow-lg hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 text-black">
                                <path fill-rule="evenodd"
                                    d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <h3 class="text-white font-semibold truncate">{{ $album['title'] }}</h3>
                    <p class="text-gray-400 text-sm truncate">{{ $album['artist'] }}</p>
                    <p class="text-spotify-green text-xs mt-1 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-3 h-3 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                        </svg>
                        {{ $album['plays'] }} plays
                    </p>
                </div>
            @endforeach
        </div>

        <!-- Featured Playlist -->
        <div
            class="bg-gradient-to-r from-purple-900 to-gray-900 text-white p-8 md:p-12 rounded-2xl flex flex-col lg:flex-row items-center gap-8 shadow-xl">
            <div class="relative flex-shrink-0 w-full lg:w-1/3">
                <img src="https://source.unsplash.com/random/800x800/?playlist,music" alt="Featured playlist"
                    class="rounded-xl w-full shadow-2xl">
                <div
                    class="absolute -bottom-4 -right-4 bg-spotify-green w-16 h-16 rounded-full flex items-center justify-center shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-8 h-8 text-black">
                        <path fill-rule="evenodd"
                            d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="flex-1 space-y-6">
                <div>
                    <span
                        class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-spotify-green text-black mb-3">CURATED
                        PLAYLIST</span>
                    <h3 class="text-3xl md:text-4xl font-bold mb-4">Today's Top Hits</h3>
                    <p class="text-gray-300 mb-6">The most popular tracks right now. Updated daily.</p>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded-lg transition">
                        <span class="text-gray-400 w-6 text-center">1</span>
                        <img src="https://source.unsplash.com/random/100x100/?singer" class="w-10 h-10 rounded"
                            alt="Track">
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium truncate">Blinding Lights</p>
                            <p class="text-gray-400 text-xs truncate">The Weeknd</p>
                        </div>
                        <span class="text-gray-400 text-sm">3:20</span>
                    </div>

                    <div class="flex items-center gap-3 p-3 hover:bg-gray-800 rounded-lg transition">
                        <span class="text-gray-400 w-6 text-center">2</span>
                        <img src="https://source.unsplash.com/random/100x100/?artist" class="w-10 h-10 rounded"
                            alt="Track">
                        <div class="flex-1 min-w-0">
                            <p class="text-white font-medium truncate">Save Your Tears</p>
                            <p class="text-gray-400 text-xs truncate">The Weeknd, Ariana Grande</p>
                        </div>
                        <span class="text-gray-400 text-sm">3:35</span>
                    </div>
                </div>

                <button
                    class="mt-6 bg-spotify-green text-black px-8 py-3 rounded-full font-bold hover:bg-green-300 transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                    </svg>
                    Play All
                </button>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <style>
        .bg-spotify-green {
            background-color: #1DB954;
        }

        .text-spotify-green {
            color: #1DB954;
        }
    </style>
@endpush
