@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Merchant Onboarding</h2>
    
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('merchant.onboard.submit') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Business Category</label>
            <input type="text" name="category" class="border p-2 w-full rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Business Website</label>
            <input type="url" name="website" class="border p-2 w-full rounded">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Submit</button>
    </form>
</div>
@endsection
