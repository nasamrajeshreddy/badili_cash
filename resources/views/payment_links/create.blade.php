@extends('layouts.app')

@section('title', 'Add Payment Link')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Add Payment Link</li>
<li class="mx-2">/</li>
<li>Create Payment Link</li>
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 p-4">
    <div class="w-full max-w-md"> <!-- reduced width -->
        <div class="bg-white/90 backdrop-blur-md border border-gray-200 rounded-2xl shadow-2xl p-6"> <!-- reduced padding -->
            
            <!-- Back link -->
            <div class="mb-4">
                <a href="{{ route('payment_links.index') }}" 
                   class="inline-flex items-center text-sm text-[#003164] hover:text-[#000080] font-medium transition-colors">
                    <i class="fas fa-chevron-left mr-1"></i>
                    <span>Back</span>
                </a>
            </div>

            <h2 class="text-xl font-bold mb-4 text-gray-800">Create Payment Link</h2> <!-- slightly smaller title -->

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-3 py-2 mb-4 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('payment_links.store') }}" method="POST">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="block mb-1 font-medium text-gray-700 text-sm">Name</label>
                    <input type="text" name="name" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-[#003164] focus:border-[#003164] outline-none transition"
                           placeholder="Enter full name" required>
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="block mb-1 font-medium text-gray-700 text-sm">Phone Number</label>
                    <input type="tel" name="phone"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-[#003164] focus:border-[#003164] outline-none transition"
                           placeholder="e.g., 8889768918" required>
                </div>

                <!-- Amount -->
                <div class="mb-3">
                    <label class="block mb-1 font-medium text-gray-700 text-sm">Amount</label>
                    <input type="number" name="amount"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-[#003164] focus:border-[#003164] outline-none transition"
                           placeholder="Enter amount" required>
                </div>

                <!-- Currency -->
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-gray-700 text-sm">Currency</label>
                    <select name="currency"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 focus:ring-2 focus:ring-[#003164] focus:border-[#003164] outline-none transition"
                            required>
                        <option value="INR" selected>INR</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>
                </div>

                <!-- Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="px-5 py-2 rounded-xl text-white font-semibold bg-gradient-to-r from-[#003164] to-[#000080] hover:from-[#001f4d] hover:to-[#000033] transition-shadow shadow-md shadow-[#003164]/30 focus:outline-none focus:ring-4 focus:ring-[#003164]/50 text-sm">
                        Create Payment Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
