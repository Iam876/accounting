<?php 
namespace App\Services;

use App\Models\Student;
use Carbon\Carbon;

class BillingService
{
    public static function calculateBillingAmount(Student $student, Carbon $billingDate)
    {
        $joinDate = Carbon::parse($student->contract_date);
        $currentMonth = $billingDate->copy();

        $amount = $student->house_rent + $student->utility_fees;
        $isProrated = false;

        if ($joinDate->isSameMonth($currentMonth)) {
            $isProrated = true;
            $joinDay = $joinDate->day;

            if ($joinDay >= 1 && $joinDay <= 3) {
                $amount = $student->house_rent + $student->utility_fees;
            } elseif ($joinDay >= 4 && $joinDay <= 11) {
                $amount *= 0.75;
            } elseif ($joinDay >= 12 && $joinDay <= 19) {
                $amount *= 0.50;
            } elseif ($joinDay >= 20 && $joinDay <= 27) {
                $amount *= 0.25;
            } else {
                $amount = 0;
            }
        }

        return [
            'amount' => round($amount, 2),
            'is_prorated' => $isProrated,
        ];
    }
}
