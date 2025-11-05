@extends('admin.layout')

@section('page-title', 'Send Bulk Email')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Send Bulk Email</h1>
            <p class="text-gray-600 mt-1">Send emails to members or committee</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.bulk-email.send') }}" method="POST">
            @csrf

            <!-- Recipient Type -->
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Select Recipients
                </label>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="relative flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-emerald-500 transition-colors">
                        <input type="radio" name="recipient_type" value="all_members" class="sr-only" required>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">All Members</div>
                            <div class="text-sm text-gray-600 mt-1">{{ number_format($memberCount) }} recipients</div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </label>

                    <label class="relative flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-emerald-500 transition-colors">
                        <input type="radio" name="recipient_type" value="committee" class="sr-only" required>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">Committee</div>
                            <div class="text-sm text-gray-600 mt-1">{{ number_format($committeeCount) }} recipients</div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </label>

                    <label class="relative flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-emerald-500 transition-colors">
                        <input type="radio" name="recipient_type" value="custom" class="sr-only" required>
                        <div class="flex-1">
                            <div class="font-semibold text-gray-900">Custom Selection</div>
                            <div class="text-sm text-gray-600 mt-1">Select specific members</div>
                        </div>
                        <svg class="w-5 h-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </label>
                </div>
            </div>

            <!-- Custom Recipients (shown when custom is selected) -->
            <div id="custom-recipients" class="mb-6 hidden">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Select Members
                </label>
                <select name="custom_recipients[]" id="custom_recipients_select" multiple class="w-full border-gray-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring-emerald-500" style="min-height: 200px;">
                    @foreach(\App\Models\Member::whereNotNull('email')->where('email', '!=', '')->orderBy('first_name')->get() as $member)
                        <option value="{{ $member->id }}">
                            {{ $member->first_name }} {{ $member->last_name }} ({{ $member->email }})
                        </option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-2">Hold Ctrl (Cmd on Mac) to select multiple members</p>
            </div>

            <!-- Subject -->
            <div class="mb-6">
                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                    Email Subject <span class="text-red-500">*</span>
                </label>
                <input type="text" name="subject" id="subject" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                       placeholder="Enter email subject">
            </div>

            <!-- Message -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                    Message <span class="text-red-500">*</span>
                </label>
                <textarea name="message" id="message" rows="12" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                          placeholder="Enter your message here..."></textarea>
                <p class="text-xs text-gray-500 mt-2">The message will be personalized with the recipient's name</p>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.dashboard') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors font-semibold">
                    Send Email
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const recipientTypeInputs = document.querySelectorAll('input[name="recipient_type"]');
    const customRecipientsDiv = document.getElementById('custom-recipients');
    const customRecipientsSelect = document.getElementById('custom_recipients_select');

    recipientTypeInputs.forEach(input => {
        input.addEventListener('change', function() {
            if (this.value === 'custom') {
                customRecipientsDiv.classList.remove('hidden');
                customRecipientsSelect.setAttribute('required', 'required');
            } else {
                customRecipientsDiv.classList.add('hidden');
                customRecipientsSelect.removeAttribute('required');
            }
        });
    });
});
</script>
@endsection

