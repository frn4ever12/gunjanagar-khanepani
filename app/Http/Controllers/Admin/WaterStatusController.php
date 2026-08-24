<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaterStatus;
use Illuminate\Http\Request;

class WaterStatusController extends Controller
{
    public function index()
    {
        $statuses = WaterStatus::latest()->get();
        return view('admin.water-status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.water-status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:normal,interrupted,maintenance',
            'affected_area' => 'nullable|string|max:255',
            'expected_restoration' => 'nullable|date',
            'remarks_en' => 'nullable|string',
            'remarks_ne' => 'nullable|string',
        ]);

        WaterStatus::create([
            'status' => $request->status,
            'affected_area' => $request->affected_area,
            'expected_restoration' => $request->expected_restoration,
            'remarks_en' => $request->remarks_en,
            'remarks_ne' => $request->remarks_ne,
        ]);

        return redirect()->route('admin.water-status.index')->with('success', 'Water status created successfully.');
    }

    public function edit(WaterStatus $waterStatus)
    {
        return view('admin.water-status.edit', compact('waterStatus'));
    }

    public function update(Request $request, WaterStatus $waterStatus)
    {
        $request->validate([
            'status' => 'required|in:normal,interrupted,maintenance',
            'affected_area' => 'nullable|string|max:255',
            'expected_restoration' => 'nullable|date',
            'remarks_en' => 'nullable|string',
            'remarks_ne' => 'nullable|string',
        ]);

        $waterStatus->update([
            'status' => $request->status,
            'affected_area' => $request->affected_area,
            'expected_restoration' => $request->expected_restoration,
            'remarks_en' => $request->remarks_en,
            'remarks_ne' => $request->remarks_ne,
        ]);

        return redirect()->route('admin.water-status.index')->with('success', 'Water status updated successfully.');
    }

    public function destroy(WaterStatus $waterStatus)
    {
        $waterStatus->delete();
        return redirect()->route('admin.water-status.index')->with('success', 'Water status deleted successfully.');
    }
}
