@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Generate API Key</h2>

    <form action="{{ route('api_keys.store') }}" method="POST">
        @csrf
        <label class="block mb-2">Select Merchant</label>
        <select name="merchant_id" required class="border p-2 rounded w-full mb-4">
            <option value="">-- Select Merchant --</option>
            @foreach($merchants as $merchant)
                <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
            @endforeach
        </select>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Generate</button>
    </form>
</div>
@endsection
