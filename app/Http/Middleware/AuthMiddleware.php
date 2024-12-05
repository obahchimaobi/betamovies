<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            // code...
            session()->flash('message', 'Registration successful! A confirmation email has been sent to the email provided. Please check your inbox (and spam folder) to verify your email and activate your account.');

            return redirect()->route('login');
        }

        return $next($request);
    }
}
