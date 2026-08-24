<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title_en' => 'New Water Connection',
                'title_ne' => 'नयाँ पानी जडान',
                'description_en' => 'Apply for a new water connection for your home or business',
                'description_ne' => 'तपाईंको घर वा व्यवसायको लागि नयाँ पानी जडानको लागि आवेदन दिनुहोस्',
                'icon' => 'bi-droplet',
                'image' => null,
                'required_documents_en' => "Citizenship ID\nProperty Ownership Document\nWard Recommendation\nRecent Photo",
                'required_documents_ne' => "नागरिकता प्रमाण\nसम्पत्ति स्वामित्व कागजात\nवडा सिफारिस\nहालको फोटो",
                'process_en' => "1. Submit application form\n2. Pay connection fee\n3. Site inspection\n4. Pipeline installation\n5. Connection activation",
                'process_ne' => "१. आवेदन फारम बुझाउनुहोस्\n२. जडान शुल्क तिर्नुहोस्\n३. साइट निरीक्षण\n४. पाइपलाइन स्थापना\n५. जडान सक्रियता",
                'fee' => 5000.00,
                'processing_time' => '7-10 days',
                'attachment' => null,
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'title_en' => 'Water Meter Installation',
                'title_ne' => 'पानी मिटर स्थापना',
                'description_en' => 'Install or replace water meters for accurate billing',
                'description_ne' => 'सही बिलिंगको लागि पानी मिटर स्थापना वा प्रतिस्थापन',
                'icon' => 'bi-speedometer2',
                'image' => null,
                'required_documents_en' => "Application Form\nOld Meter Reading (if replacing)\nID Proof",
                'required_documents_ne' => "आवेदन फारम\nपुरानो मिटर रिडिङ (प्रतिस्थापन गर्दा)\nपरिचय प्रमाण",
                'process_en' => "1. Submit request\n2. Meter inspection\n3. Installation\n4. Testing\n5. Activation",
                'process_ne' => "१. अनुरोध बुझाउनुहोस्\n२. मिटर निरीक्षण\n३. स्थापना\n४. परीक्षण\n५. सक्रियता",
                'fee' => 1500.00,
                'processing_time' => '3-5 days',
                'attachment' => null,
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'title_en' => 'Water Quality Testing',
                'title_ne' => 'पानीको गुणस्तर परीक्षण',
                'description_en' => 'Get your water quality tested for safety and compliance',
                'description_ne' => 'सुरक्षा र अनुपालनको लागि तपाईंको पानीको गुणस्तर परीक्षण गर्नुहोस्',
                'icon' => 'bi-flask',
                'image' => null,
                'required_documents_en' => "Water Sample\nApplication Form\nContact Information",
                'required_documents_ne' => "पानीको नमूना\nआवेदन फारम\nसम्पर्क जानकारी",
                'process_en' => "1. Collect sample\n2. Submit to lab\n3. Testing\n4. Report generation\n5. Result delivery",
                'process_ne' => "१. नमूना संकलन\n२. प्रयोगशालामा बुझाउनुहोस्\n३. परीक्षण\n४. प्रतिवेदन तयारी\n५. परिणाम वितरण",
                'fee' => 500.00,
                'processing_time' => '2-3 days',
                'attachment' => null,
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'title_en' => 'Pipeline Repair',
                'title_ne' => 'पाइपलाइन मर्मत',
                'description_en' => 'Report and get pipeline issues repaired quickly',
                'description_ne' => 'पाइपलाइन समस्याहरू रिपोर्ट गर्नुहोस् र छिटो मर्मत गर्नुहोस्',
                'icon' => 'bi-tools',
                'image' => null,
                'required_documents_en' => "Complaint Form\nLocation Details\nContact Information",
                'required_documents_ne' => "गुनासो फारम\nस्थानको विवरण\nसम्पर्क जानकारी",
                'process_en' => "1. File complaint\n2. Inspection\n3. Repair work\n4. Testing\n5. Completion",
                'process_ne' => "१. गुनासो दायर गर्नुहोस्\n२. निरीक्षण\n३. मर्मत कार्य\n४. परीक्षण\n५. सम्पन्न",
                'fee' => null,
                'processing_time' => 'Based on issue',
                'attachment' => null,
                'sort_order' => 4,
                'status' => 'active',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title_en' => $service['title_en']],
                $service
            );
        }
    }
}
