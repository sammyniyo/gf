<!-- Enhanced Scroll Progress Bar -->
<div class="fixed top-0 left-0 w-full h-1 bg-gray-200/50 backdrop-blur-sm z-[100]">
    <div id="scrollProgress" class="h-full bg-gradient-to-r from-emerald-500 via-amber-400 to-emerald-500 transition-all duration-300"
         style="width: 0%; background-size: 200% 100%;">
    </div>
</div>

<style>
    #scrollProgress {
        animation: gradientSlide 3s ease infinite;
        box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
    }

    @keyframes gradientSlide {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<script>
    // Enhanced scroll progress with color transitions
    window.addEventListener('scroll', function() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;

        const progressBar = document.getElementById('scrollProgress');
        if (progressBar) {
            progressBar.style.width = scrolled + '%';

            // Change gradient based on scroll position
            if (scrolled < 20) {
                progressBar.style.background = 'linear-gradient(90deg, #10b981, #34d399)';
            } else if (scrolled < 40) {
                progressBar.style.background = 'linear-gradient(90deg, #34d399, #fbbf24)';
            } else if (scrolled < 60) {
                progressBar.style.background = 'linear-gradient(90deg, #fbbf24, #f59e0b)';
            } else if (scrolled < 80) {
                progressBar.style.background = 'linear-gradient(90deg, #f59e0b, #3b82f6)';
            } else {
                progressBar.style.background = 'linear-gradient(90deg, #3b82f6, #10b981)';
            }
        }
    });
</script>

