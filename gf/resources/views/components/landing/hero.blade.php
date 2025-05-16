<section class="bg-emerald-950 relative py-20 lg:py-28 overflow-hidden">
    <!-- Background image with overlay -->
    <div class="absolute inset-0">
        <img src={{ asset('images/gf-2.jpg') }} alt="Choir background"
            class="w-full h-full object-cover object-center opacity-30" />
        <div class="absolute inset-0 bg-emerald-950/60 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/80 to-transparent"></div>
    </div>

    <!-- Grid background with overlay -->
    <div class="absolute inset-0 bg-[url('/images/grid-bg.svg')] bg-cover opacity-20 mix-blend-soft-light"></div>

    <!-- Decorative elements (symbolic elements for music/spirituality) -->
    <div class="absolute top-20 -left-10 w-40 h-40 bg-amber-400 rounded-full blur-3xl opacity-15"></div>
    <div class="absolute bottom-20 -right-10 w-40 h-40 bg-teal-400 rounded-full blur-3xl opacity-15"></div>

    <!-- Subtle musical notes floating animation -->
    <div class="absolute top-32 right-10 w-6 h-8 text-white/10 animate-float-slow">♩</div>
    <div class="absolute top-64 left-20 w-8 h-10 text-white/10 animate-float-medium">♪</div>
    <div class="absolute bottom-40 right-32 w-10 h-12 text-white/10 animate-float-fast">♫</div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Badge -->
        <div class="flex justify-center mb-6">
            <div
                class="inline-flex items-center gap-2 bg-emerald-900/70 backdrop-blur-sm text-amber-300 py-2 px-4 rounded-full border border-emerald-800/60">
                <span class="inline-block w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium">Praising The Lord Since</span>
                <span class="bg-emerald-800/70 py-0.5 px-2 rounded-full text-xs font-semibold ml-1">1998</span>
            </div>
        </div>

        <!-- Main content -->
        <div class="text-center">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight tracking-tight mb-6">
                God's Family Choir<br class="hidden sm:inline">
                <span class="relative">
                    <span class="bg-gradient-to-r from-amber-300 to-teal-300 bg-clip-text text-transparent">Voices
                        United in Faith</span>
                    <svg class="absolute -bottom-1 left-0 w-full h-3 text-amber-400/20" viewBox="0 0 100 15"
                        preserveAspectRatio="none">
                        <path d="M0,5 Q40,15 80,5 L100,5" fill="none" stroke="currentColor" stroke-width="6"
                            stroke-linecap="round"></path>
                    </svg>
                </span>
            </h1>

            <p class="text-lg text-gray-300 max-w-3xl mx-auto mb-10 leading-relaxed">
                <b>God's Family Choir</b> is a Seventh-day Adventist community of believers united by a shared passion
                for worship through sacred music based in <b>ASA UR Nyarugenge SDA</b>. Founded on faith, fellowship,
                and the love of Christ, we
                are more than just singers — we are a family dedicated to glorifying God and touching hearts through
                spirit-filled harmonies and heartfelt
                praise.
            </p>

            <!-- Call to action -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
                <a href="#"
                    class="inline-flex items-center justify-center bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-emerald-950 font-semibold px-6 py-3.5 rounded-xl shadow-lg shadow-amber-500/25 transition transform hover:-translate-y-0.5">
                    <span>Latest Performance</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="https://www.youtube.com/watch?v=DR1QiuFpx9I&pp=ygUPbXd1YmFoZSB1d2l0ZWth"
                    class="inline-flex items-center justify-center border border-white/30 hover:bg-white/10 backdrop-blur-sm text-white font-semibold px-6 py-3.5 rounded-xl transition"
                    target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Watch Us Sing</span>
                </a>
            </div>

            <!-- Feature highlights - changed to choir values -->
            <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 mb-16">
                <div
                    class="flex items-center gap-2 text-sm text-gray-300 bg-emerald-900/30 px-4 py-2 rounded-full backdrop-blur-sm">
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span>Worship Through Music</span>
                </div>
                <div
                    class="flex items-center gap-2 text-sm text-gray-300 bg-emerald-900/30 px-4 py-2 rounded-full backdrop-blur-sm">
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span>Spiritual Fellowship</span>
                </div>
                <div
                    class="flex items-center gap-2 text-sm text-gray-300 bg-emerald-900/30 px-4 py-2 rounded-full backdrop-blur-sm">
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span>Community Service</span>
                </div>
            </div>

            <!-- Enhanced mini gallery with click interactions -->
            <div class="relative mt-16 flex justify-center">
                <!-- Gallery container with overflow shadow effects -->
                <div class="relative w-full max-w-4xl overflow-hidden">
                    <!-- Left gradient overlay -->
                    <div
                        class="absolute left-0 top-0 bottom-0 w-12 bg-gradient-to-r from-emerald-950 to-transparent z-10">
                    </div>

                    <!-- Right gradient overlay -->
                    <div
                        class="absolute right-0 top-0 bottom-0 w-12 bg-gradient-to-l from-emerald-950 to-transparent z-10">
                    </div>

                    <!-- Gallery slider with duplicated images for seamless looping -->
                    <div class="flex space-x-4 py-2 px-4 gallery-scroll" id="galleryScroll">
                        <!-- First set of images -->
                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/1.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Choir performance">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Sunday Worship</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/2.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Choir rehearsal">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Choir Practice</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/3.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Music director">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Praise Leaders</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/4.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Community outreach">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Community Service</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/5.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Youth choir">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">GF Junior</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/gf-2.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Full choir">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Full Ensemble</span>
                            </div>
                        </div>

                        <!-- Duplicated images for seamless looping -->
                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/1.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Choir performance">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Sunday Worship</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/2.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Choir rehearsal">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Choir Practice</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/3.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Music director">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Praise Leaders</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/4.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Community outreach">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Community Service</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/5.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Youth choir">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">GF Junior</span>
                            </div>
                        </div>

                        <div class="relative group w-32 h-32 flex-shrink-0 overflow-hidden rounded-xl shadow-lg gallery-item"
                            onclick="expandImage(this)">
                            <img src={{ asset('images/gf-2.jpg') }}
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                                alt="Full choir">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-3">
                                <span class="text-xs text-white font-medium">Full Ensemble</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Overlay for expanded image -->
            <div id="imageOverlay" class="fixed inset-0 bg-black/90 z-50 hidden flex items-center justify-center"
                onclick="closeExpandedImage()">
                <div class="relative max-w-4xl max-h-[80vh] w-full h-full flex items-center justify-center p-4">
                    <button onclick="closeExpandedImage()"
                        class="absolute top-4 right-4 text-white bg-black/40 hover:bg-black/60 rounded-full p-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <img id="expandedImage"
                        class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl opacity-0 transition-opacity duration-500 ease-in-out scale-95 transform"
                        src="" alt="Expanded image">
                    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 bg-black/60 backdrop-blur-sm px-4 py-2 rounded-full text-white text-sm font-medium opacity-0 transition-opacity duration-500"
                        id="imageCaption"></div>
                </div>
            </div>

            <!-- Navigation arrows for the expanded view -->
            <button id="prevButton"
                class="fixed top-1/2 left-4 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-3 hidden z-50 transition-all hover:scale-110"
                onclick="navigateGallery(-1)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="nextButton"
                class="fixed top-1/2 right-4 transform -translate-y-1/2 bg-black/40 hover:bg-black/60 text-white rounded-full p-3 hidden z-50 transition-all hover:scale-110"
                onclick="navigateGallery(1)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <!-- Custom styles for the enhanced gallery -->
            <style>
                @keyframes infinite-scroll {
                    0% {
                        transform: translateX(0);
                    }

                    100% {
                        transform: translateX(calc(-32px * 6 - 1rem * 6));
                        /* Width of 6 images + spacing */
                    }
                }

                .gallery-scroll {
                    animation: infinite-scroll 30s linear infinite;
                    width: auto;
                    /* Adjusted from fixed width */
                }

                .gallery-scroll:hover {
                    animation-play-state: paused;
                }

                .gallery-item {
                    cursor: pointer;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .gallery-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: scale(0.9);
                    }

                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                @keyframes pulse {
                    0% {
                        box-shadow: 0 0 0 0 rgba(236, 201, 75, 0.4);
                    }

                    70% {
                        box-shadow: 0 0 0 10px rgba(236, 201, 75, 0);
                    }

                    100% {
                        box-shadow: 0 0 0 0 rgba(236, 201, 75, 0);
                    }
                }

                .pulse-animation {
                    animation: pulse 2s infinite;
                }

                /* Make expanded image fade in when opened */
                .expanded-image-visible {
                    opacity: 1 !important;
                    transform: scale(1) !important;
                    transition: opacity 0.5s ease, transform 0.5s ease !important;
                }

                /* Caption animation */
                .caption-visible {
                    opacity: 1 !important;
                    transform: translateX(-50%) translateY(0) !important;
                    transition: opacity 0.5s ease 0.3s, transform 0.5s ease 0.3s !important;
                }
            </style>

            <!-- JavaScript for the enhanced gallery functionality -->
            <script>
                // Global variables
                let currentImageIndex = 0;
                const galleryItems = document.querySelectorAll('.gallery-item');
                const overlay = document.getElementById('imageOverlay');
                const expandedImage = document.getElementById('expandedImage');
                const imageCaption = document.getElementById('imageCaption');
                const prevButton = document.getElementById('prevButton');
                const nextButton = document.getElementById('nextButton');

                // Function to reset the gallery animation when it completes
                function resetGalleryScroll() {
                    const galleryScroll = document.getElementById('galleryScroll');
                    galleryScroll.addEventListener('animationiteration', () => {
                        // No need to reset manually as the CSS animation handles the loop
                    });
                }

                // Initialize when page loads
                document.addEventListener('DOMContentLoaded', function() {
                    resetGalleryScroll();
                });

                // Function to expand image when clicked
                function expandImage(element) {
                    // Store the index of the clicked image
                    currentImageIndex = Array.from(galleryItems).indexOf(element) % 6; // Modulo 6 to handle duplicated items

                    // Get the image source and caption
                    const imgSrc = element.querySelector('img').src;
                    const caption = element.querySelector('.text-xs').textContent;

                    // Set the expanded image source and caption
                    expandedImage.src = imgSrc;
                    imageCaption.textContent = caption;

                    // Show the overlay
                    overlay.classList.remove('hidden');

                    // Trigger the animations after a short delay
                    setTimeout(() => {
                        expandedImage.classList.add('expanded-image-visible');
                        imageCaption.classList.add('caption-visible');
                        prevButton.classList.remove('hidden');
                        nextButton.classList.remove('hidden');
                    }, 50);

                    // Prevent event propagation
                    event.stopPropagation();
                }

                // Function to close the expanded image
                function closeExpandedImage() {
                    // Hide animations first
                    expandedImage.classList.remove('expanded-image-visible');
                    imageCaption.classList.remove('caption-visible');
                    prevButton.classList.add('hidden');
                    nextButton.classList.add('hidden');

                    // Hide the overlay after the animation completes
                    setTimeout(() => {
                        overlay.classList.add('hidden');
                    }, 500);
                }

                // Function to navigate between gallery images
                function navigateGallery(direction) {
                    // Calculate new index (cycle through 0-5 for the 6 unique images)
                    currentImageIndex = (currentImageIndex + direction + 6) % 6;

                    // Hide the current image
                    expandedImage.classList.remove('expanded-image-visible');
                    imageCaption.classList.remove('caption-visible');

                    // After a short delay, update and show the new image
                    setTimeout(() => {
                        // Get the new image source and caption
                        const newImageElement = galleryItems[currentImageIndex];
                        const imgSrc = newImageElement.querySelector('img').src;
                        const caption = newImageElement.querySelector('.text-xs').textContent;

                        // Update the expanded image
                        expandedImage.src = imgSrc;
                        imageCaption.textContent = caption;

                        // Show the new image with animation
                        expandedImage.classList.add('expanded-image-visible');
                        imageCaption.classList.add('caption-visible');
                    }, 300);

                    // Prevent event propagation
                    event.stopPropagation();
                }

                // Add keyboard navigation
                document.addEventListener('keydown', function(e) {
                    if (overlay.classList.contains('hidden')) return;

                    if (e.key === 'ArrowLeft') {
                        navigateGallery(-1);
                    } else if (e.key === 'ArrowRight') {
                        navigateGallery(1);
                    } else if (e.key === 'Escape') {
                        closeExpandedImage();
                    }
                });
            </script>

            <!-- Scripture verse -->
            <div
                class="mt-16 max-w-2xl mx-auto bg-emerald-900/30 backdrop-blur-sm p-6 rounded-xl border border-emerald-800/30">
                <blockquote class="italic text-gray-300">
                    "Oh come, let us sing to the Lord; let us make a joyful noise to the rock of our salvation!"
                </blockquote>
                <p class="text-amber-300 text-sm mt-2">— Psalm 95:1</p>
            </div>
        </div>
    </div>

    <!-- Grid overlay pattern -->
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-emerald-950 pointer-events-none">
    </div>

    <!-- Animated grid lines -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-10">
        <div class="absolute inset-0 w-full h-full grid grid-cols-6 gap-px">
            <div class="border-r border-white/20"></div>
            <div class="border-r border-white/20"></div>
            <div class="border-r border-white/20"></div>
            <div class="border-r border-white/20"></div>
            <div class="border-r border-white/20"></div>
        </div>
        <div class="absolute inset-0 w-full h-full grid grid-rows-6 gap-px">
            <div class="border-b border-white/20"></div>
            <div class="border-b border-white/20"></div>
            <div class="border-b border-white/20"></div>
            <div class="border-b border-white/20"></div>
            <div class="border-b border-white/20"></div>
        </div>
    </div>

    <!-- Add custom animation to your CSS -->
    <style>
        @keyframes slow-scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-slow-scroll {
            animation: slow-scroll 30s linear infinite;
            width: 200%;
        }

        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        @keyframes float-medium {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-25px) rotate(-8deg);
            }
        }

        @keyframes float-fast {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }

        .animate-float-slow {
            animation: float-slow 10s ease-in-out infinite;
            font-size: 3rem;
            opacity: 0.15;
        }

        .animate-float-medium {
            animation: float-medium 7s ease-in-out infinite;
            font-size: 4rem;
            opacity: 0.1;
        }

        .animate-float-fast {
            animation: float-fast 8s ease-in-out infinite;
            font-size: 3.5rem;
            opacity: 0.08;
        }
    </style>
</section>
