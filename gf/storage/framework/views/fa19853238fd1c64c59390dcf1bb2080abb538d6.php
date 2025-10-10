<!-- resources/views/components/landing/testimonials.blade.php -->
<section class="bg-gradient-to-b from-emerald-50 to-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-800 rounded-full text-sm font-semibold mb-4">
                TESTIMONIALS
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Hearts <span class="text-emerald-600">Touched by Our Ministry</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                Read what our members and audience have to say about their experiences with God's Family Choir
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = [
                [
                    'name' => 'Pastor Emmanuel K.',
                    'role' => 'Church Leader',
                    'image' => '1.jpg',
                    'quote' => 'God\'s Family Choir doesn\'t just perform—they usher people into the presence of God. Their ministry has blessed our congregation beyond measure. Every song carries deep spiritual weight.',
                    'rating' => 5
                ],
                [
                    'name' => 'Marie Grace U.',
                    'role' => 'Choir Member Since 2015',
                    'image' => '2.jpg',
                    'quote' => 'Joining this choir transformed my life. It\'s not just about music—it\'s about spiritual growth, discipline, and finding a true family. I\'ve grown both as a musician and as a believer.',
                    'rating' => 5
                ],
                [
                    'name' => 'David M.',
                    'role' => 'Concert Attendee',
                    'image' => '3.jpg',
                    'quote' => 'I attended their Easter concert and was moved to tears. The harmonies were heavenly, and you could feel the genuine worship in every note. This is anointed music ministry at its finest.',
                    'rating' => 5
                ],
                [
                    'name' => 'Sarah N.',
                    'role' => 'Parent of Youth Member',
                    'image' => '4.jpg',
                    'quote' => 'My daughter has blossomed since joining the youth program. Not only has her voice improved dramatically, but her confidence and character have grown. The mentors truly care about the children.',
                    'rating' => 5
                ],
                [
                    'name' => 'Jean Paul R.',
                    'role' => 'Vocal Student',
                    'image' => '5.jpg',
                    'quote' => 'The vocal training I received here has been exceptional. Professional instructors, biblical foundation, and practical performance experience. This is world-class music education with a kingdom purpose.',
                    'rating' => 5
                ],
                [
                    'name' => 'Claudine I.',
                    'role' => 'Online Follower',
                    'image' => '1.jpg',
                    'quote' => 'I listen to their worship albums every morning. The songs are so anointed and beautifully arranged. Even though I\'m miles away, their music ministers to my soul daily through streaming platforms.',
                    'rating' => 5
                ],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <!-- Rating Stars -->
                    <div class="flex gap-1 mb-4">
                        <?php for($i = 0; $i < $testimonial['rating']; $i++): ?>
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        <?php endfor; ?>
                    </div>

                    <!-- Quote -->
                    <blockquote class="text-gray-700 mb-6 leading-relaxed italic">
                        "<?php echo e($testimonial['quote']); ?>"
                    </blockquote>

                    <!-- Author Info -->
                    <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                        <div class="relative">
                            <img src="<?php echo e(asset('images/' . $testimonial['image'])); ?>"
                                alt="<?php echo e($testimonial['name']); ?>"
                                class="w-14 h-14 rounded-full object-cover ring-4 ring-emerald-100 group-hover:ring-emerald-200 transition-all">
                            <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900"><?php echo e($testimonial['name']); ?></p>
                            <p class="text-sm text-emerald-600"><?php echo e($testimonial['role']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Statistics Bar -->
        <div class="mt-16 bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <p class="text-4xl font-bold text-emerald-600 mb-2">4.9</p>
                    <p class="text-sm text-gray-600">Average Rating</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-emerald-600 mb-2">500+</p>
                    <p class="text-sm text-gray-600">Happy Members</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-emerald-600 mb-2">98%</p>
                    <p class="text-sm text-gray-600">Satisfaction Rate</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-emerald-600 mb-2">25+</p>
                    <p class="text-sm text-gray-600">Years of Excellence</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="mt-12 text-center">
            <p class="text-gray-600 mb-6 text-lg">Want to share your experience with us?</p>
            <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span>Send Us Your Story</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/components/landing/testimonials.blade.php ENDPATH**/ ?>