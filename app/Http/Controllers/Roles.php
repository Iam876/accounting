<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class Roles extends Controller
{
    public function index(){
        return view('role_index');
    }

    public function fetchRole(){
        $roles = Role::all(); // Fetch all roles
        return response()->json($roles);
    }
    
    public function store(Request $request){
        $request->validate([
            'roles_name' => 'required',
            'guard_name' => 'nullable',
        ]);

        Role::create([
            'name' => $request->input('roles_name'),
            'guard_name' => 'web',
        ]);

        return response()->json(['status' => "Data Created Successfully"]);
    }

    public function edit($id){
        $roleEdit = Role::find($id);
        return response()->json($roleEdit);
    }

    public function update(Request $request, $id){
        $request->validate([
            'roles_name' => 'required',
            'guard_name' => 'nullable',
        ]);

        Role::find($id)->update([
            'name' => $request->input('roles_name'),
            'guard_name' => 'web',
        ]);

        return response()->json(['status' => 'Data Updated Successfully']);
    }

    public function destroy($id){
        Role::find($id)->delete();
        return response()->json(['status' => 'Deleted Successfully']);
    }
}
