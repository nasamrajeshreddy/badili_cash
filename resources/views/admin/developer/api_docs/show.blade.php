@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ $doc['title'] }}</h1>

    <p><strong>Method:</strong> {{ $doc['method'] }}</p>
    <p><strong>URL:</strong> {{ $doc['url'] }}</p>

    <h2 class="mt-4 font-semibold">Headers</h2>
    <pre class="bg-gray-800 text-gray-200 p-3 rounded">
@foreach($doc['headers'] as $header)
{{ $header }}
@endforeach
    </pre>

    <h2 class="mt-4 font-semibold">Parameters</h2>
    <pre class="bg-gray-800 text-gray-200 p-3 rounded">
@foreach($doc['parameters'] as $param => $desc)
{{ $param }} : {{ $desc }}
@endforeach
    </pre>

    <h2 class="mt-4 font-semibold">Sample cURL</h2>
    <pre class="bg-gray-800 text-gray-200 p-3 rounded">
curl -X {{ $doc['method'] }} {{ url($doc['url']) }} \
@foreach($doc['headers'] as $header)
-H "{{ $header }}" \
@endforeach
-d '{"amount":100,"customer_name":"John Doe","customer_email":"john@example.com"}'
    </pre>

    <h2 class="mt-4 font-semibold">Sample PHP</h2>
    <pre class="bg-gray-800 text-gray-200 p-3 rounded">
&lt;?php
$data = [
    'amount' => 100,
    'customer_name' => 'John Doe',
    'customer_email' => 'john@example.com'
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '{{ url($doc['url']) }}');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
@foreach($doc['headers'] as $header)
    '{{ $header }}',
@endforeach
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
print_r($response);
    </pre>

    <h2 class="mt-4 font-semibold">Sample JS (Fetch)</h2>
    <pre class="bg-gray-800 text-gray-200 p-3 rounded">
fetch('{{ url($doc['url']) }}', {
    method: '{{ $doc['method'] }}',
    headers: {
@foreach($doc['headers'] as $header)
        '{{ explode(":", $header)[0] }}': '{{ trim(explode(":", $header)[1]) }}',
@endforeach
    },
    body: JSON.stringify({ amount:100, customer_name:"John Doe", customer_email:"john@example.com" })
})
.then(res => res.json())
.then(console.log);
    </pre>
</div>
@endsection
