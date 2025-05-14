<!-- resources/views/components/landing/logo-carousel.blade.php -->
<section class="bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center items-center gap-6">
            @foreach (['Google', 'Afterpay', 'Asana', 'Dropbox', 'Spotify', 'Grammarly'] as $logo)
                <div class="grayscale hover:grayscale-0 transition">
                    <img src="https://dummyimage.com/120x40/ccc/000&text={{ $logo }}" alt="{{ $logo }}"
                        class="h-10">
                </div>
            @endforeach
        </div>
    </div>
</section>
