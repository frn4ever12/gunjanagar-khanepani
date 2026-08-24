@extends('layouts.admin')

@section('title', 'View Complaint')
@section('page-title', 'View Complaint - {{ $complaint->reference_number }}')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Complaint Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Reference Number:</strong> {{ $complaint->reference_number }}</p>
                <p><strong>Full Name:</strong> {{ $complaint->full_name }}</p>
                <p><strong>Mobile:</strong> {{ $complaint->mobile }}</p>
                <p><strong>Email:</strong> {{ $complaint->email ?? '-' }}</p>
                <p><strong>Ward:</strong> {{ $complaint->ward ?? '-' }}</p>
                <p><strong>Address:</strong> {{ $complaint->address ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Category:</strong> {{ $complaint->category }}</p>
                <p><strong>Subject:</strong> {{ $complaint->subject }}</p>
                <p><strong>Status:</strong>
                    <span class="status-badge status-{{ $complaint->status }}">
                        {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                    </span>
                </p>
                <p><strong>Assigned To:</strong> {{ $complaint->assignedUser ? $complaint->assignedUser->name : '-' }}</p>
                <p><strong>Submitted On:</strong> {{ $complaint->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>Description:</strong></p>
                <p>{{ $complaint->description }}</p>
            </div>
        </div>
        
        @if($complaint->attachment)
        <div class="row mt-3">
            <div class="col-md-12">
                <p><strong>Attachment:</strong></p>
                <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-download me-1"></i> Download Attachment
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Update Status</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.complaints.update-status', $complaint) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="pending" {{ $complaint->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $complaint->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="resolved" {{ $complaint->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="closed" {{ $complaint->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Assign To</label>
                        <select name="assigned_to" class="form-select">
                            <option value="">Unassigned</option>
                            @foreach($staff as $user)
                                <option value="{{ $user->id }}" {{ $complaint->assigned_to === $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->role }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label class="form-label">Admin Remarks</label>
                        <textarea name="admin_remarks" class="form-control" rows="4">{{ $complaint->admin_remarks }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.complaints.index') }}" class="btn btn-secondary">Back to List</a>
                <button type="submit" class="btn btn-primary">Update Status</button>
            </div>
        </form>
    </div>
</div>
@endsection
