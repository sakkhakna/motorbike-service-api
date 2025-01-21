<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceProduct extends Model
{

    use HasFactory;

    protected $fillable = [
        'customer_id',
        'invoice_date',
        'total_amount',
        'payment_status',
    ];

    protected $attributes = [
        'payment_status' => 'pending',
    ];

    public function products():HasMany
    {
        return $this->hasMany(InvoiceProductProduct::class, 'invoice_product_id');
    }
}
