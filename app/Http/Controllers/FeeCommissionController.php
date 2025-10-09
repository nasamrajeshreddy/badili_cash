<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeCommission;

class FeeCommissionController extends Controller
{
    public function index()
    {
        $fees = FeeCommission::latest()->paginate(20);
        return view('admin.fees_commissions.index', compact('fees'));
    }

    public function create()
    {
        return view('admin.fees_commissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:flat,percentage',
            'value' => 'required|numeric|min:0',
            'applied_on' => 'required|string|max:255',
        ]);

        FeeCommission::create($request->all());

        return redirect()->route('fees_commissions.index')->with('success', 'Fee/Commission added successfully.');
    }

    public function edit(FeeCommission $feeCommission)
    {
        return view('admin.fees_commissions.edit', compact('feeCommission'));
    }

    public function update(Request $request, FeeCommission $feeCommission)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:flat,percentage',
            'value' => 'required|numeric|min:0',
            'applied_on' => 'required|string|max:255',
        ]);

        $feeCommission->update($request->all());

        return redirect()->route('fees_commissions.index')->with('success', 'Fee/Commission updated successfully.');
    }

    public function toggleStatus(FeeCommission $feeCommission)
    {
        $feeCommission->active = !$feeCommission->active;
        $feeCommission->save();

        return redirect()->route('fees_commissions.index')->with('success', 'Status updated successfully.');
    }
}
