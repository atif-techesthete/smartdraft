<?php

namespace App\Listeners;

use App\Events\SignupEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SignupEventListener
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
     * @param  SignupEvent  $event
     * @return void
     */
    public function handle(SignupEvent $event)
    {
        //
    }
}
