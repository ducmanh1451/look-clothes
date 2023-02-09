<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouse';
    protected $fillable = ['quantity'];

    public function scopeOfId(Builder $query, $id)
    {
        $query
            ->join('products', 'products.id', '=', 'warehouse.product_id')
            ->join('colors', 'colors.id', '=', 'warehouse.color_id')
            ->join('sizes', 'sizes.id', '=', 'warehouse.size_id')
            ->where('warehouse.id', $id)
            ->select(['warehouse.*', 'products.product_nm', 'colors.color_nm', 'sizes.size_nm']);
        return $query;
    }

    /**
     * Scope to product name
     */
    public function scopeOfProductName(Builder $query, $product_nm)
    {
        $query
            ->join('products', 'products.id', '=', 'warehouse.product_id')
            ->join('colors', 'colors.id', '=', 'warehouse.color_id')
            ->join('sizes', 'sizes.id', '=', 'warehouse.size_id')
            ->select(['warehouse.*', 'products.product_nm', 'colors.color_nm', 'sizes.size_nm']);
        $query->when($product_nm != '', function ($query1) use ($product_nm) {
            $query1->where('products.product_nm', 'like', '%' . $product_nm . '%');
        });
        return $query;
    }

    /**
     * Scope to product id
     */
    public function scopeOfProductId(Builder $query, $product_id)
    {
        $query->when($product_id != '', function ($query1) use ($product_id) {
            $query1->where('product_id', $product_id);
        });
        return $query;
    }

    /**
     * Scope to size
     */
    public function scopeOfSize(Builder $query, $size)
    {
        $query->when($size != '', function ($query1) use ($size) {
            $query1->where('size_id', $size);
        });
        return $query;
    }

    /**
     * Scope to color
     */
    public function scopeOfColor(Builder $query, $color)
    {
        $query->when($color != '', function ($query1) use ($color) {
            $query1->where('color_id', $color);
        });
        return $query;
    }
}
