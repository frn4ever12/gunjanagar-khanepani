<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('publish_date', 'desc')->orderBy('id', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_ne' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'publish_date' => 'required|date',
            'featured' => 'nullable',
            'status' => 'required|in:active,inactive',
            'show_in_ticker' => 'nullable',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
        }

        News::create([
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'content_en' => $request->content_en,
            'content_ne' => $request->content_ne,
            'image' => $imagePath,
            'category' => $request->category,
            'publish_date' => $request->publish_date,
            'featured' => $request->has('featured') ? true : false,
            'status' => $request->status,
            'show_in_ticker' => $request->has('show_in_ticker') ? true : false,
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_ne' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'publish_date' => 'required|date',
            'featured' => 'nullable',
            'status' => 'required|in:active,inactive',
            'show_in_ticker' => 'nullable',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_ne' => $request->title_ne,
            'content_en' => $request->content_en,
            'content_ne' => $request->content_ne,
            'category' => $request->category,
            'publish_date' => $request->publish_date,
            'featured' => $request->has('featured') ? true : false,
            'status' => $request->status,
            'show_in_ticker' => $request->has('show_in_ticker') ? true : false,
            'display_order' => $request->display_order ?? 0,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
