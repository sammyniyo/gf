@props(['album', 'featured' => false])

<div class="group relative bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 overflow-hidden border border-gray-100">
    <!-- Subtle glow effect on hover -->
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 rounded-3xl opacity-0 group-hover:opacity-20 blur-xl transition-opacity duration-500"></div>

    <!-- Featured Badge -->
    @if($featured)
    <div class="absolute top-4 right-4 z-30">
        <span class="bg-gradient-to-r from-yellow-400 via-amber-400 to-yellow-500 text-yellow-900 text-xs font-black px-4 py-2 rounded-full shadow-xl flex items-center gap-1.5 animate-pulse">
            <i class="fas fa-star"></i>
            FEATURED
        </span>
    </div>
    @endif

    <!-- Album Cover -->
    <a href="{{ route('shop.show', $album->id) }}" class="block relative aspect-square overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
        <img src="{{ $album->cover_image_url }}"
             alt="{{ $album->title }}"
             class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110">

        <!-- Subtle shimmer effect -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>

        <!-- Overlay on hover -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end justify-center pb-8 z-20">
            <div class="flex gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 relative z-30">
                @if($album->spotify_url)
                <a href="{{ $album->spotify_url }}"
                   target="_blank"
                   class="bg-green-500 hover:bg-green-600 text-white p-3.5 rounded-full transition-all transform hover:scale-110 shadow-lg relative z-40"
                   onclick="event.stopPropagation()">
                    <i class="fab fa-spotify text-lg"></i>
                </a>
                @endif

                @if($album->apple_music_url)
                <a href="{{ $album->apple_music_url }}"
                   target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 text-white p-3.5 rounded-full transition-all transform hover:scale-110 shadow-lg relative z-40"
                   onclick="event.stopPropagation()">
                    <i class="fab fa-apple text-lg"></i>
                </a>
                @endif

                @if($album->youtube_url)
                <a href="{{ $album->youtube_url }}"
                   target="_blank"
                   class="bg-red-500 hover:bg-red-600 text-white p-3.5 rounded-full transition-all transform hover:scale-110 shadow-lg relative z-40"
                   onclick="event.stopPropagation()">
                    <i class="fab fa-youtube text-lg"></i>
                </a>
                @endif
            </div>
        </div>
    </a>

    <!-- Album Info -->
    <div class="p-6">
        <a href="{{ route('shop.show', $album->id) }}" class="block">
            <h3 class="text-xl font-black text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                {{ $album->title }}
            </h3>
        </a>

        @if($album->description)
        <p class="text-sm text-gray-600 mb-4 line-clamp-2 leading-relaxed">
            {{ $album->description }}
        </p>
        @endif

        <div class="flex items-center justify-between mb-4">
            @if($album->track_count > 0)
            <span class="text-sm text-gray-500 font-medium flex items-center gap-1.5">
                <i class="fas fa-music text-sm"></i>
                {{ $album->track_count }} tracks
            </span>
            @endif

            @if($album->release_date)
            <span class="text-sm text-gray-500 font-medium flex items-center gap-1.5">
                <i class="fas fa-calendar-alt text-sm"></i>
                {{ $album->release_date->format('Y') }}
            </span>
            @endif
        </div>

        <!-- Price and CTA -->
        <div class="flex items-center justify-between pt-6 mt-2 border-t-2 border-gray-200">
            <div>
                @if($album->isFree())
                <div class="flex items-center gap-2">
                    <span class="text-3xl font-black bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent">FREE</span>
                    <i class="fas fa-check-circle text-blue-500 animate-bounce"></i>
                </div>
                @else
                <div>
                    <span class="text-3xl font-black text-gray-900">${{ number_format($album->price, 2) }}</span>
                    <div class="text-xs text-gray-500 mt-0.5 font-medium">One-time purchase</div>
                </div>
                @endif
            </div>

            <a href="{{ route('shop.show', $album->id) }}"
               class="group relative bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-6 py-3 rounded-xl font-black transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl overflow-hidden">
                <!-- Subtle shine effect -->
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></span>
                <span class="relative flex items-center gap-2">
                    {{ $album->isFree() ? 'Download' : 'Buy Now' }}
                    <i class="fas fa-arrow-right text-sm transform group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>
        </div>
    </div>
</div>
