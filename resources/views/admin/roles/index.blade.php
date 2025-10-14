@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Roles & Permissions</h2>

    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('roles.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Role</a>

    <table class="min-w-full bg-gray-800 text-white mt-4 rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Role Name</th>
                <th class="px-4 py-2 text-left">Description</th>
                <th class="px-4 py-2 text-left">Permissions</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr class="border-t border-gray-700">
                    <td class="px-4 py-2">{{ $role->name }}</td>
                    <td class="px-4 py-2">{{ $role->description }}</td>
                    <td class="px-4 py-2">
                        @foreach($role->permissions as $perm)
                            <span class="bg-gray-700 px-2 py-1 rounded text-sm">{{ $perm->name }}</span>
                        @endforeach
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('roles.edit', $role->id) }}" class="text-yellow-400 hover:underline">Edit</a> |
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline" onclick="return confirm('Delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
