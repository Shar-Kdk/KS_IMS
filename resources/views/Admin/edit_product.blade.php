@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="mb-4">
                <h1 class="h3" style="color: #2d3748;">
                    <i class="fas fa-edit" style="color: var(--primary-color);"></i> Edit Product
                </h1>
                <p style="color: #718096;">Update product information</p>
            </div>

            <!-- Edit Product Form -->
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-body" style="padding: 30px;">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')

                        <div class="row mb-4">
                            <!-- Product Code -->
                            <div class="col-md-6">
                                <label for="code" class="form-label" style="font-weight: 600; color: #2d3748;">
                                    <i class="fas fa-barcode"></i> Product Code
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('code') is-invalid @enderror" 
                                    id="code" 
                                    name="code"
                                    value="{{ old('code', $product->product_code) }}"
                                    placeholder="e.g., PRD001"
                                    style="border-radius: 8px; padding: 12px 15px; border: 2px solid #e2e8f0;"
                                    required
                                >
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Product Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label" style="font-weight: 600; color: #2d3748;">
                                    <i class="fas fa-tag"></i> Product Name
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name"
                                    value="{{ old('name', $product->name) }}"
                                    placeholder="Enter product name"
                                    style="border-radius: 8px; padding: 12px 15px; border: 2px solid #e2e8f0;"
                                    required
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <!-- Category -->
                            <div class="col-md-6">
                                <label for="category" class="form-label" style="font-weight: 600; color: #2d3748;">
                                    <i class="fas fa-cube"></i> Category
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('category') is-invalid @enderror" 
                                    id="category" 
                                    name="category"
                                    value="{{ old('category', $product->category) }}"
                                    placeholder="e.g., Electronics"
                                    style="border-radius: 8px; padding: 12px 15px; border: 2px solid #e2e8f0;"
                                    required
                                >
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Stock -->
                            <div class="col-md-6">
                                <label for="stock" class="form-label" style="font-weight: 600; color: #2d3748;">
                                    <i class="fas fa-boxes"></i> Stock Quantity
                                </label>
                                <input 
                                    type="number" 
                                    class="form-control @error('stock') is-invalid @enderror" 
                                    id="stock" 
                                    name="stock"
                                    value="{{ old('stock', $product->stock) }}"
                                    min="0"
                                    placeholder="0"
                                    style="border-radius: 8px; padding: 12px 15px; border: 2px solid #e2e8f0;"
                                    required
                                >
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <!-- Buy Price -->
                            <div class="col-md-6">
                                <label for="unit_price" class="form-label" style="font-weight: 600; color: #2d3748;">
                                    <i class="fas fa-dollar-sign"></i> Buy Price (per Unit)
                                </label>
                                <div class="input-group" style="border-radius: 8px; border: 2px solid #e2e8f0;">
                                    <span class="input-group-text" style="background: transparent; border: none;">$</span>
                                    <input 
                                        type="number" 
                                        class="form-control @error('unit_price') is-invalid @enderror" 
                                        id="unit_price" 
                                        name="unit_price"
                                        value="{{ old('unit_price', $product->unit_price) }}"
                                        step="0.01"
                                        min="0"
                                        placeholder="0.00"
                                        style="border: none; padding: 12px 15px;"
                                        required
                                    >
                                </div>
                                @error('unit_price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Sale Price -->
                            <div class="col-md-6">
                                <label for="sale_price" class="form-label" style="font-weight: 600; color: #2d3748;">
                                    <i class="fas fa-tag"></i> Sale Price (per Unit)
                                </label>
                                <div class="input-group" style="border-radius: 8px; border: 2px solid #e2e8f0;">
                                    <span class="input-group-text" style="background: transparent; border: none;">$</span>
                                    <input 
                                        type="number" 
                                        class="form-control @error('sale_price') is-invalid @enderror" 
                                        id="sale_price" 
                                        name="sale_price"
                                        value="{{ old('sale_price', $product->sales_unit_price) }}"
                                        step="0.01"
                                        min="0"
                                        placeholder="0.00"
                                        style="border: none; padding: 12px 15px;"
                                        required
                                    >
                                </div>
                                @error('sale_price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-flex gap-3 mt-5">
                            <button type="submit" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; flex: 1; font-weight: 600; padding: 12px 20px;">
                                <i class="fas fa-save"></i> Update Product
                            </button>
                            <a href="{{ route('all.product') }}" class="btn btn-lg" style="background: #f0f0f0; color: #2d3748; border: none; border-radius: 8px; flex: 1; font-weight: 600; padding: 12px 20px;">
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
    [data-bs-theme="dark"] .card {
        background: #2d2d44 !important;
    }

    [data-bs-theme="dark"] .form-control,
    [data-bs-theme="dark"] .input-group-text {
        background: #3d3d54 !important;
        border-color: #4d4d64 !important;
        color: #e0e0e0 !important;
    }

    [data-bs-theme="dark"] .form-control:focus {
        background: #3d3d54 !important;
        border-color: #667eea !important;
        color: #e0e0e0 !important;
    }

    [data-bs-theme="dark"] .form-label {
        color: #cbd5e0 !important;
    }

    .form-control:focus {
        border-color: #667eea !important;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15) !important;
    }
</style>
@endsection
