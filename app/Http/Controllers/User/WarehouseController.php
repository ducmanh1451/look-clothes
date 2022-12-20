<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Check product available
     */
    public function checkProductAvailable(Request $request)
    {
        $products = Warehouse::where('product_id', $request['product_id'])
            ->when($request['color_id'] != null, function ($query1) use ($request) {
                $query1->where('color_id', $request['color_id']);
            })
            ->when($request['size_id'] != null, function ($query1) use ($request) {
                $query1->where('size_id', $request['size_id']);
            })
            ->where('quantity', '>', 0)
            ->get();
        $total_product_available = 0;
        $message = '';
        $availale = 1;
        if ($products->isNotEmpty()) {
            foreach ($products as $item) {
                $total_product_available += $item['quantity'];
            }
        }
        if ($total_product_available > 0) {
            $message = 'Còn ' . $total_product_available . ' sản phẩm trong kho hàng!';
        }
        else {
            $message = 'Hết hàng!';
            $availale = 0;
        }
        return response()->json(['message' => $message, 'product_available' => $availale,'status' => '201']);
    }
}
