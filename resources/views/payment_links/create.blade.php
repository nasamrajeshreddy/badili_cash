@extends('layouts.app')

@section('title', 'Add Payment Link')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Add Payment Link</li>
@endsection

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Create Payment Link</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('payment_links.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-medium">Title</label>
            <input type="text" name="title" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Amount (INR)</label>
            <input type="number" name="amount" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Create Payment Link
            </button>
        </div>
    </form>
</div>
@endsection
