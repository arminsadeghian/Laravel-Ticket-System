<?php

namespace App\Listeners;

use App\Events\ReplyCreated;

class ChangeTicketStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReplyCreated $event): void
    {
        if ($event->reply->ticket->isCreated() && $event->user->isAdmin()) {
            $event->reply->ticket->replied();
        }
    }
}
