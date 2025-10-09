@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Notifications</h1>

    <table class="w-full bg-gray-800 text-gray-200 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">Title</th>
                <th class="p-3">Type</th>
                <th class="p-3">Status</th>
                <th class="p-3">Created At</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $note)
            <tr class="border-b border-gray-700 {{ $note->is_read ? 'bg-gray-900' : 'bg-gray-800' }}">
                <td class="p-3">{{ $note->id }}</td>
                <td class="p-3">{{ $note->title }}</td>
                <td class="p-3">{{ ucfirst($note->type) }}</td>
                <td class="p-3">{{ $note->is_read ? 'Read' : 'Unread' }}</td>
                <td class="p-3">{{ $note->created_at }}</td>
                <td class="p-3 flex space-x-2">
                    <a href="{{ route('notifications.show', $note->id) }}" class="text-yellow-400 hover:underline">View</a>
                    @if(!$note->is_read)
                        <form action="{{ route('notifications.markRead', $note->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-green-400 hover:underline">Mark as Read</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $notifications->links() }}
    </div>
</div>
@endsection
