<!-- Cookie Consent Banner -->
<div id="cookie-consent-banner"
     x-data="{ show: false, preferences: { essential: true, analytics: false, marketing: false } }"
     x-init="
        if (!localStorage.getItem('cookieConsent')) {
            setTimeout(() => show = true, 1000);
        }
        if (localStorage.getItem('cookiePreferences')) {
            preferences = JSON.parse(localStorage.getItem('cookiePreferences'));
        }
     "
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-4"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;"
     class="fixed bottom-0 left-0 right-0 z-50 p-4 md:p-6">

    <div class="max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6 md:p-8">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                We Value Your Privacy
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                We use cookies to enhance your browsing experience
                            </p>
                        </div>
                    </div>
                    <button @click="show = false"
                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Content -->
                <div class="space-y-4">
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        We use cookies and similar technologies to help personalize content, tailor and measure ads,
                        and provide a better experience. By clicking Accept All, you agree to this, as outlined in our
                        <a href="<?php echo e(route('privacy-policy')); ?>" class="text-emerald-600 hover:text-emerald-700 underline">Cookie Policy</a>.
                    </p>

                    <!-- Cookie Preferences (Collapsible) -->
                    <div x-data="{ showPreferences: false }" class="space-y-2">
                        <button @click="showPreferences = !showPreferences"
                                class="flex items-center justify-between w-full text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">
                            <span>Customize Cookie Preferences</span>
                            <svg class="w-5 h-5 transform transition-transform"
                                 :class="{ 'rotate-180': showPreferences }"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="showPreferences"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             class="space-y-3 pt-3 border-t border-gray-200 dark:border-gray-700">

                            <!-- Essential Cookies -->
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <label class="font-medium text-sm text-gray-900 dark:text-white">
                                        Essential Cookies
                                    </label>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-0.5">
                                        Required for the website to function properly. Cannot be disabled.
                                    </p>
                                </div>
                                <div class="ml-4">
                                    <input type="checkbox"
                                           checked
                                           disabled
                                           class="w-5 h-5 text-emerald-600 rounded focus:ring-emerald-500 opacity-50 cursor-not-allowed">
                                </div>
                            </div>

                            <!-- Analytics Cookies -->
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <label class="font-medium text-sm text-gray-900 dark:text-white">
                                        Analytics Cookies
                                    </label>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-0.5">
                                        Help us understand how visitors interact with our website.
                                    </p>
                                </div>
                                <div class="ml-4">
                                    <input type="checkbox"
                                           x-model="preferences.analytics"
                                           class="w-5 h-5 text-emerald-600 rounded focus:ring-emerald-500 border-gray-300">
                                </div>
                            </div>

                            <!-- Marketing Cookies -->
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <label class="font-medium text-sm text-gray-900 dark:text-white">
                                        Marketing Cookies
                                    </label>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-0.5">
                                        Used to track visitors across websites for advertising purposes.
                                    </p>
                                </div>
                                <div class="ml-4">
                                    <input type="checkbox"
                                           x-model="preferences.marketing"
                                           class="w-5 h-5 text-emerald-600 rounded focus:ring-emerald-500 border-gray-300">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        <button @click="
                            preferences = { essential: true, analytics: true, marketing: true };
                            localStorage.setItem('cookieConsent', 'all');
                            localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
                            show = false;
                        "
                        class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl">
                            Accept All Cookies
                        </button>

                        <button @click="
                            localStorage.setItem('cookieConsent', 'custom');
                            localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
                            show = false;
                        "
                        class="flex-1 bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            Save Preferences
                        </button>

                        <button @click="
                            preferences = { essential: true, analytics: false, marketing: false };
                            localStorage.setItem('cookieConsent', 'essential');
                            localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
                            show = false;
                        "
                        class="sm:flex-none bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium py-3 px-6 rounded-lg border border-gray-300 dark:border-gray-600 transition-all duration-200">
                            Essential Only
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cookie Settings Button (Fixed) -->
<button @click="
    const banner = document.getElementById('cookie-consent-banner');
    if (banner.__x) banner.__x.$data.show = true;
"
class="fixed bottom-4 left-4 z-40 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 p-3 rounded-full shadow-lg border border-gray-200 dark:border-gray-700 transition-all duration-200 hover:scale-110"
title="Cookie Settings">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
    </svg>
</button>

<?php /**PATH /Users/user/Documents/gf-1/resources/views/components/cookie-consent.blade.php ENDPATH**/ ?>