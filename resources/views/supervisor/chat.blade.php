@extends('layouts.custom.app')
@section('title', 'Supervisor Chat')
@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="row">

            <!-- Sidebar: List of Students -->
            <div class="col-md-4">
                <div class="list-group">
                    <h5 class="p-2 text-center bg-light border rounded">Students</h5>
                    @foreach ($user->students as $student)
                        <a href="{{ route('supervisor.start.chat', $student->id) }}" 
                           class="list-group-item list-group-item-action 
                           {{ isset($selectedStudent) && $selectedStudent->id == $student->id ? 'bg-success text-white' : '' }}">
                            {{ $student->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Chat Box -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                        @if(isset($selectedStudent))
                            Chat with <span class="text-primary">{{ $selectedStudent->name }}</span>
                        @else
                            <span class="text-muted">Select a student to start chatting.</span>
                        @endif
                    </div>

                    @if (isset($messages))
                        <div class="card-body" id="chat-box" style="height: 400px; overflow-y: auto; background: #f9f9f9; padding: 15px; border-radius: 10px;">
                            @foreach ($messages as $message)
                                <div class="message p-2 mb-2 
                                    {{ $message->user_id == auth()->id() ? 'bg-primary text-white text-end' : 'bg-light text-dark text-start' }}" 
                                    style="border-radius: 8px; width: fit-content; max-width: 80%;">
                                    <strong>{{ $message->user_id == auth()->id() ? 'You' : $message->user->name }}:</strong> 
                                    <p class="mb-0">{{ $message->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if(isset($selectedStudent))
                    <div class="card-footer">
                        <form id="chat-form" action="{{ route('supervisor.chat.send', $selectedStudent->id) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="message" class="form-control" placeholder="Type a message..." required>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Auto-scroll to the latest message
    const chatBox = document.getElementById('chat-box');
    if (chatBox) {
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>

@endsection
