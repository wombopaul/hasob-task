<?php

namespace Hasob\FoundationCore\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


use Hasob\FoundationCore\Models\Site;

class SiteCreatedEvent
{
    use Dispatchable, SerializesModels;

    public $site;

    public function __construct(Site $site)
    {
        $this->site = $site;
    }
}