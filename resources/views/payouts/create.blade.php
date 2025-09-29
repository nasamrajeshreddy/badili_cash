@extends('layouts.app')

@section('content')
@section('breadcrumb')
<li class="mx-2">/</li>
<li>Add Payout</li>
@endsection

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 border-t-4 border-blue-500">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">New Payout</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('payouts.store') }}" class="space-y-5">
            @csrf

            {{-- Select User --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Select User</label>
                <select name="user_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Choose User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Bank Account --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Bank Account</label>
                <input type="text" name="bank_account" placeholder="Enter Bank Account" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- IFSC --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">IFSC Code</label>
                <input type="text" name="ifsc" placeholder="Enter IFSC Code" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Amount --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Amount</label>
                <input type="number" step="0.01" name="amount" placeholder="Enter Amount" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg transition-colors duration-200">
                Create Payout
            </button>
        </form>
    </div>
</div>
@endsection
