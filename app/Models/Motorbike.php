<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorbike extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'make',
        'model',
        'year',
        'price',
        'plate_number',
        'engine_number',
    ];
}
