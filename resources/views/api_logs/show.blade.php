@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">API Log Details</h2>

        <div class="space-y-3">
            <p><strong>Log ID:</strong> {{ $log->log_id }}</p>
            <p><strong>Merchant:</strong> {{ $log->merchant->name ?? 'System' }}</p>
            <p><strong>Endpoint:</strong> {{ $log->endpoint }}</p>
            <p><strong>Method:</strong> {{ $log->method }}</p>
            <p><strong>Status Code:</strong> {{ $log->status_code }}</p>
            <p><strong>IP Address:</strong> {{ $log->ip_address }}</p>
            <p><strong>Request Payload:</strong></p>
            <pre class="bg-gray-100 p-3 rounded">{{ $log->request_payload }}</pre>
            <p><strong>Response Payload:</strong></p>
            <pre class="bg-gray-100 p-3 rounded">{{ $log->response_payload }}</pre>
        </div>
    </div>
</div>
@endsection



