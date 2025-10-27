@extends('admin.layout')

@section('page-title', 'Edit Admin User')

@section('content')
<div class="px-4 mx-auto max-w-3xl sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center mb-4">
            <a href="{{ route('admin.users.index') }}" class="mr-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Edit Admin User</h1>
                <p class="mt-1 text-sm text-gray-500">Update admin user information</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
        <div class="px-6 py-8">
            <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400 @error('name') border-red-300 @enderror"
                           placeholder="Enter full name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email', $user->email) }}"
                           required
                           class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400 @error('email') border-red-300 @enderror"
                           placeholder="user@example.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Department -->
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700 mb-2">Department (Optional)</label>
                    <select name="department"
                            id="department"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                        <option value="">Select a department</option>
                        <option value="Spiritual Department" {{ old('department', $user->department ?? '') == 'Spiritual Department' ? 'selected' : '' }}>Spiritual Department</option>
                        <option value="Fashion Department" {{ old('department', $user->department ?? '') == 'Fashion Department' ? 'selected' : '' }}>Fashion Department</option>
                        <option value="Music Department" {{ old('department', $user->department ?? '') == 'Music Department' ? 'selected' : '' }}>Music Department</option>
                        <option value="Media Department" {{ old('department', $user->department ?? '') == 'Media Department' ? 'selected' : '' }}>Media Department</option>
                        <option value="Finance Department" {{ old('department', $user->department ?? '') == 'Finance Department' ? 'selected' : '' }}>Finance Department</option>
                        <option value="Events Department" {{ old('department', $user->department ?? '') == 'Events Department' ? 'selected' : '' }}>Events Department</option>
                    </select>
                    @error('department')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4 border-t border-gray-200">
                    <h3 class="text-sm font-medium text-gray-900 mb-4">Change Password (Optional)</h3>
                    <p class="text-xs text-gray-500 mb-4">Leave blank to keep current password</p>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400 @error('password') border-red-300 @enderror"
                               placeholder="Enter new password (optional)">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters</p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400"
                               placeholder="Confirm new password">
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.users.index') }}"
                       class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-gray-900 border border-transparent rounded-md hover:bg-gray-800">
                        Update Admin User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
