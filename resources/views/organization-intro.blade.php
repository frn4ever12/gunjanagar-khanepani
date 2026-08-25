@extends('layouts.frontend')

@section('title', __('messages.organization_intro'))

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @if($about)
                @if($about->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="img-fluid rounded">
                    </div>
                @endif
                
                <h1 class="display-5 fw-bold mb-4">{{ $about->title ?? __('messages.organization_intro') }}</h1>
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        @if($about->organization_intro)
                            <div class="text-muted">{!! $about->organization_intro !!}</div>
                        @else
                            <p class="text-muted">{{ $about->description }}</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    {{ __('messages.about_content_not_available') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
