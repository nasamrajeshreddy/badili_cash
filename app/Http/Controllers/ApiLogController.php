<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiLog;
use App\Models\Merchant;

class ApiLogController extends Controller
{
    public function index()
    {
        $logs = ApiLog::with('merchant')->latest()->paginate(10);
        return view('api_logs.index', compact('logs'));
    }

    public function create()
    {
        $merchants = Merchant::all();
        return view('api_logs.create', compact('merchants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merchant_id' => 'nullable|exists:merchants,id',
            'endpoint' => 'required|string',
            'method' => 'required|string',
            'request_payload' => 'nullable|string',
            'response_payload' => 'nullable|string',
            'status_code' => 'nullable|integer',
        ]);

        ApiLog::create([
            'log_id' => 'LOG-' . strtoupper(uniqid()),
            'merchant_id' => $request->merchant_id,
            'endpoint' => $request->endpoint,
            'method' => $request->method,
            'request_payload' => $request->request_payload,
            'response_payload' => $request->response_payload,
            'status_code' => $request->status_code,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->route('api_logs.index')->with('success', 'API log added successfully.');
    }

    public function show($id)
    {
        $log = ApiLog::with('merchant')->findOrFail($id);
        return view('api_logs.show', compact('log'));
    }
}


