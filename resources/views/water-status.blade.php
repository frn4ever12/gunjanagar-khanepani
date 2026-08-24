@extends('layouts.frontend')

@section('title', 'Water Status')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.water_status') }}</h1>
        <p class="lead text-muted">{{ __('messages.water_status_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @if($waterStatus)
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        @if($waterStatus->status === 'normal')
                        <i class="bi bi-check-circle text-success" style="font-size: 5rem;"></i>
                        @elseif($waterStatus->status === 'interrupted')
                        <i class="bi bi-x-circle text-danger" style="font-size: 5rem;"></i>
                        @else
                        <i class="bi bi-exclamation-triangle text-warning" style="font-size: 5rem;"></i>
                        @endif
                    </div>
                    
                    <h2 class="display-4 fw-bold mb-3">
                        @if($waterStatus->status === 'normal')
                        <span class="text-success">{{ __('messages.normal_supply') }}</span>
                        @elseif($waterStatus->status === 'interrupted')
                        <span class="text-danger">{{ __('messages.interrupted_supply') }}</span>
                        @else
                        <span class="text-warning">{{ __('messages.maintenance_mode') }}</span>
                        @endif
                    </h2>
                    
                    @if($waterStatus->affected_area)
                    <div class="alert alert-warning">
                        <strong>{{ __('messages.affected_area') }}:</strong> {{ $waterStatus->affected_area }}
                    </div>
                    @endif
                    
                    @if($waterStatus->expected_restoration)
                    <div class="alert alert-info">
                        <strong>{{ __('messages.expected_restoration') }}:</strong> {{ $waterStatus->expected_restoration->format('Y-m-d H:i') }}
                    </div>
                    @endif
                    
                    @if($waterStatus->remarks_en || $waterStatus->remarks_ne)
                    <div class="card bg-light mt-4">
                        <div class="card-body">
                            <p class="mb-0">{{ app()->getLocale() === 'ne' ? $waterStatus->remarks_ne : $waterStatus->remarks_en }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <p class="text-muted mt-4">
                        <small>{{ __('messages.last_updated') }}: {{ $waterStatus->created_at->format('Y-m-d H:i') }}</small>
                    </p>
                </div>
            </div>
            @else
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="bi bi-question-circle text-muted" style="font-size: 5rem;"></i>
                    <h3 class="mt-3">{{ __('messages.no_status_available') }}</h3>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
