<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\CartShoppingRequest;

class CartShoppingController extends Controller
{
    /**
     * Get cart shopping
     */
    public function getCartShopping(Request $request)
    {
        if (Cache::has('cart_shopping')) {
            $data = Cache::get('cart_shopping');
            $total_price = $this->getTotalPrice($data);
            return view('user.pages.cart_shopping', [
                'cart_data' => $data,
                'total_price' => $total_price,
            ]);
        }
        return view('user.pages.cart_shopping', [
            'cart_data' => null,
        ]);
    }

    /**
     * Add cart shopping
     */
    public function addCartShopping(CartShoppingRequest $request)
    {
        $old_data = Cache::get('cart_shopping');
        if ($old_data != null) {
            $old_data[] = [
                'id' => $request['id'],
                'product_nm' => $request['product_nm'],
                'color' => $request['color'],
                'size' => $request['size'],
                'quantity' => $request['quantity'],
                'money' => $request['money'],
            ];
            Cache::put('cart_shopping', $old_data, 6000);
        }
        else {
            $data[] = [
                'id' => $request['id'],
                'product_nm' => $request['product_nm'],
                'color' => $request['color'],
                'size' => $request['size'],
                'quantity' => $request['quantity'],
                'money' => $request['money'],
            ];
            Cache::put('cart_shopping', $data, 6000);
        }
        return response()->json(['message' => 'Thêm vào giỏ hàng thành công', 'status' => '201']);
    }

    /**
     * Update cart shopping
     */
    public function updateCartShopping(Request $request)
    {
        $old_data = Cache::get('cart_shopping');
        array_splice($old_data, (int)$request['index'], 1);
        Cache::forget('cart_shopping');
        Cache::put('cart_shopping', $old_data, 6000);
        return response()->json(['message' => 'Cập nhật giỏ hàng thành công', 'status' => '201']);
    }

    /**
     * Get total price for cart shopping
     */
    public function getTotalPrice($data)
    {
        $total_price = 0;
        foreach ($data as $item) {
            $quantity = (int)$item['quantity'];
            $product_price = Products::where('id', $item['id'])->value('price');
            $total_price += $product_price*$quantity;
        }
        return $total_price;
    }
}
