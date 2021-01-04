<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lestrsu;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherLestrsuController extends Controller
{
    public function store(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'level_id' => ['required', 'numeric'],
            'stream_id' => ['required', 'numeric'],
            'subject_id' => ['required', 'numeric']
        ]);

        $teacher->lestrsus()->create($data);

        return back();
    }

    public function destroy(Teacher $teacher, Lestrsu $lestrsu)
    {
        
        $lestrsu->delete();

        return back();
    }
}
