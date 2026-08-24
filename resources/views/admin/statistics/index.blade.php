@extends('layouts.admin')

@section('title', 'Statistics')
@section('page-title', 'Statistics')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary">
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
                        <th>Label (EN)</th>
                        <th>Label (NE)</th>
                        <th>Key</th>
                        <th>Value</th>
                        <th>Unit</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statistics as $statistic)
                    <tr>
                        <td>
                            @if($statistic->icon)
                                <i class="bi {{ $statistic->icon }} fs-4"></i>
                            @else
                                <i class="bi bi-bar-chart fs-4 text-muted"></i>
                            @endif
                        </td>
                        <td>{{ $statistic->label_en }}</td>
                        <td>{{ $statistic->label_ne }}</td>
                        <td><code>{{ $statistic->key }}</code></td>
                        <td>{{ $statistic->value }}</td>
                        <td>{{ $statistic->unit ?? '-' }}</td>
                        <td>{{ $statistic->sort_order }}</td>
                        <td>
                            <span class="status-badge {{ $statistic->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $statistic->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.statistics.edit', $statistic) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="9" class="text-center">No statistics found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
