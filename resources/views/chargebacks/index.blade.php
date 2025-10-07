@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Chargebacks</h2>
        <a href="{{ route('chargebacks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            + New Chargeback
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Chargeback ID</th>
                    <th class="px-4 py-3 border-b">Transaction ID</th>
                    <th class="px-4 py-3 border-b">Merchant</th>
                    <th class="px-4 py-3 border-b">Amount</th>
                    <th class="px-4 py-3 border-b">Reason</th>
                    <th class="px-4 py-3 border-b">Status</th>
                    <th class="px-4 py-3 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($chargebacks as $index => $cbk)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border-b font-mono text-blue-600">{{ $cbk->chargeback_id }}</td>
                        <td class="px-4 py-3 border-b">{{ $cbk->transaction_id }}</td>
                        <td class="px-4 py-3 border-b">{{ $cbk->merchant_name ?? '-' }}</td>
                        <td class="px-4 py-3 border-b">₹{{ number_format($cbk->amount, 2) }}</td>
                        <td class="px-4 py-3 border-b text-gray-700">{{ $cbk->reason ?? '—' }}</td>
                        <td class="px-4 py-3 border-b">
                            <span class="px-2 py-1 rounded-full text-sm 
                                @if($cbk->status == 'initiated') bg-yellow-100 text-yellow-800 
                                @elseif($cbk->status == 'under_review') bg-blue-100 text-blue-800 
                                @elseif($cbk->status == 'resolved') bg-green-100 text-green-800 
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($cbk->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 border-b text-center">
                            <a href="{{ route('chargebacks.edit', $cbk->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                            <a href="{{ route('chargebacks.delete', $cbk->id) }}" 
                               onclick="return confirm('Are you sure you want to delete this chargeback?')" 
                               class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">No chargebacks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
