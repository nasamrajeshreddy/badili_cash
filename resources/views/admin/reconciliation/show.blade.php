@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Reconciliation Details</h1>

    <div class="bg-gray-800 p-5 rounded text-gray-300">
        <p><strong>Transaction ID:</strong> {{ $rec->transaction_id }}</p>
        <p><strong>Bank Reference:</strong> {{ $rec->bank_reference }}</p>
        <p><strong>Amount:</strong> ₹{{ number_format($rec->amount, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($rec->status) }}</p>
        <p><strong>Remarks:</strong> {{ $rec->remarks }}</p>
        <p><strong>Reconciled At:</strong> {{ $rec->reconciled_at }}</p>
    </div>

    <a href="{{ route('reconciliation.index') }}" class="mt-4 inline-block text-yellow-400 hover:underline">← Back to Reconciliation List</a>
</div>
@endsection
