<?php

namespace DMO\SavingsBond\Listeners;

use DMO\SavingsBond\Models\Offer;
use DMO\SavingsBond\Models\OfferUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OfferUpdatedListener
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
     * @param  OfferUpdated  $event
     * @return void
     */
    public function handle(OfferUpdated $event)
    {
        //
    }
}
