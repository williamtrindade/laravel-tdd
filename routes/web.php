<?php

use App\Http\Controllers\DailyLogController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'tailwind');

Route::post('daily-logs', [DailyLogController::class, 'store'])
    ->name('daily-logs.store')
    ->middleware('user.janedoe');

Route::put('daily-logs/{log}', [DailyLogController::class, 'update'])->name('daily-logs.update');
Route::delete('daily-logs/{log}', [DailyLogController::class, 'delete'])->name('daily-logs.delete');
