<?php

namespace App\Http\Controllers;

use App\Models\Admin_model;
use App\Models\Order as ModelsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Orders extends Controller
{
    // Display a listing of orders
    public function index()
    {
        $admin = session()->get("admin_data");
        if (!$admin) {
            return redirect()->route('login');
        }

        $data['res'] = Admin_model::all();
        // $data['orders'] = ModelsOrder::get();
        $data['orders'] = $orders = DB::table('orders')
        ->join('user', 'orders.user_id', '=', 'user.id')
        ->select('orders.*', 'user.name as user_name', 'user.email', 'user.address', 'user.mobile')
        ->get();

    // return response()->json($orders);

        // dd($data);
        // die;

        return view('admin/products/all-orders', $data);
    }

    // Show the form for creating a new order
    public function create()
    {
        return view('orders.create');
    }

    // Store a newly created order in storage
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_number' => 'required|string|unique:orders,order_number',
            'subtotal' => 'required|numeric',
            'tax' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'total_price' => 'required|numeric',
            'shipping_address' => 'required|string',
            'order_items' => 'required|json', // Assuming order items is stored as JSON
            'status' => 'required|string',
            'order_date' => 'required|date',
        ]);

        // Create new order
        ModelsOrder::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    // Display the specified order
    public function show(ModelsOrder $order)
    {
        return view('orders.show', compact('order'));
    }

    // Show the form for editing the specified order
    public function edit(ModelsOrder $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Update the specified order in storage
    public function update(Request $request, ModelsOrder $order)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'subtotal' => 'required|numeric',
            'tax' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'total_price' => 'required|numeric',
            'shipping_address' => 'required|string',
            'order_items' => 'required|json',
            'status' => 'required|string',
            'order_date' => 'required|date',
        ]);

        // Update order
        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    // Remove the specified order from storage
    public function destroy(ModelsOrder $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
