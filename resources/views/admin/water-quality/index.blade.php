@extends('layouts.admin')

@section('title', 'Water Quality')
@section('page-title', 'Water Quality')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.water-quality.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>{{ __('messages.create') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Standard</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Testing Date</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($qualities as $quality)
                    <tr>
                        <td>{{ $quality->parameter }}</td>
                        <td>{{ $quality->standard }}</td>
                        <td>{{ $quality->result }}</td>
                        <td>
                            <span class="status-badge {{ $quality->status === 'compliant' ? 'status-active' : ($quality->status === 'pending' ? 'status-pending' : 'status-inactive') }}">
                                {{ ucfirst(str_replace('_', ' ', $quality->status)) }}
                            </span>
                        </td>
                        <td>{{ $quality->testing_date->format('Y-m-d') }}</td>
                        <td>{{ Str::limit($quality->remarks, 80) }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.water-quality.edit', $quality) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.water-quality.destroy', $quality) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="7" class="text-center">No water quality records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
