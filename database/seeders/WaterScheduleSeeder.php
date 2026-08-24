<?php

namespace Database\Seeders;

use App\Models\WaterSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            [
                'area' => 'Main Market Area',
                'ward' => 'Ward 1',
                'day' => 'Sunday',
                'start_time' => '06:00',
                'end_time' => '08:00',
                'remarks_en' => 'Morning supply for market area',
                'remarks_ne' => 'बजार क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Main Market Area',
                'ward' => 'Ward 1',
                'day' => 'Wednesday',
                'start_time' => '06:00',
                'end_time' => '08:00',
                'remarks_en' => 'Morning supply for market area',
                'remarks_ne' => 'बजार क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Residential Zone A',
                'ward' => 'Ward 2',
                'day' => 'Monday',
                'start_time' => '07:00',
                'end_time' => '09:00',
                'remarks_en' => 'Morning supply for residential area',
                'remarks_ne' => 'आवासीय क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Residential Zone A',
                'ward' => 'Ward 2',
                'day' => 'Thursday',
                'start_time' => '07:00',
                'end_time' => '09:00',
                'remarks_en' => 'Morning supply for residential area',
                'remarks_ne' => 'आवासीय क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Residential Zone B',
                'ward' => 'Ward 3',
                'day' => 'Tuesday',
                'start_time' => '06:30',
                'end_time' => '08:30',
                'remarks_en' => 'Morning supply for residential area',
                'remarks_ne' => 'आवासीय क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Residential Zone B',
                'ward' => 'Ward 3',
                'day' => 'Friday',
                'start_time' => '06:30',
                'end_time' => '08:30',
                'remarks_en' => 'Morning supply for residential area',
                'remarks_ne' => 'आवासीय क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Industrial Area',
                'ward' => 'Ward 4',
                'day' => 'Monday',
                'start_time' => '09:00',
                'end_time' => '11:00',
                'remarks_en' => 'Morning supply for industrial area',
                'remarks_ne' => 'औद्योगिक क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
            [
                'area' => 'Industrial Area',
                'ward' => 'Ward 4',
                'day' => 'Thursday',
                'start_time' => '09:00',
                'end_time' => '11:00',
                'remarks_en' => 'Morning supply for industrial area',
                'remarks_ne' => 'औद्योगिक क्षेत्रको लागि बिहानको आपूर्ति',
                'status' => 'active',
            ],
        ];

        foreach ($schedules as $schedule) {
            WaterSchedule::updateOrCreate(
                ['area' => $schedule['area'], 'day' => $schedule['day']],
                $schedule
            );
        }
    }
}
