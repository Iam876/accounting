<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Student;
use Illuminate\Support\Facades\Log;


class StudentAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // use Dispatchable, SerializesModels;

    public $student;

    public function __construct(Student $student)
    {
        Log::info('StudentAdded event fired for student ID: ' . $student->id);
        $this->student = $student;
        \Log::info('StudentAdded event dispatched for student ID: ' . $student->id);

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
