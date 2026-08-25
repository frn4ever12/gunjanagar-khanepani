<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $about = AboutUs::first();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutUs::first() ?? new AboutUs();

        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ne' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ne' => 'required|string',
            'history_en' => 'nullable|string',
            'history_ne' => 'nullable|string',
            'mission_en' => 'nullable|string',
            'mission_ne' => 'nullable|string',
            'vision_en' => 'nullable|string',
            'vision_ne' => 'nullable|string',
            'organization_intro_en' => 'nullable|string',
            'organization_intro_ne' => 'nullable|string',
            'organization_structure_en' => 'nullable|string',
            'organization_structure_ne' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about->title_en = $request->title_en;
        $about->title_ne = $request->title_ne;
        $about->description_en = $request->description_en;
        $about->description_ne = $request->description_ne;
        $about->history_en = $request->history_en;
        $about->history_ne = $request->history_ne;
        $about->mission_en = $request->mission_en;
        $about->mission_ne = $request->mission_ne;
        $about->vision_en = $request->vision_en;
        $about->vision_ne = $request->vision_ne;
        $about->organization_intro_en = $request->organization_intro_en;
        $about->organization_intro_ne = $request->organization_intro_ne;
        $about->organization_structure_en = $request->organization_structure_en;
        $about->organization_structure_ne = $request->organization_structure_ne;

        if ($request->hasFile('image')) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
            $image = $request->file('image');
            $imagePath = $image->store('about-us', 'public');
            $about->image = $imagePath;
        }

        $about->save();

        return redirect()->route('admin.about.edit')->with('success', __('messages.about_updated'));
    }
}
