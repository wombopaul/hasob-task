<?php

namespace Hasob\FoundationCore\Events;

use Hasob\FoundationCore\Models\Relationship;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RelationshipUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $relationship;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Relationship $relationship)
    {
        $this->relationship = $relationship;
    }

}
