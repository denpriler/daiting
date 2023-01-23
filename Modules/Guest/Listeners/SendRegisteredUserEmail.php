<?php

namespace Modules\Guest\Listeners;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\Guest\Emails\UserPassword;
use Modules\Guest\Events\UserRegisteredEvent;

class SendRegisteredUserEmail
{
    /**
     * Handle the event.
     *
     * @param  UserRegisteredEvent  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event): void
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            \Mail::to($event->user->email)->send(new UserPassword($event->password));
        }
    }
}
