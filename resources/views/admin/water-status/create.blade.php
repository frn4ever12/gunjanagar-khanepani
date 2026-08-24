@extends('layouts.admin')

@section('title', 'Create Water Supply Status')
@section('page-title', 'Create Water Supply Status')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.water-status.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="normal" {{ old('status', 'normal') === 'normal' ? 'selected' : '' }}>Normal</option>
                            <option value="interrupted" {{ old('status') === 'interrupted' ? 'selected' : '' }}>Interrupted</option>
                            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Affected Area</label>
                        <input type="text" name="affected_area" class="form-control" value="{{ old('affected_area') }}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Expected Restoration</label>
                        <input type="datetime-local" name="expected_restoration" class="form-control" value="{{ old('expected_restoration') }}">
                        <small class="text-muted">Leave empty if not applicable</small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Remarks (English)</label>
                        <textarea name="remarks_en" class="form-control" rows="4">{{ old('remarks_en') }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Remarks (Nepali)</label>
                        <textarea name="remarks_ne" class="form-control" rows="4">{{ old('remarks_ne') }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.water-status.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
