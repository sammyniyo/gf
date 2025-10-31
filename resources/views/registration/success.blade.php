@extends('layouts.app')

@section('title', 'Registration Successful')

@push('styles')
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.8s ease-out;
    }

    @keyframes confetti {
        0% { transform: translateY(0) rotate(0deg); opacity: 1; }
        100% { transform: translateY(1000px) rotate(720deg); opacity: 0; }
    }

    .confetti {
        position: absolute;
        width: 10px;
        height: 10px;
        background: #f0f;
        animation: confetti 3s ease-out infinite;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-amber-50 flex items-center justify-center py-12 px-4">
    <div class="max-w-2xl w-full">
        <!-- Success Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header with gradient -->
            <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 p-8 text-center relative overflow-hidden">
                <!-- Animated background elements -->
                <div class="absolute top-0 left-0 w-full h-full opacity-10">
                    <div class="absolute top-10 left-10 text-6xl animate-bounce">🎉</div>
                    <div class="absolute top-10 right-10 text-6xl animate-bounce" style="animation-delay: 0.2s;">🎊</div>
                    <div class="absolute bottom-10 left-1/4 text-6xl animate-bounce" style="animation-delay: 0.4s;">🎵</div>
                    <div class="absolute bottom-10 right-1/4 text-6xl animate-bounce" style="animation-delay: 0.6s;">✨</div>
                </div>

                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                        <i class="fas fa-check text-emerald-600 text-4xl"></i>
                    </div>
                    <h1 class="text-3xl md:text-5xl font-bold text-white mb-3 animate-fade-in">
                        🎉 Registration Successful! 🎉
                    </h1>
                    <p class="text-emerald-100 text-xl font-semibold">
                        Welcome to God's Family {{ session('member') && session('member')->isMember() ? 'Choir' : '' }}!
                    </p>
                    <p class="text-emerald-200 text-sm mt-2">
                        Your journey with us begins now! 🙏✨
                    </p>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- Pending Confirmation Alert for Members -->
                @if(session('member') && session('member')->isMember())
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 border-2 border-amber-400 rounded-xl p-6 shadow-lg">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-amber-500 text-white rounded-full flex items-center justify-center animate-pulse">
                                    <i class="fas fa-clock text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-amber-900 mb-2 flex items-center gap-2">
                                    ⏳ Registration Status: Pending Confirmation
                                </h3>
                                <p class="text-amber-800 font-medium mb-2">
                                    Your application has been submitted successfully and is currently under review!
                                </p>
                                <ul class="text-amber-700 text-sm space-y-1 ml-4">
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-check-circle text-emerald-600"></i>
                                        Our team will review your application within 24-48 hours
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-check-circle text-emerald-600"></i>
                                        You'll receive a confirmation email once approved
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="fas fa-check-circle text-emerald-600"></i>
                                        Meanwhile, join our WhatsApp groups using the links in your email
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-4">
                        <p class="text-emerald-800 text-center font-semibold">
                            {{ session('success') }}
                        </p>
                    </div>
                @endif

                @if(session('member'))
                    <!-- Member ID Display -->
                    <div class="bg-gradient-to-r from-amber-100 to-amber-50 rounded-xl p-6 text-center border border-amber-200">
                        <p class="text-sm text-amber-800 font-semibold mb-2">Your Unique {{ session('member')->isMember() ? 'Member' : 'Friend' }} ID</p>
                        <div class="text-3xl font-bold text-amber-900 tracking-wider mb-2">
                            {{ session('member')->member_id }}
                        </div>
                        <p class="text-xs text-amber-700">Please save this ID for future reference</p>
                    </div>
                @endif

                <!-- Next Steps -->
                <div class="space-y-4">
                    <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-tasks text-emerald-600"></i>
                        What Happens Next?
                    </h2>

                    @if(session('member') && session('member')->isMember())
                        <!-- For Choir Members -->
                        <div class="space-y-3">
                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    1
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Check Your Email</h3>
                                    <p class="text-gray-600 text-sm">You'll receive a welcome email with important information and group invite links within a few minutes.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    2
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Join WhatsApp Groups</h3>
                                    <p class="text-gray-600 text-sm">Use the links in your email to join our WhatsApp groups:
                                        <ul class="list-disc ml-5 mt-2 space-y-1">
                                            <li>God's Family Main Group</li>
                                            <li>Active Choristers Group</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    3
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Await Confirmation</h3>
                                    <p class="text-gray-600 text-sm">Our team will review your application and confirm your registration within 48 hours.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    4
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Start Attending Rehearsals</h3>
                                    <p class="text-gray-600 text-sm">You'll receive rehearsal schedules and event information through the WhatsApp groups.</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- For Friendship Members -->
                        <div class="space-y-3">
                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    1
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Check Your Email</h3>
                                    <p class="text-gray-600 text-sm">You'll receive a welcome email with your WhatsApp group invite link.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-amber-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    2
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Join WhatsApp Group</h3>
                                    <p class="text-gray-600 text-sm">Use the link to join God's Family Main Group and stay connected.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center flex-shrink-0 font-bold">
                                    3
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Stay Updated</h3>
                                    <p class="text-gray-600 text-sm">Receive updates about events, concerts, and ways to support our ministry.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Important Notice -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-envelope text-blue-600 text-xl mt-1"></i>
                        <div>
                            <h3 class="font-semibold text-blue-900 mb-1">Check Your Email</h3>
                            <p class="text-blue-800 text-sm">
                                If you don't see our email in your inbox, please check your spam/junk folder.
                                Make sure to mark it as "Not Spam" to receive future communications.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- PDF Downloads -->
                @if(session('member'))
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl p-6 border border-purple-200">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="fas fa-file-pdf text-purple-600"></i>
                        Download Your Documents
                    </h3>
                    <div class="grid sm:grid-cols-2 gap-3">
                        <a href="{{ route('member.id-card.download', session('member')) }}"
                            class="inline-flex items-center justify-center gap-2 px-4 py-3 bg-purple-600 text-white font-semibold rounded-lg hover:bg-purple-700 transition-colors">
                            <i class="fas fa-id-card"></i>
                            Download ID Card
                        </a>
                        <a href="{{ route('member.confirmation.download', session('member')) }}"
                            class="inline-flex items-center justify-center gap-2 px-4 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-file-alt"></i>
                            Download Confirmation
                        </a>
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('home') }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-xl hover:bg-emerald-700 transition-colors">
                        <i class="fas fa-home"></i>
                        Back to Home
                    </a>
                    <a href="{{ route('events.index') }}"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-amber-600 text-white font-semibold rounded-xl hover:bg-amber-700 transition-colors">
                        <i class="fas fa-calendar"></i>
                        View Events
                    </a>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="mt-8 text-center">
            <p class="text-gray-600 mb-4">Follow us on social media</p>
            <div class="flex items-center justify-center gap-4">
                <a href="https://www.facebook.com/FChoirOfGod" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/choir_of_god" class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center hover:bg-pink-700 transition-colors">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/@godsfamilychoir5583" class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center hover:bg-red-700 transition-colors">
                    <i class="fab fa-youtube"></i>
                </a>
                <a href="https://www.tiktok.com/@gods.family.choir?_t=ZM-90j5gj8DyqC&_r=1" class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center hover:bg-gray-800 transition-colors">
                    <i class="fab fa-tiktok"></i>
                </a>
                <a href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition-colors">
                    <i class="fab fa-spotify"></i>
                </a>
                <a href="https://music.apple.com/us/artist/gods-family-choir/1793673660" class="w-12 h-12 bg-black text-white rounded-full flex items-center justify-center hover:bg-gray-800 transition-colors">
                    <i class="fab fa-apple"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

