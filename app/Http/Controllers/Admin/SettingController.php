<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'org_name_en' => 'required|string|max:255',
            'org_name_ne' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_ne' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'emergency' => 'nullable|string|max:50',
            'office_hours' => 'nullable|string|max:100',
            'facebook' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'footer_text' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:512',
            'nepal_flag' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $logoPath]);
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => $faviconPath]);
        }

        if ($request->hasFile('nepal_flag')) {
            $flagPath = $request->file('nepal_flag')->store('settings', 'public');
            Setting::updateOrCreate(['key' => 'nepal_flag'], ['value' => $flagPath]);
        }

        // Handle text fields
        $textFields = [
            'org_name_en', 'org_name_ne', 'tagline', 'description_en', 'description_ne',
            'address', 'phone', 'email', 'emergency', 'office_hours',
            'facebook', 'youtube', 'twitter', 'footer_text'
        ];

        foreach ($textFields as $field) {
            if (isset($validated[$field])) {
                Setting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $validated[$field]]
                );
            }
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
