<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeric', 'slug', 'name'
    ];

    /**
     * Level teachers relationship
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_level_stream_subject');
    }
}
