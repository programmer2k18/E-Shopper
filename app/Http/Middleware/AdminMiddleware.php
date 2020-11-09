<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->isAdmin){
            return $next($request);
        }
        return redirect(route('home'));
    }
}
