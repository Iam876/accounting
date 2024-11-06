<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Billings;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    // public function store(Request $request)
    // {
    //     // Validate the incoming request
    //     $request->validate([
    //         'billing_id' => 'required|exists:billings,id',
    //         'student_id' => 'required|exists:students,id',  // Ensure student_id is required and exists
    //         'payment_method_id' => 'required|exists:billing_methods,id',
    //         'amount_paid' => 'required|numeric|min:0',
    //         'payment_date' => 'required|date',
    //         'transaction_id' => 'nullable|string|max:255',
    //     ]);

    //     // Start a database transaction to ensure data integrity
    //     DB::beginTransaction();

    //     try {
    //         // Get the student's unpaid billings, sorted by billing month
    //         $unpaidBillings = Billings::where('student_id', $request->student_id)
    //             ->where('payment_status', '!=', 'paid')
    //             ->orderBy('billing_month', 'asc')
    //             ->get();

    //         $remainingAmount = $request->amount_paid;

    //         foreach ($unpaidBillings as $billing) {
    //             if ($remainingAmount <= 0) {
    //                 break; // Stop if the payment has been fully distributed
    //             }

    //             // Calculate the outstanding balance for this billing
    //             $outstandingBalance = $billing->total_amount - $billing->amount_paid;

    //             // Determine how much of the remaining amount can be applied to this billing
    //             $paymentToApply = min($remainingAmount, $outstandingBalance);

    //             // Record the payment for this billing
    //             Payment::create([
    //                 'billing_id' => $billing->id,
    //                 'student_id' => $billing->student_id,
    //                 'amount_paid' => $paymentToApply,
    //                 'payment_date' => Carbon::parse($request->payment_date),
    //                 'payment_method_id' => $request->payment_method_id,
    //                 'transaction_id' => $request->transaction_id,
    //             ]);

    //             // Update the amount paid in the billing record
    //             $billing->amount_paid += $paymentToApply;

    //             // Update the payment status based on the new amount paid
    //             $balanceDue = $billing->total_amount - $billing->amount_paid;
    //             if ($balanceDue <= 0) {
    //                 $billing->payment_status = Billings::STATUS_PAID;
    //                 $billing->completed_billing = true;
    //             } elseif ($billing->amount_paid > 0 && $balanceDue > 0) {
    //                 $billing->payment_status = Billings::STATUS_PARTIALLY_PAID;
    //             }

    //             // Save the updated billing
    //             $billing->save();

    //             // Reduce the remaining payment amount
    //             $remainingAmount -= $paymentToApply;
    //         }

    //         // Commit the transaction
    //         DB::commit();

    //         return response()->json(['message' => 'Payment recorded and billing updated successfully']);
    //     } catch (\Exception $e) {
    //         // Rollback the transaction in case of any error
    //         DB::rollBack();

    //         // Log the error and return error response
    //         Log::error('Failed to process payment: ' . $e->getMessage());

    //         return response()->json(['error' => 'Failed to process payment', 'details' => $e->getMessage()], 500);
    //     }
    // }



    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'billing_id' => 'required|exists:billings,id',
    //         'student_id' => 'required|exists:students,id',
    //         'payment_method_id' => 'required|exists:billing_methods,id',
    //         'amount_paid' => 'required|numeric|min:0',
    //         'payment_date' => 'required|date',
    //         'transaction_id' => 'nullable|string|max:255',
    //         'pending_dues' => 'required|array'  // Array of selected months
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         // Calculate the amount to distribute per selected due month
    //         $selectedMonths = $request->pending_dues;
    //         $totalAmountPaid = $request->amount_paid;
    //         $paymentPerMonth = $totalAmountPaid / count($selectedMonths);

    //         foreach ($selectedMonths as $selectedMonth) {
    //             $billing = Billings::where('student_id', $request->student_id)
    //                 ->where(DB::raw("DATE_FORMAT(billing_month, '%Y-%m')"), $selectedMonth)
    //                 ->first();

    //             if ($billing) {
    //                 // Create a payment entry
    //                 Payment::create([
    //                     'billing_id' => $billing->id,
    //                     'student_id' => $request->student_id,
    //                     'amount_paid' => $paymentPerMonth,
    //                     'payment_date' => Carbon::parse($request->payment_date),
    //                     'payment_method_id' => $request->payment_method_id,
    //                     'transaction_id' => $request->transaction_id,
    //                 ]);

    //                 // Update the billing record
    //                 $billing->amount_paid += $paymentPerMonth;
    //                 $balanceDue = max(0, $billing->total_amount - $billing->amount_paid);

    //                 // Update payment status
    //                 if ($balanceDue <= 0) {
    //                     $billing->payment_status = 'paid';
    //                 } elseif ($billing->amount_paid > 0 && $balanceDue > 0) {
    //                     $billing->payment_status = 'partially_paid';
    //                 } else {
    //                     $billing->payment_status = 'unpaid';
    //                 }

    //                 $billing->save();
    //             }
    //         }

    //         DB::commit();
    //         return response()->json(['message' => 'Payment recorded successfully']);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['error' => 'Failed to process payment', 'details' => $e->getMessage()], 500);
    //     }
    // }




    public function store(Request $request)
    {
        $request->validate([
            'billing_id' => 'required|exists:billings,id',
            'student_id' => 'required|exists:students,id',
            'payment_method_id' => 'required|exists:billing_methods,id',
            'amount_paid' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'transaction_id' => 'nullable|string|max:255',
            'pending_dues' => 'required|array'  // Array of selected months
        ]);

        DB::beginTransaction();

        try {
            // Calculate the amount to distribute per selected due month
            $selectedMonths = $request->pending_dues;
            $totalAmountPaid = $request->amount_paid;
            $paymentPerMonth = $totalAmountPaid / count($selectedMonths);

            foreach ($selectedMonths as $selectedMonth) {
                $billing = Billings::where('student_id', $request->student_id)
                    ->where(DB::raw("DATE_FORMAT(billing_month, '%Y-%m')"), $selectedMonth)
                    ->first();

                if ($billing) {
                    // Create a payment entry
                    Payment::create([
                        'billing_id' => $billing->id,
                        'student_id' => $request->student_id,
                        'amount_paid' => $paymentPerMonth,
                        'payment_date' => Carbon::parse($request->payment_date),
                        'payment_method_id' => $request->payment_method_id,
                        'transaction_id' => $request->transaction_id,
                    ]);

                    // Update the billing record
                    $billing->amount_paid += $paymentPerMonth;
                    $balanceDue = max(0, $billing->total_amount - $billing->amount_paid);

                    // Update payment status
                    if ($balanceDue <= 0) {
                        $billing->payment_status = 'paid';
                    } elseif ($billing->amount_paid > 0 && $balanceDue > 0) {
                        $billing->payment_status = 'partially_paid';
                    } else {
                        $billing->payment_status = 'unpaid';
                    }

                    $billing->save();
                }
            }

            DB::commit();
            return response()->json(['message' => 'Payment recorded successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to process payment', 'details' => $e->getMessage()], 500);
        }
    }


}
