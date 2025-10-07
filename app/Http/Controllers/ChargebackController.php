<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chargeback;
use Illuminate\Support\Str;

class ChargebackController extends Controller
{
    public function index()
    {
        $chargebacks = Chargeback::latest()->get();
        return view('chargebacks.index', compact('chargebacks'));
    }

    public function create()
    {
        return view('chargebacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'reason' => 'nullable|string|max:500',
        ]);

        Chargeback::create([
            'chargeback_id' => 'CBK-' . strtoupper(Str::random(8)),
            'transaction_id' => $request->transaction_id,
            'merchant_name' => $request->merchant_name,
            'amount' => $request->amount,
            'currency' => 'INR',
            'reason' => $request->reason,
            'status' => 'initiated',
        ]);

        return redirect()->route('chargebacks.index')->with('success', 'Chargeback created successfully!');
    }

    public function edit($id)
    {
        $chargeback = Chargeback::findOrFail($id);
        return view('chargebacks.edit', compact('chargeback'));
    }

    public function update(Request $request, $id)
    {
        $chargeback = Chargeback::findOrFail($id);
        $chargeback->update($request->all());

        return redirect()->route('chargebacks.index')->with('success', 'Chargeback updated successfully!');
    }

    public function destroy($id)
    {
        $chargeback = Chargeback::findOrFail($id);
        $chargeback->delete();

        return back()->with('success', 'Chargeback deleted successfully!');
    }
}
