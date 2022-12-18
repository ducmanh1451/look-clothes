<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Get all products
     */
    public function index(Request $request)
    {
        $products = Products::paginate(6, ['*'], 'page')->withQueryString();
        if ($products->isEmpty()) {
            return view('error.not_find_product');
        }
        return view('user.pages.products', [
            'products' => $products,
            'title' => 'Sản phẩm',
        ]);
    }

    /**
     * Find products by category_id, category_parent_id, string
     */
    public function search(Request $request)
    {
        $products = Products::ofProduct($request)
            ->paginate(6, ['*'], 'page')
            ->withQueryString();
        $title = $this->getTitlePage($request, $products[0]);
        if ($products->isEmpty()) {
            return view('error.not_find_product');
        }
        return view('user.pages.products', [
            'products' => $products,
            'title' => $title,
        ]);
    }

    /**
     * Get all new products
     */
    public function getNewProduct(Request $request)
    {
        $products = Products::ofNewProduct($request)
            ->paginate(6, ['*'], 'page')
            ->withQueryString();
        if ($products->isEmpty()) {
            return view('error.not_find_product');
        }
        return view('user.pages.products', [
            'products' => $products,
            'title' => 'Sản phẩm mới',
        ]);
    }

    /**
     * Get all new products
     */
    public function getSaleProduct(Request $request)
    {
        $products = Products::ofSaleProduct($request)
            ->paginate(6, ['*'], 'page')
            ->withQueryString();
        if ($products->isEmpty()) {
            return view('error.not_find_product');
        }
        return view('user.pages.products', [
            'products' => $products,
            'title' => 'Sản phẩm Sale',
        ]);
    }

    /**
     * Get all new products
     */
    public function detail(Request $request)
    {
        $product = Products::find($request->segment(3));
        if (is_null($product)) {
            return view('error.500');
        }
        return view('user.pages.detail', [
            'product' => $product,
            'title' => 'Chi tiết sản phẩm',
        ]);
    }

    /**
     * Get title page
     */
    public function getTitlePage(Request $request, $product)
    {
        if (!empty($request['parent-id'])) {
            return $product->categories->categoryParents->category_parent_nm;
        } elseif (!empty($request['category-id'])) {
            return $product->categories->category_nm;
        }
    }
    
}
