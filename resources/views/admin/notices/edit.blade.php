@extends('layouts.admin')

@section('title', 'Edit Notice')
@section('page-title', 'Edit Notice')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.notices.update', $notice) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title (English) *</label>
                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $notice->title_en) }}" required>
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title (Nepali) *</label>
                        <input type="text" name="title_ne" class="form-control @error('title_ne') is-invalid @enderror" value="{{ old('title_ne', $notice->title_ne) }}" required>
                        @error('title_ne')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Description (English)</label>
                        <textarea name="description_en" class="form-control" rows="4">{{ old('description_en', $notice->description_en) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Description (Nepali)</label>
                        <textarea name="description_ne" class="form-control" rows="4">{{ old('description_ne', $notice->description_ne) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Category *</label>
                        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $notice->category) }}" required>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Publish Date *</label>
                        <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" value="{{ old('publish_date', $notice->publish_date->format('Y-m-d')) }}" required>
                        @error('publish_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date', $notice->expiry_date ? $notice->expiry_date->format('Y-m-d') : '') }}">
                        @error('expiry_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Current Attachment</label>
                        @if($notice->attachment)
                            <a href="{{ asset('storage/' . $notice->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-download me-1"></i> Download
                            </a>
                        @else
                            <span class="text-muted">No attachment</span>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">New Attachment</label>
                        <input type="file" name="attachment" class="form-control @error('attachment') is-invalid @enderror" accept=".pdf,.doc,.docx">
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Leave empty to keep current attachment</small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Featured</label>
                        <div class="form-check mt-2">
                            <input type="checkbox" name="featured" class="form-check-input" {{ old('featured', $notice->featured) ? 'checked' : '' }}>
                            <label class="form-check-label">Mark as featured</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status', $notice->status) === 'active' ? 'selected' : '' }}>Active</option>
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
                            <input type="checkbox" name="show_in_ticker" class="form-check-input" {{ old('show_in_ticker', $notice->show_in_ticker) ? 'checked' : '' }}>
                            <label class="form-check-label">Display in news ticker</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="{{ old('display_order', $notice->display_order ?? 0) }}" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
