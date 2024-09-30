<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin_model;

class Admin extends Controller
{
    public function index()
    {
        
         $data['res'] = Admin_model::all();
         return view("admin/profile",$data);
    }

    public function update(Request $request)
    {


        if ($request->hasFile('img')) {
           Storage::delete('storage/'.$request->get('old_img'));
            $file = $request->file('img')->store("images", "public");
        } else {

            $file = $request->get('old_img');
        }

        $data = array("name" => $request->get('name'), "mobile" => $request->get('mobile'),"password" => $request->get('pwd'), "email" => $request->get('email'), "address" => $request->get('address'), "store_name" => $request->get('store_name'), "img" => $file);

        $query = DB::table('admin')->update($data);

        if (isset($query)) {

            session()->flash("message", "Profile updated sccesssfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('profile');
        } else {
            session()->flash("message", "Profile not update please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('profile');
        }
    }
}
