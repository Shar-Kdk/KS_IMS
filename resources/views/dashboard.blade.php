@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="mb-5">
        <h1 class="h3 mb-2" style="color: #2d3748;">
            <i class="fas fa-chart-line" style="color: var(--primary-color);"></i> Dashboard
        </h1>
        <p style="color: #718096; margin: 0;">Welcome back! Here's what's happening with your inventory today.</p>
    </div>

    <!-- KPI Cards -->
    <div class="row mb-4">
        <!-- Stock Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Total Stock</p>
                            <h3 class="mb-0" style="color: #2d3748; font-weight: 700;">1,234</h3>
                        </div>
                        <div style="background: rgba(102, 126, 234, 0.1); padding: 12px; border-radius: 8px; color: var(--primary-color); font-size: 24px;">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #27ae60; font-size: 13px;">
                        <i class="fas fa-arrow-up"></i>
                        <span><strong>+12%</strong> from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sold Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Sold Products</p>
                            <h3 class="mb-0" style="color: #2d3748; font-weight: 700;">856</h3>
                        </div>
                        <div style="background: rgba(255, 193, 7, 0.1); padding: 12px; border-radius: 8px; color: #ffc107; font-size: 24px;">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #27ae60; font-size: 13px;">
                        <i class="fas fa-arrow-up"></i>
                        <span><strong>+8%</strong> from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Available</p>
                            <h3 class="mb-0" style="color: #2d3748; font-weight: 700;">378</h3>
                        </div>
                        <div style="background: rgba(39, 174, 96, 0.1); padding: 12px; border-radius: 8px; color: #27ae60; font-size: 24px;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #27ae60; font-size: 13px;">
                        <i class="fas fa-arrow-up"></i>
                        <span><strong>+5%</strong> from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Orders Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Pending Orders</p>
                            <h3 class="mb-0" style="color: #2d3748; font-weight: 700;">23</h3>
                        </div>
                        <div style="background: rgba(220, 53, 69, 0.1); padding: 12px; border-radius: 8px; color: #dc3545; font-size: 24px;">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: #dc3545; font-size: 13px;">
                        <i class="fas fa-arrow-down"></i>
                        <span>Requires attention</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Charts Row -->
    <div class="row mb-4">
        <!-- Quick Actions -->
        <div class="col-lg-4 mb-4">
            <div class="card h-100" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
                    <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                        <i class="fas fa-lightning-bolt" style="color: var(--primary-color);"></i> Quick Actions
                    </h5>
                </div>
                <div class="card-body" style="padding: 0;">
                    <a href="{{ route('add.product') }}" class="d-flex align-items-center gap-3 p-3" style="text-decoration: none; color: #2d3748; border-bottom: 1px solid #e2e8f0; transition: all 0.3s ease;">
                        <div style="background: rgba(102, 126, 234, 0.1); padding: 10px; border-radius: 8px; font-size: 18px; color: var(--primary-color);">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span style="font-weight: 500;">Add New Product</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0.5;"></i>
                    </a>
                    <a href="{{ route('new.order') }}" class="d-flex align-items-center gap-3 p-3" style="text-decoration: none; color: #2d3748; border-bottom: 1px solid #e2e8f0; transition: all 0.3s ease;">
                        <div style="background: rgba(255, 193, 7, 0.1); padding: 10px; border-radius: 8px; font-size: 18px; color: #ffc107;">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <span style="font-weight: 500;">Create Order</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0.5;"></i>
                    </a>
                    <a href="{{ route('new.invoice') }}" class="d-flex align-items-center gap-3 p-3" style="text-decoration: none; color: #2d3748; border-bottom: 1px solid #e2e8f0; transition: all 0.3s ease;">
                        <div style="background: rgba(39, 174, 96, 0.1); padding: 10px; border-radius: 8px; font-size: 18px; color: #27ae60;">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <span style="font-weight: 500;">Generate Invoice</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0.5;"></i>
                    </a>
                    <a href="{{ route('add.customer') }}" class="d-flex align-items-center gap-3 p-3" style="text-decoration: none; color: #2d3748; transition: all 0.3s ease;">
                        <div style="background: rgba(220, 53, 69, 0.1); padding: 10px; border-radius: 8px; font-size: 18px; color: #dc3545;">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span style="font-weight: 500;">Add Customer</span>
                        <i class="fas fa-arrow-right ms-auto" style="font-size: 12px; opacity: 0.5;"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-lg-8 mb-4">
            <div class="card h-100" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
                    <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                        <i class="fas fa-history" style="color: var(--primary-color);"></i> Recent Activities
                    </h5>
                </div>
                <div class="card-body">
                    <div style="display: flex; gap: 15px; padding: 15px 0; border-bottom: 1px solid #e2e8f0; align-items: flex-start;">
                        <div style="background: rgba(39, 174, 96, 0.1); padding: 8px 12px; border-radius: 6px; color: #27ae60; font-size: 14px; white-space: nowrap;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; color: #2d3748; font-weight: 500;">Order #12345 Delivered</p>
                            <p style="margin: 5px 0 0 0; color: #a0aec0; font-size: 13px;">Today at 2:30 PM</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; padding: 15px 0; border-bottom: 1px solid #e2e8f0; align-items: flex-start;">
                        <div style="background: rgba(102, 126, 234, 0.1); padding: 8px 12px; border-radius: 6px; color: var(--primary-color); font-size: 14px; white-space: nowrap;">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; color: #2d3748; font-weight: 500;">New Product Added</p>
                            <p style="margin: 5px 0 0 0; color: #a0aec0; font-size: 13px;">Today at 10:15 AM</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; padding: 15px 0; border-bottom: 1px solid #e2e8f0; align-items: flex-start;">
                        <div style="background: rgba(255, 193, 7, 0.1); padding: 8px 12px; border-radius: 6px; color: #ffc107; font-size: 14px; white-space: nowrap;">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; color: #2d3748; font-weight: 500;">Invoice #56789 Created</p>
                            <p style="margin: 5px 0 0 0; color: #a0aec0; font-size: 13px;">Yesterday at 3:45 PM</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; padding: 15px 0; align-items: flex-start;">
                        <div style="background: rgba(220, 53, 69, 0.1); padding: 8px 12px; border-radius: 6px; color: #dc3545; font-size: 14px; white-space: nowrap;">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div style="flex: 1;">
                            <p style="margin: 0; color: #2d3748; font-weight: 500;">New Customer Registered</p>
                            <p style="margin: 5px 0 0 0; color: #a0aec0; font-size: 13px;">Yesterday at 11:20 AM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards Row -->
    <div class="row">
        <!-- Total Revenue -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-body">
                    <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Total Revenue</p>
                    <h4 class="mb-3" style="color: #2d3748; font-weight: 700;">$45,230</h4>
                    <small style="color: #27ae60;"><i class="fas fa-arrow-up"></i> +25% this month</small>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-body">
                    <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Total Orders</p>
                    <h4 class="mb-3" style="color: #2d3748; font-weight: 700;">324</h4>
                    <small style="color: #27ae60;"><i class="fas fa-arrow-up"></i> +15% this month</small>
                </div>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-body">
                    <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Total Customers</p>
                    <h4 class="mb-3" style="color: #2d3748; font-weight: 700;">128</h4>
                    <small style="color: #27ae60;"><i class="fas fa-arrow-up"></i> +8% this month</small>
                </div>
            </div>
        </div>

        <!-- Conversion Rate -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-body">
                    <p class="text-muted mb-1" style="font-size: 13px; font-weight: 500;">Conversion Rate</p>
                    <h4 class="mb-3" style="color: #2d3748; font-weight: 700;">68%</h4>
                    <small style="color: #dc3545;"><i class="fas fa-arrow-down"></i> -2% this month</small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [data-bs-theme="dark"] .card {
        background: #2d2d44 !important;
        border-color: #4d4d64 !important;
        color: #e0e0e0 !important;
    }

    [data-bs-theme="dark"] .card-header {
        background: transparent !important;
        border-bottom-color: #4d4d64 !important;
    }

    [data-bs-theme="dark"] h1,
    [data-bs-theme="dark"] h3,
    [data-bs-theme="dark"] h4,
    [data-bs-theme="dark"] h5,
    [data-bs-theme="dark"] p {
        color: #e0e0e0 !important;
    }

    [data-bs-theme="dark"] .text-muted {
        color: #a0aec0 !important;
    }

    [data-bs-theme="dark"] a {
        color: var(--primary-color) !important;
    }

    .card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12) !important;
        transform: translateY(-2px);
    }

    [data-bs-theme="dark"] a.d-flex:hover {
        background: #3d3d54 !important;
    }
</style>
@endsection