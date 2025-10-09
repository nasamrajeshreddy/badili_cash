@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Upload Bank Report for Reconciliation</h1>

    <form action="{{ route('reconciliation.upload') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-lg">
        @csrf
        <label class="block text-gray-300 mb-2">Choose Bank CSV File:</label>
        <input type="file" name="file" required class="p-2 bg-gray-700 text-gray-200 rounded w-full">

        <button type="submit" class="mt-4 bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">
            Start Reconciliation
        </button>
    </form>
</div>
@endsection
