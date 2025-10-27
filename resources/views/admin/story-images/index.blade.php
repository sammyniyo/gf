@extends('layouts.admin')

@section('title', 'Story Images Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Story Images</li>
                    </ol>
                </div>
                <h4 class="page-title">Story Images Management</h4>
            </div>
        </div>
    </div>

    <!-- Upload Form -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upload New Story Image</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.story-images.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image File</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           id="image" name="image" accept="image/*" required>
                                    <div class="form-text">Max file size: 5MB. Supported formats: JPEG, PNG, JPG, GIF, WebP</div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="chapter" class="form-label">Chapter</label>
                                    <select class="form-select @error('chapter') is-invalid @enderror" id="chapter" name="chapter" required>
                                        <option value="">Select Chapter</option>
                                        <option value="humble-beginnings">Humble Beginnings (1998-2005)</option>
                                        <option value="growth-years">Years of Growth (2005-2015)</option>
                                        <option value="ministry-expansion">Ministry Expansion (2015-2020)</option>
                                        <option value="present-day">Present Day & Future Vision</option>
                                    </select>
                                    @error('chapter')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Image Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title" name="title" placeholder="e.g., Founding Members in 1998" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description (Optional)</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description" rows="3"
                                              placeholder="Brief description of the image..."></textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-upload me-2"></i>Upload Image
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Images Grid -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Story Images ({{ count($images) }} total)</h4>
                </div>
                <div class="card-body">
                    @if(count($images) > 0)
                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="card h-100">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $image['path']) }}"
                                                 class="card-img-top" alt="{{ $image['title'] }}"
                                                 style="height: 200px; object-fit: cover;">
                                            <div class="position-absolute top-0 end-0 m-2">
                                                <span class="badge bg-{{ $this->getChapterColor($image['chapter']) }}">
                                                    {{ ucfirst(str_replace('-', ' ', $image['chapter'])) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $image['title'] }}</h5>
                                            @if(!empty($image['description']))
                                                <p class="card-text text-muted small">{{ $image['description'] }}</p>
                                            @endif
                                            <div class="mt-auto">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar me-1"></i>
                                                    {{ \Carbon\Carbon::parse($image['uploaded_at'])->format('M d, Y') }}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <div class="d-flex gap-2">
                                                <a href="{{ asset('storage/' . $image['path']) }}"
                                                   target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                        onclick="copyImageUrl('{{ asset('storage/' . $image['path']) }}')">
                                                    <i class="fas fa-copy"></i> Copy URL
                                                </button>
                                                <form action="{{ route('admin.story-images.destroy', $image['filename']) }}"
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this image?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-images text-muted" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="text-muted">No story images uploaded yet</h5>
                            <p class="text-muted">Upload your first story image using the form above.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyImageUrl(url) {
    navigator.clipboard.writeText(url).then(() => {
        // Show success message
        const toast = document.createElement('div');
        toast.className = 'toast align-items-center text-white bg-success border-0 position-fixed';
        toast.style.top = '20px';
        toast.style.right = '20px';
        toast.style.zIndex = '9999';
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check me-2"></i>Image URL copied to clipboard!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        document.body.appendChild(toast);

        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();

        // Remove toast after it's hidden
        toast.addEventListener('hidden.bs.toast', () => {
            document.body.removeChild(toast);
        });
    });
}

// Image preview
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Remove existing preview
            const existingPreview = document.getElementById('image-preview');
            if (existingPreview) {
                existingPreview.remove();
            }

            // Create new preview
            const preview = document.createElement('div');
            preview.id = 'image-preview';
            preview.className = 'mt-3';
            preview.innerHTML = `
                <label class="form-label">Preview:</label>
                <div class="border rounded p-2">
                    <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">
                </div>
            `;

            e.target.parentNode.appendChild(preview);
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection

@php
function getChapterColor($chapter) {
    switch($chapter) {
        case 'humble-beginnings': return 'success';
        case 'growth-years': return 'warning';
        case 'ministry-expansion': return 'info';
        case 'present-day': return 'primary';
        default: return 'secondary';
    }
}
@endphp
