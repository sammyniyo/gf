@extends('admin.layout')

@section('page-title', 'Edit Page Settings')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div>
        <a href="{{ route('admin.page-settings.index') }}" class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900 mb-4">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Page Management
        </a>
        <h2 class="text-2xl font-bold text-slate-900">Edit Page Settings</h2>
        <p class="text-slate-600 mt-1">{{ $pageSetting->page_name }}</p>
    </div>

    <form action="{{ route('admin.page-settings.update', $pageSetting) }}" method="POST" class="glass-card p-8 space-y-6">
        @csrf
        @method('PATCH')

        <!-- Status Selection -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-3">Page Status</label>
            <div class="grid grid-cols-2 gap-3">
                <label class="relative">
                    <input type="radio" name="status" value="active" {{ $pageSetting->status === 'active' ? 'checked' : '' }} class="peer hidden">
                    <div class="p-4 border-2 border-slate-200 rounded-xl cursor-pointer transition hover:border-indigo-300 peer-checked:border-emerald-500 peer-checked:bg-emerald-50">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-emerald-500 peer-checked:bg-emerald-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Active</div>
                                <div class="text-xs text-slate-500">Page is live and accessible</div>
                            </div>
                        </div>
                    </div>
                </label>

                <label class="relative">
                    <input type="radio" name="status" value="coming_soon" {{ $pageSetting->status === 'coming_soon' ? 'checked' : '' }} class="peer hidden">
                    <div class="p-4 border-2 border-slate-200 rounded-xl cursor-pointer transition hover:border-indigo-300 peer-checked:border-blue-500 peer-checked:bg-blue-50">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-blue-500 peer-checked:bg-blue-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Coming Soon</div>
                                <div class="text-xs text-slate-500">Announce upcoming launch</div>
                            </div>
                        </div>
                    </div>
                </label>

                <label class="relative">
                    <input type="radio" name="status" value="maintenance" {{ $pageSetting->status === 'maintenance' ? 'checked' : '' }} class="peer hidden">
                    <div class="p-4 border-2 border-slate-200 rounded-xl cursor-pointer transition hover:border-indigo-300 peer-checked:border-amber-500 peer-checked:bg-amber-50">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-amber-500 peer-checked:bg-amber-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Under Maintenance</div>
                                <div class="text-xs text-slate-500">Temporarily unavailable</div>
                            </div>
                        </div>
                    </div>
                </label>

                <label class="relative">
                    <input type="radio" name="status" value="locked" {{ $pageSetting->status === 'locked' ? 'checked' : '' }} class="peer hidden">
                    <div class="p-4 border-2 border-slate-200 rounded-xl cursor-pointer transition hover:border-indigo-300 peer-checked:border-red-500 peer-checked:bg-red-50">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 rounded-full border-2 border-slate-300 peer-checked:border-red-500 peer-checked:bg-red-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </div>
                            <div>
                                <div class="font-semibold text-slate-900">Locked</div>
                                <div class="text-xs text-slate-500">Page is hidden</div>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Custom Message -->
        <div>
            <label for="custom_message" class="block text-sm font-semibold text-slate-900 mb-2">
                Custom Message (Optional)
            </label>
            <textarea
                name="custom_message"
                id="custom_message"
                rows="3"
                class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Enter a custom message to display on the status page..."
            >{{ old('custom_message', $pageSetting->custom_message) }}</textarea>
            <p class="text-xs text-slate-500 mt-1">Leave empty to use default message for this status</p>
        </div>

        <!-- Enabled Toggle -->
        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
            <div>
                <label for="is_enabled" class="text-sm font-semibold text-slate-900">Enable Page</label>
                <p class="text-xs text-slate-600 mt-1">Turn off to completely disable page access</p>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" name="is_enabled" id="is_enabled" class="sr-only peer" {{ $pageSetting->is_enabled ? 'checked' : '' }}>
                <div class="w-11 h-6 bg-slate-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-4 border-t border-slate-200">
            <a href="{{ route('admin.page-settings.index') }}" class="px-4 py-2 text-sm font-semibold text-slate-700 hover:text-slate-900">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

