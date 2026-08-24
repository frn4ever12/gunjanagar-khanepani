@extends('layouts.admin')

@section('title', 'Complaints')
@section('page-title', 'Complaints')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Reference</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Category</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                    <tr>
                        <td><strong>{{ $complaint->reference_number }}</strong></td>
                        <td>{{ $complaint->full_name }}</td>
                        <td>{{ $complaint->mobile }}</td>
                        <td>{{ $complaint->category }}</td>
                        <td>{{ Str::limit($complaint->subject, 50) }}</td>
                        <td>
                            <span class="status-badge status-{{ $complaint->status }}">
                                {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                            </span>
                        </td>
                        <td>{{ $complaint->assignedUser ? $complaint->assignedUser->name : '-' }}</td>
                        <td>{{ $complaint->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.complaints.show', $complaint) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('admin.complaints.destroy', $complaint) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        <td colspan="9" class="text-center">No complaints found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
