<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'admission_number', 'stream_id', 'kcpe_marks', 
        'kcpe_grade', 'dob', 'join_date', 'join_level_id'
    ];

    protected $casts = [
        'join_date' => 'date',
        'dob' => 'date',
    ];
}
