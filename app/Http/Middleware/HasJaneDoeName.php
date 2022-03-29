<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasJaneDoeName
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->name === 'Jane Doe') {
            return response('', 401);
        }
        return $next($request);
    }
}
