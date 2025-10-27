@extends('layouts.app')

@section('title', 'Purchase ' . $album->title . ' | God\'s Family Choir')

@section('content')
<section class="py-12 bg-gradient-to-b from-blue-50 to-white min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('shop.show', $album->id) }}"
               class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Album
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
            <!-- Purchase Form -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">
                        Complete Your {{ $album->isFree() ? 'Download' : 'Purchase' }}
                    </h1>

                    @if(session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex">
                            <svg class="w-5 h-5 text-red-400 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('shop.process-purchase', $album->id) }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Customer Name -->
                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name *
                            </label>
                            <input type="text"
                                   id="customer_name"
                                   name="customer_name"
                                   value="{{ old('customer_name') }}"
                                   required
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="John Doe">
                            @error('customer_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Customer Email -->
                        <div>
                            <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address *
                            </label>
                            <input type="email"
                                   id="customer_email"
                                   name="customer_email"
                                   value="{{ old('customer_email') }}"
                                   required
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="john@example.com">
                            <p class="mt-1 text-sm text-gray-500">We'll send your download link to this email</p>
                            @error('customer_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Customer Phone (Optional) -->
                        <div>
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number (Optional)
                            </label>
                            <input type="tel"
                                   id="customer_phone"
                                   name="customer_phone"
                                   value="{{ old('customer_phone') }}"
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="+1234567890">
                            @error('customer_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Payment Method -->
                        @if(!$album->isFree())
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">
                                Payment Method *
                            </label>
                            <div class="space-y-3">
                                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition-colors has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                                    <input type="radio"
                                           name="payment_method"
                                           value="stripe"
                                           checked
                                           class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                    <div class="ml-3 flex-1">
                                        <div class="font-medium text-gray-900">Credit/Debit Card</div>
                                        <div class="text-sm text-gray-500">Pay securely with Stripe</div>
                                    </div>
                                    <svg class="w-8 h-8 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M13.976 9.15c-2.172-.806-3.356-1.426-3.356-2.409 0-.831.683-1.305 1.901-1.305 2.227 0 4.515.858 6.09 1.631l.89-5.494C18.252.975 15.697 0 12.165 0 9.667 0 7.589.654 6.104 1.872 4.56 3.147 3.757 4.992 3.757 7.218c0 4.039 2.467 5.76 6.476 7.219 2.585.92 3.445 1.574 3.445 2.583 0 .98-.84 1.545-2.354 1.545-1.875 0-4.965-.921-6.99-2.109l-.9 5.555C5.175 22.99 8.385 24 11.714 24c2.641 0 4.843-.624 6.328-1.813 1.664-1.305 2.525-3.236 2.525-5.732 0-4.128-2.524-5.851-6.591-7.305z"/>
                                    </svg>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition-colors has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                                    <input type="radio"
                                           name="payment_method"
                                           value="paypal"
                                           class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                    <div class="ml-3 flex-1">
                                        <div class="font-medium text-gray-900">PayPal</div>
                                        <div class="text-sm text-gray-500">Pay with your PayPal account</div>
                                    </div>
                                    <svg class="w-8 h-8 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a3.35 3.35 0 0 0-.607-.541c-.013.076-.026.175-.041.254-.93 4.778-4.005 7.201-9.138 7.201h-2.19a.563.563 0 0 0-.556.479l-1.187 7.527h-.506L9.6 10.479a.784.784 0 0 1 .774-.65h2.365c3.678 0 6.389-1.506 7.459-5.272a4.473 4.473 0 0 0 .024-1.64z"/>
                                    </svg>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition-colors has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                                    <input type="radio"
                                           name="payment_method"
                                           value="mobile_money"
                                           class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                    <div class="ml-3 flex-1">
                                        <div class="font-medium text-gray-900">Mobile Money</div>
                                        <div class="text-sm text-gray-500">MTN, Airtel, or other mobile payment</div>
                                    </div>
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition-colors has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                                    <input type="radio"
                                           name="payment_method"
                                           value="irembopay"
                                           class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                                    <div class="ml-3 flex-1">
                                        <div class="font-medium text-gray-900">IremboPay</div>
                                        <div class="text-sm text-gray-500">Secure payment gateway for Rwanda</div>
                                    </div>
                                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                                    </svg>
                                </label>
                            </div>
                            @error('payment_method')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        @else
                        <input type="hidden" name="payment_method" value="free">
                        @endif

                        <!-- Submit Button -->
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-6 rounded-lg transition-all duration-200 transform hover:scale-[1.02] shadow-xl hover:shadow-2xl">
                            {{ $album->isFree() ? 'Get Free Album' : 'Proceed to Payment' }}
                        </button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-8 border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h2>

                    <div class="flex gap-4 mb-6">
                        <img src="{{ $album->cover_image_url }}"
                             alt="{{ $album->title }}"
                             class="w-20 h-20 rounded-lg object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-800">{{ $album->title }}</h3>
                            @if($album->track_count > 0)
                            <p class="text-sm text-gray-500">{{ $album->track_count }} tracks</p>
                            @endif
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 space-y-3">
                        <div class="flex justify-between text-gray-700">
                            <span>Album Price</span>
                            <span class="font-semibold">${{ number_format($album->price, 2) }}</span>
                        </div>

                        <div class="border-t border-gray-200 pt-3 flex justify-between text-lg font-bold text-gray-800">
                            <span>Total</span>
                            <span>${{ number_format($album->price, 2) }}</span>
                        </div>
                    </div>

                    <div class="mt-6 space-y-2 text-sm text-gray-600">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Instant download access</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>High-quality MP3 files</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Up to 5 downloads</span>
                        </div>
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Support our ministry</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

