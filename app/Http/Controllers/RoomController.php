<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roomTable;

class RoomController extends Controller
{
   
    public function index(){
        // $roomData = roomTable::all();
        // // $apartmentData = Apartment::with('pic')->get();
        return view('room_index');
    }

}
