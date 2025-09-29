<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentLink;
use Illuminate\Support\Str;

class PaymentLinkController extends Controller
{
    // List all payment links
    public function index()
    {
        $paymentLinks = PaymentLink::latest()->get();
        return view('payment_links.index', compact('paymentLinks'));
    }

    // Show form to create payment link
    public function create()
    {
        return view('payment_links.create');
    }

    // Store a new payment link
    public function store(Request $request)
    {
        // Validate new fields
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'amount'   => 'required|numeric|min:1',
            'currency' => 'required|string|in:INR,USD,EUR,GBP' // include all available currencies
        ]);

        // Generate unique UUID for the payment link
        $uuid = Str::uuid();
        $paymentLinkUrl = url("/pay/{$uuid}");

        // Store payment link in DB
        $payment = PaymentLink::create([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'amount'   => $request->amount,
            'currency' => $request->currency,
            'status'   => 'active',
            'link'     => $paymentLinkUrl, // make sure "link" column exists in table
        ]);

        return redirect()->route('payment_links.index')
            ->with('success', "Payment link created successfully! URL: {$payment->link}");
    }

    // Show payment page for a specific link
    public function show($uuid)
    {
        $payment = PaymentLink::where('link', url("/pay/{$uuid}"))->firstOrFail();
        return view('payment_links.show', compact('payment'));
    }
}
