@extends('admin.layout')

@section('page-title', 'Profile Settings')

@section('content')
<div class="px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-900">Profile Settings</h1>
        <p class="mt-1 text-sm text-gray-500">Manage your account settings and preferences</p>
    </div>

    <div class="space-y-6">
        <!-- Profile Information Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-500">Update your account's profile information and email address.</p>
            </div>
            <div class="p-6">
                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">
                                        Your email address is unverified.
                                        <button form="send-verification" class="text-sm text-gray-600 underline hover:text-gray-900">
                                            Click here to re-send the verification email.
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm font-medium text-green-600">
                                            A new verification link has been sent to your email address.
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div>
                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-green-600">Profile updated successfully.</p>
                            @endif
                        </div>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-gray-900 border border-transparent rounded-md hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-gray-400">
                            Save Changes
                        </button>
                    </div>
                </form>

                <!-- Email Verification Form -->
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Password Update Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Update Password</h2>
                <p class="mt-1 text-sm text-gray-500">Ensure your account is using a long, random password to stay secure.</p>
            </div>
            <div class="p-6">
                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                            <input type="password" name="current_password" id="current_password" required
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                            @error('current_password', 'updatePassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                            <input type="password" name="password" id="password" required
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                            @error('password', 'updatePassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400">
                            @error('password_confirmation', 'updatePassword')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                        <div>
                            @if (session('status') === 'password-updated')
                                <p class="text-sm text-green-600">Password updated successfully.</p>
                            @endif
                        </div>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-gray-900 border border-transparent rounded-md hover:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-gray-400">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Account Information Card -->
        <div class="bg-white rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-medium text-gray-900">Account Information</h2>
                <p class="mt-1 text-sm text-gray-500">View your account details and status.</p>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Account Type</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Administrator
                            </span>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email Status</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            @if($user->hasVerifiedEmail())
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Verified
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Unverified
                                </span>
                            @endif
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Member Since</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Last Updated</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $user->updated_at->format('M d, Y \a\t g:i A') }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Danger Zone Card -->
        <div class="bg-white rounded-lg border border-red-200">
            <div class="px-6 py-4 border-b border-red-200 bg-red-50">
                <h2 class="text-lg font-medium text-red-900">Danger Zone</h2>
                <p class="mt-1 text-sm text-red-600">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
            <div class="p-6">
                <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
                    @csrf
                    @method('delete')

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:ring-1 focus:ring-gray-400 focus:border-gray-400"
                            placeholder="Enter your password to confirm">
                        @error('password', 'userDeletion')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-red-200">
                        <div class="text-sm text-gray-500">
                            This action cannot be undone. This will permanently delete your account and remove all associated data.
                        </div>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-1 focus:ring-red-400"
                            onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                            Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
