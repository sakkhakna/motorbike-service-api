<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    use HasFactory;

    protected $fillable = [
        'motorbike_id',
        'mechanic_id',
        'service_date',
        'service_type',
        'service_status',
        'service_cost'
    ];

    public function motorbike(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Motorbike::class);
    }

    public function mechanic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Mechanic::class);
    }
}
