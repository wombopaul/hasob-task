<?php

namespace Hasob\FoundationCore\Events;

use Hasob\FoundationCore\Models\Setting;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SettingCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

}
