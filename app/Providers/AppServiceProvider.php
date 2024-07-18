<?php

namespace App\Providers;

use App\Events\Log\EndLogEvent;
use App\Events\Log\StartLogEvent;
use App\Listeners\Log\EndLogListener;
use App\Listeners\Log\MiddleLogListener;
use App\Listeners\Log\StartLogListener;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
//        Event::listen(
//            StartLogEvent::class,
//            StartLogListener::class
//        );
//        Event::listen(
//            StartLogEvent::class,
//            MiddleLogListener::class
//        );
//        Event::listen(
//            EndLogEvent::class,
//            EndLogListener::class
//        );
    }
}
