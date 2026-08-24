@extends('layouts.admin')

@section('title', 'Board Members')
@section('page-title', 'Board Members')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div></div>
    <a href="{{ route('admin.board-members.create') }}" class="btn btn-primary">
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
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($boardMembers as $member)
                    <tr>
                        <td>
                            @if($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                            @else
                                <div style="width: 50px; height: 50px; background: #e9ecef; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->designation }}</td>
                        <td>{{ $member->email ?? '-' }}</td>
                        <td>{{ $member->phone ?? '-' }}</td>
                        <td>{{ $member->display_order }}</td>
                        <td>
                            <span class="status-badge {{ $member->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                {{ $member->status }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.board-members.edit', $member) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.board-members.toggle-status', $member) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $member->status === 'active' ? 'warning' : 'success' }}" title="{{ $member->status === 'active' ? 'Deactivate' : 'Activate' }}">
                                        <i class="bi bi-{{ $member->status === 'active' ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.board-members.destroy', $member) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this board member?');" style="display: inline;">
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
                        <td colspan="8" class="text-center">No board members found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
