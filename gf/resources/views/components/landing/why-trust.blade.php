<!-- resources/views/components/landing/why-trust.blade.php -->
<section class="bg-white py-24" id="trust">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-4">
            Why Businesses Trust Us
        </h2>
        <p class="text-gray-500 text-center mb-10 max-w-xl mx-auto">
            Join thousands of businesses that streamline their financial operations.
        </p>

        <!-- Tabs -->
        <div class="flex justify-center space-x-4 mb-12 flex-wrap gap-2">
            @foreach (['Time-Saving Automation', 'Analytics', 'Support', 'Integrations', 'Security'] as $tab)
                <button class="px-5 py-2 rounded-full text-sm font-medium bg-gray-100 hover:bg-green-100 text-gray-700">
                    {{ $tab }}
                </button>
            @endforeach
        </div>

        <!-- Feature Card -->
        <div class="bg-green-900 text-white p-10 rounded-2xl flex flex-col lg:flex-row items-center gap-10 shadow-lg">
            <div class="flex-1 space-y-4">
                <h3 class="text-2xl font-semibold">The Smarter Way to Automate</h3>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start gap-2">
                        <span>✅</span> <span>Track Sales & Expenses Automatically</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span>✅</span> <span>Streamline Tax Performance Tracking</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span>✅</span> <span>Scale with Your Growth</span>
                    </li>
                </ul>
                <a href="#" class="inline-block mt-4 bg-white text-green-800 px-5 py-2 rounded-md font-semibold hover:bg-gray-100 transition">
                    Get Started
                </a>
            </div>

            <div class="flex-1">
                <img src="https://dummyimage.com/600x400/ffffff/ccc&text=Chart+Preview" alt="Chart Preview" class="rounded-xl w-full">
            </div>
        </div>
    </div>
</section>
