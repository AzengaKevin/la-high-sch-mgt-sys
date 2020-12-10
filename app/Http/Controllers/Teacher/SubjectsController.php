<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Get the authenticated teacher
        $teacher = Auth::guard('teacher')->user();

        //Get all teacher subject effectively
        $teacher->load('subjects');

        return view('teacher.subjects', ['subjects' => $teacher->subjects]);
    }
}
