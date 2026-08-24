@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Organization Settings</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <h6 class="mb-3 mt-4">Organization Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="org_name_en" class="form-label">Organization Name (English)</label>
                                <input type="text" class="form-control" id="org_name_en" name="org_name_en" value="{{ $settings['org_name_en'] ?? config('app.name') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="org_name_ne" class="form-label">Organization Name (नेपाली)</label>
                                <input type="text" class="form-control" id="org_name_ne" name="org_name_ne" value="{{ $settings['org_name_ne'] ?? 'खानेपानी व्यवस्थापन' }}" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4 mb-3">
                                <label for="nepal_flag" class="form-label">Nepal Flag Logo</label>
                                <input type="file" class="form-control" id="nepal_flag" name="nepal_flag" accept="image/jpeg,image/png,image/jpg,image/gif">
                                @if(isset($settings['nepal_flag']) && $settings['nepal_flag'])
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $settings['nepal_flag']) }}" alt="Current Nepal Flag" style="max-height: 60px;">
                                        <small class="text-muted d-block">Current nepal flag</small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/jpeg,image/png,image/jpg,image/gif">
                                @if(isset($settings['logo']) && $settings['logo'])
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Current Logo" style="max-height: 60px;">
                                        <small class="text-muted d-block">Current logo</small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="favicon" class="form-label">Favicon</label>
                                <input type="file" class="form-control" id="favicon" name="favicon" accept="image/jpeg,image/png,image/jpg,image/gif,image/ico">
                                @if(isset($settings['favicon']) && $settings['favicon'])
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Current Favicon" style="max-height: 32px;">
                                        <small class="text-muted d-block">Current favicon</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="tagline" class="form-label">Tagline</label>
                            <input type="text" class="form-control" id="tagline" name="tagline" value="{{ $settings['tagline'] ?? 'Safe Water, Healthy Community' }}">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="description_en" class="form-label">Description (English)</label>
                                <textarea class="form-control" id="description_en" name="description_en" rows="3">{{ $settings['description_en'] ?? '' }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="description_ne" class="form-label">Description (नेपाली)</label>
                                <textarea class="form-control" id="description_ne" name="description_ne" rows="3">{{ $settings['description_ne'] ?? '' }}</textarea>
                            </div>
                        </div>
                        
                        <h6 class="mb-3 mt-4">Contact Information</h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $settings['address'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $settings['phone'] ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $settings['email'] ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emergency" class="form-label">Emergency Contact</label>
                                <input type="text" class="form-control" id="emergency" name="emergency" value="{{ $settings['emergency'] ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="office_hours" class="form-label">Office Hours</label>
                            <input type="text" class="form-control" id="office_hours" name="office_hours" value="{{ $settings['office_hours'] ?? 'Sun-Fri: 9:00 AM - 5:00 PM' }}">
                        </div>
                        
                        <h6 class="mb-3 mt-4">Social Media</h6>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="facebook" class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $settings['facebook'] ?? '' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="youtube" class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" id="youtube" name="youtube" value="{{ $settings['youtube'] ?? '' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="twitter" class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" id="twitter" name="twitter" value="{{ $settings['twitter'] ?? '' }}">
                            </div>
                        </div>
                        
                        <h6 class="mb-3 mt-4">Footer</h6>
                        <div class="mb-3">
                            <label for="footer_text" class="form-label">Footer Text</label>
                            <input type="text" class="form-control" id="footer_text" name="footer_text" value="{{ $settings['footer_text'] ?? 'Website Developed by DMC Group Nepal' }}">
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
