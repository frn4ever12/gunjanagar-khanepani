@extends('layouts.frontend')

@section('title', __('messages.bill_payment'))

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="text-center mb-5">
                <h1 class="section-header">
                    <h2>{{ __('messages.bill_payment') }}</h2>
                    <div class="divider"></div>
                </h1>
                <p class="lead text-muted mt-3">
                    {{ app()->getLocale() === 'ne' ? 'आफ्नो खानेपानी बिल अनलाइन भुक्तानी गर्नुहोस्' : 'Pay your water bill online using digital payment methods' }}
                </p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row g-4">
                <!-- eSewa -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm payment-card">
                        <div class="card-body text-center p-5">
                            <div class="payment-logo mb-4">
                                <img src="https://esewa.com.np/common/images/esewa-icon-large.png" 
                                     alt="eSewa" 
                                     class="img-fluid" 
                                     style="max-height: 120px;"
                                     onerror="this.src='https://via.placeholder.com/200x120?text=eSewa'">
                            </div>
                            <h3 class="card-title mb-3">eSewa</h3>
                            <p class="card-text text-muted mb-4">
                                {{ app()->getLocale() === 'ne' ? 'नेपालको सबैभन्दा लोकप्रिय डिजिटल भुक्तानी प्लेटफर्म' : 'Nepal\'s most popular digital payment platform' }}
                            </p>
                            <a href="https://esewa.com.np" target="_blank" class="btn btn-esewa btn-lg w-100">
                                <i class="bi bi-box-arrow-up-right me-2"></i>
                                {{ app()->getLocale() === 'ne' ? 'eSewa मा जानुहोस्' : 'Pay with eSewa' }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Khalti -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm payment-card">
                        <div class="card-body text-center p-5">
                            <div class="payment-logo mb-4">
                                <img src="https://khalti.com/static/img/khalti-logo.png" 
                                     alt="Khalti" 
                                     class="img-fluid" 
                                     style="max-height: 120px;"
                                     onerror="this.src='https://via.placeholder.com/200x120?text=Khalti'">
                            </div>
                            <h3 class="card-title mb-3">Khalti</h3>
                            <p class="card-text text-muted mb-4">
                                {{ app()->getLocale() === 'ne' ? 'सरल, छिटो र सुरक्षित डिजिटल भुक्तानी' : 'Simple, fast and secure digital payment' }}
                            </p>
                            <a href="https://khalti.com" target="_blank" class="btn btn-khalti btn-lg w-100">
                                <i class="bi bi-box-arrow-up-right me-2"></i>
                                {{ app()->getLocale() === 'ne' ? 'Khalti मा जानुहोस्' : 'Pay with Khalti' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Information Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title mb-3">
                        {{ app()->getLocale() === 'ne' ? 'कसरी भुक्तानी गर्ने?' : 'How to Pay?' }}
                    </h4>
                    <ol class="mb-0">
                        <li class="mb-2">
                            {{ app()->getLocale() === 'ne' ? 'माथि दिइएको कुनै पनि भुक्तानी प्लेटफर्ममा क्लिक गर्नुहोस्।' : 'Click on any payment platform above.' }}
                        </li>
                        <li class="mb-2">
                            {{ app()->getLocale() === 'ne' ? 'आफ्नो खातामा लगइन गर्नुहोस्।' : 'Login to your account.' }}
                        </li>
                        <li class="mb-2">
                            {{ app()->getLocale() === 'ne' ? 'खानेपानी बिल भुक्तानी विकल्प छान्नुहोस्।' : 'Select water bill payment option.' }}
                        </li>
                        <li class="mb-2">
                            {{ app()->getLocale() === 'ne' ? 'आफ्नो ग्राहक आईडी र बिल रकम प्रविष्ट गर्नुहोस्।' : 'Enter your customer ID and bill amount.' }}
                        </li>
                        <li>
                            {{ app()->getLocale() === 'ne' ? 'भुक्तानी पूरा गर्नुहोस् र रसिद सुरक्षित राख्नुहोस्।' : 'Complete payment and keep the receipt safe.' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .payment-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .payment-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
    }

    .payment-logo {
        min-height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-esewa {
        background-color: #4CAF50;
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-esewa:hover {
        background-color: #45a049;
        color: white;
        transform: translateY(-2px);
    }

    .btn-khalti {
        background-color: #5C2D91;
        color: white;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-khalti:hover {
        background-color: #4a2375;
        color: white;
        transform: translateY(-2px);
    }
</style>
@endsection
