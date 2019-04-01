<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Employee
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
        if(Auth::guard('employee')->check() && Auth::guard('employee')->user()->IsDeleted==0){

            return $next($request);
        }

        return redirect('/')->with('error','You have not Employee access');
    }
}
