@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3" style="color: #2d3748;">
                <i class="fas fa-ban" style="color: #dc3545;"></i> Sold Products
            </h1>
            <p style="color: #718096; margin: 0;">Products with zero or negative stock</p>
        </div>
        <a href="{{ route('add.product') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: 600; padding: 10px 25px;">
            <i class="fas fa-plus-circle"></i> Add New Product
        </a>
    </div>

    <!-- Summary Card -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); background: linear-gradient(135deg, rgba(220,53,69,0.1) 0%, rgba(220,53,69,0.05) 100%);">
                <div class="card-body" style="padding: 20px;">
                    <div class="row">
                        <div class="col-md-4">
                            <div style="text-align: center;">
                                <h6 style="color: #a0aec0; margin-bottom: 10px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Total Out of Stock</h6>
                                <h2 style="color: #dc3545; margin: 0; font-weight: 700;">{{ $products->count() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div style="border-left: 2px solid rgba(220,53,69,0.2); padding-left: 20px;">
                                <p style="color: #718096; font-size: 14px; margin: 0;">
                                    <i class="fas fa-exclamation-circle" style="color: #dc3545;"></i>
                                    These products need immediate restocking. Click the <strong>Restock</strong> button to purchase more inventory.
                                </p>
                            </div>
                        </div>
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

    <!-- Products Table -->
    <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
            <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                <i class="fas fa-table"></i> Out of Stock Products
            </h5>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table" id="soldProductsTable" style="margin: 0;">
                    <thead style="background: #f7fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Code</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Name</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Category</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Stock</th>
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
                                    <span style="background: rgba(220, 53, 69, 0.1); color: #dc3545; padding: 6px 12px; border-radius: 6px; font-size: 13px;">
                                        {{ $product->stock }}
                                    </span>
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
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('purchase.products', $product->id) }}" class="btn btn-sm" style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: none; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; transition: all 0.3s ease;" title="Restock">
                                            <i class="fas fa-redo"></i> Restock
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 40px 20px; text-align: center; color: #a0aec0;">
                                    <i class="fas fa-inbox"></i> Great! No products out of stock.
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

    .btn:hover {
        opacity: 0.8;
        transform: translateY(-2px);
    }
</style>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#soldProductsTable').DataTable({
            columnDefs: [
                {bSortable: false, targets: [6]} 
            ],
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        modifier: {page: 'current'},
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        modifier: {page: 'current'},
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        modifier: {page: 'current'},
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                }
            ]
        });
    });
</script>
@endsection