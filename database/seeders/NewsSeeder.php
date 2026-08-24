<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title_en' => 'New Water Treatment Plant Inaugurated',
                'title_ne' => 'नयाँ पानी उपचार संयन्त्रको उद्घाटन',
                'content_en' => 'The new water treatment plant was inaugurated today by the mayor. This plant will provide clean drinking water to over 10,000 households in the area. The plant uses advanced filtration technology to ensure water quality standards.',
                'content_ne' => 'आज नयाँ पानी उपचार संयन्त्रको उद्घाटन मेयरद्वारा गरियो। यो संयन्त्रले क्षेत्रका १०,००० भन्दा बढी घरपरिवारलाई सफा खानेपानी प्रदान गर्नेछ। पानीको गुणस्तर सुनिश्चित गर्न यो संयन्त्रले उन्नत फिल्टरेसन प्रविधि प्रयोग गर्दछ।',
                'image' => null,
                'category' => 'infrastructure',
                'publish_date' => now()->format('Y-m-d'),
                'featured' => true,
                'status' => 'active',
            ],
            [
                'title_en' => 'Community Water Conservation Program',
                'title_ne' => 'समुदाय पानी संरक्षण कार्यक्रम',
                'content_en' => 'We are launching a community water conservation program to raise awareness about water saving practices. The program includes workshops, distribution of water-saving devices, and educational campaigns in schools.',
                'content_ne' => 'हामी पानी बचत अभ्यासहरूको बारेमा जागरूकता बढाउन समुदाय पानी संरक्षण कार्यक्रम सुरु गर्दैछौं। कार्यक्रममा कार्यशाला, पानी बचत उपकरणहरूको वितरण र विद्यालयहरूमा शैक्षिक अभियान समावेश छ।',
                'image' => null,
                'category' => 'community',
                'publish_date' => now()->subDays(3)->format('Y-m-d'),
                'featured' => true,
                'status' => 'active',
            ],
            [
                'title_en' => 'Pipeline Maintenance Completed',
                'title_ne' => 'पाइपलाइन मर्मत सम्पन्न',
                'content_en' => 'The annual pipeline maintenance work has been completed successfully. All major pipelines have been inspected and repaired where necessary. Water supply will resume normal schedule from tomorrow.',
                'content_ne' => 'वार्षिक पाइपलाइन मर्मत कार्य सफलतापूर्वक सम्पन्न भयो। सबै मुख्य पाइपलाइनहरूको निरीक्षण गरिएको छ र आवश्यकता अनुसार मर्मत गरिएको छ। भोलिदेखि पानी आपूर्ति सामान्य समयतालिका अनुसार सुरु हुनेछ।',
                'image' => null,
                'category' => 'maintenance',
                'publish_date' => now()->subDays(7)->format('Y-m-d'),
                'featured' => false,
                'status' => 'active',
            ],
        ];

        foreach ($news as $item) {
            News::updateOrCreate(
                ['title_en' => $item['title_en']],
                $item
            );
        }
    }
}
