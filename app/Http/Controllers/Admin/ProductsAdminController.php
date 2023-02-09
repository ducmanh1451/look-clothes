<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductsRequest;

class ProductsAdminController extends Controller
{
    /**
     * get product view
     */
    public function index(Request $request)
    {
        $products = Products::ofProduct($request)
            ->paginate(30, ['*'], 'page')
            ->withQueryString();
        return view('admin.pages.products.index', [
            'products' => $products,
            'title' => 'Sản phẩm',
        ]);
    }

    /**
     * find product by id
     */
    public function findProductById(Request $request)
    {
        $id = last($request->segments());
        $product = Products::find($id);
        return view('admin.pages.products.detail', [
            'product' => $product,
            'title' => 'Chi tiết sản phẩm',
        ]);
    }

    /**
     * create product
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($images = $request->file('images')) {
                $images_json = '';
                $path = 'images/database';
                foreach ($images as $key => $item) {
                    $originalName = $item->getClientOriginalName();
                    $images_json .= "$originalName, ";
                    $item->move(public_path('' . $path), $originalName);
                }
                $images_json = substr_replace($images_json, '', strlen($images_json) - 2, strlen($images_json));
            }
            $product = new Products();
            $product->product_nm = $request->product_nm ?? '';
            $product->category_id = $request->category_id ?? '';
            $product->title = $request->title ?? '';
            $product->price = $request->price ?? 0;
            $product->color = $request->color ?? '';
            $product->size = $request->size ?? '';
            $product->is_new_product = $request->is_new_product ?? 0;
            $product->image = $images_json ?? '';
            $product->discount = $request->discount ?? 0;
            $product->save();
            DB::commit();
            return redirect()->route('get-product-view');
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Thêm mới sản phẩm thất bại', 'status' => '404']);
        }
    }

    /**
     * update product
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Products::find($request->id);
            if ($images = $request->file('images')) {
                $images_json = '';
                $path = 'images/database';
                foreach ($images as $key => $item) {
                    $originalName = $item->getClientOriginalName();
                    $images_json .= "$originalName, ";
                    $item->move(public_path('' . $path), $originalName);
                }
                $images_json = substr_replace($images_json, '', strlen($images_json) - 2, strlen($images_json));
            }
            $product->update([
                'product_nm' => $request->product_nm,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'price' => $request->price,
                'color' => $request->color,
                'size' => $request->size,
                'is_new_product' => $request->is_new_product,
                'image' => $images_json,
                'discount' => $request->discount,
            ]);
            DB::commit();
            return redirect()->route('get-product-by-id', ['id' => $request->id]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Cập nhật sản phẩm thất bại', 'status' => '404']);
        }
    }

    /**
     * delete product
     */
    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Products::find($request->id);
            $product->delete();
            DB::commit();
            return response()->json(['message' => 'Xóa sản phẩm thành công', 'status' => '201']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => 'Cập nhật sản phẩm thất bại', 'status' => '404']);
        }
    }
}
