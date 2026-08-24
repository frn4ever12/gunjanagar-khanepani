@extends('layouts.frontend')

@section('title', 'Downloads')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.downloads') }}</h1>
        <p class="lead text-muted">{{ __('messages.downloads_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @foreach($downloads as $download)
                    <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                        <div>
                            <h5 class="mb-1">{{ app()->getLocale() === 'ne' ? $download->title_ne : $download->title_en }}</h5>
                            <p class="text-muted small mb-0">{{ app()->getLocale() === 'ne' ? $download->description_ne : $download->description_en }}</p>
                            <small class="text-muted">
                                <span class="badge bg-secondary">{{ $download->category }}</span>
                                <span class="ms-2">{{ $download->file_type }}</span>
                                <span class="ms-2">{{ $download->file_size }}</span>
                            </small>
                        </div>
                        @if($download->file)
                        <a href="{{ asset('storage/' . $download->file) }}" class="btn btn-primary btn-sm" download>
                            <i class="bi bi-download me-1"></i>{{ __('messages.download') }}
                        </a>
                        @else
                        <button class="btn btn-secondary btn-sm" disabled>{{ __('messages.coming_soon') }}</button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
