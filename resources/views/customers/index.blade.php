@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Customers</h2>
        <a href="{{ route('customers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md shadow">
            + Add Customer
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold">#</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Name</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Phone</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Created At</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $customer->name }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $customer->email }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $customer->phone }}</td>
                        <td class="py-3 px-4 text-sm text-gray-700">{{ $customer->created_at->format('d M Y') }}</td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">No customers found</td>
   
   
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
