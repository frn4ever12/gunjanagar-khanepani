@extends('layouts.admin')

@section('title', 'Office Staff')
@section('page-title', 'Office Staff')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.office-staff.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-2"></i>{{ __('messages.create') }}
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($officeStaff as $staff)
                    <tr>
                        <td>
                            @if($staff->image)
                                <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                            @else
                                <div style="width: 50px; height: 50px; background: #e9ecef; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $staff->name }}</td>
                        <td>{{ $staff->designation }}</td>
                        <td>{{ $staff->department ?? '-' }}</td>
                        <td>{{ $staff->email ?? '-' }}</td>
                        <td>{{ $staff->phone ?? '-' }}</td>
                        <td>{{ $staff->display_order }}</td>
                        <td>
                            <span class="status-badge {{ $staff->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $staff->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.office-staff.edit', $staff) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.office-staff.toggle-status', $staff) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $staff->status === 'active' ? 'warning' : 'success' }}" title="{{ $staff->status === 'active' ? 'Deactivate' : 'Activate' }}">
                                        <i class="bi bi-{{ $staff->status === 'active' ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.office-staff.destroy', $staff) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff member?');" style="display: inline;">
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
                        <td colspan="9" class="text-center">No office staff found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
