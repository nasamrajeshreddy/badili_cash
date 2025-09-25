@extends('layouts.app')

@section('title', 'All Payment Links')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>All Payment Links</li>
@endsection

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">All Payment Links</h2>

    <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paymentLinks ?? [] as $link)
            <tr>
                <td class="border px-4 py-2">{{ $link->id }}</td>
                <td class="border px-4 py-2">{{ $link->title }}</td>
                <td class="border px-4 py-2">{{ $link->amount }} {{ $link->currency }}</td>
                <td class="border px-4 py-2 capitalize">{{ $link->status }}</td>
                <td class="border px-4 py-2">{{ $link->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
