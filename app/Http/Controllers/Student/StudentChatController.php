<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class StudentChatController extends Controller
{
    public function studentChat()
{
    // Ensure the logged-in user is a student
    if (auth()->user()->role !== 'student') {
        abort(403, 'Unauthorized action.');
    }

    $user = auth()->user();
    $notifications = auth()->user()->notifications;
    $supervisor = $user->supervisor;
    // Fetch messages between the student and the supervisor
    $messages = Message::where(function ($query) use ($supervisor) {
        $query->where('user_id', auth()->id())
              ->where('recipient_id', $supervisor->id);
    })->orWhere(function ($query) use ($supervisor) {
        $query->where('user_id', $supervisor->id)
              ->where('recipient_id', auth()->id());
    })->get();

    return view('student.chat', compact('supervisor', 'messages', 'user','notifications'));
}

public function studentSend(Request $request)
{
    // Ensure the logged-in user is a student
    if (auth()->user()->role !== 'student') {
        abort(403, 'Unauthorized action.');
    }

    // Validate the request
    $request->validate([
        'message' => 'required|string|max:255',
    ]);
    $user = auth()->user();
    $supervisor = $user->supervisor;// Adjust logic if needed
    if (!$supervisor) {
        return redirect()->route('student.chat')->with('error', 'No supervisor found.');
    }
    // Create a new message
    $message = new Message();
    $message->user_id = auth()->id();
    $message->recipient_id = $supervisor->id;
    $message->content = $request->message;
    $message->save();
    return redirect()->route('student.chat');
}
}
