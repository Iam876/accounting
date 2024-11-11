<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_id',
        'student_id',  // Ensure this is fillable
        'amount_paid',
        'payment_date',
        'payment_method_id',
        'transaction_id'
    ];

    /**
     * Dynamically set the database connection based on the session's `database_year`
     *
     * @return string
     */
    public function getConnectionName()
    {
        return Session::has('database_year') ? 'yearly_database' : $this->connection;
    }

    // Relationships
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
