<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use App\Models\Merchant;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = ApiKey::with('merchant')->latest()->paginate(10);
        return view('admin.api_keys.index', compact('apiKeys'));
    }

    public function create()
    {
        $merchants = Merchant::all();
        return view('admin.api_keys.create', compact('merchants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'required|exists:merchants,id',
        ]);

        ApiKey::create([
            'merchant_id' => $request->merchant_id,
            'app_id' => 'bc_' . Str::random(16),
            'secret_key' => 'bsk_' . Str::random(32),
            'status' => true,
        ]);

        return redirect()->route('api_keys.index')->with('success', 'API Key generated successfully!');
    }

    public function toggleStatus($id)
    {
        $key = ApiKey::findOrFail($id);
        $key->status = !$key->status;
        $key->save();

        return back()->with('success', 'API key status updated successfully!');
    }
}

