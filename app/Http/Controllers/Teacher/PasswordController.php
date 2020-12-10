<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        //Get the authenticated teacher
        $teacher = Auth::guard('teacher')->user();

        //Check whether  current password matches
        if(!Hash::check($data['current_password'], $teacher->password)){
            return back()->withErrors([
                'current_password' => ['The provided password does not match our records']
            ]);
        }

        $teacher->update(['password' => Hash::make($data['password'])]);

        return redirect()->route('teacher.me.profile.show');
        
    }
}
