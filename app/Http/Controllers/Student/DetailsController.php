<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function show()
    {
        
        //Get the student details
        $student = Auth::guard('student')->user();

        return view('student.details', compact('student'));
    }
}
