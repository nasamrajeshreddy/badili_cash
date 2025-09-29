@extends('layouts.app')

@section('content')
@section('breadcrumb')
<li class="mx-2">/</li>
<li>All Refund Transactions</li>
@endsection
<div class="min-h-screen bg-gray-100 p-4">
    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Refunds</h2>
            <a href="{{ route('refunds.create') }}" 
               class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-lg transition-colors duration-200">
                Create Refund
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($refunds->isEmpty())
            <p class="text-center text-gray-500 py-10">No refunds found</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Refund ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Payment ID</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Amount</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Reason</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Date</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($refunds as $rf)
                        <tr>
                            <td class="px-4 py-2 text-gray-700">{{ $rf->refund_id }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $rf->payment_id }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $rf->amount }} {{ $rf->currency }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('refunds.updateStatus', $rf->id) }}" method="POST">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" 
                                            class="border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-green-500">
                                        <option value="initiated" {{ $rf->status=='initiated' ? 'selected' : '' }}>initiated</option>
                                        <option value="processed" {{ $rf->status=='processed' ? 'selected' : '' }}>processed</option>
                                        <option value="failed" {{ $rf->status=='failed' ? 'selected' : '' }}>failed</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-4 py-2 text-gray-700">{{ $rf->reason }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $rf->created_at->format('d-m-Y H:i') }}</td>
                            <td class="px-4 py-2">
                                @php
                                    $statusClasses = [
                                        'initiated' => 'bg-gray-300 text-gray-800',
                                        'processed' => 'bg-green-500 text-white',
                                        'failed' => 'bg-red-500 text-white',
                                    ];
                                @endphp
                                <span class="px-2 py-1 rounded-full text-sm font-semibold {{ $statusClasses[$rf->status] }}">
                                    {{ ucfirst($rf->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
