<?php

namespace Hasob\FoundationCore\Listeners;

use Hasob\FoundationCore\Models\Rating;
use Hasob\FoundationCore\Models\RatingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RatingCreatedListener
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
     * @param  RatingCreated  $event
     * @return void
     */
    public function handle(RatingCreated $event)
    {
        //
    }
}
