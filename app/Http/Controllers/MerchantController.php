<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchantController extends Controller
{
    // Show all merchants (Admin Panel)
    public function index()
    {
        $merchants = Merchant::latest()->paginate(10);
        return view('merchants.index', compact('merchants'));
    }

    // Show registration form
    public function create()
    {
        return view('merchants.create');
    }

    // Store new merchant
    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_type' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:50',
            'pan_number' => 'nullable|string|max:50',
            'license_doc' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|unique:merchants',
            'phone' => 'required|string|max:15|unique:merchants',
            'bank_account' => 'required|string|max:50',
            'ifsc' => 'required|string|max:20',
            'bank_name' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        // Upload license document if provided
        if ($request->hasFile('license_doc')) {
            $file = $request->file('license_doc');
            $filename = 'license_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/licenses', $filename);
            $data['license_doc'] = $filename;
        }

        Merchant::create($data);

        return redirect()->route('merchants.index')->with('success', 'Merchant registered successfully!');
    }
}
