@extends('layouts.app')

@section('title', 'Contact Us | God\'s Family Choir')

@section('content')
<div class="relative overflow-hidden bg-gradient-to-b from-gray-50 to-white">
    <!-- Decorative Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-white to-amber-50/30"></div>
    <div class="absolute -top-32 -left-20 h-96 w-96 rounded-full bg-emerald-200/30 blur-3xl"></div>
    <div class="absolute bottom-0 right-[-10rem] h-96 w-96 rounded-full bg-amber-200/40 blur-3xl"></div>

    <!-- Hero Section -->
    <section class="relative z-10 px-6 pt-32 pb-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="text-center space-y-6 max-w-4xl mx-auto">
                <span class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-emerald-700 px-5 py-2 text-xs font-bold uppercase tracking-wide text-white shadow-xl">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    Get in Touch
                </span>
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-gray-900 leading-tight">
                    Let's <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Connect</span>
                </h1>
                <p class="text-xl text-gray-600 leading-relaxed max-w-3xl mx-auto">
                    Whether you have questions, want to book us for an event, or simply want to say hello — we're here and we'd love to hear from you!
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Contact Cards -->
    <section class="relative z-10 px-6 pb-16 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Email Card -->
                <a href="mailto:asa.godsfamilychoir2017@gmail.com" class="group relative overflow-hidden rounded-2xl border-2 border-emerald-100 bg-white p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-emerald-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/0 to-emerald-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Email Us</h3>
                        <p class="text-sm text-emerald-600 font-semibold mb-1">asa.godsfamilychoir2017@gmail.com</p>
                        <p class="text-xs text-gray-500">We respond within 24 hours</p>
                    </div>
                </a>

                <!-- Phone Card -->
                <a href="tel:+250783871782" class="group relative overflow-hidden rounded-2xl border-2 border-amber-100 bg-white p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-amber-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-500/0 to-amber-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Call Us</h3>
                        <p class="text-sm text-amber-600 font-semibold mb-1">+250 783 871 782</p>
                        <p class="text-xs text-gray-500">Mon-Sat, 9AM-6PM</p>
                    </div>
                </a>

                <!-- WhatsApp Card -->
                <a href="https://wa.me/250783871782" target="_blank" class="group relative overflow-hidden rounded-2xl border-2 border-green-100 bg-white p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-green-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/0 to-green-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-green-500 to-green-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">WhatsApp</h3>
                        <p class="text-sm text-green-600 font-semibold mb-1">+250 783 871 782</p>
                        <p class="text-xs text-gray-500">Chat with us instantly</p>
                    </div>
                </a>

                <!-- Location Card -->
                <div class="group relative overflow-hidden rounded-2xl border-2 border-blue-100 bg-white p-6 shadow-lg transition-all hover:shadow-2xl hover:-translate-y-2 hover:border-blue-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 to-blue-600/0 opacity-0 transition group-hover:opacity-5"></div>
                    <div class="relative">
                        <div class="mb-4 inline-flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Visit Us</h3>
                        <p class="text-sm text-blue-600 font-semibold mb-1">ASA UR Nyarugenge SDA</p>
                        <p class="text-xs text-gray-500">Kigali, Rwanda</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="relative z-10 px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="grid lg:grid-cols-5 gap-12 lg:gap-16">
                <!-- Left Column - Additional Info -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-3xl font-bold text-gray-900">
                            We're Here to <span class="bg-gradient-to-r from-emerald-600 to-emerald-500 bg-clip-text text-transparent">Help</span>
                        </h2>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Have a question or want to connect? Fill out the form and we'll get back to you as soon as possible.
                        </p>
                    </div>

                    <!-- Response Time Badge -->
                    <div class="inline-flex items-center gap-3 rounded-xl border-2 border-emerald-200 bg-emerald-50 px-6 py-4 shadow-md">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 shadow-lg">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-emerald-900">Quick Response</p>
                            <p class="text-xs text-emerald-700">We reply within 24 hours</p>
                        </div>
                    </div>

                    <!-- What to Expect -->
                    <div class="rounded-2xl border-2 border-gray-100 bg-white p-6 shadow-lg">
                        <h3 class="mb-4 text-lg font-bold text-gray-900">What to Expect</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                                    <span class="text-sm font-bold">1</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Submit Your Message</p>
                                    <p class="text-xs text-gray-600 mt-1">Fill out the form with your details and inquiry</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                                    <span class="text-sm font-bold">2</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">We'll Review</p>
                                    <p class="text-xs text-gray-600 mt-1">Our team will read and assess your message</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                                    <span class="text-sm font-bold">3</span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-900">Get a Response</p>
                                    <p class="text-xs text-gray-600 mt-1">We'll reply with helpful information within 24 hours</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="rounded-2xl border-2 border-gray-100 bg-white p-6 shadow-lg">
                        <h3 class="mb-4 text-lg font-bold text-gray-900">Follow Our Journey</h3>
                        <div class="grid grid-cols-3 gap-3">
                            <a href="https://www.facebook.com/FChoirOfGod" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-blue-100 bg-blue-50 p-4 transition-all hover:border-blue-300 hover:shadow-md hover:-translate-y-1">
                                <svg class="h-6 w-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                <span class="text-xs font-semibold text-blue-600">Facebook</span>
                            </a>
                            <a href="https://www.instagram.com/choir_of_god" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-pink-100 bg-pink-50 p-4 transition-all hover:border-pink-300 hover:shadow-md hover:-translate-y-1">
                                <svg class="h-6 w-6 text-pink-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                <span class="text-xs font-semibold text-pink-600">Instagram</span>
                            </a>
                            <a href="https://www.youtube.com/@godsfamilychoir5583" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-red-100 bg-red-50 p-4 transition-all hover:border-red-300 hover:shadow-md hover:-translate-y-1">
                                <svg class="h-6 w-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                                <span class="text-xs font-semibold text-red-600">YouTube</span>
                            </a>
                            <a href="https://www.tiktok.com/@gods.family.choir?_t=ZM-90j5gj8DyqC&_r=1" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-black/30 bg-black/5 p-4 transition-all hover:border-black/50 hover:shadow-md hover:-translate-y-1">
                                <svg class="h-6 w-6 text-black" fill="currentColor" viewBox="0 0 48 48">
                                    <g>
                                        <path d="M41.3 16a11.19 11.19 0 0 1-3.66-1.27 11.16 11.16 0 0 1-3.71-3.49c-1.11-1.65-1.45-3.36-1.45-4.47V6.09A1.09 1.09 0 0 0 31.39 5H26.9a1.09 1.09 0 0 0-1.09 1.09v25.07a5.44 5.44 0 1 1-5.44-5.43 1.09 1.09 0 0 0 1.09-1.09v-4.49a1.09 1.09 0 0 0-1.09-1.09H20.3a11.33 11.33 0 1 0 11.33 11.32V18.33a14.18 14.18 0 0 0 3.78 1.02 13.94 13.94 0 0 0 2.55.22 1.09 1.09 0 0 0 1.09-1.09v-4.46A1.09 1.09 0 0 0 41.3 16Z"/>
                                    </g>
                                </svg>
                                <span class="text-xs font-semibold text-black">TikTok</span>
                            </a>
                            <a href="https://open.spotify.com/artist/6qAFmjsmVuuXZEwzrIYy5J" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-green-100 bg-green-50 p-4 transition-all hover:border-green-300 hover:shadow-md hover:-translate-y-1">
                                <svg class="h-6 w-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.372 0 0 5.373 0 12s5.372 12 12 12 12-5.373 12-12S18.628 0 12 0zm5.47 17.629a1.01 1.01 0 0 1-1.39.328c-3.803-2.324-8.59-2.848-14.258-1.565a1.012 1.012 0 0 1-.45-1.978c6.102-1.395 11.336-.803 15.495 1.777a1 1 0 0 1 .303 1.438zm1.977-3.149a1.272 1.272 0 0 1-1.742.415c-4.347-2.654-10.976-3.429-16.098-1.882a1.272 1.272 0 0 1-.725-2.444c5.678-1.685 12.91-.846 17.755 2.153a1.273 1.273 0 0 1 .81 1.758zm.139-3.258c-5.307-3.02-14.134-3.292-19.247-1.805a1.526 1.526 0 0 1-.836-2.937C6.863 5.06 16.498 5.36 22.527 8.781a1.526 1.526 0 1 1-1.94 2.441z"/>
                                </svg>
                                <span class="text-xs font-semibold text-green-600">Spotify</span>
                            </a>
                            <a href="https://music.apple.com/us/artist/gods-family-choir/1793673660" target="_blank" class="flex flex-col items-center gap-2 rounded-xl border-2 border-purple-100 bg-purple-50 p-4 transition-all hover:border-purple-300 hover:shadow-md hover:-translate-y-1">
                                <svg class="h-6 w-6 text-purple-600" viewBox="0 0 32 32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="M24.996 4.003c.055-.42-.322-.733-.728-.621l-7.772 2.154a.75.75 0 0 0-.545.726v15.691a3.523 3.523 0 0 1-1.947 3.263 3.792 3.792 0 0 1-4.919-1.294 3.784 3.784 0 0 1 1.293-5.233 3.568 3.568 0 0 1 2.663-.363c.375.09.738-.182.738-.567V9.833a.75.75 0 0 0-.95-.726l-1.38.383a.75.75 0 0 0-.55.727v11.044c0 3.22 2.941 5.766 6.338 5.027a5.763 5.763 0 0 0 4.492-5.628V7.181c0-.49.366-.917.85-1.036l1.915-.509a.75.75 0 0 0 .55-.633z"/>
                                    </g>
                                </svg>
                                <span class="text-xs font-semibold text-purple-600">Apple Music</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Contact Form -->
                <div class="lg:col-span-3">
                    <div class="rounded-3xl border-2 border-gray-100 bg-white shadow-2xl overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-white">Send a Message</h3>
                                    <p class="text-sm text-emerald-100 mt-1">We'd love to hear from you</p>
                                </div>
                            </div>
                        </div>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="mx-8 mt-6 rounded-xl border-2 border-emerald-200 bg-emerald-50 p-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-500">
                                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-emerald-900">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Form -->
                        <form method="POST" action="{{ route('contact.submit') }}" class="p-8 space-y-6">
                            @csrf

                            <div class="grid sm:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900">
                                        Your Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}" required
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('name') border-red-300 @enderror"
                                        placeholder="John Doe">
                                    @error('name')
                                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('email') border-red-300 @enderror"
                                        placeholder="john@example.com">
                                    @error('email')
                                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-6">
                                <!-- Phone -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900">
                                        Phone Number
                                    </label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none @error('phone') border-red-300 @enderror"
                                        placeholder="+250 783 871 782">
                                    @error('phone')
                                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subject -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-bold text-gray-900">
                                        Subject
                                    </label>
                                    <select name="subject"
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
                                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-900">
                                    Your Message <span class="text-red-500">*</span>
                                </label>
                                <textarea name="message" rows="6" required
                                    class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all focus:border-emerald-500 focus:ring-4 focus:ring-emerald-100 outline-none resize-none @error('message') border-red-300 @enderror"
                                    placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                                <p class="text-xs text-gray-500">Maximum 1000 characters</p>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-emerald-600 to-emerald-700 px-8 py-4 text-lg font-bold text-white shadow-xl shadow-emerald-500/30 transition-all hover:shadow-2xl hover:shadow-emerald-500/40 hover:-translate-y-1">
                                <span>Send Message</span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>

                            <!-- Trust Indicators -->
                            <div class="flex flex-wrap items-center justify-center gap-6 border-t-2 border-gray-100 pt-6">
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                    <span class="font-semibold">Secure & Private</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                    <span class="font-semibold">Quick Response</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
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
    <section class="relative z-10 px-6 py-20 sm:px-8 lg:px-12 bg-gradient-to-br from-emerald-50/30 via-white to-amber-50/30">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 rounded-full bg-amber-100 px-4 py-2 text-xs font-bold uppercase tracking-wide text-amber-700">
                    Common Questions
                </span>
                <h2 class="mt-6 text-4xl font-bold text-gray-900 sm:text-5xl">
                    Frequently Asked <span class="bg-gradient-to-r from-amber-600 to-amber-500 bg-clip-text text-transparent">Questions</span>
                </h2>
                <p class="mt-4 text-lg text-gray-600">Quick answers to questions you may have</p>
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
                            'answer' => 'Send us a message through the contact form above with the subject "Event Booking" and include your event details (date, location, type of event, expected audience). We\'ll get back to you within 24 hours with availability and booking information.'
                        ],
                        [
                            'question' => 'When and where do rehearsals take place?',
                            'answer' => 'We hold regular rehearsals at ASA UR Nyarugenge SDA in Kigali. Specific times vary throughout the year, so please contact us or join our WhatsApp community group for the current rehearsal schedule.'
                        ],
                        [
                            'question' => 'How can I support the ministry?',
                            'answer' => 'You can support us through prayers, financial contributions, attending our events, or sharing our music with others. Contact us directly to learn more about partnership and sponsorship opportunities.'
                        ],
                        [
                            'question' => 'Can I request the choir to perform at my church or event?',
                            'answer' => 'Yes! We love ministering at various churches and events. Please fill out the contact form with details about your event, and we\'ll be in touch to discuss availability, requirements, and logistics.'
                        ],
                    ];
                @endphp

                @foreach($faqs as $index => $faq)
                    <div class="overflow-hidden rounded-2xl border-2 border-gray-100 bg-white shadow-lg transition-all hover:shadow-xl"
                         x-data="{ faqIndex: {{ $index }} }">
                        <button @click="openFaq = openFaq === faqIndex ? null : faqIndex"
                                class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left transition-colors hover:bg-gray-50">
                            <div class="flex items-center gap-4">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-emerald-500 to-emerald-600 text-white font-bold shadow-lg">
                                    {{ $index + 1 }}
                                </div>
                                <h3 class="text-lg font-bold text-gray-900">{{ $faq['question'] }}</h3>
                            </div>
                            <svg class="h-6 w-6 flex-shrink-0 text-emerald-600 transition-transform"
                                 :class="openFaq === faqIndex ? 'rotate-180' : ''"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="openFaq === faqIndex"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-cloak
                             class="border-t-2 border-gray-100 bg-gray-50 px-6 py-5">
                            <p class="text-gray-700 leading-relaxed pl-14">{{ $faq['answer'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="relative z-10 px-6 py-20 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="text-center mb-12">
                <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-xs font-bold uppercase tracking-wide text-blue-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Our Location
                </span>
                <h2 class="mt-6 text-4xl font-bold text-gray-900 sm:text-5xl">
                    Come <span class="bg-gradient-to-r from-blue-600 to-blue-500 bg-clip-text text-transparent">Visit Us</span>
                </h2>
                <p class="mt-4 text-lg text-gray-600">ASA UR Nyarugenge SDA, Kigali, Rwanda</p>
            </div>

            <div class="overflow-hidden rounded-3xl border-2 border-gray-200 bg-white shadow-2xl">
                <div class="aspect-[16/9] bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center p-12">
                    <div class="text-center space-y-6">
                        <div class="inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-2xl">
                            <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">ASA UR Nyarugenge SDA</h3>
                            <p class="text-lg text-gray-600 mb-6">Kigali, Rwanda</p>
                        </div>
                        <a href="https://maps.google.com/?q=ASA+UR+Nyarugenge+SDA+Kigali" target="_blank"
                           class="inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-4 text-base font-bold text-white shadow-xl shadow-blue-500/30 transition-all hover:shadow-2xl hover:shadow-blue-500/40 hover:-translate-y-1">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                            <span>Open in Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripture Quote -->
    <section class="relative z-10 px-6 pb-32 sm:px-8 lg:px-12">
        <div class="mx-auto max-w-4xl">
            <div class="relative overflow-hidden rounded-3xl border-2 border-emerald-200 bg-gradient-to-br from-emerald-50 via-white to-amber-50 p-12 shadow-2xl text-center">
                <div class="absolute top-0 left-0 w-32 h-32 bg-emerald-200/40 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-40 h-40 bg-amber-200/40 rounded-full blur-3xl"></div>
                <div class="relative">
                    <svg class="mx-auto mb-6 h-12 w-12 text-emerald-600/30" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z"/>
                    </svg>
                    <blockquote class="text-2xl sm:text-3xl font-light italic text-gray-700 leading-relaxed mb-6">
                        "Let your speech always be gracious, seasoned with salt, so that you may know how you ought to answer each person."
                    </blockquote>
                    <p class="text-xl font-bold text-emerald-600">— Colossians 4:6</p>
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
