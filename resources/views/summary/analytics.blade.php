@extends('layouts.app')

@section('title', 'Add Settlement')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Summary</li>
<li class="mx-2">/</li>
<li>analytics</li>
@endsection

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Tabs -->
    <div class="flex border-b border-gray-300 mb-6">
        <button id="tab1-btn" class="tab-btn px-6 py-2 focus:outline-none border-b-2 border-transparent hover:border-blue-500 font-semibold">Business Trend</button>
        <button id="tab2-btn" class="tab-btn px-6 py-2 focus:outline-none border-b-2 border-transparent hover:border-blue-500 font-semibold">Conversion Rate</button>
        <button id="tab3-btn" class="tab-btn px-6 py-2 focus:outline-none border-b-2 border-transparent hover:border-blue-500 font-semibold">Payment Failure</button>
    </div>

    <!-- Tab Content -->
    <div id="tab-content">
        <!-- Business Trend -->
        <div id="tab1" class="tab-content">
            <div class="flex justify-between mb-4">
                <div class="w-2/3 bg-white p-6 rounded shadow border-b-4" style="border-color:#001f3f;">
                    <div class="mb-4">
                        <label class="font-semibold">Select Date:</label>
                        <select class="border rounded p-2 ml-2">
                            <option>Today</option>
                            <option>Yesterday</option>
                            <option>Custom</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 gap-4 mb-6">
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Success Rate</p>
                            <p class="text-xl text-green-600">75%</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Number of Transactions</p>
                            <p class="text-xl text-blue-600">1200</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Volume</p>
                            <p class="text-xl text-purple-600">$50000</p>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded shadow border-b-4" style="border-color:#001f3f;">
                        <p class="font-semibold mb-2">Graph</p>
                        <canvas id="businessTrendChart"></canvas>
                    </div>
                </div>

                <div class="w-1/3 ml-6 bg-white p-6 rounded shadow border-b-4" style="border-color:#001f3f;">
                    <h3 class="font-semibold text-lg mb-4">Insights</h3>
                    <ul class="space-y-2">
                        <li>Total Success GMV: <span class="font-semibold">$45000</span></li>
                        <li>Highest Payment Method GMV: <span class="font-semibold">$20000</span></li>
                        <li>Lowest Payment Method GMV: <span class="font-semibold">$5000</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Conversion Rate -->
        <div id="tab2" class="tab-content hidden">
            <div class="flex justify-between mb-4">
                <div class="w-2/3 bg-white p-6 rounded shadow border-b-4" style="border-color:#001f3f;">
                    <div class="mb-4">
                        <label class="font-semibold">Select Date:</label>
                        <select class="border rounded p-2 ml-2">
                            <option>Today</option>
                            <option>Yesterday</option>
                            <option>Custom</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 gap-4 mb-6">
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Conversion Rate</p>
                            <p class="text-xl text-green-600">65%</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Total Visitors</p>
                            <p class="text-xl text-blue-600">5000</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Converted Users</p>
                            <p class="text-xl text-purple-600">3250</p>
                        </div>
                    </div>

                    <!-- ✅ Fixed wrong chart ID -->
                    <div class="p-4 bg-white rounded shadow border-b-4" style="border-color:#001f3f;">
                        <canvas id="conversionRateChart" class="h-72 w-full"></canvas>
                    </div>
                </div>

                <div class="w-1/3 ml-6 bg-white p-6 rounded shadow border-b-4" style="border-color:#001f3f;">
                    <h3 class="font-semibold text-lg mb-4">Insights</h3>
                    <ul class="space-y-2">
                        <li>Highest Conversion Channel: <span class="font-semibold">Email</span></li>
                        <li>Lowest Conversion Channel: <span class="font-semibold">Ads</span></li>
                        <li>Average Conversion Rate: <span class="font-semibold">62%</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Payment Failure -->
        <div id="tab3" class="tab-content hidden">
            <div class="flex justify-between mb-4">
                <div class="w-2/3 bg-white p-6 rounded shadow border-b-4" style="border-color:#001f3f;">
                    <div class="mb-4">
                        <label class="font-semibold">Select Date:</label>
                        <select class="border rounded p-2 ml-2">
                            <option>Today</option>
                            <option>Yesterday</option>
                            <option>Custom</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 gap-4 mb-6">
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Failure Rate</p>
                            <p class="text-xl text-red-600">8%</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Failed Transactions</p>
                            <p class="text-xl text-blue-600">100</p>
                        </div>
                        <div class="p-4 bg-gray-50 rounded shadow border-b-4" style="border-color:#001f3f;">
                            <p class="font-semibold">Failure Volume</p>
                            <p class="text-xl text-purple-600">$8000</p>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded shadow border-b-4" style="border-color:#001f3f;">
                        <p class="font-semibold mb-2">Graph</p>
                        <canvas id="paymentFailureChart"></canvas>
                    </div>
                </div>

                <div class="w-1/3 ml-6 bg-white p-6 rounded shadow border-b-4" style="border-color:#001f3f;">
                    <h3 class="font-semibold text-lg mb-4">Insights</h3>
                    <ul class="space-y-2">
                        <li>Highest Failure Payment Method: <span class="font-semibold">Wallet</span></li>
                        <li>Lowest Failure Payment Method: <span class="font-semibold">UPI</span></li>
                        <li>Total Failed GMV: <span class="font-semibold">$8000</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- ✅ Correct Chart.js version -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ DOM loaded, initializing charts...");

    if (typeof Chart === 'undefined') {
        console.error("❌ Chart.js failed to load!");
        return;
    }

    // Tabs switching
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            contents.forEach(c => c.classList.add('hidden'));
            contents[index].classList.remove('hidden');
            tabs.forEach(t => t.classList.remove('border-blue-500'));
            tab.classList.add('border-blue-500');
        });
    });

    console.log("✅ Rendering charts...");

    // --- Business Trend Chart ---
    const btCtx = document.getElementById('businessTrendChart');
    if (btCtx) {
        new Chart(btCtx, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun'],
                datasets:[{
                    label:'Transactions',
                    data:[120,190,300,500,200,300],
                    backgroundColor:'rgba(59,130,246,0.2)',
                    borderColor:'rgba(59,130,246,1)',
                    borderWidth:2,
                    fill:true
                }]
            }
        });
    } else console.error("❌ businessTrendChart not found");

    // --- Conversion Rate Chart ---
    const crCtx = document.getElementById('conversionRateChart');
    if (crCtx) {
        new Chart(crCtx, {
            type:'bar',
            data:{
                labels:['Email','Ads','Social','Referral'],
                datasets:[{
                    label:'Conversion %',
                    data:[70,50,65,60],
                    backgroundColor:'rgba(16,185,129,0.5)',
                    borderColor:'rgba(16,185,129,1)',
                    borderWidth:1
                }]
            }
        });
    } else console.error("❌ conversionRateChart not found");

    // --- Payment Failure Chart ---
    const pfCtx = document.getElementById('paymentFailureChart');
    if (pfCtx) {
        new Chart(pfCtx, {
            type:'pie',
            data:{
                labels:['Wallet','UPI','Card'],
                datasets:[{
                    label:'Failure Rate',
                    data:[50,20,30],
                    backgroundColor:['rgba(239,68,68,0.5)','rgba(59,130,246,0.5)','rgba(168,85,247,0.5)'],
                    borderColor:['rgba(239,68,68,1)','rgba(59,130,246,1)','rgba(168,85,247,1)'],
                    borderWidth:1
                }]
            }
        });
    } else console.error("❌ paymentFailureChart not found");
});
</script>
@endsection
