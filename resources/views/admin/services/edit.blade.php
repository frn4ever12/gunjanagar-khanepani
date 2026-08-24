@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title (English) *</label>
                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $service->title_en) }}" required>
                        @error('title_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Title (Nepali) *</label>
                        <input type="text" name="title_ne" class="form-control @error('title_ne') is-invalid @enderror" value="{{ old('title_ne', $service->title_ne) }}" required>
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
                        <textarea name="description_en" class="form-control" rows="3">{{ old('description_en', $service->description_en) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Description (Nepali)</label>
                        <textarea name="description_ne" class="form-control" rows="3">{{ old('description_ne', $service->description_ne) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Icon (Bootstrap)</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}" placeholder="bi-grid">
                        <small class="text-muted">e.g., bi-grid, bi-droplet, bi-house</small>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Fee</label>
                        <input type="number" step="0.01" name="fee" class="form-control" value="{{ old('fee', $service->fee) }}" placeholder="0.00">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Processing Time</label>
                        <input type="text" name="processing_time" class="form-control" value="{{ old('processing_time', $service->processing_time) }}" placeholder="e.g., 3 days">
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Required Documents (English)</label>
                        <textarea name="required_documents_en" class="form-control" rows="3">{{ old('required_documents_en', $service->required_documents_en) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Required Documents (Nepali)</label>
                        <textarea name="required_documents_ne" class="form-control" rows="3">{{ old('required_documents_ne', $service->required_documents_ne) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Process (English)</label>
                        <textarea name="process_en" class="form-control" rows="4">{{ old('process_en', $service->process_en) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Process (Nepali)</label>
                        <textarea name="process_ne" class="form-control" rows="4">{{ old('process_ne', $service->process_ne) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Current Image</label>
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="Service" style="width: 150px; height: 100px; object-fit: cover;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">New Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Current Attachment</label>
                        @if($service->attachment)
                            <a href="{{ asset('storage/' . $service->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
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
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status', $service->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
