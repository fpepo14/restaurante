<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CocinaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->type == 'COCINA')
            return $next($request);

        elseif (auth()->user()->type = 'MOZO')
            return redirect('/home');
        
        else
            return redirect('/');
    }
}
