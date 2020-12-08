<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherLevelsController extends Controller
{
    public function store(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'level_id' => ['required', 'numeric'],
            'stream_id' => ['required', 'numeric'],
            'subject_id' => ['required', 'numeric']
        ]);

        $teacher->levels()->syncWithoutDetaching([
            $data['level_id'] => [
                'stream_id' => $data['stream_id'],
                'subject_id' => $data['subject_id']
            ]
        ]);

        return back();

    }
}
