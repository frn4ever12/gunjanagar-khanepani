@extends('layouts.frontend')

@section('title', 'Login')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold" style="color: var(--primary-color);">{{ __('messages.login') }}</h2>
                        <p class="text-muted">{{ __('messages.login_to_admin_panel') }}</p>
                    </div>
                    
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-0">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('messages.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('messages.password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">{{ __('messages.remember_me') }}</label>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">{{ __('messages.login') }}</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="{{ route('home') }}" class="text-decoration-none">{{ __('messages.back_to_home') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
