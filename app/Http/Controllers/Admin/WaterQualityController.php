<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WaterQuality;
use Illuminate\Http\Request;

class WaterQualityController extends Controller
{
    public function index()
    {
        $qualities = WaterQuality::orderBy('testing_date', 'desc')->get();
        return view('admin.water-quality.index', compact('qualities'));
    }

    public function create()
    {
        return view('admin.water-quality.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'parameter' => 'required|string|max:255',
            'standard' => 'required|string|max:255',
            'result' => 'required|string|max:255',
            'status' => 'required|in:compliant,non_compliant,pending',
            'testing_date' => 'required|date',
            'remarks_en' => 'nullable|string',
            'remarks_ne' => 'nullable|string',
        ]);

        WaterQuality::create([
            'parameter' => $request->parameter,
            'standard' => $request->standard,
            'result' => $request->result,
            'status' => $request->status,
            'testing_date' => $request->testing_date,
            'remarks_en' => $request->remarks_en,
            'remarks_ne' => $request->remarks_ne,
        ]);

        return redirect()->route('admin.water-quality.index')->with('success', 'Water quality record created successfully.');
    }

    public function edit(WaterQuality $waterQuality)
    {
        return view('admin.water-quality.edit', compact('waterQuality'));
    }

    public function update(Request $request, WaterQuality $waterQuality)
    {
        $request->validate([
            'parameter' => 'required|string|max:255',
            'standard' => 'required|string|max:255',
            'result' => 'required|string|max:255',
            'status' => 'required|in:compliant,non_compliant,pending',
            'testing_date' => 'required|date',
            'remarks_en' => 'nullable|string',
            'remarks_ne' => 'nullable|string',
        ]);

        $waterQuality->update([
            'parameter' => $request->parameter,
            'standard' => $request->standard,
            'result' => $request->result,
            'status' => $request->status,
            'testing_date' => $request->testing_date,
            'remarks_en' => $request->remarks_en,
            'remarks_ne' => $request->remarks_ne,
        ]);

        return redirect()->route('admin.water-quality.index')->with('success', 'Water quality record updated successfully.');
    }

    public function destroy(WaterQuality $waterQuality)
    {
        $waterQuality->delete();
        return redirect()->route('admin.water-quality.index')->with('success', 'Water quality record deleted successfully.');
    }
}
