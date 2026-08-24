@extends('layouts.frontend')

@section('title', $notice->title_en)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('notices') }}">{{ __('messages.notices') }}</a></li>
                    <li class="breadcrumb-item active">{{ app()->getLocale() === 'ne' ? $notice->title_ne : $notice->title_en }}</li>
                </ol>
            </nav>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @if($notice->featured)
                    <span class="badge bg-warning text-dark mb-3">{{ __('messages.important') }}</span>
                    @endif
                    
                    <h1 class="display-5 fw-bold mb-4">{{ app()->getLocale() === 'ne' ? $notice->title_ne : $notice->title_en }}</h1>
                    
                    <div class="mb-4">
                        <span class="badge bg-primary">{{ $notice->category }}</span>
                        <small class="text-muted ms-3">
                            <i class="bi bi-calendar me-1"></i>{{ $notice->publish_date->format('Y-m-d') }}
                            @if($notice->expiry_date)
                            | <i class="bi bi-clock me-1"></i>{{ __('messages.expires') }}: {{ $notice->expiry_date->format('Y-m-d') }}
                            @endif
                        </small>
                    </div>
                    
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <p class="mb-0" style="white-space: pre-line;">{{ app()->getLocale() === 'ne' ? $notice->description_ne : $notice->description_en }}</p>
                        </div>
                    </div>
                    
                    @if($notice->attachment)
                    <div class="alert alert-info">
                        <i class="bi bi-paperclip me-2"></i>
                        <a href="{{ asset('storage/' . $notice->attachment) }}" target="_blank" class="alert-link">{{ __('messages.download_attachment') }}</a>
                    </div>
                    @endif
                    
                    <div class="mt-4">
                        <a href="{{ route('notices') }}" class="btn btn-outline-secondary">{{ __('messages.back_to_notices') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
