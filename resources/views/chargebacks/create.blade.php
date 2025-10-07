@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Create New Chargeback</h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('chargebacks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="transaction_id" class="block text-gray-700 font-medium mb-2">Transaction ID</label>
                <input type="text" id="transaction_id" name="transaction_id" value="{{ old('transaction_id') }}" required
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="merchant_name" class="block text-gray-700 font-medium mb-2">Merchant Name</label>
                <input type="text" id="merchant_name" name="merchant_name" value="{{ old('merchant_name') }}"
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700 font-medium mb-2">Amount (₹)</label>
                <input type="number" step="0.01" id="amount" name="amount" value="{{ old('amount') }}" required
                       class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="reason" class="block text-gray-700 font-medium mb-2">Reason</label>
                <textarea id="reason" name="reason" rows="3"
                          class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">{{ old('reason') }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('chargebacks.index') }}" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg mr-2 hover:bg-gray-300 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Create Chargeback
                </button>
    
    
            </div>
        </form>
    </div>
</div>
@endsection
