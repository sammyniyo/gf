@extends('admin.layout')

@section('title', 'Edit Devotion')

@section('content')
<form method="POST" action="{{ route('admin.devotions.update', $devotion) }}" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    @csrf
    @method('PUT')

    <div class="lg:col-span-2 space-y-6">
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Content</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $devotion->title) }}" required class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                    @error('title')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Scripture Reference</label>
                    <input type="text" name="scripture_reference" value="{{ old('scripture_reference', $devotion->scripture_reference) }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Excerpt</label>
                    <textarea name="excerpt" rows="3" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">{{ old('excerpt', $devotion->excerpt) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Content</label>
                    <div id="editor-container" class="bg-white rounded-lg border border-slate-300"></div>
                    <textarea name="content" id="content" class="hidden" required>{{ old('content', $devotion->content) }}</textarea>
                    @error('content')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Publish</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                    <input type="text" name="category" value="{{ old('category', $devotion->category) }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Publish Date</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($devotion->published_at)->format('Y-m-d\TH:i')) }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_published" value="1" class="rounded border-slate-300 text-slate-900 focus:ring-slate-400" {{ old('is_published', $devotion->is_published) ? 'checked' : '' }}>
                    <span class="text-sm text-slate-700">Published</span>
                </label>
            </div>

            <div class="mt-6 flex gap-2">
                <a href="{{ route('admin.devotions.index') }}" class="inline-flex items-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">Update Devotion</button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('styles')
<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    #editor-container {
        height: 400px;
    }
    .ql-editor {
        font-size: 16px;
        line-height: 1.6;
    }
</style>
@endpush

@push('scripts')
<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill editor
    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link'],
                ['clean']
            ]
        }
    });

    // Set initial content
    const oldContent = {!! json_encode(old('content', $devotion->content)) !!};
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Update hidden textarea on form submit
    const form = document.querySelector('form');
    const contentField = document.querySelector('#content');

    form.addEventListener('submit', function(e) {
        contentField.value = quill.root.innerHTML;
    });
</script>
@endpush

