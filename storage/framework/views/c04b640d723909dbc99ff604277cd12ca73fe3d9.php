<!-- Floating Action Button with Quick Actions & Scroll to Top -->
<div class="fixed bottom-8 right-8 z-50 flex flex-col items-end gap-4" id="fab-container">
    <!-- Scroll to Top Button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            id="scroll-top-btn"
            class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 text-white rounded-full shadow-lg hover:shadow-xl flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95 opacity-0 pointer-events-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Main FAB Button -->
    <button onclick="toggleFAB()"
            id="fab-main"
            class="group relative w-16 h-16 bg-gradient-to-br from-emerald-600 to-emerald-700 text-white rounded-full shadow-2xl hover:shadow-emerald-500/50 flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-95">
        <svg id="fab-icon-menu" class="w-7 h-7 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        <svg id="fab-icon-close" class="w-7 h-7 hidden transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>

        <!-- Pulse Effect -->
        <span class="absolute inset-0 rounded-full bg-emerald-500 animate-ping opacity-20"></span>
    </button>

    <!-- Action Buttons (Hidden by default) -->
    <div id="fab-actions" class="absolute bottom-20 right-0 flex flex-col gap-3 opacity-0 pointer-events-none transition-all duration-300">
        <!-- Join Choir -->
        <div class="group flex items-center gap-3 transform translate-x-0">
            <span class="bg-gray-900 text-white px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                Join the Choir
            </span>
            <a href="<?php echo e(route('choir.register.form')); ?>"
               class="w-14 h-14 bg-amber-500 hover:bg-amber-600 text-white rounded-full shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </a>
        </div>

        <!-- Events -->
        <div class="group flex items-center gap-3 transform translate-x-0">
            <span class="bg-gray-900 text-white px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                View Events
            </span>
            <a href="<?php echo e(route('events.index')); ?>"
               class="w-14 h-14 bg-purple-500 hover:bg-purple-600 text-white rounded-full shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                </svg>
            </a>
        </div>

        <!-- Contact -->
        <div class="group flex items-center gap-3 transform translate-x-0">
            <span class="bg-gray-900 text-white px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                Contact Us
            </span>
            <a href="<?php echo e(route('contact')); ?>"
               class="w-14 h-14 bg-blue-500 hover:bg-blue-600 text-white rounded-full shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </a>
        </div>

        <!-- WhatsApp -->
        <div class="group flex items-center gap-3 transform translate-x-0">
            <span class="bg-gray-900 text-white px-3 py-2 rounded-lg text-sm font-semibold whitespace-nowrap shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                WhatsApp Us
            </span>
            <a href="https://wa.me/250783871782"
               target="_blank"
               class="w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 active:scale-95">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Scroll Progress Indicator -->
<div class="fixed top-0 left-0 w-full h-1 bg-gray-200 z-50">
    <div id="scroll-progress" class="h-full bg-gradient-to-r from-emerald-500 via-amber-500 to-emerald-500 transition-all duration-150" style="width: 0%"></div>
</div>

<script>
let fabOpen = false;

function toggleFAB() {
    fabOpen = !fabOpen;
    const fabActions = document.getElementById('fab-actions');
    const fabIconMenu = document.getElementById('fab-icon-menu');
    const fabIconClose = document.getElementById('fab-icon-close');
    const fabMain = document.getElementById('fab-main');

    if (fabOpen) {
        fabActions.classList.remove('opacity-0', 'pointer-events-none');
        fabActions.classList.add('opacity-100', 'pointer-events-auto');
        fabIconMenu.classList.add('hidden');
        fabIconClose.classList.remove('hidden');
        fabMain.classList.add('rotate-90');
    } else {
        fabActions.classList.add('opacity-0', 'pointer-events-none');
        fabActions.classList.remove('opacity-100', 'pointer-events-auto');
        fabIconMenu.classList.remove('hidden');
        fabIconClose.classList.add('hidden');
        fabMain.classList.remove('rotate-90');
    }
}

// Close FAB when clicking outside
document.addEventListener('click', function(e) {
    const fabContainer = document.getElementById('fab-container');
    if (fabOpen && !fabContainer.contains(e.target)) {
        toggleFAB();
    }
});

// Scroll Progress Indicator
window.addEventListener('scroll', function() {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    document.getElementById('scroll-progress').style.width = scrolled + '%';
});

// Show/hide FAB and Scroll to Top based on scroll position
let lastScrollTop = 0;
window.addEventListener('scroll', function() {
    const fabContainer = document.getElementById('fab-container');
    const scrollTopBtn = document.getElementById('scroll-top-btn');
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 300) {
        fabContainer.classList.remove('opacity-0', 'pointer-events-none');
        fabContainer.classList.add('opacity-100');
        scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
        scrollTopBtn.classList.add('opacity-100');
    } else {
        fabContainer.classList.add('opacity-0', 'pointer-events-none');
        fabContainer.classList.remove('opacity-100');
        scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
        scrollTopBtn.classList.remove('opacity-100');
    }

    lastScrollTop = scrollTop;
}, false);

// Initialize FAB as hidden
document.getElementById('fab-container').classList.add('opacity-0', 'pointer-events-none');
</script>

<style>
    #fab-container {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    #fab-main {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
</style>

<?php /**PATH C:\Users\samsh\Documents\gf\resources\views/components/landing/floating-action-button.blade.php ENDPATH**/ ?>