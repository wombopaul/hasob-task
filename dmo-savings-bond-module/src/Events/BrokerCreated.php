<?php

namespace DMO\SavingsBond\Events;

use DMO\SavingsBond\Models\Broker;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BrokerCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $broker;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Broker $broker)
    {
        $this->broker = $broker;
    }

}
