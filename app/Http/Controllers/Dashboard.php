<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    public function index()
    {

        $data['res'] = DB::table('admin')->get()->toArray();


        $admin = session()->get("admin_data");
        if (!$admin) {
            return redirect()->route('login');
        }
        return view('admin/dashboard', $data);
    }
}
