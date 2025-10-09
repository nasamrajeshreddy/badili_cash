@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Audit Log Details</h1>

    <div class="bg-gray-800 p-5 rounded">
        <p><strong>ID:</strong> {{ $log->id }}</p>
        <p><strong>User:</strong> {{ $log->user ? $log->user->name : 'System' }}</p>
        <p><strong>Module:</strong> {{ $log->module }}</p>
        <p><strong>Action:</strong> {{ $log->action }}</p>
        <p><strong>Description:</strong> {{ $log->description }}</p>
        <p><strong>IP Address:</strong> {{ $log->ip_address }}</p>
        <p><strong>User Agent:</strong> {{ $log->user_agent }}</p>
        <p><strong>Date:</strong> {{ $log->created_at->format('d M Y, h:i A') }}</p>
    </div>

    <a href="{{ route('audit_logs.index') }}" class="mt-4 inline-block text-yellow-400 hover:underline">← Back to Logs</a>
</div>
@endsection
