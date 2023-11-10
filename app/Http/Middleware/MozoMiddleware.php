<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MozoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->type == 'MOZO')
            return $next($request);
        
        return redirect('/');
    }
}
