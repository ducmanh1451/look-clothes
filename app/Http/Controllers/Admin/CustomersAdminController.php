<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class CustomersAdminController extends Controller
{
    /**
     * get customer view
     */
    public function index(Request $request)
    {
        $products = Warehouse::ofProductName($request->product_nm)
            ->paginate(30, ['*'], 'page')
            ->withQueryString();
        return view('admin.pages.warehouse.index', [
            'products' => $products,
            'title' => 'Kho hàng',
        ]);
    }

    /**
     * find product by id
     */
    public function findProductById(Request $request)
    {
        $id = last($request->segments());
        $product = Warehouse::ofId($id)->first();
        return view('admin.pages.warehouse.detail', [
            'product' => $product,
            'title' => 'Chi tiết sản phẩm',
        ]);
    }

    /**
     * create warehouse
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $warehouse = new Warehouse();
            $warehouse->product_id = $request->product_id;
            $warehouse->color_id = $request->color;
            $warehouse->size_id = $request->size;
            $warehouse->quantity = $request->quantity;
            $warehouse->save();
            DB::commit();
            return redirect()->route('get-warehouse-view');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Thêm mới kho hàng thất bại', 'status' => '404']);
        }
    }

    /**
     * update warehouse
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $warehouse = Warehouse::find($request->id);
            $warehouse->update([
                'quantity' => $request->quantity,
            ]);
            DB::commit();
            return redirect()->route('find-product-by-id', ['id' => $request->id]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Cập nhật kho hàng thất bại', 'status' => '404']);
        }
    }
}
