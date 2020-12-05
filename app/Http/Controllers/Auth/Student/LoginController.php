<?php

namespace App\Http\Controllers\Auth\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

        // dd($data);

        if(Auth::guard('student')->attempt($data)){
            return redirect()->route('student.dashboard');
        }

        return back();
    }
}
