<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingMethod;

class BillingMethodController extends Controller
{
    public function index(){
        return view('billing_method_index');
    }

    public function fetchBillingMethod(){
        $billingMethodAll = BillingMethod::all();
        return response()->json($billingMethodAll);
    }
    
    public function store(Request $request){
        $request->validate([
            'method_name' => 'required',
        ]);

       BillingMethod::create([
        'method_name'=>$request->input('method_name')
       ]);

       return response()->json(['status'=>"Data Created Successfully"]);
        
    }

    public function edit($id){
        $billingMethod = BillingMethod::find($id);
        return response()->json($billingMethod);
    }

    public function update(Request $request, $id){
        $request->validate([
            'method_name' => 'required',
        ]);

        BillingMethod::find($id)->update([
            'method_name'=>$request->input('method_name'),
        ]);

        return response()->json(['status'=> 'Data Updated Successfully']);
    }

    public function destroy($id){
        BillingMethod::find($id)->delete();
        return response()->json(['status'=> 'Deleted Successfully']);
    }
}
