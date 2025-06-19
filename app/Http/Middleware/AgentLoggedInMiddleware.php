<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && (auth()->user()?->role ?? '') == 'agent' && (auth()->user()?->status ?? '') == 'active') {
            $subscription = auth()->user()?->subscription ?? [];
            if (empty($subscription)) {
                return redirect()->route('agent.subscription')->with('error', 'You do not have an active subscription. Please subscribe to add a property.');
            }
            $is_expired = is_expired($subscription->subscription_end_date);
            if ($is_expired > 0) {
                if (empty($subscription)) {
                    return redirect()->route('agent.subscription')->with('error', 'Your subscription has expired. Please subscribe to a new plan to add a property.');
                }
            }
            return $next($request);
        }
        return redirect()->route('index')->with('error', 'You do not have permission to view this page.');
    }
}
