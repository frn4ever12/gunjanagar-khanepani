<?php

namespace Database\Seeders;

use App\Models\WaterStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterStatusSeeder extends Seeder
{
    public function run(): void
    {
        WaterStatus::updateOrCreate(
            ['status' => 'normal'],
            [
                'status' => 'normal',
                'affected_area' => null,
                'expected_restoration' => null,
                'remarks_en' => 'Water supply is normal across all areas',
                'remarks_ne' => 'सबै क्षेत्रहरूमा पानी आपूर्ति सामान्य छ',
            ]
        );
    }
}
