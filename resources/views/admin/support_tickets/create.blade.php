@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Create Support Ticket</h2>

    <form action="{{ route('support_tickets.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block mb-1">Subject</label>
            <input type="text" name="subject" class="w-full p-2 bg-gray-800 text-white rounded" required>
        </div>

        <div>
            <label class="block mb-1">Message</label>
            <textarea name="message" class="w-full p-2 bg-gray-800 text-white rounded" rows="5" required></textarea>
        </div>

        <div>
            <label class="block mb-1">Priority</label>
            <select name="priority" class="w-full p-2 bg-gray-800 text-white rounded">
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded">Submit</button>
    </form>
</div>
@endsection
