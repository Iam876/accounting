<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function index(){
        $apartmentData = Apartment::all();
        return view('apartment_index', compact('apartmentData'));
    }
}
