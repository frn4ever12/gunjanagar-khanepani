@extends('layouts.frontend')

@section('title', $service->title_en)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('services') }}">{{ __('messages.services') }}</a></li>
                    <li class="breadcrumb-item active">{{ app()->getLocale() === 'ne' ? $service->title_ne : $service->title_en }}</li>
                </ol>
            </nav>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="{{ $service->icon }} fs-1 text-primary"></i>
                    </div>
                    <h1 class="display-5 fw-bold text-center mb-4">{{ app()->getLocale() === 'ne' ? $service->title_ne : $service->title_en }}</h1>
                    
                    <p class="lead">{{ app()->getLocale() === 'ne' ? $service->description_ne : $service->description_en }}</p>
                    
                    @if($service->fee)
                    <div class="alert alert-info">
                        <strong>{{ __('messages.fee') }}:</strong> Rs. {{ number_format($service->fee, 2) }}
                    </div>
                    @endif
                    
                    <p><strong>{{ __('messages.processing_time') }}:</strong> {{ $service->processing_time }}</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="h4 mb-3">{{ __('messages.required_documents') }}</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <p class="mb-0" style="white-space: pre-line;">{{ app()->getLocale() === 'ne' ? $service->required_documents_ne : $service->required_documents_en }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="h4 mb-3">{{ __('messages.process') }}</h5>
                            <div class="card bg-light">
                                <div class="card-body">
                                    <p class="mb-0" style="white-space: pre-line;">{{ app()->getLocale() === 'ne' ? $service->process_ne : $service->process_en }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('complaint.form') }}" class="btn btn-primary">{{ __('messages.apply_now') }}</a>
                        <a href="{{ route('services') }}" class="btn btn-outline-secondary ms-2">{{ __('messages.back_to_services') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
