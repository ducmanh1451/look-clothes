<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrdersDetail extends Model
{
    use HasFactory;

    protected $table = 'orders_detail';

    protected $fillable = ['*'];

}
