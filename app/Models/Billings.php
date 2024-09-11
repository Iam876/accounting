<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Billings extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'apartment_id',
        'billing_start_month',
        'package_id',
        'rent',
        'utility_fees',
        'initial_costs',
        'initial_costs_collection_date',
        'rent_collection_date',
        'utilities_collection_date',
        'payment_method_id',
        'payment_id',
        'completed_billing',
    ];

    protected $casts = [
        'billing_start_month' => 'date',
        'initial_costs_collection_date' => 'date',
        'rent_collection_date' => 'date',
        'utilities_collection_date' => 'date',
    ];

    public function payments()
{
    return $this->hasMany(Payment::class, 'billing_id');
}


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function package()
    {
        return $this->belongsTo(PackageChoose::class, 'package_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(BillingMethod::class, 'payment_method_id');
    }

    // Check if the billing is fully paid (Rent + Initial Costs)
    public function isPaid()
    {
        return $this->payments->sum('amount') >= $this->rent + $this->initial_costs;
    }

    public function isPartiallyPaid()
    {
        $totalPaid = $this->payments->sum('amount');
        return $totalPaid > 0 && $totalPaid < $this->rent + $this->initial_costs;
    }

    public function isUnpaid()
    {
        return $this->payments->sum('amount') == 0;
    }

    public function isOverdue()
    {
        return !$this->isPaid() && now()->greaterThan($this->rent_collection_date);
    }

    public function getTotalAmountAttribute()
    {
        return $this->rent + $this->utility_fees + $this->initial_costs;
    }

    public function getDueAmountAttribute()
    {
        $totalCost = $this->rent + $this->utility_fees + $this->initial_costs;
        $totalPaid = $this->payments->sum('amount');
        return max(0, $totalCost - $totalPaid); // Ensure no negative due amounts
    }

    // Check if rent is paid
    public function isRentPaid()
    {
        return round($this->payments->where('payment_type_id', 1)->sum('amount'), 2) >= round($this->rent, 2);
    }


    // Check if advance is paid
    public function isAdvancePaid()
    {
        return $this->payments->where('payment_type_id', 3)->sum('amount') >= $this->initial_costs;
    }
}
