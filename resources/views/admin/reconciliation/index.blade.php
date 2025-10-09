@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Reconciliation Reports</h1>

    <a href="{{ route('reconciliation.uploadForm') }}" 
       class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600">
        Upload Bank Report
    </a>

    <table class="w-full mt-5 bg-gray-800 rounded-lg overflow-hidden text-gray-300">
        <thead class="bg-gray-700">
            <tr>
                <th class="p-3">Txn ID</th>
                <th class="p-3">Bank Ref</th>
                <th class="p-3">Amount</th>
                <th class="p-3">Status</th>
                <th class="p-3">Remarks</th>
                <th class="p-3">Date</th>
                <th class="p-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recons as $rec)
            <tr class="border-b border-gray-700">
                <td class="p-3">{{ $rec->transaction_id }}</td>
                <td class="p-3">{{ $rec->bank_reference }}</td>
                <td class="p-3">₹{{ number_format($rec->amount, 2) }}</td>
                <td class="p-3">
                    @if($rec->status == 'matched')
                        <span class="text-green-400">Matched</span>
                    @elseif($rec->status == 'mismatch')
                        <span class="text-yellow-400">Mismatch</span>
                    @else
                        <span class="text-red-400">Missing</span>
                    @endif
                </td>
                <td class="p-3">{{ $rec->remarks }}</td>
                <td class="p-3">{{ $rec->reconciled_at }}</td>
                <td class="p-3">
                    <a href="{{ route('reconciliation.show', $rec->id) }}" 
                       class="text-yellow-400 hover:underline">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $recons->links() }}</div>
</div>
@endsection
