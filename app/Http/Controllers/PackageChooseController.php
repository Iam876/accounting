<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageChoose;

class PackageChooseController extends Controller
{
    public function index(){
        $packageChoose = PackageChoose::all();
        return view('package_choose_index', compact('packageChoose'));
    }
}
