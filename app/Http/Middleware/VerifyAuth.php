<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAuth
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
        $error_message = 'Oops something went wrong';
        
        if ($request->cookie('provider') == null){
            $error_message = 'Sign in, session expired';//.Cookie::queued('provider'); //Cookie::get('provider');
            return redirect('/')->with('error', $error_message); 
        }else if($request->cookie('userType') == null){
            $error_message = 'Please select a user type';
            return redirect('/')->with('error', $error_message);
        }
        return $next($request);
    }
}
