<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Reconciliation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ReconciliationController extends Controller
{
    /**
     * Display all reconciliations
     */
    public function index()
    {
        $recons = Reconciliation::latest()->paginate(20);
        return view('admin.reconciliation.index', compact('recons'));
    }

    /**
     * Show upload CSV form
     */
    public function uploadForm()
    {
        return view('admin.reconciliation.upload');
    }

    /**
     * Handle CSV upload and reconciliation process
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240',
        ]);

        // Store uploaded file for audit reference (private storage)
        $filePath = $request->file('file')->store('reconciliation_uploads', 'local');
        $fullPath = storage_path('app/' . $filePath);

        if (!file_exists($fullPath)) {
            return back()->with('error', 'Uploaded file not found.');
        }

        $file = fopen($fullPath, 'r');

        // Skip header row if present
        $header = fgetcsv($file);
        $rows = 0;
        $processed = 0;

        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            // Skip invalid lines
            if (count($data) < 4) {
                Log::warning("Skipped invalid CSV row: " . json_encode($data));
                continue;
            }

            $rows++;
            $bank_txn_id = trim($data[0] ?? '');
            $bank_ref = trim($data[1] ?? '');
            $amount = floatval(trim($data[2] ?? 0));
            $status = strtolower(trim($data[3] ?? ''));

            // Skip if missing essential data
            if (empty($bank_txn_id) || $amount <= 0) {
                continue;
            }

            $txn = Transaction::where('transaction_id', $bank_txn_id)->first();

            if ($txn && abs($txn->amount - $amount) < 0.01) {
                // ✅ Matched transaction
                Reconciliation::updateOrCreate(
                    ['transaction_id' => $bank_txn_id],
                    [
                        'bank_reference' => $bank_ref,
                        'amount' => $amount,
                        'status' => 'matched',
                        'remarks' => 'Transaction verified successfully',
                        'reconciled_at' => now(),
                        'file_path' => $filePath,
                    ]
                );
            } elseif ($txn) {
                // ⚠️ Mismatch
                Reconciliation::updateOrCreate(
                    ['transaction_id' => $bank_txn_id],
                    [
                        'bank_reference' => $bank_ref,
                        'amount' => $amount,
                        'status' => 'mismatch',
                        'remarks' => 'Amount or status mismatch',
                        'reconciled_at' => now(),
                        'file_path' => $filePath,
                    ]
                );
            } else {
                // ❌ Missing transaction
                Reconciliation::updateOrCreate(
                    ['transaction_id' => $bank_txn_id],
                    [
                        'bank_reference' => $bank_ref,
                        'amount' => $amount,
                        'status' => 'missing',
                        'remarks' => 'Record not found in system',
                        'reconciled_at' => now(),
                        'file_path' => $filePath,
                    ]
                );
            }

            $processed++;
        }

        fclose($file);

        return redirect()
            ->route('reconciliation.index')
            ->with('success', "Reconciliation completed for $processed / $rows records. File saved as $filePath");
    }

    /**
     * View details of one reconciliation record
     */
    public function show($id)
    {
        $rec = Reconciliation::findOrFail($id);
        return view('admin.reconciliation.show', compact('rec'));
    }

    /**
     * View list of uploaded reconciliation files
     */
    public function files()
    {
        $files = Storage::disk('local')->files('reconciliation_uploads');
        return view('admin.reconciliation.files', compact('files'));
    }

    /**
     * Securely download a reconciliation file (private storage)
     */
    public function download($filename)
    {
        $path = 'reconciliation_uploads/' . $filename;

        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'File not found.');
        }

        // Get the absolute path for response()->download()
        $absolutePath = Storage::disk('local')->path($path);

        return response()->download($absolutePath);
    }
}

