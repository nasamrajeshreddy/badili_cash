@extends('layouts.app')

@section('title', 'All Settlements')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>All Settlements</li>
@endsection

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">All Settlements</h2>

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
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($settlements as $settlement)
                <tr>
                    <td class="border px-4 py-2">{{ $settlement->id }}</td>
                    <td class="border px-4 py-2">{{ $settlement->user }}</td>
                    <td class="border px-4 py-2">{{ $settlement->amount }}</td>
                    <td class="border px-4 py-2 capitalize">{{ $settlement->status }}</td>
                    <td class="border px-4 py-2">{{ $settlement->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border px-4 py-2 text-center">No settlements found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
