<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class admin
{

    public function isAdmin()
    {
        return !Auth::guest() && Auth::user()->type == 1;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->isAdmin())
        {
            return $next($request);
        }
        else{
            return redirect()->route('home');
        }
        
    }
}
