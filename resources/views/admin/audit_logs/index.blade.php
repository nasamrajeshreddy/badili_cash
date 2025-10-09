@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Audit / Activity Logs</h1>

    <table class="w-full bg-gray-800 text-gray-200 rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-700">
                <th class="p-3">ID</th>
                <th class="p-3">User</th>
                <th class="p-3">Module</th>
                <th class="p-3">Action</th>
                <th class="p-3">IP</th>
                <th class="p-3">Date</th>
                <th class="p-3">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
            <tr class="border-b border-gray-700">
                <td class="p-3">{{ $log->id }}</td>
                <td class="p-3">{{ $log->user ? $log->user->name : 'System' }}</td>
                <td class="p-3">{{ $log->module }}</td>
                <td class="p-3">{{ $log->action }}</td>
                <td class="p-3">{{ $log->ip_address }}</td>
                <td class="p-3">{{ $log->created_at->format('d M Y, h:i A') }}</td>
                <td class="p-3">
                    <a href="{{ route('audit_logs.show', $log->id) }}" class="text-yellow-400 hover:underline">Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $logs->links() }}</div>
</div>
@endsection
