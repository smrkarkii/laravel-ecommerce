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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/product', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('product_list');
Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductsController::class, 'create'])->name('create_product');
Route::post('/admin/product/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('products.store');
Route::get('/admin/product/edit/{product}', [App\Http\Controllers\Admin\ProductsController::class, 'edit']);
Route::resource('categories',App\Http\Controllers\Admin\CategoriesController::class);
Route::get('/products', [App\Http\Controllers\ProductsController::class,'index']);