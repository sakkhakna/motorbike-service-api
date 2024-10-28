<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $fillable = [
        'product',
        'from',
        'price_baht',
        'price_dong',
        'price_usd',
        'profit',
        'sale_price',
        'status',
        'quantity',
    ];
}
