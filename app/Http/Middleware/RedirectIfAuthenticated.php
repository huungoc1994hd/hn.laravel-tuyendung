<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $currentUri = $request->route()->uri();
        switch ($currentUri) {
            case 'admin/user/auth/login':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;

            default:
                if (!Auth::guard($guard)->check()) {
                    return redirect()->route('admin.login');
                }
        }


        return $next($request);
    }
}
