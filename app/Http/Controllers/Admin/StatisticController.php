<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('sort_order')->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.statistics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|max:100|unique:statistics,key',
            'label_en' => 'required|string|max:255',
            'label_ne' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        Statistic::create([
            'key' => $request->key,
            'label_en' => $request->label_en,
            'label_ne' => $request->label_ne,
            'value' => $request->value,
            'unit' => $request->unit,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistic created successfully.');
    }

    public function edit(Statistic $statistic)
    {
        return view('admin.statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'key' => 'required|string|max:100|unique:statistics,key,' . $statistic->id,
            'label_en' => 'required|string|max:255',
            'label_ne' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:50',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $statistic->update([
            'key' => $request->key,
            'label_en' => $request->label_en,
            'label_ne' => $request->label_ne,
            'value' => $request->value,
            'unit' => $request->unit,
            'icon' => $request->icon,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.statistics.index')->with('success', 'Statistic updated successfully.');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('admin.statistics.index')->with('success', 'Statistic deleted successfully.');
    }
}
