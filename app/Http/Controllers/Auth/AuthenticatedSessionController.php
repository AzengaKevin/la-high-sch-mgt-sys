<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\CustomLoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\CustomLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CustomLoginRequest $request)
    {
        $request->authenticate();

        //Credentials
        $data = $request->validated();

        $request->session()->regenerate();

        return redirect()->intended(route(RouteServiceProvider::HOME));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if(!is_null(Auth::user())) Auth::logout();
        if(!is_null(Auth::guard('student')->user())) Auth::guard('student')->logout();
        if(!is_null(Auth::guard('teacher')->user())) Auth::guard('teacher')->logout();

        dd(Auth::guard('student')->user());

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
