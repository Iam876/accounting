<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class Roles extends Controller
{
    public function index(){
        return view('role_index');
    }

    public function fetchRole(){
        $RoleAll = Role::all();
        return response()->json($RoleAll);
    }
    
    public function store(Request $request){
        $request->validate([
            'roles_name' => 'required',
            'status' => 'required',
        ]);

       Role::create([
        'roles_name'=>$request->input('roles_name'),
         'status'=>$request->input('status')
       ]);

       return response()->json(['status'=>"Data Created Successfully"]);
        
    }

    public function edit($id){
        $roleEdit = Role::find($id);
        return response()->json($roleEdit);
    }

    public function update(Request $request, $id){
        $request->validate([
            'roles_name' => 'required',
            'status' => 'required',
        ]);

        Role::find($id)->update([
            'roles_name'=>$request->input('roles_name'),
             'status'=>$request->input('status'),
        ]);

        return response()->json(['status'=> 'Data Updated Successfully']);
    }

    public function destroy($id){
        Role::find($id)->delete();
        return response()->json(['status'=> 'Deleted Successfully']);
    }
}
