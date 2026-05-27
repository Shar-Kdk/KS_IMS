@extends('layouts.admin_master')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3" style="color: #2d3748;">
                <i class="fas fa-shopping-cart" style="color: #667eea;"></i> All Orders
            </h1>
            <p style="color: #718096; margin: 0;">Complete order management and tracking</p>
        </div>
        <a href="{{ route('new.order') }}" class="btn btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-weight: 600; padding: 10px 25px;">
            <i class="fas fa-plus-circle"></i> Create Order
        </a>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Total Orders</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $orders->count() }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #ffc107 0%, #fb8500 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Pending</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $orders->where('order_status', 0)->count() }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); overflow: hidden;">
                <div style="background: linear-gradient(135deg, #28a745 0%, #1f7e34 100%); padding: 25px;">
                    <div style="color: white;">
                        <h6 style="color: rgba(255,255,255,0.8); margin-bottom: 5px; font-size: 12px; font-weight: 700; text-transform: uppercase;">Delivered</h6>
                        <h2 style="margin: 0; font-weight: 700;">{{ $orders->where('order_status', '!=', 0)->count() }}</h2>
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

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border: none;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Orders Table -->
    <div class="card" style="border: none; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
        <div class="card-header" style="background: transparent; border-bottom: 1px solid #e2e8f0; padding: 20px;">
            <h5 class="mb-0" style="font-weight: 700; color: #2d3748;">
                <i class="fas fa-table"></i> Orders List
            </h5>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-responsive">
                <table class="table" id="ordersTable" style="margin: 0;">
                    <thead style="background: #f7fafc; border-bottom: 2px solid #e2e8f0;">
                        <tr>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Order ID</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Customer Email</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Product Code</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Product Name</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Quantity</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Status</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Date</th>
                            <th style="font-weight: 700; color: #2d3748; padding: 15px 20px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr style="border-bottom: 1px solid #e2e8f0; transition: all 0.3s ease;">
                                <td style="padding: 15px 20px; color: #2d3748; font-weight: 600;">
                                    <code style="background: #f7fafc; padding: 4px 8px; border-radius: 4px;">#{{ $order->id }}</code>
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748;">{{ $order->email }}</td>
                                <td style="padding: 15px 20px; color: #2d3748; font-weight: 500;">
                                    <code style="background: #f7fafc; padding: 4px 8px; border-radius: 4px;">{{ $order->product_code }}</code>
                                </td>
                                <td style="padding: 15px 20px; color: #2d3748;">{{ $order->product_name }}</td>
                                <td style="padding: 15px 20px; color: #2d3748; font-weight: 600;">{{ $order->quantity }}</td>
                                <td style="padding: 15px 20px;">
                                    @if($order->order_status == 0)
                                        <span style="background: rgba(255, 193, 7, 0.15); color: #ffc107; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                                            <i class="fas fa-clock"></i> Pending
                                        </span>
                                    @else
                                        <span style="background: rgba(40, 167, 69, 0.15); color: #28a745; padding: 6px 12px; border-radius: 6px; font-size: 13px; font-weight: 600;">
                                            <i class="fas fa-check-circle"></i> Delivered
                                        </span>
                                    @endif
                                </td>
                                <td style="padding: 15px 20px; color: #718096; font-size: 13px;">
                                    {{ $order->created_at->format('M d, Y') }}
                                </td>
                                <td style="padding: 15px 20px;">
                                    <div style="display: flex; gap: 8px;">
                                        @if($order->order_status == 0)
                                            <button class="btn btn-sm markDeliveredBtn" data-order-id="{{ $order->id }}" style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: none; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; transition: all 0.3s ease; cursor: pointer;">
                                                <i class="fas fa-truck"></i> Deliver
                                            </button>
                                        @endif
                                        <a href="{{ route('add.order', $order->id) }}" class="btn btn-sm" style="background: rgba(102, 126, 234, 0.1); color: var(--primary-color); border: none; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; transition: all 0.3s ease;">
                                            <i class="fas fa-file-invoice"></i> Invoice
                                        </a>
                                        <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.1); color: #dc3545; border: none; border-radius: 6px; padding: 6px 12px; font-size: 13px; font-weight: 600; transition: all 0.3s ease; cursor: pointer;">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="padding: 40px 20px; text-align: center; color: #a0aec0;">
                                    <i class="fas fa-inbox"></i> No orders found. <a href="{{ route('new.order') }}" style="color: var(--primary-color); text-decoration: none; font-weight: 600;">Create one now</a>
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
        $('#ordersTable').DataTable({
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
                    }
                }
            ]
        });

        // Mark as delivered
        $('.markDeliveredBtn').on('click', function() {
            let orderId = $(this).data('order-id');
            if (confirm('Mark this order as delivered?')) {
                let form = $('<form method="POST" style="display:none;">' +
                    '@csrf' +
                    '@method("PUT")' +
                    '<input name="status" value="1">' +
                    '</form>');
                
                form.attr('action', '/order/' + orderId + '/status');
                $('body').append(form);
                form.submit();
            }
        });
    });
</script>
@endsection