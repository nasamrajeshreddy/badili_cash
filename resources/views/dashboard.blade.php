@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Dashboard</li>
@endsection

@section('content')
<div class="text-gray-700 text-lg mb-6">
    Welcome to BadiliCash! Use the sidebar to navigate.
</div>

<!-- ✅ Added a canvas for displaying chart -->
<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Transactions Overview</h2>
    <canvas id="transactionsChart" class="w-full h-64"></canvas>
</div>
@endsection

@section('scripts')
<!-- ✅ Chart.js initialization script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('transactionsChart');
    if (!ctx) {
        console.error('Canvas element not found!');
        return;
    }

    // ✅ Sample chart data (you can replace with dynamic data later)
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Transaction Volume',
                data: [12, 19, 3, 5, 2, 3, 10],
                backgroundColor: 'rgba(25, 135, 84, 0.6)', // green shade
                borderColor: 'rgba(25, 135, 84, 1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            },
            plugins: {
                legend: { labels: { color: '#333' } }
            }
        }
    });
});
</script>
@endsection
