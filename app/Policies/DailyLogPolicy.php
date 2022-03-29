<?php

namespace App\Policies;

use App\Models\DailyLog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DailyLogPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, DailyLog $log): Response
    {
        return $user->id === $log->user_id
            ? Response::allow()
            : Response::deny('You cant delete this log.');
    }
}
