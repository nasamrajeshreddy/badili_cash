@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">API Keys Management</h2>
    <a href="{{ route('api_keys.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Generate New Key</a>

    <table class="w-full mt-6 border-collapse">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2">Merchant</th>
                <th class="p-2">App ID</th>
                <th class="p-2">Secret Key</th>
                <th class="p-2">Status</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apiKeys as $key)
            <tr class="border-b">
                <td class="p-2">{{ $key->merchant->name }}</td>
                <td class="p-2">{{ $key->app_id }}</td>
                <td class="p-2">{{ $key->secret_key }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 rounded text-white {{ $key->status ? 'bg-green-600' : 'bg-red-600' }}">
                        {{ $key->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="p-2">
                    <a href="{{ route('api_keys.toggle', $key->id) }}" class="text-blue-600 hover:underline">
                        Toggle
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $apiKeys->links() }}
</div>
@endsection
