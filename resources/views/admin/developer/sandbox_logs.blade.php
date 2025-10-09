@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Sandbox Logs</h1>

    <table class="w-full bg-gray-800 text-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-left">
            <tr>
                <th class="p-3">ID</th>
                <th class="p-3">Endpoint</th>
                <th class="p-3">Request Data</th>
                <th class="p-3">Response Data</th>
                <th class="p-3">Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                <tr class="border-b border-gray-700">
                    <td class="p-3">{{ $log->id }}</td>
                    <td class="p-3">{{ $log->endpoint }}</td>
                    <td class="p-3">{{ $log->request_data }}</td>
                    <td class="p-3">{{ $log->response_data }}</td>
                    <td class="p-3">{{ $log->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-3 text-center text-gray-400">No sandbox logs available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination if needed -->
    <div class="mt-4">
        {{ $logs->links() }}
    </div>
</div>
@endsection
