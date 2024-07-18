<?php

namespace App\Listeners\Log;

use App\Events\Log\StartlogEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StartLogListener
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
    public function handle(StartlogEvent $event): void
    {
        dump('Log started');
    }
}
