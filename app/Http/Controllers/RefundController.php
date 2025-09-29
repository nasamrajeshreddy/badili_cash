<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refund;
use App\Models\Transaction;
use Illuminate\Support\Str;

class RefundController extends Controller
{
    // List refunds
    public function index()
    {
        $refunds = Refund::orderBy('created_at', 'desc')->get();
        return view('refunds.index', compact('refunds'));
    }

    // Show create form (passes $transactions and a generated $refundId)
    public function create()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->get();

        // Generate a unique refund id to show in form
        do {
            $refundId = 'RFD-' . strtoupper(Str::random(8));
        } while (Refund::where('refund_id', $refundId)->exists());

        return view('refunds.create', compact('transactions', 'refundId'));
    }

    // Store refund
    public function store(Request $request)
    {
        $request->validate([
            'refund_id' => 'required|string|unique:refunds,refund_id',
            'payment_id' => 'required|string|max:255',
            'transaction_id' => 'required|exists:transactions,id',
            'amount' => 'required|numeric|min:0.01',
            'currency' => 'required|string|max:10',
            'reason' => 'nullable|string|max:1000',
            'status' => 'required|in:initiated,processed,failed',
        ]);

        $refund = Refund::create([
            'refund_id'     => $request->refund_id,
            'payment_id'    => $request->payment_id,
            'transaction_id'=> $request->transaction_id,
            'amount'        => $request->amount,
            'currency'      => $request->currency,
            'reason'        => $request->reason,
            'status'        => $request->status,
        ]);

        return redirect()->route('refunds.index')->with('success', 'Refund created successfully.');
    }

    // Update status (from dropdown)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:initiated,processed,failed',
        ]);

        $refund = Refund::findOrFail($id);
        $refund->status = $request->status;
        $refund->save();

        return back()->with('success', 'Refund status updated.');
    }
}
