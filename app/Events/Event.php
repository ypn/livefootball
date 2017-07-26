<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Sentinel;

class Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message,$first_name,$last_name,$fb_id,$uid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $user = Sentinel::getUser();
        $this->message = $text;
        $this->uid = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name  = $user->last_name;
        $this->fb_id      = $user->fb_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('live-chat-channel');
    }
}
