@extends('layouts.admin')

@section('title', 'Edit News')
@section('page-title', 'Edit News')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title (English) *</label>
                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $news->title_en) }}" required>
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title (Nepali) *</label>
                        <input type="text" name="title_ne" class="form-control @error('title_ne') is-invalid @enderror" value="{{ old('title_ne', $news->title_ne) }}" required>
                        @error('title_ne')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Content (English) *</label>
                        <textarea name="content_en" class="form-control @error('content_en') is-invalid @enderror" rows="8" required>{{ old('content_en', $news->content_en) }}</textarea>
                        @error('content_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Content (Nepali) *</label>
                        <textarea name="content_ne" class="form-control @error('content_ne') is-invalid @enderror" rows="8" required>{{ old('content_ne', $news->content_ne) }}</textarea>
                        @error('content_ne')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Category *</label>
                        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $news->category) }}" required>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Publish Date *</label>
                        <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" value="{{ old('publish_date', $news->publish_date->format('Y-m-d')) }}" required>
                        @error('publish_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="News" style="width: 150px; height: 100px; object-fit: cover;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">New Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Featured</label>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="featured" class="form-check-input" {{ old('featured', $news->featured) ? 'checked' : '' }}>
                            <label class="form-check-label">Mark as featured</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status', $news->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Show in Ticker</label>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="show_in_ticker" class="form-check-input" {{ old('show_in_ticker', $news->show_in_ticker) ? 'checked' : '' }}>
                            <label class="form-check-label">Display in news ticker</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="{{ old('display_order', $news->display_order ?? 0) }}" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
