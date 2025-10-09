@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">API Documentation</h1>
    <ul class="space-y-2">
        @foreach($endpoints as $key => $endpoint)
            <li>
                <a href="{{ route('api_docs.show', $key) }}" 
                   class="text-yellow-400 hover:underline">
                   {{ $endpoint['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
