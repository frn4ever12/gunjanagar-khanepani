<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::orderBy('sort_order')->orderBy('publish_date', 'desc')->get();
        return view('admin.downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view('admin.downloads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'category' => 'required|string|max:100',
            'file' => 'required|file|mimes:pdf,doc,doc,xls,xlsx|max:10240',
            'file_type' => 'nullable|string|max:50',
            'file_size' => 'nullable|string|max:50',
            'publish_date' => 'required|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $filePath = $request->file('file')->store('downloads', 'public');
        
        $fileInfo = pathinfo($request->file('file')->getClientOriginalName());
        $fileSize = $request->file('file')->getSize();
        $fileSizeFormatted = $this->formatFileSize($fileSize);

        Download::create([
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'description_en' => $request->description_en,
            'description_ne' => $request->description_ne,
            'category' => $request->category,
            'file' => $filePath,
            'file_type' => $request->file_type ?? $request->file('file')->getClientOriginalExtension(),
            'file_size' => $request->file_size ?? $fileSizeFormatted,
            'publish_date' => $request->publish_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.downloads.index')->with('success', 'Download created successfully.');
    }

    public function edit(Download $download)
    {
        return view('admin.downloads.edit', compact('download'));
    }

    public function update(Request $request, Download $download)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'category' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,doc,xls,xlsx|max:10240',
            'file_type' => 'nullable|string|max:50',
            'file_size' => 'nullable|string|max:50',
            'publish_date' => 'required|date',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'description_en' => $request->description_en,
            'description_ne' => $request->description_ne,
            'category' => $request->category,
            'publish_date' => $request->publish_date,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ];

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('downloads', 'public');
            $data['file_type'] = $request->file_type ?? $request->file('file')->getClientOriginalExtension();
            $fileSize = $request->file('file')->getSize();
            $data['file_size'] = $request->file_size ?? $this->formatFileSize($fileSize);
        }

        $download->update($data);

        return redirect()->route('admin.downloads.index')->with('success', 'Download updated successfully.');
    }

    public function destroy(Download $download)
    {
        $download->delete();
        return redirect()->route('admin.downloads.index')->with('success', 'Download deleted successfully.');
    }

    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return '1 byte';
        } else {
            return '0 bytes';
        }
    }
}
