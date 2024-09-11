<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class Roles extends Controller
{
    public function index(){
        $RolesData = Role::all();
        return view('role_index', compact('RolesData'));
    }
}
