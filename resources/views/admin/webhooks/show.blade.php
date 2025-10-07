@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Webhook Details - #{{ $webhook->id }}</h2>

    <div class="bg-gray-100 p-4 rounded">
        <p><strong>Event:</strong> {{ $webhook->event }}</p>
        <p><strong>Status:</strong> {{ $webhook->status }}</p>
        <p><strong>Received At:</strong> {{ $webhook->created_at }}</p>
        <p><strong>Payload:</strong></p>
        <pre class="bg-white p-4 rounded border">{{ json_encode(json_decode($webhook->payload), JSON_PRETTY_PRINT) }}</pre>
    </div>

    <a href="{{ route('webhooks.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">Back to list</a>
</div>
@endsection
