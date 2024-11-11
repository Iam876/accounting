<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class Billings extends Model
{
    use HasFactory;

    const STATUS_PAID = 'paid';
    const STATUS_UNPAID = 'unpaid';
    const STATUS_PARTIALLY_PAID = 'partially_paid';
    const STATUS_OVERDUE = 'overdue';
    const STATUS_SETTLED = 'settled';

    protected $fillable = [
        'student_id', 'billing_month', 'total_amount', 'payment_status', 'completed_billing', 'payment_method_id'
    ];

    /**
     * Dynamically set the database connection based on the session's `database_year`
     *
     * @return string
     */
    public function getConnectionName()
    {
        // Use `yearly_database` if a `database_year` is set, otherwise the default
        return Session::has('database_year') ? 'yearly_database' : $this->connection;
    }

    // Relationship to Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
    // Relationship to Payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Calculate the total amount paid based on the related payments
    public function getTotalPaidAttribute()
    {
        return $this->payments->sum('amount_paid');
    }

    // Calculate the balance due dynamically by subtracting total paid from total amount
    public function getBalanceDueAttribute()
    {
        return max(0, $this->total_amount - $this->total_paid);
    }

    // Check and update the payment status based on payments
    public function updateBillingStatus()
    {
        $totalPaid = $this->total_paid;

        if ($totalPaid >= $this->total_amount) {
            $this->payment_status = self::STATUS_PAID;
            $this->completed_billing = true;
        } elseif ($totalPaid > 0 && $totalPaid < $this->total_amount) {
            $this->payment_status = self::STATUS_PARTIALLY_PAID;
        } else {
            $this->payment_status = self::STATUS_UNPAID;
        }

        // Check if the billing is overdue
        if ($this->payment_status !== self::STATUS_PAID && $this->billing_month->lt(Carbon::now())) {
            $this->payment_status = self::STATUS_OVERDUE;
        }

        $this->save();
    }
}
