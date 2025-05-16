<!-- resources/views/components/landing/logo-carousel.blade.php -->
<section class="bg-gray-50 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="sr-only">Trusted by industry leaders</h2>
        <div class="relative">
            <!-- Gradient fade effects -->
            <div class="absolute inset-y-0 left-0 w-20 bg-gradient-to-r from-gray-50 to-transparent z-10"></div>
            <div class="absolute inset-y-0 right-0 w-20 bg-gradient-to-l from-gray-50 to-transparent z-10"></div>

            <!-- Carousel container -->
            <div class="overflow-hidden">
                <div class="flex animate-[logoScroll_30s_linear_infinite] hover:animation-pause">
                    <!-- Logo items (duplicated for seamless looping) -->
                    <div class="flex flex-shrink-0 items-center justify-around gap-12 px-4">
                        @foreach (['youtube_BIG.png', 'SPOT_BIG.png', 'instagram.png', 'tiktok_BIG.png', 'FB.png'] as $logo)
                            <div
                                class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out transform hover:scale-105">
                                <img src="{{ asset('images/' . $logo) }}"
                                    class="h-8 sm:h-10 opacity-70 hover:opacity-100 transition-opacity duration-300"
                                    alt="{{ str_replace(['_BIG', '.png'], '', $logo) }} logo" loading="lazy">
                            </div>
                        @endforeach
                    </div>

                    <!-- Duplicate for seamless looping -->
                    <div class="flex flex-shrink-0 items-center justify-around gap-12 px-4" aria-hidden="true">
                        @foreach (['youtube_BIG.png', 'SPOT_BIG.png', 'instagram.png', 'tiktok_BIG.png', 'FB.png'] as $logo)
                            <div
                                class="grayscale hover:grayscale-0 transition-all duration-300 ease-in-out transform hover:scale-105">
                                <img src="{{ asset('images/' . $logo) }}"
                                    class="h-8 sm:h-10 opacity-70 hover:opacity-100 transition-opacity duration-300"
                                    alt="" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes logoScroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }
    </style>
</section>
