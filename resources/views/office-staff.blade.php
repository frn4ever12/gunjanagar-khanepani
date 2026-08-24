@extends('layouts.frontend')

@section('title', __('messages.office_staff_page_title'))

@section('content')
<!-- Hero Section -->
<div class="hero-section text-center text-white" style="background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); padding: 80px 0;">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">{{ __('messages.office_staff_page_title') }}</h1>
        <p class="lead">{{ __('messages.about_us') }}</p>
    </div>
</div>

<!-- Office Staff Section -->
<section class="py-5">
    <div class="container">
        @if($officeStaff->count() > 0)
            <div class="row g-4">
                @foreach($officeStaff as $staff)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                        <div class="card-body p-0">
                            <div class="d-flex">
                                <div class="profile-image" style="width: 120px; flex-shrink: 0;">
                                    @if($staff->image)
                                        <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" style="width: 100%; height: 120px; object-fit: cover;">
                                    @else
                                        <div style="width: 100%; height: 120px; background: linear-gradient(135deg, var(--water-blue), var(--accent-blue)); display: flex; align-items: center; justify-content: center;">
                                            <i class="bi bi-person text-white fs-2"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="profile-info p-4 flex-grow-1">
                                    <h5 class="fw-bold mb-1" style="color: var(--primary-color);">{{ $staff->name }}</h5>
                                    <p class="text-muted mb-1 small">{{ $staff->designation }}</p>
                                    @if($staff->department)
                                        <p class="text-muted mb-2 small"><i class="bi bi-building me-1"></i>{{ $staff->department }}</p>
                                    @endif
                                    @if($staff->description)
                                        <p class="small text-muted mb-2" style="line-height: 1.4;">{{ Str::limit($staff->description, 100) }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="contact-info p-3 bg-light">
                                @if($staff->email)
                                    <a href="mailto:{{ $staff->email }}" class="d-flex align-items-center text-decoration-none text-dark mb-2">
                                        <i class="bi bi-envelope me-2" style="color: var(--water-blue);"></i>
                                        <small>{{ $staff->email }}</small>
                                    </a>
                                @endif
                                @if($staff->phone)
                                    <a href="tel:{{ $staff->phone }}" class="d-flex align-items-center text-decoration-none text-dark mb-2">
                                        <i class="bi bi-telephone me-2" style="color: var(--water-blue);"></i>
                                        <small>{{ $staff->phone }}</small>
                                    </a>
                                @endif
                                @if($staff->mobile)
                                    <a href="tel:{{ $staff->mobile }}" class="d-flex align-items-center text-decoration-none text-dark">
                                        <i class="bi bi-phone me-2" style="color: var(--water-blue);"></i>
                                        <small>{{ $staff->mobile }}</small>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-person-badge text-muted" style="font-size: 64px;"></i>
                <p class="text-muted mt-3">{{ __('messages.no_office_staff') }}</p>
            </div>
        @endif
    </div>
</section>
@endsection
