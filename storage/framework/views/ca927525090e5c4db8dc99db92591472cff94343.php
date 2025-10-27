<!-- Featured Audio Player Section -->
<section class="relative bg-gradient-to-b from-white to-gray-50 py-24 overflow-hidden">
    <!-- Subtle Background Elements -->
    <div class="absolute inset-0">
        <!-- Soft Colored Blobs -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-200/25 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-amber-200/20 rounded-full blur-3xl animate-pulse-slow animation-delay-2000"></div>

        <!-- Dissolving Gradient Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.15]">
            <!-- Horizontal gradient lines -->
            <div class="absolute inset-0" style="
                background-image: repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 99px,
                    rgba(16, 185, 129, 0.12) 99px,
                    rgba(251, 191, 36, 0.12) 100px
                );
                mask-image: radial-gradient(ellipse at center, black 25%, transparent 75%);
                -webkit-mask-image: radial-gradient(ellipse at center, black 25%, transparent 75%);
            "></div>
            <!-- Vertical gradient lines -->
            <div class="absolute inset-0" style="
                background-image: repeating-linear-gradient(
                    90deg,
                    transparent,
                    transparent 99px,
                    rgba(16, 185, 129, 0.12) 99px,
                    rgba(251, 191, 36, 0.12) 100px
                );
                mask-image: radial-gradient(ellipse at center, black 25%, transparent 75%);
                -webkit-mask-image: radial-gradient(ellipse at center, black 25%, transparent 75%);
            "></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-emerald-700 mb-6">
                Listen Now
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Featured <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Worship Songs</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Listen to our latest Seventh-day Adventist worship songs and be blessed
            </p>
        </div>

        <!-- Audio Player Grid -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <!-- Song 1 -->
            <div class="group relative bg-white rounded-3xl border border-emerald-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <!-- Album Art -->
                <div class="relative h-72 overflow-hidden">
                    <img src="<?php echo e(asset('images/gf-2.jpg')); ?>" alt="Cya Gitondo" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent"></div>

                    <!-- Play Icon Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="w-20 h-20 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-2xl transform scale-0 group-hover:scale-100 transition-transform duration-300">
                            <svg class="w-10 h-10 text-emerald-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Song Info Badge -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="bg-white/95 backdrop-blur-sm rounded-xl p-4 shadow-lg">
                            <h3 class="text-gray-900 font-bold text-lg mb-1">Cya Gitondo</h3>
                            <p class="text-gray-600 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                </svg>
                                God's Family Choir
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Audio Player Section -->
                <div class="p-6">
                    <!-- Custom Audio Player -->
                    <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl p-4 border border-emerald-100">
                        <audio controls class="w-full audio-player-modern" controlsList="nodownload">
                            <source src="<?php echo e(asset('audio/cya_gitondo.mp3')); ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>

                    <!-- Song Details -->
                    <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                            </svg>
                            Album 4
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            4:23
                        </span>
                    </div>
                </div>
            </div>

            <!-- Song 2 -->
            <div class="group relative bg-white rounded-3xl border border-amber-100 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <!-- Album Art -->
                <div class="relative h-72 overflow-hidden">
                    <img src="<?php echo e(asset('images/1.jpg')); ?>" alt="Calvary" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700" />
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent"></div>

                    <!-- Play Icon Overlay -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="w-20 h-20 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-2xl transform scale-0 group-hover:scale-100 transition-transform duration-300">
                            <svg class="w-10 h-10 text-amber-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Song Info Badge -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="bg-white/95 backdrop-blur-sm rounded-xl p-4 shadow-lg">
                            <h3 class="text-gray-900 font-bold text-lg mb-1">Calvary</h3>
                            <p class="text-gray-600 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                </svg>
                                God's Family Choir
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Audio Player Section -->
                <div class="p-6">
                    <!-- Custom Audio Player -->
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-4 border border-amber-100">
                        <audio controls class="w-full audio-player-modern" controlsList="nodownload">
                            <source src="<?php echo e(asset('audio/calvary.mp3')); ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>

                    <!-- Song Details -->
                    <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
                            </svg>
                            Album 3
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            4:59
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- YouTube Call-to-Action -->
        <div class="max-w-5xl mx-auto">
            <div class="group relative bg-white rounded-3xl border border-gray-200 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500">
                <div class="grid md:grid-cols-5 gap-0">
                    <!-- Left: Icon Column -->
                    <div class="md:col-span-2 bg-gradient-to-br from-red-50 to-pink-50 p-8 flex items-center justify-center relative overflow-hidden">
                        <!-- Animated Background Circles -->
                        <div class="absolute inset-0">
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 bg-red-200/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                            <div class="absolute top-1/4 left-1/4 w-20 h-20 bg-pink-200/20 rounded-full blur-xl group-hover:scale-125 transition-transform duration-500"></div>
                        </div>

                        <!-- YouTube Icon -->
                        <div class="relative z-10 transform group-hover:scale-110 transition-transform duration-500">
                            <div class="w-24 h-24 bg-gradient-to-br from-red-600 to-red-500 rounded-3xl flex items-center justify-center shadow-2xl shadow-red-500/40 group-hover:shadow-red-500/60 transition-shadow duration-300 rotate-6 group-hover:rotate-12 transition-all">
                                <svg class="w-14 h-14 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Content Column -->
                    <div class="md:col-span-3 p-8 flex flex-col justify-center">
                        <div class="mb-2">
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wide text-red-600">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                More Content Available
                            </span>
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">
                            Explore Our Full Music Library
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Watch live performances, behind-the-scenes content, and our complete worship song collection on YouTube.
                        </p>
                        <div>
                            <a href="https://www.youtube.com/@godsfamilychoir5583" target="_blank"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-600 to-red-500 text-white font-semibold rounded-xl shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/50 hover:-translate-y-1 transition-all duration-300 group/btn">
                                <span>Subscribe on YouTube</span>
                                <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    /* Modern Audio Player Styling */
    .audio-player-modern {
        height: 48px;
        border-radius: 16px;
        outline: none;
    }

    .audio-player-modern::-webkit-media-controls-panel {
        background: linear-gradient(to right, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.95));
        border-radius: 16px;
        backdrop-filter: blur(10px);
    }

    .audio-player-modern::-webkit-media-controls-play-button {
        background-color: rgba(16, 185, 129, 0.15);
        border-radius: 50%;
    }

    .audio-player-modern::-webkit-media-controls-current-time-display,
    .audio-player-modern::-webkit-media-controls-time-remaining-display {
        color: #374151;
        font-weight: 500;
        font-size: 12px;
    }

    .audio-player-modern::-webkit-media-controls-timeline {
        border-radius: 8px;
    }
</style>
<?php /**PATH C:\Users\samsh\Documents\gf\resources\views/components/landing/audio-player.blade.php ENDPATH**/ ?>