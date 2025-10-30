<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Check if user is logged in and has admin role
        if (!Auth::check() || !Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.login')->with('error', 'You are not authorized to access admin area.');
        }

        return $next($request);
    }
}
