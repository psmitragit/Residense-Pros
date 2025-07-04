<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && (auth()->user()?->role ?? '') == 'agent' && (auth()->user()?->status ?? '') == 'active') {
            return $next($request);
        }
        return redirect()->route('index')->with('error', 'Please login to agent account to access this page.');
    }
}
