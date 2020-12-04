<?php

namespace App\Http\Controllers\Auth\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.students.login');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'admission_number' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::guard('students')->attempt($data)){
            return redirect(RouteServiceProvider::HOME);
        }

        return back();
    }
}
