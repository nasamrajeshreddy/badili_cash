@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Create New Role</h2>

    <form method="POST" action="{{ route('roles.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-300 mb-1">Role Name</label>
            <input type="text" name="name" class="w-full px-3 py-2 bg-gray-800 text-white rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 mb-1">Description</label>
            <input type="text" name="description" class="w-full px-3 py-2 bg-gray-800 text-white rounded">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 mb-2">Assign Permissions</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($permissions as $perm)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="{{ $perm->id }}">
                        <span>{{ $perm->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Role</button>
    </form>
</div>
@endsection
