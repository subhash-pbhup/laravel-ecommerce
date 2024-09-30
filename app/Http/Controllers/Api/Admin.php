<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin_model;
use Illuminate\Http\Request;

class Admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return  $data= Admin_model::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = Admin_model::find($id);
        $admin->update($request->all());

        return response()->json([
            'message' => 'Admin updated successfully',
            'product' => $admin
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
