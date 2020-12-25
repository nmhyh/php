<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table="orderdetail";
    protected $fillable = [
        'quantity',
        'id_order',
        'id_product',
        'status',
    ];
}
