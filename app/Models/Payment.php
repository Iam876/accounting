<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_id',
        'amount',
        'payment_method_id',
        'payment_id',
        'payment_date',
    ];

    public function billing()
    {
        return $this->belongsTo(Billings::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(BillingMethod::class);
    }
}
