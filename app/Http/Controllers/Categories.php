<?php

namespace App\Http\Controllers;

use App\Models\Admin_model;
use App\Models\Categories as ModelsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Categories extends Controller
{
    public function index()
    {
        $admin = session()->get("admin_data");
        if (!$admin) {
            return redirect()->route('login');
        }


        $data['res'] = Admin_model::all();
        $data['categories'] = ModelsCategories::all();
        return view('admin/categories/categories', $data);
    }

    public function add_categories(Request $request)
    {
        date_default_timezone_set("Asia/Calcutta");
        $time = now()->toDateTimeString();
        $slug = str_replace(' ', '-', strtolower($request->get('name')));


        $data = array("name" => $request->get('name'), "description" => $request->get('description'), "slug" => $slug, "created_at" => $time);

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
        date_default_timezone_set("Asia/Calcutta");
        $time = now()->toDateTimeString();
        $slug = str_replace(' ', '-', strtolower($request->get('name')));
        $data = array("name" => $request->get('name'), "description" => $request->get('description'), "status" => $request->get('status'), "slug" => $slug, "updated_at" => $time);

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

    public function delete_categories($id)
    {

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
