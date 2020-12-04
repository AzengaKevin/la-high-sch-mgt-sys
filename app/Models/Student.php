<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'admission_number', 'stream_id', 'kcpe_marks', 
        'kcpe_grade', 'dob', 'join_date', 'join_level_id'
    ];

    protected $casts = [
        'join_date' => 'date',
        'dob' => 'date',
    ];
}
