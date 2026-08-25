@extends('layouts.admin')

@section('title', __('messages.our_mission'))
@section('page-title', __('messages.our_mission'))

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('messages.our_mission') }}</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.about.update-our-mission') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Mission (English)</label>
                    <textarea name="mission_en" class="form-control summernote" rows="10">{{ old('mission_en', $about ? $about->mission_en : '') }}</textarea>
                    @error('mission_en')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Mission (Nepali)</label>
                    <textarea name="mission_ne" class="form-control summernote" rows="10">{{ old('mission_ne', $about ? $about->mission_ne : '') }}</textarea>
                    @error('mission_ne')
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
