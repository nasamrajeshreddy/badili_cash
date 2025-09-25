@extends('layouts.app')

@section('title', 'Add Settlement')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Add Settlement</li>
@endsection

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Add Settlement</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('settlements.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-medium">User</label>
            <input type="text" name="user" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Amount</label>
            <input type="number" name="amount" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Settlement</button>
        </div>
    </form>
</div>
@endsection
