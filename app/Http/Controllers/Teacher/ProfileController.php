<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function show()
    {
        $teacher = Auth::guard('teacher')->user();
        
        return view('teacher.profile', compact('teacher'));
    }
}
