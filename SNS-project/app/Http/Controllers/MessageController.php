<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        return response()->json([
            'messages' => $messages,
        ]);
    }

    public function store(MessageRequest $request)
    {
        $message = Message::create([
            'user_id' => $request->input('user_id'),
            'artisan_id' => $request->input('artisan_id'),
            'request_id' => $request->input('request_id'),
            'message_text' => $request->input('message_text'),
            'date_sent' => now(),
            'sender' => $request->input('sender')
        ]);

        return response()->json([
            'message' => 'Message sent successfully',
            'data' => $message,
        ]);
    }
}
