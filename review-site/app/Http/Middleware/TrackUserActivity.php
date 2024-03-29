<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $visitedPages = session('visited_pages', []);
        $visitedPages[] = $request->fullUrl();
        session(['visited_pages' => $visitedPages]);

        if ($request->has('search')) {
            $searchHistory = session('search_history', []);
            $searchHistory[] = $request->input('search');
            session(['search_history' => $searchHistory]);
        }

        return $next($request);
    }
}
