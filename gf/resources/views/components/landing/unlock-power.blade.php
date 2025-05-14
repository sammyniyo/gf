<!-- resources/views/components/landing/unlock-power.blade.php -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12">
            Unlock the Power of Smart Finance
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ([['title' => 'Automated Invoicing', 'desc' => 'Send professional invoices in seconds.'], ['title' => 'Expense Tracking', 'desc' => 'Monitor expenses in real-time.'], ['title' => 'Reports & Insights', 'desc' => 'Get clear visibility on your finances.'], ['title' => 'Secure Transactions', 'desc' => 'Bank-level security for peace of mind.'], ['title' => 'Collaborative Tools', 'desc' => 'Work better together.'], ['title' => 'Custom Workflows', 'desc' => 'Tailor tools to your business.']] as $feature)
                <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-md transition">
                    <h3 class="text-xl font-semibold mb-2">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
