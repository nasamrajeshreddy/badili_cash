@extends('layouts.app')

@section('title', 'All Transactions')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>All Transactions</li>
@endsection

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">All Transactions</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Type</th>
                <th class="border px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
                <tr>
                    <td class="border px-4 py-2">{{ $transaction->id }}</td>
                    <td class="border px-4 py-2">{{ $transaction->user }}</td>
                    <td class="border px-4 py-2">{{ $transaction->amount }}</td>
                    <td class="border px-4 py-2 capitalize">{{ $transaction->type }}</td>
                    <td class="border px-4 py-2">{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No transactions found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
