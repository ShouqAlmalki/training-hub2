@extends('layouts.custom.app')
@section('title', 'Supervisor Chat')
@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="row">
            <!-- Sidebar: list of students -->
            <div class="col-md-4">
                <div class="list-group">
                    @foreach ($user->students as $student)
                        <a href="{{ route('supervisor.start.chat', $student->id) }}" class="list-group-item list-group-item-action {{ isset($selectedStudent) && $selectedStudent->id == $student->id ? 'bg-success text-white' : '' }}">
                            {{ $student->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if(isset($selectedStudent))
                            Chat with {{ $selectedStudent->name }}
                        @else
                            Select a student to start chatting.
                        @endif
                    </div>
                    @if (isset($messages))
                        <div class="card-body" id="chat-box" style="height: 400px; overflow-y: scroll;">
                            @foreach ($messages as $message)
                                <div class="message {{ $message->user_id == auth()->id() ? 'text-right' : 'text-left' }}">
                                    <p><strong>{{ $message->user->name }}:</strong> {{ $message->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if(isset($selectedStudent))
                    <div class="card-footer">
                        <form id="chat-form" action="{{ route('supervisor.chat.send', $selectedStudent->id) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="message" class="form-control" placeholder="Type a message..." required><br>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Send</button>
                        </form>
                    </div>
                    @endif
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