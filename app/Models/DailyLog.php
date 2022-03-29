<?php

namespace App\Models;

use App\Events\DailyLogCreated;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['log'];

    protected $dates = [
        'day',
    ];

    protected $dispatchesEvents = [
        'created' => DailyLogCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFromToday(Builder $queryBuilder): Builder
    {
        return $queryBuilder->whereDate('day', '=', Carbon::today());
    }
}
