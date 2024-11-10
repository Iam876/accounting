<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\picCompany;
use App\Models\roomTable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Laravel\Facades\Image;

class ApartmentController extends Controller
{
    public function index()
    {

        return view('apartment_index');
    }

    public function fetchData()
    {
        $apartments = Apartment::with(['pic', 'rooms'])->get(); // Ensure roomTables is the correct relation name
        return response()->json(['apartments' => $apartments]);
    }


    public function fetchPicNames()
    {
        $picNames = PicCompany::all(['id', 'pic_company_name', 'pic_company_contact']); // Fetch the relevant fields
        return response()->json($picNames); // Return as JSON
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'mansion_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'mansion_structure' => 'nullable|string|max:255',
            'rooms' => 'nullable|array',
            'rooms.*.room_number' => 'nullable|string',
            'rooms.*.room_type' => 'nullable|string',
            'rooms.*.initial_rent' => 'nullable|numeric', // Ensure rent is a numeric value
            'rooms.*.facilities' => 'nullable|string',
            'rooms.*.max_student' => 'nullable|integer', // Ensure max_student is an integer
            'pic_value' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048', // Image validation
        ]);

        // Create new apartment record
        $apartmentData = new Apartment();
        $apartmentData->mansion_name = $request->mansion_name;
        $apartmentData->mansion_address = $request->address;
        $apartmentData->mansion_structure = $request->mansion_structure;
        $apartmentData->pic_id = $request->pic_value;

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'apartment_images/' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Read and resize the image using Image::read()
            $resizedImage = Image::read($image)
                ->resize(300, 300)
                ->save(storage_path('app/public/' . $path));

            // Store the full path of the image in the database
            $apartmentData->image = 'storage/' . $path;
        }

        // Save the apartment
        $apartmentData->save();

        // Save room data if provided
        if (!empty($request->rooms)) {
            foreach ($request->rooms as $room) {
                roomTable::create([
                    'apartment_id' => $apartmentData->id,
                    'room_number' => $room['room_number'] ?? null,
                    'room_type' => $room['room_type'] ?? null,
                    'initial_rent' => $room['initial_rent'] ?? null,
                    'facilities' => isset($room['facilities']) ? json_encode(explode(',', $room['facilities'])) : null,
                    'max_student' => $room['max_student'] ?? null,
                ]);
            }
        }

        return response()->json(['message' => 'Apartment added successfully!']);
    }



    public function getAllPics()
    {
        // Fetch all PICs from the database
        $pics = PicCompany::select('id', 'pic_company_name')->get();

        // Return the PICs as a JSON response
        return response()->json(['pics' => $pics]);
    }


    public function edit($id)
    {
        // Fetch the apartment with its related PIC and rooms
        $apartment = Apartment::with(['pic', 'rooms'])->findOrFail($id);

        return response()->json($apartment);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'mansion_name' => 'required|string|max:255',
            'mansion_address' => 'nullable|string|max:255',
            'mansion_structure' => 'nullable|string|max:255',
            'rooms' => 'nullable|array',
            'rooms.*.id' => 'nullable|integer', // Updated here
            'rooms.*.room_number' => 'nullable|string',
            'rooms.*.room_type' => 'nullable|string',
            'rooms.*.initial_rent' => 'nullable|numeric',
            'rooms.*.facilities' => 'nullable|string',
            'rooms.*.max_student' => 'nullable|integer',
            'pic_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
        ]);
    
        $apartment = Apartment::findOrFail($id);
        $apartment->mansion_name = $request->input('mansion_name');
        $apartment->mansion_address = $request->input('mansion_address');
        $apartment->mansion_structure = $request->input('mansion_structure');
        $apartment->pic_id = $request->input('pic_id');
    
        // Process the image update if applicable
        if ($request->hasFile('image')) {
            if ($apartment->image && Storage::exists('public/' . str_replace('storage/', '', $apartment->image))) {
                Storage::delete('public/' . str_replace('storage/', '', $apartment->image));
            }
            $image = $request->file('image');
            $path = 'apartment_images/' . uniqid() . '.' . $image->getClientOriginalExtension();
    
            Image::read($image)
                ->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(storage_path('app/public/' . $path));
    
            $apartment->image = 'storage/' . $path;
        }
        $apartment->save();
    
        // Update or create rooms
        $processedRoomIds = [];
        foreach ($request->rooms as $roomData) {
            if (!empty($roomData['id']) && RoomTable::where('id', $roomData['id'])->where('apartment_id', $apartment->id)->exists()) {
                $room = RoomTable::find($roomData['id']);
                $room->update([
                    'room_number' => $roomData['room_number'] ?? $room->room_number,
                    'room_type' => $roomData['room_type'] ?? $room->room_type,
                    'initial_rent' => $roomData['initial_rent'] ?? $room->initial_rent,
                    'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : $room->facilities,
                    'max_student' => $roomData['max_student'] ?? $room->max_student,
                ]);
                $processedRoomIds[] = $room->id;
            } else {
                $newRoom = RoomTable::create([
                    'apartment_id' => $apartment->id,
                    'room_number' => $roomData['room_number'] ?? null,
                    'room_type' => $roomData['room_type'] ?? null,
                    'initial_rent' => $roomData['initial_rent'] ?? null,
                    'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : null,
                    'max_student' => $roomData['max_student'] ?? null,
                ]);
                $processedRoomIds[] = $newRoom->id;
            }
        }
    
        // Delete rooms that are not processed
        RoomTable::where('apartment_id', $apartment->id)->whereNotIn('id', $processedRoomIds)->delete();
    
        return response()->json(['message' => 'Apartment updated successfully']);
    }
    
    
        public function destroy($id)
    {
        try {
            // Find the school by ID
            $apartment = Apartment::findOrFail($id);

            // Check if the apartment has an image
            if ($apartment->image) {
                $imagePath = str_replace('storage/', '', $apartment->image);
                if (Storage::exists('public/' . $imagePath)) {
                    Storage::delete('public/' . $imagePath);
                }
            }

            // Delete the apartment record from the database
            $apartment->delete();

            // Return a success response
            return response()->json(['success' => 'apartment and associated image deleted successfully']);
        } catch (\Exception $e) {
            Log::error("Error deleting apartment: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the apartment'], 500);
        }
    }

    public function getRoomsByApartment($id)
    {
        $apartment = Apartment::with('rooms')->findOrFail($id);

        return response()->json(['rooms' => $apartment->rooms]);
    }



}
