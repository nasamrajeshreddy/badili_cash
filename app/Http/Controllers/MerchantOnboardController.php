<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantOnboardController extends Controller
{
    /**
     * Show merchant onboarding form.
     */
    public function showForm()
    {
        return view('merchants.onboard');
    }

    /**
     * Handle merchant onboarding form submission.
     */
    public function submitForm(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'website' => 'nullable|url',
        ]);

        // Save merchant onboarding data here
        // Example: Merchant::create($request->all());

        return redirect()->back()->with('success', 'Merchant onboarded successfully!');
    }
}

