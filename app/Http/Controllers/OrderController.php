<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

class OrderController extends Controller
{
    public function newformData(){
        $products = Product::where('stock', '>', 0)->get();
        $customers = Customer::all();
        return view('Admin.new_order', compact('products', 'customers'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
            'name' => 'required|string',
            'quantity' => 'required|integer|min:1'
        ]);

        try {
            // Check if product exists and has enough stock
            $product = Product::where('product_code', $request->code)->first();
            if (!$product || $product->stock < $request->quantity) {
                return back()->with('error', 'Product does not exist or insufficient stock available');
            }

            $order = new Order();
            $order->email = $request->email;
            $order->product_code = $request->code;
            $order->product_name = $request->name;
            $order->quantity = $request->quantity;
            $order->order_status = 0;
            $order->save();

            return redirect()->route('all.orders')->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create order: ' . $e->getMessage());
        }
    }

    public function newStore(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
            'name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'customer_name' => 'required|string',
            'company' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string'
        ]);

        try {
            // Check product availability
            $product = Product::where('product_code', $request->code)->first();
            if (!$product || $product->stock < $request->quantity) {
                return back()->with('error', 'Product does not exist or insufficient stock');
            }

            // Create order
            $order = new Order();
            $order->email = $request->email;
            $order->product_code = $request->code;
            $order->product_name = $request->name;
            $order->quantity = $request->quantity;
            $order->order_status = 0;
            $order->save();

            // Create customer if new
            $customer = Customer::where('email', $request->email)->first();
            if (!$customer) {
                Customer::create([
                    'name' => $request->customer_name,
                    'email' => $request->email,
                    'company' => $request->company,
                    'address' => $request->address,
                    'phone' => $request->phone
                ]);
            }

            return redirect()->route('all.orders')->with('success', 'Order created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create order: ' . $e->getMessage());
        }
    }

    public function ordersData(){
        $orders = Order::latest()->get();
        return view('Admin.all_orders', compact('orders'));
    }

    public function pendingOrders(){
        $orders = Order::where('order_status', 0)->latest()->get();
        return view('Admin.pending_orders', compact('orders'));
    }

    public function deliveredOrders(){
        $orders = Order::where('order_status', '!=', 0)->latest()->get();
        return view('Admin.delivered_orders', compact('orders'));
    }

    public function updateStatus(Request $request, $id){
        try {
            $order = Order::find($id);
            if (!$order) {
                return back()->with('error', 'Order not found');
            }

            $order->order_status = $request->status;
            $order->save();

            return back()->with('success', 'Order status updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update order: ' . $e->getMessage());
        }
    }

    public function destroy($id){
        try {
            $order = Order::find($id);
            if (!$order) {
                return back()->with('error', 'Order not found');
            }

            $order->delete();
            return back()->with('success', 'Order deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete order: ' . $e->getMessage());
        }
    }
}
