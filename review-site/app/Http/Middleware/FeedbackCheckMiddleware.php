<?php

namespace App\Http\Middleware;

use App\Models\Feedback;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbackCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('feedback');
        $feedback = Feedback::find($id);
        if (!$feedback){
            redirect()->route('feedback.index');
        }

        return $next($request);
    }
}
