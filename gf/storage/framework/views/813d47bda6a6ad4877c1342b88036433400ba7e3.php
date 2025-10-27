<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['album', 'featured' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['album', 'featured' => false]); ?>
<?php foreach (array_filter((['album', 'featured' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="group relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-gray-100">
    <!-- Subtle glow effect on hover -->
    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-400 to-purple-400 rounded-2xl opacity-0 group-hover:opacity-10 blur transition-opacity duration-300"></div>

    <!-- Featured Badge -->
    <?php if($featured): ?>
    <div class="absolute top-4 right-4 z-20">
        <span class="bg-gradient-to-r from-yellow-400 via-amber-400 to-yellow-500 text-yellow-900 text-xs font-extrabold px-4 py-2 rounded-full shadow-lg flex items-center gap-1 animate-pulse">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            FEATURED
        </span>
    </div>
    <?php endif; ?>

    <!-- Album Cover -->
    <a href="<?php echo e(route('shop.show', $album->id)); ?>" class="block relative aspect-square overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
        <img src="<?php echo e($album->cover_image_url); ?>"
             alt="<?php echo e($album->title); ?>"
             class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105">

        <!-- Subtle shimmer effect -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>

        <!-- Overlay on hover -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-center pb-8">
            <div class="flex gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                <?php if($album->spotify_url): ?>
                <a href="<?php echo e($album->spotify_url); ?>"
                   target="_blank"
                   class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full transition-all transform hover:scale-110"
                   onclick="event.stopPropagation()">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                    </svg>
                </a>
                <?php endif; ?>

                <?php if($album->apple_music_url): ?>
                <a href="<?php echo e($album->apple_music_url); ?>"
                   target="_blank"
                   class="bg-pink-500 hover:bg-pink-600 text-white p-3 rounded-full transition-all transform hover:scale-110"
                   onclick="event.stopPropagation()">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.997 6.124c0-.738-.065-1.47-.24-2.19-.317-1.31-1.062-2.31-2.18-3.043C21.003.517 20.373.285 19.7.164c-.517-.093-1.038-.135-1.564-.15-.04-.003-.083-.01-.124-.013H5.988c-.152.01-.303.017-.455.026C4.786.07 4.043.15 3.34.428 2.004.958 1.04 1.88.475 3.208c-.192.448-.292.925-.363 1.408-.056.392-.088.785-.1 1.18-.013.37-.006.74-.006 1.11v9.185c0 .158.002.316.006.474.014.55.05 1.097.175 1.635.088.382.21.753.384 1.106.65 1.318 1.63 2.19 2.948 2.68.753.28 1.534.402 2.336.445.302.017.605.025.908.025h12.054c.307 0 .616-.006.922-.023.867-.05 1.713-.19 2.52-.514 1.048-.42 1.863-1.11 2.442-2.078.41-.686.63-1.424.723-2.193.042-.348.063-.697.068-1.046.005-.37.004-.738.004-1.108V6.124zm-7.78 10.56c-.97.093-1.9-.173-2.69-.808-.552-.444-.978-1.003-1.3-1.64-.41-.818-.616-1.688-.62-2.59-.004-.92.206-1.79.62-2.608.324-.64.752-1.2 1.306-1.644.794-.636 1.724-.903 2.695-.808.844.08 1.588.404 2.25.924.488.383.88.856 1.188 1.392.312.542.52 1.125.604 1.737.086.62.07 1.24-.036 1.854-.102.59-.3 1.153-.596 1.683-.318.57-.732 1.07-1.25 1.48-.662.52-1.406.844-2.25.924-.07.008-.14.015-.21.02zM9.63 8.287c0-.042.003-.084.003-.127 0-2.01 0-4.022.002-6.033.004-.41.166-.576.578-.582.16-.002.32 0 .48 0h6.55c.418 0 .583.166.586.585.003 2.012.003 4.024 0 6.036 0 .053.002.106-.002.16-.01.08-.057.126-.138.126-.08 0-.128-.046-.137-.127-.005-.054-.002-.107-.002-.16 0-2.01 0-4.02-.002-6.03-.003-.37-.16-.527-.53-.527H10.47c-.37 0-.526.157-.527.527-.002 2.01-.002 4.02 0 6.03 0 .042-.003.085-.003.127 0 .09-.05.14-.138.138-.09-.002-.137-.05-.14-.14z"/>
                    </svg>
                </a>
                <?php endif; ?>

                <?php if($album->youtube_url): ?>
                <a href="<?php echo e($album->youtube_url); ?>"
                   target="_blank"
                   class="bg-red-500 hover:bg-red-600 text-white p-3 rounded-full transition-all transform hover:scale-110"
                   onclick="event.stopPropagation()">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </a>

    <!-- Album Info -->
    <div class="p-6">
        <a href="<?php echo e(route('shop.show', $album->id)); ?>" class="block">
            <h3 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                <?php echo e($album->title); ?>

            </h3>
        </a>

        <?php if($album->description): ?>
        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
            <?php echo e($album->description); ?>

        </p>
        <?php endif; ?>

        <div class="flex items-center justify-between mb-4">
            <?php if($album->track_count > 0): ?>
            <span class="text-sm text-gray-500">
                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
                </svg>
                <?php echo e($album->track_count); ?> tracks
            </span>
            <?php endif; ?>

            <?php if($album->release_date): ?>
            <span class="text-sm text-gray-500">
                <?php echo e($album->release_date->format('Y')); ?>

            </span>
            <?php endif; ?>
        </div>

        <!-- Price and CTA -->
        <div class="flex items-center justify-between pt-6 mt-2 border-t-2 border-gray-200">
            <div>
                <?php if($album->isFree()): ?>
                <div class="flex items-center gap-2">
                    <span class="text-3xl font-extrabold bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent">FREE</span>
                    <svg class="w-5 h-5 text-blue-500 animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <?php else: ?>
                <div>
                    <span class="text-3xl font-extrabold text-gray-800">$<?php echo e(number_format($album->price, 2)); ?></span>
                    <div class="text-xs text-gray-500 mt-0.5">One-time purchase</div>
                </div>
                <?php endif; ?>
            </div>

            <a href="<?php echo e(route('shop.show', $album->id)); ?>"
               class="group relative bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white px-6 py-3 rounded-xl font-bold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl overflow-hidden">
                <!-- Subtle shine effect -->
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-500"></span>
                <span class="relative flex items-center gap-2">
                    <?php echo e($album->isFree() ? 'Download' : 'Buy Now'); ?>

                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
        </div>
    </div>
</div>

<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/shop/album-card.blade.php ENDPATH**/ ?>