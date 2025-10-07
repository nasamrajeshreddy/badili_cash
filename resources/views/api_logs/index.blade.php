@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-700">API Logs</h2>
            <a href="{{ route('api_logs.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Add Log</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">Log ID</th>
                    <th class="px-4 py-2 text-left">Merchant</th>
                    <th class="px-4 py-2 text-left">Endpoint</th>
                    <th class="px-4 py-2 text-left">Method</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $log->log_id }}</td>
                        <td class="px-4 py-2">{{ $log->merchant->name ?? 'System' }}</td>
                        <td class="px-4 py-2">{{ $log->endpoint }}</td>
                        <td class="px-4 py-2">{{ $log->method }}</td>
                        <td class="px-4 py-2">{{ $log->status_code ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $log->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('api_logs.show', $log->id) }}" class="text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-4 text-gray-500">No logs found</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">{{ $logs->links() }}</div>
    </div>
</div>
@endsection
