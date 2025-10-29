<!-- Featured Worship Songs Section with Clean Design -->
<section class="relative bg-gradient-to-b from-white to-gray-50 py-12 overflow-hidden">
    <!-- Subtle Background Elements -->
    <div class="absolute inset-0">
        <!-- Soft Colored Blobs -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-200/25 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-amber-200/20 rounded-full blur-3xl animate-pulse-slow animation-delay-2000"></div>

        <!-- Dissolving Gradient Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.2]">
            <!-- Horizontal gradient lines -->
            <div class="absolute inset-0" style="
                background-image: repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 99px,
                    rgba(16, 185, 129, 0.15) 99px,
                    rgba(251, 191, 36, 0.15) 100px
                );
                mask-image: radial-gradient(ellipse at center, black 20%, transparent 80%);
                -webkit-mask-image: radial-gradient(ellipse at center, black 20%, transparent 80%);
            "></div>
            <!-- Vertical gradient lines -->
            <div class="absolute inset-0" style="
                background-image: repeating-linear-gradient(
                    90deg,
                    transparent,
                    transparent 99px,
                    rgba(16, 185, 129, 0.15) 99px,
                    rgba(251, 191, 36, 0.15) 100px
                );
                mask-image: radial-gradient(ellipse at center, black 20%, transparent 80%);
                -webkit-mask-image: radial-gradient(ellipse at center, black 20%, transparent 80%);
            "></div>
        </div>

        <!-- Animated Gradient Grid Overlay -->
        <div class="absolute inset-0 opacity-[0.12] animate-grid-flow">
            <div class="absolute inset-0" style="
                background: linear-gradient(90deg, transparent 0%, rgba(16, 185, 129, 0.2) 50%, transparent 100%),
                            linear-gradient(0deg, transparent 0%, rgba(251, 191, 36, 0.2) 50%, transparent 100%);
                background-size: 200px 200px;
            "></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold uppercase tracking-wide text-emerald-700 mb-3">
                Our Music
            </span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                Latest <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Singles</span>
            </h2>
            <p class="text-gray-600 text-sm max-w-xl mx-auto">
                @if($spotifyTracks && isset($spotifyTracks['tracks']['items']) && count($spotifyTracks['tracks']['items']) > 0)
                    Our newest single releases on Spotify
                @else
                    Connect your Spotify API to showcase your latest singles
                @endif
            </p>
        </div>

        @if($spotifyTracks && isset($spotifyTracks['tracks']['items']) && count($spotifyTracks['tracks']['items']) > 0)
            @php
                // Take latest 3 releases (already sorted by release date from API)
                $tracks = collect($spotifyTracks['tracks']['items'])->take(3);
            @endphp

            <!-- Clean Tracks Grid - Top 3 Most Popular -->
            <div class="grid md:grid-cols-3 gap-5 mb-8 max-w-5xl mx-auto">
                @foreach($tracks as $track)
                    <div class="group relative bg-white rounded-2xl border border-emerald-100 overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                        <div class="relative">
                            <!-- Album Art -->
                            <div class="aspect-square bg-gradient-to-br from-emerald-100 to-amber-100 flex items-center justify-center overflow-hidden">
                                @if(isset($track['album']['images'][0]['url']))
                                    <img src="{{ $track['album']['images'][0]['url'] }}" alt="{{ $track['name'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-emerald-200 to-amber-200 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                                <!-- Play Button -->
                                <a href="{{ $track['external_urls']['spotify'] }}" target="_blank" class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-2xl transform scale-0 group-hover:scale-100 transition-transform duration-300">
                                        <svg class="w-8 h-8 text-emerald-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>

                            <!-- Track Info -->
                            <div class="p-4">
                                <h3 class="text-gray-900 font-bold text-base mb-1 line-clamp-2">
                                    {{ $track['name'] }}
                                </h3>
                                <p class="text-gray-500 text-xs line-clamp-1 mb-2">
                                    {{ collect($track['artists'])->pluck('name')->implode(', ') }}
                                </p>

                                <!-- Play Button -->
                                <a href="{{ $track['external_urls']['spotify'] }}" target="_blank"
                                   class="inline-flex items-center justify-center gap-2 w-full px-3 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white text-xs font-semibold rounded-full shadow-md shadow-emerald-500/30 hover:shadow-lg hover:shadow-emerald-500/40 transition-all hover:-translate-y-0.5">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                                    </svg>
                                    <span>Play on Spotify</span>
                                </a>

                                <!-- Additional Info -->
                                <div class="flex items-center justify-between mt-2 text-xs text-gray-400">
                                    @if(isset($track['duration_ms']))
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ app('App\Services\SpotifyService')->formatDuration($track['duration_ms']) }}
                                        </span>
                                    @endif
                                    @if(isset($track['album']['release_date']))
                                        <span class="flex items-center gap-1 text-emerald-600 font-semibold">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($track['album']['release_date'])->format('M Y') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Enhanced Spotify Follow Card -->
            <div class="max-w-4xl mx-auto">
                <div class="group relative bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-md hover:shadow-xl transition-all duration-500">
                    <div class="grid md:grid-cols-5 gap-0">
                        <!-- Left: Spotify Icon Column -->
                        <div class="md:col-span-2 bg-gradient-to-br from-green-50 to-emerald-50 p-6 flex items-center justify-center relative overflow-hidden">
                            <!-- Animated Background Circles -->
                            <div class="absolute inset-0">
                                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-green-200/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                                <div class="absolute top-1/4 left-1/4 w-20 h-20 bg-emerald-200/20 rounded-full blur-xl group-hover:scale-125 transition-transform duration-500"></div>
                            </div>

                            <!-- Spotify Icon -->
                            <div class="relative z-10 transform group-hover:scale-110 transition-transform duration-500">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-xl shadow-green-500/40 group-hover:shadow-green-500/60 transition-all duration-300 rotate-6 group-hover:rotate-12">
                                    <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Content Column -->
                        <div class="md:col-span-3 p-5 flex flex-col justify-center">
                            <div class="mb-1">
                                <span class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wide text-green-600">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    Stream Everywhere
                                </span>
                            </div>
                            <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                Never Miss a New Release
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                Follow us on Spotify for new worship songs and live recordings.
                            </p>
                            <div class="flex flex-wrap gap-2">
                                <a href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J" target="_blank"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white text-sm font-semibold rounded-lg shadow-md shadow-green-500/30 hover:shadow-lg hover:shadow-green-500/40 hover:-translate-y-0.5 transition-all duration-300 group/btn">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                                    </svg>
                                    <span>Follow on Spotify</span>
                                    <svg class="w-3 h-3 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                                <a href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J" target="_blank"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-200 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                    </svg>
                                    <span>View Profile</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Clean Fallback -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white border border-emerald-100 rounded-3xl p-12 text-center shadow-lg">
                    <div class="w-20 h-20 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Connect Your Spotify</h3>
                    <p class="text-gray-600 text-lg mb-6">
                        To display your latest tracks, you'll need to configure the Spotify API credentials.
                    </p>
                    <div class="bg-gray-50 rounded-2xl p-6 text-left max-w-2xl mx-auto border border-emerald-100">
                        <h4 class="text-gray-900 font-bold mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Setup Instructions:
                        </h4>
                        <ol class="text-gray-600 text-sm space-y-2 list-decimal list-inside">
                            <li>Go to <a href="https://developer.spotify.com/dashboard" target="_blank" class="text-emerald-600 hover:text-emerald-700 hover:underline transition-colors">Spotify Developer Dashboard</a></li>
                            <li>Create a new app and get your Client ID & Secret</li>
                            <li>Add these to your <code class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded text-xs font-mono">.env</code> file:</li>
                        </ol>
                        <div class="bg-gray-900 rounded-lg p-4 mt-4 font-mono text-sm">
                            <div class="text-emerald-400">SPOTIFY_CLIENT_ID=your_client_id_here</div>
                            <div class="text-amber-400">SPOTIFY_CLIENT_SECRET=your_client_secret_here</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.25; transform: scale(1); }
        50% { opacity: 0.35; transform: scale(1.05); }
    }

    .animate-pulse-slow {
        animation: pulse-slow 8s ease-in-out infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Grid Flow Animation */
    @keyframes grid-flow {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    .animate-grid-flow {
        animation: grid-flow 15s ease-in-out infinite;
    }
</style>
