<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingMethod extends Model
{
    use HasFactory;

    protected $fillable = ['method_name'] ;

    public function paymentMethod()
    {
        return $this->belongsTo(BillingMethod::class, 'payment_method_id');
    }
}
