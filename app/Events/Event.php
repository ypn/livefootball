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

    public $message,$first_name,$last_name,$fb_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->message = $text;
        $this->first_name = Sentinel::getUser()->first_name;
        $this->last_name  = Sentinel::getUser()->last_name;
        $this->fb_id      = Sentinel::getUser()->fb_id;
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
