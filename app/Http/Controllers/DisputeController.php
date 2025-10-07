<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispute;
use Illuminate\Support\Str;

class DisputeController extends Controller
{
    public function index()
    {
        $disputes = Dispute::latest()->get();
        return view('disputes.index', compact('disputes'));
    }

    public function create()
    {
        return view('disputes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'reason' => 'required',
        ]);

        Dispute::create([
            'dispute_id' => 'DSP-' . strtoupper(Str::random(8)),
            'transaction_id' => $request->transaction_id,
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'reason' => $request->reason,
            'status' => 'open',
            'comments' => $request->comments,
        ]);

        return redirect()->route('disputes.index')->with('success', 'Dispute created successfully!');
    }

    public function edit($id)
    {
        $dispute = Dispute::findOrFail($id);
        return view('disputes.edit', compact('dispute'));
    }

    public function update(Request $request, $id)
    {
        $dispute = Dispute::findOrFail($id);
        $dispute->update($request->all());
        return redirect()->route('disputes.index')->with('success', 'Dispute updated successfully!');
    }

    public function destroy($id)
    {
        Dispute::findOrFail($id)->delete();
        return back()->with('success', 'Dispute deleted successfully!');
    }
}
