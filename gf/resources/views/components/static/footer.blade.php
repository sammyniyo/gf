<!-- resources/views/components/landing/footer.blade.php -->
<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-12">
            <!-- Logo & Description -->
            <div class="lg:col-span-4">
                <div class="flex items-center mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="Choir Logo" class="h-20 mr-4">
                </div>
                <p class="text-gray-400 text-base leading-relaxed">
                    Sharing the love of Christ through music. Join us in worship and praise as we uplift souls with
                    every harmony.
                </p>
                <div class="flex space-x-3 mt-6">
                    <a href="#"
                        class="p-2 rounded-full bg-gray-800 hover:bg-white hover:text-gray-900 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#"
                        class="p-2 rounded-full bg-gray-800 hover:bg-white hover:text-gray-900 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#"
                        class="p-2 rounded-full bg-gray-800 hover:bg-white hover:text-gray-900 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 0C5.37258 0 0 5.37274 0 12.0002C0 18.6275 5.37258 24 12 24C18.6274 24 24 18.6275 24 12.0002C24 5.37274 18.6274 0 12 0ZM17.2972 17.3724C16.9516 17.8854 16.2885 18.032 15.7756 17.6865C13.1232 15.9273 9.64379 15.7063 6.68165 16.9413C6.10038 17.1915 5.43221 16.9182 5.18202 16.3369C4.93183 15.7556 5.20511 15.0874 5.78638 14.8372C9.28777 13.3494 13.2921 13.6082 16.4626 15.7352C16.9756 16.0808 17.1428 16.8593 17.2972 17.3724ZM18.603 14.1239C18.1337 14.8235 17.1796 15.0223 16.4801 14.553C13.5177 12.5859 9.48193 12.3106 6.1405 13.8693C5.36193 14.2479 4.4262 13.909 4.04763 13.1304C3.66907 12.3519 4.008 11.4161 4.78656 11.0376C8.79102 9.11017 13.5483 9.44153 17.0477 11.8922C17.7472 12.3615 18.2795 13.4243 18.603 14.1239ZM18.9355 10.5766C15.4306 8.26247 9.8835 8.02928 6.25947 9.80781C5.36477 10.2442 4.26721 9.86555 3.83082 8.97085C3.39443 8.07615 3.77307 6.97859 4.66777 6.5422C9.06371 4.38888 15.3327 4.66809 19.5204 7.40374C20.3686 7.97406 20.5964 9.15308 20.0261 10.0013C19.6958 10.499 19.2142 10.7673 18.9355 10.5766Z" />
                        </svg>
                    </a>

                    <a href="#"
                        class="p-2 rounded-full bg-gray-800 hover:bg-white hover:text-gray-900 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12.7 0H9.5V16.14C9.5 17.255 8.604 18.15 7.49 18.15C6.376 18.15 5.48 17.255 5.48 16.14C5.48 15.025 6.376 14.13 7.49 14.13C7.665 14.13 7.836 14.15 8 14.19V11.1C7.84 11.075 7.675 11.06 7.5 11.06C4.46 11.06 2 13.52 2 16.56C2 19.6 4.46 22.06 7.5 22.06C10.54 22.06 13 19.6 13 16.56V8.25C13.625 8.63 14.33 8.85 15.09 8.88V6.26C14.23 6.18 13.46 5.76 12.92 5.1C12.385 4.445 12.1 3.59 12.1 2.7V0H12.7Z" />
                        </svg>
                    </a>

                    <a href="#"
                        class="p-2 rounded-full bg-gray-800 hover:bg-white hover:text-gray-900 transition-colors">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M23.498 6.186c-.274-1.03-1.083-1.84-2.113-2.113C19.665 3.5 12 3.5 12 3.5s-7.665 0-9.385.573c-1.03.273-1.84 1.083-2.113 2.113C0 7.906 0 12 0 12s0 4.094.502 5.814c.274 1.03 1.083 1.84 2.113 2.113C4.335 20.5 12 20.5 12 20.5s7.665 0 9.385-.573c1.03-.273 1.84-1.083 2.113-2.113C24 16.094 24 12 24 12s0-4.094-.502-5.814zM9.75 15.5v-7l6.5 3.5-6.5 3.5z" />
                        </svg>
                    </a>

                </div>
            </div>

            <!-- Quick Links -->
            <div class="lg:col-span-2">
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="#" class="hover:text-white">Home</a></li>
                    <li><a href="#" class="hover:text-white">About Us</a></li>
                    <li><a href="#" class="hover:text-white">Choir Members</a></li>
                    <li><a href="#" class="hover:text-white">Events</a></li>
                    <li><a href="#" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="lg:col-span-3">
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><span class="block">Email:</span> <a href="mailto:asa.godsfamilychoir2017@gmail.com"
                            class="hover:text-white">asa.godsfamilychoir2017@gmail.com</a></li>
                    <li><span class="block">Phone:</span> <a href="tel:+250783871782" class="hover:text-white">+250 783
                            871 782</a></li>
                    <li><span class="block">Location:</span> Kigali, Rwanda</li>
                </ul>
            </div>

            <!-- Newsletter or Verse -->
            <div class="lg:col-span-3">
                <h3 class="text-lg font-semibold mb-4">Stay Connected</h3>
                <p class="text-gray-400 text-sm mb-4">
                    Subscribe for updates or meditate on our daily devotions.
                </p>
                <form class="flex flex-col sm:flex-row gap-3">
                    <input type="email" placeholder="Your email"
                        class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-gray-300" />
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-md font-medium text-white transition-colors">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="border-t border-gray-700 pt-6 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} God's Family Choir - ASA UR Nyarugenge SDA. All rights reserved.
        </div>
    </div>
</footer>
