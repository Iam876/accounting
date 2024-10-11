<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Schools;
use App\Models\Apartment;
use App\Models\roomTable;
use App\Models\PackageChoose;
use Intervention\Image\Laravel\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $studentData = Student::with('school')->get();
        $schools = Schools::all();
        $apartments = Apartment::all();
        $packageChoose = PackageChoose::all();
        return view('student_index', compact('studentData', 'schools', 'apartments', 'packageChoose'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'student_name' => 'required|string|max:255',
            'name_katakana' => 'nullable|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'school_id' => 'required|exists:schools,id',
            'country' => 'nullable|string|max:100',
            'package_id' => 'nullable|string|max:255',
            'apartment_id' => 'nullable|exists:apartments,id',
            // 'room_id' => 'nullable|exists:rooms,id',
            'room_id' => 'nullable', // Adjusted to point to the correct table
            'contract_date' => 'nullable|date',
            'termination_date' => 'nullable|date',
            'billing_date' => 'nullable|date',
            'initial_fees' => 'nullable|numeric|min:0',
            'house_rent' => 'nullable|numeric|min:0',
            'utility_fees' => 'nullable|numeric|min:0',
            'student_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'zyro_front' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'zyro_back' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'passport_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $optimizerChain = OptimizerChainFactory::create();

        if ($request->room_id) {
            $room = roomTable::findOrFail($request->room_id);
            if ($room->students()->count() >= $room->max_student) {
                return response()->json(['error' => 'The selected room is full. Please choose another room.'], 400);
            }
        }

        $contractDate = $request->contract_date ? Carbon::createFromFormat('d-m-Y', $request->contract_date)->format('Y-m-d') : null;
        $terminationDate = $request->termination_date ? Carbon::createFromFormat('d-m-Y', $request->termination_date)->format('Y-m-d') : null;
        $billingDate = $request->billing_date ? Carbon::createFromFormat('d-m-Y', $request->billing_date)->format('Y-m-d') : null;

        // Store the student data
        $student = new Student();
        $student->student_name = $request->student_name;
        $student->name_katakana = $request->name_katakana;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->school_id = $request->school_id;
        $student->country = $request->country;
        $student->package_id = $request->package_id;
        $student->apartment_id = $request->apartment_id;
        $student->room_id = $request->room_id;
        $student->contract_date = $contractDate;
        $student->termination_date = $terminationDate;
        $student->billing_date = $billingDate;
        $student->initial_fees = $request->initial_fees;
        $student->house_rent = $request->house_rent;
        $student->utility_fees = $request->utility_fees;

        if ($request->hasFile('student_image')) {
            $image = $request->file('student_image');
            $path = 'student_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image) // Assuming read() is customized in your project
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->student_image = 'storage/' . $path;
        }


        if ($request->hasFile('zyro_front')) {
            $image = $request->file('zyro_front');
            $path = 'zyro_front_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->zyro_front = 'storage/' . $path;
        }

        if ($request->hasFile('zyro_back')) {
            $image = $request->file('zyro_back');
            $path = 'zyro_back_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->zyro_back = 'storage/' . $path;
        }

        if ($request->hasFile('passport_photo')) {
            $image = $request->file('passport_photo');
            $path = 'passport_photos/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->passport_photo = 'storage/' . $path;
        }

        $student->save();

        return response()->json(['success' => 'Student added successfully!']);
    }

    public function fetchData()
    {
        $student = Student::with(['room', 'package','school','apartment'])->get(); // Ensure roomTables is the correct relation name
        return response()->json(['success' => $student]);
    }

}
