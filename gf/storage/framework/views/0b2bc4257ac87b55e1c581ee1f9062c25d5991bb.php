<?php $__env->startSection('title', 'Payment - Mobile Money'); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 dark:bg-emerald-900/30 rounded-full mb-4">
                    <svg class="w-8 h-8 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Mobile Money Payment</h1>
                <p class="text-gray-600 dark:text-gray-400">Pay via MTN, Airtel, or other mobile payment</p>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6 mb-8">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-900 dark:text-yellow-200 mb-2">
                            Payment Integration Coming Soon
                        </h3>
                        <p class="text-yellow-800 dark:text-yellow-300 mb-4">
                            Mobile Money payment integration is currently being set up. To complete this purchase, please contact us directly for mobile payment details.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-3">
                            <a href="<?php echo e(route('contact')); ?>"
                               class="inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-lg font-semibold transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Contact Us
                            </a>
                            <a href="<?php echo e(route('shop.index')); ?>"
                               class="inline-flex items-center justify-center gap-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white px-6 py-3 rounded-lg font-semibold transition-all">
                                Back to Shop
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Money Providers Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 text-center">
                    <div class="text-3xl mb-2">📱</div>
                    <h4 class="font-semibold text-gray-900 dark:text-white">MTN Mobile Money</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Coming Soon</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 text-center">
                    <div class="text-3xl mb-2">📱</div>
                    <h4 class="font-semibold text-gray-900 dark:text-white">Airtel Money</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Coming Soon</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 text-center">
                    <div class="text-3xl mb-2">📱</div>
                    <h4 class="font-semibold text-gray-900 dark:text-white">Other Providers</h4>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Coming Soon</p>
                </div>
            </div>

            <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                <p>For immediate assistance, email us at: <a href="mailto:info@godsfamilychoir.com" class="text-emerald-600 hover:underline">info@godsfamilychoir.com</a></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\samsh\Documents\gf\gf\resources\views/shop/payment/mobile.blade.php ENDPATH**/ ?>