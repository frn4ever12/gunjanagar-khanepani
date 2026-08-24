@extends('layouts.admin')

@section('title', 'Notices')
@section('page-title', 'Notices')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>{{ __('messages.create') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title (EN)</th>
                        <th>Title (NE)</th>
                        <th>Category</th>
                        <th>Publish Date</th>
                        <th>Expiry Date</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notices as $notice)
                    <tr>
                        <td>{{ $notice->title_en }}</td>
                        <td>{{ $notice->title_ne }}</td>
                        <td>{{ $notice->category }}</td>
                        <td>{{ $notice->publish_date->format('Y-m-d') }}</td>
                        <td>{{ $notice->expiry_date ? $notice->expiry_date->format('Y-m-d') : '-' }}</td>
                        <td>
                            @if($notice->featured)
                                <i class="bi bi-star-fill text-warning"></i>
                            @else
                                <i class="bi bi-star text-muted"></i>
                            @endif
                        </td>
                        <td>
                            <span class="status-badge {{ $notice->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $notice->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="8" class="text-center">No notices found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
