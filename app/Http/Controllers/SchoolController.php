<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schools;

class SchoolController extends Controller
{
    public function index(){
        $schoolData = Schools::all();
        return view('school_index', compact('schoolData'));
    }
    
}
