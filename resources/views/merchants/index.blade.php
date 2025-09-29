@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-blue-600">Merchants</h2>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border border-gray-200 rounded-lg shadow-sm">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Business</th>
                <th class="px-4 py-2">Contact</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Phone</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($merchants as $m)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $m->id }}</td>
                    <td class="px-4 py-2">{{ $m->business_name }}</td>
                    <td class="px-4 py-2">{{ $m->contact_name }}</td>
                    <td class="px-4 py-2">{{ $m->email }}</td>
                    <td class="px-4 py-2">{{ $m->phone }}</td>
                    <td class="px-4 py-2">
                        <span class="px-3 py-1 rounded text-white 
                            {{ $m->status == 'approved' ? 'bg-green-500' : 
                               ($m->status == 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                            {{ ucfirst($m->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <a href="#" class="text-blue-500 hover:underline">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">No merchants found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $merchants->links() }}
    </div>
</div>
@endsection
