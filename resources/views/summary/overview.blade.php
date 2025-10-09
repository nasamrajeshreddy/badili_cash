@extends('layouts.app')

@section('title', 'Overview')

@section('breadcrumb')
<li class="mx-2">/Summary/Overview</li>

@endsection

@section('content')
<div class="p-6 bg-gray-50 min-h-screen space-y-10">

    {{-- Top Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Recent Settlements --}}
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition transform hover:-translate-y-1 relative mt-4">
            <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-b-2xl"></div>
            <h3 class="text-gray-700 font-semibold mb-2">Recent Settlements</h3>
            <div class="text-3xl font-bold text-blue-800 truncate max-w-full break-words">₹1,07,12,34,567</div>
            <p class="text-sm text-gray-500">Settled on 27 Jul 2024</p>
            <div class="mt-4 border-t pt-3 space-y-1">
                <p class="text-sm text-gray-600 flex justify-between">
                    <span>Total Amount:</span>
                    <span class="font-semibold text-green-600 truncate max-w-[50%] break-words">₹99,11,15,000.00</span>
                </p>
                <p class="text-sm text-gray-600 flex justify-between">
                    <span>Settlements Count:</span>
                    <span class="font-semibold text-green-600">12</span>
                </p>
            </div>
        </div>

        {{-- Open Disputes --}}
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition transform hover:-translate-y-1 relative mt-4">
            <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-b-2xl"></div>
            <h3 class="text-gray-700 font-semibold mb-2">Open Disputes</h3>
            <div class="flex flex-wrap justify-between gap-4">
                <div class="min-w-[120px]">
                    <p class="text-red-600 font-semibold text-lg truncate">Action Required</p>
                    <p class="text-sm text-gray-500 truncate">₹0.00</p>
                </div>
                <div class="min-w-[120px]">
                    <p class="text-yellow-600 font-semibold text-lg truncate">Under Review</p>
                    <p class="text-sm text-gray-500 truncate">₹0.00</p>
                </div>
            </div>
            <div class="mt-4 border-t pt-3">
                <p class="text-sm text-gray-600 flex justify-between">
                    <span>Total Disputes:</span>
                    <span class="font-semibold text-blue-700">0</span>
                </p>
            </div>
        </div>
    </div>

    {{-- Transactions Overview (Pie Chart) --}}
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition transform hover:-translate-y-1 relative mt-4">
        <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-b-2xl"></div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
<h2 class="text-lg font-semibold text-gray-700 text-left "> Transactions Overview</h2>     
       <select id="timeRange" class="border-gray-300 rounded-lg text-sm p-2 focus:ring-green-500 focus:border-green-500">
                <option>Last 7 Days</option>
                <option>Last 1 Month</option>
                <option>Last 3 Months</option>
                <option>Custom Range</option>
            </select>
        </div>
        <div class="w-full" style="height: 300px; max-height: 400px;">
            <canvas id="transactionsChart"></canvas>
        </div>
    </div>

    {{-- Refunds Overview (Bar Chart) --}}
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition transform hover:-translate-y-1 relative mt-4">
        <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-b-2xl"></div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Refunds Overview</h2>
        <div class="w-full" style="height: 300px; max-height: 400px;">
            <canvas id="refundsChart"></canvas>
        </div>
    </div>

    {{-- Average Transaction Value (Line Chart) --}}
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition transform hover:-translate-y-1 relative mt-4">
        <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-b-2xl"></div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Average Transaction Value</h2>
        <div class="w-full" style="height: 300px; max-height: 400px;">
            <canvas id="avgTransactionChart"></canvas>
        </div>
    </div>

    {{-- Preferred Payment Methods --}}
    <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition transform hover:-translate-y-1 relative mb-8 mt-4">
        <div class="absolute bottom-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-b-2xl"></div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Preferred Payment Methods</h2>
        <div class="flex justify-center items-center h-40 text-gray-400 italic">
            No data to show
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // --- Transactions Pie Chart ---
    new Chart(document.getElementById('transactionsChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Success','Failure','Pending','Processing'],
            datasets:[{
                data: [1200,150,50,100],
                backgroundColor:['#22c55e','#ef4444','#fbbf24','#3b82f6'],
                borderColor:['#166534','#b91c1c','#f59e0b','#1e40af'],
                borderWidth: 1
            }]
        },
        options: {
            responsive:true,
            maintainAspectRatio:false,
            plugins:{ legend:{ position:'bottom' } }
        }
    });

    // --- Refunds Bar Chart ---
    new Chart(document.getElementById('refundsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Refund 1','Refund 2','Refund 3','Refund 4'],
            datasets:[{
                label:'Amount',
                data:[500,200,800,400],
                backgroundColor:'#10b981',
                borderColor:'#047857',
                borderWidth:1
            }]
        },
        options: { responsive:true, maintainAspectRatio:false }
    });

    // --- Average Transaction Value Line Chart ---
    new Chart(document.getElementById('avgTransactionChart').getContext('2d'), {
        type: 'line',
        data: {
            labels:['Jan','Feb','Mar','Apr','May','Jun'],
            datasets:[{
                label:'Avg Transaction',
                data:[1200,1500,1700,1600,1800,1900],
                backgroundColor:'rgba(59,130,246,0.2)',
                borderColor:'#3b82f6',
                borderWidth:2,
                fill:true,
                tension:0.3
            }]
        },
        options: { responsive:true, maintainAspectRatio:false }
    });

});
</script>
@endsection
