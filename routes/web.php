<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//product CRUD
Route::middleware(['auth'])->group(function () {
    // Product Management Routes
    Route::get('/add-product', [ProductController::class,'create'])->name('add.product');
    Route::post('/insert-product', [ProductController::class,'store'])->name('product.store');
    Route::get('/all-product', [ProductController::class,'allProduct'])->name('all.product');
    Route::get('/product/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class,'destroy'])->name('product.destroy');
    
    // Product Reports
    Route::get('/available-products', [ProductController::class,'availableProducts'])->name('available.products');
    Route::get('/sold-products', [ProductController::class,'soldProducts'])->name('sold.products');
    Route::get('/stock-report', [ProductController::class,'stockReport'])->name('stock.report');
    
    // Product Purchase & Order
    Route::get('/purchase-products/{id}', [ProductController::class,'purchaseData'])->name('purchase.products');
    Route::post('/insert-purchase-products', [ProductController::class,'storePurchase'])->name('purchase.store');
    Route::get('/add-order/{name}', [ProductController::class,'formData'])->name('add.order');
});


//invoice
Route::get('/add-invoice/{id}', [InvoiceController::class,'formData'])->middleware(['auth']);

Route::get('/new-invoice', [InvoiceController::class,'newformData'])->middleware(['auth'])->name('new.invoice');

Route::post('/insert-invoice',[InvoiceController::class,'store'])->middleware(['auth']);

Route::get('/invoice-details', function () {
    return view('Admin.invoice_details');
})->middleware(['auth'])->name('invoice.details');

Route::get('/all-invoice', [InvoiceController::class,'allInvoices'])->middleware(['auth'])->name('all.invoices');


//order
Route::middleware(['auth'])->group(function () {
    Route::post('/insert-order',[OrderController::class,'store'])->name('order.store');
    Route::get('/all-orders',[OrderController::class,'ordersData'])->name('all.orders');
    Route::get('/pending-orders',[OrderController::class,'pendingOrders'])->name('pending.orders');
    Route::get('/delivered-orders',[OrderController::class,'deliveredOrders'])->name('delivered.orders');
    Route::get('/new-order', [OrderController::class,'newformData'])->name('new.order');
    Route::post('/insert-new-order',[OrderController::class,'newStore'])->name('new.order.store');
});


//customer
Route::get('/add-customer', function () {
    return view('Admin.add_customer');
})->middleware(['auth'])->name('add.customer');

Route::post('/insert-customer',[CustomerController::class,'store'])->middleware(['auth']);

Route::get('/all-customers',[CustomerController::class,'customersData'])->middleware(['auth'])->name('all.customers');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';