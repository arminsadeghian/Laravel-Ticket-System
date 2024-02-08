<?php

namespace App\Http\Controllers;

use App\Events\ReplyCreated;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }

    public function create(Request $request, Ticket $ticket)
    {
        $reply = auth()->user()->replies()->create([
            'ticket_id' => $ticket->id,
            'text' => $request->text
        ]);

        event(new ReplyCreated($reply, auth()->user()));

        return back()->with('success', 'Reply sent successfully');
    }
}
