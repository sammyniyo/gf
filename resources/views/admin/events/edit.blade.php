@extends('admin.layout')

@section('content')
<div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Edit Event</h1>
        <p class="mt-2 text-gray-600">Update event details</p>
    </div>

    <div class="overflow-hidden bg-white rounded-lg shadow">
        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- Event Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Event Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Event Type -->
                <div class="md:col-span-2">
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Event Type *</label>
                    <select name="type" id="type" required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Type</option>
                        <option value="Concert" {{ old('type', $event->type) == 'Concert' ? 'selected' : '' }}>Concert</option>
                        <option value="Service" {{ old('type', $event->type) == 'Service' ? 'selected' : '' }}>Service</option>
                        <option value="Workshop" {{ old('type', $event->type) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="Outreach" {{ old('type', $event->type) == 'Outreach' ? 'selected' : '' }}>Outreach</option>
                        <option value="Other" {{ old('type', $event->type) == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $event->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date & Time -->
                <div>
                    <label for="start_at" class="block text-sm font-medium text-gray-700">Start Date & Time *</label>
                    <input type="datetime-local" name="start_at" id="start_at" value="{{ old('start_at', optional($event->start_at)->format('Y-m-d\TH:i')) }}" required
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('start_at')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date & Time -->
                <div>
                    <label for="end_at" class="block text-sm font-medium text-gray-700">End Date & Time</label>
                    <input type="datetime-local" name="end_at" id="end_at" value="{{ old('end_at', optional($event->end_at)->format('Y-m-d\TH:i')) }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('end_at')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div class="md:col-span-2">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Capacity -->
                <div>
                    <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity (Optional)</label>
                    <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $event->capacity) }}" min="1"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('capacity')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Cover Image -->
                @if($event->cover_image)
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Current Cover Image</label>
                        <img src="{{ Storage::url($event->cover_image) }}" alt="{{ $event->title }}" class="object-cover w-32 h-32 mt-2 rounded-lg">
                    </div>
                @endif

                <!-- Cover Image Upload -->
                <div class="md:col-span-2">
                    <label for="cover_image" class="block text-sm font-medium text-gray-700">
                        {{ $event->cover_image ? 'Replace Image (Optional)' : 'Event Image (Optional)' }}
                    </label>
                    <input type="file" name="cover_image" id="cover_image" accept="image/*"
                        class="block w-full mt-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('cover_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Accept Support -->
                <div class="md:col-span-2">
                    <div class="flex items-center">
                        <input type="checkbox" name="accept_support" id="accept_support" value="1" {{ old('accept_support', $event->accept_support) ? 'checked' : '' }}
                            class="w-4 h-4 text-emerald-600 border-gray-300 rounded focus:ring-emerald-400">
                        <label for="accept_support" class="ml-2 text-sm text-gray-700">Allow "Support Us" for this event</label>
                    </div>
                </div>

                <!-- Is Public -->
                <div class="md:col-span-2">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_public" id="is_public" value="1" {{ old('is_public', $event->is_public) ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_public" class="ml-2 text-sm text-gray-700">Make this event public (visible on the website)</label>
                    </div>
                    @error('is_public')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6 space-x-3">
                <a href="{{ route('admin.events.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Event
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

