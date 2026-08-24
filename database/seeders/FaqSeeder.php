<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question_en' => 'How do I apply for a new water connection?',
                'question_ne' => 'म नयाँ पानी जडानको लागि कसरी आवेदन गर्न सक्छु?',
                'answer_en' => 'You can apply for a new water connection by visiting our office or downloading the application form from our website. Submit the completed form along with required documents including citizenship ID, property ownership document, and ward recommendation.',
                'answer_ne' => 'तपाईं हाम्रो कार्यालयमा भ्रमण गरेर वा हाम्रो वेबसाइटबाट आवेदन फारम डाउनलोड गरेर नयाँ पानी जडानको लागि आवेदन गर्न सक्नुहुन्छ। नागरिकता प्रमाण, सम्पत्ति स्वामित्व कागजात, र वडा सिफारिस सहित आवश्यक कागजातहरूसहित पूरा फारम बुझाउनुहोस्।',
                'category' => 'connection',
                'sort_order' => 1,
                'status' => 'active',
            ],
            [
                'question_en' => 'What are the current water tariff rates?',
                'question_ne' => 'हालको पानी शुल्क दरहरू के हुन्?',
                'answer_en' => 'Current water tariff rates are available on our website under the Downloads section. Rates vary based on consumer category (residential, commercial, industrial) and consumption levels. You can also visit our office for detailed tariff information.',
                'answer_ne' => 'हालको पानी शुल्क दरहरू हाम्रो वेबसाइटको डाउनलोड खण्डमा उपलब्ध छ। दरहरू ग्राहक श्रेणी (आवासीय, व्यावसायिक, औद्योगिक) र खपत स्तरको आधारमा फरक हुन्छन्। विस्तृत शुल्क जानकारीको लागि तपाईं हाम्रो कार्यालय पनि जान सक्नुहुन्छ।',
                'category' => 'tariff',
                'sort_order' => 2,
                'status' => 'active',
            ],
            [
                'question_en' => 'How can I report a water supply issue?',
                'question_ne' => 'म पानी आपूर्ति समस्या कसरी रिपोर्ट गर्न सक्छु?',
                'answer_en' => 'You can report water supply issues through our complaint form available on the website, by calling our helpline, or visiting our office. Please provide details like your address, ward number, and description of the issue for faster resolution.',
                'answer_ne' => 'तपाईं वेबसाइटमा उपलब्ध हाम्रो गुनासो फारम मार्फत, हाम्रो हेल्पलाइन कल गरेर, वा हाम्रो कार्यालयमा भ्रमण गरेर पानी आपूर्ति समस्याहरू रिपोर्ट गर्न सक्नुहुन्छ। छिटो समाधानको लागि कृपया तपाईंको ठेगाना, वडा नम्बर, र समस्याको विवरण जस्तो विवरण प्रदान गर्नुहोस्।',
                'category' => 'complaints',
                'sort_order' => 3,
                'status' => 'active',
            ],
            [
                'question_en' => 'What should I do if my water meter is not working?',
                'question_ne' => 'मेरो पानी मिटर काम नगरेमा म के गर्नुपर्छ?',
                'answer_en' => 'If your water meter is not working properly, please report it to our office immediately. We will send a technician to inspect and replace the meter if necessary. This ensures accurate billing and prevents any billing disputes.',
                'answer_ne' => 'यदि तपाईंको पानी मिटर ठिकसँग काम गर्दैन भने, कृपया तुरुन्तै हाम्रो कार्यालयमा रिपोर्ट गर्नुहोस्। हामी मिटरको निरीक्षण गर्न र आवश्यक भएमा प्रतिस्थापन गर्न एक तकनीशियन पठाउनेछौं। यसले सही बिलिंग सुनिश्चित गर्छ र कुनै पनि बिलिंग विवाद रोक्छ।',
                'category' => 'meter',
                'sort_order' => 4,
                'status' => 'active',
            ],
            [
                'question_en' => 'How often is water quality tested?',
                'question_ne' => 'पानीको गुणस्तर कति पटक परीक्षण गरिन्छ?',
                'answer_en' => 'Water quality is tested regularly according to government standards. We conduct daily basic tests and comprehensive monthly testing at our treatment plants. Test results are published on our website and available at our office.',
                'answer_ne' => 'पानीको गुणस्तर सरकारी मानक अनुसार नियमित रूपमा परीक्षण गरिन्छ। हामी हाम्रो उपचार संयन्त्रहरूमा दैनिक आधारभूत परीक्षण र विस्तृत मासिक परीक्षण गर्छौं। परीक्षण परिणामहरू हाम्रो वेबसाइटमा प्रकाशित हुन्छन् र हाम्रो कार्यालयमा उपलब्ध छन्।',
                'category' => 'quality',
                'sort_order' => 5,
                'status' => 'active',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question_en' => $faq['question_en']],
                $faq
            );
        }
    }
}
