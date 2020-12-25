<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'total',
        'idsup',
        'iduser',
        'status',
    ];
    protected $table="receipt";
}
