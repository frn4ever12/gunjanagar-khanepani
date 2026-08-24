@extends('layouts.frontend')

@section('title', 'Water Schedule')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">{{ __('messages.water_schedule') }}</h1>
        <p class="lead text-muted">{{ __('messages.water_schedule_subtitle') }}</p>
    </div>
    
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>{{ __('messages.day') }}</th>
                                    <th>{{ __('messages.area') }}</th>
                                    <th>{{ __('messages.ward') }}</th>
                                    <th>{{ __('messages.start_time') }}</th>
                                    <th>{{ __('messages.end_time') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($schedules as $schedule)
                                <tr>
                                    <td><strong>{{ $schedule->day }}</strong></td>
                                    <td>{{ $schedule->area }}</td>
                                    <td>{{ $schedule->ward }}</td>
                                    <td>{{ $schedule->start_time->format('H:i') }}</td>
                                    <td>{{ $schedule->end_time->format('H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="alert alert-info mt-4">
                        <i class="bi bi-info-circle me-2"></i>
                        {{ __('messages.schedule_note') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
