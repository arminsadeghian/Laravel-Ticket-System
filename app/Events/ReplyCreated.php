<?php

namespace App\Events;

use App\Models\Admin;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReplyCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Reply $reply;
    public Admin $user;

    /**
     * Create a new event instance.
     */
    public function __construct(Reply $reply, Admin $user)
    {
        $this->reply = $reply;
        $this->user = $user;
    }
}
