<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Show all transactions
    public function index()
    {
        $transactions = Transaction::latest()->get(); // latest first
        return view('transactions.index', compact('transactions'));
    }

    // Show add transaction form
    public function create()
    {
        return view('transactions.create');
    }

    // Store transaction in DB
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'type' => 'required|in:credit,debit'
        ]);

        Transaction::create($request->all());

        // Redirect to All Transactions page after creation
        return redirect()->route('transactions.index')->with('success', 'Transaction completed successfully!');
    }
}
