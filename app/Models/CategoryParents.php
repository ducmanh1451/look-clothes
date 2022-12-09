<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryParents extends Model
{
    use HasFactory;

    protected $table = 'category_parents';

    public function categories()
    {
        return $this->hasMany('App\Models\Categories', 'category_parent_id', 'id');
    }
}
