<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketReplyController extends Controller
{
    // User Reply
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|string',
            'file' => 'nullable|mimes:jpg,png,pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('ticket_replies', 'public');
        }

        TicketReply::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'file_path' => $filePath,
        ]);

        $ticket->update(['status' => 'in_progress']);

        return back()->with('success', 'Reply sent successfully!');
    }

    // Admin Reply
    public function adminReply(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|string',
            'file' => 'nullable|mimes:jpg,png,pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('ticket_replies', 'public');
        }

        TicketReply::create([
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
            'message' => $request->message,
            'file_path' => $filePath,
        ]);

        $ticket->update(['status' => 'resolved']);

        return back()->with('success', 'Reply sent to user!');
    }
}
