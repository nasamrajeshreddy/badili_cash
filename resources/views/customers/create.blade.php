@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-full max-w-lg border-t-4 border-green-500">
        <h2 class="text-2xl font-bold text-center text-green-600 mb-6">Add Customer</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-400 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customers.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" required placeholder="Customer Name"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" placeholder="customer@email.com"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Phone</label>
                <input type="text" name="phone" placeholder="9876543210"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">City</label>
                <input type="text" name="city" placeholder="Hyderabad"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Country</label>
                <input type="text" name="country" value="India"
                       class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Address</label>
                <textarea name="address" rows="3" placeholder="Full Address"
                          class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-green-500 resize-none"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg transition-colors">
                Save Customer
            </button>
        </form>
    </div>
</div>
@endsection
