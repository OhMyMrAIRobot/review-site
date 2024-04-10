<?php

namespace App\Http\Middleware;

use App\Models\Activity;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
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
        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent'));

        $activity = new Activity();
        Auth::user() ?
            $activity->user_id = \Illuminate\Support\Facades\Auth::user()->getUserId()
            :
            $activity->user_id = null;
        $activity->ip = $request->ip();
        $activity->browser = $agent->browser() . ' v.' . $agent->version($agent->browser());
        $activity->os = $agent->platform();
        $activity->url = $request->url();
        $activity->save();



        return $next($request);
    }

}
