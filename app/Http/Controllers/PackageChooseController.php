<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageChoose;

class PackageChooseController extends Controller
{
    public function index()
    {
        return view('package_choose_index');
    }

    public function fetchData()
    {
        $packageChoose = PackageChoose::all(); // Ensure roomTables is the correct relation name
        return response()->json(['packages' => $packageChoose]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Create a new package record
        $package = new PackageChoose();
        $package->package_name = $request->input('package_name');
        $package->description = $request->input('description');
        $package->notes = $request->input('notes');
        $package->save();

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Package created successfully',
            'package' => $package
        ], 201);
    }

    public function edit($id)
    {
        $package = PackageChoose::findOrFail($id);
        return response()->json($package);
    }
    public function update(Request $request, $id)
    {
        // Find the existing school record
        $package = PackageChoose::findOrFail($id);

        // Validate the input data
        $request->validate([
            'package_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Update package details
        $package->package_name = $request->package_name;
        $package->description = $request->description;
        $package->notes = $request->notes;

        // Save the updated package details
        $package->save();

        return response()->json(['message' => 'package updated successfully!']);
    }

    public function destroy($id)
    {
        try {
            // Find the school by ID
            $package = PackageChoose::findOrFail($id);

            // Delete the package record from the database
            $package->delete();
            // Return a success response
            return response()->json(['success' => 'package and associated image deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the package'], 500);
        }
    }

}
