<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\PasswordChanged;

class UserObserver
{
    public function updated(User $user)
    {
        if ($user->isDirty('password')) {
            $user->notify(app(PasswordChanged::class));
        }
    }
}
