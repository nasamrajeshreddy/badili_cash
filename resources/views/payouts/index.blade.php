@extends('layouts.app')

@section('content')
@section('breadcrumb')
<li class="mx-2">/</li>
<li>All Payouts</li>
@endsection
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">All Payouts</h2>

    @if(session('success'))
        <div class="bg-green-100 p-3 rounded mb-3">{{ session('success') }}</div>
    @endif

    <table class="w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Bank Account</th>
                <th class="border px-4 py-2">IFSC</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payouts as $payout)
                <tr>
                    <td class="border px-4 py-2">{{ $payout->id }}</td>
                    <td class="border px-4 py-2">{{ $payout->user->name }}</td>
                    <td class="border px-4 py-2">{{ $payout->bank_account }}</td>
                    <td class="border px-4 py-2">{{ $payout->ifsc }}</td>
                    <td class="border px-4 py-2">{{ $payout->amount }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($payout->status) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('payouts.edit', $payout) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
