<?php

namespace App\Listeners;

use App\Events\DailyLogCreated;
use App\Mail\DailyLogCopy;
use Illuminate\Support\Facades\Mail;

class DailyLogCopyListener
{
    public function handle(DailyLogCreated $event)
    {
        $mailTo = $event->dailyLog->user->email;
        Mail::to($mailTo)->send(new DailyLogCopy($event->dailyLog));
    }
}
