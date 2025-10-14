@extends('layouts.app')

@section('title', 'Overview')

@section('breadcrumb')
<li class="mx-2 text-gray-400">/ Summary / Overview</li>
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-[#0b1120] via-[#101632] to-[#1a1f3c] text-gray-100 overflow-x-hidden p-8 space-y-10">

    {{-- Top Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Recent Settlements --}}
        <div class="relative bg-[#141b2e]/80 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-[#1f2a48]
                    hover:shadow-[0_0_25px_rgba(59,130,246,0.3)] hover:scale-[1.02] transition-all duration-300">
            <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-b-2xl"></div>
            <h3 class="text-lg font-semibold text-purple-300 mb-2">Recent Settlements</h3>
            <div class="text-4xl font-extrabold text-blue-300 truncate">₹1,07,12,34,567</div>
            <p class="text-sm text-gray-400 mt-1">Settled on 27 Jul 2024</p>
            <div class="mt-4 border-t border-gray-700 pt-3 space-y-2">
                <p class="flex justify-between text-sm">
                    <span>Total Amount:</span>
                    <span class="font-semibold text-green-400">₹99,11,15,000.00</span>
                </p>
                <p class="flex justify-between text-sm">
                    <span>Settlements Count:</span>
                    <span class="font-semibold text-blue-300">12</span>
                </p>
            </div>
        </div>

        {{-- Open Disputes --}}
        <div class="relative bg-[#141b2e]/80 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-[#1f2a48]
                    hover:shadow-[0_0_25px_rgba(59,130,246,0.3)] hover:scale-[1.02] transition-all duration-300">
            <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-b-2xl"></div>
            <h3 class="text-lg font-semibold text-purple-300 mb-2">Open Disputes</h3>
            <div class="flex flex-wrap justify-between gap-4">
                <div>
                    <p class="text-red-400 font-semibold text-lg">Action Required</p>
                    <p class="text-sm text-gray-400">₹0.00</p>
                </div>
                <div>
                    <p class="text-yellow-400 font-semibold text-lg">Under Review</p>
                    <p class="text-sm text-gray-400">₹0.00</p>
                </div>
            </div>
            <div class="mt-4 border-t border-gray-700 pt-3">
                <p class="flex justify-between text-sm">
                    <span>Total Disputes:</span>
                    <span class="font-semibold text-blue-300">0</span>
                </p>
            </div>
        </div>
    </div>

    {{-- Transactions Overview --}}
    <div class="relative bg-[#141b2e]/80 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-[#1f2a48]">
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-b-2xl"></div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
            <h2 class="text-xl font-semibold text-purple-300">Transactions Overview</h2>
            <select id="timeRange" class="bg-[#0b1120] border border-gray-600 text-sm rounded-lg p-2 text-gray-300 focus:ring-green-400 focus:border-green-400">
                <option>Last 7 Days</option>
                <option>Last 1 Month</option>
                <option>Last 3 Months</option>
                <option>Custom Range</option>
            </select>
        </div>
        <div class="w-full h-[350px]">
            <canvas id="transactionsChart"></canvas>
        </div>
    </div>

    {{-- Refunds Overview --}}
    <div class="relative bg-[#141b2e]/80 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-[#1f2a48]">
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-b-2xl"></div>
        <h2 class="text-xl font-semibold text-purple-300 mb-4">Refunds Overview</h2>
        <div class="w-full h-[350px]">
            <canvas id="refundsChart"></canvas>
        </div>
    </div>

    {{-- Average Transaction Value --}}
    <div class="relative bg-[#141b2e]/80 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-[#1f2a48]">
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-b-2xl"></div>
        <h2 class="text-xl font-semibold text-purple-300 mb-4">Average Transaction Value</h2>
        <div class="w-full h-[350px]">
            <canvas id="avgTransactionChart"></canvas>
        </div>
    </div>

    {{-- Preferred Payment Methods --}}
    <div class="relative bg-[#141b2e]/80 backdrop-blur-md rounded-2xl p-6 shadow-2xl border border-[#1f2a48] mb-8">
        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-b-2xl"></div>
        <h2 class="text-xl font-semibold text-purple-300 mb-4">Preferred Payment Methods</h2>
        <div class="flex justify-center items-center h-40 text-gray-500 italic">
            No data to show
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#cbd5e1' }, position: 'bottom' } },
        scales: { x: { ticks: { color: '#94a3b8' } }, y: { ticks: { color: '#94a3b8' } } }
    };

    new Chart(document.getElementById('transactionsChart'), {
        type: 'pie',
        data: {
            labels: ['Success','Failure','Pending','Processing'],
            datasets: [{
                data: [1200,150,50,100],
                backgroundColor: ['#22c55e','#ef4444','#fbbf24','#3b82f6']
            }]
        },
        options: commonOptions
    });

    new Chart(document.getElementById('refundsChart'), {
        type: 'bar',
        data: {
            labels: ['Refund 1','Refund 2','Refund 3','Refund 4'],
            datasets: [{
                label: 'Amount',
                data: [500,200,800,400],
                backgroundColor: 'rgba(59,130,246,0.7)',
                borderColor: '#3b82f6',
                borderWidth: 1
            }]
        },
        options: commonOptions
    });

    new Chart(document.getElementById('avgTransactionChart'), {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{
                label: 'Avg Transaction',
                data: [1200,1500,1700,1600,1800,1900],
                backgroundColor: 'rgba(168,85,247,0.2)',
                borderColor: '#a855f7',
                borderWidth: 2,
                tension: 0.4,
                fill: true
            }]
        },
        options: commonOptions
    });
});
</script>
@endsection
