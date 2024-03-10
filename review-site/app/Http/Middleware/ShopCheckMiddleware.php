<?php

namespace App\Http\Middleware;

use App\Models\Shop;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShopCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $param): Response
    {
        $id = $request->route('shop');
        $shop = Shop::find($id);
        if (!$shop){
            $param === 'admin' ? $redirect = 'shops.index' : $redirect = 'main.index';
            return redirect()->route($redirect);
        }

        return $next($request);
    }
}
