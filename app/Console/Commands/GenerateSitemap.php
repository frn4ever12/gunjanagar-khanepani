<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Notice;
use App\Models\Service;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

#[Signature('app:generate-sitemap')]
#[Description('Generate XML sitemap for the website')]
class GenerateSitemap extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static pages
        $staticPages = [
            route('home') => '1.0',
            route('about') => '0.8',
            route('services') => '0.9',
            route('notices') => '0.8',
            route('news') => '0.8',
            route('downloads') => '0.7',
            route('faqs') => '0.6',
            route('water-status') => '0.5',
            route('water-schedule') => '0.5',
            route('water-quality') => '0.5',
            route('complaint.form') => '0.6',
        ];

        foreach ($staticPages as $url => $priority) {
            $sitemap .= $this->generateUrlEntry($url, $priority);
        }

        // Dynamic pages - News
        $newsItems = News::where('status', 'active')->get();
        foreach ($newsItems as $news) {
            $url = route('news.detail', $news->id);
            $sitemap .= $this->generateUrlEntry($url, '0.7', $news->updated_at);
        }

        // Dynamic pages - Notices
        $notices = Notice::where('status', 'active')->get();
        foreach ($notices as $notice) {
            $url = route('notices.detail', $notice->id);
            $sitemap .= $this->generateUrlEntry($url, '0.7', $notice->updated_at);
        }

        // Dynamic pages - Services
        $services = Service::where('status', 'active')->get();
        foreach ($services as $service) {
            $url = route('services.detail', $service->id);
            $sitemap .= $this->generateUrlEntry($url, '0.8', $service->updated_at);
        }

        $sitemap .= '</urlset>';

        // Save sitemap
        Storage::disk('public')->put('sitemap.xml', $sitemap);

        $this->info('Sitemap generated successfully!');
        $this->info('Location: ' . asset('storage/sitemap.xml'));
    }

    private function generateUrlEntry($url, $priority, $lastModified = null)
    {
        $lastMod = $lastModified ? $lastModified->toIso8601String() : now()->toIso8601String();
        return sprintf(
            '<url><loc>%s</loc><lastmod>%s</lastmod><priority>%s</priority></url>',
            $url,
            $lastMod,
            $priority
        );
    }
}
