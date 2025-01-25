<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        return view("supervisor.chat", compact("user"));
    }

    public function start($studentId) 
    {
        $user = auth()->user();
        $selectedStudent = User::findOrFail($studentId);
        $messages = Message::whereIn('user_id', [auth()->id(), $selectedStudent->id])
            ->whereIn('recipient_id', [auth()->id(), $selectedStudent->id])
            ->get();
            return view('supervisor.chat', compact('selectedStudent', 'messages', 'user'));
    }

    public function send(Request $request, $studentId)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->user_id = auth()->id();
        $message->recipient_id = $studentId;
        $message->content = $request->message;
        $message->save();

        return redirect()->route('supervisor.start.chat', $studentId);
    }
}
