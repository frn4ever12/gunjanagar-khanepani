<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\BoardMember;
use App\Models\Notice;
use App\Models\News;
use App\Models\OfficeStaff;
use App\Models\Service;
use App\Models\Download;
use App\Models\Faq;
use App\Models\WaterStatus;
use App\Models\WaterSchedule;
use App\Models\WaterQuality;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 'active')->orderBy('sort_order')->get();
        $notices = Notice::where('status', 'active')->where('featured', true)->latest()->take(3)->get();
        $news = News::where('status', 'active')->where('featured', true)->latest()->take(3)->get();
        $services = Service::where('status', 'active')->orderBy('sort_order')->take(4)->get();
        $statistics = Statistic::where('status', 'active')->orderBy('sort_order')->get();
        $waterStatus = WaterStatus::latest()->first();
        $boardMembers = BoardMember::active()->ordered()->take(3)->get();
        $about = AboutUs::first();
        
        // Fetch ticker items from both News and Notice
        $tickerNews = News::where('status', 'active')
            ->where('show_in_ticker', true)
            ->orderBy('display_order')
            ->orderBy('publish_date', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'news',
                    'route' => route('news.detail', $item->id),
                    'publish_date' => $item->publish_date,
                ];
            });
            
        $tickerNotices = Notice::where('status', 'active')
            ->where('show_in_ticker', true)
            ->where(function ($query) {
                $query->whereNull('expiry_date')->orWhere('expiry_date', '>=', now());
            })
            ->orderBy('display_order')
            ->orderBy('publish_date', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'notice',
                    'route' => route('notices.detail', $item->id),
                    'publish_date' => $item->publish_date,
                ];
            });
            
        $tickerItems = $tickerNews->concat($tickerNotices)->sortBy('display_order')->values();
        
        return view('home', compact('banners', 'notices', 'news', 'services', 'statistics', 'waterStatus', 'boardMembers', 'about', 'tickerItems'));
    }

    protected function getTickerItems()
    {
        $tickerNews = News::where('status', 'active')
            ->where('show_in_ticker', true)
            ->orderBy('display_order')
            ->orderBy('publish_date', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'news',
                    'route' => route('news.detail', $item->id),
                    'publish_date' => $item->publish_date,
                ];
            });
            
        $tickerNotices = Notice::where('status', 'active')
            ->where('show_in_ticker', true)
            ->where(function ($query) {
                $query->whereNull('expiry_date')->orWhere('expiry_date', '>=', now());
            })
            ->orderBy('display_order')
            ->orderBy('publish_date', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'type' => 'notice',
                    'route' => route('notices.detail', $item->id),
                    'publish_date' => $item->publish_date,
                ];
            });
            
        return $tickerNews->concat($tickerNotices)->sortBy('display_order')->values();
    }

    public function about()
    {
        $about = AboutUs::first();
        $tickerItems = $this->getTickerItems();
        return view('about', compact('about', 'tickerItems'));
    }

    public function boardMembers()
    {
        $boardMembers = BoardMember::active()->ordered()->get();
        $tickerItems = $this->getTickerItems();
        return view('board-members', compact('boardMembers', 'tickerItems'));
    }

    public function officeStaff()
    {
        $officeStaff = OfficeStaff::active()->ordered()->get();
        $tickerItems = $this->getTickerItems();
        return view('office-staff', compact('officeStaff', 'tickerItems'));
    }

    public function services()
    {
        $services = Service::where('status', 'active')->orderBy('sort_order')->get();
        $tickerItems = $this->getTickerItems();
        return view('services', compact('services', 'tickerItems'));
    }

    public function serviceDetail($id)
    {
        $service = Service::findOrFail($id);
        $tickerItems = $this->getTickerItems();
        return view('service-detail', compact('service', 'tickerItems'));
    }

    public function notices()
    {
        $notices = Notice::where('status', 'active')->latest()->paginate(10);
        $tickerItems = $this->getTickerItems();
        return view('notices', compact('notices', 'tickerItems'));
    }

    public function noticeDetail($id)
    {
        $notice = Notice::findOrFail($id);
        $tickerItems = $this->getTickerItems();
        return view('notice-detail', compact('notice', 'tickerItems'));
    }

    public function news()
    {
        $news = News::where('status', 'active')->latest()->paginate(10);
        $tickerItems = $this->getTickerItems();
        return view('news', compact('news', 'tickerItems'));
    }

    public function newsDetail($id)
    {
        $newsItem = News::findOrFail($id);
        $tickerItems = $this->getTickerItems();
        return view('news-detail', compact('newsItem', 'tickerItems'));
    }

    public function downloads()
    {
        $downloads = Download::where('status', 'active')->orderBy('sort_order')->get();
        $tickerItems = $this->getTickerItems();
        return view('downloads', compact('downloads', 'tickerItems'));
    }

    public function faqs()
    {
        $faqs = Faq::where('status', 'active')->orderBy('sort_order')->get();
        $tickerItems = $this->getTickerItems();
        return view('faqs', compact('faqs', 'tickerItems'));
    }

    public function waterStatus()
    {
        $waterStatus = WaterStatus::latest()->first();
        $tickerItems = $this->getTickerItems();
        return view('water-status', compact('waterStatus', 'tickerItems'));
    }

    public function waterSchedule()
    {
        $schedules = WaterSchedule::where('status', 'active')->orderBy('day')->orderBy('start_time')->get();
        $tickerItems = $this->getTickerItems();
        return view('water-schedule', compact('schedules', 'tickerItems'));
    }

    public function waterQuality()
    {
        $qualities = WaterQuality::latest()->get();
        $tickerItems = $this->getTickerItems();
        return view('water-quality', compact('qualities', 'tickerItems'));
    }

    public function billPayment()
    {
        $tickerItems = $this->getTickerItems();
        return view('bill-payment', compact('tickerItems'));
    }

    public function complaintForm()
    {
        $tickerItems = $this->getTickerItems();
        return view('complaint-form', compact('tickerItems'));
    }

    public function submitComplaint(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'ward' => 'nullable|string|max:100',
            'address' => 'required|string|max:500',
            'category' => 'required|string|max:100',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'attachment' => 'nullable|file|max:5120',
        ]);

        $complaint = \App\Models\Complaint::create([
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'ward' => $request->ward,
            'address' => $request->address,
            'category' => $request->category,
            'subject' => $request->subject,
            'description' => $request->description,
            'reference_number' => 'CMP-' . strtoupper(uniqid()),
            'status' => 'pending',
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('complaints', $filename, 'public');
            $complaint->attachment = 'complaints/' . $filename;
            $complaint->save();
        }

        return redirect()->back()->with('success', 'Your complaint has been submitted successfully. Reference: ' . $complaint->reference_number);
    }
}
