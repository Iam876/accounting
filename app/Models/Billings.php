<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Billings extends Model
{
    use HasFactory;

    const STATUS_PAID = 'paid';
    const STATUS_UNPAID = 'unpaid';
    const STATUS_PARTIALLY_PAID = 'partially_paid';
    const STATUS_OVERDUE = 'overdue';
    const STATUS_SETTLED = 'settled';

    protected $fillable = [
        'student_id', 'billing_month', 'total_amount', 'amount_paid', 'balance_due', 'payment_status', 'completed_billing', 'payment_method_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function updateBillingStatus($amountPaid)
    {
        $this->amount_paid += $amountPaid;
        $this->balance_due -= $amountPaid;

        if ($this->balance_due <= 0) {
            $this->payment_status = self::STATUS_PAID;
            $this->completed_billing = true;
        } elseif ($this->amount_paid > 0 && $this->balance_due > 0) {
            $this->payment_status = self::STATUS_PARTIALLY_PAID;
        }

        $this->save();
    }

}
