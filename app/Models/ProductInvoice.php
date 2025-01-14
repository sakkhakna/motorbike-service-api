<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{

    use HasFactory;

    protected $fillable = [
        'customer_id',
        'invoice_date',
        'total_amount',
        'payment_status',
    ];
}
