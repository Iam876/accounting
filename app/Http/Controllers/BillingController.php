<?php

namespace App\Http\Controllers;

use App\Models\Billings;
use App\Models\Payment;
use App\Models\BillingMethod;
use App\Models\Student;
use Illuminate\Http\Request;

use App\Helpers\DatabaseSwitcher;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Console\Commands\CreateYearlyDatabase;

class BillingController extends Controller
{
    public function index()
    {
        return view('billing_index');
    }

    public function fetchData(Request $request, $status = null)
    {
        // Base query to get the latest billing per student
        $billings = Billings::with(['student', 'student.apartment', 'student.room'])
            ->select('id', 'student_id', 'billing_month', 'total_amount', 'payment_status')
            ->whereIn('id', function ($query) {
                // Get the latest billing entry per student
                $query->select(DB::raw('MAX(id)'))
                    ->from('billings')
                    ->groupBy('student_id');
            })
            ->orderBy('billing_month', 'desc');

        // Apply status filter if provided (except for overdue)
        if ($status && $status !== 'overdue') {
            $billings = $billings->where('payment_status', $status);
        }

        $billings = $billings->get();

        // Modify the billings data as needed
        $billings = $billings->map(function ($billing) {
            $student = $billing->student;

            // Calculate the total amount paid using the payment table
            $totalPaid = Payment::where('billing_id', $billing->id)->sum('amount_paid');
            $billing->amount_paid = $totalPaid;
            $billing->total_due_amount = $billing->total_amount - $totalPaid;
            $totalDues = Billings::where('student_id', $billing->student_id)
                ->where('payment_status', '!=', 'paid')
                ->sum('total_amount');
            $billing->total_dues = $totalDues;
            // Get the unpaid bills for the student
            $unpaidBills = Billings::where('student_id', $billing->student_id)
                ->where('payment_status', '!=', 'paid')
                ->get();
            $unpaidMonths = $unpaidBills->pluck('billing_month')->toArray();

            // Check if the billing is overdue (more than 1 unpaid month)
            $billing->overdue = count($unpaidMonths) > 1 ? 'Yes' : 'No';

            // Set overdue status dynamically
            if (count($unpaidMonths) > 1) {
                $billing->payment_status = 'overdue';
            }

            return $billing;
        });

        // If filtering by overdue, return only those with more than 1 unpaid month
        if ($status === 'overdue') {
            $billings = $billings->filter(function ($billing) {
                return $billing->overdue === 'Yes';
            });
        }

        return response()->json($billings);
    }


    // public function generateMonthlyBilling()
    // {
    //     // Set billing date to the 20th of the month for the billing cycle
    //     $billingDate = Carbon::parse('2024-12-20');

    //     // Fetch all students with active contracts
    //     $students = Student::where('contract_status', 'active')->get();

    //     // Iterate over each active student
    //     foreach ($students as $student) {
    //         // Check if the student already has a billing entry for the current billing month/year
    //         $existingBill = Billings::where('student_id', $student->id)
    //             ->whereMonth('billing_month', $billingDate->month)
    //             ->whereYear('billing_month', $billingDate->year)
    //             ->exists();

    //         // Skip if billing for this student already exists for this month
    //         if ($existingBill) {
    //             continue;
    //         }

    //         // Calculate the base amount (house rent + utility fees)
    //         $baseAmount = $student->house_rent + $student->utility_fees;

    //         // Create a new billing entry in the `billings` table
    //         $billing = Billings::create([
    //             'student_id' => $student->id,
    //             'billing_month' => $billingDate, // Set billing date to the 20th of the current month
    //             'total_amount' => round($baseAmount, 2),
    //             'amount_paid' => 0,  // Initially no amount is paid
    //             'payment_status' => 'unpaid',  // Status is unpaid by default
    //         ]);
    //     }
    // }



    // public function generateMonthlyBilling()
    // {
    //     // Set the billing date to the 20th of the current month
    //     // $billingDate = Carbon::now()->setDay(20);
    //     $billingDate = Carbon::parse('2025-4-20');


    //     // Log the current billing date
    //     Log::info('Billing Date:', ['billing_date' => $billingDate->toDateString()]);

    //     // Get the current year and month
    //     $currentYear = $billingDate->year;
    //     $currentMonth = $billingDate->month;

    //     // Determine the fiscal year for billing purposes
    //     if ($currentMonth >= 4) {
    //         $fiscalYear = $currentYear;
    //     } else {
    //         $fiscalYear = $currentYear - 1;
    //     }

    //     // Log the determined fiscal year
    //     Log::info('Determined Fiscal Year:', ['fiscal_year' => $fiscalYear]);

    //     // Attempt to switch to the yearly database for the determined fiscal year
    //     try {
    //         DatabaseSwitcher::switchToYearlyDatabase($fiscalYear);
    //         Log::info('Database switched successfully', ['database' => 'billing_db_' . $fiscalYear]);
    //     } catch (\Exception $e) {
    //         Log::error('Database switching failed', ['error' => $e->getMessage()]);
    //         return; // Exit if database switching fails
    //     }

    //     // Fetch all active students with an active contract status
    //     $students = Student::where('contract_status', 'active')->get();

    //     foreach ($students as $student) {
    //         $existingBill = Billings::where('student_id', $student->id)
    //             ->whereMonth('billing_month', $billingDate->month)
    //             ->whereYear('billing_month', $billingDate->year)
    //             ->exists();

    //         if ($existingBill) {
    //             Log::info('Billing already exists for student', ['student_id' => $student->id]);
    //             continue;
    //         }

    //         $baseAmount = $student->house_rent + $student->utility_fees;

    //         // Force the Billings model to use the switched database connection
    //         $billing = new Billings;
    //         $billing->setConnection('yearly_database'); // Explicitly set the connection

    //         // Log the connection being used by the Billings model
    //         Log::info('Using connection', ['connection' => $billing->getConnectionName()]);

    //         // Assign data and save the billing entry
    //         $billing->fill([
    //             'student_id' => $student->id,
    //             'billing_month' => $billingDate,
    //             'total_amount' => round($baseAmount, 2),
    //             'amount_paid' => 0,
    //             'payment_status' => 'unpaid',
    //         ]);

    //         $billing->save();

    //         Log::info('Billing entry created successfully', [
    //             'student_id' => $student->id,
    //             'billing_month' => $billingDate->toDateString(),
    //         ]);
    //     }
    // }


    public function generateMonthlyBilling()
    {
        // Set the billing date to the 20th of the current month
        $billingDate = Carbon::parse('2028-05-20'); // Custom date for testing
        Log::info('Billing Date:', ['billing_date' => $billingDate->toDateString()]);

        // Determine the fiscal year for billing purposes
        $currentYear = $billingDate->year;
        $currentMonth = $billingDate->month;
        $fiscalYear = $currentMonth >= 4 ? $currentYear : $currentYear - 1;

        // Set the new database name based on the fiscal year
        $newDatabaseName = "billing_db_$fiscalYear";
        Log::info('Determined Fiscal Year and Database:', ['fiscal_year' => $fiscalYear, 'database' => $newDatabaseName]);

        // Check if the database exists, and if not, create it
        $databaseExists = DB::select("SHOW DATABASES LIKE '$newDatabaseName'");
        if (empty($databaseExists)) {
            Log::info("Database $newDatabaseName does not exist. Creating new database.");

            // Attempt to create the new database by directly invoking the command class
            $createDatabaseCommand = new CreateYearlyDatabase();
            $createDatabaseCommand->handle($fiscalYear); // Pass $fiscalYear directly

            // Verify creation of the database
            $databaseExists = DB::select("SHOW DATABASES LIKE '$newDatabaseName'");
            if (empty($databaseExists)) {
                Log::error("Failed to create database $newDatabaseName. Exiting.");
                return; // Exit if the database creation failed
            }

            Log::info("Database $newDatabaseName created successfully.");
        }

        // Attempt to switch to the newly created yearly database
        try {
            DatabaseSwitcher::switchToYearlyDatabase($fiscalYear);
            Log::info("Switched to database $newDatabaseName successfully.");
        } catch (\Exception $e) {
            Log::error('Database switching failed even after creation', ['error' => $e->getMessage()]);
            return; // Exit if database switching fails
        }

        // Check if the `billings` table exists in the new database
        if (!DB::connection('yearly_database')->getSchemaBuilder()->hasTable('billings')) {
            Log::error("The 'billings' table does not exist in $newDatabaseName. Ensure migrations have run.");
            return;
        }

        // Fetch all active students with an active contract status
        $students = Student::where('contract_status', 'active')->get();

        foreach ($students as $student) {
            $existingBill = Billings::where('student_id', $student->id)
                ->whereMonth('billing_month', $billingDate->month)
                ->whereYear('billing_month', $billingDate->year)
                ->exists();

            if ($existingBill) {
                Log::info('Billing already exists for student', ['student_id' => $student->id]);
                continue;
            }

            $baseAmount = $student->house_rent + $student->utility_fees;

            // Set the connection explicitly to the yearly database
            $billing = new Billings;
            $billing->setConnection('yearly_database');

            // Log the connection being used
            Log::info('Using connection for billing entry creation', ['connection' => $billing->getConnectionName()]);

            // Assign data and save the billing entry
            $billing->fill([
                'student_id' => $student->id,
                'billing_month' => $billingDate,
                'total_amount' => round($baseAmount, 2),
                'amount_paid' => 0,
                'payment_status' => 'unpaid',
            ]);

            $billing->save();

            Log::info('Billing entry created successfully', [
                'student_id' => $student->id,
                'billing_month' => $billingDate->toDateString(),
            ]);
        }
    }

    public function updateBilling(Request $request, $billingId)
    {
        // $request->validate([
        //     'billing_id' => 'required|exists:billings,id',
        //     'payment_method_id' => 'required|exists:billing_methods,id',
        //     'amount_paid' => 'required|numeric|min:0',
        //     'payment_id' => 'nullable|string|max:255',
        // ]);

        $request->validate([
            'billing_id' => 'required|exists:billings,id',  // Ensure this matches your database table and column names
            'payment_method_id' => 'required|exists:billing_methods,id',
            'amount_paid' => 'required|numeric|min:0',
            'payment_id' => 'nullable|string|max:255',
        ]);


        $billing = Billings::findOrFail($billingId);

        // Record the new payment in the payment table
        Payment::create([
            'billing_id' => $billing->id,
            'student_id' => $billing->student_id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => Carbon::now(),
            'payment_method_id' => $request->payment_method_id,
            'transaction_id' => $request->payment_id,
        ]);

        // Update the billing status based on the total amount paid
        $totalPaid = Payment::where('billing_id', $billing->id)->sum('amount_paid');
        $balanceDue = max(0, $billing->total_amount - $totalPaid);

        // Update the payment status in the billing table
        if ($balanceDue <= 0) {
            $billing->payment_status = 'paid';
        } elseif ($totalPaid > 0 && $balanceDue > 0) {
            $billing->payment_status = 'partially_paid';
        } else {
            $billing->payment_status = 'unpaid';
        }

        $billing->save();

        return response()->json(['message' => 'Billing updated successfully']);
    }

    
    public function fetchBillingById($billingId)
    {
        try {
            // Find billing and include related student details
            $billing = Billings::with('student')->findOrFail($billingId);

            // Get all unpaid bills for the student
            $unpaidBills = Billings::where('student_id', $billing->student_id)
                ->where('payment_status', '!=', 'paid')
                ->get();

            // Initialize array to store unpaid months
            $unpaidMonths = [];

            // Loop through each unpaid bill and format billing month as 'Y-m'
            foreach ($unpaidBills as $bill) {
                // Ensure billing_month is properly parsed as a Carbon instance and formatted as Year-Month
                $billingMonthFormatted = Carbon::parse($bill->billing_month)->format('Y-m');
                $unpaidMonths[$billingMonthFormatted] = $bill->total_amount;
            }

            // Get total dues for unpaid bills
            $totalDues = Billings::where('student_id', $billing->student_id)
                ->where('payment_status', '!=', 'paid')
                ->sum('total_amount');

            // Get payment methods
            $paymentMethods = BillingMethod::all(['id', 'method_name']);

            return response()->json([
                'billing' => $billing,
                'unpaidMonths' => $unpaidMonths,
                'paymentMethods' => $paymentMethods,
                'totalDues' => $totalDues,
                'houseRent' => optional($billing->student)->house_rent + optional($billing->student)->utility_fees,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Billing record not found.'], 404);
        }
    }

    public function fetchBillingHistory($studentId)
    {
        $billingHistory = Billings::where('student_id', $studentId)
            ->with('student')
            ->orderBy('billing_month', 'desc')
            ->get()
            ->map(function ($billing) {
                // Calculate total due amount
                $totalPaid = Payment::where('billing_id', $billing->id)->sum('amount_paid');
                $billing->total_due_amount = $billing->total_amount - $totalPaid;
                $billing->amount_paid = $totalPaid;

                // Fetch the most recent payment details with payment method name if available
                $latestPayment = Payment::where('billing_id', $billing->id)
                    ->with('paymentMethod') // Eager load payment method
                    ->orderBy('payment_date', 'desc')
                    ->first();

                // Assign payment details to the billing object
                if ($latestPayment) {
                    $billing->payment_date = $latestPayment->payment_date;
                    $billing->payment_method_name = $latestPayment->paymentMethod->method_name ?? null; // Use name if exists
                    $billing->transaction_id = $latestPayment->transaction_id;
                } else {
                    // Set to null if no payment exists
                    $billing->payment_date = null;
                    $billing->payment_method_name = null;
                    $billing->transaction_id = null;
                }

                return $billing;
            });

        return response()->json($billingHistory);
    }

    public function studentAllBillings()
    {
        // // Retrieve all students with their monthly billing and payment data
        // $students = Billings::with('student')->get()->groupBy('student_id');

        // // Format data for each student by month
        // $studentBillingData = [];
        // foreach ($students as $studentId => $billings) {
        //     $monthlyStatus = [];

        //     foreach ($billings as $billing) {
        //         $month = \Carbon\Carbon::parse($billing->billing_month)->format('F');

        //         // Determine if the billing for this month is fully paid
        //         $isPaid = $billing->payment_status === 'paid';
        //         $monthlyStatus[$month] = $isPaid ? 'paid' : 'unpaid';
        //     }

        //     $studentBillingData[] = [
        //         'student_id' => $studentId,
        //         'student_name' => $billings->first()->student->student_name,
        //         'monthly_status' => $monthlyStatus,
        //     ];
        // }

        return view('student_all_billing');
    }


    public function getStudentBillingData()
    {
        $students = Billings::with('student')->get()->groupBy('student_id');
        $studentBillingData = [];

        foreach ($students as $studentId => $billings) {
            $monthlyStatus = [];
            foreach ($billings as $billing) {
                $month = \Carbon\Carbon::parse($billing->billing_month)->format('F');
                $isPaid = $billing->payment_status === 'paid';
                $monthlyStatus[$month] = $isPaid ? 'paid' : 'unpaid';
            }
            $studentBillingData[] = [
                'student_id' => $studentId,
                'student_name' => $billings->first()->student->student_name,
                'monthly_status' => $monthlyStatus,
            ];
        }

        return response()->json($studentBillingData);
    }


}
