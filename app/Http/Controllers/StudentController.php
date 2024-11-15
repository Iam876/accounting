<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\StudentAdded;

use App\Models\Student;
use App\Models\Schools;
use App\Models\Apartment;
use App\Models\roomTable;
use App\Models\PackageChoose;
use Intervention\Image\Laravel\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Log;


use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentController extends Controller
{
    public function index()
    {
        return view('student_index');
    }
    public function store(Request $request)
    {

        $messages = [
            'student_image.image' => 'The profile picture must be an image file.',
            'student_image.mimes' => 'The profile picture must be a file of type: jpg, jpeg, png.',
            'student_image.max' => 'The profile picture size must not exceed 5MB.',
            'zyro_front.image' => 'The Zyro Front image must be an image file.',
            'zyro_front.mimes' => 'The Zyro Front image must be a file of type: jpg, jpeg, png.',
            'zyro_front.max' => 'The Zyro Front image size must not exceed 5MB.',
            'zyro_back.image' => 'The Zyro Back image must be an image file.',
            'zyro_back.mimes' => 'The Zyro Back image must be a file of type: jpg, jpeg, png.',
            'zyro_back.max' => 'The Zyro Back image size must not exceed 5MB.',
            'passport_photo.image' => 'The Passport photo must be an image file.',
            'passport_photo.mimes' => 'The Passport photo must be a file of type: jpg, jpeg, png.',
            'passport_photo.max' => 'The Passport photo size must not exceed 5MB.',
        ];

        // Validation
        $request->validate([
            'student_name' => 'required|string|max:255',
            'name_katakana' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'school_id' => 'nullable|exists:schools,id',
            'country' => 'nullable|string|max:100',
            'package_id' => 'nullable|string|max:255',
            'apartment_id' => 'nullable|exists:apartments,id',
            'room_id' => 'nullable', // Adjusted to point to the correct table
            'contract_date' => 'nullable|date',
            'termination_date' => 'nullable|date',
            'futon' => 'nullable|numeric|min:0',
            'initial_fees' => 'nullable|numeric|min:0',
            'house_rent' => 'nullable|numeric|min:0',
            'utility_fees' => 'nullable|numeric|min:0',
            'student_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'zyro_front' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'zyro_back' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'passport_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ], $messages);

        $optimizerChain = OptimizerChainFactory::create();

        if ($request->room_id) {
            $room = roomTable::findOrFail($request->room_id);
            if ($room->students()->count() >= $room->max_student) {
                return response()->json(['error' => 'The selected room is full. Please choose another room.'], 400);
            }
        }

        $contractDate = $request->contract_date ? Carbon::createFromFormat('d-m-Y', $request->contract_date)->format('Y-m-d') : null;
        $terminationDate = $request->termination_date ? Carbon::createFromFormat('d-m-Y', $request->termination_date)->format('Y-m-d') : null;
        // $billingDate = $request->billing_date ? Carbon::createFromFormat('d-m-Y', $request->billing_date)->format('Y-m-d') : null;

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
        $student->futon = $request->futon;
        $student->initial_fees = $request->initial_fees;
        $student->house_rent = $request->house_rent;
        $student->utility_fees = $request->utility_fees;
        $student->contract_status = 'active';

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
        event(new StudentAdded($student));

        return response()->json(['success' => 'Student added successfully!']);
    }

    public function getSchools()
    {
        $schools = Schools::all();
        return response()->json($schools);
    }

    public function getApartments()
    {
        $apartments = Apartment::all();
        return response()->json($apartments);
    }

    public function getRooms($apartment_id)
    {
        // Debugging: Log or print the apartment ID to verify it's being passed
        \Log::info("Apartment ID: " . $apartment_id);

        // Fetch rooms for the given apartment
        $rooms = roomTable::where('apartment_id', $apartment_id)->get();

        // Debugging: Log or print the fetched rooms
        \Log::info("Rooms: " . $rooms);

        return response()->json($rooms);
    }

    public function getPackages()
    {
        $packages = PackageChoose::all();
        return response()->json($packages);
    }

    public function fetchData()
    {
        $student = Student::with(['room', 'package', 'school', 'apartment'])->get();
        return response()->json(['success' => $student]);
    }

    public function edit($id)
    {
        // Fetch the student by ID
        $student = Student::findOrFail($id);

        // Format dates for frontend if necessary (depends on the input format)
        $student->contract_date = $student->contract_date ? Carbon::parse($student->contract_date)->format('d-m-Y') : null;
        $student->termination_date = $student->termination_date ? Carbon::parse($student->termination_date)->format('d-m-Y') : null;
        $student->billing_date = $student->billing_date ? Carbon::parse($student->billing_date)->format('d-m-Y') : null;

        // Return the student data
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'student_name' => 'required|string|max:255',
            'name_katakana' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'school_id' => 'nullable|exists:schools,id',
            'country' => 'nullable|string|max:100',
            'package_id' => 'nullable|string|max:255',
            'apartment_id' => 'nullable|exists:apartments,id',
            'room_id' => 'nullable',
            'contract_date' => 'nullable|date',
            'termination_date' => 'nullable|date',
            'futon' => 'nullable|numeric|min:0',
            'initial_fees' => 'nullable|numeric|min:0',
            'house_rent' => 'nullable|numeric|min:0',
            'utility_fees' => 'nullable|numeric|min:0',
            'student_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'zyro_front' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'zyro_back' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'passport_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $optimizerChain = OptimizerChainFactory::create();

        // Find the student record
        $student = Student::findOrFail($id);

        // Handle student image upload using Image::read()
        if ($request->hasFile('student_image')) {
            // Delete the old student image if it exists
            if ($student->student_image && Storage::exists(str_replace('storage/', '', $student->student_image))) {
                Storage::delete(str_replace('storage/', '', $student->student_image));
            }

            // Save the new student image
            $image = $request->file('student_image');
            $path = 'student_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->student_image = 'storage/' . $path;
        }

        // Handle zyro front image using Image::read()
        if ($request->hasFile('zyro_front')) {
            // Delete the old zyro_front image if it exists
            if ($student->zyro_front && Storage::exists(str_replace('storage/', '', $student->zyro_front))) {
                Storage::delete(str_replace('storage/', '', $student->zyro_front));
            }

            // Save the new zyro_front image
            $image = $request->file('zyro_front');
            $path = 'zyro_front_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->zyro_front = 'storage/' . $path;
        }

        // Handle zyro back image using Image::read()
        if ($request->hasFile('zyro_back')) {
            // Delete the old zyro_back image if it exists
            if ($student->zyro_back && Storage::exists(str_replace('storage/', '', $student->zyro_back))) {
                Storage::delete(str_replace('storage/', '', $student->zyro_back));
            }

            // Save the new zyro_back image
            $image = $request->file('zyro_back');
            $path = 'zyro_back_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->zyro_back = 'storage/' . $path;
        }

        // Handle passport photo using Image::read()
        if ($request->hasFile('passport_photo')) {
            // Delete the old passport_photo if it exists
            if ($student->passport_photo && Storage::exists(str_replace('storage/', '', $student->passport_photo))) {
                Storage::delete(str_replace('storage/', '', $student->passport_photo));
            }

            // Save the new passport_photo image
            $image = $request->file('passport_photo');
            $path = 'passport_photos/' . uniqid() . '.' . $image->getClientOriginalExtension();
            Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));
            $optimizerChain->optimize(storage_path('app/public/' . $path));
            $student->passport_photo = 'storage/' . $path;
        }

        $contractDate = $request->contract_date ? Carbon::createFromFormat('d-m-Y', $request->contract_date)->format('Y-m-d') : null;
        $terminationDate = $request->termination_date ? Carbon::createFromFormat('d-m-Y', $request->termination_date)->format('Y-m-d') : null;
 

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
        $student->futon = $request->futon;
        $student->initial_fees = $request->initial_fees;
        $student->house_rent = $request->house_rent;
        $student->utility_fees = $request->utility_fees;
        $student->contract_status = 'active';
        // Save the student record
        $student->save();

        return response()->json(['success' => 'Student updated successfully!']);
    }

    // Delete Data
    public function destroy($id)
    {
        try {
            // Find the student by ID
            $student = Student::findOrFail($id);

            // Soft delete the student (does not delete from database)
            $student->delete();

            return response()->json(['success' => 'Student soft deleted successfully']);
        } catch (\Exception $e) {
            Log::error("Error deleting student: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the student'], 500);
        }
    }

    public function exportStudentContract($studentId)
    {
        // Load the student data
        $student = Student::findOrFail($studentId);

        // Load the Excel template
        $templatePath = storage_path('app/templates/student_contract_template.xlsx');
        $spreadsheet = IOFactory::load($templatePath);

        // Format dates to Japanese style
        $contractDate = $this->formatJapaneseDate($student->contract_date);
        $terminationDate = $this->formatJapaneseDate($student->termination_date);

        // Access the active sheet and fill in student data
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('R5', $student->student_name ?? 'NAI DESU');
        $sheet->setCellValue('I8', $student->apartment->mansion_name ?? 'NAI DESU');
        $sheet->setCellValue('X8', $student->room->room_number ??'NAI DESU');
        $sheet->setCellValue('I9', $student->apartment->mansion_address ?? 'NAI DESU');
        $sheet->setCellValue('I10', $student->apartment->mansion_structure ?? 'NAI DESU');
        $sheet->setCellValue('H14', $student->house_rent ??'NAI DESU');
        $sheet->setCellValue('H15', $student->utility_fees ?? 'NAI DESU');
        $sheet->setCellValue('R14', $student->initial_fees ??'NAI DESU');
        $sheet->setCellValue('R15', $student->futon ?? 'NAI DESU');
        $sheet->setCellValue('AJ16', $student->school->school_name ?? 'NAI DESU');
        $sheet->setCellValue('AJ18', $student->school->address ?? 'NAI DESU');
        $sheet->setCellValue('I13', $contractDate ?? 'NAI DESU'); // Contract date
        $sheet->setCellValue('Q13', $terminationDate ?? 'NAI DESU'); // Termination date

        // Define the file name for the downloaded file
        $fileName = 'Student_' . $student->id . '_Contract.xlsx';

        // Set headers to return the file as a downloadable response
        return new StreamedResponse(function() use ($spreadsheet) {
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment;filename=\"{$fileName}\"",
            'Cache-Control' => 'max-age=0',
        ]);
    }
    private function formatJapaneseDate($date)
    {
        if (!$date) {
            return null;
        }

        $dateObj = \DateTime::createFromFormat('Y-m-d', $date);
        if (!$dateObj) {
            return null;
        }

        return $dateObj->format('Y年m月d日');
    }
}
