@extends('layouts.frontend')

@section('title', 'About Us')

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
                
                <h1 class="display-5 fw-bold mb-4">{{ $about->title }}</h1>
                
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <p class="text-muted">{{ $about->description }}</p>
                    </div>
                </div>
                
                @if($about->history)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h4 mb-3">{{ __('messages.our_history') }}</h3>
                        <p class="text-muted">{{ $about->history }}</p>
                    </div>
                </div>
                @endif
                
                @if($about->mission)
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h4 mb-3">{{ __('messages.our_mission') }}</h3>
                        <p class="text-muted">{{ $about->mission }}</p>
                    </div>
                </div>
                @endif
                
                @if($about->vision)
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h4 mb-3">{{ __('messages.our_vision') }}</h3>
                        <p class="text-muted">{{ $about->vision }}</p>
                    </div>
                </div>
                @endif
            @else
                <div class="alert alert-info">
                    {{ __('messages.about_content_not_available') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
