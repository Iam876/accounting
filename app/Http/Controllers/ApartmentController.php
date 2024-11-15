<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\picCompany;
use App\Models\roomTable;
use App\Jobs\ProcessRoomPhoto;
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

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'room_number' => 'required|string',
            'mansion_name' => 'required|string',
        ]);

        $photo = $request->file('photo');
        $roomDirectory = 'Accounting/Apartment/' . $request->mansion_name . '/Room_' . $request->room_number . '/';
        $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();

        // Save photo temporarily
        $localPath = $photo->store('temp_photos', 'local');

        // Dispatch job for background processing
        ProcessRoomPhoto::dispatch($localPath, $roomDirectory . $fileName);

        return response()->json(['filePath' => $roomDirectory . $fileName], 200);
    }

    public function uploadStatus(Request $request)
    {
        $filePath = $request->get('filePath');
        $isUploaded = Storage::disk('google')->exists($filePath); // Check if file exists on Google Drive

        return response()->json(['status' => $isUploaded ? 'completed' : 'processing']);
    }

    public function store(Request $request)
    {
        $request->merge([
            'rooms' => json_decode($request->input('rooms'), true),
        ]);

        $request->validate([
            'mansion_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'mansion_structure' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'rooms' => 'nullable|array',
            'rooms.*.room_number' => 'nullable|string',
            'rooms.*.room_type' => 'nullable|string',
            'rooms.*.initial_rent' => 'nullable|numeric',
            'rooms.*.facilities' => 'nullable|string',
            'rooms.*.max_student' => 'nullable|integer',
            'rooms.*.photos' => 'nullable|array',
            'rooms.*.notes' => 'nullable|string',
        ]);

        // Save apartment details
        $apartment = Apartment::create([
            'mansion_name' => $request->mansion_name,
            'mansion_address' => $request->address,
            'mansion_structure' => $request->mansion_structure,
            'pic_id' => $request->pic_value,
            'notes' => $request->notes,
        ]);

        // Save rooms
        foreach ($request->rooms as $room) {
            RoomTable::create([
                'apartment_id' => $apartment->id,
                'room_number' => $room['room_number'] ?? null,
                'room_type' => $room['room_type'] ?? null,
                'initial_rent' => $room['initial_rent'] ?? null,
                'facilities' => isset($room['facilities']) ? json_encode(explode(',', $room['facilities'])) : null,
                'max_student' => $room['max_student'] ?? null,
                'photos' => json_encode($room['photos'] ?? []),
                'notes' => $room['notes'] ?? null,
            ]);
        }

        return response()->json(['message' => 'Apartment and rooms saved successfully!']);
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
                $photos = json_decode($room->photos, true);
                if (is_array($photos)) {
                    $room->photo_urls = array_map(function ($photoPath) {
                        $filename = basename($photoPath);
                        return route('file.retrieve', ['filename' => $filename]);
                    }, $photos);
                } else {
                    $room->photo_urls = [];
                }
            } else {
                $room->photo_urls = [];
            }
        }
    
        // Debug the response
        \Log::info('Apartment Edit Response:', $apartment->toArray());
    
        return response()->json($apartment);
    }
    

    // public function update(Request $request, $id)
    // {
    //     try {
    //         \Log::info("Starting apartment update for ID: $id");

    //         // Log the incoming request data
    //         \Log::info("Request Data: ", $request->all());

    //         $request->validate([
    //             'mansion_name' => 'required|string|max:255',
    //             'mansion_address' => 'nullable|string|max:255',
    //             'mansion_structure' => 'nullable|string|max:255',
    //             'notes' => 'nullable|string',
    //             'rooms' => 'nullable|array',
    //             'rooms.*.id' => 'nullable|integer',
    //             'rooms.*.room_number' => 'nullable|string',
    //             'rooms.*.room_type' => 'nullable|string',
    //             'rooms.*.initial_rent' => 'nullable|numeric',
    //             'rooms.*.facilities' => 'nullable|string',
    //             'rooms.*.max_student' => 'nullable|integer',
    //             'rooms.*.photos' => 'nullable|array',
    //             'rooms.*.photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
    //             'rooms.*.notes' => 'nullable|string',
    //             'pic_id' => 'nullable|integer',
    //             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
    //         ]);

    //         \Log::info("Raw Request Data:", $request->all());
    //         \Log::info("Validation Passed");

    //         $apartment = Apartment::findOrFail($id);
    //         \Log::info("Apartment Found: ", $apartment->toArray());

    //         // Update apartment details
    //         $apartment->update([
    //             'mansion_name' => $request->mansion_name,
    //             'mansion_address' => $request->mansion_address,
    //             'mansion_structure' => $request->mansion_structure,
    //             'pic_id' => $request->pic_id,
    //             'notes' => $request->notes,
    //         ]);

    //         // Update main image synchronously
    //         if ($request->hasFile('image')) {
    //             \Log::info("Main Image Uploaded: " . $request->file('image')->getClientOriginalName());

    //             if ($apartment->image && Storage::exists('public/' . str_replace('storage/', '', $apartment->image))) {
    //                 Storage::delete('public/' . str_replace('storage/', '', $apartment->image));
    //             }

    //             $image = $request->file('image');
    //             $fileName = $request->mansion_name . '_main';
    //             $path = 'apartment_images/' . $fileName . '.' . $image->getClientOriginalExtension();

    //             $optimizedImage = Image::read($image->getRealPath())->resize(300, 300)->encode();
    //             Storage::put('public/' . $path, $optimizedImage);

    //             $apartment->update(['image' => 'storage/' . $path]);
    //         } else {
    //             \Log::info("No Main Image Provided");
    //         }

    //         $processedRoomIds = [];
    //         foreach ($request->rooms as $index => $roomData) {
    //             \Log::info("Processing Room $index: ", $roomData);

    //             if (!empty($roomData['id'])) {
    //                 // Update existing room
    //                 $room = RoomTable::findOrFail($roomData['id']);
    //                 $room->update([
    //                     'room_number' => $roomData['room_number'] ?? $room->room_number,
    //                     'room_type' => $roomData['room_type'] ?? $room->room_type,
    //                     'initial_rent' => $roomData['initial_rent'] ?? $room->initial_rent,
    //                     'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : $room->facilities,
    //                     'max_student' => $roomData['max_student'] ?? $room->max_student,
    //                     'notes' => $roomData['notes'] ?? $room->notes,
    //                 ]);
    //                 $processedRoomIds[] = $room->id;

    //                 // Dispatch jobs for new photos
    //                 if (isset($roomData['photos']) && is_array($roomData['photos'])) {
    //                     foreach ($roomData['photos'] as $photo) {
    //                         $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
    //                         $localPath = $photo->store('temp_photos', 'local');
    //                         $destinationPath = 'Accounting/Apartment/room_photos/' . $fileName;

    //                         ProcessRoomPhoto::dispatch($localPath, $destinationPath);

    //                         \Log::info("Dispatched photo processing job for room $room->id");
    //                     }
    //                 }
    //             } else {
    //                 // Create new room
    //                 $newRoom = RoomTable::create([
    //                     'apartment_id' => $apartment->id,
    //                     'room_number' => $roomData['room_number'] ?? null,
    //                     'room_type' => $roomData['room_type'] ?? null,
    //                     'initial_rent' => $roomData['initial_rent'] ?? null,
    //                     'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : null,
    //                     'max_student' => $roomData['max_student'] ?? null,
    //                     'notes' => $roomData['notes'] ?? $room->notes,
    //                 ]);
    //                 $processedRoomIds[] = $newRoom->id;

    //                 // Dispatch jobs for new photos
    //                 if (isset($roomData['photos']) && is_array($roomData['photos'])) {
    //                     foreach ($roomData['photos'] as $photo) {
    //                         $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
    //                         $localPath = $photo->store('temp_photos', 'local');
    //                         $destinationPath = 'Accounting/Apartment/room_photos/' . $fileName;

    //                         ProcessRoomPhoto::dispatch($localPath, $destinationPath);

    //                         \Log::info("Dispatched photo processing job for new room $newRoom->id");
    //                     }
    //                 }
    //             }
    //         }

    //         RoomTable::where('apartment_id', $apartment->id)->whereNotIn('id', $processedRoomIds)->delete();
    //         \Log::info("Room Processing Completed");

    //         return response()->json(['message' => 'Apartment updated successfully. Photos are being processed in the background.']);
    //     } catch (\Exception $e) {
    //         \Log::error("Error Updating Apartment: " . $e->getMessage());
    //         return response()->json(['error' => 'An error occurred during the update process.'], 500);
    //     }
    // }

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


    public function update(Request $request, $id)
{
    try {
        \Log::info("Starting apartment update for ID: $id");

        // Log the incoming request data
        \Log::info("Request Data: ", $request->all());

        $request->validate([
            'mansion_name' => 'required|string|max:255',
            'mansion_address' => 'nullable|string|max:255',
            'mansion_structure' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'rooms' => 'nullable|array',
            'rooms.*.id' => 'nullable|integer',
            'rooms.*.room_number' => 'nullable|string',
            'rooms.*.room_type' => 'nullable|string',
            'rooms.*.initial_rent' => 'nullable|numeric',
            'rooms.*.facilities' => 'nullable|string',
            'rooms.*.max_student' => 'nullable|integer',
            'rooms.*.photos' => 'nullable|array',
            'rooms.*.photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'rooms.*.notes' => 'nullable|string',
            'pic_id' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
        ]);

        \Log::info("Validation Passed");

        $apartment = Apartment::findOrFail($id);
        \Log::info("Apartment Found: ", $apartment->toArray());

        // Update apartment details
        $apartment->update([
            'mansion_name' => $request->mansion_name,
            'mansion_address' => $request->mansion_address,
            'mansion_structure' => $request->mansion_structure,
            'pic_id' => $request->pic_id,
            'notes' => $request->notes,
        ]);

        // Update main image synchronously
        if ($request->hasFile('image')) {
            \Log::info("Main Image Uploaded: " . $request->file('image')->getClientOriginalName());

            if ($apartment->image && Storage::exists('public/' . str_replace('storage/', '', $apartment->image))) {
                Storage::delete('public/' . str_replace('storage/', '', $apartment->image));
            }

            $image = $request->file('image');
            $fileName = $request->mansion_name . '_main';
            $path = 'apartment_images/' . $fileName . '.' . $image->getClientOriginalExtension();

            $optimizedImage = Image::read($image->getRealPath())->resize(300, 300)->encode();
            Storage::put('public/' . $path, $optimizedImage);

            $apartment->update(['image' => 'storage/' . $path]);
        } else {
            \Log::info("No Main Image Provided");
        }

        $processedRoomIds = [];
        foreach ($request->rooms as $index => $roomData) {
            \Log::info("Processing Room $index: ", $roomData);

            if (!empty($roomData['id'])) {
                // Update existing room
                $room = RoomTable::findOrFail($roomData['id']);
                
                // Collect existing photos
                $existingPhotos = $room->photos ? json_decode($room->photos, true) : [];

                // Process new photos
                if (isset($roomData['photos']) && is_array($roomData['photos'])) {
                    foreach ($roomData['photos'] as $photo) {
                        $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                        $localPath = $photo->store('temp_photos', 'local');
                        $destinationPath = 'Accounting/Apartment/room_photos/' . $fileName;

                        // Dispatch job to process the photo
                        ProcessRoomPhoto::dispatch($localPath, $destinationPath);

                        // Add the new photo path to the array
                        $existingPhotos[] = $destinationPath;

                        \Log::info("Dispatched photo processing job for room $room->id");
                    }
                }

                // Update the room with new data and photos
                $room->update([
                    'room_number' => $roomData['room_number'] ?? $room->room_number,
                    'room_type' => $roomData['room_type'] ?? $room->room_type,
                    'initial_rent' => $roomData['initial_rent'] ?? $room->initial_rent,
                    'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : $room->facilities,
                    'max_student' => $roomData['max_student'] ?? $room->max_student,
                    'notes' => $roomData['notes'] ?? $room->notes,
                    'photos' => json_encode($existingPhotos), // Save the updated photos array
                ]);
                $processedRoomIds[] = $room->id;
            } else {
                // Create new room
                $newPhotos = [];
                if (isset($roomData['photos']) && is_array($roomData['photos'])) {
                    foreach ($roomData['photos'] as $photo) {
                        $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
                        $localPath = $photo->store('temp_photos', 'local');
                        $destinationPath = 'Accounting/Apartment/room_photos/' . $fileName;

                        // Dispatch job to process the photo
                        ProcessRoomPhoto::dispatch($localPath, $destinationPath);

                        // Add the new photo path to the array
                        $newPhotos[] = $destinationPath;

                        \Log::info("Dispatched photo processing job for new room");
                    }
                }

                // Save the new room
                $newRoom = RoomTable::create([
                    'apartment_id' => $apartment->id,
                    'room_number' => $roomData['room_number'] ?? null,
                    'room_type' => $roomData['room_type'] ?? null,
                    'initial_rent' => $roomData['initial_rent'] ?? null,
                    'facilities' => isset($roomData['facilities']) ? json_encode(explode(',', $roomData['facilities'])) : null,
                    'max_student' => $roomData['max_student'] ?? null,
                    'notes' => $roomData['notes'] ?? null,
                    'photos' => json_encode($newPhotos), // Save the new photos array
                ]);
                $processedRoomIds[] = $newRoom->id;
            }
        }

        RoomTable::where('apartment_id', $apartment->id)->whereNotIn('id', $processedRoomIds)->delete();
        \Log::info("Room Processing Completed");

        return response()->json(['message' => 'Apartment updated successfully. Photos are being processed in the background.']);
    } catch (\Exception $e) {
        \Log::error("Error Updating Apartment: " . $e->getMessage());
        return response()->json(['error' => 'An error occurred during the update process.'], 500);
    }
}


}
