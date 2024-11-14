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
        $request->validate([
            'mansion_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'mansion_structure' => 'nullable|string|max:255',
            'rooms' => 'nullable|array',
            'rooms.*.room_number' => 'nullable|string',
            'rooms.*.room_type' => 'nullable|string',
            'rooms.*.initial_rent' => 'nullable|numeric',
            'rooms.*.facilities' => 'nullable|string',
            'rooms.*.max_student' => 'nullable|integer',
            'rooms.*.photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'pic_value' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
        ]);
    
        $apartmentData = new Apartment();
        $apartmentData->mansion_name = $request->mansion_name;
        $apartmentData->mansion_address = $request->address;
        $apartmentData->mansion_structure = $request->mansion_structure;
        $apartmentData->pic_id = $request->pic_value;
    
        // Handle the main apartment image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $request->mansion_name . '_main';
            $path = 'Accounting/Apartment/' . $request->mansion_name . '/' . $fileName . '.' . $image->getClientOriginalExtension();
    
            // Optimize and resize the main image using Intervention Image
            $optimizedImage = Image::read($image)->resize(300, 300);
            Storage::put('public/' . $path, (string) $optimizedImage->encode());
    
            $apartmentData->image = 'storage/' . $path;
        }
    
        $apartmentData->save();
    
        // Handle room data
        if (!empty($request->rooms)) {
            foreach ($request->rooms as $index => $room) {
                $photoPaths = []; // Reset for each room
    
                // Process and upload photos for this room
                if (isset($room['photos']) && is_array($room['photos'])) {
                    foreach ($room['photos'] as $photo) {
                        $roomDirectory = 'Accounting/Apartment/' . $request->mansion_name . '/Room_' . ($room['room_number'] ?? 'Room' . ($index + 1)) . '/';
                        $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                        $path = $roomDirectory . $fileName;
    
                        // Optimize room image
                        $optimizedImage = Image::read($photo)->resize(780, 550, function ($constraint) {
                            $constraint->aspectRatio();
                        });
    
                        $tempPath = storage_path('app/temp/' . uniqid() . '.jpg');
                        $optimizedImage->save($tempPath);
    
                        // Upload to Google Drive
                        Storage::disk('google')->put($path, file_get_contents($tempPath));
                        unlink($tempPath);
    
                        $photoPaths[] = $path;
                    }
                }
    
                // Encode photos for saving
                $encodedPhotos = !empty($photoPaths) ? json_encode($photoPaths) : null;
    
                // Save room data
                roomTable::create([
                    'apartment_id' => $apartmentData->id,
                    'room_number' => $room['room_number'] ?? null,
                    'room_type' => $room['room_type'] ?? null,
                    'initial_rent' => $room['initial_rent'] ?? null,
                    'facilities' => isset($room['facilities']) ? json_encode(explode(',', $room['facilities'])) : null,
                    'max_student' => $room['max_student'] ?? null,
                    'photos' => $encodedPhotos,
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
        $apartment = Apartment::with(['pic', 'rooms'])->findOrFail($id);
    
        foreach ($apartment->rooms as $room) {
            if ($room->photos) {
                // Decode JSON to get stored file names
                $photos = json_decode($room->photos, true);
                $room->photo_urls = array_map(function ($photoPath) {
                    // Generate a route URL to dynamically retrieve the file
                    $filename = basename($photoPath); // Extract the filename
                    return route('file.retrieve', ['filename' => $filename]);
                }, $photos);
            } else {
                $room->photo_urls = [];
            }
        }
    
        return response()->json($apartment);
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'mansion_name' => 'required|string|max:255',
            'mansion_address' => 'nullable|string|max:255',
            'mansion_structure' => 'nullable|string|max:255',
            'rooms' => 'nullable|array',
            'rooms.*.id' => 'nullable|integer', // For existing room IDs
            'rooms.*.room_number' => 'nullable|string',
            'rooms.*.room_type' => 'nullable|string',
            'rooms.*.initial_rent' => 'nullable|numeric',
            'rooms.*.facilities' => 'nullable|string',
            'rooms.*.max_student' => 'nullable|integer',
            'rooms.*.photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Multiple photos for each room
            'pic_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
        ]);

        // Fetch the apartment record
        $apartment = Apartment::findOrFail($id);
        $apartment->mansion_name = $request->mansion_name;
        $apartment->mansion_address = $request->mansion_address;
        $apartment->mansion_structure = $request->mansion_structure;
        $apartment->pic_id = $request->pic_id;

        // Process the main apartment image
        if ($request->hasFile('image')) {
            // Delete the existing image if it exists
            if ($apartment->image && Storage::exists('public/' . str_replace('storage/', '', $apartment->image))) {
                Storage::delete('public/' . str_replace('storage/', '', $apartment->image));
            }

            $image = $request->file('image');
            $fileName = $request->mansion_name . '_main';
            $path = 'apartment_images/' . $fileName . '.' . $image->getClientOriginalExtension();

            // Optimize and resize the image using Intervention
            $optimizedImage = Image::read($image)->resize(300, 300);
            Storage::put('public/' . $path, (string) $optimizedImage->encode());

            $apartment->image = 'storage/' . $path;
        }
        $apartment->save();

        // Process rooms
        $processedRoomIds = [];
        foreach ($request->rooms as $index => $roomData) {
            $photoPaths = []; // Reset for each room

            // Handle room photos
            if (isset($roomData['photos']) && is_array($roomData['photos'])) {
                foreach ($roomData['photos'] as $photo) {
                    $fileName = $request->mansion_name . '_' . ($roomData['room_number'] ?? 'room' . ($index + 1)) . '_' . uniqid();
                    $path = 'Accounting/Apartment/room_photos/' . $fileName . '.' . $photo->getClientOriginalExtension();

                    // Optimize room image
                    $optimizedImage = Image::read($photo)->resize(780, 550, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $tempPath = storage_path('app/temp/' . uniqid() . '.jpg');
                    $optimizedImage->save($tempPath);

                    // Upload to Google Drive
                    Storage::disk('google')->put($path, file_get_contents($tempPath));
                    unlink($tempPath); // Delete temporary file

                    $photoPaths[] = $path;
                }
            }

            // Encode photos for saving
            $encodedPhotos = !empty($photoPaths) ? json_encode($photoPaths) : null;

            // Update existing room or create a new one
            if (!empty($roomData['id']) && RoomTable::where('id', $roomData['id'])->where('apartment_id', $apartment->id)->exists()) {
                $room = RoomTable::find($roomData['id']);
                $room->update([
                    'room_number' => $roomData['room_number'] ?? $room->room_number,
                    'room_type' => $roomData['room_type'] ?? $room->room_type,
                    'initial_rent' => $roomData['initial_rent'] ?? $room->initial_rent,
                    'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : $room->facilities,
                    'max_student' => $roomData['max_student'] ?? $room->max_student,
                    'photos' => $encodedPhotos, // Save photos as JSON
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
                    'photos' => $encodedPhotos, // Save photos as JSON
                ]);
                $processedRoomIds[] = $newRoom->id;
            }
        }

        // Delete rooms that were not processed
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
