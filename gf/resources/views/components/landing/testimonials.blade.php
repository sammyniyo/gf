<!-- resources/views/components/landing/testimonials.blade.php -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">What Our Users Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ([['name' => 'Michael Smith', 'feedback' => 'Amazing automation tools!'], ['name' => 'Jane Doe', 'feedback' => 'Clean UI and easy to use.'], ['name' => 'Sarah Lee', 'feedback' => 'Saved us tons of time.'], ['name' => 'Luis Fernandez', 'feedback' => 'Support team is incredible.']] as $user)
                <div class="bg-gray-100 p-6 rounded-xl">
                    <div class="mb-4 h-16 w-16 bg-gray-300 rounded-full mx-auto"></div>
                    <p class="text-center font-medium">"{{ $user['feedback'] }}"</p>
                    <p class="text-center text-sm text-gray-600 mt-2">- {{ $user['name'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
