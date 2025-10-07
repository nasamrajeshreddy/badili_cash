@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Add Webhook</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('webhooks.store') }}" method="POST" class="bg-gray-100 p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Event</label>
            <input type="text" name="event" class="w-full border px-3 py-2 rounded" placeholder="e.g. payment_success" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Payload (JSON)</label>
            <textarea name="payload" rows="6" class="w-full border px-3 py-2 rounded" placeholder='{"order_id":"ORD123","amount":1000}' required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded" required>
                <option value="pending">Pending</option>
                <option value="processed">Processed</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Webhook</button>
    </form>
</div>
@endsection
