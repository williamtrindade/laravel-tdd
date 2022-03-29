<?php

namespace App\Observers;

use App\Events\DailyLogCreated;
use App\Models\DailyLog;

class DailyLogObserver
{
    public function created(DailyLog $dailyLog)
    {
        event(new DailyLogCreated($dailyLog));
    }
}
