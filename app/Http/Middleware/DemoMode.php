<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoMode
{
    public function handle(Request $request, Closure $next)
    {
        session(['is_demo' => true]);
        view()->share('isDemo', true);

        return $next($request);
    }
}