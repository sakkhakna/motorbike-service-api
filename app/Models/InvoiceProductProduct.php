<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceProductProduct extends Model
{

    use HasFactory;

    protected $fillable = [
        'product_id',
        'invoice_product_id',
    ]; 

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function invoiceProduct():BelongsTo
    {
        return $this->belongsTo(InvoiceProduct::class);
    }


}
