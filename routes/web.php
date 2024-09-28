<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin_login;
use App\Http\Controllers\Categories;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

URL::forceScheme('http');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[Admin_login::class,'index'])->name('login');
Route::get('/admin',[Admin_login::class,'index'])->name('login');
Route::post('/login',[Admin_login::class,'login']);
Route::get('/admin-logout',[Admin_login::class,'logout']);
Route::get('/profile',[Admin::class,'index'])->name('profile');
Route::post('/admin-update',[Admin::class,'update'])->name('admin-update');
Route::get('/dashboard',[Dashboard::class,'index'])->name('dashboard');
Route::get('/product-categories',[Categories::class,'index'])->name('product-categories');
Route::post('/add-categories',[Categories::class,'add_categories'])->name('add-categories');
Route::post('/update-categories',[Categories::class,'update_categories'])->name('update-categories');
Route::get('/delete-categories/{id}',[Categories::class,'delete_categories'])->name('delete-categories');


// Route::get('/show',[UserController::class,'show'])->name("show");
// Route::post('/insert',[UserController::class,'insert']);
// Route::get('/delete/{id}',[UserController::class,'delete']);
// Route::get('/showuser/{id}',[UserController::class,'showuser']);
