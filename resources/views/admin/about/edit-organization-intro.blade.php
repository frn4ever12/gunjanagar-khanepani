@extends('layouts.admin')

@section('title', __('messages.organization_intro'))
@section('page-title', __('messages.organization_intro'))

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('messages.organization_intro') }}</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.about.update-organization-intro') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Organization Introduction (English)</label>
                    <textarea name="organization_intro_en" class="form-control summernote" rows="10">{{ old('organization_intro_en', $about ? $about->organization_intro_en : '') }}</textarea>
                    @error('organization_intro_en')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Organization Introduction (Nepali)</label>
                    <textarea name="organization_intro_ne" class="form-control summernote" rows="10">{{ old('organization_intro_ne', $about ? $about->organization_intro_ne : '') }}</textarea>
                    @error('organization_intro_ne')
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
