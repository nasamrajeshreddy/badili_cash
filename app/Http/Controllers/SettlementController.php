<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settlement;

class SettlementController extends Controller
{
    // Show all settlements
    public function index()
    {
        $settlements = Settlement::latest()->get(); // latest first
        return view('settlements.index', compact('settlements'));
    }

    // Show add settlement form
    public function create()
    {
        return view('settlements.create');
    }

    // Store settlement in DB
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'status' => 'required|in:pending,completed'
        ]);

        Settlement::create($request->all());

        // Redirect to All Settlements page after creation
        return redirect()->route('settlements.index')->with('success', 'Settlement completed successfully!');
    }
}
