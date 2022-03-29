<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyLogRequest;
use App\Models\DailyLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class DailyLogController extends Controller
{
    public function store(DailyLogRequest $request): RedirectResponse
    {
        $log = new DailyLog();
        $log->user_id = Auth::user()->id;
        $log->day = $request->get('day');
        $log->log = $request->get('log');
        $log->save();
        return back();
    }

    public function update(DailyLog $log): RedirectResponse
    {
        $log->update(request()->only('log'));

        return back();
    }

    public function delete(DailyLog $log): RedirectResponse
    {
        if (Auth::user()->cannot('delete', $log)) {
            abort(403);
        }
        $log->delete();
        return back();
    }

}
