<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['*'];

}
