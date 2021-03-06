<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable = [
        'name',
        'image',
        'image2',
        'image3',
        'price',
        'size',
        'material',
        'strap_material',
        'quantity',
        'locktype',
        'number_compartments',
        'dimensions',
        'color',
        'discount',
        'content',
        'idcat',
        'idbra',
        'idsize',
    ];
}
