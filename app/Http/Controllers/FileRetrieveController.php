<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class FileRetrieveController extends Controller
{
    public function __invoke($filename)
    {
        $folderPath = 'Accounting/Apartment/room_photos/'; // Adjust to your folder structure

        try {
            Log::info("Attempting to retrieve file: {$folderPath}{$filename}");
        
            $image = Gdrive::get($folderPath . $filename);
        
            if (!$image) {
                Log::error("File not found: {$folderPath}{$filename}");
                return response()->json(['message' => 'File not found'], 404);
            }
        
            Log::info("Successfully retrieved file: {$folderPath}{$filename}");
            return response($image->file, 200)->header('Content-Type', 'image/jpeg');
        } catch (\Exception $e) {
            Log::error("Error retrieving file: " . $e->getMessage());
            return response()->json(['message' => 'An error occurred while retrieving the file'], 500);
        }
        
    }
}
