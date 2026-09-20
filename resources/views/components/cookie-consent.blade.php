<div id="cookie-consent-banner"
     x-data="{ show: false, showPreferences: false, preferences: { essential: true, analytics: false, marketing: false } }"
     x-init="
        if (!localStorage.getItem('cookieConsent')) {
            setTimeout(() => show = true, 800);
        }
        if (localStorage.getItem('cookiePreferences')) {
            preferences = JSON.parse(localStorage.getItem('cookiePreferences'));
        }
     "
     x-show="show"
     x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-3"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-x-0 bottom-0 z-50 p-3 sm:p-4">

    <div class="mx-auto max-w-4xl rounded-2xl border border-slate-200 bg-white p-4 shadow-2xl sm:p-5">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
            <div class="min-w-0">
                <h3 class="text-sm font-semibold text-slate-900">Cookies on this site</h3>
                <p class="mt-1 text-sm leading-relaxed text-slate-600">
                    We use cookies to keep the site working and to understand how people use it.
                    See our <a href="{{ route('privacy-policy') }}" class="font-medium text-emerald-700 underline underline-offset-2 hover:text-emerald-800">privacy policy</a>.
                </p>
            </div>
            <div class="flex shrink-0 flex-wrap items-center gap-2">
                <button type="button" @click="showPreferences = !showPreferences" class="rounded-full border border-slate-200 px-3 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Preferences
                </button>
                <button type="button" @click="
                    preferences = { essential: true, analytics: false, marketing: false };
                    localStorage.setItem('cookieConsent', 'essential');
                    localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
                    show = false;
                " class="rounded-full border border-slate-200 px-3 py-2 text-xs font-medium text-slate-700 hover:bg-slate-50">
                    Essential only
                </button>
                <button type="button" @click="
                    preferences = { essential: true, analytics: true, marketing: true };
                    localStorage.setItem('cookieConsent', 'all');
                    localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
                    show = false;
                " class="rounded-full bg-emerald-700 px-4 py-2 text-xs font-semibold text-white hover:bg-emerald-600">
                    Accept all
                </button>
            </div>
        </div>

        <div x-show="showPreferences" x-cloak class="mt-4 space-y-3 border-t border-slate-100 pt-4">
            <label class="flex items-start justify-between gap-4 text-sm">
                <span>
                    <span class="font-medium text-slate-900">Essential</span>
                    <span class="mt-0.5 block text-xs text-slate-500">Required for the site to work.</span>
                </span>
                <input type="checkbox" checked disabled class="mt-0.5 rounded border-slate-300 text-emerald-600 opacity-60">
            </label>
            <label class="flex items-start justify-between gap-4 text-sm">
                <span>
                    <span class="font-medium text-slate-900">Analytics</span>
                    <span class="mt-0.5 block text-xs text-slate-500">Help us improve the website.</span>
                </span>
                <input type="checkbox" x-model="preferences.analytics" class="mt-0.5 rounded border-slate-300 text-emerald-600">
            </label>
            <label class="flex items-start justify-between gap-4 text-sm">
                <span>
                    <span class="font-medium text-slate-900">Marketing</span>
                    <span class="mt-0.5 block text-xs text-slate-500">Used for advertising measurement.</span>
                </span>
                <input type="checkbox" x-model="preferences.marketing" class="mt-0.5 rounded border-slate-300 text-emerald-600">
            </label>
            <button type="button" @click="
                localStorage.setItem('cookieConsent', 'custom');
                localStorage.setItem('cookiePreferences', JSON.stringify(preferences));
                show = false;
            " class="rounded-full bg-slate-900 px-4 py-2 text-xs font-semibold text-white hover:bg-slate-800">
                Save preferences
            </button>
        </div>
    </div>
</div>
