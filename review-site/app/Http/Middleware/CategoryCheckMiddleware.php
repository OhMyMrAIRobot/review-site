<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $param): Response
    {
        $id = $request->route('category');
        $category = Category::find($id);
        if (!$category){
            $param === 'admin' ? $redirect = 'categories.index' : $redirect = 'main.index';
            return redirect()->route($redirect);
        }

        return $next($request);
    }
}
