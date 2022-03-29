<?php

namespace App\Events;

use App\Models\DailyLog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DailyLogCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dailyLog;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DailyLog $dailyLog)
    {
        $this->dailyLog = $dailyLog;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
