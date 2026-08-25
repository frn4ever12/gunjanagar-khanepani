@extends('layouts.frontend')

@section('title', __('messages.our_vision'))

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            @if($about)
                <h1 class="display-5 fw-bold mb-4">{{ __('messages.our_vision') }}</h1>
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        @if($about->vision)
                            <p class="text-muted">{{ $about->vision }}</p>
                        @else
                            <p class="text-muted">{{ __('messages.about_content_not_available') }}</p>
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
