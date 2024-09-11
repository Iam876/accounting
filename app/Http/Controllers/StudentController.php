<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $studentData = Student::with('school')->get();
        return view('student_index', compact('studentData'));
    }
}
