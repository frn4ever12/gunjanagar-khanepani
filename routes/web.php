<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BoardMemberController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\OfficeStaffController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\WaterQualityController;
use App\Http\Controllers\Admin\WaterScheduleController;
use App\Http\Controllers\Admin\WaterStatusController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Language Switcher
Route::post('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ne'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('language.switch');

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/about/our-mission', [HomeController::class, 'ourMission'])->name('our-mission');
Route::get('/about/our-vision', [HomeController::class, 'ourVision'])->name('our-vision');
Route::get('/about/organization-structure', [HomeController::class, 'organizationStructure'])->name('organization-structure');
Route::get('/about/board-members', [HomeController::class, 'boardMembers'])->name('board-members');
Route::get('/about/office-staff', [HomeController::class, 'officeStaff'])->name('office-staff');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{id}', [HomeController::class, 'serviceDetail'])->name('services.detail');
Route::get('/notices', [HomeController::class, 'notices'])->name('notices');
Route::get('/notices/{id}', [HomeController::class, 'noticeDetail'])->name('notices.detail');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{id}', [HomeController::class, 'newsDetail'])->name('news.detail');
Route::get('/downloads', [HomeController::class, 'downloads'])->name('downloads');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs');
Route::get('/water-status', [HomeController::class, 'waterStatus'])->name('water-status');
Route::get('/water-schedule', [HomeController::class, 'waterSchedule'])->name('water-schedule');
Route::get('/water-quality', [HomeController::class, 'waterQuality'])->name('water-quality');
Route::get('/bill-payment', [HomeController::class, 'billPayment'])->name('bill-payment');
Route::get('/complaint', [HomeController::class, 'complaintForm'])->name('complaint.form');
Route::post('/complaint', [HomeController::class, 'submitComplaint'])->name('complaint.submit');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $credentials = $request->only('email', 'password');
    
    if (auth()->attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        
        if (auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin' || auth()->user()->role === 'staff') {
            return redirect()->intended(route('admin.dashboard'));
        }
        
        auth()->logout();
        return back()->withErrors([
            'email' => 'You do not have permission to access the admin panel.',
        ]);
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');

Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

// Admin Routes (Protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Banner Routes
    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/', [BannerController::class, 'store'])->name('store');
        Route::get('/{banner}/edit', [BannerController::class, 'edit'])->name('edit');
        Route::put('/{banner}', [BannerController::class, 'update'])->name('update');
        Route::delete('/{banner}', [BannerController::class, 'destroy'])->name('destroy');
    });
    
    // Notice Routes
    Route::prefix('notices')->name('notices.')->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('index');
        Route::get('/create', [NoticeController::class, 'create'])->name('create');
        Route::post('/', [NoticeController::class, 'store'])->name('store');
        Route::get('/{notice}/edit', [NoticeController::class, 'edit'])->name('edit');
        Route::put('/{notice}', [NoticeController::class, 'update'])->name('update');
        Route::delete('/{notice}', [NoticeController::class, 'destroy'])->name('destroy');
    });
    
    // News Routes
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/', [NewsController::class, 'store'])->name('store');
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit');
        Route::put('/{news}', [NewsController::class, 'update'])->name('update');
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy');
    });
    
    // Service Routes
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });
    
    // Download Routes
    Route::prefix('downloads')->name('downloads.')->group(function () {
        Route::get('/', [DownloadController::class, 'index'])->name('index');
        Route::get('/create', [DownloadController::class, 'create'])->name('create');
        Route::post('/', [DownloadController::class, 'store'])->name('store');
        Route::get('/{download}/edit', [DownloadController::class, 'edit'])->name('edit');
        Route::put('/{download}', [DownloadController::class, 'update'])->name('update');
        Route::delete('/{download}', [DownloadController::class, 'destroy'])->name('destroy');
    });
    
    // FAQ Routes
    Route::prefix('faqs')->name('faqs.')->group(function () {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/create', [FaqController::class, 'create'])->name('create');
        Route::post('/', [FaqController::class, 'store'])->name('store');
        Route::get('/{faq}/edit', [FaqController::class, 'edit'])->name('edit');
        Route::put('/{faq}', [FaqController::class, 'update'])->name('update');
        Route::delete('/{faq}', [FaqController::class, 'destroy'])->name('destroy');
    });
    
    // Water Status Routes
    Route::prefix('water-status')->name('water-status.')->group(function () {
        Route::get('/', [WaterStatusController::class, 'index'])->name('index');
        Route::get('/create', [WaterStatusController::class, 'create'])->name('create');
        Route::post('/', [WaterStatusController::class, 'store'])->name('store');
        Route::get('/{waterStatus}/edit', [WaterStatusController::class, 'edit'])->name('edit');
        Route::put('/{waterStatus}', [WaterStatusController::class, 'update'])->name('update');
        Route::delete('/{waterStatus}', [WaterStatusController::class, 'destroy'])->name('destroy');
    });
    
    // Water Schedule Routes
    Route::prefix('water-schedule')->name('water-schedule.')->group(function () {
        Route::get('/', [WaterScheduleController::class, 'index'])->name('index');
        Route::get('/create', [WaterScheduleController::class, 'create'])->name('create');
        Route::post('/', [WaterScheduleController::class, 'store'])->name('store');
        Route::get('/{waterSchedule}/edit', [WaterScheduleController::class, 'edit'])->name('edit');
        Route::put('/{waterSchedule}', [WaterScheduleController::class, 'update'])->name('update');
        Route::delete('/{waterSchedule}', [WaterScheduleController::class, 'destroy'])->name('destroy');
    });
    
    // Water Quality Routes
    Route::prefix('water-quality')->name('water-quality.')->group(function () {
        Route::get('/', [WaterQualityController::class, 'index'])->name('index');
        Route::get('/create', [WaterQualityController::class, 'create'])->name('create');
        Route::post('/', [WaterQualityController::class, 'store'])->name('store');
        Route::get('/{waterQuality}/edit', [WaterQualityController::class, 'edit'])->name('edit');
        Route::put('/{waterQuality}', [WaterQualityController::class, 'update'])->name('update');
        Route::delete('/{waterQuality}', [WaterQualityController::class, 'destroy'])->name('destroy');
    });
    
    // Complaint Routes
    Route::prefix('complaints')->name('complaints.')->group(function () {
        Route::get('/', [ComplaintController::class, 'index'])->name('index');
        Route::get('/{complaint}', [ComplaintController::class, 'show'])->name('show');
        Route::put('/{complaint}/status', [ComplaintController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{complaint}', [ComplaintController::class, 'destroy'])->name('destroy');
    });
    
    // Statistics Routes
    Route::prefix('statistics')->name('statistics.')->group(function () {
        Route::get('/', [StatisticController::class, 'index'])->name('index');
        Route::get('/create', [StatisticController::class, 'create'])->name('create');
        Route::post('/', [StatisticController::class, 'store'])->name('store');
        Route::get('/{statistic}/edit', [StatisticController::class, 'edit'])->name('edit');
        Route::put('/{statistic}', [StatisticController::class, 'update'])->name('update');
        Route::delete('/{statistic}', [StatisticController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', function () { return 'Users Index'; })->name('index');
    });
    
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::post('/', [SettingController::class, 'update'])->name('update');
    });

    // About Us Routes
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/', [AboutController::class, 'edit'])->name('edit');
        Route::put('/', [AboutController::class, 'update'])->name('update');
        Route::get('/organization-intro', [AboutController::class, 'editOrganizationIntro'])->name('edit-organization-intro');
        Route::put('/organization-intro', [AboutController::class, 'updateOrganizationIntro'])->name('update-organization-intro');
        Route::get('/our-mission', [AboutController::class, 'editOurMission'])->name('edit-our-mission');
        Route::put('/our-mission', [AboutController::class, 'updateOurMission'])->name('update-our-mission');
        Route::get('/our-vision', [AboutController::class, 'editOurVision'])->name('edit-our-vision');
        Route::put('/our-vision', [AboutController::class, 'updateOurVision'])->name('update-our-vision');
        Route::get('/organization-structure', [AboutController::class, 'editOrganizationStructure'])->name('edit-organization-structure');
        Route::put('/organization-structure', [AboutController::class, 'updateOrganizationStructure'])->name('update-organization-structure');
    });

    // Board Members Routes
    Route::prefix('board-members')->name('board-members.')->group(function () {
        Route::get('/', [BoardMemberController::class, 'index'])->name('index');
        Route::get('/create', [BoardMemberController::class, 'create'])->name('create');
        Route::post('/', [BoardMemberController::class, 'store'])->name('store');
        Route::get('/{boardMember}/edit', [BoardMemberController::class, 'edit'])->name('edit');
        Route::put('/{boardMember}', [BoardMemberController::class, 'update'])->name('update');
        Route::delete('/{boardMember}', [BoardMemberController::class, 'destroy'])->name('destroy');
        Route::put('/{boardMember}/toggle-status', [BoardMemberController::class, 'toggleStatus'])->name('toggle-status');
    });

    // Office Staff Routes
    Route::prefix('office-staff')->name('office-staff.')->group(function () {
        Route::get('/', [OfficeStaffController::class, 'index'])->name('index');
        Route::get('/create', [OfficeStaffController::class, 'create'])->name('create');
        Route::post('/', [OfficeStaffController::class, 'store'])->name('store');
        Route::get('/{officeStaff}/edit', [OfficeStaffController::class, 'edit'])->name('edit');
        Route::put('/{officeStaff}', [OfficeStaffController::class, 'update'])->name('update');
        Route::delete('/{officeStaff}', [OfficeStaffController::class, 'destroy'])->name('destroy');
        Route::put('/{officeStaff}/toggle-status', [OfficeStaffController::class, 'toggleStatus'])->name('toggle-status');
    });
});
