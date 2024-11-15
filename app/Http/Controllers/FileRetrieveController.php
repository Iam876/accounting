<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Yaza\LaravelGoogleDriveStorage\Gdrive;
use App\Models\roomTable;

class FileRetrieveController extends Controller
{
    // public function __invoke($filename)
    // {
    //     try {
    //         $folderPath = 'Accounting/Apartment/room_photos/'; // Adjust folder structure if needed
    //         $filePath = $folderPath . $filename;

    //         \Log::info("Attempting to retrieve file: {$filePath}");

    //         // Retrieve the file from Google Drive
    //         if (!\Storage::disk('google')->exists($filePath)) {
    //             \Log::error("File not found: {$filePath}");
    //             return response()->json(['message' => 'File not found'], 404);
    //         }

    //         $image = \Storage::disk('google')->get($filePath);
    //         $mimeType = \Storage::disk('google')->mimeType($filePath);

    //         \Log::info("Successfully retrieved file: {$filePath}");
    //         return response($image, 200)->header('Content-Type', $mimeType);
    //     } catch (\Exception $e) {
    //         \Log::error("Error retrieving file: " . $e->getMessage());
    //         return response()->json(['message' => 'An error occurred while retrieving the file'], 500);
    //     }
    // }


    public function __invoke($filename)
    {
        try {
            // Retrieve the file path from the database
            $fileRecord = roomTable::where('photos', 'LIKE', '%' . $filename . '%')->first();

            if (!$fileRecord) {
                \Log::error("File record not found for filename: {$filename}");
                return response()->json(['message' => 'File record not found in the database'], 404);
            }

            // Extract the actual file path
            $photos = json_decode($fileRecord->photos, true); // Assuming 'photos' is a JSON-encoded array
            $filePath = collect($photos)->first(fn($path) => str_contains($path, $filename));

            if (!$filePath) {
                \Log::error("File path not found in the database for filename: {$filename}");
                return response()->json(['message' => 'File path not found'], 404);
            }

            \Log::info("Attempting to retrieve file: {$filePath}");

            // Retrieve the file from Google Drive
            if (!\Storage::disk('google')->exists($filePath)) {
                \Log::error("File not found on Google Drive: {$filePath}");
                return response()->json(['message' => 'File not found on Google Drive'], 404);
            }

            $image = \Storage::disk('google')->get($filePath);
            $mimeType = \Storage::disk('google')->mimeType($filePath);

            \Log::info("Successfully retrieved file: {$filePath}");
            return response($image, 200)->header('Content-Type', $mimeType);
        } catch (\Exception $e) {
            \Log::error("Error retrieving file: " . $e->getMessage());
            return response()->json(['message' => 'An error occurred while retrieving the file'], 500);
        }
    }

}
