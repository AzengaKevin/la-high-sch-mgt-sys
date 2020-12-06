<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherSubjectsController extends Controller
{
    public function update(Request $request, Teacher $teacher)
    {
        //dd($teacher->subjects);
        
        $data = $request->validate([
            'subjects' => ['required','array'],
            'subjects.*' => ['numeric']
        ]);

        $teacher->subjects()->sync($data['subjects']);


        return redirect()->route('admin.teachers.show', $teacher);
    }
}
