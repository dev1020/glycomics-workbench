<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && (!auth()->user()->hasRole('admin'))){
            auth()->logout();

            $request->session()->invalidate();

            return redirect()->route('login')->withErrors(['error' => 'User does not have the right roles. ']);

        }

        return $next($request);
    }
}
