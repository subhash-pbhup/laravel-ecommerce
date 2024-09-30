<?php

namespace App\Http\Controllers;

use App\Models\Admin_model;
use App\Models\Categories;
use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{

    public function index()
    {
        $admin = session()->get("admin_data");
        if (!$admin) {
            return redirect()->route('login');
        }

        $data['res'] = Admin_model::all();
        $data['products'] = ModelsProduct::join('categories', 'products.categories_id', '=', 'categories.id')
            ->select('*', 'products.id as products_id', 'products.name as products_name', 'products.status as products_status', 'products.description as products_description', 'products.created_at as products_created_at', 'products.updated_at as products_updated_at', 'categories.name as categories_name')->orderBy('products.id', 'desc')->get();
        $data['categories'] = Categories::all();

        return view('admin/products/all-products', $data);
    }

    public function add_products(Request $request)
    {

        $file = $request->file('image')->store("products", "public");

        $gallery_image = $request->file('gallery_image');

        foreach ($gallery_image as $gallery_image) {

            $gallery_image_filePaths[] = $gallery_image->store('products', 'public');
        }


        $gallery_file = implode(',', $gallery_image_filePaths);
        $sku = str_replace(' ', '-', $request->get('name'));
        date_default_timezone_set("Asia/Calcutta");
        $time = now()->toDateTimeString();


        $data = array("name" => $request->get('name'), "sku" => $sku, "price" => $request->get('price'), "stock" => $request->get('stock'), "status" => $request->get('status'), "categories_id" => $request->get('categories_id'), "description" => $request->get('description'), "image" => $file, "gallery_image" => $gallery_file, "created_at" => $time);


        $query = ModelsProduct::insert($data);


        if (isset($query)) {

            session()->flash("message", "Product Insert sccesssfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('all-products');
        } else {
            session()->flash("message", "Product not Insert please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('all-products');
        }
    }

    public function update_products(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store("products", "public");
        } else {

            $image = $request->get('old_img');
        }


        $sku = str_replace(' ', '-', $request->get('name'));
        date_default_timezone_set("Asia/Calcutta");
        $time = now()->toDateTimeString();

        $data = array("name" => $request->get('name'), "sku" => $sku, "price" => $request->get('price'), "stock" => $request->get('stock'), "status" => $request->get('status'), "categories_id" => $request->get('categories_id'), "description" => $request->get('description'), "updated_at" => $time, "image" => $image);


        // $query = DB::table('products')->where('id', $request->get('id'))->update($data);
        $query = ModelsProduct::where('id', $request->get('id'))->update($data);

        if (isset($query)) {

            session()->flash("message", "Product Update sccesssfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('all-products');
        } else {
            session()->flash("message", "Product not Update please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('all-products');
        }
    }

    public function delete_products($id)
    {


        $query = ModelsProduct::where('id', $id)->delete();

        if (isset($query)) {

            session()->flash("message", "Product Deleted sccessfully");
            session()->flash('alert-class', 'alert-info');
            return redirect()->route('all-products');
        } else {
            session()->flash("message", "Product Not Delete please check");
            session()->flash('alert-class', 'alert-danger');

            return redirect()->route('all-products');
        }
    }
}
