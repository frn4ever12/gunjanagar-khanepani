@extends('layouts.frontend')

@section('title', '403 - Forbidden')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="error-page">
                <h1 class="display-1 fw-bold text-danger">403</h1>
                <h2 class="mb-4">{{ __('messages.access_denied') }}</h2>
                <p class="lead text-muted mb-4">{{ __('messages.access_denied_message') }}</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.go_home') }}</a>
                    <a href="javascript:history.back()" class="btn btn-outline-secondary">{{ __('messages.go_back') }}</a>
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
