<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingsSeeder::class,
            AdminSeeder::class,
            BannerSeeder::class,
            NoticeSeeder::class,
            NewsSeeder::class,
            ServiceSeeder::class,
            DownloadSeeder::class,
            FaqSeeder::class,
            WaterStatusSeeder::class,
            WaterScheduleSeeder::class,
            WaterQualitySeeder::class,
            StatisticSeeder::class,
        ]);
    }
}
