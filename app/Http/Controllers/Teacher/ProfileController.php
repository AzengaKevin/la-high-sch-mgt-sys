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

    public function update(Request $request)
    {
        //Validate data
        $data = $request->validate([
            'name' => ['required', 'string', 'max:64'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'max:20'],
        ]);

        //Get the authenticated teacher
        $teacher = Auth::guard('teacher')->user();

        //Update|Save the information
        $teacher->update($data);

        return redirect()->route('teacher.me.profile.show');
    }
}
