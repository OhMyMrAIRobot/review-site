<?php

namespace App\Http\Middleware;

use Closure;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!session('isAdmin')) {
            return redirect()->route('main.index');
        }

        return $next($request);
    }
}
