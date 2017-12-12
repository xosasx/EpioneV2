<?php

namespace App\Http\Middleware;

use Closure;

class VerifyFitbitToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->cookie('fitbit_token') == null)
            return redirect()->route('confirm.fitbit');
        return $next($request);
    }
}
