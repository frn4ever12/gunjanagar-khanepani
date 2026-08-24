@extends('layouts.frontend')

@section('title', 'Services')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.our_services') }}</h1>
        <p class="lead text-muted">{{ __('messages.services_subtitle') }}</p>
    </div>
    
    <div class="row g-4">
        @foreach($services as $service)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="{{ $service->icon }} fs-1 text-primary"></i>
                    </div>
                    <h5 class="card-title text-center">{{ app()->getLocale() === 'ne' ? $service->title_ne : $service->title_en }}</h5>
                    <p class="card-text text-muted">{{ app()->getLocale() === 'ne' ? $service->description_ne : $service->description_en }}</p>
                    @if($service->fee)
                    <p class="card-text"><strong>{{ __('messages.fee') }}:</strong> Rs. {{ number_format($service->fee, 2) }}</p>
                    @endif
                    <p class="card-text"><small class="text-muted">{{ __('messages.processing_time') }}: {{ $service->processing_time }}</small></p>
                    <div class="text-center mt-3">
                        <a href="{{ route('services.detail', $service->id) }}" class="btn btn-primary">{{ __('messages.view_details') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
