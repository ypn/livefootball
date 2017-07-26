<?php

namespace App\Listeners;

use App\Events\Event;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;
use App\Entities\ChatMessages;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(Event $event)
    {
        try{
          $message = new ChatMessages();
          $message->user_id = $event->uid;
          $message->first_name = $event->first_name;
          $message->last_name = $event->last_name;
          $message->fb_id = $event->fb_id;
          $message->message = $event->message;
          $message->save();
        }catch(\Illuminate\Database\QueryException $ex){
          
        }
    }
}
