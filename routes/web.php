<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\CartShoppingController;
use App\Http\Controllers\User\OrdersController;
use App\Http\Controllers\User\WarehouseController;
use App\Http\Controllers\Admin\LoginController;

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

Route::get('/', [ProductsController::class, 'index'])->name('products');
Route::get('/san-pham-moi', [ProductsController::class, 'getNewProduct'])->name('new-products');
Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', [ProductsController::class, 'search'])->name('search-products');
    Route::get('/chi-tiet/{id}', [ProductsController::class, 'detail'])->name('detail-products');
});
Route::get('/san-pham-sale', [ProductsController::class, 'getSaleProduct'])->name('sale-products');
Route::get('/cart-shopping', [CartShoppingController::class, 'getCartShopping'])->name('get-cart-shopping');
Route::post('/add-cart-shopping', [CartShoppingController::class, 'addCartShopping'])->name('add-cart-shopping');
Route::post('/update-cart-shopping', [CartShoppingController::class, 'updateCartShopping'])->name('update-cart-shopping');
Route::get('/dat-hang', [OrdersController::class, 'index'])->name('orders');
Route::post('/store-order', [OrdersController::class, 'store'])->name('store-order');
Route::post('/kiem-tra-hang', [WarehouseController::class, 'checkProductAvailable'])->name('check-product-available');


Route::get('/login', [LoginController::class, 'index'])->name('get-login-view');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('admin', function () {
    return view('admin.admin_template');
});