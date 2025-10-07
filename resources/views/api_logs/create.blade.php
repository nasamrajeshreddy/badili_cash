@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8 border-t-4 border-blue-500">
        <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">Add API Log</h2>

        <form action="{{ route('api_logs.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">Merchant</label>
                <select name="merchant_id" class="w-full border rounded-lg px-4 py-2">
                    <option value="">Select Merchant</option>
                    @foreach($merchants as $merchant)
                        <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">API Endpoint</label>
                <input type="text" name="endpoint" class="w-full border rounded-lg px-4 py-2" placeholder="/api/payment/create" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Method</label>
                <select name="method" class="w-full border rounded-lg px-4 py-2" required>
                    <option>GET</option>
                    <option>POST</option>
                    <option>PUT</option>
                    <option>DELETE</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Request Payload</label>
                <textarea name="request_payload" class="w-full border rounded-lg px-4 py-2 h-24"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Response Payload</label>
                <textarea name="response_payload" class="w-full border rounded-lg px-4 py-2 h-24"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Status Code</label>
                <input type="number" name="status_code" class="w-full border rounded-lg px-4 py-2" placeholder="200">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold">
                Save Log
            </button>
        </form>
    </div>
</div>
@endsection



