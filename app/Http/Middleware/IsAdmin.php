<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user()->isAdmin())
        {
                Auth::logout();
            return redirect()->route('filament.admin.auth.login')->withErrors(['admin' => 'User is not permissible to enter']);

        }

        return $next($request);
    }
}
