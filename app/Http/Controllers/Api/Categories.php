<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories as ModelsCategories;
use Illuminate\Http\Request;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  $data = ModelsCategories::where('status',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = ModelsCategories::create($request->all());

        return response()->json($product, 201);

        // return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $categories = ModelsCategories::where('slug', $slug)->get();

        if (!$categories) {
            return response()->json([
                'message' => 'Categories not found'
            ], 404);
        }

        return response()->json($categories, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = ModelsCategories::find($id);


        $categories->update($request->all());

        return response()->json([
            'message' => 'Categories updated successfully',
            'product' => $categories
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $categories = ModelsCategories::find($id);


        if (!$categories) {
            return response()->json([
                'message' => 'Categories not found'
            ], 404);
        }

        $categories->delete();

        return response()->json([
            'message' => 'Categories deleted successfully'
        ], 200);
    }
}
