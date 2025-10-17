@extends('layouts.app')

@section('title', 'Join God\'s Family | Friendship Registration')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 via-white to-emerald-50 py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold mb-4">
                🙏 FRIENDSHIP REGISTRATION
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Join <span class="text-amber-600">God's Family</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Become a friend of God's Family Choir and stay connected with our ministry!
            </p>
        </div>

        <!-- Registration Form -->
        <form action="{{ route('registration.friendship.store') }}" method="POST" class="space-y-8">
            @csrf

            <!-- Section 1: Personal Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold">
                        1
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Personal Information</h2>
                </div>

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('first_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('last_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                placeholder="+250 XXX XXX XXX"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Date of Birth
                            </label>
                            <input type="date" name="birthdate" value="{{ old('birthdate') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('birthdate')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Gender
                            </label>
                            <select name="gender"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Address
                        </label>
                        <textarea name="address" rows="2"
                            placeholder="Your address (optional)"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Additional Information -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold">
                        2
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Additional Information</h2>
                </div>

                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Occupation
                            </label>
                            <input type="text" name="occupation" value="{{ old('occupation') }}"
                                placeholder="e.g., Student, Teacher, Engineer"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('occupation')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Church/Congregation
                            </label>
                            <input type="text" name="church" value="{{ old('church') }}"
                                placeholder="e.g., ASA UR Nyarugenge"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            @error('church')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Message
                        </label>
                        <textarea name="message" rows="4"
                            placeholder="Tell us a bit about yourself or why you'd like to be a friend of God's Family Choir..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="newsletter" value="1" id="newsletter" {{ old('newsletter') ? 'checked' : '' }}
                            class="mt-1 w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                        <label for="newsletter" class="text-sm text-gray-700">
                            I would like to receive newsletters and updates from God's Family Choir
                        </label>
                    </div>
                </div>
            </div>

            <!-- Benefits Section -->
            <div class="bg-gradient-to-r from-amber-50 to-emerald-50 rounded-2xl p-8 border border-amber-200">
                <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fas fa-gift text-amber-600"></i>
                    What You'll Receive
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Regular updates about our concerts and events</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Exclusive access to God's Family WhatsApp group</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Early notifications about special programs</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Opportunities to support our ministry</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-emerald-600 mt-1"></i>
                        <span class="text-gray-700">Your unique Friend ID for future interactions</span>
                    </li>
                </ul>
            </div>

            <!-- Submit Button -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="text-center">
                    <button type="submit"
                        class="inline-flex items-center gap-3 px-12 py-4 bg-gradient-to-r from-amber-500 to-amber-600 text-white font-bold text-lg rounded-xl hover:shadow-xl hover:shadow-amber-500/50 transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-heart"></i>
                        Join as a Friend
                    </button>
                    <p class="text-sm text-gray-500 mt-4">
                        By submitting, you agree to our terms and conditions
                    </p>
                </div>
            </div>
        </form>

        <!-- Help Section -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
            <div class="flex items-start gap-4">
                <i class="fas fa-info-circle text-blue-600 text-2xl"></i>
                <div>
                    <h3 class="font-bold text-blue-900 mb-2">Need Help?</h3>
                    <p class="text-blue-800 text-sm">
                        If you have any questions or need assistance, please contact us at
                        <a href="mailto:info@godsfamilychoir.org" class="underline">info@godsfamilychoir.org</a> or
                        call <a href="tel:+250XXXXXXXXX" class="underline">+250 XXX XXX XXX</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Alternative Registration -->
        <div class="mt-8 bg-emerald-50 border border-emerald-200 rounded-xl p-6 text-center">
            <p class="text-emerald-800 mb-4">
                <i class="fas fa-music mr-2"></i>
                Want to join as a choir member instead?
            </p>
            <a href="{{ route('registration.member') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-600 text-white font-semibold rounded-lg hover:bg-emerald-700 transition-colors">
                <i class="fas fa-microphone"></i>
                Register as Choir Member
            </a>
        </div>
    </div>
</div>

<!-- Footer -->
<x-static.footer />

@endsection

