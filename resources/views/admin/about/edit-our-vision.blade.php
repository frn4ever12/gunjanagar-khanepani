@extends('layouts.admin')

@section('title', __('messages.our_vision'))
@section('page-title', __('messages.our_vision'))

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('messages.our_vision') }}</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.about.update-our-vision') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Vision (English)</label>
                    <textarea name="vision_en" class="form-control summernote" rows="10">{{ old('vision_en', $about ? $about->vision_en : '') }}</textarea>
                    @error('vision_en')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Vision (Nepali)</label>
                    <textarea name="vision_ne" class="form-control summernote" rows="10">{{ old('vision_ne', $about ? $about->vision_ne : '') }}</textarea>
                    @error('vision_ne')
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
