@extends('layouts.frontend')

@section('title', 'News')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.news') }}</h1>
        <p class="lead text-muted">{{ __('messages.news_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @foreach($news as $newsItem)
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body">
                    @if($newsItem->featured)
                    <span class="badge bg-primary mb-2">{{ __('messages.featured') }}</span>
                    @endif
                    <span class="badge bg-secondary mb-2">{{ $newsItem->category }}</span>
                    <h5 class="card-title mt-2">{{ app()->getLocale() === 'ne' ? $newsItem->title_ne : $newsItem->title_en }}</h5>
                    <p class="card-text text-muted">{{ Str::limit(app()->getLocale() === 'ne' ? $newsItem->content_ne : $newsItem->content_en, 150) }}</p>
                    <p class="card-text"><small class="text-muted">
                        <i class="bi bi-calendar me-1"></i>{{ $newsItem->publish_date->format('Y-m-d') }}
                    </small></p>
                    <a href="{{ route('news.detail', $newsItem->id) }}" class="btn btn-outline-primary">{{ __('messages.read_more') }}</a>
                </div>
            </div>
            @endforeach
            
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection
