@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistics Cards -->
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #e3f2fd; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-megaphone fs-4" style="color: #1976d2;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.notices') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_notices'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #e8f5e9; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-newspaper fs-4" style="color: #388e3c;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.news') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_news'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #fff3e0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-exclamation-triangle fs-4" style="color: #f57c00;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.complaints') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_complaints'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #ffebee; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-clock fs-4" style="color: #d32f2f;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">Pending</h6>
                        <h3 class="mb-0">{{ $stats['pending_complaints'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #f3e5f5; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-grid fs-4" style="color: #7b1fa2;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.services') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_services'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #e0f7fa; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-download fs-4" style="color: #0097a7;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.downloads') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_downloads'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #fce4ec; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-question-circle fs-4" style="color: #c2185b;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.faq') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_faqs'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="icon-wrapper" style="width: 50px; height: 50px; background: #e8eaf6; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="bi bi-people fs-4" style="color: #303f9f;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0 text-muted">{{ __('messages.users') }}</h6>
                        <h3 class="mb-0">{{ $stats['total_users'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Water Status Card -->
@if($waterStatus)
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('messages.water_supply_status') }}</span>
                <span class="status-badge {{ $waterStatus->status === 'normal' ? 'status-active' : 'status-inactive' }}">
                    {{ $waterStatus->status_label }}
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <strong>{{ __('messages.affected_area') }}:</strong>
                        <p class="mb-0">{{ $waterStatus->affected_area ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>{{ __('messages.expected_restoration') }}:</strong>
                        <p class="mb-0">{{ $waterStatus->expected_restoration ? $waterStatus->expected_restoration->format('Y-m-d H:i') : 'N/A' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>{{ __('messages.remarks') }}:</strong>
                        <p class="mb-0">{{ $waterStatus->remarks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Recent Complaints -->
<div class="row mt-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Complaints</span>
                <a href="{{ route('admin.complaints.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Ref #</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentComplaints as $complaint)
                            <tr>
                                <td>{{ $complaint->reference_number }}</td>
                                <td>{{ $complaint->full_name }}</td>
                                <td>
                                    <span class="status-badge {{ $complaint->status === 'resolved' ? 'status-active' : 'status-inactive' }}">
                                        {{ $complaint->status_label }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No complaints yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Notices -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Notices</span>
                <a href="{{ route('admin.notices.index') }}" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentNotices as $notice)
                            <tr>
                                <td>{{ $notice->title }}</td>
                                <td>{{ $notice->publish_date->format('Y-m-d') }}</td>
                                <td>
                                    <span class="status-badge {{ $notice->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                        {{ $notice->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">No notices yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
