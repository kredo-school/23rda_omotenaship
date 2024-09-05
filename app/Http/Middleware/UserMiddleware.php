<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Logged-in and user
        if (Auth::check() && Auth::user()->role_id == 2) {
            return $next($request); # allows viewing all pages (default)
        } else {
            // return redirect()->route('posts.index'); # redirect to top page
            return redirect()->back();
        }
    }
}
