<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visitedPages = json_decode($request->cookie('visited_pages'), true) ?? [];
        $visitedPages[] = $request->fullUrl();

        $cookie = cookie('visited_pages', json_encode($visitedPages));

        if ($request->has('search')) {
            $searchHistory = json_decode($request->cookie('search_history'), true) ?? [];
            $searchHistory[] = $request->input('search');
            $cookie = cookie('search_history', json_encode($searchHistory));
        }

        return $next($request)->withCookie($cookie, );
    }
}
