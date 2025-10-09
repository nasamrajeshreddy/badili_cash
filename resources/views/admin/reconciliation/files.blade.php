@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Uploaded Reconciliation Files</h2>

    @if(count($files) > 0)
    <table class="min-w-full bg-gray-800 text-white rounded">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">File Name</th>
                <th class="px-4 py-2 text-left">Uploaded At</th>
                <th class="px-4 py-2 text-left">Size</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $file)
            <tr class="border-t border-gray-700">
                <td class="px-4 py-2">{{ basename($file) }}</td>
                <td class="px-4 py-2">
                    {{ \Carbon\Carbon::createFromTimestamp(Storage::lastModified($file))->format('d M Y, H:i') }}
                </td>
                <td class="px-4 py-2">
                    {{ round(Storage::size($file)/1024,2) }} KB
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('reconciliation.download', basename($file)) }}" 
                       class="text-yellow-400 hover:underline" target="_blank">
                        View / Download
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="text-gray-400 mt-4">No uploaded files yet.</div>
    @endif
</div>
@endsection
