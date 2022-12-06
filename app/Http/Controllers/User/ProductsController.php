<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Show the products index (get all products)
     * @author manhnd
     * @created at 2022-12-06
     * @return View
     */
    public function index()
    {
        $data_table = [
            [
                'id' => '1',
                'product_cd' => 'P5-001',
                'product_nm' => 'IDLE CLUB WINDTRACK PANT',
                'category_id' => '5',
                'title' => 'IDLE CLUB WINDTRACK PANT',
                'price' => '449000',
                'color' => '#ee6aa7, #4b98d5',
                'image' => '_166929176911_1.jpg, _16692917186_1.jpg',
            ],
            [
                'id' => '2',
                'product_cd' => 'P10-001',
                'product_nm' => 'IDLE FLEECE JACKET',
                'category_id' => '10',
                'title' => 'IDLE FLEECE JACKET',
                'price' => '699000',
                'color' => '#000000',
                'image' => '33.jpg',
            ],
            [
                'id' => '3',
                'product_cd' => 'P2-001',
                'product_nm' => 'KOEN SHIRT',
                'category_id' => '2',
                'title' => 'KOEN SHIRT',
                'price' => '450000',
                'color' => '#ed0000',
                'image' => '38.jpg',
            ],
            [
                'id' => '4',
                'product_cd' => 'P10-002',
                'product_nm' => 'IDLE WATERPROOF JACKET',
                'category_id' => '10',
                'title' => 'IDLE WATERPROOF JACKET',
                'price' => '899000',
                'color' => '#000000',
                'image' => '44.jpg',
            ],
        ];

        // $this->combineColor($data_table);
        return view('user.pages.products', ['products' => $data_table]);
    }

    public function combineColor($data_table)
    {
        foreach ($data_table as $item) {
            if (str_contains($item['color'], ',') || str_contains($item['image'], ',')) {
                $array = explode(' ', str_replace(',', '', $item['color']));
                $item['color'] = $array;
            }
        }
    }
}
