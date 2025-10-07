@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Webhooks</h2>

    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Event</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Received At</th>
                <th class="py-2 px-4">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($webhooks as $webhook)
            <tr class="text-center border-b">
                <td class="py-2 px-4">{{ $webhook->id }}</td>
                <td class="py-2 px-4">{{ $webhook->event }}</td>
                <td class="py-2 px-4">{{ $webhook->status }}</td>
                <td class="py-2 px-4">{{ $webhook->created_at }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('webhooks.show', $webhook->id) }}" class="text-blue-500 hover:underline">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $webhooks->links() }}
    </div>
</div>
@endsection
