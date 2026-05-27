<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display all products (Stock Report)
     */
    public function allProduct(){
        $products = Product::all();
        return view('Admin.all_product',compact('products'));
    }

    /**
     * Show add product form
     */
    public function create(){
        return view('Admin.add_product');
    }

    /**
     * Store a new product
     */
    public function store(Request $request){
        $validated = $request->validate([
            'code' => 'required|unique:products,product_code',
            'name' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
        ]);

        $product = new Product();
        $product->product_code = $request->code;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->stock = $request->stock;
        $product->unit_price = $request->unit_price;
        $product->sales_unit_price = $request->sale_price;
        $product->save();

        return redirect()->route('all.product')->with('success', 'Product added successfully!');
    }

    /**
     * Show edit product form
     */
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('Admin.edit_product', compact('product'));
    }

    /**
     * Update product
     */
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        
        $validated = $request->validate([
            'code' => 'required|unique:products,product_code,'.$id,
            'name' => 'required|string',
            'category' => 'required|string',
            'stock' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
        ]);

        $product->product_code = $request->code;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->stock = $request->stock;
        $product->unit_price = $request->unit_price;
        $product->sales_unit_price = $request->sale_price;
        $product->save();

        return redirect()->route('all.product')->with('success', 'Product updated successfully!');
    }

    /**
     * Delete product
     */
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('all.product')->with('success', 'Product deleted successfully!');
    }

    /**
     * Display available products (stock > 0)
     */
    public function availableProducts(){
        $products = Product::where('stock', '>', '0')->get();
        return view('Admin.available_products', compact('products'));
    }

    /**
     * Display sold products
     */
    public function soldProducts(){
        $products = Product::where('stock', '<=', '0')->get();
        return view('Admin.sold_products', compact('products'));
    }

    /**
     * Get product data for order form
     */
    public function formData($id){
        $product = Product::findOrFail($id);
        return view('Admin.add_order', compact('product'));
    }

    /**
     * Show purchase stock form
     */
    public function purchaseData($id){
        $product = Product::findOrFail($id);
        return view('Admin.purchase_products', compact('product'));
    }

    /**
     * Store purchase (increase stock)
     */
    public function storePurchase(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'purchase' => 'required|numeric|min:1',
        ]);

        Product::where('name', $request->name)
            ->update(['stock' => \DB::raw('stock + ' . $request->purchase)]);
        
        return redirect()->route('all.product')->with('success', 'Stock updated successfully!');
    }

    /**
     * Get stock statistics
     */
    public function stockReport(){
        $totalStock = Product::sum('stock');
        $totalProducts = Product::count();
        $availableProducts = Product::where('stock', '>', '0')->count();
        $outOfStock = Product::where('stock', '<=', '0')->count();
        $products = Product::all();

        return view('Admin.stock_report', compact(
            'totalStock',
            'totalProducts', 
            'availableProducts',
            'outOfStock',
            'products'
        ));
    }
}

