<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;

    protected $table = 'colors';

    public static function getColorHexCode($id)
    {
        return Colors::find($id)->color_hex_cd;
    }

    public static function getColorName($id)
    {
        return Colors::find($id)->color_nm;
    }
}
