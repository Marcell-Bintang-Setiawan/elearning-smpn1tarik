<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);    
            } 
            elseif(Auth::guard('webadmin')->check()){
                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif (Auth::guard('webguru')->check()) {
                return redirect(RouteServiceProvider::GURU);
            }
            elseif (Auth::guard('websiswa')->check()) {
                return redirect(RouteServiceProvider::SISWA);
            }
            

        }

        return $next($request);
    }
}
