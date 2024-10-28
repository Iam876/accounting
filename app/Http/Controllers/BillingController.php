<?php

namespace App\Http\Controllers;

use App\Models\Billings;
use App\Models\Student;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    // Generate Billing Automatically Each Month
    // public function generateMonthlyBilling()
    // {
    //     $students = Student::where('contract_status', 'active')->get();
        
    //     foreach ($students as $student) {
    //         $existingBill = Billings::where('student_id', $student->id)
    //             ->whereMonth('billing_month', Carbon::now()->month)
    //             ->whereYear('billing_month', Carbon::now()->year)
    //             ->first();

    //         if (!$existingBill) {
    //             Billings::create([
    //                 'student_id' => $student->id,
    //                 'billing_month' => Carbon::now(),
    //                 'total_amount' => $student->initial_fees + $student->house_rent + $student->utility_fees,
    //                 'balance_due' => $student->initial_fees + $student->house_rent + $student->utility_fees,
    //                 'payment_status' => Billings::STATUS_UNPAID,
    //             ]);
    //         }
    //     }
    // }

    public function generateMonthlyBilling()
{
    // Get all students with active contracts
    $students = Student::where('contract_status', 'active')->get();
    
    foreach ($students as $student) {
        // Check if the billing for the current month already exists
        $existingBill = Billings::where('student_id', $student->id)
            ->whereMonth('billing_month', Carbon::now()->month)
            ->whereYear('billing_month', Carbon::now()->year)
            ->first();

        // If no billing exists for the current month, create one
        if (!$existingBill) {
            Billings::create([
                'student_id' => $student->id,
                'billing_month' => Carbon::now(),
                'total_amount' => $student->house_rent + $student->utility_fees, // Calculated from the student data
                'balance_due' => $student->house_rent + $student->utility_fees, // Same as total initially
                'payment_status' => Billings::STATUS_UNPAID, // Initial status is unpaid
            ]);
        }
    }
}


    // Update Payment Status Based on Billing Month
    public function updatePayment(Request $request, $billingId)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0',
            'payment_method_id' => 'required|exists:billing_methods,id',
            'transaction_id' => 'nullable|string'
        ]);

        $billing = Billings::findOrFail($billingId);
        
        Payment::create([
            'billing_id' => $billing->id,
            'student_id' => $billing->student_id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => Carbon::now(),
            'payment_method_id' => $request->payment_method_id,
            'transaction_id' => $request->transaction_id,
        ]);

        // Update billing record
        $billing->updateBillingStatus($request->amount_paid);
        
        return response()->json(['message' => 'Payment updated successfully', 'billing' => $billing], 200);
    }

    // Update Multiple Dues for a Student
    public function updateMultipleDues(Request $request, $studentId)
    {
        $request->validate([
            'total_amount_paid' => 'required|numeric|min:0',
            'payment_method_id' => 'required|exists:billing_methods,id',
            'transaction_id' => 'nullable|string'
        ]);

        DB::beginTransaction();

        try {
            $billings = Billings::where('student_id', $studentId)->where('balance_due', '>', 0)->orderBy('billing_month')->get();
            $totalAmountToPay = $request->total_amount_paid;

            $updatedBillings = [];

            foreach ($billings as $billing) {
                if ($totalAmountToPay <= 0) {
                    break;
                }

                $amountToPay = min($totalAmountToPay, $billing->balance_due);

                Payment::create([
                    'billing_id' => $billing->id,
                    'student_id' => $billing->student_id,
                    'amount_paid' => $amountToPay,
                    'payment_date' => Carbon::now(),
                    'payment_method_id' => $request->payment_method_id,
                    'transaction_id' => $request->transaction_id,
                ]);

                // Update billing record
                $billing->updateBillingStatus($amountToPay);
                $totalAmountToPay -= $amountToPay;

                $updatedBillings[] = $billing;
            }

            DB::commit();

            return response()->json(['message' => 'Dues updated successfully', 'updated_billings' => $updatedBillings], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error updating dues: ' . $e->getMessage()], 500);
        }
    }

    // Get Pending Dues for a Student
    public function getPendingDues($studentId)
    {
        $pendingBillings = Billings::where('student_id', $studentId)->where('balance_due', '>', 0)->orderBy('billing_month')->get();
        return response()->json(['pending_billings' => $pendingBillings], 200);
    }

    // Close Account After Contract Cancellation
    public function closeAccount($studentId)
    {
        $student = Student::findOrFail($studentId);
        $student->contract_status = 'cancelled';
        $student->termination_date = Carbon::now();
        $student->save();

        // Mark all outstanding bills as settled
        Billings::where('student_id', $studentId)->where('balance_due', '>', 0)
            ->update(['payment_status' => Billings::STATUS_SETTLED]);

        return response()->json(['message' => 'Account closed successfully'], 200);
    }
}

