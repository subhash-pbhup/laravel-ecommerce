<?php

use App\Http\Controllers\Api\Admin;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Categories;
use App\Http\Controllers\Api\Orders;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Products;
use App\Http\Controllers\Api\User;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/products/search', [Products::class, 'search']);
Route::get('/products/collections', [Products::class, 'collections']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
Route::post('/register', [AuthController::class, 'register']);

Route::apiResource('admin', Admin::class);
Route::apiResource('users', User::class);
Route::apiResource('categories', Categories::class);
Route::apiResource('products', Products::class);
Route::apiResource('orders', Orders::class);




// Route::get('/products/search', function () {
//     return "bfhdb";
// });




