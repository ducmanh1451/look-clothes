<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Categories;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function categories()
    {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    /**
	 * Scope to all products 
	 */
    public function scopeOfProduct(Builder $query, Request $request)
    {
        $query->when(!empty($request['string']), function ($query1) use ($request) {
            $query1->where('product_nm', 'like', '%' . $request['string'] . '%');
        });
        $query->when(!empty($request['parent-id']), function ($query1) use ($request) {
            $arr = $this->getCategoriesID($request);
            $query1->whereIn('category_id', $arr);
        });
        $query->when(!empty($request['category-id']), function ($query1) use ($request) {
            $query1->where('category_id', $request['category-id']);
        });
        return $query;
    }

    /**
	 * Scope to new products 
	 */
    public function scopeOfNewProduct(Builder $query, Request $request)
    {   
        return $query->where('is_new_product', 1);
    }

    /**
	 * Scope to sale products 
	 */
    public function scopeOfSaleProduct(Builder $query, Request $request)
    {   
        return $query->where('discount', '>', 0);
    }

    /**
	 * Get array CategoriesID from category_parent_id
	 */
    public function getCategoriesID($request)
    {
        $id_arr = [];
        $categories = Categories::where('category_parent_id', $request['parent-id'])->get();
        foreach ($categories as $category) {
            $id_arr[] = $category->id;
        }
        return $id_arr;
    }
}
