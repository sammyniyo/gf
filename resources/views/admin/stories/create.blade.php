@extends('admin.layout')

@section('title', 'Create Story')
@section('page-title', 'Create New Story')

@section('content')
<form method="POST" action="{{ route('admin.stories.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    @csrf

    <!-- Main Content (2 columns) -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Story Content -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Story Content</h2>

            <div class="space-y-4">
                <!-- Title -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Title <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400 @error('title') border-rose-300 @enderror">
                    @error('title')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>

                        <!-- Slug -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Slug <span class="text-xs text-slate-500">(Leave empty for auto-generate)</span></label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                        </div>

                        <!-- Excerpt -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Excerpt <span class="text-xs text-slate-500">(Short summary)</span></label>
                    <textarea name="excerpt" rows="3" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">{{ old('excerpt') }}</textarea>
                        </div>

                <!-- Content (Quill Editor) -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Content <span class="text-rose-500">*</span></label>
                    <div id="editor-container" class="bg-white rounded-lg border border-slate-300"></div>
                    <textarea name="content" id="content" class="hidden" required>{{ old('content') }}</textarea>
                    @error('content')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">SEO Settings</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                    </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Meta Description</label>
                    <textarea name="meta_description" rows="2" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">{{ old('meta_description') }}</textarea>
                        </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Meta Keywords <span class="text-xs text-slate-500">(Comma separated)</span></label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                        </div>
                    </div>
                </div>
            </div>

    <!-- Sidebar (1 column) -->
    <div class="space-y-6">
        <!-- Publish Settings -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Publish</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Status <span class="text-rose-500">*</span></label>
                    <select name="status" required class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Publish Date</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                        </div>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="is_featured" value="1" class="rounded border-slate-300 text-slate-900 focus:ring-slate-400" {{ old('is_featured') ? 'checked' : '' }}>
                    <span class="text-sm text-slate-700">Featured Story</span>
                            </label>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="allow_comments" value="1" class="rounded border-slate-300 text-slate-900 focus:ring-slate-400" {{ old('allow_comments', true) ? 'checked' : '' }}>
                    <span class="text-sm text-slate-700">Allow Comments</span>
                            </label>
                        </div>

            <div class="mt-6 flex gap-2">
                <a href="{{ route('admin.stories.index') }}" class="inline-flex items-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">Cancel</a>
                <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800 flex-1">Create Story</button>
                    </div>
                </div>

                <!-- Featured Image -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Featured Image</h2>

            <div>
                <input type="file" name="featured_image" id="featured_image" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-slate-700 hover:file:bg-slate-100">
                <p class="mt-2 text-xs text-slate-500">Max 5MB. JPG, PNG, GIF, WebP</p>
                @error('featured_image')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

            <div id="image-preview" class="mt-4 hidden">
                <img id="preview-img" src="" class="w-full rounded-lg" alt="Preview">
                    </div>
                </div>

                <!-- Category & Tags -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-slate-900 mb-4">Category & Tags</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Category <span class="text-rose-500">*</span></label>
                    <select name="category" required class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                                @foreach($categories as $key => $label)
                                    <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Tags <span class="text-xs text-slate-500">(Comma separated)</span></label>
                    <input type="text" name="tags" value="{{ old('tags') }}" placeholder="faith, worship, testimony" class="w-full rounded-lg border-slate-300 focus:border-slate-400 focus:ring-slate-400">
                </div>
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
        height: 500px;
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
                [{ 'font': [] }],
                [{ 'size': ['small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });

    // Set initial content
    const oldContent = {!! json_encode(old('content', '')) !!};
    if (oldContent) {
        quill.root.innerHTML = oldContent;
    }

    // Update hidden textarea on form submit
    const form = document.querySelector('form');
    const contentField = document.querySelector('#content');

    form.addEventListener('submit', function(e) {
        contentField.value = quill.root.innerHTML;
    });

    // Auto-generate slug from title
    document.getElementById('title').addEventListener('blur', function() {
        const slugInput = document.getElementById('slug');
        if (!slugInput.value) {
            const title = this.value;
            const slug = title.toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/--+/g, '-')
                .trim();
            slugInput.value = slug;
        }
    });

    // Image preview
    document.getElementById('featured_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
