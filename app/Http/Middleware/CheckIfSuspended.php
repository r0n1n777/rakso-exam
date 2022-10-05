<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class CheckIfSuspended
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->suspended == true) {
            $now = (new Carbon)->now();
            $remaining_time = date('h:i:s', strtotime(Auth::user()->suspended_exp) - strtotime($now));
            return response()->view('suspension', ['remaining_time' => $remaining_time]);
        }

        return $next($request);
    }
}
