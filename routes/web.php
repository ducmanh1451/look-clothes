<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\CartShoppingController;
use App\Http\Controllers\User\OrdersController;
use App\Http\Controllers\User\WarehouseController;
// 
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsAdminController;
use App\Http\Controllers\Admin\WarehouseAdminController;
use App\Http\Controllers\Admin\OrdersAdminController;
use App\Http\Controllers\Admin\CustomersAdminController;


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
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['AuthLogined','web'])->group(function (){
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('get-dashboard-view');
        // Product route
        Route::get('/products', [ProductsAdminController::class, 'index'])->name('get-product-view');
        Route::get('/products/{id}', [ProductsAdminController::class, 'findProductById'])->name('get-product-by-id');
        Route::post('/products/create', [ProductsAdminController::class, 'create'])->name('create-product');
        Route::post('/products/update', [ProductsAdminController::class, 'update'])->name('update-product');
        Route::post('/products/delete', [ProductsAdminController::class, 'delete'])->name('delete-product');
        // Warehouse route
        Route::get('/warehouse', [WarehouseAdminController::class, 'index'])->name('get-warehouse-view');
        Route::get('/warehouse/{id}', [WarehouseAdminController::class, 'findProductById'])->name('find-product-by-id');
        Route::post('/warehouse/create', [WarehouseAdminController::class, 'create'])->name('create-warehouse');
        Route::post('/warehouse/update', [WarehouseAdminController::class, 'update'])->name('update-warehouse');
        // Order route
        Route::get('/orders', [OrdersAdminController::class, 'index'])->name('get-order-view');
        Route::get('/orders/{id}', [OrdersAdminController::class, 'findOrderById'])->name('find-order-by-id');
        Route::post('/orders/update', [OrdersAdminController::class, 'update'])->name('update-order');
        Route::post('/orders/delete', [OrdersAdminController::class, 'delete'])->name('delete-order');
        // Customer route
        Route::get('/customers', [CustomersAdminController::class, 'index'])->name('get-customer-view');
    });
});