<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_en' => 'required|string|max:255',
            'question_ne' => 'required|string|max:255',
            'answer_en' => 'required|string',
            'answer_ne' => 'required|string',
            'category' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        Faq::create([
            'question_en' => $request->question_en,
            'question_ne' => $request->question_ne,
            'answer_en' => $request->answer_en,
            'answer_ne' => $request->answer_ne,
            'category' => $request->category,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question_en' => 'required|string|max:255',
            'question_ne' => 'required|string|max:255',
            'answer_en' => 'required|string',
            'answer_ne' => 'required|string',
            'category' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $faq->update([
            'question_en' => $request->question_en,
            'question_ne' => $request->question_ne,
            'answer_en' => $request->answer_en,
            'answer_ne' => $request->answer_ne,
            'category' => $request->category,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
