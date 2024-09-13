<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {

        return view("auth.login");
    }

    /**
     * Handle an incoming authentication request.
     */
 /**
 * Handle an incoming authentication request.
 */
public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    if (auth()->user()->role_id == 1) {
        return redirect()->route('filament.admin.pages.dashboard');
    } elseif (auth()->user()->role_id == 2) {
        return redirect()->route('filament.developer.pages.dashboard');
    } elseif (auth()->user()->role_id == 3) {
        return redirect()->route('filament.support.pages.dashboard');
    } elseif(auth()->user()->role_id == 4) {
        Auth::logout();
        return redirect()->route('filament.client.auth.login');
    }
    else{
        return redirect()->route('dashboard', absolute: false);
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
