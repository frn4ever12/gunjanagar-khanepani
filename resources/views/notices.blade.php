@extends('layouts.frontend')

@section('title', 'Notices')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.notices') }}</h1>
        <p class="lead text-muted">{{ __('messages.notices_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @foreach($notices as $notice)
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            @if($notice->featured)
                            <span class="badge bg-warning text-dark mb-2">{{ __('messages.important') }}</span>
                            @endif
                            <h5 class="card-title">{{ app()->getLocale() === 'ne' ? $notice->title_ne : $notice->title_en }}</h5>
                            <p class="card-text text-muted">{{ Str::limit(app()->getLocale() === 'ne' ? $notice->description_ne : $notice->description_en, 150) }}</p>
                            <p class="card-text"><small class="text-muted">
                                <i class="bi bi-calendar me-1"></i>{{ $notice->publish_date->format('Y-m-d') }}
                                @if($notice->expiry_date)
                                | <i class="bi bi-clock me-1"></i>{{ __('messages.expires') }}: {{ $notice->expiry_date->format('Y-m-d') }}
                                @endif
                            </small></p>
                        </div>
                        <a href="{{ route('notices.detail', $notice->id) }}" class="btn btn-outline-primary">{{ __('messages.view') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
            
            {{ $notices->links() }}
        </div>
    </div>
</div>
@endsection
