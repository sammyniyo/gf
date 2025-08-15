@extends('layouts.app')

@section('content')
    <section class="relative bg-white py-20">
        <div class="absolute -right-32 -top-32 w-64 h-64 rounded-full bg-lime-400 opacity-20 blur-3xl"></div>
        <div class="absolute -left-32 -bottom-32 w-64 h-64 rounded-full bg-emerald-500 opacity-20 blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-emerald-800 mb-4">Join the Choir Family</h2>
                <p class="text-lg text-gray-600">We are excited to welcome new voices, talents, and hearts. Fill out the form
                    below to be part of God's Family Choir.</p>
            </div>

            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-4">
                    <div class="flex-1 text-center">
                        <span
                            class="step-indicator inline-block w-8 h-8 rounded-full bg-emerald-200 text-emerald-800 font-bold flex items-center justify-center"
                            data-step="1">1</span>
                        <p class="text-sm font-medium text-gray-700 mt-2">Personal Info</p>
                    </div>
                    <div class="flex-1 text-center">
                        <span
                            class="step-indicator inline-block w-8 h-8 rounded-full bg-gray-200 text-gray-600 font-bold flex items-center justify-center"
                            data-step="2">2</span>
                        <p class="text-sm font-medium text-gray-700 mt-2">Professional & Church</p>
                    </div>
                    <div class="flex-1 text-center">
                        <span
                            class="step-indicator inline-block w-8 h-8 rounded-full bg-gray-200 text-gray-600 font-bold flex items-center justify-center"
                            data-step="3">3</span>
                        <p class="text-sm font-medium text-gray-700 mt-2">Choir Info</p>
                    </div>
                    <div class="flex-1 text-center">
                        <span
                            class="step-indicator inline-block w-8 h-8 rounded-full bg-gray-200 text-gray-600 font-bold flex items-center justify-center"
                            data-step="4">4</span>
                        <p class="text-sm font-medium text-gray-700 mt-2">Additional Info</p>
                    </div>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="progress-bar bg-emerald-600 h-2 rounded-full" style="width: 25%"></div>
                </div>
            </div>

            <form method="POST" action="{{ route('choir.register') }}" enctype="multipart/form-data" id="multi-step-form"
                class="bg-white shadow-2xl rounded-3xl p-6 md:p-8 border border-gray-100">
                @csrf

                <!-- Step 1: Personal Information -->
                <div class="step" data-step="1">
                    <fieldset class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <legend class="text-lg font-semibold text-gray-800 mb-4">Personal Information</legend>
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required placeholder="Enter your full name" aria-describedby="name-error">
                            @error('name')
                                <span id="name-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span
                                    class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required placeholder="Enter your email" aria-describedby="email-error">
                            @error('email')
                                <span id="email-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span
                                    class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required pattern="[0-9]{10,15}" placeholder="Enter your phone number"
                                aria-describedby="phone-error">
                            @error('phone')
                                <span id="phone-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">Birthday <span
                                    class="text-red-500">*</span></label>
                            <input type="date" name="birthdate" id="birthdate"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required aria-describedby="birthdate-error">
                            @error('birthdate')
                                <span id="birthdate-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Physical Address
                                <span class="text-red-500">*</span></label>
                            <input type="text" name="address" id="address"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required placeholder="Enter your address" aria-describedby="address-error">
                            @error('address')
                                <span id="address-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                </div>

                <!-- Step 2: Professional & Church Information -->
                <div class="step hidden" data-step="2">
                    <fieldset class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <legend class="text-lg font-semibold text-gray-800 mb-4">Professional & Church Information</legend>
                        <div>
                            <label for="occupation" class="block text-sm font-medium text-gray-700 mb-1">Occupation / Job
                                Title</label>
                            <input type="text" name="occupation" id="occupation"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="Enter your occupation" aria-describedby="occupation-error">
                            @error('occupation')
                                <span id="occupation-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="workplace" class="block text-sm font-medium text-gray-700 mb-1">Workplace</label>
                            <input type="text" name="workplace" id="workplace"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="Enter your workplace" aria-describedby="workplace-error">
                            @error('workplace')
                                <span id="workplace-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="church" class="block text-sm font-medium text-gray-700 mb-1">Your Church</label>
                            <input type="text" name="church" id="church"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="Enter your church name" aria-describedby="church-error">
                            @error('church')
                                <span id="church-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="roles" class="block text-sm font-medium text-gray-700 mb-1">Choir / Church
                                Roles</label>
                            <input type="text" name="roles" id="roles"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="e.g., Conductor, Pianist" aria-describedby="roles-error">
                            @error('roles')
                                <span id="roles-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                </div>

                <!-- Step 3: Choir Information -->
                <div class="step hidden" data-step="3">
                    <fieldset class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <legend class="text-lg font-semibold text-gray-800 mb-4">Choir Information</legend>
                        <div>
                            <label for="voice" class="block text-sm font-medium text-gray-700 mb-1">Voice <span
                                    class="text-red-500">*</span></label>
                            <select name="voice" id="voice"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required aria-describedby="voice-error">
                                <option value="">Select Voice</option>
                                <option value="Soprano">Soprano</option>
                                <option value="Alto">Alto</option>
                                <option value="Tenor">Tenor</option>
                                <option value="Bass">Bass</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('voice')
                                <span id="voice-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="talent" class="block text-sm font-medium text-gray-700 mb-1">Musical
                                Talent</label>
                            <select name="talent" id="talent"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                aria-describedby="talent-error">
                                <option value="">Select Talent</option>
                                <option value="Singer">Singer</option>
                                <option value="Instrumentalist">Instrumentalist</option>
                                <option value="Composer">Composer</option>
                                <option value="Technician">Technician</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('talent')
                                <span id="talent-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Membership Status
                                <span class="text-red-500">*</span></label>
                            <select name="status" id="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                required aria-describedby="status-error">
                                <option value="">Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Guest">Guest</option>
                            </select>
                            @error('status')
                                <span id="status-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="joined_at" class="block text-sm font-medium text-gray-700 mb-1">Join Date</label>
                            <input type="date" name="joined_at" id="joined_at"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                aria-describedby="joined_at-error">
                            @error('joined_at')
                                <span id="joined_at-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                </div>

                <!-- Step 4: Additional Information -->
                <div class="step hidden" data-step="4">
                    <fieldset class="grid grid-cols-1 gap-6 mb-6">
                        <legend class="text-lg font-semibold text-gray-800 mb-4">Additional Information</legend>
                        <div>
                            <label for="hobbies" class="block text-sm font-medium text-gray-700 mb-1">Hobbies /
                                Interests</label>
                            <input type="text" name="hobbies" id="hobbies"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="e.g., Reading, Playing Guitar" aria-describedby="hobbies-error">
                            @error('hobbies')
                                <span id="hobbies-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Upload Your
                                Picture</label>
                            <input type="file" name="photo" id="photo" accept="image/*"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                aria-describedby="photo-error">
                            @error('photo')
                                <span id="photo-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message to
                                Us</label>
                            <textarea name="message" id="message" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors"
                                placeholder="Write a short note about why you want to join..." aria-describedby="message-error"></textarea>
                            @error('message')
                                <span id="message-error" class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </fieldset>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                    <button type="button" id="prev-btn"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hidden"
                        disabled>
                        Previous
                    </button>
                    <button type="button" id="next-btn"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105">
                        Next
                    </button>
                    <button type="submit" id="submit-btn"
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hidden">
                        Submit Registration
                    </button>
                </div>
            </form>
        </div>
    </section>

    <style>
        .step {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .step.hidden {
            display: none;
            opacity: 0;
            transform: translateY(10px);
        }

        .step.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .step-indicator.active {
            background-color: #10b981;
            color: #fff;
        }

        .progress-bar {
            transition: width 0.3s ease;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('multi-step-form');
            const steps = document.querySelectorAll('.step');
            const stepIndicators = document.querySelectorAll('.step-indicator');
            const progressBar = document.querySelector('.progress-bar');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const submitBtn = document.getElementById('submit-btn');
            let currentStep = 1;

            const updateStep = (step) => {
                steps.forEach((s, index) => {
                    s.classList.toggle('hidden', index + 1 !== step);
                    s.classList.toggle('active', index + 1 === step);
                });
                stepIndicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index + 1 === step);
                });
                progressBar.style.width = `${(step / steps.length) * 100}%`;
                prevBtn.classList.toggle('hidden', step === 1);
                prevBtn.disabled = step === 1;
                nextBtn.classList.toggle('hidden', step === steps.length);
                submitBtn.classList.toggle('hidden', step !== steps.length);
            };

            const validateStep = (step) => {
                const currentInputs = steps[step - 1].querySelectorAll('input[required], select[required]');
                let valid = true;
                currentInputs.forEach(input => {
                    if (!input.value) {
                        input.reportValidity();
                        valid = false;
                    }
                });
                return valid;
            };

            nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    currentStep++;
                    updateStep(currentStep);
                }
            });

            prevBtn.addEventListener('click', () => {
                currentStep--;
                updateStep(currentStep);
            });

            form.addEventListener('submit', (e) => {
                if (!validateStep(currentStep)) {
                    e.preventDefault();
                }
            });

            updateStep(currentStep);
        });
    </script>

    <x-static.footer />
@endsection
