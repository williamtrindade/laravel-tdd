<?php

namespace App\Mail;

use App\Models\DailyLog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailyLogCopy extends Mailable
{
    use Queueable, SerializesModels;

    public $dailyLog;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(DailyLog $dailyLog)
    {
        $this->dailyLog = $dailyLog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): DailyLogCopy
    {
        return $this->view('mail.daily-log-copy');
    }
}
