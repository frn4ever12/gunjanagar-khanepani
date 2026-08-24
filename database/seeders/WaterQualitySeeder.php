<?php

namespace Database\Seeders;

use App\Models\WaterQuality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterQualitySeeder extends Seeder
{
    public function run(): void
    {
        $qualities = [
            [
                'parameter' => 'pH Level',
                'standard' => '6.5 - 8.5',
                'result' => '7.2',
                'status' => 'compliant',
                'testing_date' => now()->format('Y-m-d'),
                'remarks_en' => 'Within acceptable range',
                'remarks_ne' => 'स्वीकार्य दायराभित्र',
            ],
            [
                'parameter' => 'Turbidity',
                'standard' => '< 5 NTU',
                'result' => '2.3 NTU',
                'status' => 'compliant',
                'testing_date' => now()->format('Y-m-d'),
                'remarks_en' => 'Clear water quality',
                'remarks_ne' => 'स्पष्ट पानीको गुणस्तर',
            ],
            [
                'parameter' => 'Total Dissolved Solids',
                'standard' => '< 1000 mg/L',
                'result' => '450 mg/L',
                'status' => 'compliant',
                'testing_date' => now()->format('Y-m-d'),
                'remarks_en' => 'Well within limits',
                'remarks_ne' => 'सीमाभित्र राम्रो',
            ],
            [
                'parameter' => 'Chlorine Residual',
                'standard' => '0.2 - 0.5 mg/L',
                'result' => '0.35 mg/L',
                'status' => 'compliant',
                'testing_date' => now()->format('Y-m-d'),
                'remarks_en' => 'Proper disinfection level',
                'remarks_ne' => 'उचित रोगनाशक स्तर',
            ],
            [
                'parameter' => 'E. coli',
                'standard' => '0 CFU/100mL',
                'result' => '0 CFU/100mL',
                'status' => 'compliant',
                'testing_date' => now()->format('Y-m-d'),
                'remarks_en' => 'No contamination detected',
                'remarks_ne' => 'कुनै पनि दूषण फेला परेन',
            ],
        ];

        foreach ($qualities as $quality) {
            WaterQuality::updateOrCreate(
                ['parameter' => $quality['parameter'], 'testing_date' => $quality['testing_date']],
                $quality
            );
        }
    }
}
