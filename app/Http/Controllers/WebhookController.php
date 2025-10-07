<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webhook;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Log the webhook payload
        $webhook = Webhook::create([
            'event' => $request->input('event'),
            'payload' => json_encode($request->all()),
            'status' => 'pending'
        ]);

        // Process the event based on type
        switch ($request->input('event')) {
            case 'payment_success':
                // Call your payment success logic here
                $this->handlePaymentSuccess($request->all());
                break;

            case 'payment_failed':
                // Call your payment failed logic here
                $this->handlePaymentFailed($request->all());
                break;

            case 'refund_processed':
                $this->handleRefund($request->all());
                break;

            default:
                // Unknown event
                break;
        }

        // Mark webhook as processed
        $webhook->status = 'processed';
        $webhook->save();

        return response()->json(['status' => 'ok']);
    }

    private function handlePaymentSuccess($data)
    {
        // Update your orders or transactions table
        // Example:
        // $transaction = Transaction::where('order_id', $data['order_id'])->first();
        // $transaction->status = 'success';
        // $transaction->save();
    }

    private function handlePaymentFailed($data)
    {
        // Update transaction as failed
    }

    private function handleRefund($data)
    {
        // Update refund table
    }
public function index()
{
    $webhooks = Webhook::orderBy('created_at', 'desc')->paginate(20);
    return view('admin.webhooks.index', compact('webhooks'));
}

public function show($id)
{
    $webhook = Webhook::findOrFail($id);
    return view('admin.webhooks.show', compact('webhook'));
}



public function create()
{
    return view('admin.webhooks.create');
}

public function store(Request $request)
{
    // Validation
    $request->validate([
        'event' => 'required|string|max:255',
        'payload' => 'required|json',
        'status' => 'required|in:pending,processed'
    ]);

    // Create webhook
    Webhook::create([
        'event' => $request->event,
        'payload' => $request->payload,
        'status' => $request->status
    ]);

    return redirect()->route('webhooks.index')->with('success', 'Webhook added successfully!');
}

}
