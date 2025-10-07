@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-lg border-t-4 border-blue-500">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Edit Customer</h2>

        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" value="{{ $customer->name }}" required
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ $customer->email }}"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Phone</label>
                <input type="text" name="phone" value="{{ $customer->phone }}"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">City</label>
                <input type="text" name="city" value="{{ $customer->city }}"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Country</label>
                <input type="text" name="country" value="{{ $customer->country }}"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Address</label>
                <textarea name="address" rows="3"
                          class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 resize-none">{{ $customer->address }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status" class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="blocked" {{ $customer->status == 'blocked' ? 'selected' : '' }}>Blocked</option>
                </select>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg transition-colors">
                Update Customer
            </button>
        </form>
    </div>
</div>
@endsection
