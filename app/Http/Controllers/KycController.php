<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KycController extends Controller
{
    public function showForm() {
        return view('merchants.kyc');
    }

    public function submitForm(Request $request) {
        // Validate and save KYC data
        // e.g. $request->validate([...]);
        // Save to DB
        return redirect()->route('merchant.onboard.show')->with('success', 'KYC submitted successfully!');
    }
}

