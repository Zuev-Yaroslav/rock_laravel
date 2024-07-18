<?php

namespace App\Listeners\Log;

use App\Events\Log\EndlogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EndLogListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EndlogEvent $event): void
    {
        dump('Log end');
    }
}
