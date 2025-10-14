@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto text-white">
    <h2 class="text-xl font-semibold mb-4">Ticket: {{ $ticket->subject }}</h2>

    <div class="bg-gray-800 p-4 rounded mb-4">
        <p><strong>Category:</strong> {{ ucfirst($ticket->category) }}</p>
        <p><strong>Status:</strong> 
            <span class="px-2 py-1 rounded text-sm 
                @if($ticket->status == 'open') bg-green-700
                @elseif($ticket->status == 'in_progress') bg-yellow-700
                @else bg-gray-600 @endif">
                {{ ucfirst($ticket->status) }}
            </span>
        </p>
        <p class="mt-2"><strong>Description:</strong> {{ $ticket->description }}</p>
        @if($ticket->attachment)
            <p class="mt-2">
                <a href="{{ asset('storage/'.$ticket->attachment) }}" target="_blank" class="text-blue-400 hover:underline">
                    View Attachment
                </a>
            </p>
        @endif
    </div>

    <div class="space-y-4 mb-6">
        @foreach($ticket->replies as $reply)
            <div class="p-4 rounded 
                @if($reply->user_id == auth()->id()) bg-blue-800 ml-16 text-right 
                @else bg-gray-700 mr-16 text-left @endif">
                <p class="text-sm mb-1">
                    <strong>{{ $reply->user->name }}</strong> 
                    <span class="text-gray-400 text-xs">{{ $reply->created_at->format('d M Y, H:i') }}</span>
                </p>
                <p>{{ $reply->message }}</p>
                @if($reply->file_path)
                    <p class="mt-1">
                        <a href="{{ asset('storage/'.$reply->file_path) }}" target="_blank" class="text-yellow-400 hover:underline">
                            📎 View Attachment
                        </a>
                    </p>
                @endif
            </div>
        @endforeach
    </div>

    <form action="{{ route('user.tickets.reply', $ticket) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-4 rounded">
        @csrf
        <textarea name="message" rows="3" class="w-full px-4 py-2 bg-gray-700 rounded mb-3" placeholder="Type your reply..." required></textarea>
        <input type="file" name="file" class="text-white mb-3">
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Send Reply</button>
    </form>
</div>
@endsection
