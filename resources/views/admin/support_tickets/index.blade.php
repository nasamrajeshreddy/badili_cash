@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Support Tickets</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.support.create') }}" class="bg-yellow-500 text-black px-4 py-2 rounded mb-4 inline-block">
        + New Ticket
    </a>

    <table class="min-w-full bg-gray-800 text-white rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Subject</th>
                <th class="px-4 py-2 text-left">Priority</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr class="border-t border-gray-700">
                <td class="px-4 py-2">{{ $ticket->id }}</td>
                <td class="px-4 py-2">{{ $ticket->subject }}</td>
                <td class="px-4 py-2 capitalize">{{ $ticket->priority }}</td>
                <td class="px-4 py-2 capitalize">{{ $ticket->status }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('support_tickets.show', $ticket->id) }}" class="text-yellow-400 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
