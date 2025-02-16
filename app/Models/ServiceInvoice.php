<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInvoice extends Model
{

    use HasFactory;

    protected $fillable = [
        'service_id',
        'customer_id',
        'invoice_date',
        'total_amount',
        'payment_status'
    ];
}
