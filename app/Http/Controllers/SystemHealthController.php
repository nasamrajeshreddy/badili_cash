<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Cache;

class SystemHealthController extends Controller
{
    public function index()
    {
        return view('admin.system_health.index');
    }

    public function check()
    {
        $results = [];

        // 1️⃣ Database Check
        try {
            DB::connection()->getPdo();
            $results['database'] = ['status' => 'OK', 'message' => 'Database connected successfully'];
        } catch (\Exception $e) {
            $results['database'] = ['status' => 'FAIL', 'message' => $e->getMessage()];
        }

        // 2️⃣ Queue Check
        try {
            $queueStatus = Cache::get('queue_health', 'active');
            $results['queue'] = ['status' => $queueStatus === 'active' ? 'OK' : 'FAIL', 'message' => "Queue is $queueStatus"];
        } catch (\Exception $e) {
            $results['queue'] = ['status' => 'FAIL', 'message' => $e->getMessage()];
        }

        // 3️⃣ Storage Check
        try {
            $free = disk_free_space("/");
            $total = disk_total_space("/");
            $percent = round(($free / $total) * 100, 2);
            $results['storage'] = ['status' => 'OK', 'message' => "Free space: {$percent}%"];
        } catch (\Exception $e) {
            $results['storage'] = ['status' => 'FAIL', 'message' => $e->getMessage()];
        }

        // 4️⃣ Webhook Delivery Status
        try {
            $success = \App\Models\Webhook::where('status', 'success')->count();
            $failed = \App\Models\Webhook::where('status', 'failed')->count();
            $results['webhooks'] = [
                'status' => 'OK',
                'message' => "Success: $success | Failed: $failed"
            ];
        } catch (\Exception $e) {
            $results['webhooks'] = ['status' => 'FAIL', 'message' => $e->getMessage()];
        }

        // 5️⃣ Cron Job Last Run (optional)
        $lastCron = Cache::get('last_cron_run');
        $results['cron'] = [
            'status' => $lastCron ? 'OK' : 'WARN',
            'message' => $lastCron ? "Last run: $lastCron" : 'No cron activity detected'
        ];

        // 6️⃣ API Test Ping
        try {
            $response = Http::timeout(2)->get(url('/api/ping'));
            $results['api'] = [
                'status' => $response->successful() ? 'OK' : 'FAIL',
                'message' => "Response code: " . $response->status()
            ];
        } catch (\Exception $e) {
            $results['api'] = ['status' => 'FAIL', 'message' => 'Ping failed'];
        }

        return response()->json($results);
    }
}
