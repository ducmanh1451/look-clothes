<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Products;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class OrdersAdminController extends Controller
{
    /**
     * get orders view
     */
    public function index(Request $request)
    {
        $orders = Orders::paginate(30, ['*'], 'page');
        return view('admin.pages.orders.index', [
            'orders' => $orders,
            'title' => 'Đơn hàng',
        ]);
    }

    /**
     * find order by id
     */
    public function findOrderById(Request $request)
    {
        $id = last($request->segments());
        $order = Orders::find($id);
        return view('admin.pages.orders.detail', [
            'order' => $order,
            'title' => 'Chi tiết đơn hàng',
        ]);
    }

    /**
     * update order
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = Orders::find($request->id);
            $order->name = $request->customer_nm;
            $order->phone_number = $request->phone_number;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->province = $request->province;
            $order->district = $request->district;
            $order->ward = $request->ward;
            $order->remark = $request->remark;
            $order->save();
            DB::commit();
            return redirect()->route('find-order-by-id', ['id' => $request->id]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Cập nhật đơn hàng thất bại', 'status' => '404']);
        }
    }

    /**
     * delete
     */
    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = Orders::find($request->id);
            $order->delete();
            DB::commit();
            return response()->json(['message' => 'Xóa đơn hàng thành công', 'status' => '201']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Cập nhật đơn hàng thất bại', 'status' => '404']);
        }
    }
}
