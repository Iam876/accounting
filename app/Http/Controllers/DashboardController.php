<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\roomTable;
use App\Models\Student;
use App\Models\Schools;
use App\Models\Billings;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view dashboard')->only('index');
    }
    public function dashboard()
    {
        // Fetch totals for apartments, rooms, students, and schools
        $totalApartments = Apartment::count();
        $totalRooms = roomTable::count();
        $totalStudents = Student::count();
        $totalSchools = Schools::count();

        // Get current user's name
        $userName = Auth::user()->name;

        // Determine the greeting based on current time
        $currentHour = Carbon::now()->hour;
        if ($currentHour < 12) {
            $greeting = "Good Morning";
        } elseif ($currentHour < 18) {
            $greeting = "Good Afternoon";
        } else {
            $greeting = "Good Evening";
        }

        // Calculate the total billing amount
        $totalBillingAmount = Billings::sum('total_amount');

        // Count of students who have fully paid (students with `paid` status)
        $studentsPaidCount = Billings::where('payment_status', 'paid')->distinct('student_id')->count('student_id');

        // Calculate the remaining due amount (total amount - total amount paid)
        $remainingDueAmount = Billings::sum(DB::raw('total_amount - amount_paid'));

        // Pass all data to the view
        return view('dashboard', compact(
            'totalApartments',
            'totalRooms',
            'totalStudents',
            'totalSchools',
            'userName',
            'greeting',
            'totalBillingAmount',
            'studentsPaidCount',
            'remainingDueAmount',
        ));
    }
}
