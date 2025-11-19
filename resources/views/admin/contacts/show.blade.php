@extends('admin.layout')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Messages
        </a>
        <h1 class="mt-2 text-3xl font-bold text-gray-900">Contact Message Details</h1>
    </div>

    <div class="grid grid-cols-1 gap-6">
        <!-- Message Header -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $contact->subject ?? 'No Subject' }}</h2>
                    @if($contact->is_read)
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">Read</span>
                    @else
                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 rounded-full">Unread</span>
                    @endif
                </div>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2">
                    <div>
                        <label class="text-sm font-medium text-gray-600">From</label>
                        <p class="mt-1 text-lg text-gray-900">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-600">Email</label>
                        <p class="mt-1">
                            <a href="mailto:{{ $contact->email }}" class="text-lg text-blue-600 hover:text-blue-800">{{ $contact->email }}</a>
                        </p>
                    </div>
                    @if($contact->phone)
                        <div>
                            <label class="text-sm font-medium text-gray-600">Phone</label>
                            <p class="mt-1">
                                <a href="tel:{{ $contact->phone }}" class="text-lg text-blue-600 hover:text-blue-800">{{ $contact->phone }}</a>
                            </p>
                        </div>
                    @endif
                    <div>
                        <label class="text-sm font-medium text-gray-600">Received</label>
                        <p class="mt-1 text-lg text-gray-900">{{ $contact->created_at->format('F d, Y') }}</p>
                        <p class="text-sm text-gray-500">{{ $contact->created_at->format('h:i A') }} ({{ $contact->created_at->diffForHumans() }})</p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200">
                    <label class="text-sm font-medium text-gray-600">Message</label>
                    <div class="p-4 mt-2 bg-gray-50 rounded-lg">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
                    </div>
                </div>

                @if($contact->attachment)
                    <div class="pt-6 border-t border-gray-200">
                        <label class="text-sm font-medium text-gray-600 mb-2 block">Attached Document</label>
                        <div class="flex items-center gap-3 p-4 bg-amber-50 border-2 border-amber-200 rounded-lg">
                            <div class="flex-shrink-0">
                                <i class="fas fa-file-alt text-2xl text-amber-600"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900">{{ basename($contact->attachment) }}</p>
                                <p class="text-xs text-gray-500 mt-1">Event invitation document</p>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('admin.contacts.attachment', $contact) }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-amber-600 rounded-lg hover:bg-amber-700 transition-colors">
                                    <i class="fas fa-download"></i>
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Actions -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Actions</h2>
            </div>
            <div class="p-6">
                <div class="flex flex-wrap gap-3">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Reply by Email
                    </a>

                    @if($contact->is_read)
                        <form action="{{ route('admin.contacts.unread', $contact) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                                </svg>
                                Mark as Unread
                            </button>
                        </form>
                    @else
                        <form action="{{ route('admin.contacts.read', $contact) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Mark as Read
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

