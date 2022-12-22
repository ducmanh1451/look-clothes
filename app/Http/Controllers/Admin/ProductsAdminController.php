<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

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
            'title' => 'Sản phẩm'
        ]);
    }

    /**
     * find product by id
     */
    public function findProductById(Request $request)
    {
        $id = last($request->segments());
        return view('admin.pages.products.detail', [
            // 'products' => $products, 
            'title' => 'Chi tiết sản phẩm'
        ]);
    }
}
