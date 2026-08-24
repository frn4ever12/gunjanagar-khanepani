@extends('layouts.frontend')

@section('title', '429 - Too Many Requests')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="error-page">
                <h1 class="display-1 fw-bold text-warning">429</h1>
                <h2 class="mb-4">{{ __('messages.too_many_requests') }}</h2>
                <p class="lead text-muted mb-4">{{ __('messages.too_many_requests_message') }}</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.go_home') }}</a>
                    <a href="javascript:location.reload()" class="btn btn-outline-secondary">{{ __('messages.refresh_page') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .error-page h1 {
        font-size: 150px;
        font-weight: 700;
        line-height: 1;
    }
</style>
@endsection
