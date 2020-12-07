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

        //Default route
        $route = RouteServiceProvider::HOME;

        //Credentials
        $data = $request->validated();

        //Different groups logic
        if(!filter_var($data['login'], FILTER_VALIDATE_EMAIL)){

            switch (strlen($data['login'])) {
                case 5:
                    $route = 'student.dashboard';
                    break;
                case 6:
                    $route = 'teacher.dashboard';
                    break;
                default:
                    $this->destroy($request);
                    break;
            }

        }

        $request->session()->regenerate();

        return redirect()->intended(route($route));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
