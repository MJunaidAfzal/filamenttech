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

    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //         if ($user->isAdmin()) {
    //             return redirect()->route('filament.admin.pages.dashboard');
    //         } elseif ($user->isDeveloper()) {
    //             return redirect()->route('filament.developer.pages.dashboard');
    //         } elseif ($user->isSupport()) {
    //             return redirect()->route('filament.support.pages.dashboard');
    //         } else {
    //             Auth::logout();
    //             return redirect()->route('filament.admin.auth.login')->withErrors(['admin' => 'User is not permissible to enter']);
    //         }
    //     }
    //     return $next($request);
    // }
}
