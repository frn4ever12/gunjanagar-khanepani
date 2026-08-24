@extends('layouts.admin')

@section('title', 'Water Supply Status')
@section('page-title', 'Water Supply Status')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.water-status.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>{{ __('messages.create') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Affected Area</th>
                        <th>Expected Restoration</th>
                        <th>Remarks</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statuses as $status)
                    <tr>
                        <td>
                            <span class="status-badge {{ $status->status === 'normal' ? 'status-active' : 'status-inactive' }}">
                                {{ $status->status_label }}
                            </span>
                        </td>
                        <td>{{ $status->affected_area ?? '-' }}</td>
                        <td>{{ $status->expected_restoration ? $status->expected_restoration->format('Y-m-d H:i') : '-' }}</td>
                        <td>{{ Str::limit($status->remarks, 100) }}</td>
                        <td>{{ $status->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.water-status.edit', $status) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.water-status.destroy', $status) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="6" class="text-center">No water status records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
