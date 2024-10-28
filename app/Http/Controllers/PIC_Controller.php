<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\picCompany;
use Log;
class PIC_Controller extends Controller
{
    public function index()
    {

        return view('pic_company');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pic_company_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $picCompanyData = new picCompany();
        $picCompanyData->pic_company_name = $request->pic_company_name;
        $picCompanyData->pic_company_contact = $request->contact;
        $picCompanyData->pic_company_address = $request->address;

        $picCompanyData->save();
        return response()->json(['message' => 'PIC Company added successfully!']);

    }

    public function fetchData()
    {
        $picCompanyData = picCompany::all();
        return response()->json(['success' => $picCompanyData]);
    }

    public function edit($id)
    {
        $picCompanyData = picCompany::findOrFail($id);
        return response()->json($picCompanyData);
    }

    public function update(Request $request, $id)
    {
        // Find the existing school record
        $picCompanyData = picCompany::findOrFail($id);

        // Validate the input data
        $request->validate([
            'pic_company_name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $picCompanyData->pic_company_name = $request->pic_company_name;
        $picCompanyData->pic_company_contact = $request->contact;
        $picCompanyData->pic_company_address = $request->address;
        $picCompanyData->save();

        return response()->json(['message' => 'Pic updated successfully!']);
    }

    public function destroy($id)
    {
        try {
            // Find the school by ID
            $picCompanyData = picCompany::findOrFail($id);

            // Delete the school record from the database
            $picCompanyData->delete();

            // Return a success response
            return response()->json(['success' => 'Pic and associated image deleted successfully']);
        } catch (\Exception $e) {
            Log::error("Error deleting Pic: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the Pic'], 500);
        }
    }


}
