<!-- Upcoming Events with Countdown Timer -->
<section class="relative bg-gradient-to-b from-white to-emerald-50/50 py-24 overflow-hidden">
    <!-- Decorative Background -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-96 h-96 bg-emerald-500 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-amber-500 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-amber-100 rounded-full mb-4">
                <span class="w-2 h-2 bg-amber-500 rounded-full animate-ping"></span>
                <span class="text-amber-800 text-sm font-bold uppercase tracking-wide">Next Event</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">
                Don't Miss Our <span class="bg-gradient-to-r from-emerald-600 to-amber-500 bg-clip-text text-transparent">Upcoming Performances</span>
            </h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Join us for spirit-filled worship and powerful musical experiences
            </p>
        </div>

        <!-- Featured Event with Countdown -->
        <div class="relative group mb-12">
            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-600 via-amber-500 to-emerald-600 rounded-3xl blur-2xl opacity-25 group-hover:opacity-40 transition-opacity duration-1000 animate-gradient-xy"></div>

            <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="grid lg:grid-cols-2">
                    <!-- Left: Event Image -->
                    <div class="relative h-64 lg:h-auto overflow-hidden group">
                        <img src="{{ asset('images/gf-2.jpg') }}" alt="Upcoming Event" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>

                        <!-- Floating Badge -->
                        <div class="absolute top-6 left-6">
                            <div class="px-4 py-2 bg-red-600 rounded-full flex items-center gap-2 shadow-lg animate-pulse">
                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                <span class="text-white font-bold text-sm">FEATURED EVENT</span>
                            </div>
                        </div>

                        <!-- Event Type Badge -->
                        <div class="absolute bottom-6 left-6">
                            <div class="px-4 py-2 bg-emerald-600 rounded-full shadow-lg backdrop-blur-xl">
                                <span class="text-white font-bold">🎵 Worship Concert</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Event Details & Countdown -->
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <div class="mb-8">
                            <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-4">
                                Resurrection Sunday Concert 2025
                            </h3>
                            <p class="text-gray-600 text-lg leading-relaxed mb-6">
                                Experience the hope of Christ's resurrection through worship. Join us for an evening of powerful praise, biblical testimonies, and heaven-touching harmonies celebrating our Seventh-day Adventist faith.
                            </p>

                            <!-- Event Info Grid -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Date</p>
                                        <p class="text-sm text-gray-900 font-bold">April 20, 2025</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Time</p>
                                        <p class="text-sm text-gray-900 font-bold">6:00 PM - 9:00 PM</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Venue</p>
                                        <p class="text-sm text-gray-900 font-bold">ASA UR Nyarugenge</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Tickets</p>
                                        <p class="text-sm text-gray-900 font-bold">Free Entry</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Countdown Timer -->
                        <div class="bg-gradient-to-br from-emerald-50 to-amber-50 rounded-2xl p-6 mb-6">
                            <p class="text-center text-gray-700 font-bold mb-4">Event Starts In</p>
                            <div id="countdown" class="grid grid-cols-4 gap-3">
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center transform hover:scale-105 transition-transform">
                                    <div class="text-3xl lg:text-4xl font-black text-emerald-600" id="days">00</div>
                                    <div class="text-xs text-gray-500 font-semibold mt-1">DAYS</div>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center transform hover:scale-105 transition-transform">
                                    <div class="text-3xl lg:text-4xl font-black text-amber-600" id="hours">00</div>
                                    <div class="text-xs text-gray-500 font-semibold mt-1">HOURS</div>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center transform hover:scale-105 transition-transform">
                                    <div class="text-3xl lg:text-4xl font-black text-blue-600" id="minutes">00</div>
                                    <div class="text-xs text-gray-500 font-semibold mt-1">MINS</div>
                                </div>
                                <div class="bg-white rounded-xl p-4 shadow-lg text-center transform hover:scale-105 transition-transform">
                                    <div class="text-3xl lg:text-4xl font-black text-purple-600" id="seconds">00</div>
                                    <div class="text-xs text-gray-500 font-semibold mt-1">SECS</div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                            <a href="{{ route('events.index') }}" class="flex-1 group relative inline-flex items-center justify-center gap-2 px-5 md:px-6 py-3 md:py-4 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white font-bold rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl hover:shadow-emerald-500/50 hover:-translate-y-1 text-sm md:text-base">
                                <div class="absolute inset-0 bg-gradient-to-r from-emerald-500 to-emerald-600 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                                <svg class="w-4 h-4 md:w-5 md:h-5 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                                <span class="relative z-10">Get Tickets</span>
                            </a>

                            <button onclick="shareEvent()" class="group inline-flex items-center justify-center gap-2 px-5 md:px-6 py-3 md:py-4 bg-gray-100 text-gray-900 font-bold rounded-xl hover:bg-gray-200 transition-all duration-300 text-sm md:text-base">
                                <svg class="w-4 h-4 md:w-5 md:h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                </svg>
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Upcoming Events -->
        <div class="text-center">
            <a href="{{ route('events.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white border-2 border-emerald-600 text-emerald-600 font-bold rounded-xl hover:bg-emerald-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                <span>View All Events</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes gradient-xy {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    .animate-gradient-xy {
        background-size: 400% 400%;
        animation: gradient-xy 3s ease infinite;
    }
</style>

<script>
function shareEvent() {
    if (navigator.share) {
        navigator.share({
            title: 'Resurrection Sunday Concert 2025 - God\'s Family Choir',
            text: 'Join us for an inspiring Seventh-day Adventist worship concert!',
            url: window.location.href
        }).then(() => {
            console.log('Thanks for sharing!');
        }).catch(console.error);
    } else {
        // Fallback: copy to clipboard
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Event link copied to clipboard!');
        });
    }
}

// Countdown Timer
function initCountdown() {
    // Set the date we're counting down to (April 20, 2025)
    const countDownDate = new Date("Apr 20, 2025 18:00:00").getTime();

    // Update the count down every 1 second
    const x = setInterval(function() {
        const now = new Date().getTime();
        const distance = countDownDate - now;

        // Time calculations
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        document.getElementById("days").textContent = String(days).padStart(2, '0');
        document.getElementById("hours").textContent = String(hours).padStart(2, '0');
        document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
        document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');

        // If the count down is finished
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "<div class='text-center text-2xl font-bold text-emerald-600'>EVENT IS LIVE NOW!</div>";
        }
    }, 1000);
}

// Initialize countdown on page load
document.addEventListener('DOMContentLoaded', initCountdown);
</script>

