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
        $data['orders'] =  DB::table('orders')
            ->join('user', 'orders.user_id', '=', 'user.id')
            ->select('orders.*', 'user.name as user_name', 'user.email', 'user.address', 'user.mobile')->orderBy('orders.id', 'desc')
            ->get();

        return view('admin/products/all-orders', $data);
    }

    // Show the form for creating a new order
    public function create()
    {
        return view('orders.create');
    }


    public function order_status(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta");
        $time = now()->toDateTimeString();
        $data = array("status" => $request->get('order_status'),"updated_at" => $time);

        $query = DB::table('orders')->where(['id' => $request->get('order_id')])->update($data);

        if (isset($query)) {

            session()->flash("message", "Order Status Updated sccessfully");
            session()->flash('alert-class', 'alert-info');
        }
    }

    
}
