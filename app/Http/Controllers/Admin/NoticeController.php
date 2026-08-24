<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::orderBy('publish_date', 'desc')->orderBy('id', 'desc')->get();
        return view('admin.notices.index', compact('notices'));
    }

    public function create()
    {
        return view('admin.notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'category' => 'required|string|max:100',
            'publish_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'featured' => 'nullable',
            'status' => 'required|in:active,inactive',
            'show_in_ticker' => 'nullable',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('notices', 'public');
        }

        Notice::create([
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'description_en' => $request->description_en,
            'description_ne' => $request->description_ne,
            'category' => $request->category,
            'publish_date' => $request->publish_date,
            'expiry_date' => $request->expiry_date,
            'attachment' => $attachmentPath,
            'featured' => $request->has('featured') ? true : false,
            'status' => $request->status,
            'show_in_ticker' => $request->has('show_in_ticker') ? true : false,
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'category' => 'required|string|max:100',
            'publish_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'featured' => 'nullable',
            'status' => 'required|in:active,inactive',
            'show_in_ticker' => 'nullable',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'description_en' => $request->description_en,
            'description_ne' => $request->description_ne,
            'category' => $request->category,
            'publish_date' => $request->publish_date,
            'expiry_date' => $request->expiry_date,
            'featured' => $request->has('featured') ? true : false,
            'status' => $request->status,
            'show_in_ticker' => $request->has('show_in_ticker') ? true : false,
            'display_order' => $request->display_order ?? 0,
        ];

        if ($request->hasFile('attachment')) {
            $data['attachment'] = $request->file('attachment')->store('notices', 'public');
        }

        $notice->update($data);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}
