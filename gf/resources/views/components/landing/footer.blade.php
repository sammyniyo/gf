<!-- resources/views/components/landing/footer.blade.php -->
<footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-5 gap-8">
        <!-- Logo & Description -->
        <div class="md:col-span-2">
            <div class="text-2xl font-bold text-green-400 mb-4">Vcum</div>
            <p class="text-gray-400">
                Manage your business finances with ease using our smart tools. Automate. Track. Grow.
            </p>
        </div>

        <!-- Links -->
        <div>
            <h4 class="font-semibold mb-4">Resources</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><a href="#" class="hover:text-white">Blog</a></li>
                <li><a href="#" class="hover:text-white">Help Center</a></li>
                <li><a href="#" class="hover:text-white">Documentation</a></li>
                <li><a href="#" class="hover:text-white">Tutorials</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Company</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><a href="#" class="hover:text-white">About</a></li>
                <li><a href="#" class="hover:text-white">Careers</a></li>
                <li><a href="#" class="hover:text-white">Contact</a></li>
                <li><a href="#" class="hover:text-white">Partners</a></li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold mb-4">Solutions</h4>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><a href="#" class="hover:text-white">Expense Tracking</a></li>
                <li><a href="#" class="hover:text-white">Automation</a></li>
                <li><a href="#" class="hover:text-white">Integrations</a></li>
                <li><a href="#" class="hover:text-white">Security</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-gray-700 mt-12 pt-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} God's Family Choir | ASA UR Nyarugenge SDA - All rights reserved.
    </div>
</footer>
