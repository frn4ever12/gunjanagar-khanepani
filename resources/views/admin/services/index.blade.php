@extends('layouts.admin')

@section('title', 'Services')
@section('page-title', 'Services')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>{{ __('messages.create') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Title (EN)</th>
                        <th>Title (NE)</th>
                        <th>Fee</th>
                        <th>Processing Time</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr>
                        <td>
                            @if($service->icon)
                                <i class="bi {{ $service->icon }} fs-4"></i>
                            @else
                                <i class="bi bi-grid fs-4 text-muted"></i>
                            @endif
                        </td>
                        <td>{{ $service->title_en }}</td>
                        <td>{{ $service->title_ne }}</td>
                        <td>{{ $service->fee ? 'Rs. ' . number_format($service->fee, 2) : '-' }}</td>
                        <td>{{ $service->processing_time ?? '-' }}</td>
                        <td>{{ $service->sort_order }}</td>
                        <td>
                            <span class="status-badge {{ $service->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $service->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="8" class="text-center">No services found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
