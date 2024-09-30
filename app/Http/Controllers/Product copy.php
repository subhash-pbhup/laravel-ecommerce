<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    public function index(){

        echo "dasds";

        die;

    }

    public function add_products(Request $request){

        
        // $data['res']=DB::table('admin')->get()->toArray();
        // $data['products']=ModelsProduct::all();
        // dd($data);
        // die;
        // return view('admin/products/all-products',$data);

        echo "dasds";

        die;

        // $prodcuts= ModelsProduct::create($request->all());

        // return response()->json([
        //     'message' => 'Product updated successfully',
        //     'products' => $prodcuts
        // ], 200);
        // return view('admin/prodcuts/all-prodcut.blade',$data);
    }

}
