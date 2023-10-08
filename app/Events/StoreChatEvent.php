<?php

namespace App\Events;

use App\Models\Chat;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    private $message;
    private $first_user;
    private $second_user;
    private $service;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$first_user,$second_user)
    {
        $this->message = $message;
        $this->first_user = $first_user;
        $this->second_user = $second_user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('store_chat_' . $this->first_user . '_' . $this->second_user);
    }
    public function broadcastAs(): string
{
    return 'store_chat';
}

}
