<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1e3a5f;
            --secondary-color: #0d6efd;
            --water-blue: #00a8cc;
            --light-gray: #f8f9fa;
            --dark-gray: #495057;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --sidebar-width: 260px;
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background-color: var(--light-gray);
            min-height: 100vh;
        }
        
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-color) 0%, #152a45 100%);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        
        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-brand h4 {
            color: white;
            font-weight: 600;
            margin: 0;
            font-size: 18px;
        }
        
        .sidebar-brand small {
            color: rgba(255,255,255,0.7);
            font-size: 12px;
        }
        
        .sidebar-menu {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            scroll-behavior: smooth;
            min-height: 0;
        }
        
        .sidebar-menu::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-menu::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }
        
        .sidebar-menu::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 3px;
        }
        
        .sidebar-menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255,255,255,0.3);
        }
        
        .sidebar-menu .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 0;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sidebar-menu .nav-link:hover,
        .sidebar-menu .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }
        
        .sidebar-menu .nav-link i {
            font-size: 18px;
            width: 24px;
        }
        
        .sidebar-menu .nav-item {
            margin-bottom: 2px;
        }
        
        .sidebar-menu .nav-header {
            color: rgba(255,255,255,0.5);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 20px 5px;
            font-weight: 600;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
        }
        
        .top-header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .content-wrapper {
            padding: 30px;
        }
        
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 20px;
        }
        
        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #152a45;
            border-color: #152a45;
        }
        
        .table thead th {
            background-color: var(--light-gray);
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: var(--dark-gray);
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-active {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        
        .status-inactive {
            background-color: #f8d7da;
            color: #842029;
        }
        
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            @php
                $logo = \App\Models\Setting::get('logo');
                $orgName = app()->getLocale() === 'ne' ? \App\Models\Setting::get('org_name_ne') : \App\Models\Setting::get('org_name_en');
            @endphp
            @if($logo)
                <img src="{{ asset('storage/' . $logo) }}" alt="Logo" style="height: 50px; margin-bottom: 10px;">
            @endif
            <h4>{{ $orgName ?? config('app.name') }}</h4>
            <small>Admin Panel</small>
        </div>
        
        <div class="nepali-date" style="padding: 10px 20px; text-align: center; color: white; font-size: 14px; border-bottom: 1px solid #eee;">
            {{ \App\Helpers\NepaliDateHelper::getNepaliToday() }}
        </div>
        
        <div style="flex: 1; overflow-y: auto; overflow-x: hidden;">
            <nav class="sidebar-menu">
            <div class="nav-header">Main</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>{{ __('messages.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}" href="{{ route('admin.about.index') }}">
                        <i class="bi bi-info-circle"></i>
                        <span>{{ __('messages.about') }}</span>
                    </a>
                </li>
            </ul>
            
            <div class="nav-header">Website</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                        <i class="bi bi-images"></i>
                        <span>{{ __('messages.banners') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.notices.*') ? 'active' : '' }}" href="{{ route('admin.notices.index') }}">
                        <i class="bi bi-megaphone"></i>
                        <span>{{ __('messages.notices') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
                        <i class="bi bi-newspaper"></i>
                        <span>{{ __('messages.news') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>{{ __('messages.services') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.downloads.*') ? 'active' : '' }}" href="{{ route('admin.downloads.index') }}">
                        <i class="bi bi-download"></i>
                        <span>{{ __('messages.downloads') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}">
                        <i class="bi bi-question-circle"></i>
                        <span>{{ __('messages.faq') }}</span>
                    </a>
                </li>
            </ul>
            
            <div class="nav-header">Water Management</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.water-status.*') ? 'active' : '' }}" href="{{ route('admin.water-status.index') }}">
                        <i class="bi bi-droplet"></i>
                        <span>{{ __('messages.water_status') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.water-schedule.*') ? 'active' : '' }}" href="{{ route('admin.water-schedule.index') }}">
                        <i class="bi bi-calendar3"></i>
                        <span>{{ __('messages.water_schedule') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.water-quality.*') ? 'active' : '' }}" href="{{ route('admin.water-quality.index') }}">
                        <i class="bi bi-check-circle"></i>
                        <span>{{ __('messages.water_quality') }}</span>
                    </a>
                </li>
            </ul>
            
            <div class="nav-header">Citizen Services</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.complaints.*') ? 'active' : '' }}" href="{{ route('admin.complaints.index') }}">
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>{{ __('messages.complaints') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.statistics.*') ? 'active' : '' }}" href="{{ route('admin.statistics.index') }}">
                        <i class="bi bi-bar-chart"></i>
                        <span>{{ __('messages.statistics') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.board-members.*') ? 'active' : '' }}" href="{{ route('admin.board-members.index') }}">
                        <i class="bi bi-people"></i>
                        <span>{{ __('messages.board_members') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.office-staff.*') ? 'active' : '' }}" href="{{ route('admin.office-staff.index') }}">
                        <i class="bi bi-person-badge"></i>
                        <span>{{ __('messages.office_staff') }}</span>
                    </a>
                </li>
            </ul>
            
            <div class="nav-header">System</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <i class="bi bi-people"></i>
                        <span>{{ __('messages.users') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                        <i class="bi bi-gear"></i>
                        <span>{{ __('messages.settings') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
        </div>
    </aside>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Header -->
        <header class="top-header">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-link text-dark d-lg-none" id="sidebarToggle">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                    <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <!-- Language Switcher -->
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-globe"></i> {{ app()->getLocale() === 'ne' ? 'नेपाली' : 'English' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('language.switch', 'en') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-check-circle me-2" style="display: {{ app()->getLocale() === 'en' ? 'inline' : 'none' }}"></i>
                                        English
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{ route('language.switch', 'ne') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-check-circle me-2" style="display: {{ app()->getLocale() === 'ne' ? 'inline' : 'none' }}"></i>
                                        नेपाली
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="dropdown">
                        <button class="btn btn-link text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="ms-2">{{ auth()->user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>
    
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>
    
    <!-- Summernote Initialization -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color', 'backcolor']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana'],
                fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '36', '48', '72'],
                fontNamesIgnoreCheck: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana'],
                colors: [
                    ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
                    ['#FF0000', '#FF9900', '#FFFF00', '#00FF00', '#00FFFF', '#4A86E8', '#0000FF', '#9900FF'],
                    ['#E6B8AF', '#F4CCCC', '#FCE8CD', '#FFF2CC', '#D9EAD3', '#D0E0E3', '#A9C4D4', '#C4A7CF'],
                    ['#DD7E6B', '#EA9999', '#F9CB9C', '#FFE599', '#B6D7A8', '#A2C4C9', '#79A2CF', '#D0A0D9'],
                    ['#CC4125', '#E06666', '#F6B26B', '#FFD966', '#93C47D', '#76A5AF', '#5B80B5', '#BF63C5'],
                    ['#A61C00', '#CC0000', '#E69138', '#F1C232', '#6AA84F', '#45818E', '#3D78B8', '#8647B1'],
                    ['#85200C', '#990000', '#B45F06', '#BF9000', '#38761D', '#134F5C', '#1155CC', '#741B47'],
                    ['#5B0F00', '#660000', '#783F04', '#7F6000', '#274E13', '#0C343D', '#1C4587', '#4527A0']
                ]
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
