@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Ticket #{{ $ticket->id }} - {{ $ticket->subject }}</h2>

    {{-- Ticket Details --}}
    <div class="bg-gray-800 text-white p-4 rounded mb-6">
        <p><strong>Priority:</strong> {{ ucfirst($ticket->priority) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
        <p><strong>Created:</strong> {{ $ticket->created_at->format('d M Y, H:i') }}</p>
    </div>

    {{-- Conversation Thread --}}
    <h3 class="text-lg font-semibold mb-3">Conversation</h3>

    <div class="bg-gray-900 p-4 rounded mb-6 max-h-[400px] overflow-y-auto">
        @forelse($ticket->replies as $reply)
            <div class="mb-4">
                <div class="flex justify-between">
                    <span class="font-semibold text-yellow-400">{{ $reply->user->name ?? 'User' }}</span>
                    <span class="text-sm text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
                </div>
                <div class="bg-gray-800 p-3 mt-1 rounded">
                    {{ $reply->message }}
                </div>
            </div>
        @empty
            <p class="text-gray-400">No replies yet. Start the conversation below.</p>
        @endforelse
    </div>

    {{-- Add Reply Form --}}
    <form action="{{ route('support_tickets.reply', $ticket->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
    @csrf
    <div>
        <textarea name="message" class="w-full p-3 bg-gray-800 text-white rounded" rows="4" placeholder="Type your reply..." required></textarea>
    </div>
    <div>
        <input type="file" name="file" class="w-full text-white p-2 bg-gray-700 rounded">
        <p class="text-gray-400 text-sm mt-1">Optional: Attach a file (jpg, png, pdf, doc, docx)</p>
    </div>
    <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded">Send Reply</button>
</form>


    {{-- Update Status --}}
    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-2">Update Ticket Status</h3>
        <form action="{{ route('support_tickets.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <select name="status" class="p-2 bg-gray-800 text-white rounded mr-2">
                <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>

            <button type="submit" class="bg-yellow-600 text-black px-4 py-2 rounded">Update Status</button>
        </form>
    </div>
</div>




@foreach($ticket->replies as $reply)
<div class="mb-4">
    <div class="flex justify-between">
        <span class="font-semibold text-yellow-400">{{ $reply->user->name ?? 'User' }}</span>
        <span class="text-sm text-gray-400">{{ $reply->created_at->diffForHumans() }}</span>
    </div>
    <div class="bg-gray-800 p-3 mt-1 rounded">
        {{ $reply->message }}
        @if($reply->file_path)
            <div class="mt-2">
                <a href="{{ asset('storage/' . $reply->file_path) }}" target="_blank" class="text-yellow-400 hover:underline">
                    📎 View / Download Attachment
                </a>
            </div>
        @endif
    </div>
</div>
@endforeach

@endsection
