<?php

namespace App\Jobs;

use App\Models\DailyLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SaveRandomQuote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var User */
    private $user;

    /** @var Carbon */
    private $date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Carbon $date)
    {
        Log::info('SaveRandomQuote job is running!!! 🧨');
        $this->user = $user;
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get('https://api.quotable.io/random');
        $responseData = $response->json();
        $dailyLog = new DailyLog();
        $dailyLog->log = $responseData['content'] ?? 'Incorrect data.';
        $dailyLog->day = $this->date;
        $dailyLog->user_id = $this->user->id;
        $dailyLog->save();
    }
}
