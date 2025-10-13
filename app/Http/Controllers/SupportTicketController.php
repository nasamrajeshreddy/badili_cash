<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    // User View - My Tickets
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->latest()->get();
        return view('user.support.index', compact('tickets'));
    }

    // User Create Ticket Form
    public function create()
    {
        return view('user.support.create');
    }

    // Store Ticket
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
            'attachment' => 'nullable|mimes:jpg,png,pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('ticket_attachments', 'public');
        }

        Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'category' => $request->category,
            'description' => $request->description,
            'attachment' => $filePath,
        ]);

        return redirect()->route('user.tickets.index')->with('success', 'Ticket raised successfully!');
    }

    // User View Single Ticket + Replies
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        $ticket->load('replies.user');
        return view('user.support.show', compact('ticket'));
    }

    // Admin View All Tickets
    public function adminIndex()
    {
        $tickets = Ticket::latest()->paginate(10);
        return view('admin.support.index', compact('tickets'));
    }

    // Admin View Single Ticket
    public function adminShow(Ticket $ticket)
    {
        $ticket->load('user', 'replies.user');
        return view('admin.support.show', compact('ticket'));
    }
}
