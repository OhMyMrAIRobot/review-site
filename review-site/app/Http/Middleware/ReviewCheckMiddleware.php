<?php

namespace App\Http\Middleware;

use App\Models\Review;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReviewCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('review');
        $review = Review::find($id);
        if (!$review)
            return redirect()->route('reviews.index');

        return $next($request);
    }
}
