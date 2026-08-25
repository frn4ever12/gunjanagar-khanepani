@extends('layouts.admin')

@section('title', 'Edit About Us')
@section('page-title', 'Edit About Us')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit About Us</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title (English) <span class="text-danger">*</span></label>
                    <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $about ? $about->title_en : '') }}" required>
                    @error('title_en')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Title (Nepali) <span class="text-danger">*</span></label>
                    <input type="text" name="title_ne" class="form-control" value="{{ old('title_ne', $about ? $about->title_ne : '') }}" required>
                    @error('title_ne')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description (English) <span class="text-danger">*</span></label>
                    <textarea name="description_en" class="form-control summernote" rows="4" required>{{ old('description_en', $about ? $about->description_en : '') }}</textarea>
                    @error('description_en')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Description (Nepali) <span class="text-danger">*</span></label>
                    <textarea name="description_ne" class="form-control summernote" rows="4" required>{{ old('description_ne', $about ? $about->description_ne : '') }}</textarea>
                    @error('description_ne')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if($about && $about->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $about->image) }}" alt="About Image" class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    @endif
                </div>
                @error('image')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
