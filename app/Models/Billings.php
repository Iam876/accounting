<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function payments()
    {
        return $this->hasMany(Payment::class);
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
}
