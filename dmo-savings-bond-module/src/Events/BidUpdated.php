<?php

namespace DMO\SavingsBond\Events;

use DMO\SavingsBond\Models\Bid;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BidUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $bid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

}
