@extends('layouts.admin')

@section('title', 'Edit Water Quality Record')
@section('page-title', 'Edit Water Quality Record')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.water-quality.update', $waterQuality) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Parameter *</label>
                        <input type="text" name="parameter" class="form-control @error('parameter') is-invalid @enderror" value="{{ old('parameter', $waterQuality->parameter) }}" required>
                        @error('parameter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Standard *</label>
                        <input type="text" name="standard" class="form-control @error('standard') is-invalid @enderror" value="{{ old('standard', $waterQuality->standard) }}" required>
                        @error('standard')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Result *</label>
                        <input type="text" name="result" class="form-control @error('result') is-invalid @enderror" value="{{ old('result', $waterQuality->result) }}" required>
                        @error('result')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="compliant" {{ old('status', $waterQuality->status) === 'compliant' ? 'selected' : '' }}>Compliant</option>
                            <option value="non_compliant" {{ old('status') === 'non_compliant' ? 'selected' : '' }}>Non-Compliant</option>
                            <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Testing Date *</label>
                        <input type="date" name="testing_date" class="form-control @error('testing_date') is-invalid @enderror" value="{{ old('testing_date', $waterQuality->testing_date->format('Y-m-d')) }}" required>
                        @error('testing_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Remarks (English)</label>
                        <textarea name="remarks_en" class="form-control" rows="3">{{ old('remarks_en', $waterQuality->remarks_en) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Remarks (Nepali)</label>
                        <textarea name="remarks_ne" class="form-control" rows="3">{{ old('remarks_ne', $waterQuality->remarks_ne) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.water-quality.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
