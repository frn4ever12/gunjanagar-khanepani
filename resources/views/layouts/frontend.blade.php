<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    
    @if(\App\Models\Setting::get('favicon'))
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . \App\Models\Setting::get('favicon')) }}">
    @endif
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', \App\Models\Setting::get('description_en', 'Providing safe and clean drinking water to the community.'))">
    <meta name="keywords" content="@yield('keywords', 'water supply, khanepani, drinking water, water management, Nepal')">
    <meta name="author" content="{{ \App\Models\Setting::get('org_name_en', config('app.name')) }}">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Home') - {{ config('app.name') }}">
    <meta property="og:description" content="@yield('description', \App\Models\Setting::get('description_en', 'Providing safe and clean drinking water to the community.'))">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', 'Home') - {{ config('app.name') }}">
    <meta property="twitter:description" content="@yield('description', \App\Models\Setting::get('description_en', 'Providing safe and clean drinking water to the community.'))">
    <meta property="twitter:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0a2e5c;
            --secondary-color: #1e4d8c;
            --water-blue: #0077b6;
            --accent-blue: #00b4d8;
            --light-gray: #f8f9fa;
            --dark-gray: #343a40;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --white: #ffffff;
        }
        
        * {
            font-family: 'Noto Sans', 'Noto Sans Devanagari', sans-serif;
        }
        
        body {
            background-color: #fff;
            color: var(--dark-gray);
        }
        
        /* Top Contact Bar */
        .top-contact-bar {
            background-color: var(--primary-color);
            color: white;
            padding: 6px 0;
            font-size: 12px;
            border-bottom: 2px solid var(--water-blue);
        }
        
        .top-contact-bar .contact-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-right: 20px;
            color: rgba(255,255,255,0.9);
        }
        
        .top-contact-bar .contact-item i {
            font-size: 11px;
            color: var(--accent-blue);
        }
        
        .top-contact-bar .contact-item:hover {
            color: white;
        }
        
        .top-contact-bar .language-switcher {
            display: inline-flex;
            gap: 8px;
        }

        .top-contact-bar .lang-btn {
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 3px 10px;
            font-size: 11px;
            cursor: pointer;
            transition: all 0.2s;
            border-radius: 3px;
        }

        .top-contact-bar .lang-btn:hover,
        .top-contact-bar .lang-btn.active {
            background: var(--water-blue);
        }

        /* Compact Language Toggle Switch */
        .lang-toggle-switch {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.15);
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .lang-toggle-switch .lang-label {
            font-size: 12px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: opacity 0.2s;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .lang-toggle-switch .lang-label:hover {
            opacity: 0.8;
        }

        .lang-toggle-switch .lang-label.active {
            opacity: 1;
        }

        .lang-toggle-switch .toggle-container {
            width: 62px;
            height: 24px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 12px;
            position: relative;
            cursor: pointer;
            transition: background 0.3s;
        }

        .lang-toggle-switch .toggle-container:hover {
            background: rgba(255, 255, 255, 0.35);
        }

        .lang-toggle-switch .toggle-knob {
            width: 40px;
            height: 20px;
            background: white;
            border-radius: 10px;
            cursor: pointer;
            border: none;
            transition: transform 0.3s ease;
        }

        .lang-toggle-switch .toggle-container.en-active .toggle-knob {
            transform: translateX(20px);
        }
        
        /* Organization Header - Row 1: Branding */
        .org-header {
            background: white;
            padding: 20px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .org-header .branding-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .org-header .branding-section .logo-img {
            height: 100px;
            width: auto;
            max-width: 110px;
            object-fit: contain;
        }

        .org-header .branding-section .org-info {
            display: flex;
            flex-direction: column;
        }

        .org-header .branding-section .org-info h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
            line-height: 1.2;
            letter-spacing: 0.5px;
        }

        .org-header .branding-section .org-info h2 {
            font-size: 16px;
            font-weight: 500;
            color: var(--dark-gray);
            margin: 4px 0 0 0;
            line-height: 1.3;
            letter-spacing: 0.3px;
        }

        .org-header .branding-section .org-info .tagline {
            display: none;
        }

        .org-header .contact-section {
            text-align: right;
            font-size: 12px;
        }

        .org-header .contact-section .contact-line {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            margin-bottom: 6px;
            color: var(--dark-gray);
        }

        .org-header .contact-section .contact-line i {
            color: var(--water-blue);
            font-size: 14px;
        }

        /* Inline Date Display */
        .date-display-inline {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 1px solid #e0e0e0;
        }

        .date-display-inline .nepali-date-inline {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary-color);
            line-height: 1.3;
        }

        .date-display-inline .english-date-inline {
            font-size: 12px;
            font-weight: 400;
            color: var(--dark-gray);
            line-height: 1.3;
        }

        /* Navigation - Row 2 */
        .main-navbar {
            background: linear-gradient(rgba(10, 46, 92, 0.85), rgba(10, 46, 92, 0.85)), url('{{ asset('images/navbar-bg.jpg.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 0;
        }

        .main-navbar.sticky {
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .main-navbar .navbar-nav .nav-link {
            color: rgba(255,255,255,0.85);
            font-size: 15px;
            font-weight: 500;
            padding: 14px 16px;
            transition: all 0.2s;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .main-navbar .navbar-nav .nav-link:hover,
        .main-navbar .navbar-nav .nav-link.active {
            background-color: var(--water-blue);
            color: white;
        }
        
        .main-navbar .navbar-nav .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 0;
            background: white;
        }
        
        .main-navbar .navbar-nav .dropdown-item {
            font-size: 13px;
            padding: 8px 16px;
            color: var(--dark-gray);
        }
        
        .main-navbar .navbar-nav .dropdown-item:hover {
            background-color: var(--light-gray);
            color: var(--primary-color);
        }
        
        .main-navbar.sticky {
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        .main-navbar.sticky .navbar-nav .nav-link {
            padding: 12px 16px;
        }
        
        /* News Ticker */
        .news-ticker {
            background: #f8f9fa;
            border-bottom: 2px solid var(--water-blue);
            display: flex;
            align-items: center;
            overflow: hidden;
            height: 40px;
        }
        
        .ticker-label {
            background: var(--water-blue);
            padding: 0 15px;
            height: 100%;
            display: flex;
            align-items: center;
            flex-shrink: 0;
        }
        
        .ticker-badge {
            color: white;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .ticker-container {
            flex: 1;
            overflow: hidden;
            position: relative;
            height: 100%;
        }
        
        .ticker-content {
            display: flex;
            align-items: center;
            height: 100%;
            animation: ticker-scroll 30s linear infinite;
            white-space: nowrap;
        }
        
        .ticker-content:hover {
            animation-play-state: paused;
        }
        
        @keyframes ticker-scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        .ticker-item {
            display: inline-flex;
            align-items: center;
            padding: 0 20px;
            text-decoration: none;
            color: var(--dark-gray);
            font-size: 14px;
            border-right: 1px solid #ddd;
        }
        
        .ticker-item:hover {
            color: var(--primary-color);
            background: rgba(0,0,0,0.05);
        }
        
        .ticker-text {
            white-space: nowrap;
        }
        
        .ticker-link {
            flex-shrink: 0;
            padding: 0 15px;
            height: 100%;
            display: flex;
            align-items: center;
            background: rgba(0,0,0,0.05);
        }
        
        .ticker-view-all {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }
        
        .ticker-view-all:hover {
            color: var(--water-blue);
        }
        
        @media (max-width: 768px) {
            .news-ticker {
                height: 35px;
            }
            
            .ticker-badge {
                font-size: 11px;
            }
            
            .ticker-item {
                font-size: 12px;
                padding: 0 15px;
            }
            
            .ticker-view-all {
                font-size: 10px;
            }
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 50%, var(--water-blue) 100%);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="rgba(255,255,255,0.03)"/></svg>');
            background-size: 300px;
            animation: float 25s infinite linear;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(150px, 150px); }
        }
        
        .hero-section h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.2;
        }
        
        .hero-section p {
            font-size: 17px;
            opacity: 0.95;
            margin-bottom: 25px;
            max-width: 700px;
        }
        
        .hero-section .btn-hero {
            background: white;
            color: var(--primary-color);
            padding: 12px 30px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        
        .hero-section .btn-hero:hover {
            background: var(--accent-blue);
            color: white;
            transform: translateY(-2px);
        }
        
        /* Quick Services */
        .quick-services {
            padding: 40px 0;
            background: var(--light-gray);
            margin-top: -30px;
            position: relative;
            z-index: 10;
        }
        
        .quick-services .service-card {
            background: white;
            border: none;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s;
            height: 100%;
            padding: 18px 15px;
            text-align: center;
        }
        
        .quick-services .service-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.12);
        }
        
        .quick-services .service-card .icon-wrapper {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--water-blue), var(--accent-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }
        
        .quick-services .service-card .icon-wrapper i {
            font-size: 20px;
            color: white;
        }
        
        .quick-services .service-card h5 {
            font-size: 12px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .quick-services .service-card p {
            font-size: 10px;
            color: var(--dark-gray);
            margin-bottom: 0;
        }
        
        /* Service Card Home */
        .service-card-home {
            background: white;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s;
            padding: 25px 20px;
            text-align: center;
        }
        
        .service-card-home:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        
        .service-icon-wrapper {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--water-blue), var(--accent-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        
        .service-icon-wrapper i {
            font-size: 24px;
            color: white;
        }
        
        .service-card-home h5 {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .service-card-home p {
            font-size: 13px;
            color: var(--dark-gray);
            line-height: 1.5;
        }
        
        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 35px;
        }
        
        .section-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        
        .section-header .divider {
            width: 50px;
            height: 3px;
            background: var(--water-blue);
            margin: 0 auto;
        }
        
        /* Info Cards */
        .info-card {
            background: white;
            border: none;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s;
            height: 100%;
        }
        
        .info-card:hover {
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        }
        
        .info-card .card-header {
            background: var(--primary-color);
            color: white;
            padding: 12px 15px;
            font-weight: 600;
            font-size: 14px;
        }
        
        /* Water Status */
        .water-status-card {
            background: linear-gradient(135deg, var(--success-color), #2ecc71);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
        }
        
        .water-status-card.status-warning {
            background: linear-gradient(135deg, var(--warning-color), #f39c12);
        }
        
        .water-status-card.status-danger {
            background: linear-gradient(135deg, var(--danger-color), #e74c3c);
        }
        
        .water-status-card .status-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        .water-status-card .status-text {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        /* Statistics Section */
        .statistics-section {
            background: var(--primary-color);
            color: white;
            padding: 60px 0;
        }
        
        .statistics-section .stat-card {
            text-align: center;
            padding: 20px;
        }
        
        .statistics-section .stat-card .stat-icon {
            font-size: 36px;
            margin-bottom: 15px;
            color: var(--accent-blue);
        }
        
        .statistics-section .stat-card .stat-value {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .statistics-section .stat-card .stat-label {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 3px;
        }
        
        .statistics-section .stat-card .stat-unit {
            font-size: 11px;
            opacity: 0.7;
        }
        
        /* Footer */
        .main-footer {
            background: var(--primary-color);
            color: white;
            padding: 50px 0 20px;
        }
        
        .main-footer h5 {
            font-weight: 600;
            margin-bottom: 18px;
            color: var(--accent-blue);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .main-footer a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.2s;
            font-size: 13px;
        }
        
        .main-footer a:hover {
            color: white;
        }
        
        .main-footer .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .main-footer .footer-links li {
            margin-bottom: 8px;
        }
        
        .main-footer .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin-right: 8px;
            transition: background 0.2s;
            font-size: 14px;
        }
        
        .main-footer .social-links a:hover {
            background: var(--water-blue);
        }
        
        .main-footer .copyright {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 18px;
            margin-top: 35px;
            text-align: center;
            font-size: 12px;
            color: rgba(255,255,255,0.7);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero-section h1 {
                font-size: 32px;
            }
            
            .org-header .logo-section .org-info h1 {
                font-size: 22px;
            }
            
            .org-header .logo-section .org-info h2 {
                font-size: 16px;
            }
            
            .org-header .contact-section {
                display: none;
            }
        }
        
        .status-inactive {
            background-color: #f8d7da;
            color: #842029;
        }

        /* Board Members Sidebar Responsive */
        @media (max-width: 991px) {
            .board-members-sidebar {
                min-height: auto !important;
            }
        }

        @media (max-width: 992px) {
            .top-contact-bar .contact-item {
                margin-right: 10px;
                font-size: 11px;
            }
            
            .hero-section h1 {
                font-size: 26px;
            }
            
            .hero-section p {
                font-size: 15px;
            }
            
            .hero-section {
                padding: 60px 0 50px;
            }
            
            .quick-services {
                margin-top: -20px;
                padding: 30px 0;
            }
            
            .statistics-section {
                padding: 40px 0;
            }
            
            .statistics-section .stat-card .stat-value {
                font-size: 28px;
            }

            /* Mobile Header Responsive */
            .org-header {
                padding: 15px 0;
            }

            .org-header .branding-section {
                gap: 12px;
            }

            .org-header .branding-section .logo-img {
                height: 70px;
                max-width: 80px;
            }

            .org-header .branding-section .org-info h1 {
                font-size: 18px;
                line-height: 1.3;
            }

            .org-header .branding-section .org-info h2 {
                font-size: 12px;
                line-height: 1.4;
            }
        }

        @media (max-width: 480px) {
            .org-header .branding-section .logo-img {
                height: 60px;
                max-width: 70px;
            }

            .org-header .branding-section .org-info h1 {
                font-size: 16px;
            }

            .org-header .branding-section .org-info h2 {
                font-size: 11px;
            }

            /* Mobile Date Display */
            .date-display-inline {
                margin-left: 10px;
                padding-left: 10px;
            }

            .date-display-inline .nepali-date-inline {
                font-size: 13px;
            }

            .date-display-inline .english-date-inline {
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Organization Header - Row 1: Branding -->
    <header class="org-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="branding-section">
                    @if(\App\Models\Setting::get('logo'))
                        <img src="{{ asset('storage/' . \App\Models\Setting::get('logo')) }}" alt="Logo" class="logo-img">
                    @endif
                    <div class="org-info">
                        <h1>{{ \App\Models\Setting::get('org_name_ne', 'खानेपानी व्यवस्थापन') }}</h1>
                        <h2>{{ \App\Models\Setting::get('org_name_en', config('app.name')) }}</h2>
                        <div class="tagline">{{ \App\Models\Setting::get('tagline', 'Safe Water, Healthy Community') }}</div>
                    </div>
                    @if(\App\Models\Setting::get('nepal_flag'))
                        <img src="{{ asset('storage/' . \App\Models\Setting::get('nepal_flag')) }}" alt="Nepal Flag" style="height: 60px; margin-left: 15px;">
                    @endif
                    <div class="date-display-inline">
                        <div class="nepali-date-inline">
                            {{ \App\Helpers\NepaliDateHelper::getNepaliToday() }}
                        </div>
                        <div class="english-date-inline">
                            {{ \App\Helpers\NepaliDateHelper::getEnglishToday() }}
                        </div>
                    </div>
                </div>
                <div class="contact-section">
                    <div class="contact-line">
                        <i class="bi bi-geo-alt"></i> {{ \App\Models\Setting::get('address', 'Kathmandu, Nepal') }}
                    </div>
                    <div class="contact-line">
                        <i class="bi bi-envelope"></i> {{ \App\Models\Setting::get('email', 'info@example.com') }}
                    </div>
                    <div class="contact-line">
                        <i class="bi bi-telephone"></i> {{ \App\Models\Setting::get('phone', '+977-1-XXXXXXX') }}
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <i class="bi bi-list text-white fs-3"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house me-1"></i> {{ __('messages.home') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('about*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                            {{ __('messages.about') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">{{ __('messages.organization_intro') }}</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('our-mission') ? 'active' : '' }}" href="{{ route('our-mission') }}">{{ __('messages.our_mission') }}</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('our-vision') ? 'active' : '' }}" href="{{ route('our-vision') }}">{{ __('messages.our_vision') }}</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('organization-structure') ? 'active' : '' }}" href="{{ route('organization-structure') }}">{{ __('messages.organization_structure') }}</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('board-members') ? 'active' : '' }}" href="{{ route('board-members') }}">{{ __('messages.board_members') }}</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('office-staff') ? 'active' : '' }}" href="{{ route('office-staff') }}">{{ __('messages.office_staff') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">
                            {{ __('messages.services') }}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('notices*') || request()->routeIs('news*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
                            {{ __('messages.notices') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ request()->routeIs('notices*') ? 'active' : '' }}" href="{{ route('notices') }}">{{ __('messages.notices') }}</a></li>
                            <li><a class="dropdown-item {{ request()->routeIs('news*') ? 'active' : '' }}" href="{{ route('news') }}">{{ __('messages.news') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            {{ __('messages.citizen_services') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('water-schedule') }}">{{ __('messages.water_schedule') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('water-quality') }}">{{ __('messages.water_quality') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('bill-payment') }}">{{ __('messages.bill_payment') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('complaint.form') }}">{{ __('messages.complaints') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            {{ __('messages.downloads') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('downloads') }}">{{ __('messages.downloads') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('faqs') }}">{{ __('messages.faq') }}</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <form action="{{ route('language.switch', app()->getLocale() === 'en' ? 'ne' : 'en') }}" method="POST" class="lang-toggle-switch">
                        @csrf
                        <span class="lang-label {{ app()->getLocale() === 'ne' ? 'active' : '' }}">{{ __('messages.nepali') }}</span>
                        <div class="toggle-container {{ app()->getLocale() === 'en' ? 'en-active' : '' }}">
                            <button type="submit" class="toggle-knob"></button>
                        </div>
                        <span class="lang-label {{ app()->getLocale() === 'en' ? 'active' : '' }}">{{ __('messages.english') }}</span>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- News Ticker -->
    @if(isset($tickerItems) && $tickerItems->count() > 0)
    <div class="news-ticker">
        <div class="ticker-label">
            <span class="ticker-badge">{{ __('messages.notices') }}</span>
        </div>
        <div class="ticker-container">
            <div class="ticker-content">
                @foreach($tickerItems as $item)
                <a href="{{ $item['route'] }}" class="ticker-item">
                    <span class="ticker-text">{{ $item['title'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
        <div class="ticker-link">
            <a href="{{ route('notices') }}" class="ticker-view-all">
                {{ __('messages.view_all') }} {{ __('messages.notices') }} →
            </a>
        </div>
    </div>
    @endif
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="logo-area mb-3">
                        @if(\App\Models\Setting::get('logo'))
                            <img src="{{ asset('storage/' . \App\Models\Setting::get('logo')) }}" alt="Logo" style="height: 50px;">
                        @endif
                        <div class="org-name">
                            <h5 style="color: white; margin: 0;">{{ \App\Models\Setting::get('org_name_en', config('app.name')) }}</h5>
                        </div>
                    </div>
                    <p style="opacity: 0.8; font-size: 14px;">
                        {{ \App\Models\Setting::get('description_en', 'Providing safe and clean drinking water to the community.') }}
                    </p>
                    <div class="social-links mt-3">
                        @if(\App\Models\Setting::get('facebook'))
                            <a href="{{ \App\Models\Setting::get('facebook') }}" target="_blank"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('youtube'))
                            <a href="{{ \App\Models\Setting::get('youtube') }}" target="_blank"><i class="bi bi-youtube"></i></a>
                        @endif
                        @if(\App\Models\Setting::get('twitter'))
                            <a href="{{ \App\Models\Setting::get('twitter') }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        @endif
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>{{ __('messages.quick_links') }}</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li><a href="{{ route('about') }}">{{ __('messages.about') }}</a></li>
                        <li><a href="{{ route('services') }}">{{ __('messages.services') }}</a></li>
                        <li><a href="{{ route('notices') }}">{{ __('messages.notices') }}</a></li>
                        <li><a href="{{ route('complaint.form') }}">{{ __('messages.complaints') }}</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5>{{ __('messages.our_services') }}</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('services') }}">{{ __('messages.new_connection') }}</a></li>
                        <li><a href="{{ route('water-schedule') }}">{{ __('messages.water_schedule') }}</a></li>
                        <li><a href="{{ route('complaint.form') }}">{{ __('messages.complaint_registration') }}</a></li>
                        <li><a href="{{ route('downloads') }}">{{ __('messages.download_forms') }}</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5>{{ __('messages.contact_us') }}</h5>
                    <ul class="footer-links">
                        <li><i class="bi bi-geo-alt me-2"></i> {{ \App\Models\Setting::get('address', 'Kathmandu, Nepal') }}</li>
                        <li><i class="bi bi-telephone me-2"></i> {{ \App\Models\Setting::get('phone', '+977-1-XXXXXXX') }}</li>
                        <li><i class="bi bi-envelope me-2"></i> {{ \App\Models\Setting::get('email', 'info@example.com') }}</li>
                        <li><i class="bi bi-clock me-2"></i> {{ \App\Models\Setting::get('office_hours', 'Sun-Fri: 10:00 AM - 5:00 PM') }}</li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p class="mb-0">
                    © {{ date('Y') }} {{ \App\Models\Setting::get('org_name_en', config('app.name')) }}. {{ __('messages.copyright') }}.
                    <br>
                    {{ \App\Models\Setting::get('footer_text', __('messages.developed_by')) }}
                </p>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @stack('scripts')
</body>
</html>
