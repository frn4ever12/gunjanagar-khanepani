@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<!-- Hero Section with Slider and Board Members -->
<div class="container-fluid p-0">
    <div class="row g-0">
        <!-- Left Side - Image Slider -->
        <div class="col-lg-8">
            @if($banners->count() > 0)
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    @foreach($banners as $index => $banner)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="hero-section text-center text-white position-relative" style="min-height: 500px; @if($banner->image) background-image: url('{{ asset('storage/' . $banner->image) }}'); background-size: cover; background-position: center; @endif">
                            @if($banner->image)
                            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 1;"></div>
                            @endif
                            <div class="container position-relative h-100 d-flex flex-column justify-content-center align-items-center" style="z-index: 2;">
                                <h1 class="display-4 fw-bold mb-3" style="font-size: 24px;">{{ $banner->title }}</h1>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @if($banners->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
                @endif
            </div>
            @else
            <div class="hero-section text-center text-white" style="min-height: 500px;">
                <div class="container position-relative" style="z-index: 2;">
                    <h1 class="display-4 fw-bold mb-3">{{ __('messages.hero_title') }}</h1>
                    <p class="lead mb-4">{{ __('messages.hero_subtitle') }}</p>
                    <a href="{{ route('services') }}" class="btn btn-hero">{{ __('messages.learn_more') }}</a>
                </div>
            </div>
            @endif
        </div>

        <!-- Right Side - Board Members -->
        <div class="col-lg-4">
            <div class="board-members-sidebar" style="background: linear-gradient(180deg, #1e3a5f 0%, #0d2137 100%); min-height: 500px; padding: 30px 20px;">
                <h4 class="text-white mb-4 fw-bold">{{ __('messages.board_members') }}</h4>
                
                @if($boardMembers->count() > 0)
                    @foreach($boardMembers as $member)
                    <div class="board-member-card mb-3" style="background: rgba(255,255,255,0.1); border-radius: 10px; padding: 15px; border: 1px solid rgba(255,255,255,0.2);">
                        <div class="d-flex align-items-center">
                            <div class="member-photo me-3" style="flex-shrink: 0;">
                                @if($member->image)
                                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%; border: 2px solid rgba(255,255,255,0.3);">
                                @else
                                    <div style="width: 90px; height: 90px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid rgba(255,255,255,0.3);">
                                        <i class="bi bi-person text-white fs-2"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="member-info flex-grow-1">
                                <h6 class="text-white mb-1 fw-bold">{{ $member->name }}</h6>
                                <p class="text-white-50 mb-1 small">{{ $member->designation }}</p>
                                @if($member->email)
                                    <a href="mailto:{{ $member->email }}" class="text-white-50 text-decoration-none small d-block">
                                        <i class="bi bi-envelope me-1"></i>{{ $member->email }}
                                    </a>
                                @endif
                                @if($member->phone)
                                    <a href="tel:{{ $member->phone }}" class="text-white-50 text-decoration-none small d-block">
                                        <i class="bi bi-telephone me-1"></i>{{ $member->phone }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <a href="{{ route('board-members') }}" class="btn btn-light w-100 mt-3 fw-bold" style="background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.3);">
                        {{ __('messages.view_all') }} {{ __('messages.board_members') }}
                    </a>
                @else
                    <div class="text-center text-white-50 py-5">
                        <i class="bi bi-people fs-1 mb-3"></i>
                        <p>{{ __('messages.no_board_members') }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- About Us Section -->
@if($about)
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="section-header text-start">
                    <h2>{{ $about->title }}</h2>
                    <div class="divider" style="margin: 0;"></div>
                </div>
                <p class="mt-4 text-muted" style="font-size: 16px; line-height: 1.8;">
                    {{ $about->description }}
                </p>
                @if($about->mission)
                <div class="row mt-4">
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="icon-box me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--water-blue), var(--accent-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="bi bi-bullseye text-white fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-2 fw-bold" style="color: var(--primary-color);">{{ __('messages.our_mission') }}</h6>
                                <small class="text-muted">{{ $about->mission }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($about->vision)
                <div class="row mt-2">
                    <div class="col-12 mb-3">
                        <div class="d-flex align-items-start">
                            <div class="icon-box me-3" style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--water-blue), var(--accent-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <i class="bi bi-eye text-white fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-2 fw-bold" style="color: var(--primary-color);">{{ __('messages.our_vision') }}</h6>
                                <small class="text-muted">{{ $about->vision }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <a href="{{ route('about') }}" class="btn btn-primary mt-3" style="background: var(--water-blue); border: none; padding: 10px 25px;">
                    {{ __('messages.learn_more') }} <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="col-lg-6">
                <div class="about-image position-relative">
                    @if($about->image)
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="img-fluid rounded" style="width: 100%; height: auto;">
                    @else
                        <div style="background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 10px; padding: 40px; color: white; text-align: center;">
                            <i class="bi bi-water" style="font-size: 80px; opacity: 0.8;"></i>
                            <h4 class="mt-3 fw-bold">{{ __('messages.our_mission') }}</h4>
                            @if($about->mission)
                                <p class="mt-2 mb-0" style="opacity: 0.9; font-size: 15px;">
                                    {{ Str::limit($about->mission, 150) }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Statistics Section (Small) -->
@if($statistics->count() > 0)
<section class="py-3" style="background: linear-gradient(135deg, var(--primary-color), var(--water-blue));">
    <div class="container">
        <div class="row g-2">
            @foreach($statistics as $statistic)
            <div class="col-3 col-md-{{ 12 / min($statistics->count(), 4) }}">
                <div class="text-center text-white">
                    <div class="stat-icon-small mb-1">
                        <i class="{{ $statistic->icon }}" style="font-size: 20px;"></i>
                    </div>
                    <div class="stat-value-small fw-bold" style="font-size: 18px;">{{ $statistic->value }}</div>
                    <div class="stat-label-small" style="font-size: 11px; opacity: 0.9;">{{ app()->getLocale() === 'ne' ? $statistic->label_ne : $statistic->label_en }}</div>
                    <div class="stat-unit-small" style="font-size: 10px; opacity: 0.7;">{{ $statistic->unit }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Water Status Alert -->
@if($waterStatus && $waterStatus->status !== 'normal')
<div class="container mb-4" style="margin-top: -20px; position: relative; z-index: 20;">
    <div class="alert alert-{{ $waterStatus->status === 'interrupted' ? 'danger' : 'warning' }} alert-dismissible fade show" role="alert">
        <h5 class="alert-heading">
            <i class="bi bi-exclamation-triangle me-2"></i>
            {{ __('messages.water_supply_alert') }}
        </h5>
        <p>{{ app()->getLocale() === 'ne' ? $waterStatus->remarks_ne : $waterStatus->remarks_en }}</p>
        @if($waterStatus->expected_restoration)
        <hr>
        <p class="mb-0"><small>{{ __('messages.expected_restoration') }}: {{ $waterStatus->expected_restoration->format('Y-m-d H:i') }}</small></p>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

<!-- Services Section -->
@if($services->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header text-center">
            <h2>{{ __('messages.our_services') }}</h2>
            <div class="divider"></div>
        </div>
        <div class="row g-4 mt-2">
            @foreach($services as $service)
            <div class="col-md-6 col-lg-3">
                <div class="service-card-home h-100">
                    <div class="service-icon-wrapper">
                        <i class="{{ $service->icon }}"></i>
                    </div>
                    <h5 class="mt-3">{{ $service->title }}</h5>
                    <p class="text-muted small">{{ Str::limit($service->description, 80) }}</p>
                    <a href="{{ route('services') }}" class="btn btn-sm btn-outline-primary mt-2">{{ __('messages.learn_more') }}</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('services') }}" class="btn btn-primary">{{ __('messages.view_all_services') }}</a>
        </div>
    </div>
</section>
@endif

<!-- Quick Services Section -->
<section class="quick-services">
    <div class="container">
        <div class="section-header">
            <h2>{{ __('messages.quick_services') }}</h2>
            <div class="divider"></div>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <a href="{{ route('services') }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <h5>{{ __('messages.water_bill') }}</h5>
                        <p>Water Bill</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('services') }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-plus-circle"></i>
                        </div>
                        <h5>{{ __('messages.new_connection') }}</h5>
                        <p>New Connection</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('complaint.form') }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                        <h5>{{ __('messages.complaint_registration') }}</h5>
                        <p>Complaints</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('water-schedule') }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h5>{{ __('messages.water_schedule') }}</h5>
                        <p>Schedule</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h5>{{ __('messages.online_payment') }}</h5>
                        <p>Online Payment</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('downloads') }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-download"></i>
                        </div>
                        <h5>{{ __('messages.download_forms') }}</h5>
                        <p>Downloads</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="#" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-file-text"></i>
                        </div>
                        <h5>{{ __('messages.citizen_charter') }}</h5>
                        <p>Charter</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('complaint.form') }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-wrapper">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h5>{{ __('messages.contact_us') }}</h5>
                        <p>Contact</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Notice + Water Status + Schedule Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Important Notices -->
            <div class="col-lg-4">
                <div class="info-card">
                    <div class="card-header">
                        <i class="bi bi-megaphone me-2"></i>{{ __('messages.important_notices') }}
                    </div>
                    <div class="card-body p-0">
                        @if($notices->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($notices->take(5) as $notice)
                            <a href="{{ route('notices.detail', $notice->id) }}" class="list-group-item list-group-item-action border-0 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        @if($notice->featured)
                                        <span class="badge bg-warning text-dark me-1 mb-1">{{ __('messages.important') }}</span>
                                        @endif
                                        <h6 class="mb-1">{{ Str::limit(app()->getLocale() === 'ne' ? $notice->title_ne : $notice->title_en, 50) }}</h6>
                                        <small class="text-muted">{{ $notice->publish_date->format('Y-m-d') }}</small>
                                    </div>
                                    <i class="bi bi-chevron-right text-muted"></i>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-4 text-muted">
                            <small>{{ __('messages.no_notices') }}</small>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('notices') }}" class="btn btn-sm btn-outline-primary w-100">{{ __('messages.view_all') }}</a>
                    </div>
                </div>
            </div>
            
            <!-- Water Supply Status -->
            <div class="col-lg-4">
                @if($waterStatus)
                <div class="water-status-card {{ $waterStatus->status === 'normal' ? '' : ($waterStatus->status === 'low_pressure' ? 'status-warning' : 'status-danger') }}">
                    <div class="status-icon">
                        <i class="bi bi-{{ $waterStatus->status === 'normal' ? 'check-circle' : ($waterStatus->status === 'low_pressure' ? 'exclamation-triangle' : 'x-circle') }}"></i>
                    </div>
                    <div class="status-text">{{ __('messages.water_supply_status') }}</div>
                    <div class="status-subtext">
                        {{ $waterStatus->status === 'normal' ? __('messages.normal') : ($waterStatus->status === 'low_pressure' ? __('messages.low_pressure') : __('messages.temporarily_suspended')) }}
                    </div>
                    <hr style="border-color: rgba(255,255,255,0.3);">
                    <div class="text-start">
                        <small>{{ __('messages.affected_area') }}: {{ $waterStatus->affected_area ?? __('messages.all_areas') }}</small>
                        <br>
                        <small>{{ __('messages.expected_restoration') }}: {{ $waterStatus->expected_restoration ? $waterStatus->expected_restoration->format('Y-m-d H:i') : '-' }}</small>
                    </div>
                </div>
                @else
                <div class="water-status-card">
                    <div class="status-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="status-text">{{ __('messages.water_supply_status') }}</div>
                    <div class="status-subtext">{{ __('messages.normal') }}</div>
                    <hr style="border-color: rgba(255,255,255,0.3);">
                    <div class="text-start">
                        <small>{{ __('messages.affected_area') }}: {{ __('messages.all_areas') }}</small>
                        <br>
                        <small>{{ __('messages.expected_restoration') }}: -</small>
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Water Supply Schedule -->
            <div class="col-lg-4">
                <div class="info-card">
                    <div class="card-header">
                        <i class="bi bi-calendar3 me-2"></i>{{ __('messages.water_schedule') }}
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('messages.area') }}</th>
                                        <th>{{ __('messages.day') }}</th>
                                        <th>{{ __('messages.time') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $schedules = \App\Models\WaterSchedule::where('status', 'active')->take(5)->get();
                                    @endphp
                                    @if($schedules->count() > 0)
                                        @foreach($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->area }}</td>
                                            <td>{{ $schedule->day }}</td>
                                            <td>{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-3">
                                                <small>{{ __('messages.no_schedule') }}</small>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('water-schedule') }}" class="btn btn-sm btn-outline-primary w-100">{{ __('messages.view_full_schedule') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Downloads + News + Water Quality Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Downloads -->
            <div class="col-lg-4">
                <div class="info-card">
                    <div class="card-header">
                        <i class="bi bi-download me-2"></i>{{ __('messages.download_center') }}
                    </div>
                    <div class="card-body p-0">
                        @php
                            $downloads = \App\Models\Download::where('status', 'active')->take(4)->get();
                        @endphp
                        @if($downloads->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($downloads as $download)
                            @if($download->file)
                            <a href="{{ asset('storage/' . $download->file) }}" class="list-group-item list-group-item-action border-0 border-bottom" download>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-file-earmark-pdf text-danger me-2 fs-4"></i>
                                    <div>
                                        <h6 class="mb-0">{{ Str::limit(app()->getLocale() === 'ne' ? $download->title_ne : $download->title_en, 30) }}</h6>
                                        <small class="text-muted">{{ $download->file_type }} • {{ $download->file_size }}</small>
                                    </div>
                                </div>
                            </a>
                            @endif
                            @endforeach
                        </div>
                        @else
                        <div class="text-center py-4 text-muted">
                            <small>{{ __('messages.no_downloads') }}</small>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('downloads') }}" class="btn btn-sm btn-outline-primary w-100">{{ __('messages.view_all') }}</a>
                    </div>
                </div>
            </div>

            <!-- News & Updates -->
            <div class="col-lg-4">
                <div class="info-card">
                    <div class="card-header">
                        <i class="bi bi-newspaper me-2"></i>{{ __('messages.news') }}
                    </div>
                    <div class="card-body p-0">
                        @if($news->count() > 0)
                        @foreach($news->take(3) as $newsItem)
                        <a href="{{ route('news.detail', $newsItem->id) }}" class="text-decoration-none">
                            <div class="p-3 border-bottom">
                                <span class="badge bg-primary mb-2">{{ $newsItem->category }}</span>
                                <h6 class="mb-1 text-dark">{{ Str::limit(app()->getLocale() === 'ne' ? $newsItem->title_ne : $newsItem->title_en, 45) }}</h6>
                                <small class="text-muted">{{ $newsItem->publish_date->format('Y-m-d') }}</small>
                            </div>
                        </a>
                        @endforeach
                        @else
                        <div class="text-center py-4 text-muted">
                            <small>{{ __('messages.no_news') }}</small>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('news') }}" class="btn btn-sm btn-outline-primary w-100">{{ __('messages.view_all') }}</a>
                    </div>
                </div>
            </div>

            <!-- Water Quality -->
            <div class="col-lg-4">
                <div class="info-card">
                    <div class="card-header">
                        <i class="bi bi-droplet-half me-2"></i>{{ __('messages.water_quality_report') }}
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('messages.parameter') }}</th>
                                        <th>{{ __('messages.standard') }}</th>
                                        <th>{{ __('messages.result') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $qualities = \App\Models\WaterQuality::where('status', 'pass')->take(5)->get();
                                    @endphp
                                    @if($qualities->count() > 0)
                                        @foreach($qualities as $quality)
                                        <tr>
                                            <td>{{ $quality->parameter }}</td>
                                            <td>{{ $quality->standard }}</td>
                                            <td><span class="badge bg-success">{{ $quality->result }}</span></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-3">
                                                <small>{{ __('messages.no_quality_data') }}</small>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('water-quality') }}" class="btn btn-sm btn-outline-primary w-100">{{ __('messages.view_all') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
