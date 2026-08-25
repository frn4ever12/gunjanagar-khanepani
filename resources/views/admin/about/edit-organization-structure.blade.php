@extends('layouts.admin')

@section('title', __('messages.organization_structure'))
@section('page-title', __('messages.organization_structure'))

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('messages.organization_structure') }}</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.about.update-organization-structure') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Organization Structure (English)</label>
                    <textarea name="organization_structure_en" class="form-control summernote" rows="10">{{ old('organization_structure_en', $about ? $about->organization_structure_en : '') }}</textarea>
                    @error('organization_structure_en')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Organization Structure (Nepali)</label>
                    <textarea name="organization_structure_ne" class="form-control summernote" rows="10">{{ old('organization_structure_ne', $about ? $about->organization_structure_ne : '') }}</textarea>
                    @error('organization_structure_ne')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
