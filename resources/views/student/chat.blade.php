@extends('layouts.custom.app')
@section('title', 'Student Chat')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(isset($supervisor))
                        Chat with Supervisor: {{ $supervisor->name }}
                    @else
                        No supervisor assigned.
                    @endif
                </div>
                <div class="card-body" id="chat-box" style="height: 400px; overflow-y: scroll;">
                    @if(isset($messages) && $messages->count() > 0)
                        @foreach ($messages as $message)
                            <div class="message {{ $message->user_id == auth()->id() ? 'text-right' : 'text-left' }}">
                                <p>
                                    <strong>{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}:</strong>
                                    {{ $message->content }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p>No messages yet. Start the conversation!</p>
                    @endif
                </div>
                <div class="card-footer">
                    <form id="chat-form" action="{{ route('student.chat.send') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Type a message..." required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 mb-2">Send</button>
                    </form>
                </div>
            </div>
        </div>
  </div>
</div>
  <script>
    // Simple chat scroll functionality
    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>
@endsection