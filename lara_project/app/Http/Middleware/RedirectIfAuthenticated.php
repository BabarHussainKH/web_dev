<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, ...$guards)
    {
        Log::info($request->$request);
        Log::info($guards);



        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                $user = Auth::guard($guard)->user();

                // Redirect based on user role
                if ($user->user_role === 'admin') {
                    return redirect('/admin/dashboard');
                } else if ($user->user_role === 'user') {
                    return redirect('/user/dashboard');
                }
            }
        }

        return $next($request);
    }
}
