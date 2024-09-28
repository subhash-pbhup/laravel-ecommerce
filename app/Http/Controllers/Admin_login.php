<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin_login extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    public function login(Request $request)
    {

        $getvalue = array("email" => $request->get('email'), "password" => $request->get('pass'));
        $admin_data = DB::table('admin')->where($getvalue)->get()->toArray();

        session()->put("admin_data", $admin_data);
        $admin = session()->get("admin_data");
        if (isset($admin[0]->email)) {
            return redirect()->route('dashboard');
        } else {
            session()->flash("message", "Please check your email id and password");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('login');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
