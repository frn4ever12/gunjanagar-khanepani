<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Complaint;
use App\Models\Download;
use App\Models\Faq;
use App\Models\News;
use App\Models\Notice;
use App\Models\Service;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_notices' => Notice::count(),
            'total_news' => News::count(),
            'total_complaints' => Complaint::count(),
            'pending_complaints' => Complaint::where('status', 'submitted')->count(),
            'total_services' => Service::count(),
            'total_downloads' => Download::count(),
            'total_faqs' => Faq::count(),
            'total_banners' => Banner::count(),
            'total_users' => User::count(),
        ];

        $recentComplaints = Complaint::latest()->take(5)->get();
        $recentNotices = Notice::latest()->take(5)->get();
        $waterStatus = \App\Models\WaterStatus::latest()->first();

        return view('admin.dashboard', compact('stats', 'recentComplaints', 'recentNotices', 'waterStatus'));
    }
}
