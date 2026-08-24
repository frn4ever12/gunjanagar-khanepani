@extends('layouts.admin')

@section('title', 'Create Statistic')
@section('page-title', 'Create Statistic')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.statistics.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Key *</label>
                        <input type="text" name="key" class="form-control @error('key') is-invalid @enderror" value="{{ old('key') }}" required>
                        <small class="text-muted">Unique identifier (e.g., total_consumers)</small>
                        @error('key')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Label (English) *</label>
                        <input type="text" name="label_en" class="form-control @error('label_en') is-invalid @enderror" value="{{ old('label_en') }}" required>
                        @error('label_en')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Label (Nepali) *</label>
                        <input type="text" name="label_ne" class="form-control @error('label_ne') is-invalid @enderror" value="{{ old('label_ne') }}" required>
                        @error('label_ne')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Value *</label>
                        <input type="text" name="value" class="form-control @error('value') is-invalid @enderror" value="{{ old('value') }}" required>
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" name="unit" class="form-control" value="{{ old('unit') }}" placeholder="e.g., households, liters">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Icon (Bootstrap)</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', 'bi-bar-chart') }}" placeholder="bi-bar-chart">
                        <small class="text-muted">e.g., bi-bar-chart, bi-people, bi-droplet</small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
