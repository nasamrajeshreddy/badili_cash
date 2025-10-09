@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">SDKs & Plugins</h1>

    <ul class="space-y-3">
        @foreach($sdks as $sdk)
            <li class="bg-gray-800 p-4 rounded flex justify-between items-center">
                <span>{{ $sdk['name'] }}</span>
                <a href="{{ $sdk['download'] }}" 
                   class="bg-yellow-500 px-3 py-1 rounded hover:bg-yellow-600">
                   Download
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
