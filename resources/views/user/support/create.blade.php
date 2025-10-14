@extends('layouts.app')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4 text-white">Raise a New Support Ticket</h2>

    <form action="{{ route('user.tickets.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded text-white">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Subject</label>
            <input type="text" name="subject" class="w-full px-4 py-2 bg-gray-700 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Category</label>
            <select name="category" class="w-full px-4 py-2 bg-gray-700 rounded" required>
                <option value="">Select Category</option>
                <option value="payment">Payment</option>
                <option value="account">Account</option>
                <option value="technical">Technical</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 bg-gray-700 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Attachment (optional)</label>
            <input type="file" name="attachment" class="text-white">
        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Submit Ticket</button>
    </form>
</div>
@endsection
