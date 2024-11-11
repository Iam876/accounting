<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Storage;

class messageController extends Controller
{
    // public function index()
    // {
    //     // Fetch all users except the authenticated user
    //     $users = User::where('id', '!=', Auth::id())->get();
    //     return view('message',compact('users'));
    // }

    // public function fetchMessages($receiver_id)
    // {
    //     $messages = Message::where(function ($query) use ($receiver_id) {
    //             $query->where('sender_id', Auth::id())
    //                   ->where('receiver_id', $receiver_id);
    //         })
    //         ->orWhere(function ($query) use ($receiver_id) {
    //             $query->where('sender_id', $receiver_id)
    //                   ->where('receiver_id', Auth::id());
    //         })
    //         ->orderBy('created_at', 'asc')
    //         ->get();

    //     return response()->json($messages);
    // }

    // public function sendMessage(Request $request)
    // {
    //     \Log::info('Request received:', $request->all()); // Log incoming request data

    //     // Validate incoming request data
    //     $request->validate([
    //         'receiver_id' => 'required|exists:users,id',
    //         'message' => 'nullable|string', // Use "message" instead of "content"
    //         'attachment' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
    //     ]);

    //     \Log::info('Validation passed.');

    //     // Prepare data for storage
    //     $data = $request->only('message', 'receiver_id'); // Use "message" key instead of "content"
    //     $data['sender_id'] = Auth::id(); // Assign sender_id to authenticated user ID

    //     // Check if attachment is present and store it
    //     if ($request->hasFile('attachment')) {
    //         $data['attachment_path'] = $request->file('attachment')->store('attachments', 'public');
    //         \Log::info('Attachment stored at: ' . $data['attachment_path']);
    //     }

    //     // Store the message in the database
    //     $message = Message::create($data);

    //     \Log::info('Message successfully stored:', $message->toArray()); // Log the stored message data

    //     // Return response with message details
    //     return response()->json([
    //         'success' => true,
    //         'message' => $message,
    //         'message_text' => 'Message sent successfully!'
    //     ]);
    // }


    public function index()
    {
        $users = cache()->remember('users_except_auth_' . Auth::id(), now()->addMinutes(5), function () {
            return User::where('id', '!=', Auth::id())->get();
        });

        return view('message', compact('users'));
    }

    public function fetchMessages($receiver_id)
    {
        $messages = Message::where(function ($query) use ($receiver_id) {
                $query->where('sender_id', Auth::id())
                      ->where('receiver_id', $receiver_id);
            })
            ->orWhere(function ($query) use ($receiver_id) {
                $query->where('sender_id', $receiver_id)
                      ->where('receiver_id', Auth::id());
            })
            ->orderBy('created_at', 'asc')
            ->get();
    
        return response()->json(array_values($messages->toArray())); // Ensures JSON response is a true array
    }
    


    public function sendMessage(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048',
        ]);

        // Prepare data for storage
        $data = [
            'sender_id' => Auth::id(),
            'receiver_id' => $validatedData['receiver_id'],
            'message' => $validatedData['message'] ?? null
        ];

        // Check if attachment is present and store it
        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('attachments', 'public');
        }

        // Store the message in the database
        $message = Message::create($data);

        // Optionally, trigger an event here for real-time update (if using WebSocket)
        // event(new MessageSent($message));

        return response()->json([
            'success' => true,
            'message' => $message,
            'message_text' => 'Message sent successfully!'
        ]);
    }


    public function typing(Request $request)
    {
        $receiverId = $request->receiver_id;
        $cacheKey = 'typing_' . $receiverId;
        
        // Only set typing status for the receiver
        Cache::put($cacheKey, true, now()->addSeconds(2)); // Typing expires in 2 seconds
        return response()->json(['success' => true]);
    }

    public function checkTyping($receiverId)
    {
        $isTyping = Cache::get('typing_' . $receiverId, false);
        return response()->json(['typing' => $isTyping]);
    }


}
