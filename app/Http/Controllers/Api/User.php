<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ModelsUser::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $product = ModelsUser::create($request->all());


        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user= ModelsUser::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'user not found'
            ], 404);
        }

        return response()->json($user, 201);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = ModelsUser::find($id);

        $user->update($request->all());

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
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
