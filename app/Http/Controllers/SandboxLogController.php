<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SandboxLog; // Assuming you have a model for logs

class SandboxLogController extends Controller
{
    /**
     * Display a listing of sandbox logs.
     */
    public function index()
    {
        // Fetch logs (latest first)
        $logs = SandboxLog::latest()->paginate(20); // Or use get() if you prefer

        return view('admin.developer.sandbox_logs', compact('logs'));
    }
}
