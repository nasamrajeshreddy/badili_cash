@extends('layouts.app')

@section('title', 'All Payment Links')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>All Payment Links</li>
@endsection

@section('content')
<div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-2xl p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-[#000080]">All Payment Links</h2>
            <a href="{{ route('payment_links.create') }}" 
               class="bg-[#000080] text-white px-5 py-2 rounded hover:bg-[#001f4d] transition font-semibold">
                Create New Payment Link
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-[#000080] text-white">
                        <th class="px-4 py-2 text-left cursor-pointer" onclick="sortTable()">
                            ID
                            <svg id="sortIcon" xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                            </svg>
                        </th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Phone</th>
                        <th class="px-4 py-2 text-left">Amount</th>
                        <th class="px-4 py-2 text-left">Currency</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Created At</th>
                        <th class="px-4 py-2 text-left">Payment Link</th>
                    </tr>
                </thead>
                <tbody id="paymentTableBody">
                    @forelse($paymentLinks as $link)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium">{{ $link->id }}</td>
                        <td class="px-4 py-2">{{ $link->name }}</td>
                        <td class="px-4 py-2">{{ $link->phone }}</td>
                        <td class="px-4 py-2 font-semibold">₹{{ number_format($link->amount, 2) }}</td>
                        <td class="px-4 py-2">{{ $link->currency }}</td>
                        <td class="px-4 py-2">
                            <span class="px-3 py-1 text-sm rounded-full 
                                {{ $link->status == 'active' ? 'bg-green-600 text-white font-semibold text-base' : 'bg-red-600 text-white font-semibold text-base' }}">
                                {{ ucfirst($link->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $link->created_at->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ $link->link }}" target="_blank" class="text-[#000080] underline hover:text-[#001f4d]">
                                Open
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-4 py-4 text-center text-gray-500" colspan="8">No payment links found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Simple JS sort for ID column
let ascending = true;
function sortTable() {
    const table = document.getElementById("paymentTableBody");
    let rows = Array.from(table.rows);
    rows.sort((a, b) => {
        const idA = parseInt(a.cells[0].innerText);
        const idB = parseInt(b.cells[0].innerText);
        return ascending ? idA - idB : idB - idA;
    });
    ascending = !ascending;

    // Update icon
    const icon = document.getElementById("sortIcon");
    if (ascending) {
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />';
    } else {
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />';
    }

    // Append sorted rows
    rows.forEach(r => table.appendChild(r));
}
</script>
@endsection
