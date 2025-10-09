@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">System Health / Status Monitor</h1>

    <div id="system-health" class="space-y-4">
        <div class="text-gray-400">Loading system health...</div>
    </div>

    <button onclick="checkSystemHealth()" 
            class="mt-4 bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-2 rounded">
        Refresh Status
    </button>
</div>

<script>
    async function checkSystemHealth() {
        const container = document.getElementById('system-health');
        container.innerHTML = '<p class="text-gray-400">Checking system health...</p>';

        try {
            const response = await fetch("{{ route('system_health.check') }}");
            const data = await response.json();

            container.innerHTML = '';

            for (const key in data) {
                const status = data[key].status;
                const color = status === 'OK' ? 'text-green-400' : (status === 'WARN' ? 'text-yellow-400' : 'text-red-500');

                container.innerHTML += `
                    <div class="bg-gray-800 p-4 rounded">
                        <h2 class="text-lg font-semibold">${key.toUpperCase()}</h2>
                        <p class="${color}">${status}</p>
                        <p class="text-gray-400 text-sm">${data[key].message}</p>
                    </div>
                `;
            }
        } catch (err) {
            container.innerHTML = '<p class="text-red-500">Failed to fetch system status</p>';
        }
    }

    // Load on page load
    checkSystemHealth();
</script>
@endsection
