<?php

namespace Hasob\FoundationCore\Listeners;

use Hasob\FoundationCore\Models\Page;
use Hasob\FoundationCore\Models\PageDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PageDeletedListener
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
     * @param  PageDeleted  $event
     * @return void
     */
    public function handle(PageDeleted $event)
    {
        //
    }
}
