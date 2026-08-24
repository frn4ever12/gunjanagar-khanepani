<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeStaff;
use Illuminate\Http\Request;

class OfficeStaffController extends Controller
{
    public function index()
    {
        $officeStaff = OfficeStaff::orderBy('display_order')->orderBy('id')->get();
        return view('admin.office-staff.index', compact('officeStaff'));
    }

    public function create()
    {
        return view('admin.office-staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('office-staff', $filename, 'public');
            $data['image'] = 'office-staff/' . $filename;
        }

        OfficeStaff::create($data);

        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff created successfully.');
    }

    public function edit(OfficeStaff $officeStaff)
    {
        return view('admin.office-staff.edit', compact('officeStaff'));
    }

    public function update(Request $request, OfficeStaff $officeStaff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($officeStaff->image && storage::disk('public')->exists($officeStaff->image)) {
                storage::disk('public')->delete($officeStaff->image);
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('office-staff', $filename, 'public');
            $data['image'] = 'office-staff/' . $filename;
        }

        $officeStaff->update($data);

        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff updated successfully.');
    }

    public function destroy(OfficeStaff $officeStaff)
    {
        // Delete image
        if ($officeStaff->image && storage::disk('public')->exists($officeStaff->image)) {
            storage::disk('public')->delete($officeStaff->image);
        }

        $officeStaff->delete();

        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff deleted successfully.');
    }

    public function toggleStatus(OfficeStaff $officeStaff)
    {
        $officeStaff->update([
            'status' => $officeStaff->status === 'active' ? 'inactive' : 'active'
        ]);

        return redirect()->route('admin.office-staff.index')
            ->with('success', 'Office staff status updated successfully.');
    }
}
