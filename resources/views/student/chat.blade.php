@extends('layouts.custom.app')
@section('title', 'Student Chat')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">
                        @if(isset($supervisor))
                            Chat with Supervisor: {{ $supervisor->name }}
                        @else
                            No Supervisor Assigned
                        @endif
                    </h5>
                </div>
                
                <div class="card-body chat-box" id="chat-box">
                    @if(isset($messages) && $messages->count() > 0)
                        @foreach ($messages as $message)
                            <div class="message {{ $message->user_id == auth()->id() ? 'student-message' : 'supervisor-message' }}">
                                <p>
                                    <strong class="sender">
                                        {{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}:
                                    </strong>
                                    <span class="chat-bubble">{{ $message->content }}</span>
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted">No messages yet. Start the conversation! 🚀</p>
                    @endif
                </div>

                <div class="card-footer">
                    <form id="chat-form" action="{{ route('student.chat.send') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Type a message..." required>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .chat-box {
        height: 400px;
        overflow-y: auto;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    .message {
        margin-bottom: 10px;
    }
    .chat-bubble {
        padding: 10px 15px;
        border-radius: 10px;
        display: inline-block;
        max-width: 75%;
    }
    .student-message .chat-bubble {
        background: #007bff;
        color: white;
        text-align: right;
        float: right;
        clear: both;
    }
    .supervisor-message .chat-bubble {
        background: #e9ecef;
        color: black;
        text-align: left;
        float: left;
        clear: both;
    }
</style>

<script>
    // Scroll to the bottom when page loads
    document.addEventListener('DOMContentLoaded', function () {
        const chatBox = document.getElementById('chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
    });
</script>

@endsection
