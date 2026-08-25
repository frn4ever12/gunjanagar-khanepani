<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.about.index');
    }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about->title_en = $request->title_en;
        $about->title_ne = $request->title_ne;
        $about->description_en = $request->description_en;
        $about->description_ne = $request->description_ne;

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

    public function editOrganizationIntro()
    {
        $about = AboutUs::first();
        return view('admin.about.edit-organization-intro', compact('about'));
    }

    public function updateOrganizationIntro(Request $request)
    {
        $about = AboutUs::first() ?? new AboutUs();

        $request->validate([
            'organization_intro_en' => 'nullable|string',
            'organization_intro_ne' => 'nullable|string',
        ]);

        // Set default values for required fields if creating new record
        if (!$about->exists) {
            $about->title_en = 'About Us';
            $about->title_ne = 'हाम्रो बारेमा';
            $about->description_en = 'Description';
            $about->description_ne = 'विवरण';
        }

        $about->organization_intro_en = $request->organization_intro_en;
        $about->organization_intro_ne = $request->organization_intro_ne;
        $about->save();

        return redirect()->route('admin.about.edit-organization-intro')->with('success', __('messages.about_updated'));
    }

    public function editOurMission()
    {
        $about = AboutUs::first();
        return view('admin.about.edit-our-mission', compact('about'));
    }

    public function updateOurMission(Request $request)
    {
        $about = AboutUs::first() ?? new AboutUs();

        $request->validate([
            'mission_en' => 'nullable|string',
            'mission_ne' => 'nullable|string',
        ]);

        // Set default values for required fields if creating new record
        if (!$about->exists) {
            $about->title_en = 'About Us';
            $about->title_ne = 'हाम्रो बारेमा';
            $about->description_en = 'Description';
            $about->description_ne = 'विवरण';
        }

        $about->mission_en = $request->mission_en;
        $about->mission_ne = $request->mission_ne;
        $about->save();

        return redirect()->route('admin.about.edit-our-mission')->with('success', __('messages.about_updated'));
    }

    public function editOurVision()
    {
        $about = AboutUs::first();
        return view('admin.about.edit-our-vision', compact('about'));
    }

    public function updateOurVision(Request $request)
    {
        $about = AboutUs::first() ?? new AboutUs();

        $request->validate([
            'vision_en' => 'nullable|string',
            'vision_ne' => 'nullable|string',
        ]);

        // Set default values for required fields if creating new record
        if (!$about->exists) {
            $about->title_en = 'About Us';
            $about->title_ne = 'हाम्रो बारेमा';
            $about->description_en = 'Description';
            $about->description_ne = 'विवरण';
        }

        $about->vision_en = $request->vision_en;
        $about->vision_ne = $request->vision_ne;
        $about->save();

        return redirect()->route('admin.about.edit-our-vision')->with('success', __('messages.about_updated'));
    }

    public function editOrganizationStructure()
    {
        $about = AboutUs::first();
        return view('admin.about.edit-organization-structure', compact('about'));
    }

    public function updateOrganizationStructure(Request $request)
    {
        $about = AboutUs::first() ?? new AboutUs();

        $request->validate([
            'organization_structure_en' => 'nullable|string',
            'organization_structure_ne' => 'nullable|string',
        ]);

        // Set default values for required fields if creating new record
        if (!$about->exists) {
            $about->title_en = 'About Us';
            $about->title_ne = 'हाम्रो बारेमा';
            $about->description_en = 'Description';
            $about->description_ne = 'विवरण';
        }

        $about->organization_structure_en = $request->organization_structure_en;
        $about->organization_structure_ne = $request->organization_structure_ne;
        $about->save();

        return redirect()->route('admin.about.edit-organization-structure')->with('success', __('messages.about_updated'));
    }
}
