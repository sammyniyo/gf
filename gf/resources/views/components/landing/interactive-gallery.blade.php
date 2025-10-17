<!-- Interactive Photo Gallery -->
<section class="relative bg-white py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-semibold mb-4">
                GALLERY
            </span>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                Moments of <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Worship & Fellowship</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Capturing the beautiful moments of worship, praise, and community that define our choir family
            </p>
        </div>

        <!-- Masonry Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery">
            @foreach([
                ['image' => '1.jpg', 'title' => 'Sabbath Worship Service', 'category' => 'Worship'],
                ['image' => '2.jpg', 'title' => 'Resurrection Sunday 2024', 'category' => 'Events'],
                ['image' => '3.jpg', 'title' => 'Choir Rehearsal', 'category' => 'Behind the Scenes'],
                ['image' => '4.jpg', 'title' => 'Community Outreach', 'category' => 'Outreach'],
                ['image' => '5.jpg', 'title' => 'Youth Training Program', 'category' => 'Training'],
                ['image' => 'gf-2.jpg', 'title' => 'Annual Concert', 'category' => 'Performance'],
            ] as $index => $photo)
                <div class="group relative cursor-pointer overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                     onclick="openLightbox({{ $index }})">
                    <!-- Image -->
                    <img src="{{ asset('images/' . $photo['image']) }}"
                         alt="{{ $photo['title'] }}"
                         class="w-full h-auto transform group-hover:scale-110 transition-transform duration-700">

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 right-0 p-6">
                            <span class="inline-block px-3 py-1 bg-purple-600 text-white rounded-full text-xs font-semibold mb-2">
                                {{ $photo['category'] }}
                            </span>
                            <h3 class="text-white font-bold text-xl mb-2">{{ $photo['title'] }}</h3>

                            <!-- View Button -->
                            <div class="flex items-center gap-2 text-white/80 hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm font-medium">View Full Size</span>
                            </div>
                        </div>
                    </div>

                    <!-- Zoom Icon -->
                    <div class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"></path>
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="text-center mt-12">
            <button class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold rounded-xl hover:shadow-xl hover:shadow-purple-500/50 transition-all duration-300 transform hover:-translate-y-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span>Load More Photos</span>
            </button>
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4 backdrop-blur-sm">
    <!-- Close Button -->
    <button onclick="closeLightbox()" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors z-50">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Previous Button -->
    <button onclick="previousImage()" class="absolute left-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <!-- Next Button -->
    <button onclick="nextImage()" class="absolute right-6 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-colors">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Image Container -->
    <div class="relative max-w-6xl w-full">
        <img id="lightbox-image" src="" alt="" class="w-full h-auto rounded-2xl shadow-2xl max-h-[80vh] object-contain mx-auto">

        <!-- Image Info -->
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 rounded-b-2xl">
            <h3 id="lightbox-title" class="text-white font-bold text-2xl mb-2"></h3>
            <p id="lightbox-category" class="text-white/80"></p>
        </div>

        <!-- Image Counter -->
        <div class="absolute top-4 left-4 px-4 py-2 bg-white/10 backdrop-blur-xl rounded-full">
            <span id="lightbox-counter" class="text-white font-semibold"></span>
        </div>
    </div>
</div>

<script>
const photos = [
    {image: '1.jpg', title: 'Sabbath Worship Service', category: 'Worship'},
    {image: '2.jpg', title: 'Resurrection Sunday 2024', category: 'Events'},
    {image: '3.jpg', title: 'Choir Rehearsal', category: 'Behind the Scenes'},
    {image: '4.jpg', title: 'Community Outreach', category: 'Outreach'},
    {image: '5.jpg', title: 'Youth Training Program', category: 'Training'},
    {image: 'gf-2.jpg', title: 'Annual Concert', category: 'Performance'}
];

let currentImageIndex = 0;

function openLightbox(index) {
    currentImageIndex = index;
    updateLightboxImage();
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = 'auto';
}

function previousImage() {
    currentImageIndex = (currentImageIndex - 1 + photos.length) % photos.length;
    updateLightboxImage();
}

function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % photos.length;
    updateLightboxImage();
}

function updateLightboxImage() {
    const photo = photos[currentImageIndex];
    document.getElementById('lightbox-image').src = `/images/${photo.image}`;
    document.getElementById('lightbox-title').textContent = photo.title;
    document.getElementById('lightbox-category').textContent = photo.category;
    document.getElementById('lightbox-counter').textContent = `${currentImageIndex + 1} / ${photos.length}`;
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (!document.getElementById('lightbox').classList.contains('hidden')) {
        if (e.key === 'ArrowLeft') previousImage();
        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'Escape') closeLightbox();
    }
});

// Close lightbox when clicking outside the image
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});
</script>


