@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Fee / Commission</h2>

    @if($errors->any())
        <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('fees_commissions.update', $feeCommission->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" class="w-full px-3 py-2 text-black rounded" value="{{ $feeCommission->name }}" required>
        </div>
        <div class="mb-4">
            <label>Type</label>
            <select name="type" class="w-full px-3 py-2 text-black rounded" required>
                <option value="flat" {{ $feeCommission->type=='flat'?'selected':'' }}>Flat</option>
                <option value="percentage" {{ $feeCommission->type=='percentage'?'selected':'' }}>Percentage</option>
            </select>
        </div>
        <div class="mb-4">
            <label>Value</label>
            <input type="number" step="0.01" name="value" class="w-full px-3 py-2 text-black rounded" value="{{ $feeCommission->value }}" required>
        </div>
        <div class="mb-4">
            <label>Applied On</label>
            <input type="text" name="applied_on" class="w-full px-3 py-2 text-black rounded" value="{{ $feeCommission->applied_on }}" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
