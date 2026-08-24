<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'title_en' => 'Welcome to Gunjanagar Khanepani',
                'title_ne' => 'गुञ्जनगर खानेपानीमा स्वागत छ',
                'description_en' => 'Providing clean and safe drinking water to our community',
                'description_ne' => 'हाम्रो समुदायलाई सफा र सुरक्षित खानेपानी प्रदान गर्दै',
                'image' => null,
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title_en' => 'Water Conservation',
                'title_ne' => 'पानी संरक्षण',
                'description_en' => 'Save water, save life. Every drop counts.',
                'description_ne' => 'पानी बचाउनुहोस्, जीवन बचाउनुहोस्। हरेक थोपा महत्त्वपूर्ण छ।',
                'image' => null,
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title_en' => 'New Connection Available',
                'title_ne' => 'नयाँ जडान उपलब्ध छ',
                'description_en' => 'Apply for new water connection today',
                'description_ne' => 'आजै नयाँ पानी जडानको लागि आवेदन दिनुहोस्',
                'image' => null,
                'sort_order' => 3,
                'status' => 'active',
            ],
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                ['title_en' => $banner['title_en']],
                $banner
            );
        }
    }
}
