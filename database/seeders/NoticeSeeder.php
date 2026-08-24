<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    public function run(): void
    {
        $notices = [
            [
                'title_en' => 'Water Supply Schedule Update',
                'title_ne' => 'पानी आपूर्ति समयतालिका अपडेट',
                'description_en' => 'New water supply schedule for all wards effective from next week',
                'description_ne' => 'अगिल्लो हप्तादेखि सबै वडाहरूको लागि नयाँ पानी आपूर्ति समयतालिका',
                'category' => 'general',
                'publish_date' => now()->format('Y-m-d'),
                'expiry_date' => now()->addDays(30)->format('Y-m-d'),
                'attachment' => null,
                'featured' => true,
                'status' => 'active',
            ],
            [
                'title_en' => 'Maintenance Notice',
                'title_ne' => 'मर्मत सूचना',
                'description_en' => 'Scheduled maintenance on main pipeline this Sunday',
                'description_ne' => 'यो आइतबार मुख्य पाइपलाइनमा निर्धारित मर्मत',
                'category' => 'maintenance',
                'publish_date' => now()->format('Y-m-d'),
                'expiry_date' => now()->addDays(7)->format('Y-m-d'),
                'attachment' => null,
                'featured' => true,
                'status' => 'active',
            ],
            [
                'title_en' => 'Tariff Revision',
                'title_ne' => 'शुल्क संशोधन',
                'description_en' => 'New water tariff rates approved by the committee',
                'description_ne' => 'समितिद्वारा अनुमोदित नयाँ पानी शुल्क दर',
                'category' => 'tariff',
                'publish_date' => now()->subDays(5)->format('Y-m-d'),
                'expiry_date' => now()->addDays(60)->format('Y-m-d'),
                'attachment' => null,
                'featured' => false,
                'status' => 'active',
            ],
        ];

        foreach ($notices as $notice) {
            Notice::updateOrCreate(
                ['title_en' => $notice['title_en']],
                $notice
            );
        }
    }
}
