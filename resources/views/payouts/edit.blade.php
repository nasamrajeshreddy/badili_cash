@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Update Payout Status</h2>

    <form method="POST" action="{{ route('payouts.updateStatus', $payout) }}" class="space-y-4">
        @csrf

        <div>
            <label class="block">Bank Account</label>
            <input type="text" value="{{ $payout->bank_account }}" class="w-full border px-3 py-2 bg-gray-100" disabled>
        </div>

        <div>
            <label class="block">Amount</label>
            <input type="text" value="₹{{ $payout->amount }}" class="w-full border px-3 py-2 bg-gray-100" disabled>
        </div>

        <div>
            <label class="block">Status</label>
            <select name="status" class="w-full border px-3 py-2">
                <option value="pending" {{ $payout->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $payout->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $payout->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="failed" {{ $payout->status == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
