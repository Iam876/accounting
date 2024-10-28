<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schools;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

use Intervention\Image\Laravel\Facades\Image;



class SchoolController extends Controller
{
    public function index()
    {
        return view('school_index');
    }

    public function fetchData()
    {
        $schoolData = Schools::all();
        return response()->json(['schools' => $schoolData]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',  // Image validation
        ]);

        $school = new Schools();
        $school->school_name = $request->school_name;
        $school->contact = $request->contact;
        $school->address = $request->address;
        $school->city = $request->city;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'school_images/' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Read and resize the image using Image::read()
            $resizedImage = Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));

            // Store the full path of the image in the database
            $school->image = 'storage/' . $path;
        }


        $school->save();

        return response()->json(['message' => 'School added successfully!']);
    }

    public function edit($id)
    {
        $school = Schools::findOrFail($id);
        return response()->json($school);
    }

    public function update(Request $request, $id)
    {
        // Find the existing school record
        $school = Schools::findOrFail($id);

        // Validate the input data
        $request->validate([
            'school_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',  // Image validation
        ]);

        // Update school details
        $school->school_name = $request->school_name;
        $school->contact = $request->contact;
        $school->address = $request->address;
        $school->city = $request->city;

        // If a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($school->image && Storage::exists('public/' . str_replace('storage/', '', $school->image))) {
                Storage::delete('public/' . str_replace('storage/', '', $school->image));
            }

            // Process and resize the new image
            $image = $request->file('image');
            $path = 'school_images/' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Read and resize the new image using Image::read()
            $resizedImage = Image::read($image)  // Read the image from the file
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio(); // Maintain aspect ratio
                })
                ->save(storage_path('app/public/' . $path));  // Save the image to the specified path

            // Save the image to storage

            // Update the image path in the database
            $school->image = 'storage/' . $path;
        }

        // Save the updated school details
        $school->save();

        return response()->json(['message' => 'School updated successfully!']);
    }

    public function destroy($id)
    {
        try {
            // Find the school by ID
            $school = Schools::findOrFail($id);

            // Check if the school has an image
            if ($school->image) {
                $imagePath = str_replace('storage/', '', $school->image);
                if (Storage::exists('public/' . $imagePath)) {
                    Storage::delete('public/' . $imagePath);
                }
            }

            // Delete the school record from the database
            $school->delete();

            // Return a success response
            return response()->json(['success' => 'School and associated image deleted successfully']);
        } catch (\Exception $e) {
            Log::error("Error deleting school: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the school'], 500);
        }
    }

}

