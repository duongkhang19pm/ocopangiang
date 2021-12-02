<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->privilege == 'admin')
                return redirect(RouteServiceProvider::ADMIN);
            
            if (Auth::guard($guard)->check() && Auth::user()->privilege == 'donviquanly')
                return redirect(RouteServiceProvider::DONVIQUANLY);
            
            if (Auth::guard($guard)->check() && Auth::user()->privilege == 'doanhnghiep')
                return redirect(RouteServiceProvider::DOANHNGHIEP);
            
            if (Auth::guard($guard)->check() && Auth::user()->privilege == 'user')
                return redirect(RouteServiceProvider::USER);
        }

        return $next($request);
    }
}
