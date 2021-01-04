<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Le => Level
 * Str => Stream
 * Su => Subject
 */
class Lestrsu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['teacher_id', 'level_id', 'stream_id', 'subject_id'];

    /**
     * Class Teacher Relationship M : 1
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Class Level Relationship M : 1
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    /**
     * Class Stream Relationship M : 1
     */
    public function stream()
    {
        return $this->belongsTo(Stream::class);
    }

    /**
     * Class Sbject Relationship M : 1
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
