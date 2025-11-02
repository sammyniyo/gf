@extends('admin.layout')

@section('title', 'Gallery Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="glass-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Gallery Management</h1>
                <p class="mt-1 text-sm text-slate-600">Manage your photo gallery</p>
            </div>
            <a href="{{ route('admin.galleries.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Upload Image
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 rounded-xl p-4 flex items-center gap-3">
        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <span class="text-green-800 font-medium">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Filters -->
    <div class="glass-card p-6">
        <form method="GET" class="flex flex-wrap gap-4 items-end">
            <!-- Search -->
            <div class="flex-1 min-w-[200px]">
                <label class="block text-sm font-medium text-slate-700 mb-2">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search images..."
                       class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
            </div>

            <!-- Category Filter -->
            <div class="min-w-[150px]">
                <label class="block text-sm font-medium text-slate-700 mb-2">Category</label>
                <select name="category" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <option value="">All Categories</option>
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div class="min-w-[150px]">
                <label class="block text-sm font-medium text-slate-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                    <option value="">All</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="featured" {{ request('status') == 'featured' ? 'selected' : '' }}>Featured</option>
                </select>
            </div>

            <!-- Submit -->
            <button type="submit" class="px-6 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">
                Filter
            </button>
            @if(request()->hasAny(['search', 'category', 'status']))
                <a href="{{ route('admin.galleries.index') }}" class="px-6 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($galleries as $gallery)
            <div class="glass-card p-0 overflow-hidden group hover:shadow-2xl transition-all duration-300">
                <!-- Image -->
                <div class="relative aspect-square overflow-hidden bg-slate-100">
                    <img src="{{ Storage::disk('public')->url($gallery->image_path) }}"
                         alt="{{ $gallery->title ?? 'Gallery Image' }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                    <!-- Badges -->
                    <div class="absolute top-3 left-3 flex flex-col gap-2">
                        @if($gallery->is_featured)
                            <span class="px-2 py-1 bg-amber-500 text-white text-xs font-bold rounded-full">⭐ Featured</span>
                        @endif
                        @if(!$gallery->is_active)
                            <span class="px-2 py-1 bg-red-500 text-white text-xs font-bold rounded-full">Inactive</span>
                        @endif
                    </div>

                    <!-- Quick Actions -->
                    <div class="absolute top-3 right-3 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}"
                           class="p-2 bg-white/90 backdrop-blur-sm rounded-lg hover:bg-white transition">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Info -->
                <div class="p-4">
                    <h3 class="font-bold text-slate-900 mb-1 truncate">{{ $gallery->title ?? 'Untitled' }}</h3>
                    @if($gallery->category)
                        <span class="inline-block px-2 py-1 bg-emerald-100 text-emerald-700 text-xs font-medium rounded mb-2">
                            {{ $categories[$gallery->category] ?? $gallery->category }}
                        </span>
                    @endif
                    @if($gallery->description)
                        <p class="text-sm text-slate-600 line-clamp-2 mt-2">{{ $gallery->description }}</p>
                    @endif

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-200">
                        <div class="flex gap-2">
                            <form action="{{ route('admin.galleries.toggle-featured', $gallery) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="p-1.5 rounded-lg {{ $gallery->is_featured ? 'bg-amber-100 text-amber-600' : 'bg-slate-100 text-slate-400' }} hover:bg-amber-200 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{ route('admin.galleries.toggle-active', $gallery) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit"
                                        class="p-1.5 rounded-lg {{ $gallery->is_active ? 'bg-emerald-100 text-emerald-600' : 'bg-red-100 text-red-600' }} hover:bg-emerald-200 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full glass-card p-12 text-center">
                <svg class="w-16 h-16 text-slate-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="text-slate-600 text-lg">No gallery images found</p>
                <a href="{{ route('admin.galleries.create') }}" class="inline-block mt-4 text-emerald-600 hover:text-emerald-700 font-medium">
                    Upload your first image →
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($galleries->hasPages())
        <div class="glass-card p-4">
            {{ $galleries->links() }}
        </div>
    @endif
</div>
@endsection

