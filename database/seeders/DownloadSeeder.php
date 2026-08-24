<?php

namespace Database\Seeders;

use App\Models\Download;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DownloadSeeder extends Seeder
{
    public function run(): void
    {
        $downloads = [
            [
                'title_en' => 'New Connection Application Form',
                'title_ne' => 'नयाँ जडान आवेदन फारम',
                'description_en' => 'Download the application form for new water connection',
                'description_ne' => 'नयाँ पानी जडानको लागि आवेदन फारम डाउनलोड गर्नुहोस्',
                'category' => 'forms',
                'file' => null,
                'file_type' => 'pdf',
                'file_size' => '250 KB',
                'publish_date' => now()->format('Y-m-d'),
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title_en' => 'Water Tariff Schedule',
                'title_ne' => 'पानी शुल्क समयतालिका',
                'description_en' => 'Current water tariff rates for all consumer categories',
                'description_ne' => 'सबै ग्राहक श्रेणीहरूको लागि हालको पानी शुल्क दर',
                'category' => 'tariff',
                'file' => null,
                'file_type' => 'pdf',
                'file_size' => '180 KB',
                'publish_date' => now()->format('Y-m-d'),
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title_en' => 'Consumer Rights and Responsibilities',
                'title_ne' => 'ग्राहक अधिकार र जिम्मेवारीहरू',
                'description_en' => 'Information about consumer rights and responsibilities',
                'description_ne' => 'ग्राहक अधिकार र जिम्मेवारीहरूको बारेमा जानकारी',
                'category' => 'information',
                'file' => null,
                'file_type' => 'pdf',
                'file_size' => '320 KB',
                'publish_date' => now()->subDays(5)->format('Y-m-d'),
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'title_en' => 'Water Supply Guidelines',
                'title_ne' => 'पानी आपूर्ति दिशानिर्देशिका',
                'description_en' => 'Guidelines for water supply usage and conservation',
                'description_ne' => 'पानी आपूर्ति प्रयोग र संरक्षणको लागि दिशानिर्देशिका',
                'category' => 'guidelines',
                'file' => null,
                'file_type' => 'pdf',
                'file_size' => '450 KB',
                'publish_date' => now()->subDays(10)->format('Y-m-d'),
                'sort_order' => 4,
                'status' => 'active',
            ],
        ];

        foreach ($downloads as $download) {
            Download::updateOrCreate(
                ['title_en' => $download['title_en']],
                $download
            );
        }
    }
}
