@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3" style="color: #2d3748;">
                <i class="fas fa-chart-bar" style="color: #667eea;"></i> Stock Report
            </h1>
            <p style="color: #718096; margin: 0;">Comprehensive inventory overview and statistics</p>
        </div>
        <a href="{{ route('all.product') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: 600; padding: 10px 25px;">
            <i class="fas fa-list"></i> View All Products
        </a>
    </div>

    <!-- KPI Cards -->
    <div class="row mb-4">
        <!-- Total Products -->
        <div class="col-md-3 mb-3">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Total Products</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $report['totalProducts'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Stock -->
        <div class="col-md-3 mb-3">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Total Stock</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $report['totalStock'] }} units</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Products -->
        <div class="col-md-3 mb-3">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Available</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $report['availableProducts'] }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Out of Stock -->
        <div class="col-md-3 mb-3">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Out of Stock</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $report['outOfStock'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Stock Status Summary -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
                    <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                        <i class="fas fa-chart-pie"></i> Stock Distribution
                    </h5>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        <div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="color: #2d3748; font-weight: 600;">Available Products</span>
                                <span style="color: #27ae60; font-weight: 700;">{{ $report['availableProducts'] }} ({{ round(($report['availableProducts']/$report['totalProducts'])*100) }}%)</span>
                            </div>
                            <div style="height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                                <div style="height: 100%; background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%); width: {{ round(($report['availableProducts']/$report['totalProducts'])*100) }}%;"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span style="color: #2d3748; font-weight: 600;">Out of Stock</span>
                                <span style="color: #dc3545; font-weight: 700;">{{ $report['outOfStock'] }} ({{ round(($report['outOfStock']/$report['totalProducts'])*100) }}%)</span>
                            </div>
                            <div style="height: 8px; background: #e2e8f0; border-radius: 4px; overflow: hidden;">
                                <div style="height: 100%; background: linear-gradient(135deg, #dc3545 0%, #c82333 100%); width: {{ round(($report['outOfStock']/$report['totalProducts'])*100) }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
                    <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                        <i class="fas fa-info-circle"></i> Quick Links
                    </h5>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <a href="{{ route('all.product') }}" style="background: rgba(102, 126, 234, 0.1); color: var(--primary-color); padding: 15px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-boxes"></i> View All Products
                        </a>
                        <a href="{{ route('available.products') }}" style="background: rgba(39, 174, 96, 0.1); color: #27ae60; padding: 15px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-check-circle"></i> Available Products
                        </a>
                        <a href="{{ route('sold.products') }}" style="background: rgba(220, 53, 69, 0.1); color: #dc3545; padding: 15px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-ban"></i> Out of Stock Products
                        </a>
                        <a href="{{ route('add.product') }}" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 15px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-plus-circle"></i> Add New Product
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Products Table -->
    <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
            <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                <i class="fas fa-table"></i> All Products with Stock Details
            </h5>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table" id="stockReportTable" style="margin: 0;">
                    <thead style="background: #f7fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Code</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Name</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Category</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Stock Level</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Status</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Buy Price</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Sale Price</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr style="border-bottom: 1px solid #e2e8f0; transition: all 0.3s ease;">
                                <td style="padding: 15px 20px; color: #2d3748; font-weight: 500;">
                                    <code style="background: #f7fafc; padding: 4px 8px; border-radius: 4px;">{{ $product->product_code }}</code>
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748; font-weight: 500;">{{ $product->name }}</td>
                                <td style="padding: 15px 20px; color: #2d3748;">
                                    <span style="background: rgba(102, 126, 234, 0.1); color: var(--primary-color); padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 500;">
                                        {{ $product->category }}
                                    </span>
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748; font-weight: 600;">
                                    @if($product->stock > 20)
                                        <span style="background: rgba(39, 174, 96, 0.1); color: #27ae60; padding: 6px 12px; border-radius: 6px; font-size: 13px;">
                                            {{ $product->stock }} units
                                        </span>
                                    @elseif($product->stock > 0)
                                        <span style="background: rgba(255, 193, 7, 0.1); color: #ffc107; padding: 6px 12px; border-radius: 6px; font-size: 13px;">
                                            {{ $product->stock }} units
                                        </span>
                                    @else
                                        <span style="background: rgba(220, 53, 69, 0.1); color: #dc3545; padding: 6px 12px; border-radius: 6px; font-size: 13px;">
                                            Out
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748;">
                                    @if($product->stock > 0)
                                        <span style="background: rgba(39, 174, 96, 0.15); color: #27ae60; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;">
                                            In Stock
                                        </span>
                                    @else
                                        <span style="background: rgba(220, 53, 69, 0.15); color: #dc3545; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600;">
                                            Out of Stock
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748;">
                                    <strong>${{ number_format($product->unit_price, 2) }}</strong>
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748;">
                                    <strong>${{ number_format($product->sales_unit_price, 2) }}</strong>
                                </td>
                                <td style="padding: 15px 20px;">
                                    <div style="display: flex; gap: 8px;">
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm" style="background: rgba(102, 126, 234, 0.1); color: var(--primary-color); border: none; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; transition: all 0.3s ease;" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($product->stock <= 0)
                                            <a href="{{ route('purchase.products', $product->id) }}" class="btn btn-sm" style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: none; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; transition: all 0.3s ease;" title="Restock">
                                                <i class="fas fa-redo"></i>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="padding: 40px 20px; text-align: center; color: #a0aec0;">
                                    <i class="fas fa-inbox"></i> No products found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    [data-bs-theme="dark"] .card {
        background: #2d2d44 !important;
    }

    [data-bs-theme="dark"] thead {
        background: #3d3d54 !important;
    }

    [data-bs-theme="dark"] th,
    [data-bs-theme="dark"] td {
        color: #e0e0e0 !important;
        border-color: #4d4d64 !important;
    }

    [data-bs-theme="dark"] tbody tr:hover {
        background: #3d3d54 !important;
    }

    tbody tr:hover {
        background: #f7fafc !important;
    }

    a:hover {
        opacity: 0.8;
        transform: translateY(-2px);
    }

    .btn:hover {
        opacity: 0.8;
        transform: translateY(-2px);
    }
</style>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#stockReportTable').DataTable({
            columnDefs: [
                {bSortable: false, targets: [7]} 
            ],
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        modifier: {page: 'current'},
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        modifier: {page: 'current'},
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        modifier: {page: 'current'},
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    title: 'Stock Report - ' + new Date().toLocaleDateString()
                }
            ]
        });
    });
</script>
@endsection
