@extends('admin.layout')

@section('title', 'Create Devotion')

@section('content')
<form method="POST" action="{{ route('admin.devotions.store') }}" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    @csrf

    <div class="lg:col-span-2 space-y-6">
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Content</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                    @error('title')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Scripture Reference</label>
                    <input type="text" name="scripture_reference" value="{{ old('scripture_reference') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400" placeholder="John 3:16">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Excerpt</label>
                    <textarea name="excerpt" rows="3" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400" placeholder="Short summary...">{{ old('excerpt') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Content <span class="text-red-500">*</span></label>
                    <div id="editor-container" class="bg-white rounded-lg border border-slate-300"></div>
                    <textarea name="content" id="content" class="hidden">{{ old('content') }}</textarea>
                    <p id="content-error" class="mt-1 text-sm text-rose-600 hidden">Content is required.</p>
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
                    <input type="text" name="category" value="{{ old('category', 'general') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Publish Date</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_published" value="1" class="rounded border-slate-300 text-slate-900 focus:ring-slate-400" {{ old('is_published') ? 'checked' : '' }}>
                    <span class="text-sm text-slate-700">Publish now</span>
                </label>
            </div>

            <div class="mt-6 flex gap-2">
                <a href="{{ route('admin.devotions.index') }}" class="inline-flex items-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800">Create Devotion</button>
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
        },
        placeholder: 'Write the devotion...'
    });

    // Set initial content
    const oldContent = {!! json_encode(old('content', '')) !!};
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Update hidden textarea on form submit and validate
    const form = document.querySelector('form');
    const contentField = document.querySelector('#content');
    const contentError = document.querySelector('#content-error');

    form.addEventListener('submit', function(e) {
        // Get the text content (without HTML tags) to check if it's empty
        const textContent = quill.getText().trim();
        const htmlContent = quill.root.innerHTML;

        // Check if content is empty (only whitespace or just <p><br></p>)
        if (!textContent || htmlContent === '<p><br></p>' || htmlContent === '<p></p>') {
            e.preventDefault();
            contentError.classList.remove('hidden');
            // Scroll to error
            contentError.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            // Highlight the editor
            document.getElementById('editor-container').classList.add('border-red-500');
            return false;
        }

        // Hide error if content is valid
        contentError.classList.add('hidden');
        document.getElementById('editor-container').classList.remove('border-red-500');

        // Set the content value
        contentField.value = htmlContent;
    });

    // Remove error styling when user starts typing
    quill.on('text-change', function() {
        const textContent = quill.getText().trim();
        if (textContent) {
            contentError.classList.add('hidden');
            document.getElementById('editor-container').classList.remove('border-red-500');
        }
    });
</script>
@endpush

