@extends('layouts.frontend')

@section('title', 'Water Quality')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.water_quality') }}</h1>
        <p class="lead text-muted">{{ __('messages.water_quality_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('messages.parameter') }}</th>
                                    <th>{{ __('messages.standard') }}</th>
                                    <th>{{ __('messages.result') }}</th>
                                    <th>{{ __('messages.status') }}</th>
                                    <th>{{ __('messages.testing_date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($qualities as $quality)
                                <tr>
                                    <td><strong>{{ $quality->parameter }}</strong></td>
                                    <td>{{ $quality->standard }}</td>
                                    <td>{{ $quality->result }}</td>
                                    <td>
                                        <span class="badge {{ $quality->status === 'compliant' ? 'bg-success' : ($quality->status === 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                            {{ ucfirst(str_replace('_', ' ', $quality->status)) }}
                                        </span>
                                    </td>
                                    <td>{{ $quality->testing_date->format('Y-m-d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="alert alert-success mt-4">
                        <i class="bi bi-check-circle me-2"></i>
                        {{ __('messages.quality_note') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
