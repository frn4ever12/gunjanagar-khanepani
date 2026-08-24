@extends('layouts.frontend')

@section('title', 'File Complaint')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold">{{ __('messages.file_complaint') }}</h1>
                <p class="lead text-muted">{{ __('messages.complaint_subtitle') }}</p>
            </div>
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="{{ route('complaint.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('messages.full_name') }} *</label>
                                    <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" required>
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('messages.mobile') }} *</label>
                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" required>
                                    @error('mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('messages.email') }}</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('messages.ward') }}</label>
                                    <input type="text" name="ward" class="form-control" placeholder="{{ __('messages.ward_placeholder') }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.address') }} *</label>
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required></textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.category') }} *</label>
                            <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                <option value="">{{ __('messages.select_category') }}</option>
                                <option value="water_supply">{{ __('messages.water_supply') }}</option>
                                <option value="billing">{{ __('messages.billing') }}</option>
                                <option value="quality">{{ __('messages.quality') }}</option>
                                <option value="connection">{{ __('messages.connection') }}</option>
                                <option value="other">{{ __('messages.other') }}</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.subject') }} *</label>
                            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.description') }} *</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">{{ __('messages.attachment') }}</label>
                            <input type="file" name="attachment" class="form-control @error('attachment') is-invalid @enderror">
                            <small class="text-muted">{{ __('messages.attachment_note') }}</small>
                            @error('attachment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">{{ __('messages.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit_complaint') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
