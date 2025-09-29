@extends('layouts.app')

@section('title', 'BadiliCash Payment Gateway')

@section('breadcrumb')
<li class="mx-2">/</li>
<li>Add Payment Link</li>
<li class="mx-2">/</li>
<li>Checkout</li>
@endsection

@section('content')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@php
    // $payment is passed from controller
@endphp

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 via-gray-200 to-gray-300 p-6">
    <div class="w-full max-w-2xl">
        <div class="rounded-2xl shadow-2xl overflow-hidden bg-white/80 backdrop-blur-md border border-gray-200 flex">

            <!-- Left Section -->
            <div class="w-2/5 p-6 flex flex-col justify-between text-white bg-gradient-to-b from-[#000080] to-[#003164]">
                <div>
                    <!-- Logo -->
                    <img src="{{ asset('images/Badililogo.png') }}" alt="BadiliCash Logo"
                         class="h-12 w-auto mb-8">

                    <!-- Amount -->
                    <p class="text-sm text-white/70">Total Payable</p>
                    <div class="text-4xl font-extrabold tracking-wide mt-1">
                        ₹{{ number_format($payment->amount, 2) }}
                    </div>
                    <span class="text-xs text-white/60">{{ $payment->currency }}</span>
                </div>

                <!-- Footer -->
                <div class="mt-10 text-xs text-white/70">
                    <div class="flex items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                  d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                  clip-rule="evenodd" />
                        </svg>
                        Secure Payment
                    </div>
                    <p>Powered by BadiliCash</p>
                </div>
            </div>

            <!-- Right Section -->
            <div class="w-3/5 p-8 flex flex-col justify-between">
                <div>
                    <!-- Order details -->
                    <div class="mb-6 border-b pb-4 border-[#000080]">
                        <h2 class="text-sm font-semibold text-gray-700 mb-3 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                            Order Details
                        </h2>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Name</span>
                                <span class="text-gray-800 font-medium">{{ $payment->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Phone</span>
                                <span class="text-gray-800 font-medium">{{ $payment->phone }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Amount</span>
                                <span class="text-gray-800 font-medium">₹{{ number_format($payment->amount, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Phone input -->
                   <!--  <div class="mt-6">
                       <label for="phone" class="flex items-center text-sm font-medium text-gray-700 mb-2 space-x-1">
                            <i class="fas fa-phone text-gray-500 w-4 h-4"></i>
                            <span>Enter Phone Number</span>
                        </label>
                        <div class="flex">
                            <div class="flex items-center bg-gray-100 border border-gray-300 rounded-l-md px-3 text-sm text-gray-700">+91</div>
                            <input type="tel" id="phone" name="phone" value="{{ $payment->phone }}"
                                   class="flex-1 border border-l-0 border-gray-300 rounded-r-md px-3 py-2 text-sm focus:ring-2 focus:ring-[#003164] focus:border-[#003164] focus:outline-none transition"
                                   placeholder="e.g.,8889768918">
                        </div>
                    </div>-->

                    <!-- Buttons -->
                    <div class="mt-8">
                        <form action="" method="POST">
                            @csrf
                            <button type="submit"
                                    class="w-full px-5 py-3 rounded-lg text-sm font-semibold text-white
                                           bg-gradient-to-r from-[#003164] to-[#000080]
                                           hover:from-[#001f4d] hover:to-[#000033]
                                           transition-all duration-300 ease-in-out
                                           shadow-md shadow-[#003164]/30
                                           focus:outline-none focus:ring-4 focus:ring-[#003164]/50">
                                Proceed to Payment
                            </button>
                        </form>

                        <a href="{{ route('payment_links.index') }}"
                           onclick="return confirm('Are you sure you want to cancel this payment?');"
                           class="mt-4 w-full text-center inline-block text-xs font-medium text-gray-500 hover:text-gray-700 transition">
                            Cancel Payment
                        </a>
                    </div>

                    <!-- Copy Payment Link -->
                    <div class="mt-6 flex items-center space-x-2">
                        <span id="paymentLink" 
                              class="text-gray-700 underline cursor-pointer">
                            {{ $payment->link }}
                        </span>
                        <button onclick="copyPaymentLink()" 
                                class="text-gray-400 hover:text-blue-600 transition" 
                                title="Copy Payment Link">
                            <i class="fas fa-copy text-lg"></i>
                        </button>
                    </div>
                    <div id="copiedMsg" class="text-green-400 text-sm mt-2 hidden">
                        ✅ Copied!
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function copyPaymentLink() {
    const linkEl = document.getElementById("paymentLink");
    const copiedMsg = document.getElementById("copiedMsg");
    const linkText = linkEl.innerText;

    navigator.clipboard.writeText(linkText);

    linkEl.classList.remove("text-gray-700");
    linkEl.classList.add("text-blue-600");

    copiedMsg.classList.remove("hidden");

    setTimeout(() => {
        copiedMsg.classList.add("hidden");
        linkEl.classList.remove("text-blue-600");
        linkEl.classList.add("text-gray-700");
    }, 5000);
}
</script>

@endsection
