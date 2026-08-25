@extends('layouts.admin')

@section('title', __('messages.about'))

@section('page-title', __('messages.about'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
</div>

<div class="row g-4">
    <div class="col-md-6 col-lg-3">
        <a href="{{ route('admin.about.edit-organization-intro') }}" class="text-decoration-none">
            <div class="card h-100 border-0 shadow-sm hover-shadow" style="border-radius: 12px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="icon-box mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="bi bi-building text-white fs-2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-color);">{{ __('messages.organization_intro') }}</h5>
                    <p class="text-muted small mb-0">{{ __('messages.edit_organization_intro') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('admin.about.edit-our-mission') }}" class="text-decoration-none">
            <div class="card h-100 border-0 shadow-sm hover-shadow" style="border-radius: 12px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="icon-box mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="bi bi-bullseye text-white fs-2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-color);">{{ __('messages.our_mission') }}</h5>
                    <p class="text-muted small mb-0">{{ __('messages.edit_our_mission') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('admin.about.edit-our-vision') }}" class="text-decoration-none">
            <div class="card h-100 border-0 shadow-sm hover-shadow" style="border-radius: 12px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="icon-box mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="bi bi-eye text-white fs-2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-color);">{{ __('messages.our_vision') }}</h5>
                    <p class="text-muted small mb-0">{{ __('messages.edit_our_vision') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('admin.about.edit-organization-structure') }}" class="text-decoration-none">
            <div class="card h-100 border-0 shadow-sm hover-shadow" style="border-radius: 12px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="icon-box mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="bi bi-diagram-3 text-white fs-2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-color);">{{ __('messages.organization_structure') }}</h5>
                    <p class="text-muted small mb-0">{{ __('messages.edit_organization_structure') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('admin.board-members.index') }}" class="text-decoration-none">
            <div class="card h-100 border-0 shadow-sm hover-shadow" style="border-radius: 12px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="icon-box mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="bi bi-people text-white fs-2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-color);">{{ __('messages.board_members') }}</h5>
                    <p class="text-muted small mb-0">{{ __('messages.manage_board_members') }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="{{ route('admin.office-staff.index') }}" class="text-decoration-none">
            <div class="card h-100 border-0 shadow-sm hover-shadow" style="border-radius: 12px; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="card-body text-center p-4">
                    <div class="icon-box mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--water-blue)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="bi bi-person-badge text-white fs-2"></i>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-color);">{{ __('messages.office_staff') }}</h5>
                    <p class="text-muted small mb-0">{{ __('messages.manage_office_staff') }}</p>
                </div>
            </div>
        </a>
    </div>
</div>

<style>
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
</style>
@endsection
