<?php

namespace App\Listeners;

use App\Services\BillingService;
use App\Events\StudentAdded;
use App\Models\Billings;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class GenerateBillingForStudent
{
    /**
     * Handle the event.
     */
    public function handle(StudentAdded $event)
    {
        $student = $event->student;
        Log::info('GenerateBillingForStudent listener triggered for student ID: ' . $student->id);

        // Generate billing only if the student's contract is active
        if ($student->contract_status === 'active') {
            $billingDate = Carbon::now()->day(20); // Generate billing on the 20th of the current month

            // Calculate the billing amount using your service
            $billingAmount = BillingService::calculateBillingAmount($student, $billingDate);

            // Create the billing entry in the database
            $billing = Billings::create([
                'student_id' => $student->id,
                'billing_month' => $billingDate,
                'total_amount' => $billingAmount['amount'],
                'amount_paid' => 0,
                'payment_status' => Billings::STATUS_UNPAID, // Billing starts as unpaid
            ]);

            // Optionally log that billing was created
            Log::info('Billing created for student ID: ' . $student->id . ' with amount: ' . $billingAmount['amount']);
        } else {
            Log::info('Student contract is not active. No billing generated for student ID: ' . $student->id);
        }
    }
}
