<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
// In your AdminMiddleware handle method
    public function handle(Request $request, Closure $next)
    {
        // Remove unwanted whitespace and newline characters from the role
        $role = trim(Auth::user()->role);

        if (Auth::check() && $role === 'admin') {
            return $next($request);
        }

        return redirect('/home');
    }


}



