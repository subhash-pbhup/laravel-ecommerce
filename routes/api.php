<?php

use App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Api\Categories;
use App\Http\Controllers\Api\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('admin', Admin::class);
Route::apiResource('products-categories', Categories::class);
Route::apiResource('products', Products::class);


