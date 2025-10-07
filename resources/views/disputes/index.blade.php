@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Disputes</h2>

    <div class="flex justify-between mb-4">
        <a href="{{ route('disputes.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-semibold">
           + New Dispute
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow-md border">
        <table class="w-full border-collapse">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Transaction ID</th>
                    <th class="p-3 text-left">Customer</th>
                    <th class="p-3 text-left">Reason</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Created At</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($disputes as $dispute)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $dispute->transaction_id }}</td>
                    <td class="p-3">{{ $dispute->customer_name ?? 'N/A' }}</td>
                    <td class="p-3">{{ $dispute->reason }}</td>
                    <td class="p-3">
                        <span class="px-3 py-1 rounded-full text-sm
                            {{ $dispute->status === 'resolved' ? 'bg-green-100 text-green-700' :
                               ($dispute->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ ucfirst($dispute->status) }}
                        </span>
                    </td>
                    <td class="p-3">{{ $dispute->created_at->format('d M Y, h:i A') }}</td>
                    <td class="p-3 text-center space-x-2">
                        <a href="{{ route('disputes.edit', $dispute->id) }}"
                           class="text-blue-600 hover:text-blue-800 font-semibold">Edit</a>
                        <a href="{{ route('disputes.delete', $dispute->id) }}"
                           onclick="return confirm('Are you sure you want to delete this dispute?')"
                           class="text-red-600 hover:text-red-800 font-semibold">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">No disputes found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
