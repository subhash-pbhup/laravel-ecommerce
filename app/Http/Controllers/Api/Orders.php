<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class Orders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = [
            'user_id' => $request->user_id,
            'order_number' => 0001,
            'subtotal' => $request->subtotal,
            'tax' => $request->tax,
            'shipping_cost' => $request->shipping_cost,
            'total_price' => $request->total_price,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
            'order_items' => json_encode($request->order_items),
        ];
        $order = Order::create($data);
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $order = Order::find($id);

        if (!$order) {  
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }

        return response()->json($order, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Order = Order::find($id);


        if (!$Order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }

        $Order->delete();

        return response()->json([
            'message' => 'Order deleted successfully'
        ], 200);
    }
}
