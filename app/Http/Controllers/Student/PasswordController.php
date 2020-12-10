<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Validate the student data
        $data = $request->validate([
            'current_password' => ['required', 'max:64'],
            'password' => ['required', 'max:255', 'confirmed']
        ]);

        //Get the student details
        $student = Auth::guard('student')->user();

        //Check whether the provided password matches
        if(!Hash::check($data['current_password'], $student->password)){
            return back()->withErrors([
                'current_password' => ['The provided password does not match our records']
            ]);
        }

        $student->update(['password' => Hash::make($data['password'])]);

        return redirect()->route('student.me.profile.show');
    }
}
