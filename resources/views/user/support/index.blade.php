@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4 text-white">My Support Tickets</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('user.tickets.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">
        + Raise New Ticket
    </a>

    @if($tickets->count())
    <table class="min-w-full bg-gray-800 text-white rounded mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Subject</th>
                <th class="px-4 py-2 text-left">Category</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Created</th>
                <th class="px-4 py-2 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr class="border-t border-gray-700">
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
                <td class="px-4 py-2">{{ $ticket->created_at->format('d M Y, H:i') }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('user.tickets.show', $ticket) }}" 
                       class="text-yellow-400 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="text-gray-400 mt-4">No tickets raised yet.</div>
    @endif
</div>
@endsection
