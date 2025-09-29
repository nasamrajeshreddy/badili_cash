<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payout;
use App\Models\User;

class PayoutController extends Controller
{
    public function index()
    {
        $payouts = Payout::with('user')->latest()->get();
        return view('payouts.index', compact('payouts'));
    }

    public function create()
    {
        $users = User::all();
        return view('payouts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bank_account' => 'required|string|max:50',
            'ifsc' => 'required|string|max:20',
            'amount' => 'required|numeric|min:1',
        ]);

        Payout::create([
            'user_id' => $request->user_id,
            'bank_account' => $request->bank_account,
            'ifsc' => $request->ifsc,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return redirect()->route('payouts.index')->with('success', 'Payout created successfully!');
    }

    public function edit(Payout $payout)
    {
        return view('payouts.edit', compact('payout'));
    }

    public function updateStatus(Request $request, Payout $payout)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,failed',
        ]);

        $payout->update(['status' => $request->status]);

        
        return redirect()->route('payouts.index')->with('success', 'Payout status updated!');
    }
}

