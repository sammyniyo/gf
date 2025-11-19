@extends('layouts.app')

@section('title', 'Contact Us | God\'s Family Choir')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 via-white to-gray-50">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/40 via-white to-amber-50/30"></div>
    <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-emerald-200/20 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-96 w-96 rounded-full bg-amber-200/30 blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-[600px] w-[600px] rounded-full bg-blue-100/10 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 pt-28 pb-16 sm:px-8 lg:px-12 sm:pt-32">
        <div class="mx-auto max-w-7xl">
            <div class="text-center space-y-6 max-w-4xl mx-auto">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-6 py-2.5 text-xs font-bold uppercase tracking-wide text-white shadow-xl">
                    <i class="fas fa-envelope text-sm"></i>
                    Get in Touch
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-gray-900 leading-tight">
                    Let's <span class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-amber-600 bg-clip-text text-transparent">Connect</span>
                </h1>
                <p class="text-lg sm:text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    Whether you have questions, want to book us for an event, or simply want to say hello — we're here and we'd love to hear from you!
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Contact Cards -->
    <section class="relative z-10 px-6 pb-12 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Email Card -->
                <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="group relative overflow-hidden rounded-2xl border-2 border-emerald-100 bg-white/80 backdrop-blur-sm p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-emerald-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/0 to-emerald-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Email Us</h3>
                        <p class="text-sm text-emerald-600 font-semibold mb-1 break-all">asa.godsfamilychoir2017@gmail.com</p>
                        <p class="text-xs text-gray-500">We respond within 24 hours</p>
                    </div>
                </a>

                <!-- Location Card -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-blue-100 bg-white/80 backdrop-blur-sm p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-blue-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-map-marker-alt text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Visit Us</h3>
                        <p class="text-sm text-blue-600 font-semibold mb-1">Nyamirambo SDA</p>
                        <p class="text-xs text-gray-500">Kigali, Rwanda</p>
                    </div>
                </div>

                <!-- Response Time Card -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-amber-100 bg-white/80 backdrop-blur-sm p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-amber-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/0 to-amber-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Quick Response</h3>
                        <p class="text-sm text-amber-600 font-semibold mb-1">Within 24 Hours</p>
                        <p class="text-xs text-gray-500">We're here to help</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="relative z-10 px-6 py-12 sm:px-8 lg:px-12 sm:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Left Column - Additional Info -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="space-y-4">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                            We're Here to <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Help</span>
                        </h2>
                        <p class="text-base text-gray-600 leading-relaxed">
                            Have a question or want to connect? Fill out the form and we'll get back to you as soon as possible.
                        </p>
                    </div>

                    <!-- What to Expect -->
                    <div class="rounded-2xl border-2 border-gray-100 bg-white/80 backdrop-blur-sm p-6 shadow-lg">
                        <h3 class="mb-4 text-lg font-bold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-list-check text-emerald-600"></i>
                            What to Expect
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 font-bold text-sm">
                                    1
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Submit Your Message</p>
                                    <p class="text-xs text-gray-600 mt-1">Fill out the form with your details</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600 font-bold text-sm">
                                    2
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">We'll Review</p>
                                    <p class="text-xs text-gray-600 mt-1">Our team will assess your message</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600 font-bold text-sm">
                                    3
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Get a Response</p>
                                    <p class="text-xs text-gray-600 mt-1">We'll reply within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="rounded-2xl border-2 border-gray-100 bg-white/80 backdrop-blur-sm p-6 shadow-lg">
                        <h3 class="mb-4 text-lg font-bold text-gray-900 flex items-center gap-2">
                            <i class="fas fa-share-alt text-emerald-600"></i>
                            Follow Our Journey
                        </h3>
                        <div class="grid grid-cols-3 gap-3">
                            <a href="https://www.facebook.com/FChoirOfGod" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-blue-100 bg-blue-50 p-3 transition-all hover:border-blue-300 hover:shadow-md hover:-translate-y-1">
                                <i class="fab fa-facebook-f text-xl text-blue-600"></i>
                                <span class="text-xs font-semibold text-blue-600">Facebook</span>
                            </a>
                            <a href="https://www.instagram.com/choir_of_god" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-pink-100 bg-pink-50 p-3 transition-all hover:border-pink-300 hover:shadow-md hover:-translate-y-1">
                                <i class="fab fa-instagram text-xl text-pink-600"></i>
                                <span class="text-xs font-semibold text-pink-600">Instagram</span>
                            </a>
                            <a href="https://www.youtube.com/@godsfamilychoir5583" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-red-100 bg-red-50 p-3 transition-all hover:border-red-300 hover:shadow-md hover:-translate-y-1">
                                <i class="fab fa-youtube text-xl text-red-600"></i>
                                <span class="text-xs font-semibold text-red-600">YouTube</span>
                            </a>
                            <a href="https://www.tiktok.com/@gods.family.choir?_t=ZM-90j5gj8DyqC&_r=1" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-black/30 bg-black/5 p-3 transition-all hover:border-black/50 hover:shadow-md hover:-translate-y-1">
                                <i class="fab fa-tiktok text-xl text-black"></i>
                                <span class="text-xs font-semibold text-black">TikTok</span>
                            </a>
                            <a href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-green-100 bg-green-50 p-3 transition-all hover:border-green-300 hover:shadow-md hover:-translate-y-1">
                                <i class="fab fa-spotify text-xl text-green-600"></i>
                                <span class="text-xs font-semibold text-green-600">Spotify</span>
                            </a>
                            <a href="https://music.apple.com/us/artist/gods-family-choir/1793673660" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-purple-100 bg-purple-50 p-3 transition-all hover:border-purple-300 hover:shadow-md hover:-translate-y-1">
                                <i class="fab fa-apple text-xl text-purple-600"></i>
                                <span class="text-xs font-semibold text-purple-600">Apple</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Contact Form -->
                <div class="lg:col-span-2" x-data="{
                    selectedSubject: '{{ old('subject', '') }}',
                    showAttachment: false,
                    fileName: '',
                    checkSubject() {
                        this.showAttachment = this.selectedSubject === 'Event Booking';
                    }
                }" x-init="checkSubject()">
                    <div class="rounded-3xl border-2 border-gray-100 bg-white/90 backdrop-blur-sm shadow-2xl overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-700 px-6 sm:px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm">
                                    <i class="fas fa-paper-plane text-white text-xl"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl sm:text-2xl font-bold text-white">Send a Message</h3>
                                    <p class="text-sm text-emerald-100 mt-1">We'd love to hear from you</p>
                                </div>
                            </div>
                        </div>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="mx-6 sm:mx-8 mt-6 rounded-xl border-2 border-emerald-200 bg-emerald-50 p-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-500">
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                    <p class="text-sm font-semibold text-emerald-900">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Form -->
                        <form method="POST" action="{{ route('contact.submit') }}" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6" x-on:submit="fileName = ''">
                            @csrf

                            <!-- Honeypot field -->
                            <div class="hidden" aria-hidden="true">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website" tabindex="-1" autocomplete="off" />
                            </div>

                            <div class="grid sm:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900 flex items-center gap-1">
                                        <i class="fas fa-user text-emerald-600 text-xs"></i>
                                        Your Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}" required
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('name') border-red-300 @enderror"
                                        placeholder="John Doe">
                                    @error('name')
                                        <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900 flex items-center gap-1">
                                        <i class="fas fa-envelope text-emerald-600 text-xs"></i>
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('email') border-red-300 @enderror"
                                        placeholder="john@example.com">
                                    @error('email')
                                        <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-6">
                                <!-- Phone -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900 flex items-center gap-1">
                                        <i class="fas fa-phone text-emerald-600 text-xs"></i>
                                        Phone Number
                                    </label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('phone') border-red-300 @enderror"
                                        placeholder="+250 783 871 782">
                                    @error('phone')
                                        <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Subject -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900 flex items-center gap-1">
                                        <i class="fas fa-tag text-emerald-600 text-xs"></i>
                                        Subject
                                    </label>
                                    <select name="subject" x-model="selectedSubject" @change="checkSubject()"
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('subject') border-red-300 @enderror">
                                        <option value="">Select a topic</option>
                                        <option value="General Inquiry" {{ old('subject') === 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                                        <option value="Event Booking" {{ old('subject') === 'Event Booking' ? 'selected' : '' }}>Event Booking</option>
                                        <option value="Join Choir" {{ old('subject') === 'Join Choir' ? 'selected' : '' }}>Join the Choir</option>
                                        <option value="Prayer Request" {{ old('subject') === 'Prayer Request' ? 'selected' : '' }}>Prayer Request</option>
                                        <option value="Partnership" {{ old('subject') === 'Partnership' ? 'selected' : '' }}>Partnership</option>
                                        <option value="Feedback" {{ old('subject') === 'Feedback' ? 'selected' : '' }}>Feedback</option>
                                    </select>
                                    @error('subject')
                                        <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Attachment Section - Only shows for Event Booking -->
                            <div x-show="showAttachment"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform -translate-y-2"
                                 x-transition:enter-end="opacity-100 transform translate-y-0"
                                 x-cloak
                                 class="space-y-2">
                                <label class="block text-sm font-bold text-gray-900 flex items-center gap-2">
                                    <i class="fas fa-paperclip text-amber-600"></i>
                                    Attach Invitation Document
                                    <span class="text-xs font-normal text-gray-500">(Optional)</span>
                                </label>
                                <div class="relative">
                                    <input type="file"
                                           name="attachment"
                                           id="attachment"
                                           accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                           @change="fileName = $event.target.files[0]?.name || ''"
                                           class="hidden"
                                           @error('attachment') class="border-red-300" @enderror>
                                    <label for="attachment" class="flex items-center gap-3 cursor-pointer rounded-xl border-2 border-dashed border-amber-300 bg-amber-50/50 px-6 py-4 transition-all hover:border-amber-400 hover:bg-amber-50">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-cloud-upload-alt text-2xl text-amber-600"></i>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-900" x-text="fileName || 'Click to upload or drag and drop'"></p>
                                            <p class="text-xs text-gray-500 mt-1">PDF, DOC, DOCX, JPG, PNG (Max 10MB)</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-file-alt text-xl text-amber-600"></i>
                                        </div>
                                    </label>
                                </div>
                                @error('attachment')
                                    <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </p>
                                @enderror
                                <p class="text-xs text-gray-500 flex items-center gap-1">
                                    <i class="fas fa-info-circle text-blue-500"></i>
                                    Upload your event invitation, flyer, or any relevant document
                                </p>
                            </div>

                            <!-- Message -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-900 flex items-center gap-1">
                                    <i class="fas fa-comment-alt text-emerald-600 text-xs"></i>
                                    Your Message <span class="text-red-500">*</span>
                                </label>
                                <textarea name="message" rows="6" required
                                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none resize-none @error('message') border-red-300 @enderror"
                                    placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                                    </p>
                                @enderror
                                <p class="text-xs text-gray-500">Maximum 1000 characters</p>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-700 px-8 py-4 text-base sm:text-lg font-bold text-white shadow-xl shadow-emerald-500/30 transition-all hover:shadow-2xl hover:shadow-emerald-500/40 hover:-translate-y-1 hover:scale-[1.02]">
                                <i class="fas fa-paper-plane"></i>
                                <span>Send Message</span>
                            </button>

                            <!-- Trust Indicators -->
                            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 border-t-2 border-gray-100 pt-6">
                                <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-600">
                                    <i class="fas fa-shield-alt text-emerald-600"></i>
                                    <span class="font-semibold">Secure & Private</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-600">
                                    <i class="fas fa-bolt text-emerald-600"></i>
                                    <span class="font-semibold">Quick Response</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-600">
                                    <i class="fas fa-check-circle text-emerald-600"></i>
                                    <span class="font-semibold">No Spam</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="relative z-10 px-6 py-16 sm:px-8 lg:px-12 sm:py-20 bg-gradient-to-br from-emerald-50/30 via-white to-amber-50/30">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-12 sm:mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-xs font-bold uppercase tracking-wide text-amber-700">
                    <i class="fas fa-question-circle"></i>
                    Common Questions
                </span>
                <h2 class="mt-6 text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900">
                    Frequently Asked <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">Questions</span>
                </h2>
                <p class="mt-4 text-base sm:text-lg text-gray-600">Quick answers to questions you may have</p>
            </div>

            <div class="mx-auto max-w-4xl space-y-4" x-data="{ openFaq: null }">
                @php
                    $faqs = [
                        [
                            'question' => 'How can I join the choir?',
                            'answer' => 'Click the "Join Our Choir" button in the navigation menu to fill out our registration form. Our team will review your application and get back to you within 2-3 business days with next steps.'
                        ],
                        [
                            'question' => 'Do I need prior musical experience to join?',
                            'answer' => 'Not at all! We welcome members of all skill levels. Whether you\'re a beginner or have years of experience, there\'s a place for you in our choir family. We provide training and mentorship for all members.'
                        ],
                        [
                            'question' => 'How can I book the choir for an event?',
                            'answer' => 'Select "Event Booking" as your subject in the contact form above and include your event details (date, location, type of event, expected audience). You can also attach an invitation document. We\'ll get back to you within 24 hours with availability and booking information.'
                        ],
                        [
                            'question' => 'When and where do rehearsals take place?',
                            'answer' => 'We hold regular rehearsals at Nyamirambo SDA in Kigali. Specific times vary throughout the year, so please contact us or join our WhatsApp community group for the current rehearsal schedule.'
                        ],
                        [
                            'question' => 'How can I support the ministry?',
                            'answer' => 'You can support us through prayers, financial contributions, attending our events, or sharing our music with others. Contact us directly to learn more about partnership and sponsorship opportunities.'
                        ],
                        [
                            'question' => 'Can I request the choir to perform at my church or event?',
                            'answer' => 'Yes! We love ministering at various churches and events. Please fill out the contact form with "Event Booking" as the subject, include details about your event, and attach your invitation if available. We\'ll be in touch to discuss availability, requirements, and logistics.'
                        ],
                    ];
                @endphp

                @foreach($faqs as $index => $faq)
                    <div class="overflow-hidden rounded-2xl border-2 border-gray-100 bg-white shadow-lg transition-all hover:shadow-xl"
                         x-data="{ faqIndex: {{ $index }} }">
                        <button @click="openFaq = openFaq === faqIndex ? null : faqIndex"
                                class="flex w-full items-center justify-between gap-4 px-4 sm:px-6 py-4 sm:py-5 text-left transition-colors hover:bg-gray-50">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-emerald-500 to-emerald-600 text-white font-bold shadow-lg">
                                    {{ $index + 1 }}
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-gray-900">{{ $faq['question'] }}</h3>
                            </div>
                            <i class="fas fa-chevron-down text-emerald-600 transition-transform flex-shrink-0"
                               :class="openFaq === faqIndex ? 'rotate-180' : ''"></i>
                        </button>
                        <div x-show="openFaq === faqIndex"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-cloak
                             class="border-t-2 border-gray-100 bg-gray-50 px-4 sm:px-6 py-4 sm:py-5">
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed pl-0 sm:pl-14">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="relative z-10 px-6 py-16 sm:px-8 lg:px-12 sm:py-20">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-bold uppercase tracking-wide text-blue-700">
                    <i class="fas fa-map-marker-alt"></i>
                    Our Location
                </span>
                <h2 class="mt-6 text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900">
                    Come <span class="bg-gradient-to-r from-blue-600 to-blue-500 bg-clip-text text-transparent">Visit Us</span>
                </h2>
                <p class="mt-4 text-base sm:text-lg text-gray-600">Nyamirambo SDA, Kigali, Rwanda</p>
            </div>

            <div class="overflow-hidden rounded-3xl border-2 border-gray-200 bg-white shadow-2xl">
                <div class="aspect-[16/9] bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center p-8 sm:p-12">
                    <div class="text-center space-y-6">
                        <div class="inline-flex h-16 w-16 sm:h-20 sm:w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-2xl">
                            <i class="fas fa-map-marker-alt text-white text-2xl sm:text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">Nyamirambo SDA</h3>
                            <p class="text-base sm:text-lg text-gray-600 mb-6">Kigali, Rwanda</p>
                        </div>
                        <a href="https://maps.google.com/?q=Nyamirambo+SDA+Kigali" target="_blank"
                           class="inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-6 sm:px-8 py-3 sm:py-4 text-sm sm:text-base font-bold text-white shadow-xl shadow-blue-500/30 transition-all hover:shadow-2xl hover:shadow-blue-500/40 hover:-translate-y-1">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Open in Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripture Quote -->
    <section class="relative z-10 px-6 pb-24 sm:px-8 lg:px-12 sm:pb-32">
        <div class="mx-auto max-w-4xl">
            <div class="relative overflow-hidden rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-50 via-white to-amber-50 p-8 sm:p-12 shadow-2xl text-center">
                <div class="absolute top-0 left-0 w-32 h-32 bg-emerald-200/40 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-amber-200/40 rounded-full blur-3xl"></div>
                <div class="relative">
                    <i class="fas fa-quote-left text-4xl sm:text-5xl text-emerald-600/30 mb-6"></i>
                    <blockquote class="text-xl sm:text-2xl lg:text-3xl font-light italic text-gray-700 leading-relaxed mb-6">
                        "Let your speech always be gracious, seasoned with salt, so that you may know how you ought to answer each person."
                    </blockquote>
                    <p class="text-lg sm:text-xl font-bold text-emerald-600">— Colossians 4:6</p>
                </div>
            </div>
        </div>
    </section>
</div>

<x-static.footer />
@endsection

@push('styles')
<style>
    /* Ensure Alpine.js x-cloak works */
    [x-cloak] {
        display: none !important;
    }
</style>
@endpush
