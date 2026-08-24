<?php

namespace Database\Seeders;

use App\Models\Statistic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatisticSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            [
                'key' => 'total_consumers',
                'label_en' => 'Total Consumers',
                'label_ne' => 'कुल ग्राहकहरू',
                'value' => '1250',
                'unit' => 'households',
                'icon' => 'bi-people',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'key' => 'active_connections',
                'label_en' => 'Active Connections',
                'label_ne' => 'सक्रिय जडानहरू',
                'value' => '1180',
                'unit' => 'connections',
                'icon' => 'bi-droplet',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'key' => 'service_wards',
                'label_en' => 'Service Wards',
                'label_ne' => 'सेवा वडाहरू',
                'value' => '5',
                'unit' => 'wards',
                'icon' => 'bi-geo-alt',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'key' => 'daily_production',
                'label_en' => 'Daily Production',
                'label_ne' => 'दैनिक पानी उत्पादन',
                'value' => '500000',
                'unit' => 'liters',
                'icon' => 'bi-water',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'key' => 'staff_members',
                'label_en' => 'Staff Members',
                'label_ne' => 'कर्मचारीहरू',
                'value' => '25',
                'unit' => 'employees',
                'icon' => 'bi-person-badge',
                'sort_order' => 5,
                'status' => 'active',
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::updateOrCreate(
                ['key' => $statistic['key']],
                $statistic
            );
        }
    }
}
