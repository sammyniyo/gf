@extends('layouts.app')

@section('title', 'Payment - IremboPay | God\'s Family Choir')
@section('description', 'Complete your album purchase using IremboPay secure payment gateway.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-emerald-50 to-teal-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Complete Your Payment</h1>
            <p class="text-gray-600">Secure payment powered by IremboPay</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Payment Form -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Payment Details</h2>

                <!-- Album Info -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $purchase->album->cover_image_url }}"
                             alt="{{ $purchase->album->title }}"
                             class="w-16 h-16 rounded-lg object-cover">
                        <div>
                            <h3 class="font-semibold text-gray-900">{{ $purchase->album->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $purchase->album->description }}</p>
                            <p class="text-lg font-bold text-emerald-600">{{ number_format($purchase->amount) }} RWF</p>
                        </div>
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="space-y-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Customer Name</label>
                        <p class="text-gray-900">{{ $purchase->customer_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <p class="text-gray-900">{{ $purchase->customer_email }}</p>
                    </div>
                    @if($purchase->customer_phone)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <p class="text-gray-900">{{ $purchase->customer_phone }}</p>
                    </div>
                    @endif
                </div>

                <!-- Payment Status -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        <p class="text-blue-800 font-medium">Payment Status: <span class="capitalize">{{ $purchase->payment_status }}</span></p>
                    </div>
                </div>

                <!-- Payment Actions -->
                <div class="space-y-4">
                    @if($purchase->payment_status === 'pending')
                        <div id="payment-status" class="text-center">
                            <div class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg">
                                <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Processing Payment...
                            </div>
                        </div>

                        <div class="text-center">
                            <button onclick="checkPaymentStatus()"
                                    class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Check Payment Status
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('shop.purchase', $purchase->album) }}"
                               class="text-gray-600 hover:text-gray-800 underline">
                                ← Back to Purchase Options
                            </a>
                        </div>
                    @elseif($purchase->payment_status === 'completed')
                        <div class="text-center">
                            <div class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-lg mb-4">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Payment Successful!
                            </div>
                            <a href="{{ route('shop.download', $purchase->download_code) }}"
                               class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Download Album
                            </a>
                        </div>
                    @elseif($purchase->payment_status === 'failed')
                        <div class="text-center">
                            <div class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-lg mb-4">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                                Payment Failed
                            </div>
                            <a href="{{ route('shop.purchase', $purchase->album) }}"
                               class="inline-flex items-center px-6 py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors">
                                Try Again
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Payment Info -->
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Payment Information</h2>

                <div class="space-y-6">
                    <!-- IremboPay Info -->
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">IremboPay</h3>
                                <p class="text-sm text-gray-600">Secure Payment Gateway</p>
                            </div>
                        </div>
                        <p class="text-gray-700 text-sm">
                            IremboPay provides secure payment processing with support for mobile money,
                            bank transfers, and other local payment methods in Rwanda.
                        </p>
                    </div>

                    <!-- Security Features -->
                    <div class="space-y-4">
                        <h3 class="font-semibold text-gray-900">Security Features</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">SSL Encrypted Connection</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">PCI DSS Compliant</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Real-time Fraud Detection</span>
                            </div>
                        </div>
                    </div>

                    <!-- Support -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Need Help?</h4>
                        <p class="text-sm text-gray-600 mb-3">
                            If you're experiencing issues with your payment, please contact our support team.
                        </p>
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center text-emerald-600 hover:text-emerald-700 text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function checkPaymentStatus() {
    const statusElement = document.getElementById('payment-status');
    const button = event.target;

    // Show loading state
    button.disabled = true;
    button.innerHTML = '<svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>Checking...';

    fetch(`{{ route('payments.irembopay.status', $purchase->id) }}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'completed') {
                // Reload page to show success state
                window.location.reload();
            } else if (data.status === 'failed') {
                // Reload page to show failed state
                window.location.reload();
            } else {
                // Still pending
                statusElement.innerHTML = `
                    <div class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg">
                        <svg class="w-5 h-5 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Payment Still Processing...
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error checking payment status:', error);
            statusElement.innerHTML = `
                <div class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-lg">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    Error checking status. Please try again.
                </div>
            `;
        })
        .finally(() => {
            // Reset button
            button.disabled = false;
            button.innerHTML = '<svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>Check Payment Status';
        });
}

// Auto-refresh every 30 seconds if payment is pending
@if($purchase->payment_status === 'pending')
setInterval(() => {
    checkPaymentStatus();
}, 30000);
@endif
</script>
@endsection
