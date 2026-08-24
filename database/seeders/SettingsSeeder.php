<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Organization
            ['key' => 'org_name_en', 'value' => 'Khane Pani Management System', 'type' => 'text', 'group' => 'organization'],
            ['key' => 'org_name_ne', 'value' => 'खानेपानी व्यवस्थापन प्रणाली', 'type' => 'text', 'group' => 'organization'],
            ['key' => 'tagline', 'value' => 'Safe Water, Healthy Community', 'type' => 'text', 'group' => 'organization'],
            ['key' => 'description_en', 'value' => 'Providing safe and clean drinking water to the community.', 'type' => 'textarea', 'group' => 'organization'],
            ['key' => 'description_ne', 'value' => 'समुदायलाई सुरक्षित र स्वच्छ खानेपानी प्रदान गर्दै।', 'type' => 'textarea', 'group' => 'organization'],
            
            // Contact
            ['key' => 'address', 'value' => 'Kathmandu, Nepal', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'phone', 'value' => '+977-1-XXXXXXXX', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'info@example.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'emergency_contact', 'value' => '+977-98XXXXXXXX', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'office_hours', 'value' => 'Sun-Fri: 10:00 AM - 5:00 PM', 'type' => 'text', 'group' => 'contact'],
            
            // Social
            ['key' => 'facebook', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'youtube', 'value' => '', 'type' => 'text', 'group' => 'social'],
            ['key' => 'twitter', 'value' => '', 'type' => 'text', 'group' => 'social'],
            
            // Website
            ['key' => 'logo', 'value' => '', 'type' => 'image', 'group' => 'website'],
            ['key' => 'favicon', 'value' => '', 'type' => 'image', 'group' => 'website'],
            ['key' => 'website_title', 'value' => 'Khane Pani Management System', 'type' => 'text', 'group' => 'website'],
            ['key' => 'meta_description', 'value' => 'Official website of Khane Pani Management System', 'type' => 'textarea', 'group' => 'website'],
            ['key' => 'footer_text', 'value' => 'Website Developed by DMC Group Nepal', 'type' => 'text', 'group' => 'website'],
            
            // Design
            ['key' => 'primary_color', 'value' => '#1e3a5f', 'type' => 'color', 'group' => 'design'],
            ['key' => 'secondary_color', 'value' => '#00a8cc', 'type' => 'color', 'group' => 'design'],
            ['key' => 'default_language', 'value' => 'en', 'type' => 'select', 'group' => 'design'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
