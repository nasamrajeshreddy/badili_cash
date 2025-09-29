@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 border-t-4 border-green-500">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Create Refund</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('refunds.store') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Refund ID (readonly, generated in controller) --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Refund ID</label>
                <input type="text" name="refund_id" value="{{ old('refund_id', $refundId ?? '') }}" readonly
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed">
            </div>

            {{-- Payment ID --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Payment ID</label>
                <input type="text" name="payment_id" placeholder="Enter Payment ID" required
                       value="{{ old('payment_id') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            {{-- Transaction --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Transaction</label>
                <select name="transaction_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="">-- Select Transaction --</option>
                    @foreach($transactions as $txn)
                        <option value="{{ $txn->id }}" {{ old('transaction_id') == $txn->id ? 'selected' : '' }}>
                            {{ $txn->id }} - {{ $txn->payment_id ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Amount --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Amount</label>
                <input type="number" name="amount" placeholder="Enter Amount" min="1" step="0.01" required
                       value="{{ old('amount') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            {{-- Currency --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Currency</label>
                <select name="currency" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR</option>
                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                </select>
            </div>

            {{-- Reason --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Reason</label>
                <textarea name="reason" placeholder="Enter Reason for Refund" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 h-24 resize-none">{{ old('reason') }}</textarea>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="initiated" {{ old('status','initiated') == 'initiated' ? 'selected' : '' }}>initiated</option>
                    <option value="processed" {{ old('status') == 'processed' ? 'selected' : '' }}>processed</option>
                    <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>failed</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                Submit Refund
            </button>
        </form>
    </div>
</div>
@endsection
