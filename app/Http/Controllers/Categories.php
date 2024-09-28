<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Categories extends Controller
{
    public function index()
    {
        $data['res'] = DB::table('admin')->get()->toArray();
        $data['categories'] = DB::table('categories')->get()->toArray();
        return view('admin/categories/categories', $data);
    }

    public function add_categories(Request $request)
    {

        $data = array("name" => $request->get('name'), "description" => $request->get('description'));

        $query = DB::table('categories')->insert($data);

        if (isset($query)) {

            session()->flash("message", "Categories added sccessfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('product-categories');
        } else {
            session()->flash("message", "categories not added please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('product-categories');
        }
    }

    public function update_categories(Request $request)
    {

        $data = array("name" => $request->get('name'), "description" => $request->get('description'),"status" => $request->get('status'));

        $query = DB::table('categories')->where(['id' => $request->get('id')])->update($data);

        if (isset($query)) {

            session()->flash("message", "Categorie Updated sccessfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('product-categories');
        } else {
            session()->flash("message", "categorie not Updated please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('product-categories');
        }
    }

    public function delete_categories($id){

        $query = DB::table('categories')->where(['id' => $id])->delete();

        if (isset($query)) {

            session()->flash("message", "Categorie Deleted sccessfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('product-categories');
        } else {
            session()->flash("message", "categorie Not Delete please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('product-categories');
        }
    }

    
}
