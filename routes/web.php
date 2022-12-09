<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductsController;

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

Route::get('admin', function () {
    return view('admin.admin_template');
});

Route::get('/', [ProductsController::class, 'index'])->name('products');
Route::get('/san-pham-moi', [ProductsController::class, 'getNewProduct'])->name('new-products');
Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', [ProductsController::class, 'search'])->name('search-products');
    Route::get('/chi-tiet/{id}', [ProductsController::class, 'detail'])->name('detail-products');
});
Route::get('/san-pham-sale', [ProductsController::class, 'getSaleProduct'])->name('sale-products');
