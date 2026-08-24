<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();
        $staff = User::whereIn('role', ['admin', 'staff'])->get();
        return view('admin.complaints.index', compact('complaints', 'staff'));
    }

    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,resolved,closed',
            'admin_remarks' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $complaint->update([
            'status' => $request->status,
            'admin_remarks' => $request->admin_remarks,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('admin.complaints.index')->with('success', 'Complaint status updated successfully.');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('admin.complaints.index')->with('success', 'Complaint deleted successfully.');
    }
}
