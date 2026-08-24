<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'required_documents_en' => 'nullable|string',
            'required_documents_ne' => 'nullable|string',
            'process_en' => 'nullable|string',
            'process_ne' => 'nullable|string',
            'fee' => 'nullable|numeric',
            'processing_time' => 'nullable|string|max:100',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('services', 'public');
        }

        Service::create([
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'description_en' => $request->description_en,
            'description_ne' => $request->description_ne,
            'icon' => $request->icon,
            'image' => $imagePath,
            'required_documents_en' => $request->required_documents_en,
            'required_documents_ne' => $request->required_documents_ne,
            'process_en' => $request->process_en,
            'process_ne' => $request->process_ne,
            'fee' => $request->fee,
            'processing_time' => $request->processing_time,
            'attachment' => $attachmentPath,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'required_documents_en' => 'nullable|string',
            'required_documents_ne' => 'nullable|string',
            'process_en' => 'nullable|string',
            'process_ne' => 'nullable|string',
            'fee' => 'nullable|numeric',
            'processing_time' => 'nullable|string|max:100',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'description_en' => $request->description_en,
            'description_ne' => $request->description_ne,
            'icon' => $request->icon,
            'required_documents_en' => $request->required_documents_en,
            'required_documents_ne' => $request->required_documents_ne,
            'process_en' => $request->process_en,
            'process_ne' => $request->process_ne,
            'fee' => $request->fee,
            'processing_time' => $request->processing_time,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
