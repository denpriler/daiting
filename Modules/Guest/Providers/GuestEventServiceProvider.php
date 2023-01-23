<?php

namespace Modules\Guest\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Modules\Guest\Events\UserRegisteredEvent;
use Modules\Guest\Listeners\SendRegisteredUserEmail;

class GuestEventServiceProvider extends EventServiceProvider
{
    protected $listen = [
        UserRegisteredEvent::class => [
            SendRegisteredUserEmail::class
        ]
    ];
}
