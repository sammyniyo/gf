<?php $__env->startSection('title', $devotion->title . ' | God\'s Family Choir'); ?>

<?php $__env->startSection('content'); ?>
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-teal-50/30"></div>
    <div class="absolute -top-32 -left-20 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-96 w-96 rounded-full bg-teal-200/40 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 pt-32 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
                    <li>
                        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-1.5 transition-colors hover:text-emerald-600">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li>
                        <a href="<?php echo e(route('devotions.index')); ?>" class="transition-colors hover:text-emerald-600">Devotions</a>
                    </li>
                    <li>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                    <li class="max-w-xs truncate font-medium text-teal-600"><?php echo e($devotion->title); ?></li>
                </ol>
            </nav>

            <!-- Category Badge -->
            <div class="mb-6">
                <span class="inline-flex items-center gap-2 rounded-xl border-2 border-emerald-200 bg-emerald-50 px-4 py-2 text-sm font-bold text-emerald-800 shadow-sm">
                    <div class="h-2 w-2 rounded-full bg-emerald-600 animate-pulse"></div>
                    <?php echo e(ucfirst($devotion->category)); ?>

                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-black leading-tight text-gray-900 sm:text-5xl lg:text-6xl mb-8">
                <?php echo e($devotion->title); ?>

            </h1>

            <!-- Scripture Reference -->
            <?php if($devotion->scripture_reference): ?>
                <div class="mb-6 flex items-center gap-3 rounded-2xl border-2 border-emerald-200 bg-gradient-to-r from-emerald-50 to-teal-50 px-6 py-4 shadow-lg">
                    <svg class="h-6 w-6 flex-shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-lg font-bold text-emerald-800"><?php echo e($devotion->scripture_reference); ?></span>
                </div>
            <?php endif; ?>

            <!-- Meta Info -->
            <div class="flex flex-wrap items-center gap-4">
                <?php if($devotion->author): ?>
                    <div class="flex items-center gap-3 rounded-xl border-2 border-gray-200 bg-white px-4 py-3 shadow-sm">
                        <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-500 to-teal-600 text-lg font-bold text-white shadow-md">
                            <?php echo e(strtoupper(substr($devotion->author, 0, 1))); ?>

                        </div>
                        <div>
                            <div class="text-xs text-gray-500">Written by</div>
                            <div class="font-bold text-gray-900"><?php echo e($devotion->author); ?></div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="flex items-center gap-2 rounded-xl border-2 border-gray-200 bg-white px-4 py-3 shadow-sm">
                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-semibold text-gray-700"><?php echo e($devotion->created_at->format('F d, Y')); ?></span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <article class="relative z-10 px-6 py-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-12 lg:grid-cols-3">
                <!-- Main Column -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Featured Image -->
                    <?php if($devotion->featured_image): ?>
                        <div class="overflow-hidden rounded-3xl shadow-2xl border-4 border-white">
                            <img src="<?php echo e(asset('storage/' . $devotion->featured_image)); ?>" alt="<?php echo e($devotion->title); ?>" class="w-full h-auto">
                        </div>
                    <?php endif; ?>

                    <!-- Content -->
                    <div class="prose prose-lg max-w-none rounded-3xl border-2 border-gray-100 bg-white p-8 shadow-lg">
                        <style>
                            .prose {
                                font-size: 1.125rem;
                                line-height: 1.8;
                                color: #374151;
                            }
                            .prose p {
                                margin-bottom: 1.5rem;
                            }
                            .prose h2 {
                                font-size: 1.875rem;
                                font-weight: 800;
                                color: #059669;
                                margin-top: 2rem;
                                margin-bottom: 1rem;
                            }
                            .prose h3 {
                                font-size: 1.5rem;
                                font-weight: 700;
                                color: #0d9488;
                                margin-top: 1.5rem;
                                margin-bottom: 0.75rem;
                            }
                            .prose strong {
                                color: #065f46;
                                font-weight: 700;
                            }
                        </style>
                        <?php echo nl2br(e($devotion->content)); ?>

                    </div>

                    <!-- Scripture Reference Box -->
                    <?php if($devotion->scripture_reference): ?>
                        <div class="overflow-hidden rounded-2xl border-2 border-emerald-200 bg-gradient-to-r from-emerald-50 via-teal-50 to-emerald-50 shadow-lg">
                            <div class="border-b-2 border-emerald-200 bg-white/80 px-6 py-4">
                                <h3 class="flex items-center gap-2 text-lg font-bold text-emerald-800">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    Scripture Reference
                                </h3>
                            </div>
                            <div class="p-6">
                                <p class="text-lg font-bold text-emerald-700"><?php echo e($devotion->scripture_reference); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Prayer Section -->
                    <div class="overflow-hidden rounded-2xl border-2 border-teal-200 bg-gradient-to-r from-teal-50 via-cyan-50 to-teal-50 shadow-lg">
                        <div class="border-b-2 border-teal-200 bg-white/80 px-6 py-4">
                            <h3 class="flex items-center gap-2 text-lg font-bold text-teal-800">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                </svg>
                                Prayer
                            </h3>
                        </div>
                        <div class="p-6">
                            <p class="text-teal-800 italic leading-relaxed">
                                "Heavenly Father, thank you for this time of reflection and learning. Help us to apply the wisdom from your word in our daily lives. Guide our choir as we serve you through music and fellowship. Strengthen our faith and draw us closer to you. In Jesus' name, Amen."
                            </p>
                        </div>
                    </div>

                    <!-- Share Section -->
                    <div class="overflow-hidden rounded-2xl border-2 border-gray-200 bg-white shadow-lg">
                        <div class="border-b-2 border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-bold text-gray-900">Share This Devotion</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-3 gap-4">
                                <button onclick="shareOnSocial('facebook')" class="group flex flex-col items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-4 font-bold text-white shadow-lg transition-all hover:bg-blue-700 hover:shadow-xl hover:scale-105">
                                    <svg class="h-6 w-6 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    <span class="text-xs">Facebook</span>
                                </button>
                                <button onclick="shareOnSocial('twitter')" class="group flex flex-col items-center justify-center gap-2 rounded-xl bg-sky-500 px-4 py-4 font-bold text-white shadow-lg transition-all hover:bg-sky-600 hover:shadow-xl hover:scale-105">
                                    <svg class="h-6 w-6 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                    </svg>
                                    <span class="text-xs">Twitter</span>
                                </button>
                                <button onclick="shareOnSocial('whatsapp')" class="group flex flex-col items-center justify-center gap-2 rounded-xl bg-green-600 px-4 py-4 font-bold text-white shadow-lg transition-all hover:bg-green-700 hover:shadow-xl hover:scale-105">
                                    <svg class="h-6 w-6 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                    </svg>
                                    <span class="text-xs">WhatsApp</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Related Devotions -->
                    <?php if($relatedDevotions->count() > 0): ?>
                        <div class="overflow-hidden rounded-2xl border-2 border-emerald-100 bg-gradient-to-br from-emerald-50 to-teal-50 shadow-lg">
                            <div class="border-b-2 border-emerald-200 bg-white/80 px-6 py-4">
                                <h3 class="flex items-center gap-2 text-lg font-bold text-emerald-800">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    Related Devotions
                                </h3>
                            </div>
                            <div class="p-4 space-y-4">
                                <?php $__currentLoopData = $relatedDevotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('devotions.show', $related)); ?>" class="group block rounded-xl border-2 border-white bg-white p-4 shadow-sm transition-all hover:shadow-md hover:-translate-y-1">
                                        <div class="flex gap-3">
                                            <?php if($related->featured_image): ?>
                                                <img src="<?php echo e(asset('storage/' . $related->featured_image)); ?>" alt="<?php echo e($related->title); ?>" class="h-16 w-16 flex-shrink-0 rounded-lg object-cover">
                                            <?php else: ?>
                                                <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-emerald-400 via-teal-400 to-cyan-500">
                                                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                </div>
                                            <?php endif; ?>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="text-sm font-bold text-emerald-800 line-clamp-2 group-hover:text-emerald-600 transition-colors">
                                                    <?php echo e($related->title); ?>

                                                </h4>
                                                <p class="mt-1 text-xs text-emerald-600">
                                                    <?php echo e($related->created_at->format('M d, Y')); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Newsletter Signup -->
                    <div class="overflow-hidden rounded-2xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-600 via-teal-600 to-emerald-600 shadow-xl">
                        <div class="p-6 text-white space-y-4">
                            <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm border-2 border-white/30">
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold">Stay Updated</h3>
                            <p class="text-emerald-50 text-sm">
                                Get daily devotions and spiritual insights delivered to your inbox
                            </p>
                            <form action="<?php echo e(route('subscribe')); ?>" method="POST" class="space-y-3">
                                <?php echo csrf_field(); ?>
                                <input type="email" name="email" placeholder="Your email address" required
                                       class="w-full rounded-lg border-2 border-white/30 bg-white/10 backdrop-blur-sm px-4 py-3 text-white placeholder-emerald-200 transition-all focus:border-white focus:ring-2 focus:ring-white/30 outline-none">
                                <button type="submit" class="w-full rounded-lg bg-white px-4 py-3 font-bold text-emerald-700 shadow-lg transition-all hover:bg-gray-50 hover:shadow-xl">
                                    Subscribe Now
                                </button>
                            </form>
                            <?php if(session('subscriber_success')): ?>
                                <div class="rounded-lg border-2 border-white/50 bg-white/20 backdrop-blur-sm p-3 text-sm">
                                    <?php echo e(session('subscriber_success')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Back to Devotions CTA -->
    <section class="relative z-10 px-6 pb-32 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-5xl">
            <div class="relative overflow-hidden rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-600 via-teal-500 to-emerald-600 p-12 text-center shadow-2xl">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
                <div class="relative">
                    <h2 class="text-4xl font-bold text-white mb-4 sm:text-5xl">
                        Explore More Devotions
                    </h2>
                    <p class="text-xl text-emerald-50 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Continue your spiritual journey with more daily devotions and biblical insights
                    </p>
                    <a href="<?php echo e(route('devotions.index')); ?>" class="inline-flex items-center gap-3 rounded-xl bg-white px-8 py-4 font-bold text-emerald-700 shadow-xl transition-all hover:shadow-2xl hover:bg-gray-50 hover:-translate-y-1">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>View All Devotions</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.static.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('static.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<script>
// Share on Social Media
function shareOnSocial(platform) {
    const url = window.location.href;
    const title = encodeURIComponent('<?php echo e($devotion->title); ?>');

    let shareUrl = '';
    switch(platform) {
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${title}`;
            break;
        case 'whatsapp':
            shareUrl = `https://wa.me/?text=${title}%20${encodeURIComponent(url)}`;
            break;
    }

    if (shareUrl) {
        window.open(shareUrl, '_blank', 'width=600,height=400');
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/devotions/show.blade.php ENDPATH**/ ?>