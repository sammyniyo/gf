<!-- Footer -->
<footer class="relative bg-gradient-to-b from-slate-50 to-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- About Section -->
            <div class="lg:col-span-1">
                <h3 class="text-xl font-bold mb-3 bg-gradient-to-r from-emerald-600 to-amber-600 bg-clip-text text-transparent">
                    God's Family Choir
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed mb-4">
                    Sharing the love of Christ through sacred music since 1998.
                </p>

                <!-- Quick Stats -->
                <div class="flex gap-4">
                    <div class="text-center">
                        <p class="text-lg font-bold text-emerald-600">25+</p>
                        <p class="text-xs text-slate-500">Years</p>
                    </div>
                    <div class="text-center">
                        <p class="text-lg font-bold text-amber-600">400+</p>
                        <p class="text-xs text-slate-500">Members</p>
                    </div>
                    <div class="text-center">
                        <p class="text-lg font-bold text-blue-600">4</p>
                        <p class="text-xs text-slate-500">Albums</p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <?php $__currentLoopData = [
                        ['name' => 'Home', 'url' => route('home')],
                        ['name' => 'About Us', 'url' => route('about')],
                        ['name' => 'Events', 'url' => route('events.index')],
                        ['name' => 'Our Story', 'url' => route('story')],
                        ['name' => 'Devotions', 'url' => route('devotions.index')],
                        ['name' => 'Join Choir', 'url' => route('choir.register.form')],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e($link['url']); ?>" class="text-sm text-slate-600 hover:text-emerald-600 transition-colors">
                                <?php echo e($link['name']); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <!-- Contact Information -->
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-4">Get in Touch</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-emerald-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="text-sm text-slate-600 hover:text-emerald-600 transition-colors break-all">
                            asa.godsfamilychoir2017@gmail.com
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <a href="tel:+250783871782" class="text-sm text-slate-600 hover:text-amber-600 transition-colors">
                            +250 783 871 782
                        </a>
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <p class="text-sm text-slate-600">ASA UR Nyarugenge SDA<br>Kigali, Rwanda</p>
                    </li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-sm font-semibold text-slate-900 mb-4">Stay Connected</h4>
                <p class="text-slate-600 text-xs mb-3">
                    Get updates on events and new music
                </p>

                <?php if(session('subscriber_success')): ?>
                    <div class="mb-3 p-2 bg-emerald-50 border border-emerald-200 rounded-lg text-emerald-700 text-xs">
                        <?php echo e(session('subscriber_success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('subscriber_error')): ?>
                    <div class="mb-3 p-2 bg-red-50 border border-red-200 rounded-lg text-red-700 text-xs">
                        <?php echo e(session('subscriber_error')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('subscribe')); ?>" method="POST" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <div class="flex gap-2">
                        <input type="email" name="email" placeholder="Your email" required
                            class="flex-1 px-3 py-2 bg-white border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent text-sm placeholder-slate-400">
                        <button type="submit"
                            class="px-4 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors">
                            Join
                        </button>
                    </div>
                </form>

                <!-- Social Media -->
                <div class="flex gap-2">
                    <a href="https://www.facebook.com/FChoirOfGod" class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors" title="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/choir_of_god" class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-gradient-to-br hover:from-purple-600 hover:to-pink-600 hover:text-white transition-colors" title="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@godsfamilychoir5583" class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors" title="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>

                    <a
                        href="https://www.tiktok.com/@gods.family.choir?_t=ZM-90j5gj8DyqC&_r=1"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="TikTok"
                        class="group w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center transition-colors hover:bg-black hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-black/60"
                        title="TikTok"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <!-- using your existing path; now inherits color properly -->
                        <path d="M9.506 2.002a0.75 0.75 0 0 1 0.75-0.75h2.23a0.75 0.75 0 0 1 0.75 0.75v9.427l0.055 0.011c1.413 0.287 2.959 0.033 4.111-0.772a0.75 0.75 0 0 1 1.044 0.206l1.334 2.062a0.75 0.75 0 0 1-0.221 1.024c-2.053 1.32-4.679 1.646-6.984 0.937l-0.054-0.016v5.484c0 2.29-1.856 4.145-4.146 4.145a4.146 4.146 0 0 1 0-8.291c0.38 0 0.75 0.036 1.104 0.107V2.002zm2.224-0.75h-2.224a1.25 1.25 0 0 0-1.25 1.25v11.208c-0.399-0.065-0.815-0.099-1.241-0.099a5.646 5.646 0 1 0 5.646 5.646V11.73c2.355 0.44 4.947 0.114 7.113-1.057a1.25 1.25 0 0 0 0.366-1.703l-1.333-2.063a1.25 1.25 0 0 0-1.74-0.343c-0.872 0.62-2.043 0.85-3.131 0.644V2.002a1.25 1.25 0 0 0-1.25-1.25z"/>
                        </svg>
                        <span class="sr-only">TikTok</span>
                    </a>

                    <!-- Spotify -->
                    <a
                        href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Spotify"
                        class="group w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center transition-colors hover:bg-green-500 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-600/60"
                        title="Spotify"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0a12 12 0 1 0 0 24A12 12 0 0 0 12 0zm5.09 17.42a.746.746 0 0 1-1.03.24c-2.819-1.73-6.382-2.116-10.565-1.16a.746.746 0 1 1-.334-1.456c4.56-1.045 8.483-.61 11.583 1.295a.747.747 0 0 1 .346 1.08zm1.47-2.855a.933.933 0 0 1-1.277.3c-3.228-1.99-8.148-2.574-11.963-1.415a.933.933 0 0 1-.555-1.787c4.226-1.312 9.566-.66 13.297 1.507.444.275.583.867.298 1.395zm.169-2.844c-3.727-2.214-9.938-2.418-13.391-1.329a1.117 1.117 0 0 1-.654-2.132c4.002-1.225 10.879-.991 14.987 1.471a1.117 1.117 0 1 1-1.064 1.99z"/>
                        </svg>
                        <span class="sr-only">Spotify</span>
                    </a>

                    <!-- Apple Music -->
                    <a
                        href="https://music.apple.com/us/artist/gods-family-choir/1793673660"
                        target="_blank" rel="noopener noreferrer"
                        aria-label="Apple Music"
                        class="group w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center transition-colors hover:bg-purple-600 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-600/60"
                        title="Apple Music"
                    >
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.365 1.43c0 1.14-.969 2.365-2.096 2.365-.116 0-.234-.012-.354-.036-.384-.086-.868-.553-.12-1.505 1.099-1.396 2.57-1.175 2.57-.824zm-1.881 3.167c.258-.057.524-.092.795-.092.823 0 1.668.321 2.42.886.665.497 1.334 1.322 1.86 2.355.26.505.541 1.19.832 2.031a11.28 11.28 0 0 1 .498 4.27c0 2.18-.624 4.272-1.768 5.975-.874 1.281-1.882 2.405-3.018 2.405-.427 0-.669-.11-1.05-.266-.382-.158-.682-.237-1.14-.237-.454 0-.749.079-1.122.237-.372.154-.626.265-1.021.265-1.221 0-2.23-1.185-3.11-2.471a11.879 11.879 0 0 1-1.685-6.234 9.72 9.72 0 0 1 .443-2.6c.291-.812.584-1.474.837-1.97.531-1.044 1.21-1.878 1.89-2.377.753-.563 1.564-.884 2.387-.884.297 0 .589.037.872.108.411.104.787.169 1.256.169.435 0 .821-.058 1.237-.175z"/>
                        </svg>
                        <span class="sr-only">Apple Music</span>
                    </a>


                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-8 pt-6 border-t border-slate-200">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Copyright -->
                <p class="text-slate-600 text-xs text-center md:text-left">
                    © <?php echo e(date('Y')); ?> <span class="text-emerald-600 font-semibold">God's Family Choir</span> - ASA UR Nyarugenge SDA. All rights reserved.
                </p>

                <!-- Links -->
                <div class="flex items-center gap-4">
                    <a href="<?php echo e(route('privacy-policy')); ?>" class="text-slate-500 hover:text-emerald-600 text-xs transition-colors">
                        Privacy
                    </a>
                    <a href="<?php echo e(route('terms-of-use')); ?>" class="text-slate-500 hover:text-emerald-600 text-xs transition-colors">
                        Terms
                    </a>
                    <a href="<?php echo e(route('contact')); ?>" class="text-slate-500 hover:text-emerald-600 text-xs transition-colors">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Scripture Banner -->
            <div class="mt-6 text-center">
                <div class="inline-block bg-gradient-to-r from-emerald-50 to-amber-50 rounded-lg px-6 py-3 border border-emerald-200">
                    <p class="text-slate-700 italic text-xs">
                        "Make a joyful noise to the Lord, all the earth!"
                    </p>
                    <p class="text-emerald-600 font-semibold text-xs mt-0.5">— Psalm 100:1</p>
                </div>
            </div>

            <!-- Contact Developer Section -->
            <div class="mt-6 text-center">
                <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 group">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <div class="text-left">
                            <p class="text-xs font-semibold text-slate-600">Website Developed by</p>
                            <p class="text-sm font-bold text-slate-900">GF Social Media Team</p>
                        </div>
                    </div>
                    <div class="h-8 w-px bg-slate-300"></div>
                    <div class="flex items-center gap-2">
                        <a href="mailto:samniyo20@gmail.com" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xs font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-sm hover:shadow-md">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Contact Developer</span>
                        </a>
                        <a href="https://wa.me/250783871782" target="_blank" class="inline-flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all duration-300 shadow-sm hover:shadow-md" title="WhatsApp Developer">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/static/footer.blade.php ENDPATH**/ ?>