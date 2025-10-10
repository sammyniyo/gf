@extends('layouts.app')

@section('title', 'Join God\'s Family Choir')

@section('content')
<!-- Stunning Background -->
<div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-green-50 to-blue-50">
    <!-- Animated Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
        <!-- Floating Orbs -->
        <div class="absolute top-20 left-10 w-32 h-32 bg-gradient-to-r from-emerald-400/20 to-green-400/20 rounded-full blur-xl animate-float"></div>
        <div class="absolute top-40 right-20 w-24 h-24 bg-gradient-to-r from-blue-400/20 to-indigo-400/20 rounded-full blur-lg animate-drift"></div>
        <div class="absolute bottom-32 left-1/4 w-40 h-40 bg-gradient-to-r from-amber-400/15 to-orange-400/15 rounded-full blur-2xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 right-1/3 w-28 h-28 bg-gradient-to-r from-purple-400/20 to-pink-400/20 rounded-full blur-xl animate-drift" style="animation-delay: 1s;"></div>

        <!-- Geometric Patterns -->
        <div class="absolute top-1/4 left-1/3 w-2 h-2 bg-emerald-500/30 rounded-full animate-ping"></div>
        <div class="absolute top-1/2 right-1/4 w-1 h-1 bg-blue-500/40 rounded-full animate-ping" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/3 left-1/5 w-1.5 h-1.5 bg-amber-500/35 rounded-full animate-ping" style="animation-delay: 2s;"></div>

        <!-- Subtle Grid Pattern -->
        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 1px 1px, rgba(34, 197, 94, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
</div>

<!-- Scrollable Content -->
<div class="relative z-10 min-h-screen">
    <div class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-block mb-6">
                <div class="w-20 h-20 bg-gradient-to-r from-emerald-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-music text-white text-2xl"></i>
                </div>
    </div>
            <h1 class="text-5xl font-bold bg-gradient-to-r from-gray-900 via-emerald-700 to-green-600 bg-clip-text text-transparent mb-4">
                Join God's Family Choir
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Share your voice with us and become part of our musical family. We're excited to learn more about you and welcome you into our community of worship!
            </p>

            <!-- Trust Indicators -->
            <div class="flex flex-wrap justify-center items-center gap-6 mt-8 text-sm text-gray-500">
                <div class="flex items-center gap-2">
                    <i class="fas fa-shield-alt text-emerald-500"></i>
                    <span>Secure Registration</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-clock text-blue-500"></i>
                    <span>Quick Process</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-heart text-pink-500"></i>
                    <span>Join Our Family</span>
                </div>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="mb-12">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-white/30">
                <div class="flex items-center justify-center space-x-4 sm:space-x-8">
                    <div class="flex items-center">
                        <div id="step-1" class="w-14 h-14 rounded-full bg-gradient-to-r from-emerald-500 to-green-600 text-white flex items-center justify-center font-semibold transition-all duration-300 shadow-lg">
                            <i class="fas fa-user text-lg"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-emerald-600 hidden sm:block">Personal Info</span>
                    </div>
                    <div class="w-12 sm:w-16 h-1 bg-gray-200 rounded-full">
                        <div id="progress-1" class="h-1 bg-gradient-to-r from-emerald-500 to-green-600 rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>
                    <div class="flex items-center">
                        <div id="step-2" class="w-14 h-14 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-semibold transition-all duration-300 shadow-lg">
                            <i class="fas fa-briefcase text-lg"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-500 hidden sm:block">Professional</span>
                    </div>
                    <div class="w-12 sm:w-16 h-1 bg-gray-200 rounded-full">
                        <div id="progress-2" class="h-1 bg-gradient-to-r from-emerald-500 to-green-600 rounded-full transition-all duration-500" style="width: 0%"></div>
                    </div>
                    <div class="flex items-center">
                        <div id="step-3" class="w-14 h-14 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-semibold transition-all duration-300 shadow-lg">
                            <i class="fas fa-music text-lg"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-500 hidden sm:block">Choir Details</span>
                    </div>
                    <div class="w-12 sm:w-16 h-1 bg-gray-200 rounded-full">
                        <div id="progress-3" class="h-1 bg-gradient-to-r from-emerald-500 to-green-600 rounded-full transition-all duration-500" style="width: 0%"></div>
                            </div>
                    <div class="flex items-center">
                        <div id="step-4" class="w-14 h-14 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-semibold transition-all duration-300 shadow-lg">
                            <i class="fas fa-star text-lg"></i>
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-500 hidden sm:block">Final Touch</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-white/20 relative">
            <!-- Subtle inner glow -->
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/30 to-blue-50/30 rounded-3xl pointer-events-none"></div>
            <form id="member-registration-form" method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data" class="p-8 relative z-10">
                @csrf

                <!-- Step 1: Personal Information -->
                <div id="form-step-1" class="step-content">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('first_name') border-red-500 @enderror"
                                value="{{ old('first_name') }}"
                                placeholder="Enter your first name">
                            @error('first_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('last_name') border-red-500 @enderror"
                                value="{{ old('last_name') }}"
                                placeholder="Enter your last name">
                            @error('last_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}"
                                placeholder="Enter your email address">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('phone') border-red-500 @enderror"
                                value="{{ old('phone') }}"
                                placeholder="Enter your phone number">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth *</label>
                            <input type="date" id="date_of_birth" name="date_of_birth" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('date_of_birth') border-red-500 @enderror"
                                value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="gender" class="block text-sm font-medium text-gray-700">Gender *</label>
                            <select id="gender" name="gender" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('gender') border-red-500 @enderror">
                                <option value="">Select your gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                        <textarea id="address" name="address" rows="3" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('address') border-red-500 @enderror"
                            placeholder="Enter your full address">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Step 2: Professional Information -->
                <div id="form-step-2" class="step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Professional Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation *</label>
                            <input type="text" id="occupation" name="occupation" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('occupation') border-red-500 @enderror"
                                value="{{ old('occupation') }}"
                                placeholder="Enter your occupation">
                            @error('occupation')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="workplace" class="block text-sm font-medium text-gray-700">Workplace</label>
                            <input type="text" id="workplace" name="workplace"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('workplace') border-red-500 @enderror"
                                value="{{ old('workplace') }}"
                                placeholder="Enter your workplace">
                            @error('workplace')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="education_level" class="block text-sm font-medium text-gray-700">Education Level *</label>
                            <select id="education_level" name="education_level" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('education_level') border-red-500 @enderror">
                                <option value="">Select education level</option>
                                <option value="primary" {{ old('education_level') == 'primary' ? 'selected' : '' }}>Primary School</option>
                                <option value="secondary" {{ old('education_level') == 'secondary' ? 'selected' : '' }}>Secondary School</option>
                                <option value="diploma" {{ old('education_level') == 'diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="bachelor" {{ old('education_level') == 'bachelor' ? 'selected' : '' }}>Bachelor's Degree</option>
                                <option value="master" {{ old('education_level') == 'master' ? 'selected' : '' }}>Master's Degree</option>
                                <option value="phd" {{ old('education_level') == 'phd' ? 'selected' : '' }}>PhD</option>
                                <option value="other" {{ old('education_level') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('education_level')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="skills" class="block text-sm font-medium text-gray-700">Special Skills</label>
                            <input type="text" id="skills" name="skills"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('skills') border-red-500 @enderror"
                                value="{{ old('skills') }}"
                                placeholder="e.g., Public speaking, Event management">
                            @error('skills')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Step 3: Choir Details -->
                <div id="form-step-3" class="step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Choir Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="voice_type" class="block text-sm font-medium text-gray-700">Voice Type *</label>
                            <select id="voice_type" name="voice_type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('voice_type') border-red-500 @enderror">
                                <option value="">Select your voice type</option>
                                <option value="soprano" {{ old('voice_type') == 'soprano' ? 'selected' : '' }}>Soprano</option>
                                <option value="alto" {{ old('voice_type') == 'alto' ? 'selected' : '' }}>Alto</option>
                                <option value="tenor" {{ old('voice_type') == 'tenor' ? 'selected' : '' }}>Tenor</option>
                                <option value="bass" {{ old('voice_type') == 'bass' ? 'selected' : '' }}>Bass</option>
                                <option value="unsure" {{ old('voice_type') == 'unsure' ? 'selected' : '' }}>Not sure</option>
                            </select>
                            @error('voice_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="musical_experience" class="block text-sm font-medium text-gray-700">Musical Experience *</label>
                            <select id="musical_experience" name="musical_experience" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('musical_experience') border-red-500 @enderror">
                                <option value="">Select your experience level</option>
                                <option value="beginner" {{ old('musical_experience') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="intermediate" {{ old('musical_experience') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="advanced" {{ old('musical_experience') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                <option value="professional" {{ old('musical_experience') == 'professional' ? 'selected' : '' }}>Professional</option>
                            </select>
                            @error('musical_experience')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="instruments" class="block text-sm font-medium text-gray-700">Instruments Played</label>
                            <input type="text" id="instruments" name="instruments"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('instruments') border-red-500 @enderror"
                                value="{{ old('instruments') }}"
                                placeholder="e.g., Piano, Guitar, Violin">
                            @error('instruments')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="choir_experience" class="block text-sm font-medium text-gray-700">Previous Choir Experience</label>
                            <select id="choir_experience" name="choir_experience"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('choir_experience') border-red-500 @enderror">
                                <option value="">Select experience</option>
                                <option value="none" {{ old('choir_experience') == 'none' ? 'selected' : '' }}>No experience</option>
                                <option value="school" {{ old('choir_experience') == 'school' ? 'selected' : '' }}>School choir</option>
                                <option value="church" {{ old('choir_experience') == 'church' ? 'selected' : '' }}>Church choir</option>
                                <option value="community" {{ old('choir_experience') == 'community' ? 'selected' : '' }}>Community choir</option>
                                <option value="professional" {{ old('choir_experience') == 'professional' ? 'selected' : '' }}>Professional choir</option>
                            </select>
                            @error('choir_experience')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="why_join" class="block text-sm font-medium text-gray-700 mb-2">Why do you want to join God's Family Choir? *</label>
                        <textarea id="why_join" name="why_join" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('why_join') border-red-500 @enderror"
                            placeholder="Tell us what draws you to our choir and how you hope to contribute...">{{ old('why_join') }}</textarea>
                        @error('why_join')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Step 4: Final Touch -->
                <div id="form-step-4" class="step-content hidden">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Final Touch</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="emergency_contact_name" class="block text-sm font-medium text-gray-700">Emergency Contact Name *</label>
                            <input type="text" id="emergency_contact_name" name="emergency_contact_name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('emergency_contact_name') border-red-500 @enderror"
                                value="{{ old('emergency_contact_name') }}"
                                placeholder="Enter emergency contact name">
                            @error('emergency_contact_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="emergency_contact_phone" class="block text-sm font-medium text-gray-700">Emergency Contact Phone *</label>
                            <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('emergency_contact_phone') border-red-500 @enderror"
                                value="{{ old('emergency_contact_phone') }}"
                                placeholder="Enter emergency contact phone">
                            @error('emergency_contact_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="availability" class="block text-sm font-medium text-gray-700">Availability *</label>
                            <select id="availability" name="availability" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('availability') border-red-500 @enderror">
                                <option value="">Select your availability</option>
                                <option value="weekends" {{ old('availability') == 'weekends' ? 'selected' : '' }}>Weekends only</option>
                                <option value="evenings" {{ old('availability') == 'evenings' ? 'selected' : '' }}>Evenings</option>
                                <option value="flexible" {{ old('availability') == 'flexible' ? 'selected' : '' }}>Flexible</option>
                                <option value="limited" {{ old('availability') == 'limited' ? 'selected' : '' }}>Limited availability</option>
                            </select>
                            @error('availability')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('profile_photo') border-red-500 @enderror">
                            <p class="text-sm text-gray-500 mt-1">Optional: Upload a profile photo (max 2MB)</p>
                            @error('profile_photo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="flex items-start">
                            <input type="checkbox" id="terms_agreed" name="terms_agreed" required
                                class="mt-1 h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded @error('terms_agreed') border-red-500 @enderror">
                            <label for="terms_agreed" class="ml-3 text-sm text-gray-700">
                                I agree to the <a href="#" class="text-green-600 hover:text-green-500 underline">Terms and Conditions</a>
                                and <a href="#" class="text-green-600 hover:text-green-500 underline">Privacy Policy</a> of God's Family Choir *
                            </label>
                        </div>
                        @error('terms_agreed')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        </div>

                    <div class="mt-6">
                        <div class="flex items-start">
                            <input type="checkbox" id="newsletter" name="newsletter"
                                class="mt-1 h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                            <label for="newsletter" class="ml-3 text-sm text-gray-700">
                                I would like to receive newsletters and updates about choir events and activities
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                    <button type="button" id="prev-btn" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-all duration-200 hidden">
                        <i class="fas fa-arrow-left mr-2"></i>Previous
                    </button>

                    <div class="flex space-x-4">
                        <button type="button" id="next-btn" class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-200 flex items-center">
                            Next<i class="fas fa-arrow-right ml-2"></i>
                    </button>

                        <button type="submit" id="submit-btn" class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-all duration-200 flex items-center hidden">
                            <i class="fas fa-paper-plane mr-2"></i>Submit Application
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <x-static.footer />
    </div>
</div>

<!-- Success Modal -->
<div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-lg mx-4 transform transition-all duration-500 scale-95 shadow-2xl border border-gray-100">
        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                <i class="fas fa-check text-white text-3xl"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-3">Application Submitted!</h3>
            <p class="text-gray-600 mb-8 text-lg leading-relaxed">Thank you for your interest in joining God's Family Choir. We'll review your application and get back to you within 3-5 business days.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button onclick="closeSuccessModal()" class="px-8 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-home mr-2"></i>Return Home
                </button>
                <button onclick="window.location.href='/about'" class="px-8 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-info-circle mr-2"></i>Learn More
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div id="error-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-lg mx-4 transform transition-all duration-500 scale-95 shadow-2xl border border-gray-100">
        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-r from-red-400 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
                <i class="fas fa-exclamation-triangle text-white text-3xl"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-3">Oops! Something went wrong</h3>
            <p id="error-message" class="text-gray-600 mb-8 text-lg leading-relaxed">There was an error processing your application. Please try again.</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <button onclick="closeErrorModal()" class="px-8 py-3 bg-gradient-to-r from-red-500 to-pink-600 text-white rounded-xl hover:from-red-600 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-redo mr-2"></i>Try Again
                </button>
                <button onclick="closeErrorModal()" class="px-8 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-times mr-2"></i>Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Validation Error Modal -->
<div id="validation-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-lg mx-4 transform transition-all duration-500 scale-95 shadow-2xl border border-gray-100">
        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                <i class="fas fa-exclamation-circle text-white text-3xl"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-3">Please Complete All Fields</h3>
            <p id="validation-message" class="text-gray-600 mb-8 text-lg leading-relaxed">Please fill in all required fields before proceeding to the next step.</p>
            <button onclick="closeValidationModal()" class="px-8 py-3 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-xl hover:from-yellow-600 hover:to-orange-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i class="fas fa-edit mr-2"></i>Continue Filling Form
            </button>
        </div>
    </div>
</div>

<!-- Loading Modal -->
<div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl p-8 max-w-md mx-4 transform transition-all duration-500 scale-95 shadow-2xl border border-gray-100">
        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-spin">
                <i class="fas fa-spinner text-white text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-3">Submitting Application...</h3>
            <p class="text-gray-600 text-lg leading-relaxed">Please wait while we process your application. This may take a few moments.</p>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;
    const totalSteps = 4;

document.addEventListener('DOMContentLoaded', function() {
    updateStepDisplay();

    document.getElementById('next-btn').addEventListener('click', nextStep);
    document.getElementById('prev-btn').addEventListener('click', prevStep);

    // Add keyboard navigation support
    document.addEventListener('keydown', function(e) {
        // ESC key closes any open modal
        if (e.key === 'Escape') {
            const openModals = document.querySelectorAll('.fixed.inset-0.flex');
            openModals.forEach(modal => {
                if (modal.id === 'success-modal') closeSuccessModal();
                if (modal.id === 'error-modal') closeErrorModal();
                if (modal.id === 'validation-modal') closeValidationModal();
                if (modal.id === 'loading-modal') hideLoadingModal();
            });
        }

        // Enter key on Next button
        if (e.key === 'Enter' && e.target.id === 'next-btn') {
            e.preventDefault();
            nextStep();
        }
    });

    // Add click-outside-to-close for modals
    document.querySelectorAll('.fixed.inset-0').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                if (modal.id === 'success-modal') closeSuccessModal();
                if (modal.id === 'error-modal') closeErrorModal();
                if (modal.id === 'validation-modal') closeValidationModal();
                if (modal.id === 'loading-modal') return; // Don't close loading modal by clicking outside
            }
        });
    });

    // Form submission
    document.getElementById('member-registration-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Show loading modal
        showLoadingModal();

        // Submit form via AJAX
        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            hideLoadingModal();

            if (data.success) {
                showSuccessModal();
            } else {
                // Handle validation errors
                if (data.errors) {
                    displayErrors(data.errors);
                    showValidationModal('Please correct the highlighted errors before submitting.');
                } else {
                    showErrorModal('An error occurred while processing your application. Please try again.');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            hideLoadingModal();
            showErrorModal('An error occurred while processing your application. Please try again.');
        });
    });
});

function nextStep() {
    if (validateCurrentStep()) {
        if (currentStep < totalSteps) {
            currentStep++;
            updateStepDisplay();
        }
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        updateStepDisplay();
    }
    }

    function validateCurrentStep() {
    const currentStepElement = document.getElementById(`form-step-${currentStep}`);
    const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;
    let missingFields = [];

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
            field.classList.add('animate-pulse');
                isValid = false;

            // Get field label for better error message
            const label = field.previousElementSibling?.textContent || field.getAttribute('placeholder') || 'field';
            missingFields.push(label.replace('*', '').trim());
            } else {
                field.classList.remove('border-red-500');
            field.classList.remove('animate-pulse');
        }
    });

    if (!isValid) {
        const stepNames = ['Personal Information', 'Professional Information', 'Choir Details', 'Final Touch'];
        const currentStepName = stepNames[currentStep - 1];
        const message = `Please complete the following required fields in ${currentStepName}:\n\n• ${missingFields.slice(0, 3).join('\n• ')}${missingFields.length > 3 ? `\n• ...and ${missingFields.length - 3} more` : ''}`;
        showValidationModal(message);
    }

        return isValid;
    }

function updateStepDisplay() {
    // Update step indicators
    for (let i = 1; i <= totalSteps; i++) {
        const stepElement = document.getElementById(`step-${i}`);
        const stepContent = document.getElementById(`form-step-${i}`);

        if (i <= currentStep) {
            stepElement.classList.remove('bg-gray-200', 'text-gray-500');
            stepElement.classList.add('bg-green-600', 'text-white');
        } else {
            stepElement.classList.remove('bg-green-600', 'text-white');
            stepElement.classList.add('bg-gray-200', 'text-gray-500');
        }

        if (i === currentStep) {
            stepContent.classList.remove('hidden');
            stepContent.classList.add('animate-fadeIn');
        } else {
            stepContent.classList.add('hidden');
            stepContent.classList.remove('animate-fadeIn');
        }
    }

    // Update progress bars
    for (let i = 1; i < currentStep; i++) {
        const progressElement = document.getElementById(`progress-${i}`);
        progressElement.style.width = '100%';
    }

    // Update navigation buttons
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const submitBtn = document.getElementById('submit-btn');

    if (currentStep === 1) {
        prevBtn.classList.add('hidden');
    } else {
        prevBtn.classList.remove('hidden');
    }

    if (currentStep === totalSteps) {
        nextBtn.classList.add('hidden');
        submitBtn.classList.remove('hidden');
    } else {
        nextBtn.classList.remove('hidden');
        submitBtn.classList.add('hidden');
    }
}

// Modal control functions
function showSuccessModal() {
    const modal = document.getElementById('success-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    // Animate modal appearance
    setTimeout(() => {
        const modalContent = modal.querySelector('.bg-white');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }, 10);
}

function closeSuccessModal() {
    const modal = document.getElementById('success-modal');
    const modalContent = modal.querySelector('.bg-white');

    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        // Reset form
        document.getElementById('member-registration-form').reset();
        currentStep = 1;
        updateStepDisplay();
    }, 300);
}

function showErrorModal(message) {
    const modal = document.getElementById('error-modal');
    const messageElement = document.getElementById('error-message');

    if (message) {
        messageElement.textContent = message;
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
        const modalContent = modal.querySelector('.bg-white');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }, 10);
}

function closeErrorModal() {
    const modal = document.getElementById('error-modal');
    const modalContent = modal.querySelector('.bg-white');

    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

function showValidationModal(message) {
    const modal = document.getElementById('validation-modal');
    const messageElement = document.getElementById('validation-message');

    if (message) {
        messageElement.innerHTML = message.replace(/\n/g, '<br>');
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
        const modalContent = modal.querySelector('.bg-white');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }, 10);
}

function closeValidationModal() {
    const modal = document.getElementById('validation-modal');
    const modalContent = modal.querySelector('.bg-white');

    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        // Focus on first invalid field
        const invalidField = document.querySelector('.border-red-500');
        if (invalidField) {
            invalidField.focus();
            invalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }, 300);
}

function showLoadingModal() {
    const modal = document.getElementById('loading-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    setTimeout(() => {
        const modalContent = modal.querySelector('.bg-white');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }, 10);
}

function hideLoadingModal() {
    const modal = document.getElementById('loading-modal');
    const modalContent = modal.querySelector('.bg-white');

    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');

    setTimeout(() => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }, 300);
}

function displayErrors(errors) {
    // Clear previous errors
    document.querySelectorAll('.border-red-500').forEach(field => {
        field.classList.remove('border-red-500', 'animate-pulse', 'field-error');
    });

    // Display new errors with animations
    Object.keys(errors).forEach(field => {
        const fieldElement = document.querySelector(`[name="${field}"]`);
        if (fieldElement) {
            fieldElement.classList.add('border-red-500', 'animate-pulse', 'field-error');

            // Add error message below field if it doesn't exist
            const errorContainer = fieldElement.parentNode;
            const existingError = errorContainer.querySelector('.field-error-message');

            if (!existingError) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'field-error-message text-red-500 text-sm mt-1 animate-fadeIn';
                errorDiv.textContent = errors[field][0]; // Show first error message
                errorContainer.appendChild(errorDiv);
            }

            // Scroll to first error field
            if (Object.keys(errors)[0] === field) {
                fieldElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    });
}
</script>

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInFromBottom {
    from {
        opacity: 0;
        transform: translateY(50px) scale(0.9);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes slideOutToBottom {
    from {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    to {
        opacity: 0;
        transform: translateY(50px) scale(0.9);
    }
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
    }
    40%, 43% {
        transform: translate3d(0, -8px, 0);
    }
    70% {
        transform: translate3d(0, -4px, 0);
    }
    90% {
        transform: translate3d(0, -2px, 0);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.5;
    }
}

.animate-fadeIn {
    animation: fadeIn 0.5s ease-out;
}

.animate-slideIn {
    animation: slideInFromBottom 0.4s ease-out;
}

.animate-slideOut {
    animation: slideOutToBottom 0.3s ease-in;
}

.animate-bounce-custom {
    animation: bounce 2s infinite;
}

.animate-pulse-custom {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

.step-content {
    min-height: 400px;
}

input:focus, select:focus, textarea:focus {
    transform: translateY(-1px);
    box-shadow: 0 10px 25px rgba(34, 197, 94, 0.1);
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* Modal backdrop blur effect */
.modal-backdrop {
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}

/* Custom scrollbar for modals */
.modal-content::-webkit-scrollbar {
    width: 6px;
}

.modal-content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.modal-content::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.modal-content::-webkit-scrollbar-thumb:hover {
    background: #a1a1a1;
}

/* Enhanced button animations */
.btn-primary {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.btn-primary:hover::before {
    left: 100%;
}

/* Form field focus animations */
.form-field {
    transition: all 0.3s ease;
}

.form-field:focus {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(34, 197, 94, 0.15);
}

/* Error state animations */
.field-error {
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
    20%, 40%, 60%, 80% { transform: translateX(2px); }
}

/* Progress bar animation */
.progress-bar {
    transition: width 0.8s ease-in-out;
    background: linear-gradient(90deg, #22c55e, #16a34a);
}

/* Loading spinner enhancement */
.spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* Background animations */
@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-10px) rotate(1deg); }
    66% { transform: translateY(5px) rotate(-1deg); }
}

@keyframes drift {
    0% { transform: translateX(0px) translateY(0px); }
    33% { transform: translateX(30px) translateY(-30px); }
    66% { transform: translateX(-20px) translateY(20px); }
    100% { transform: translateX(0px) translateY(0px); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-drift {
    animation: drift 8s ease-in-out infinite;
}

/* Enhanced glassmorphism */
.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Form field enhancements */
.form-field-enhanced {
    background: rgba(255, 255, 255, 0.9);
    border: 2px solid rgba(34, 197, 94, 0.1);
    transition: all 0.3s ease;
}

.form-field-enhanced:focus {
    background: rgba(255, 255, 255, 1);
    border-color: rgba(34, 197, 94, 0.3);
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
}

@media (max-width: 768px) {
    .flex.space-x-8 {
        flex-direction: column;
        space-x: 0;
        space-y: 4;
    }

    .w-16.h-1 {
        width: 1rem;
        height: 1rem;
        border-radius: 50%;
    }

    /* Mobile modal adjustments */
    .modal-content {
        margin: 1rem;
        max-height: 90vh;
        overflow-y: auto;
    }

    /* Mobile background adjustments */
    .absolute.top-20.left-10,
    .absolute.top-40.right-20,
    .absolute.bottom-32.left-1\/4,
    .absolute.bottom-20.right-1\/3 {
        display: none;
    }
}

/* Ensure page is scrollable and has light background */
html, body {
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #f0fdf4; /* Light green background fallback */
}

/* Fix any potential scroll issues */
.relative.z-10 {
    position: relative;
    z-index: 10;
}

/* Ensure background is visible */
.absolute.inset-0 {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1;
}
</style>
@endsection
