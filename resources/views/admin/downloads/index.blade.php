@extends('layouts.admin')

@section('title', 'Downloads')
@section('page-title', 'Downloads')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
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
                        <th>File Type</th>
                        <th>File Size</th>
                        <th>Publish Date</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($downloads as $download)
                    <tr>
                        <td>{{ $download->title_en }}</td>
                        <td>{{ $download->title_ne }}</td>
                        <td>{{ $download->category }}</td>
                        <td>{{ strtoupper($download->file_type) }}</td>
                        <td>{{ $download->file_size }}</td>
                        <td>{{ $download->publish_date->format('Y-m-d') }}</td>
                        <td>{{ $download->sort_order }}</td>
                        <td>
                            <span class="status-badge {{ $download->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $download->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ asset('storage/' . $download->file) }}" target="_blank" class="btn btn-sm btn-outline-success" title="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <a href="{{ route('admin.downloads.edit', $download) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.downloads.destroy', $download) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="9" class="text-center">No downloads found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
