<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingMethod;

class BillingMethodController extends Controller
{
    public function index(){
        $billingMethodData = BillingMethod::all();
        return view('billing_method_index', compact('billingMethodData'));
    }
}
