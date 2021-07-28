<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AgeChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //if ($request->has('age'))
            if ($request->age < 15 )
                echo 'age less than 15';
        return $next($request);
    }
}
