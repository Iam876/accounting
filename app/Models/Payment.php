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

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
    public function billing()
    {
        return $this->belongsTo(Billings::class, 'billing_id'); // Correct foreign key: billing_id
    }

    public function paymentMethod()
    {
        return $this->belongsTo(BillingMethod::class);
    }
}
