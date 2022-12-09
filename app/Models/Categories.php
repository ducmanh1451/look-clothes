<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany('App\Models\Products', 'category_id', 'id');
    }

    public function categoryParents()
    {
        return $this->belongsTo('App\Models\CategoryParents', 'category_parent_id', 'id');
    }
}
