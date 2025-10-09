@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Fees & Commissions</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('fees_commissions.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add New</a>

    <table class="min-w-full bg-gray-800 text-white rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Type</th>
                <th class="px-4 py-2 text-left">Value</th>
                <th class="px-4 py-2 text-left">Applied On</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fees as $fee)
            <tr class="border-t border-gray-700">
                <td class="px-4 py-2">{{ $fee->name }}</td>
                <td class="px-4 py-2">{{ ucfirst($fee->type) }}</td>
                <td class="px-4 py-2">{{ $fee->value }}</td>
                <td class="px-4 py-2">{{ ucfirst($fee->applied_on) }}</td>
                <td class="px-4 py-2">
                    @if($fee->active)
                        <span class="text-green-400">Active</span>
                    @else
                        <span class="text-red-400">Inactive</span>
                    @endif
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('fees_commissions.edit', $fee->id) }}" class="text-yellow-400 hover:underline mr-2">Edit</a>
                    <a href="{{ route('fees_commissions.toggle', $fee->id) }}" class="text-blue-400 hover:underline">
                        {{ $fee->active ? 'Deactivate' : 'Activate' }}
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-4 py-2 text-center text-gray-400">No fees found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $fees->links() }}
    </div>
</div>
@endsection



