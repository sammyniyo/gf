@extends('admin.layout')

@section('page-title', 'Edit Resource')

@section('content')
<div class="max-w-3xl space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.resources.index') }}" class="inline-flex items-center justify-center w-10 h-10 rounded-lg border border-slate-200 bg-white hover:bg-slate-50 transition">
            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Resource</h1>
            <p class="mt-1 text-sm text-slate-600">Update resource information</p>
        </div>
    </div>

    <!-- Current File Preview -->
    <div class="glass-card p-6">
        <h3 class="text-sm font-semibold text-slate-700 mb-4">Current File</h3>
        <div class="flex items-center gap-4">
            @if($resource->isImage())
                <img src="{{ $resource->file_url }}" alt="{{ $resource->title }}" class="w-20 h-20 rounded-lg object-cover shadow-md">
            @else
                <div class="w-20 h-20 rounded-lg bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center shadow-md">
                    <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
            @endif
            <div>
                <p class="text-sm font-semibold text-slate-900">{{ $resource->title }}</p>
                <p class="text-xs text-slate-500 mt-1">{{ strtoupper($resource->file_type) }} • {{ $resource->formatted_file_size }}</p>
                <p class="text-xs text-slate-500">{{ $resource->downloads }} downloads</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.resources.update', $resource) }}" method="POST" enctype="multipart/form-data" class="glass-card p-8 space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Title <span class="text-rose-500">*</span>
            </label>
            <input type="text" name="title" id="title" required
                   value="{{ old('title', $resource->title) }}"
                   class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400"
                   placeholder="Enter resource title">
            @error('title')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Description
            </label>
            <textarea name="description" id="description" rows="3"
                      class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400"
                      placeholder="Enter resource description (optional)">{{ old('description', $resource->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Category <span class="text-rose-500">*</span>
            </label>
            <select name="category" id="category" required
                    class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400">
                @foreach($categories as $key => $label)
                    <option value="{{ $key }}" {{ old('category', $resource->category) === $key ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Replace File (Optional) -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">
                Replace File (Optional)
            </label>
            <div class="relative">
                <input type="file" name="file" id="file"
                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.webp"
                       class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition">
            </div>
            @error('file')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-xs text-slate-500">
                Leave empty to keep the current file. Accepted formats: PDF, DOC, DOCX, JPG, PNG, GIF, WEBP (Max: 20MB)
            </p>

            <!-- New File Preview -->
            <div id="filePreview" class="mt-4 hidden">
                <div class="flex items-center gap-3 p-4 bg-emerald-50 rounded-lg border border-emerald-200">
                    <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-semibold text-emerald-700 mb-1">New file selected</p>
                        <p id="fileName" class="text-sm font-semibold text-slate-900"></p>
                        <p id="fileSize" class="text-xs text-slate-500"></p>
                    </div>
                    <button type="button" onclick="clearFile()" class="text-slate-400 hover:text-rose-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Status Toggle -->
        <div class="flex items-center gap-3 p-4 bg-slate-50 rounded-lg">
            <input type="checkbox" name="is_active" id="is_active" {{ old('is_active', $resource->is_active) ? 'checked' : '' }}
                   class="w-5 h-5 text-emerald-600 border-slate-300 rounded focus:ring-emerald-500 focus:ring-offset-0">
            <label for="is_active" class="text-sm font-medium text-slate-700">
                Resource is active
            </label>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center gap-3 pt-4">
            <button type="submit"
                    class="flex-1 inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-600/20 transition hover:bg-emerald-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Update Resource
            </button>
            <a href="{{ route('admin.resources.index') }}"
               class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:text-slate-700">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
document.getElementById('file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById('filePreview').classList.remove('hidden');
        document.getElementById('fileName').textContent = file.name;

        const fileSize = (file.size / 1024).toFixed(2);
        document.getElementById('fileSize').textContent = fileSize < 1024
            ? fileSize + ' KB'
            : (fileSize / 1024).toFixed(2) + ' MB';
    }
});

function clearFile() {
    document.getElementById('file').value = '';
    document.getElementById('filePreview').classList.add('hidden');
}
</script>
@endsection

