<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::join('categories', 'products.categories_id', '=', 'categories.id')
            ->select('*', 'products.id as products_id', 'products.name as products_name', 'products.status as products_status', 'products.description as products_description', 'products.created_at as products_created_at', 'products.updated_at as products_updated_at', 'categories.name as categories_name')->orderBy('products.id', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());


        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::join('categories', 'products.categories_id', '=', 'categories.id')
            ->select('*', 'products.id as products_id', 'products.name as products_name', 'products.status as products_status', 'products.description as products_description', 'products.created_at as products_created_at', 'products.updated_at as products_updated_at', 'categories.name as categories_name')->where('products.id', $id)->orderBy('products.id', 'desc')->get();

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json($product, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);


        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }
}