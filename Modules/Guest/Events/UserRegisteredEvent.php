<?php

namespace Modules\Guest\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class UserRegisteredEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(public readonly User $user, public readonly string $password)
    {
        //
    }
}
