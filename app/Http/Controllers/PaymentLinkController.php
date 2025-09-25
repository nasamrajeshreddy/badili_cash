<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentLink;

class PaymentLinkController extends Controller
{
    public function index()
    {
        $paymentLinks = PaymentLink::latest()->get();
        return view('payment_links.index', compact('paymentLinks'));
    }

    public function create()
    {
        return view('payment_links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'description' => 'nullable|string'
        ]);

        PaymentLink::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'currency' => 'INR',
            'description' => $request->description,
            'status' => 'active'
        ]);

        return redirect()->route('payment_links.create')->with('success', 'Payment link created successfully!');
    }
}
