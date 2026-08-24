@extends('layouts.frontend')

@section('title', $newsItem->title_en)

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news') }}">{{ __('messages.news') }}</a></li>
                    <li class="breadcrumb-item active">{{ app()->getLocale() === 'ne' ? $newsItem->title_ne : $newsItem->title_en }}</li>
                </ol>
            </nav>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @if($newsItem->featured)
                    <span class="badge bg-primary mb-3">{{ __('messages.featured') }}</span>
                    @endif
                    
                    <span class="badge bg-secondary mb-3">{{ $newsItem->category }}</span>
                    
                    <h1 class="display-5 fw-bold mb-4">{{ app()->getLocale() === 'ne' ? $newsItem->title_ne : $newsItem->title_en }}</h1>
                    
                    <p class="text-muted mb-4">
                        <i class="bi bi-calendar me-1"></i>{{ $newsItem->publish_date->format('Y-m-d') }}
                    </p>
                    
                    @if($newsItem->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title_en }}" class="img-fluid rounded">
                    </div>
                    @endif
                    
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <p class="mb-0" style="white-space: pre-line;">{{ app()->getLocale() === 'ne' ? $newsItem->content_ne : $newsItem->content_en }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('news') }}" class="btn btn-outline-secondary">{{ __('messages.back_to_news') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
