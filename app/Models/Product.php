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
        'price',
        'size',
        'material',
        'strap_material',
        'number_compartments',
        'dimensions',
        'color',
        'discount',
        'content',
        'idcat',
    ];
}
