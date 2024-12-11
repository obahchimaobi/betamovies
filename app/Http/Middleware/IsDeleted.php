<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsDeleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && !is_null(Auth::user()->deleted_at)) {
            // code...

            Auth::logout();

            session()->flash('error', 'Your account was deleted by admin');
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}
