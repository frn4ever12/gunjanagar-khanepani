@extends('layouts.admin')

@section('title', 'Water Supply Schedule')
@section('page-title', 'Water Supply Schedule')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.water-schedule.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>{{ __('messages.create') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Area</th>
                        <th>Ward</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Remarks</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->area }}</td>
                        <td>{{ $schedule->ward ?? '-' }}</td>
                        <td>{{ $schedule->day }}</td>
                        <td>{{ $schedule->start_time->format('H:i') }}</td>
                        <td>{{ $schedule->end_time->format('H:i') }}</td>
                        <td>{{ Str::limit($schedule->remarks, 80) }}</td>
                        <td>
                            <span class="status-badge {{ $schedule->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $schedule->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.water-schedule.edit', $schedule) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.water-schedule.destroy', $schedule) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No water schedules found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
