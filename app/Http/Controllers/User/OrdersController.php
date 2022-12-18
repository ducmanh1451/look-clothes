<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OrdersController extends Controller
{
    /**
     * Get cart shopping
     */
    public function index(Request $request)
    {
        if (!Cache::has('cart_shopping')) {
            return view('error.empty_cart_shopping');
        }
        $products = Cache::get('cart_shopping');
        
        $test = new CartShoppingController();
        $total_price = $test->getTotalPrice($products);

        // $total_price = $this->getTotalPrice($products);
        return view('user.pages.orders', [
            'title' => 'Đặt hàng',
            'products' => $products,
            'total_price' => $total_price,
        ]);
    }

}
