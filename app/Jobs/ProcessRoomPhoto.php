<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;



class ProcessRoomPhoto implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $localPath;
    protected $destinationPath;

    /**
     * Create a new job instance.
     *
     * @param string $localPath
     * @param string $destinationPath
     */
    public function __construct($localPath, $destinationPath)
    {
        $this->localPath = $localPath;
        $this->destinationPath = $destinationPath;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        try {
            // Get the local file path
            $filePath = Storage::disk('local')->path($this->localPath);

            // Use Image::read to load and optimize the image
            $optimizedImage = Image::read($filePath)->resize(780, 550, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Encode the optimized image
            $imageData = (string) $optimizedImage->encode();

            // Upload the optimized image to Google Drive
            Storage::disk('google')->put($this->destinationPath, $imageData);

            // Delete the local file
            Storage::disk('local')->delete($this->localPath);
        } catch (\Exception $e) {
            \Log::error("Error processing room photo: " . $e->getMessage());
        }
    }

    public function failed(\Exception $exception)
    {
        \Log::error("Job failed: {$exception->getMessage()}");
        Storage::disk('local')->delete($this->localPath); // Cleanup temporary file
    }

}


