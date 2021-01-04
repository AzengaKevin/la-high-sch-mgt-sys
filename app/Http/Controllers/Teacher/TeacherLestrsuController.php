<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherLestrsuController extends Controller
{
    public function __invoke()
    {
        //Get the authenticated teacher
        $teacher = Auth::guard('teacher')->user();

        //Get all teacher subject effectively
        $teacher->load('lestrsus');

        return view('teacher.classes', ['lestrsus' => $teacher->lestrsus]);
    }
}
