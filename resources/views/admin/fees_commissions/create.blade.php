@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Add Fee / Commission</h2>

    @if($errors->any())
        <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fees_commissions.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="w-full px-3 py-2 text-black rounded" required>
        </div>
        <div class="mb-4">
            <label>Type</label>
            <select name="type" class="w-full px-3 py-2 text-black rounded" required>
                <option value="flat">Flat</option>
                <option value="percentage">Percentage</option>
            </select>
        </div>
        <div class="mb-4">
            <label>Value</label>
            <input type="number" step="0.01" name="value" class="w-full px-3 py-2 text-black rounded" required>
        </div>
        <div class="mb-4">
            <label>Applied On</label>
            <input type="text" name="applied_on" class="w-full px-3 py-2 text-black rounded" value="transaction" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
