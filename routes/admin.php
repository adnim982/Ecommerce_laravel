<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', [IndexController::class, 'index' ])->name('admin');
Route::get('/settings/{setting}/', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
Route::get('category/ajax', [CategoryController::class, 'getall'])->name('category.getall');

Route::resource('categories', CategoryController::class);
Route::get('product/ajax', [CategoryController::class, 'getall'])->name('product.getall');
Route::resource('products', ProductController::class);


