<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{

    public $admin_data;

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //    $this->admin_data=session("admin_data");
        //    return $next($request);
        //     });  

        // Dashboard::back();
    }

    
    public function index(){

        $data['res']=DB::table('admin')->get()->toArray();


        $admin =session()->get("admin_data");
        if(!$admin){
            return redirect()->route('login');
           }         
        return view('admin/dashboard',$data);
    }

    
}
