@extends('admin.layout')

@section('page-title', 'Edit Committee Member')

@section('content')
<div class="max-w-3xl space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.committees.index') }}" class="text-slate-400 hover:text-slate-600 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-semibold text-slate-900">Edit Committee Member</h1>
            <p class="mt-1 text-sm text-slate-500">Update member information</p>
        </div>
    </div>

    <!-- Form -->
    <div class="glass-card p-6">
        <form method="POST" action="{{ route('admin.committees.update', $committee) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            @if($committee->photo)
                <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-lg border border-slate-200">
                    <img src="{{ Storage::url($committee->photo) }}" alt="{{ $committee->name }}"
                         class="h-20 w-20 rounded-lg object-cover">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-900">Current Photo</p>
                        <p class="text-xs text-slate-500">Upload a new photo to replace</p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Full Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $committee->name) }}" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    @error('name')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="position" class="block text-sm font-medium text-slate-700 mb-2">Position *</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $committee->position) }}" required
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    @error('position')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="department" class="block text-sm font-medium text-slate-700 mb-2">Department *</label>
                    <select name="department" id="department" required
                            class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                        <option value="">Select Department</option>
                        @foreach($departments as $dept)
                            <option value="{{ $dept }}" {{ old('department', $committee->department) == $dept ? 'selected' : '' }}>{{ $dept }}</option>
                        @endforeach
                    </select>
                    @error('department')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Display Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $committee->order) }}" min="0"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    @error('order')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $committee->email) }}"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    @error('email')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $committee->phone) }}"
                           class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                    @error('phone')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="photo" class="block text-sm font-medium text-slate-700 mb-2">Photo (leave empty to keep current)</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                       class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">
                @error('photo')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="bio" class="block text-sm font-medium text-slate-700 mb-2">Biography</label>
                <textarea name="bio" id="bio" rows="4"
                          class="w-full px-3 py-2 text-sm border border-slate-300 rounded-md focus:ring-1 focus:ring-indigo-400 focus:border-indigo-400">{{ old('bio', $committee->bio) }}</textarea>
                @error('bio')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $committee->is_active) ? 'checked' : '' }}
                       class="h-4 w-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-400">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active (visible on website)</label>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                <a href="{{ route('admin.committees.index') }}"
                   class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-md hover:bg-slate-50">
                    Cancel
                </a>
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500">
                    Update Member
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

