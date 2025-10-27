@extends('admin.layout')

@section('page-title', 'Utility Folder - Resources')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="glass-card p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Utility Folder</h1>
                <p class="mt-1 text-sm text-slate-600">Manage choir resources, documents, and uniforms</p>
            </div>
            <a href="{{ route('admin.resources.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Upload Resource
            </a>
        </div>
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($categories as $key => $label)
            @php
                $count = \App\Models\Resource::where('category', $key)->count();
                $iconColors = [
                    'lyrics' => 'from-blue-500 to-blue-600',
                    'music_sheets' => 'from-purple-500 to-purple-600',
                    'code_of_conduct' => 'from-red-500 to-red-600',
                    'announcements' => 'from-amber-500 to-amber-600',
                    'uniforms' => 'from-pink-500 to-rose-600',
                    'other' => 'from-gray-500 to-gray-600',
                ];
            @endphp
            <div class="glass-card p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">{{ $label }}</p>
                        <p class="mt-2 text-3xl font-bold text-slate-900">{{ $count }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $iconColors[$key] ?? 'from-gray-500 to-gray-600' }} flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Filters -->
    <div class="glass-card p-5">
        <form method="GET" action="{{ route('admin.resources.index') }}" class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <label for="category" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Category</label>
                <select name="category" id="category" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400">
                    <option value="">All Categories</option>
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" {{ request('category') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="search" class="block mb-2 text-xs font-semibold text-slate-600 uppercase tracking-wide">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                       placeholder="Search title or description..."
                       class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:ring-1 focus:ring-emerald-400 focus:border-emerald-400">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filter
                </button>
                <a href="{{ route('admin.resources.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-600 transition hover:border-slate-300">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Resources List -->
    @if($resources->count() > 0)
        <div class="glass-card overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Resource</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Category</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">File Info</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Downloads</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @foreach($resources as $resource)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($resource->isImage())
                                            <img src="{{ $resource->file_url }}" alt="{{ $resource->title }}" class="w-12 h-12 rounded-lg object-cover shadow-sm">
                                        @else
                                            <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center shadow-sm">
                                                <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-semibold text-slate-900">{{ $resource->title }}</p>
                                            @if($resource->description)
                                                <p class="text-xs text-slate-500 line-clamp-1">{{ $resource->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                        {{ $resource->category_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-xs text-slate-600">{{ strtoupper($resource->file_type) }}</p>
                                    <p class="text-xs text-slate-500">{{ $resource->formatted_file_size }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm font-semibold text-slate-900">{{ $resource->downloads }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <button onclick="toggleStatus({{ $resource->id }})"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold transition-colors
                                            {{ $resource->is_active ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
                                        {{ $resource->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.resources.edit', $resource) }}"
                                           class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.resources.destroy', $resource) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this resource?')"
                                                    class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-200 transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $resources->links() }}
        </div>
    @else
        <div class="glass-card p-12 text-center">
            <div class="mx-auto w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-900 mb-2">No Resources Found</h3>
            <p class="text-sm text-slate-600 mb-6">Start by uploading your first resource document</p>
            <a href="{{ route('admin.resources.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-emerald-500 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Upload Resource
            </a>
        </div>
    @endif
</div>

<script>
function toggleStatus(resourceId) {
    if (confirm('Are you sure you want to toggle the status of this resource?')) {
        // Create form and submit
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/resources/${resourceId}/toggle-active`;

        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';

        form.appendChild(csrfToken);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection

