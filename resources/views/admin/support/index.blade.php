@extends('layouts.app')

@section('content')
<div class="p-6 text-white">
    <h2 class="text-xl font-semibold mb-4">All Support Tickets</h2>

    <table class="min-w-full bg-gray-800 rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">User</th>
                <th class="px-4 py-2 text-left">Subject</th>
                <th class="px-4 py-2 text-left">Category</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr class="border-t border-gray-700">
                <td class="px-4 py-2">{{ $ticket->user->name }}</td>
                <td class="px-4 py-2">{{ $ticket->subject }}</td>
                <td class="px-4 py-2">{{ ucfirst($ticket->category) }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 rounded text-sm 
                        @if($ticket->status == 'open') bg-green-700
                        @elseif($ticket->status == 'in_progress') bg-yellow-700
                        @else bg-gray-600 @endif">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('admin.tickets.show', $ticket) }}" class="text-yellow-400 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
