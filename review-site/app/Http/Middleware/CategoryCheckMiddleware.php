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
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('category');
        $category = Category::find($id);
        if (!$category)
            return redirect()->route('categories.index');

        return $next($request);
    }
}
