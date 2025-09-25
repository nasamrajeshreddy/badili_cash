@extends('layouts.app')

@section('title', 'Add Transaction')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Add Transaction</li>
@endsection

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Add Transaction</h2>
    <form method="POST" action="{{ route('transactions.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">User</label>
            <input type="text" name="user" class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Amount</label>
            <input type="number" name="amount" class="w-full border px-3 py-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Type</label>
            <select name="type" class="w-full border px-3 py-2 rounded">
                <option value="credit">Credit</option>
                <option value="debit">Debit</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Add Transaction</button>
    </form>
</div>
@endsection
