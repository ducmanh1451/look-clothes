<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
// use App\Models\OrdersDetail;
use App\Models\Warehouse;

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

        return view('user.pages.orders', [
            'title' => 'Đặt hàng',
            'products' => $products,
            'total_price' => $total_price,
        ]);
    }

    /**
     * Save order
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // sub product in warehouse
            $list_products = json_decode($request['list-products'], true); 
            foreach ($list_products as $item) {
                $quantity = Warehouse::ofProductId($item['id'])
                    ->ofSize($item['size'])
                    ->ofColor($item['color'])
                    ->pluck('quantity');
                Warehouse::ofProductId($item['id'])
                    ->ofSize($item['size'])
                    ->ofColor($item['color'])
                    ->update([
                        'quantity' => $quantity[0] - (int)$item['quantity']
                    ]);
            }
            $order = new Orders();
            $order->user_id = $request['user_id'];
            $order->total_money = $request['total_money'];
            $order->name = $request['name'];
            $order->phone_number = $request['phone_number'];
            $order->email = $request['email'];
            $order->address = $request['address'];
            $order->province = $request['province'];
            $order->district = $request['district'];
            $order->ward = $request['ward'];
            $order->products_json = $request['list-products'];
            $order->remark = $request['remark'];
            $order->save();
            Cache::forget('cart_shopping');
            //
            DB::commit();
            return response()->json(['message' => 'Đặt hàng thành công!', 'status' => '201']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Error!', 'status' => '404']);
        }
    }

}
