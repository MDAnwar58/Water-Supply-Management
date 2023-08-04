<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->user_status == 'এডমিন')
        {
            return $next($request);
        }
        return redirect()->back()->with('error', 'আপনি এডমিন নন এই পেজে এডমিন ছাড়া অন্য কেউ ঢুকতে পারবে না।');
    }
}
