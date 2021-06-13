<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
        return view('welcome'); });

 Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

 require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function(){
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/product', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('product_list');
Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('create_product');
Route::post('/admin/product/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('products.store');
Route::put('/admin/product/store', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
Route::post('/admin/category/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('categories_store');
Route::get('/admin/product/edit/{product}', [App\Http\Controllers\Admin\ProductsController::class, 'edit']);
Route::resource('categories',App\Http\Controllers\Admin\CategoriesController::class);
Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoriesController::class, 'create'])->name('create_category');
Route::get('/admin/category/list', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('category_list');
});
Route::get('/products', [App\Http\Controllers\ProductsController::class,'index']);
Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class,'show'])->name('product');
Route::get('/search',[App\Http\Controllers\SearchController::class,'search'])->name('search');
Route::post('/cart/store',[App\Http\COntrollers\OrderItemController::class,'store'])->name('cart_store')->middleware('auth');
Route::get('/order',[App\Http\Controllers\OrderController::class,'index'])->name('order')->middleware('auth');



