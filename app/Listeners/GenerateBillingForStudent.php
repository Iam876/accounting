<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\StudentAdded;
use App\Models\Billings;
use Carbon\Carbon;

class GenerateBillingForStudent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentAdded $event)
    {
        $student = $event->student;
        
        // Automatically create the billing for the student if the student has an active contract
        if ($student->contract_status === 'active') {
            Billings::create([
                'student_id' => $student->id,
                'billing_month' => Carbon::now(),
                'total_amount' => $student->house_rent + $student->utility_fees,
                'balance_due' => $student->house_rent + $student->utility_fees,
                'payment_status' => Billings::STATUS_UNPAID,
            ]);
        }
    }
}
