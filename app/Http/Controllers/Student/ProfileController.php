<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        //Get the student details
        $student = Auth::guard('student')->user();

        return view('student.profile', compact('student'));
    }

    public function update()
    {
        
    }
}
