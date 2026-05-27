@extends('layouts.admin_master')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Page Header -->
            <div class="mb-4">
                <h1 class="h3" style="color: #2d3748;">
                    <i class="fas fa-plus-circle" style="color: #667eea;"></i> Create New Order
                </h1>
                <p style="color: #718096; margin: 0;">Fill in the details below and submit to create a new order</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 8px; border: none;">
                    <i class="fas fa-exclamation-circle"></i> Please fix the errors below
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <ul style="margin-top: 10px; margin-bottom: 0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Order Form -->
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 25px;">
                    <h5 style="font-weight: 700; color: #2d3748; margin: 0;">Order Information</h5>
                </div>
                <div class="card-body" style="padding: 30px;">
                    <form method="POST" action="{{ route('new.order.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Customer Selection -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">
                                    <i class="fas fa-user" style="color: var(--primary-color);"></i> Select Customer
                                </label>
                                <select id="customerSelect" name="customer_id" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px; font-size: 14px;">
                                    <option value="">-- Choose a Customer --</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" data-email="{{ $customer->email }}" data-company="{{ $customer->company }}" data-address="{{ $customer->address }}" data-phone="{{ $customer->phone }}">
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Customer Details (Auto-populated) -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">Email</label>
                                <input type="email" name="email" id="customerEmail" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;" required>
                                @error('email') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">Company</label>
                                <input type="text" name="company" id="customerCompany" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">Phone</label>
                                <input type="text" name="phone" id="customerPhone" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;">
                            </div>
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">Address</label>
                                <input type="text" name="address" id="customerAddress" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;">
                            </div>
                        </div>

                        <!-- Product Selection -->
                        <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">
                                    <i class="fas fa-box" style="color: var(--primary-color);"></i> Select Product
                                </label>
                                <select name="code" id="productCode" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px; font-size: 14px;" required>
                                    <option value="">-- Choose a Product --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->product_code }}" data-name="{{ $product->name }}" data-stock="{{ $product->stock }}">
                                            {{ $product->product_code }} - {{ $product->name }} (Stock: {{ $product->stock }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('code') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">Product Name</label>
                                <input type="text" name="name" id="productName" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;" readonly>
                                @error('name') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">Available Stock</label>
                                <input type="text" id="productStock" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;" readonly>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #2d3748; margin-bottom: 10px; display: block;">
                                    <i class="fas fa-hashtag" style="color: var(--primary-color);"></i> Quantity
                                </label>
                                <input type="number" name="quantity" class="form-control" style="border: 2px solid #e2e8f0; border-radius: 8px; padding: 12px;" min="1" required placeholder="Enter quantity">
                                @error('quantity') <small style="color: #dc3545;">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div style="display: flex; gap: 10px; margin-top: 30px;">
                            <button type="submit" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: 600; padding: 12px 30px; flex: 1;">
                                <i class="fas fa-check-circle"></i> Create Order
                            </button>
                            <a href="{{ route('all.orders') }}" class="btn btn-lg" style="background: #e2e8f0; color: #2d3748; border: none; border-radius: 8px; font-weight: 600; padding: 12px 30px;">
                                <i class="fas fa-times-circle"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    [data-bs-theme="dark"] .card { background: #2d2d44 !important; }
    [data-bs-theme="dark"] .form-control { background: #3d3d54 !important; color: #e0e0e0 !important; border-color: #4d4d64 !important; }
    [data-bs-theme="dark"] label { color: #e0e0e0 !important; }
    [data-bs-theme="dark"] hr { border-color: #4d4d64 !important; }
    .form-control:focus { border-color: var(--primary-color) !important; box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25); }
</style>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Populate customer details when selected
        $('#customerSelect').on('change', function() {
            const selected = $(this).find(':selected');
            $('#customerEmail').val(selected.data('email') || '');
            $('#customerCompany').val(selected.data('company') || '');
            $('#customerPhone').val(selected.data('phone') || '');
            $('#customerAddress').val(selected.data('address') || '');
        });

        // Populate product details when selected
        $('#productCode').on('change', function() {
            const selected = $(this).find(':selected');
            $('#productName').val(selected.data('name') || '');
            $('#productStock').val(selected.data('stock') || '');
        });
    });
</script>
@endsection