<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaterSchedule;
use Illuminate\Http\Request;

class WaterScheduleController extends Controller
{
    public function index()
    {
        $schedules = WaterSchedule::orderBy('day')->orderBy('start_time')->get();
        return view('admin.water-schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.water-schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required|string|max:255',
            'ward' => 'nullable|string|max:100',
            'day' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'remarks_en' => 'nullable|string',
            'remarks_ne' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        WaterSchedule::create([
            'area' => $request->area,
            'ward' => $request->ward,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'remarks_en' => $request->remarks_en,
            'remarks_ne' => $request->remarks_ne,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.water-schedule.index')->with('success', 'Water schedule created successfully.');
    }

    public function edit(WaterSchedule $waterSchedule)
    {
        return view('admin.water-schedule.edit', compact('waterSchedule'));
    }

    public function update(Request $request, WaterSchedule $waterSchedule)
    {
        $request->validate([
            'area' => 'required|string|max:255',
            'ward' => 'nullable|string|max:100',
            'day' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'remarks_en' => 'nullable|string',
            'remarks_ne' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $waterSchedule->update([
            'area' => $request->area,
            'ward' => $request->ward,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'remarks_en' => $request->remarks_en,
            'remarks_ne' => $request->remarks_ne,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.water-schedule.index')->with('success', 'Water schedule updated successfully.');
    }

    public function destroy(WaterSchedule $waterSchedule)
    {
        $waterSchedule->delete();
        return redirect()->route('admin.water-schedule.index')->with('success', 'Water schedule deleted successfully.');
    }
}
