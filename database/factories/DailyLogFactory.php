<?php

namespace Database\Factories;

use App\Models\DailyLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DailyLogFactory extends Factory
{
    protected $model = DailyLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'log' => Str::random(10),
            'day' => Carbon::today(),
        ];
    }
}
